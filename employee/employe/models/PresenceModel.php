<?php

class PresenceModel extends CI_Model
{

	private $table_schoolyear = 'tahun_ajaran';
	private $table_present = 'absensi_pegawai';

	public function get_schoolyear()
	{
		$this->db->select('*');
		$this->db->group_by('tahun_awal');
		$this->db->order_by('tahun_awal', 'ASC');

		$sql = $this->db->get($this->table_schoolyear);
		return $sql->result();
	}

	public function get_present_by_id($id_pegawai = '')
	{
		$this->db->select("a.*,
                            p.nama_lengkap,
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

		$this->db->where('a.id_pegawai', $id_pegawai);
		$this->db->order_by('a.inserted_at', 'ASC');

		$sql = $this->db->get();
		return $sql->result();
	}

	public function get_present_all_day($level_jabatan = '', $level_tingkat = '')
	{

		if ($level_jabatan == 0) {

			$this->db->select("a.*,
                            p.nama_lengkap,
                            p.foto_pegawai_thumb,
                            p.nip,
                            DATE(a.inserted_at) AS tgl_post,
                            DATE_FORMAT(a.inserted_at, '%d/%m/%Y') AS tgl_format,
                            DATE_FORMAT(a.updated_at, '%d/%m/%Y') AS tgl_update,,
                            CONCAT(ta.tahun_awal,'-',ta.tahun_akhir) AS tahun_ajaran");

			$this->db->from('absensi_pegawai a');

			$this->db->join('pegawai p', 'a.id_pegawai = p.id_pegawai', 'left');
			$this->db->join('tahun_ajaran ta', 'a.th_ajaran = ta.id_tahun_ajaran', 'left');
		} else {

			$this->db->select("a.*,
                            p.nama_lengkap,
                            p.foto_pegawai_thumb,
                            p.nip,
                            DATE(a.inserted_at) AS tgl_post,
                            DATE_FORMAT(a.inserted_at, '%d/%m/%Y') AS tgl_format,
                            DATE_FORMAT(a.updated_at, '%d/%m/%Y') AS tgl_update,
                            CONCAT(ta.tahun_awal,'-',ta.tahun_akhir) AS tahun_ajaran");

			$this->db->from('absensi_pegawai a');

			$this->db->join('pegawai p', 'a.id_pegawai = p.id_pegawai', 'left');
			$this->db->join('tahun_ajaran ta', 'a.th_ajaran = ta.id_tahun_ajaran', 'left');
			$this->db->where('p.level_tingkat', $level_tingkat);
		}

		$this->db->order_by('a.inserted_at', 'DESC');

		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function get_present_all_month($level_jabatan = '', $level_tingkat = '')
	{

		if ($level_jabatan == 0) {

			$sql = $this->db->query("SELECT
                                        p.nama_lengkap,
                                        p.nip,
                                        p.id_pegawai,
                                        p.foto_pegawai_thumb,
                                        p.level_tingkat,
                                        IFNULL(h.hadir_masuk, 0) AS hadir_masuk, 
                                        IFNULL(i.izin_masuk, 0) AS izin_masuk,
                                        IFNULL(a.alpha_masuk, 0) AS alpha_masuk,
                                        IFNULL(hp.hadir_pulang, 0) AS hadir_pulang,
                                        IFNULL(ip.izin_pulang, 0) AS izin_pulang,
                                        IFNULL(apl.alpha_pulang, 0) AS alpha_pulang,
                                        IFNULL(tm.telat_masuk, 0) AS telat_masuk,
                                        IFNULL(tp.telat_pulang, 0) AS telat_pulang,
                                        b.bulan,
                                        CONCAT(ta.tahun_awal,'-',ta.tahun_akhir) AS tahun_ajaran
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
                                        b.th_ajaran = ta.id_tahun_ajaran");
		} else {

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
                                        CONCAT(ta.tahun_awal,'-',ta.tahun_akhir) AS tahun_ajaran
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
                                   		p.level_tingkat = $level_tingkat");
		}



		return $sql->result_array();
	}

	public function get_employe_present_id($id_present = '')
	{
		$this->db->select("a.*, ta.semester,
                                p.nama_lengkap,
                                p.nip,
                                p.level_tingkat,
                                CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, 
                                DATE(a.inserted_at) AS tgl_asli,
                                DATE_FORMAT(a.inserted_at, '%d/%m/%Y') AS tgl_post,
                                DATE_FORMAT(a.updated_at, '%d/%m/%Y') AS tgl_update,
                         ");
		$this->db->from('absensi_pegawai a');

		$this->db->join('pegawai p', 'p.id_pegawai = a.id_pegawai', 'left');
		$this->db->join('tahun_ajaran ta', 'a.th_ajaran = ta.id_tahun_ajaran', 'left');
		$this->db->where('a.id_absensi_pegawai', $id_present);

		$this->db->order_by('a.inserted_at', 'ASC');

		$sql = $this->db->get();
		return $sql->result();
	}

	//-----------------------------------------------------------------------//
	//
}
