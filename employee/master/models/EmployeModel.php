<?php

class EmployeModel extends CI_Model {

    private $table_emp = 'pegawai';
    private $table_vemp = 'view_pegawai';
    private $table_provinsi = 'wilayah_provinsi';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_position = 'jabatan';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';

    //
    //------------------------------COUNT--------------------------------//
    //

    public function get_schoolyear() {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'ASC');

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

    //---------------------------------------EMPLOYEE---------------------------------------// 

    public function get_employe_id($id = '') {

        $this->db->where('id_pegawai', $id);

        $sql = $this->db->get($this->table_emp);
        return $sql->result();
    }

    public function get_position($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select('*');
        } else {
            $this->db->select('*');
            $this->db->where('level_tingkat', $level_tingkat);
        }

        $this->db->order_by('inserted_at', 'ASC');
        $sql = $this->db->get($this->table_position);
        return $sql->result();
    }

    public function get_nik_employe($nik = '') {

        $this->db->where('nik', $nik);

        $sql = $this->db->get($this->table_emp);
        return $sql->result();
    }

    public function check_duplicate_nik($nik = '') {

        $this->db->where('nik', $nik);

        $sql = $this->db->get($this->table_emp);
        return $sql->result();
    }

    public function get_nip_employe($nip = '') {

        $this->db->where('nip', $nip);

        $sql = $this->db->get($this->table_emp);
        return $sql->result();
    }

    public function get_old_employe($id = '') {

        $this->db->select('nama_lengkap, nip, nik, foto_pegawai');
        $this->db->where('id_pegawai', $id);

        $sql = $this->db->get($this->table_emp);
        return $sql->result();
    }

    public function get_detail_employe($id = '') {
        $this->db->select("p.*,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran
                         ");
        $this->db->from('view_pegawai p');
        $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
        $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
        $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
        $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
        $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('p.id_pegawai', $id);
        //$this->db->order_by('p.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_employe_all($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select("p.*,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran
                         ");
            $this->db->from('view_pegawai p');
            $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
            $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
            $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
            $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
            $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
            $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
        } else {
            $this->db->select("p.*,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran
                         ");
            $this->db->from('view_pegawai p');
            $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
            $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
            $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
            $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
            $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
            $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
            $this->db->where('p.level_tingkat', $level_tingkat);
        }

        //$this->db->where('nik', $nik);
        $this->db->order_by('p.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function update_employe_password($id = '', $password = '') {
        $this->db->trans_begin();

        $data = array(
            'password' => password_hash(paramEncrypt($password), PASSWORD_DEFAULT, array('cost' => 12)),
        );

        $this->db->where('id_pegawai', $id);
        $this->db->update($this->table_emp, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_employee($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_jabatan' => $value['id_jabatan'],
            'level_tingkat' => $value['level_tingkat'],
            'nik' => $value['nik'],
            'nip' => @$value['nip'],
            'password' => password_hash(paramEncrypt($value['password']), PASSWORD_DEFAULT, array('cost' => 12)),
            'email' => $value['email'],
            'nama_lengkap' => $value['nama_lengkap'],
            'jenis_kelamin' => $value['jenis_kelamin'],
            'agama' => $value['agama'],
            'warga_negara' => $value['warga_negara'],
            'status_nikah' => $value['status_nikah'],
            'pendidikan' => $value['pendidikan'],
            'spesialisasi' => @$value['spesialisasi'],
            'program_keahlian' => @$value['program_keahlian'],
            'jumlah_anak' => $value['jumlah_anak'],
            'tempat_lahir' => $value['tempat_lahir'],
            'tanggal_lahir' => $value['tanggal_lahir'],
            'nomor_hp' => $value['nomor_hp'],
            'jam_pelajaran' => @$value['jam_pelajaran'],
            'jenis_pegawai' => $value['jenis_pegawai'],
            'alamat_lengkap' => $value['alamat_lengkap'],
            'provinsi' => $value['provinsi'],
            'kabupaten_kota' => $value['kabupaten_kota'],
            'kecamatan' => $value['kecamatan'],
            'kelurahan_desa' => $value['kelurahan_desa'],
            'rt' => $value['rt'],
            'rw' => $value['rw'],
            'kodepos' => $value['kodepos'],
            'golongan' => @$value['golongan'],
            'npwp' => @$value['npwp'],
            'nama_wajib_pajak' => @$value['nama_wajib_pajak'],
            'tanggal_masuk' => $value['tanggal_masuk'],
            'th_ajaran' => $value['th_ajaran'],
            'foto_pegawai' => @$value['foto_pegawai'],
            'foto_pegawai_thumb' => @$value['foto_pegawai_thumb'],
        );

        $this->db->insert($this->table_emp, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_employe($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_jabatan' => $value['id_jabatan'],
            'level_tingkat' => $value['level_tingkat'],
            'nik' => $value['nik'],
            'nip' => @$value['nip'],
            'email' => $value['email'],
            'nama_lengkap' => $value['nama_lengkap'],
            'jenis_kelamin' => $value['jenis_kelamin'],
            'agama' => $value['agama'],
            'warga_negara' => $value['warga_negara'],
            'status_nikah' => $value['status_nikah'],
            'pendidikan' => $value['pendidikan'],
            'spesialisasi' => @$value['spesialisasi'],
            'program_keahlian' => @$value['program_keahlian'],
            'jumlah_anak' => $value['jumlah_anak'],
            'tempat_lahir' => $value['tempat_lahir'],
            'tanggal_lahir' => $value['tanggal_lahir'],
            'nomor_hp' => $value['nomor_hp'],
            'jam_pelajaran' => @$value['jam_pelajaran'],
            'jenis_pegawai' => $value['jenis_pegawai'],
            'alamat_lengkap' => $value['alamat_lengkap'],
            'provinsi' => $value['provinsi'],
            'kabupaten_kota' => $value['kabupaten_kota'],
            'kecamatan' => $value['kecamatan'],
            'kelurahan_desa' => $value['kelurahan_desa'],
            'rt' => $value['rt'],
            'rw' => $value['rw'],
            'kodepos' => $value['kodepos'],
            'golongan' => @$value['golongan'],
            'npwp' => @$value['npwp'],
            'nama_wajib_pajak' => @$value['nama_wajib_pajak'],
            'tanggal_masuk' => $value['tanggal_masuk'],
            'th_ajaran' => $value['th_ajaran'],
            'foto_pegawai' => @$value['foto_pegawai'],
            'foto_pegawai_thumb' => @$value['foto_pegawai_thumb'],
        );

        $this->db->where('id_pegawai', $id);
        $this->db->update($this->table_emp, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_employe($value) {
        $this->db->trans_begin();

        $this->db->where('id_pegawai', $value);
        $this->db->delete($this->table_emp);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------------GET AJAX WILAYAH---------------------------------------// 

    public function get_provinsi() {

        $this->db->select('*');

        $sql = $this->db->get($this->table_provinsi);
        return $sql->result();
    }

    //
    //--------------------------------------------------------------------//
//
}

?>