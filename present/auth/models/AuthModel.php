<?php

class AuthModel extends CI_Model {

    private $table_employe = 'pegawai';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';

    //
    //-------------------------------AUTH------------------------------//
    //
    

     public function check_employe($value = '') {
        $this->db->where('email', $value['email']);
        $sql = $this->db->get($this->table_employe);
        return $sql->result();
    }

    public function data_employe($value = '') {

        $this->db->select("p.id_pegawai,
                        p.id_jabatan,
                        k.id_kelas,
                        p.level_tingkat,
                        p.nik,
                        p.nip,
                        p.email,
                        p.nama_lengkap,
                        p.jenis_kelamin,
                        p.agama,
                        p.warga_negara,
                        p.status_nikah,
                        p.pendidikan,
                        p.jumlah_anak,
                        p.tempat_lahir,
                        p.tanggal_lahir,
                        p.nomor_hp,
                        p.jam_pelajaran,
                        p.jenis_pegawai,
                        p.golongan,
                        p.alamat_lengkap,
                        p.provinsi,
                        p.kabupaten_kota,
                        p.kecamatan,
                        p.kelurahan_desa,
                        p.rt,
                        p.rw,
                        p.kodepos,
                        p.npwp,
                        p.nama_wajib_pajak,
                        p.tanggal_masuk,
                        p.tanggal_keluar,
                        p.inserted_at,
                        p.th_ajaran,
                        p.foto_pegawai,
                        p.foto_pegawai_thumb,
                        p.status_wali_kelas,
                        p.status_pegawai");
        $this->db->from('pegawai p');
        $this->db->where('p.email', $value['email']);
        $this->db->join('kelas k', 'p.id_pegawai = k.id_pegawai', 'left');

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
        $sql = $this->db->get($this->table_employe);
        return $sql->result();
    }

    public function reset_account_password($email = '', $password = '') {
        $this->db->trans_begin();

        $data = array(
            'password' => password_hash(paramEncrypt($password), PASSWORD_DEFAULT, array('cost' => 12)),
        );

        $this->db->where('email', $email);
        $this->db->update($this->table_employe, $data);

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
