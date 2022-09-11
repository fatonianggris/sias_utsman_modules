<?php

class ExportModel extends CI_Model
{

	private $table_vemploye = 'view_pegawai';
	private $table_evaluation = 'penilaian';
	private $table_contact = 'kontak';
	private $table_general_page = 'general_page';
	private $table_present = 'absen_config';

	//
	//------------------------------REPORT--------------------------------//

	public function get_page()
	{

		$this->db->select('*');
		$this->db->where('id_general_page', 1);
		$sql = $this->db->get($this->table_general_page);
		return $sql->result();
	}

	public function get_contact()
	{

		$this->db->select('*');
		$this->db->where('id_kontak', 1);
		$sql = $this->db->get($this->table_contact);
		return $sql->result();
	}

	public function get_present_config()
	{

		$this->db->select('*');
		$this->db->where('id_absen_config', 1);
		$sql = $this->db->get($this->table_present);
		return $sql->result();
	}

	public function check_id_employe($id_pegawai = '')
	{
		$this->db->select('*');

		$this->db->where('id_pegawai', $id_pegawai);

		$sql = $this->db->get($this->table_vemploye);
		return $sql->result();
	}

	public function get_kepsek($level = '')
	{
		$this->db->select('p.nama_lengkap, p.nip');
		$this->db->from('pegawai p');
		$this->db->join('jabatan j', ' p.id_jabatan = j.id_jabatan', 'left');
		$this->db->where('p.level_tingkat', $level);
		$this->db->where('nama_jabatan', 'KEPALA SEKOLAH');

		$sql = $this->db->get($this->table_vemploye);
		return $sql->result();
	}

	public function get_questionnaire_by_id($id = '')
	{
		$this->db->select("q.*, ta.tahun_awal, ta.tahun_akhir, ta.semester, DATE_FORMAT(q.inserted_at, '%d/%m/%Y') AS tgl_buat");
		$this->db->from('kuisioner q');

		$this->db->join('tahun_ajaran ta', 'q.th_ajaran = ta.id_tahun_ajaran', 'left');
		$this->db->where('q.id_kuisioner', $id);

		$sql = $this->db->get();
		return $sql->result();
	}

