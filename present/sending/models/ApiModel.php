<?php

class ApiModel extends CI_Model {

    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_third_party = 'third_party';
    private $table_present_config = 'absen_config';
    private $table_present_emp = 'absensi_pegawai';
    private $table_schoolyear = 'tahun_ajaran';

    //
    //-------------------------------AUTH------------------------------//
    //
    
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

    public function get_schoolyear() {

        $this->db->select('*');
        $this->db->where('status_tahun_ajaran', 1);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_third_party_key() {

        $this->db->select('*');
        $this->db->where('id_third_party', 1);
        $sql = $this->db->get($this->table_third_party);
        return $sql->result();
    }

    public function get_present_config() {

        $this->db->select('*');
        $this->db->where('id_absen_config', 1);
        $sql = $this->db->get($this->table_present_config);
        return $sql->result();
    }

    public function insert_present() {
        $this->db->query("INSERT INTO absensi_pegawai(id_pegawai,th_ajaran)
                                    SELECT
                                        id_pegawai,   
                                        (
                                        SELECT
                                            id_tahun_ajaran
                                        FROM
                                            tahun_ajaran
                                        WHERE
                                            status_tahun_ajaran = 1
                                    )
                                    FROM
                                        pegawai
                                    WHERE
                                        status_pegawai = 1");
        
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_present_in_exp($date = '', $th_ajaran = '') {
        $this->db->trans_begin();

        $data = array(
            'status_absensi_masuk' => 3,
        );

        $this->db->where('status_absensi_masuk', 0);
        $this->db->where("DATE(inserted_at)", $date);
        $this->db->where("th_ajaran", $th_ajaran);

        $this->db->update($this->table_present_emp, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_present_out_exp($date = '', $th_ajaran = '') {
        $this->db->trans_begin();

        $data = array(
            'status_absensi_pulang' => 3,
        );

        $this->db->where('status_absensi_pulang', 0);
        $this->db->where("DATE(inserted_at)", $date);
        $this->db->where("th_ajaran", $th_ajaran);

        $this->db->update($this->table_present_emp, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //----------------------------------------------------------------//
}

?>