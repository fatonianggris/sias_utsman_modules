<?php

class PositionModel extends CI_Model {

    private $table_position = 'jabatan';



    //
    //------------------------------POSITION--------------------------------//
    //
    
public function check_duplicate_position($nama = '') {
        $this->db->where('nama_jabatan', $nama);
        $sql = $this->db->get($this->table_position);
        return $sql->result();
    }

    public function get_old_name_position($id = '') {

        $this->db->select('nama_jabatan');
        $this->db->where('id_jabatan', $id);

        $sql = $this->db->get($this->table_position);
        return $sql->result();
    }

    public function get_all_position() {
        $this->db->select('*');
        $sql = $this->db->get($this->table_position);
        return $sql->result();
    }

    public function insert_position($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_jabatan' => $value['nama_jabatan'],
            'level_jabatan' => $value['level_jabatan'],
            'hasil_nama_jabatan' => $value['hasil_nama_jabatan'],
            'level_tingkat' => $value['level_tingkat']
        );
        $this->db->insert($this->table_position, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_position($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_jabatan' => $value['nama_jabatan'],
            'level_jabatan' => $value['level_jabatan'],
            'level_tingkat' => $value['level_tingkat'],
            'hasil_nama_jabatan' => $value['hasil_nama_jabatan'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_jabatan', $id);
        $this->db->update($this->table_position, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_position($value) {
        $this->db->trans_begin();

        $this->db->where('id_jabatan', $value);
        $this->db->delete($this->table_position);

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