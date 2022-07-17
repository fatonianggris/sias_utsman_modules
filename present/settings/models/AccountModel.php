<?php

class AccountModel extends CI_Model {

    private $table_account = 'pegawai';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_structure = 'struktur_akun';

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

    public function get_account_id($id = '') {
        $this->db->where('id_pegawai', $id);
        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    public function update_account_profile($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'foto_pegawai' => @$value['foto_pegawai'],
            'foto_pegawai_thumb' => @$value['foto_pegawai_thumb'],
            'update_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pegawai', $id);
        $this->db->update($this->table_account, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_password($id = '', $password = '') {
        $this->db->trans_begin();

        $data = array(
            'password' => password_hash(paramEncrypt($password), PASSWORD_DEFAULT, array('cost' => 12)),
        );

        $this->db->where('id_pegawai', $id);
        $this->db->update($this->table_account, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function reset_account_password($email = '', $password = '') {
        $this->db->trans_begin();

        $data = array(
            'password' => password_hash(paramEncrypt($password), PASSWORD_DEFAULT, array('cost' => 12)),
        );

        $this->db->where('id_pegawai', $email);
        $this->db->update($this->table_account, $data);

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