	public function get_all_answer_by_id($id_kuisioner = '', $id_pegawai = '')
	{
		$this->db->select('p.tipe_pertanyaan,
                            p.isi_pertanyaan,
                            COALESCE(jp.isi_jawaban, 0) AS jawaban_personal,
                            COALESCE(ja.isi_jawaban, 0) AS jawaban_atasan,
                            COALESCE(js.isi_jawaban, 0) AS jawaban_sejawat');

		$this->db->from('pertanyaan p');
		$this->db->join('jawaban_personal jp', ' p.id_pertanyaan = jp.id_pertanyaan', 'left');
		$this->db->join('jawaban_atasan ja', ' p.id_pertanyaan = ja.id_pertanyaan', 'left');
		$this->db->join('jawaban_sejawat js', ' p.id_pertanyaan = js.id_pertanyaan', 'left');

		$this->db->where('p.id_kuisioner', $id_kuisioner);
		$this->db->where('jp.id_pegawai', $id_pegawai);
		$this->db->where('ja.id_pegawai', $id_pegawai);
		$this->db->where('js.id_pegawai', $id_pegawai);
		$this->db->order_by('p.inserted_at', 'ASC');

		$sql = $this->db->get();
		return $sql->result();
	}

	public function get_all_answer_sum_by_id($id_kuisioner = '', $id_pegawai = '')
	{
		$this->db->select('p.tipe_pertanyaan,                           
                            SUM(COALESCE(jp.isi_jawaban, 0)) AS jawaban_personal,
                            SUM(COALESCE(ja.isi_jawaban, 0)) AS jawaban_atasan,
                            SUM(COALESCE(js.isi_jawaban, 0)) AS jawaban_sejawat');

		$this->db->from('pertanyaan p');
		$this->db->join('jawaban_personal jp', ' p.id_pertanyaan = jp.id_pertanyaan', 'left');
		$this->db->join('jawaban_atasan ja', ' p.id_pertanyaan = ja.id_pertanyaan', 'left');
		$this->db->join('jawaban_sejawat js', ' p.id_pertanyaan = js.id_pertanyaan', 'left');

		$this->db->where('p.id_kuisioner', $id_kuisioner);
		$this->db->where('jp.id_pegawai', $id_pegawai);
		$this->db->where('ja.id_pegawai', $id_pegawai);
		$this->db->where('js.id_pegawai', $id_pegawai);
		$this->db->group_by('p.tipe_pertanyaan');
		$this->db->order_by('p.inserted_at', 'ASC');

		$sql = $this->db->get();
		return $sql->result();
	}

	public function get_employe_by_id($id = '')
	{
		$this->db->select("p.*,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran
                         ");
		$this->db->from('view_pegawai p');
		$this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
		$this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
		$this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
		$this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
		$this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
		$this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
		$this->db->where('p.id_pegawai', $id);

		$sql = $this->db->get();
		return $sql->result();
	}

	public function get_eval_by_id_employe($id_kuisioner = '', $id_pegawai = '')
	{
		$this->db->select('*');
		$this->db->where('id_kuisioner', $id_kuisioner);
		$this->db->where('id_pegawai', $id_pegawai);
		$sql = $this->db->get($this->table_evaluation);
		return $sql->result();
	}

	public function get_data_export_presence_day($id = '')
	{

		$this->db->select("a.*,
                            p.nama_lengkap,
                            p.level_tingkat,
                            p.foto_pegawai_thumb,
                            p.nip,
                            DATE(a.inserted_at) AS tgl_post,
                            DATE_FORMAT(a.inserted_at, '%d/%m/%Y') AS tgl_format,
                            DATE_FORMAT(a.updated_at, '%d/%m/%Y') AS tgl_update,,
                            ta.tahun_awal,
                            ta.tahun_akhir");

		$this->db->from('absensi_pegawai a');
		$this->db->join('pegawai p', 'a.id_pegawai = p.id_pegawai', 'left');
		$this->db->join('tahun_ajaran ta', 'a.th_ajaran = ta.id_tahun_ajaran', 'left');
		$this->db->where("a.id_absensi_pegawai IN ($id)");

		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function get_data_export_presence_month($id_pegawai = '')
	{
		$sql = $this->db->query("SELECT
                                        p.nama_lengkap,
                                        p.nip,
                                        p.foto_pegawai_thumb,
                                        p.level_tingkat,
                                        p.id_pegawai,
                                        IFNULL(h.hadir_masuk, 0) AS hadir_masuk, 
                                        IFNULL(i.izin_masuk, 0) AS izin_masuk,
                                        IFNULL(a.alpha_masuk, 0) AS alpha_masuk,
                                        IFNULL(hp.hadir_pulang, 0) AS hadir_pulang,
                                        IFNULL(ip.izin_pulang, 0) AS izin_pulang,
                                        IFNULL(apl.alpha_pulang, 0) AS alpha_pulang,
                                        IFNULL(tm.telat_masuk, 0) AS telat_masuk,
                                        IFNULL(tp.telat_pulang, 0) AS telat_pulang,
                                        b.bulan,
                                        CONCAT(ta.tahun_awal,'/',ta.tahun_akhir,' ', ta.semester) AS tahun_ajaran
                                    FROM
                                        (
                                        SELECT
                                            MONTH(ap.inserted_at) AS bulan,
                                            th_ajaran
                                        FROM
                                            absensi_pegawai ap
                                        GROUP BY
                                            MONTH(ap.inserted_at)
                                    ) b
                                    JOIN pegawai p LEFT JOIN(
                                        SELECT
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at) AS bulan,
                                            COUNT(ap.id_absensi_pegawai) AS hadir_masuk
                                        FROM
                                            absensi_pegawai ap
                                        WHERE
                                            ap.status_absensi_masuk = 1
                                        GROUP BY
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at)
                                    ) h
                                    ON
                                        p.id_pegawai = h.id_pegawai AND b.bulan = h.bulan
                                    LEFT JOIN(
                                        SELECT
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at) AS bulan,
                                            COUNT(ap.id_absensi_pegawai) AS izin_masuk
                                        FROM
                                            absensi_pegawai ap
                                        WHERE
                                            ap.status_absensi_masuk = 2
                                        GROUP BY
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at)
                                    ) i
                                    ON
                                        p.id_pegawai = i.id_pegawai AND b.bulan = i.bulan
                                    LEFT JOIN(
                                        SELECT
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at) AS bulan,
                                            COUNT(ap.id_absensi_pegawai) AS alpha_masuk
                                        FROM
                                            absensi_pegawai ap
                                        WHERE
                                            ap.status_absensi_masuk = 3
                                        GROUP BY
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at)
                                    ) a
                                    ON
                                        p.id_pegawai = a.id_pegawai AND b.bulan = a.bulan
                                    LEFT JOIN(
                                        SELECT
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at) AS bulan,
                                            COUNT(ap.id_absensi_pegawai) AS hadir_pulang
                                        FROM
                                            absensi_pegawai ap
                                        WHERE
                                            ap.status_absensi_pulang = 1
                                        GROUP BY
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at)
                                    ) hp
                                    ON
                                        p.id_pegawai = hp.id_pegawai AND b.bulan = hp.bulan
                                    LEFT JOIN(
                                        SELECT
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at) AS bulan,
                                            COUNT(ap.id_absensi_pegawai) AS izin_pulang
                                        FROM
                                            absensi_pegawai ap
                                        WHERE
                                            ap.status_absensi_masuk = 2
                                        GROUP BY
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at)
                                    ) ip
                                    ON
                                        p.id_pegawai = ip.id_pegawai AND b.bulan = ip.bulan
                                    LEFT JOIN(
                                        SELECT
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at) AS bulan,
                                            COUNT(ap.id_absensi_pegawai) AS alpha_pulang
                                        FROM
                                            absensi_pegawai ap
                                        WHERE
                                            ap.status_absensi_pulang = 3
                                        GROUP BY
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at)
                                    ) apl
                                    ON
                                        p.id_pegawai = apl.id_pegawai AND b.bulan = apl.bulan
                                    LEFT JOIN(
                                        SELECT
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at) AS bulan,
                                            COUNT(ap.id_absensi_pegawai) AS telat_masuk
                                        FROM
                                            absensi_pegawai ap
                                        WHERE
                                            ap.jam_masuk_telat > 0
                                        GROUP BY
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at)
                                    ) tm
                                    ON
                                        p.id_pegawai = tm.id_pegawai AND b.bulan = tm.bulan
                                    LEFT JOIN(
                                        SELECT
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at) AS bulan,
                                            COUNT(ap.id_absensi_pegawai) AS telat_pulang
                                        FROM
                                            absensi_pegawai ap
                                        WHERE
                                            ap.jam_pulang_telat > 0
                                        GROUP BY
                                            ap.id_pegawai,
                                            MONTH(ap.inserted_at)
                                    ) tp
                                    ON
                                        p.id_pegawai = tp.id_pegawai AND b.bulan = tp.bulan
                                    LEFT JOIN tahun_ajaran ta ON
                                        b.th_ajaran = ta.id_tahun_ajaran
                                    WHERE
                                        p.id_pegawai IN ($id_pegawai)");

		return $sql->result_array();
	}

	//
}
