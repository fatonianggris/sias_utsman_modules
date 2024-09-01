<?php

class SavingModel extends CI_Model
{

    private $rapor_siswa = 'rapor_siswa';
    private $absensi_siswa = 'absensi_siswa';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_class = 'kelas';
    private $table_grade = 'tingkat';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_vstudent = 'view_siswa';

    public function get_class()
    {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'DESC');

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function get_schoolyear_all()
    {
        $this->db->select('*');

        $this->db->order_by('inserted_at', 'DESC');
        $this->db->group_by('tahun_awal');

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_grade()
    {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'DESC');

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

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

    public function get_all_saldo_by_nis_student($nis = "")
    {
        $this->db->select('saldo_tabungan_umum, saldo_tabungan_qurban, saldo_tabungan_wisata');
        $this->db->where('nis', $nis);
        $sql = $this->db->get($this->table_vstudent);
        return $sql->result();
    }
    public function get_general_saving_by_nis_student($nis = '')
    {
        $this->db->select("t.id_transaksi_umum,
							t.nis_siswa,
							t.nomor_transaksi_umum,
							t.id_tingkat,
							t.catatan,
							t.saldo,
							t.nominal,
							t.th_ajaran,
							t.status_kredit_debet,
							DATE_FORMAT(
								t.waktu_transaksi,
								'%d/%m/%Y %H:%i:%s'
							) AS waktu_transaksi,
							CONCAT(
								panel_utsman.ta.tahun_awal,
								'/',
								panel_utsman.ta.tahun_akhir
							) AS tahun_ajaran,
							t.tanggal_transaksi");
        $this->db->from('transaksi_tabungan_umum t');
        $this->db->join('tahun_ajaran ta', 't.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('t.nis_siswa', $nis);
        $this->db->order_by('t.id_transaksi_umum', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_qurban_saving_by_nis_student($nis = '')
    {
        $this->db->select("t.id_transaksi_qurban,
							t.nis_siswa,
							t.nomor_transaksi_qurban,
							t.id_tingkat,
							t.catatan,
							t.saldo,
							t.nominal,
							t.th_ajaran,
							t.status_kredit_debet,
							DATE_FORMAT(
								t.waktu_transaksi,
								'%d/%m/%Y %H:%i:%s'
							) AS waktu_transaksi,
							CONCAT(
								panel_utsman.ta.tahun_awal,
								'/',
								panel_utsman.ta.tahun_akhir
							) AS tahun_ajaran,
							t.tanggal_transaksi");
        $this->db->from('transaksi_tabungan_qurban t');
        $this->db->join('tahun_ajaran ta', 't.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('t.nis_siswa', $nis);
        $this->db->order_by('t.id_transaksi_qurban', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_tour_saving_by_nis_student($nis = '')
    {
        $this->db->select("t.id_transaksi_wisata,
							t.nis_siswa,
							t.nomor_transaksi_wisata,
							t.id_tingkat,
							t.catatan,
							t.saldo,
							t.nominal,
							t.th_ajaran,
							t.status_kredit_debet,
							DATE_FORMAT(
								t.waktu_transaksi,
								'%d/%m/%Y %H:%i:%s'
							) AS waktu_transaksi,
							CONCAT(
								panel_utsman.ta.tahun_awal,
								'/',
								panel_utsman.ta.tahun_akhir
							) AS tahun_ajaran,
							t.tanggal_transaksi");
        $this->db->from('transaksi_tabungan_wisata t');
        $this->db->join('tahun_ajaran ta', 't.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('t.nis_siswa', $nis);
        $this->db->order_by('t.id_transaksi_wisata', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

}
