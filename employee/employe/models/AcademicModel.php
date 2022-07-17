<?php

class AcademicModel extends CI_Model {

    private $table_emp = 'pegawai';
    private $table_vemp = 'view_pegawai';
    private $table_position = 'jabatan';
    private $table_schoolyear = 'tahun_ajaran';

    public function get_schoolyear_now() {
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

    public function get_position($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select('*');
        } else {
            $this->db->select('*');
            $this->db->where('level_tingkat', $level_tingkat);
        }

        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_position);
        return $sql->result();
    }

    public function get_employe_report_by_id($id = '') {
        $this->db->select("r.*, p.nip, p.email, p.nama_lengkap, k.nama_kuisioner, p.foto_pegawai_thumb, p.jenis_kelamin, j.nama_jabatan, p.level_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('penilaian r');

        $this->db->join('pegawai p', 'r.id_pegawai = p.id_pegawai', 'left');
        $this->db->join('kuisioner k', 'k.id_kuisioner = r.id_kuisioner', 'left');
        $this->db->join('tahun_ajaran ta', 'k.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->where('r.id_pegawai', $id);
        $this->db->order_by('r.inserted_at', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_employe_presence_by_id($id = '') {
        $this->db->select("ap.*, p.nip, DATE_FORMAT(ap.inserted_at, '%d/%m/%Y') AS tgl_format, p.email, p.nama_lengkap, p.foto_pegawai_thumb, p.jenis_kelamin, j.nama_jabatan, p.level_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('absensi_pegawai ap');

        $this->db->join('pegawai p', 'ap.id_pegawai = p.id_pegawai', 'left');
        $this->db->join('tahun_ajaran ta', 'ap.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->where('ap.id_pegawai', $id);
        $this->db->order_by('ap.inserted_at', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_detail_employe($id = '') {
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
        //$this->db->order_by('p.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_employe_ajax($id_tingkat = '', $id_jabatan = '', $id_jk = '', $id_stat_pegawai = '') {
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

        if ($id_tingkat != 0) {

            $this->db->where('p.level_tingkat', $id_tingkat);
        }

        if ($id_jabatan != 0) {

            $this->db->where('p.id_jabatan', $id_jabatan);
        }

        if ($id_jk != 0) {

            $this->db->where('p.jenis_kelamin', $id_jk);
        }
        if ($id_stat_pegawai != 0) {

            $this->db->where('p.status_pegawai', $id_stat_pegawai);
        }

        $this->db->order_by('p.inserted_at DESC');

        $sql = $this->db->get();
        return $sql;
    }

    //-------------------------------------------------------------------//
}

?>