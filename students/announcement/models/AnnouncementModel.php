<?php

class AnnouncementModel extends CI_Model {

    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_announcement = 'pengumuman';
    private $table_schoolyear = 'tahun_ajaran';

    public function get_schoolyear_now() {
        
        $this->db->select('*');
        $this->db->where('status_tahun_ajaran', 1);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

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

    public function get_announcement_students() {

        $this->db->select('*');
        $this->db->where('tujuan', 1);
        $this->db->order_by('inserted_at', 'DESC');
        
        $sql = $this->db->get($this->table_announcement);
        return $sql->result();
    }

    //------------------------------------------------//
}

?>