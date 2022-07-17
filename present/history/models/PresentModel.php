<?php

class PresentModel extends CI_Model {

    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_present = 'absensi_pegawai';
    private $table_present_config = 'absen_config';
    private $table_location = 'lokasi';
    private $table_schoolyear = 'tahun_ajaran';

    //
    //------------------------------BUDGET--------------------------------//
    //  

    public function get_all_polygon() {

        $this->db->select('lat, longt');
        $sql = $this->db->get($this->table_location);
        return $sql->result_array();
    }

    public function get_schoolyear_all() {

        $this->db->select('*');
        $this->db->group_by("tahun_awal");
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_present_config() {

        $this->db->select('*');
        $this->db->where('id_absen_config', 1);
        $sql = $this->db->get($this->table_present_config);
        return $sql->result();
    }

    public function get_present_now($id_pegawai = '', $date = '') {

        $this->db->select('*');
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where("DATE(inserted_at)", $date);
        $sql = $this->db->get($this->table_present);
        return $sql->result();
    }

    public function get_contact() {

        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_history_present_all($id_pegawai = '') {
        $this->db->select("a.*,ta.semester,
                                p.nama_lengkap,
                                p.nip,
                                p.level_tingkat,
                                CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, 
                                DATE(a.inserted_at) AS tgl_post,
                                DATE_FORMAT(a.inserted_at, '%d/%m/%Y') AS tgl_format,
                                DATE_FORMAT(a.updated_at, '%d/%m/%Y') AS tgl_update,                          
                         ");
        $this->db->from('absensi_pegawai a');

        $this->db->join('pegawai p', 'p.id_pegawai = a.id_pegawai', 'left');
        $this->db->join('tahun_ajaran ta', 'a.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('a.id_pegawai', $id_pegawai);

        $this->db->order_by('a.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_history_present_id($id_present = '') {
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

    public function insert_present_in($id_pegawai = '', $tanggal = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'lat_masuk' => $value['lat'],
            'longt_masuk' => $value['longt'],
            'jam_masuk' => date("H:i:s"),
            'jam_masuk_telat' => $value['jam_telat'],
            'status_absensi_masuk' => 1,
            'foto_absensi_masuk' => @$value['foto_bukti'],
            'foto_absensi_masuk_thumb' => @$value['foto_bukti_thumb'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where("DATE(inserted_at)", $tanggal);
        $this->db->update($this->table_present, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_present_out($id_pegawai = '', $tanggal = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'lat_pulang' => $value['lat'],
            'longt_pulang' => $value['longt'],
            'jam_pulang' => date("H:i:s"),
            'jam_pulang_telat' => $value['jam_telat'],
            'status_absensi_pulang' => 1,
            'foto_absensi_pulang' => @$value['foto_bukti'],
            'foto_absensi_pulang_thumb' => @$value['foto_bukti_thumb'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where("DATE(inserted_at)", $tanggal);
        $this->db->update($this->table_present, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_present_permission_in($id_pegawai = '', $tanggal = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'lat_masuk' => $value['lat'],
            'longt_masuk' => $value['longt'],
            'jam_masuk' => date("H:i:s"),
            'status_absensi_masuk' => 2,
            'foto_absensi_masuk' => @$value['foto_bukti'],
            'foto_absensi_masuk_thumb' => @$value['foto_bukti_thumb'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where("DATE(inserted_at)", $tanggal);
        $this->db->update($this->table_present, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_present_permission_out($id_pegawai = '', $tanggal = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'lat_pulang' => $value['lat'],
            'longt_pulang' => $value['longt'],
            'jam_pulang' => date("H:i:s"),
            'status_absensi_pulang' => 2,
            'foto_absensi_pulang' => @$value['foto_bukti'],
            'foto_absensi_pulang_thumb' => @$value['foto_bukti_thumb'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where("DATE(inserted_at)", $tanggal);
        $this->db->update($this->table_present, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------------------------------------------------------//
}

?>