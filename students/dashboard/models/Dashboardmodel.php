<?php

class DashboardModel extends CI_Model {

    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_students = 'absensi_siswa';
    private $table_students_config = 'absen_config';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_payment_dpb = 'tagihan_pembayaran_dpb';
	private $table_payment_du = 'tagihan_pembayaran_du';
    private $table_student = 'siswa';
    private $table_third_party = 'third_party';

    public function get_third_party_key() {

        $this->db->select('*');
        $this->db->where('id_third_party', 1);
        $sql = $this->db->get($this->table_third_party);
        return $sql->result();
    }

    public function get_total_presence($id_siswa = '', $th_ajaran = '') {

        $this->db->select('*');
        $this->db->where("id_siswa", $id_siswa);
        $this->db->where("th_ajaran", $th_ajaran);
        $sql = $this->db->get($this->table_students);
        return $sql->result();
    }

    public function get_schoolyear_now() {

        $this->db->select('*');
        $this->db->where("status_tahun_ajaran", 1);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_contact() {

        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_students_config() {

        $this->db->select('*');
        $this->db->where('id_absen_config', 1);
        $sql = $this->db->get($this->table_students_config);
        return $sql->result();
    }

    public function get_general_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_status_student($id = '') {
        $this->db->select('status_siswa, status_update_biodata');
        $this->db->where('id_siswa', $id);
        $sql = $this->db->get($this->table_student);
        return $sql->result();
    }

    public function get_status_payment_dpb($number = '', $date = '') {

        $this->db->select('*');
        $this->db->where('nomor_siswa', $number);
        $this->db->where("DATE_FORMAT(inserted_at,'%Y-%m')", $date);
        $sql = $this->db->get($this->table_payment_dpb);
        return $sql->result();
    }

	public function get_status_payment_du($number = '', $date = '') {

        $this->db->select('*');
        $this->db->where('nomor_siswa', $number);
        $this->db->where("DATE_FORMAT(inserted_at,'%Y-%m')", $date);
        $sql = $this->db->get($this->table_payment_du);
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
