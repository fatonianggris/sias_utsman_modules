<?php

class ReportModel extends CI_Model {

    private $table_vstudent = 'view_siswa';
    private $table_student = 'siswa';
    private $table_employe = 'pegawai';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_class = 'kelas';
    private $table_grade = 'tingkat';
    private $table_report = 'rapor_siswa';

    //
    //------------------------------COUNT--------------------------------//
    //
    
    public function get_class($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select('*');
            $this->db->order_by('inserted_at', 'ASC');
        } else {
            $this->db->select('*');
            $this->db->where('level_tingkat', $level_tingkat);
            $this->db->order_by('inserted_at', 'ASC');
        }

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function get_grade($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select('*');
            $this->db->order_by('inserted_at', 'ASC');
        } else {
            $this->db->select('*');
            $this->db->where('level_tingkat', $level_tingkat);
            $this->db->order_by('inserted_at', 'ASC');
        }

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function get_schoolyear() {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_homeroom_teacher($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select('*');
        } else {
            $this->db->select('*');
            $this->db->where('level_tingkat', $level_tingkat);
        }
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_employe);
        return $sql->result();
    }

    public function get_report_all($level_jabatan = '', $level_tingkat = '') {


        if ($level_jabatan == 0) {
            $this->db->select("r.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.foto_siswa_thumb, s.jenis_kelamin,s.status_siswa, s.nama_lengkap AS nama_siswa, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
            $this->db->from('rapor_siswa r');

            $this->db->join('siswa s', 'r.id_siswa = s.id_siswa', 'left');
            $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
            $this->db->join('kelas k', 'r.id_kelas = k.id_kelas', 'left');
            $this->db->join('tingkat t', 'r.id_tingkat = t.id_tingkat', 'left');
            $this->db->join('pegawai p', 'p.id_pegawai = r.id_pegawai', 'left');
        } else {
            if ($level_tingkat == 1) {
                $this->db->select("r.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.foto_siswa_thumb, s.jenis_kelamin,s.status_siswa, s.nama_lengkap AS nama_siswa, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
                $this->db->from('rapor_siswa r');

                $this->db->join('siswa s', 'r.id_siswa = s.id_siswa', 'left');
                $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->join('kelas k', 'r.id_kelas = k.id_kelas', 'left');
                $this->db->join('tingkat t', 'r.id_tingkat = t.id_tingkat', 'left');
                $this->db->join('pegawai p', 'p.id_pegawai = r.id_pegawai', 'left');
                $this->db->where('s.level_tingkat', $level_tingkat);
                $this->db->where('s.level_tingkat', 2);
            } else {
                $this->db->select("r.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.foto_siswa_thumb, s.jenis_kelamin,s.status_siswa, s.nama_lengkap AS nama_siswa, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
                $this->db->from('rapor_siswa r');

                $this->db->join('siswa s', 'r.id_siswa = s.id_siswa', 'left');
                $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->join('kelas k', 'r.id_kelas = k.id_kelas', 'left');
                $this->db->join('tingkat t', 'r.id_tingkat = t.id_tingkat', 'left');
                $this->db->join('pegawai p', 'p.id_pegawai = r.id_pegawai', 'left');
                $this->db->where('s.level_tingkat', $level_tingkat);
            }
        }

        $this->db->order_by('ta.id_tahun_ajaran', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    //-----------------------------------------------------------------------//
//
}

?>