<?php

class AcademicModel extends CI_Model {

    private $rapor_siswa = 'rapor_siswa';
    private $absensi_siswa = 'absensi_siswa';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_class = 'kelas';
    private $table_grade = 'tingkat';
    private $table_schoolyear = 'tahun_ajaran';

    public function get_class() {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'DESC');

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function get_schoolyear_all() {
        $this->db->select('*');

        $this->db->order_by('inserted_at', 'DESC');
        $this->db->group_by('tahun_awal');
        
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_grade() {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'DESC');

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function get_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_contact() {

        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_report_by_id_student($id = '') {
        $this->db->select("r.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.nis, s.email, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('rapor_siswa r');

        $this->db->join('pegawai p', 'r.id_pegawai = p.id_pegawai', 'left');
        $this->db->join("siswa s", "r.id_siswa = s.id_siswa AND s.id_siswa = $id");
        $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');

        $this->db->order_by('ta.id_tahun_ajaran', 'DESC');
        
        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_presence_by_id_student($id = '') {
        $this->db->select("as.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.nis, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('absensi_siswa as');

        $this->db->join('siswa s', "as.id_siswa = s.id_siswa AND s.id_siswa = $id");
        $this->db->join('tahun_ajaran ta', 'as.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('pegawai p', 'as.id_pegawai = p.id_pegawai', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
        $this->db->order_by('ta.id_tahun_ajaran', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_report_by_id_report($id = '') {
        $this->db->select("r.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.nis, s.email, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('rapor_siswa r');

        $this->db->join('pegawai p', 'r.id_pegawai = p.id_pegawai', 'left');
        $this->db->join("siswa s", "r.id_siswa = s.id_siswa");
        $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');

        $this->db->where('r.id_rapor_siswa', $id);
        $this->db->order_by('ta.id_tahun_ajaran', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

}

?>