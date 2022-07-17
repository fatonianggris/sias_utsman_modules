<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ApiLocationModel extends CI_Model {

    /**
     * Get location office on database.
     *
     * @return array
     */
    public function getLocationArea() {
        $this->db->select('*');
        $this->db->from('lokasi');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get md5 location office.
     *
     * @return array
     */
    public function getMd5Location() {
        $this->db->select('*');
        $this->db->from('absen_config');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Store location office.
     *
     * @param $post
     * @return bool
     */
    public function insertLocation($post) {
        $string = array(
            'lat' => $post['lat'],
            'longt' => $post['longt'],
        );

        $q = $this->db->insert_string('lokasi', $string);
        $this->db->query($q);
        $check = $this->db->insert_id();

        return $check ? true : false;
    }

    /**
     * Delete location office.
     *
     * @return void
     */
    public function deleteTableLocation() {
        $this->db->empty_table('lokasi');
    }

    /**
     * Store md5 location office.
     *
     * @param $post
     * @return bool
     */
    public function insertMd5($post) {
        $string = array(
            'md5' => $post['md5'],
        );

        $this->db->where('id_absen_config', 1);
        $this->db->update('absen_config', $string);
        $this->db->trans_complete();

        $success = $this->db->affected_rows();

        if ($success) {
            return true;
        }

        return false;
    }

}
