<?php

class GradeModel extends CI_Model {

    private $table_grade = 'tingkat';

    //
    //------------------------------GRADE--------------------------------//
    //
    
    public function check_duplicate_grade($nama = '') {
        $this->db->where('nama_tingkat', $nama);
        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function get_old_name_grade($id = '') {

        $this->db->select('nama_tingkat');
        $this->db->where('id_tingkat', $id);

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function get_all_grade() {
        $this->db->select('*');
        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function insert_grade($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_tingkat' => $value['nama_tingkat'],
            'level_tingkat' => $value['level_tingkat'],
        );
        $this->db->insert($this->table_grade, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_grade($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_tingkat' => $value['nama_tingkat'],
            'level_tingkat' => $value['level_tingkat'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_tingkat', $id);
        $this->db->update($this->table_grade, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_grade($value) {
        $this->db->trans_begin();

        $this->db->where('id_tingkat', $value);
        $this->db->delete($this->table_grade);

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