<?php

class SchoolyearModel extends CI_Model {

    private $table_schoolyear = 'tahun_ajaran';


    //
    //------------------------------SCHOOLYEAR--------------------------------//
    //
    
    public function check_duplicate_schoolyear($nama = '') {
        $this->db->where('nama_tahun_ajaran', $nama);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_old_name_schoolyear($id = '') {

        $this->db->select('nama_tahun_ajaran');
        $this->db->where('id_tahun_ajaran', $id);

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function disable_status_schoolyear() {
        $this->db->trans_begin();

        $data = array(
            'status_tahun_ajaran' => 0,
        );

        $this->db->update($this->table_schoolyear, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_schoolyear($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_tahun_ajaran' => $value,
        );

        $this->db->where('id_tahun_ajaran', $id);
        $this->db->update($this->table_schoolyear, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_all_schoolyear() {
        $this->db->select('*');
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function insert_schoolyear($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_tahun_ajaran' => $value['nama_tahun_ajaran'],
            'tahun_awal' => $value['tahun_awal'],
            'tahun_akhir' => $value['tahun_akhir'],
            'semester' => $value['semester'],
            'status_tahun_ajaran' => $value['status_tahun_ajaran']
        );
        $this->db->insert($this->table_schoolyear, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_schoolyear($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_tahun_ajaran' => $value['nama_tahun_ajaran'],
            'tahun_awal' => $value['tahun_awal'],
            'tahun_akhir' => $value['tahun_akhir'],
            'semester' => $value['semester'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_tahun_ajaran', $id);
        $this->db->update($this->table_schoolyear, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_schoolyear($value) {
        $this->db->trans_begin();

        $this->db->where('id_tahun_ajaran', $value);
        $this->db->delete($this->table_schoolyear);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //--------------------------------------------------------------------//
//
}

?>