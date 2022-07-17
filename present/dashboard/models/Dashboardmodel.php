<?php

class DashboardModel extends CI_Model {

    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_present = 'absensi_pegawai';
    private $table_present_config = 'absen_config';
    private $table_third_party = 'third_party';

    public function get_third_party_key() {

        $this->db->select('*');
        $this->db->where('id_third_party', 1);
        $sql = $this->db->get($this->table_third_party);
        return $sql->result();
    }

    public function get_total_present($id_pegawai = '') {
        $sql = $this->db->query("SELECT
                                (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_masuk=1 AND a.id_pegawai = '$id_pegawai'
                            ) AS hadir_masuk,
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_masuk=2 AND a.id_pegawai = '$id_pegawai'
                            ) AS izin_absen_masuk,
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_masuk=3 AND a.id_pegawai = '$id_pegawai'
                            ) AS alpha_absen_masuk,
                           
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_pulang=1 AND a.id_pegawai = '$id_pegawai'
                            ) AS hadir_pulang,
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_pulang=2 AND a.id_pegawai = '$id_pegawai'
                            ) AS izin_absen_pulang,
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_pulang=3 AND a.id_pegawai = '$id_pegawai'
                            ) AS alpha_absen_pulang");
        return $sql->result();
    }

    public function get_contact() {

        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_present_config() {

        $this->db->select('*');
        $this->db->where('id_absen_config', 1);
        $sql = $this->db->get($this->table_present_config);
        return $sql->result();
    }

    public function get_general_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_present_now($id_pegawai = '', $date = '') {

        $this->db->select('*');
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where("DATE(inserted_at)", $date);
        $sql = $this->db->get($this->table_present);
        return $sql->result();
    }

    public function update_status_open_client($value) {
        $this->db->trans_begin();

        $data = array(
            'status_klien' => $value,
            'updated_at' => date("Y-m-d H:i:s"),
        );

        $this->db->where('id_general_page', 1);
        $this->db->update($this->table_general_page, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------------------------------------------------------//
//
}

?>