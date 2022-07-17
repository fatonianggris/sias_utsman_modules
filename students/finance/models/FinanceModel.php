<?php

class FinanceModel extends CI_Model {

    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_class = 'kelas';
    private $table_payment_du = 'tagihan_pembayaran_du';
    private $table_payment_dpb = 'tagihan_pembayaran_dpb';
    private $table_grade = 'tingkat';
    private $table_schoolyear = 'tahun_ajaran';

    public function get_class() {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function get_schoolyear_all() {
        $this->db->select('*');

        $this->db->order_by('inserted_at', 'ASC');
        $this->db->group_by('tahun_awal');

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_grade() {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function get_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_loan_dpb_by_id_student($id_student = '') {

        $this->db->select('DATE_FORMAT(tanggal_invoice, "%m") as bulan, DATE_FORMAT(tanggal_invoice, "%Y") as tahun');
        
        $this->db->where('id_siswa', $id_student);
        $this->db->where('status_pembayaran', 'MENUNGGU');
        $this->db->order_by('inserted_at', 'DESC');
      
        $sql = $this->db->get($this->table_payment_dpb);
        return $sql->result_array();
    }

    public function get_contact() {

        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_payment_loan_dpb_by_id_student($id = '') {
        
        $this->db->select('SUM(nominal_tagihan) AS tunggakan');
        
        $this->db->where('id_siswa', $id);
        $this->db->where('status_pembayaran', 'MENUNGGU');
        $this->db->order_by('inserted_at', 'DESC');
        
        $sql = $this->db->get($this->table_payment_dpb);
        return $sql->result();
    }

    public function get_payment_loan_du_by_id_student($id = '') {

        $sql = $this->db->query("SELECT
                                    (
                                    SELECT
                                        COALESCE(SUM(nominal_tagihan),0)
                                    FROM
                                        tagihan_pembayaran_du
                                    WHERE
                                        id_siswa = $id AND status_pembayaran = 'MENUNGGU'
                                ) AS total_tunggak,
                                (
                                    SELECT
                                        COALESCE(SUM(nominal_tagihan),0)
                                    FROM
                                        tagihan_pembayaran_du
                                    WHERE
                                        id_siswa = $id AND status_pembayaran = 'SUKSES'
                                ) AS total_lunas");
        return $sql->result();
    }

    public function get_payment_dpb_by_id_student($id = '') {
        $this->db->select("r.*, MONTH(r.tanggal_invoice) AS bulan_bayar, s.nisn, s.nis, s.email, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('tagihan_pembayaran_dpb r');

        $this->db->join("siswa s", "r.id_siswa = s.id_siswa AND s.id_siswa = $id");
        $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
      
        $this->db->order_by('r.id_tagihan_pembayaran_dpb', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_payment_du_by_id_student($id = '') {
        $this->db->select("r.*, MONTH(r.tanggal_invoice) AS bulan_bayar, s.nisn, s.nis, s.email, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('tagihan_pembayaran_du r');

        $this->db->join("siswa s", "r.id_siswa = s.id_siswa AND s.id_siswa = $id");
        $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
      
        $this->db->order_by('r.id_tagihan_pembayaran_du', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_payment_du_by_id_payment($id = '') {
        $this->db->select("r.*, MONTH(r.tanggal_invoice) AS bulan_bayar, s.nisn, s.nis, s.email, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('tagihan_pembayaran_du r');

        $this->db->join("siswa s", "r.id_siswa = s.id_siswa");
        $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');

        $this->db->where('r.id_tagihan_pembayaran_du', $id);
        $this->db->order_by('r.id_tagihan_pembayaran_du', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }
    
     public function get_payment_dpb_by_id_payment($id = '') {
        $this->db->select("r.*, MONTH(r.tanggal_invoice) AS bulan_bayar, s.nisn, s.nis, s.email, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('tagihan_pembayaran_dpb r');

        $this->db->join("siswa s", "r.id_siswa = s.id_siswa");
        $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');

        $this->db->where('r.id_tagihan_pembayaran_dpb', $id);
        $this->db->order_by('r.id_tagihan_pembayaran_dpb', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }
    
    

}

?>