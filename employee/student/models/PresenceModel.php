<?php

class PresenceModel extends CI_Model {

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

    public function get_presence_all($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select("as.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
            $this->db->from('absensi_siswa as');

            $this->db->join('pegawai p', 'as.id_pegawai = p.id_pegawai', 'left');
            $this->db->join('siswa s', 'as.id_siswa = s.id_siswa', 'left');
            $this->db->join('tahun_ajaran ta', 'as.th_ajaran = ta.id_tahun_ajaran', 'left');
            $this->db->join('kelas k', 'as.id_kelas = k.id_kelas', 'left');
            $this->db->join('tingkat t', 'as.id_tingkat = t.id_tingkat', 'left');
        } else {
            if ($level_tingkat == 1) {
                $this->db->select("as.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
                $this->db->from('absensi_siswa as');

                $this->db->join('pegawai p', 'as.id_pegawai = p.id_pegawai', 'left');
                $this->db->join('siswa s', 'as.id_siswa = s.id_siswa', 'left');
                $this->db->join('tahun_ajaran ta', 'as.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->join('kelas k', 'as.id_kelas = k.id_kelas', 'left');
                $this->db->join('tingkat t', 'as.id_tingkat = t.id_tingkat', 'left');
                $this->db->where('s.level_tingkat', $level_tingkat);
                $this->db->where('s.level_tingkat', 2);
            } else {
                $this->db->select("as.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
                $this->db->from('absensi_siswa as');

                $this->db->join('pegawai p', 'as.id_pegawai = p.id_pegawai', 'left');
                $this->db->join('siswa s', 'as.id_siswa = s.id_siswa', 'left');
                $this->db->join('tahun_ajaran ta', 'as.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->join('kelas k', 'as.id_kelas = k.id_kelas', 'left');
                $this->db->join('tingkat t', 'as.id_tingkat = t.id_tingkat', 'left');
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