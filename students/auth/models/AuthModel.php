<?php

class AuthModel extends CI_Model {

    private $table_student = 'siswa';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';

    //
    //-------------------------------AUTH------------------------------//
    //
    

     public function check_nis_student($value = '') {
        $this->db->where('nis', $value['nis']);
        $sql = $this->db->get($this->table_student);
        return $sql->result();
    }

    public function data_student($value = '') {

        $this->db->select("s.id_siswa,
                            s.nisn,
                            s.nis,
                            s.nik,
                            s.id_tingkat,
                            s.level_tingkat,
                            s.id_kelas,
                            s.no_akta_kelahiran,
                            s.nama_lengkap,
                            s.nama_panggilan,
                            s.jenis_kelamin,
                            s.tempat_lahir,
                            s.tanggal_lahir,
                            s.agama,
                            s.nomor_handphone,
                            s.email,
                            s.jalur,
                            s.nama_wali,
                            s.kodepos_dom,
                            s.alamat_rumah_dom,
                            s.rt_dom,
                            s.rw_dom,
                            s.foto_siswa,
                            s.foto_siswa_thumb,
                            s.barcode,
                            s.th_ajaran,
                            s.status_transisi,
                            s.status_siswa,
                            t.nama_tingkat,
                            COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas");
        $this->db->from('siswa s');
        $this->db->where('s.nis', $value['nis']);
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');

        $sql = $this->db->get();
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

    public function check_email_account($email = '') {
        $this->db->where('email', $email);
        $sql = $this->db->get($this->table_student);
        return $sql->result();
    }

    public function reset_account_password($email = '', $password = '') {
        $this->db->trans_begin();

        $data = array(
            'password' => password_hash(paramEncrypt($password), PASSWORD_DEFAULT, array('cost' => 12)),
        );

        $this->db->where('email', $email);
        $this->db->update($this->table_student, $data);

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