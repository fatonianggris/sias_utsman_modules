<?php

class StudentModel extends CI_Model {

    private $table_vstudent = 'view_siswa';
    private $table_student = 'siswa';
    private $provinsi = 'wilayah_provinsi';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_class = 'kelas';
    private $table_grade = 'tingkat';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_presence = 'absensi_siswa';
    private $table_report = 'rapor_siswa';
    private $_batchImportPresence;
    private $_batchImportReport;

    public function setBatchImportPresence($batchImport) {
        $this->_batchImportPresence = $batchImport;
    }

    public function importPresence() {
        $data = $this->_batchImportPresence;
        $this->db->insert_batch($this->table_presence, $data);
    }

    public function setBatchImportReport($batchImport) {
        $this->_batchImportReport = $batchImport;
    }

    public function importReport() {
        $data = $this->_batchImportReport;
        $this->db->insert_batch($this->table_report, $data);
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

    public function get_class($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select('*');
            $this->db->order_by('inserted_at', 'ASC');
        } else {
            $this->db->select('*');
            $this->db->where('level_tingkat', $level_tingkat);
            $this->db->order_by('inserted_at', 'ASC');
        }

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function get_grade($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select('*');
            $this->db->order_by('inserted_at', 'ASC');
        } else {
            $this->db->select('*');
            $this->db->where('level_tingkat', $level_tingkat);
            $this->db->order_by('inserted_at', 'ASC');
        }

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function get_nisn_student($nisn = '') {

        $this->db->where('nisn', $nisn);

        $sql = $this->db->get($this->table_vstudent);
        return $sql->result();
    }

    public function get_student_id($id = '') {

        $this->db->where('id_siswa', $id);

        $sql = $this->db->get($this->table_student);
        return $sql->result();
    }

    public function get_old_student($id = '') {

        $this->db->select('nama_lengkap, nisn, nis, foto_siswa, barcode');
        $this->db->where('id_siswa', $id);

        $sql = $this->db->get($this->table_student);
        return $sql->result();
    }

    public function get_students_all($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select("s.*, t.nama_tingkat, COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas, CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, ta.semester");
            $this->db->from('view_siswa s');
            $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
            $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
            $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
        } else {
            if ($level_tingkat == 1) {
                $this->db->select("s.*, t.nama_tingkat, COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas, CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, ta.semester");
                $this->db->from('view_siswa s');
                $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
                $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
                $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->where('s.level_tingkat', $level_tingkat);
                $this->db->where('s.level_tingkat', 2);
            } else {
                $this->db->select("s.*, t.nama_tingkat, COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas, CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, ta.semester");
                $this->db->from('view_siswa s');
                $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
                $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
                $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->where('s.level_tingkat', $level_tingkat);
            }
        }
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_class_by_id($id_kelas = '') {

        $this->db->where('id_kelas', $id_kelas);

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function get_schoolyear() {

        $this->db->select('*');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_schoolyear_now() {
        $this->db->select('*');
        $this->db->where('tahun_awal=YEAR(CURDATE())');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_detail_student($id = '') {
        $this->db->select("s.*, 
                                wpagt.nama AS nama_provinsi_kk,                                    
                                wkbagt.nama AS nama_kabupaten_kota_kk,
                                wkbagt.administratif AS nama_kabupaten_kota_kk_adm,
                                wkagt.nama AS nama_kecamatan_kk,
                                wdagt.nama AS nama_kelurahan_desa_kk, 
                                wdagt.administratif AS nama_kelurahan_desa_kk_adm,                                
                                wpasl.nama AS nama_provinsi_dom,                                    
                                wkbasl.nama AS nama_kabupaten_kota_dom,
                                wkbasl.administratif AS nama_kabupaten_kota_dom_adm,
                                wkasl.nama AS nama_kecamatan_dom,
                                wdasl.nama AS nama_kelurahan_desa_dom, 
                                wdasl.administratif AS nama_kelurahan_desa_dom_adm,
                                t.nama_tingkat,
                                ta.nama_tahun_ajaran
                         ");
        $this->db->from('view_siswa s');

        $this->db->join('wilayah_desa wdagt', 's.kelurahan_desa_kk = wdagt.id AND s.provinsi_kk = wdagt.id_dati1 AND s.kabupaten_kota_kk = wdagt.id_dati2 AND s.kecamatan_kk = wdagt.id_dati3', 'left');
        $this->db->join('wilayah_kecamatan wkagt', 's.kecamatan_kk = wkagt.id AND s.provinsi_kk = wkagt.id_dati1 AND s.kabupaten_kota_kk = wkagt.id_dati2', 'left');
        $this->db->join('wilayah_kabupaten wkbagt', 's.kabupaten_kota_kk = wkbagt.id AND s.provinsi_kk = wkbagt.id_dati1', 'left');
        $this->db->join('wilayah_provinsi wpagt', 's.provinsi_kk = wpagt.id', 'left');

        $this->db->join('wilayah_desa wdasl', 's.kelurahan_desa_dom = wdasl.id AND s.provinsi_dom = wdasl.id_dati1 AND s.kabupaten_kota_dom = wdasl.id_dati2 AND s.kecamatan_dom = wdasl.id_dati3', 'left');
        $this->db->join('wilayah_kecamatan wkasl', 's.kecamatan_dom = wkasl.id AND s.provinsi_dom = wkasl.id_dati1 AND s.kabupaten_kota_dom = wkasl.id_dati2', 'left');
        $this->db->join('wilayah_kabupaten wkbasl', 's.kabupaten_kota_dom = wkbasl.id AND s.provinsi_dom = wkbasl.id_dati1', 'left');
        $this->db->join('wilayah_provinsi wpasl', 's.provinsi_dom = wpasl.id', 'left');

        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
        $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('s.id_siswa', $id);
        //$this->db->order_by('p.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function update_student_class($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kelas' => $value['id_kelas'],
            'status_transisi' => 0,
        );

        $this->db->where_in('id_siswa', $id);
        $this->db->update($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_student_password($id = '', $password = '') {
        $this->db->trans_begin();

        $data = array(
            'password' => password_hash(paramEncrypt($password), PASSWORD_DEFAULT, array('cost' => 12)),
        );

        $this->db->where('id_siswa', $id);
        $this->db->update($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_student($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nisn' => $value['nisn'],
            'nis' => @$value['nis'],
            'nik' => @$value['nik'],
            'no_akta_kelahiran' => @$value['no_akta_kelahiran'],
            'password' => password_hash(paramEncrypt($value['password']), PASSWORD_DEFAULT, array('cost' => 12)),
            'nama_lengkap' => $value['nama_lengkap'],
            'nama_panggilan' => @$value['nama_panggilan'],
            'tempat_lahir' => $value['tempat_lahir'],
            'tanggal_lahir' => $value['tanggal_lahir'],
            'jenis_kelamin' => $value['jenis_kelamin'],
            'agama' => $value['agama'],
            'rombel' => @$value['rombel'],
            'th_ajaran' => $value['th_ajaran'],
            'nomor_handphone' => $value['nomor_handphone'],
            'nomor_telepon' => @$value['nomor_telepon'],
            'email' => $value['email'],
            'nama_ayah' => @$value['nama_ayah'],
            'nik_ayah' => @$value['nik_ayah'],
            'tempat_lahir_ayah' => @$value['tempat_lahir_ayah'],
            'tanggal_lahir_ayah' => @$value['tanggal_lahir_ayah'],
            'pekerjaan_ayah' => @$value['pekerjaan_ayah'],
            'pendidikan_ayah' => @$value['pendidikan_ayah'],
            'penghasilan_ayah' => @$value['penghasilan_ayah'],
            'nama_ibu' => @$value['nama_ibu'],
            'nik_ibu' => @$value['nik_ibu'],
            'tempat_lahir_ibu' => @$value['tempat_lahir_ibu'],
            'tanggal_lahir_ibu' => @$value['tanggal_lahir_ibu'],
            'pekerjaan_ibu' => @$value['pekerjaan_ibu'],
            'pendidikan_ibu' => @$value['pendidikan_ibu'],
            'penghasilan_ibu' => @$value['penghasilan_ibu'],
            'status_wali' => @$value['status_wali'],
            'nama_wali' => @$value['nama_wali'],
            'nik_wali' => @$value['nik_wali'],
            'tempat_lahir_wali' => @$value['tempat_lahir_wali'],
            'tanggal_lahir_wali' => @$value['tanggal_lahir_wali'],
            'pekerjaan_wali' => @$value['pekerjaan_wali'],
            'pendidikan_wali' => @$value['pendidikan_wali'],
            'penghasilan_wali' => @$value['penghasilan_wali'],
            'alamat_rumah_kk' => $value['alamat_rumah_kk'],
            'provinsi_kk' => $value['provinsi_kk'],
            'kabupaten_kota_kk' => $value['kabupaten_kota_kk'],
            'kecamatan_kk' => $value['kecamatan_kk'],
            'kelurahan_desa_kk' => $value['kelurahan_desa_kk'],
            'rt_kk' => $value['rt_kk'],
            'rw_kk' => $value['rw_kk'],
            'kodepos_kk' => $value['kodepos_kk'],
            'status_alamat' => @$value['status_alamat'],
            'alamat_rumah_dom' => $value['alamat_rumah_dom'],
            'provinsi_dom' => $value['provinsi_dom'],
            'kabupaten_kota_dom' => $value['kabupaten_kota_dom'],
            'kecamatan_dom' => $value['kecamatan_dom'],
            'kelurahan_desa_dom' => $value['kelurahan_desa_dom'],
            'rt_dom' => $value['rt_dom'],
            'rw_dom' => $value['rw_dom'],
            'kodepos_dom' => $value['kodepos_dom'],
            'alat_transportasi' => $value['alat_transportasi'],
            'jenis_tinggal' => $value['jenis_tinggal'],
            'jarak_rumah_sekolah' => @$value['jarak_rumah_sekolah'],
            'jumlah_saudara' => $value['jumlah_saudara'],
            'anak_ke' => $value['anak_ke'],
            'kebutuhan_khusus' => $value['kebutuhan_khusus'],
            'tinggi_badan' => @$value['tinggi_badan'],
            'berat_badan' => @$value['berat_badan'],
            'id_tingkat' => $value['id_tingkat'],
            'level_tingkat' => $value['level_tingkat'],
            'jalur' => $value['jalur'],
            'foto_siswa' => @$value['foto_siswa'],
            'foto_siswa_thumb' => @$value['foto_siswa_thumb'],
            'akta_kelahiran' => @$value['akta_kelahiran'],
            'akta_kelahiran_thumb' => @$value['akta_kelahiran_thumb'],
            'kartu_keluarga' => @$value['kartu_keluarga'],
            'kartu_keluarga_thumb' => @$value['kartu_keluarga_thumb'],
            'barcode' => $value['barcode']
        );

        $this->db->insert($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_student($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nisn' => $value['nisn'],
            'nik' => @$value['nik'],
            'no_akta_kelahiran' => @$value['no_akta_kelahiran'],
            'nama_lengkap' => $value['nama_lengkap'],
            'nama_panggilan' => @$value['nama_panggilan'],
            'tempat_lahir' => $value['tempat_lahir'],
            'tanggal_lahir' => $value['tanggal_lahir'],
            'jenis_kelamin' => $value['jenis_kelamin'],
            'agama' => $value['agama'],
            'rombel' => @$value['rombel'],
            'th_ajaran' => $value['th_ajaran'],
            'nomor_handphone' => $value['nomor_handphone'],
            'nomor_telepon' => @$value['nomor_telepon'],
            'email' => $value['email'],
            'nama_ayah' => @$value['nama_ayah'],
            'nik_ayah' => @$value['nik_ayah'],
            'tempat_lahir_ayah' => @$value['tempat_lahir_ayah'],
            'tanggal_lahir_ayah' => @$value['tanggal_lahir_ayah'],
            'pekerjaan_ayah' => @$value['pekerjaan_ayah'],
            'pendidikan_ayah' => @$value['pendidikan_ayah'],
            'penghasilan_ayah' => @$value['penghasilan_ayah'],
            'nama_ibu' => @$value['nama_ibu'],
            'nik_ibu' => @$value['nik_ibu'],
            'tempat_lahir_ibu' => @$value['tempat_lahir_ibu'],
            'tanggal_lahir_ibu' => @$value['tanggal_lahir_ibu'],
            'pekerjaan_ibu' => @$value['pekerjaan_ibu'],
            'pendidikan_ibu' => @$value['pendidikan_ibu'],
            'penghasilan_ibu' => @$value['penghasilan_ibu'],
            'status_wali' => @$value['status_wali'],
            'nama_wali' => @$value['nama_wali'],
            'nik_wali' => @$value['nik_wali'],
            'tempat_lahir_wali' => @$value['tempat_lahir_wali'],
            'tanggal_lahir_wali' => @$value['tanggal_lahir_wali'],
            'pekerjaan_wali' => @$value['pekerjaan_wali'],
            'pendidikan_wali' => @$value['pendidikan_wali'],
            'penghasilan_wali' => @$value['penghasilan_wali'],
            'alamat_rumah_kk' => $value['alamat_rumah_kk'],
            'provinsi_kk' => $value['provinsi_kk'],
            'kabupaten_kota_kk' => $value['kabupaten_kota_kk'],
            'kecamatan_kk' => $value['kecamatan_kk'],
            'kelurahan_desa_kk' => $value['kelurahan_desa_kk'],
            'rt_kk' => $value['rt_kk'],
            'rw_kk' => $value['rw_kk'],
            'kodepos_kk' => $value['kodepos_kk'],
            'status_alamat' => @$value['status_alamat'],
            'alamat_rumah_dom' => $value['alamat_rumah_dom'],
            'provinsi_dom' => $value['provinsi_dom'],
            'kabupaten_kota_dom' => $value['kabupaten_kota_dom'],
            'kecamatan_dom' => $value['kecamatan_dom'],
            'kelurahan_desa_dom' => $value['kelurahan_desa_dom'],
            'rt_dom' => $value['rt_dom'],
            'rw_dom' => $value['rw_dom'],
            'kodepos_dom' => $value['kodepos_dom'],
            'alat_transportasi' => $value['alat_transportasi'],
            'jenis_tinggal' => $value['jenis_tinggal'],
            'jarak_rumah_sekolah' => @$value['jarak_rumah_sekolah'],
            'jumlah_saudara' => $value['jumlah_saudara'],
            'anak_ke' => $value['anak_ke'],
            'kebutuhan_khusus' => $value['kebutuhan_khusus'],
            'tinggi_badan' => @$value['tinggi_badan'],
            'berat_badan' => @$value['berat_badan'],
            'id_tingkat' => $value['id_tingkat'],
            'level_tingkat' => $value['level_tingkat'],
            'jalur' => $value['jalur'],
            'foto_siswa' => @$value['foto_siswa'],
            'foto_siswa_thumb' => @$value['foto_siswa_thumb'],
            'akta_kelahiran' => @$value['akta_kelahiran'],
            'akta_kelahiran_thumb' => @$value['akta_kelahiran_thumb'],
            'kartu_keluarga' => @$value['kartu_keluarga'],
            'kartu_keluarga_thumb' => @$value['kartu_keluarga_thumb'],
            'barcode' => @$value['barcode'],
            'updated_at' => date("Y-m-d H:i:s"),
        );

        $this->db->where('id_siswa', $id);
        $this->db->update($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_student($value) {
        $this->db->trans_begin();

        $this->db->where('id_siswa', $value);
        $this->db->delete($this->table_student);

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
        $sql = $this->db->get($this->provinsi);
        return $sql->result();
    }

    //
    //--------------------------------------------------------------------//
//
}

?>