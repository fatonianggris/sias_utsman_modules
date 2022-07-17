<?php

class StudentModel extends CI_Model {

    private $table_position = 'jabatan';
    private $table_class = 'kelas';
    private $table_grade = 'tingkat';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_student = 'siswa';

    //
    //-------------------------------SITEMAP------------------------------//
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
        $this->db->where('status_tahun_ajaran', 1);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_schoolyear_all() {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'ASC');
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }


    public function get_students_report_by_id($id = '') {
        $this->db->select("r.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.email, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('rapor_siswa r');

        $this->db->join('pegawai p', 'r.id_pegawai = p.id_pegawai', 'left');
        $this->db->join("siswa s", "r.id_siswa = s.id_siswa AND s.id_siswa = $id");
        $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');

        $this->db->order_by('ta.id_tahun_ajaran', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_students_presence_by_id($id = '') {
        $this->db->select("as.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('absensi_siswa as');

        $this->db->join('siswa s', "as.id_siswa = s.id_siswa AND s.id_siswa = $id");
        $this->db->join('tahun_ajaran ta', 'as.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('pegawai p', 'as.id_pegawai = p.id_pegawai', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
        $this->db->order_by('ta.id_tahun_ajaran', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_students_all($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select("s.*, t.nama_tingkat, COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas, CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, ta.semester");
            $this->db->from('view_siswa s');
            $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
            $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
            $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
        } else {
            if ($level_tingkat == 1) {
                $this->db->select("s.*, t.nama_tingkat, COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas, CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, ta.semester");
                $this->db->from('view_siswa s');
                $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
                $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
                $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->where('s.level_tingkat', $level_tingkat);
                $this->db->where('s.level_tingkat', 2);
            } else {
                $this->db->select("s.*, t.nama_tingkat, COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas, CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, ta.semester");
                $this->db->from('view_siswa s');
                $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
                $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
                $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->where('s.level_tingkat', $level_tingkat);
            }
        }

        $this->db->order_by('s.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_detail_student($id = '') {
        $this->db->select("s.*, 
                                wpagt.nama AS nama_provinsi_kk,                                    
                                wkbagt.nama AS nama_kabupaten_kota_kk,
                                wkbagt.administratif AS nama_kabupaten_kota_kk_adm,
                                wkagt.nama AS nama_kecamatan_kk,
                                wdagt.nama AS nama_kelurahan_desa_kk, 
                                wdagt.administratif AS nama_kelurahan_desa_kk_adm,                                
                                wpasl.nama AS nama_provinsi_dom,                                    
                                wkbasl.nama AS nama_kabupaten_kota_dom,
                                wkbasl.administratif AS nama_kabupaten_kota_dom_adm,
                                wkasl.nama AS nama_kecamatan_dom,
                                wdasl.nama AS nama_kelurahan_desa_dom, 
                                wdasl.administratif AS nama_kelurahan_desa_dom_adm,
                                k.nama_kelas,
                                t.nama_tingkat,
                                CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran,
                                ta.nama_tahun_ajaran
                         ");
        $this->db->from('view_siswa s');

        $this->db->join('wilayah_desa wdagt', 's.kelurahan_desa_kk = wdagt.id AND s.provinsi_kk = wdagt.id_dati1 AND s.kabupaten_kota_kk = wdagt.id_dati2 AND s.kecamatan_kk = wdagt.id_dati3', 'left');
        $this->db->join('wilayah_kecamatan wkagt', 's.kecamatan_kk = wkagt.id AND s.provinsi_kk = wkagt.id_dati1 AND s.kabupaten_kota_kk = wkagt.id_dati2', 'left');
        $this->db->join('wilayah_kabupaten wkbagt', 's.kabupaten_kota_kk = wkbagt.id AND s.provinsi_kk = wkbagt.id_dati1', 'left');
        $this->db->join('wilayah_provinsi wpagt', 's.provinsi_kk = wpagt.id', 'left');

        $this->db->join('wilayah_desa wdasl', 's.kelurahan_desa_dom = wdasl.id AND s.provinsi_dom = wdasl.id_dati1 AND s.kabupaten_kota_dom = wdasl.id_dati2 AND s.kecamatan_dom = wdasl.id_dati3', 'left');
        $this->db->join('wilayah_kecamatan wkasl', 's.kecamatan_dom = wkasl.id AND s.provinsi_dom = wkasl.id_dati1 AND s.kabupaten_kota_dom = wkasl.id_dati2', 'left');
        $this->db->join('wilayah_kabupaten wkbasl', 's.kabupaten_kota_dom = wkbasl.id AND s.provinsi_dom = wkbasl.id_dati1', 'left');
        $this->db->join('wilayah_provinsi wpasl', 's.provinsi_dom = wpasl.id', 'left');

        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
        $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('s.id_siswa', $id);
        //$this->db->order_by('p.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function register_student($id_siswa = '', $id_tingkat = '', $level_tingkat = '', $id_tahun_ajaran = '') {
        $this->db->trans_begin();

        $data = array(
            'id_tingkat' => $id_tingkat,
            'level_tingkat' => $level_tingkat,
            'status_siswa' => 1,
            'th_ajaran' => $id_tahun_ajaran,
        );

        $this->db->where_in('id_siswa ', $id_siswa);
        $this->db->update($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------------------------------------------------//
}

?>