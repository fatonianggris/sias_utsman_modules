<?php

class HomeroomTeacherModel extends CI_Model {

    private $table_position = 'jabatan';
    private $table_class = 'kelas';
    private $table_grade = 'tingkat';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_presence = 'absensi_siswa';
    private $table_report = 'rapor_siswa';
    private $table_student = 'siswa';
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

    public function get_schoolyear() {
        $this->db->select('*');
        $this->db->where('tahun_awal=YEAR(CURDATE())');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_grade() {
        $this->db->select('*');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function get_class_by_tingkat($id = '') {

        $this->db->select('*');
        $this->db->where('id_tingkat', $id);
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function check_grade_student($id_tingkat = '', $level_tingkat = '') {
        $this->db->select('*');
        $this->db->where('id_tingkat >', $id_tingkat);
        $this->db->where('level_tingkat', $level_tingkat);
        $this->db->limit(1);

        $sql = $this->db->get($this->table_grade);
        return $sql->result();
    }

    public function get_student_by_id($id_siswa = '') {

        $this->db->where('id_siswa', $id_siswa);

        $sql = $this->db->get($this->table_student);
        return $sql->result();
    }

    public function get_students_by_class($id = '') {
        $this->db->select("s.*, t.nama_tingkat, COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas, CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran, ta.semester");
        $this->db->from('view_siswa s');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');

        $this->db->where('s.id_kelas', $id);
        $this->db->where('s.status_transisi', 0);
        $this->db->where('s.status_siswa', 1);
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_students_by_class_transition($id = '') {
        $this->db->select("s.*, t.nama_tingkat, COALESCE(k.nama_kelas, 'KOSONG') as nama_kelas");

        $this->db->from('view_siswa s');

        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');

        $this->db->where('s.id_kelas', $id);
        $this->db->where('s.status_transisi', 1);
        $this->db->where('s.status_siswa', 1);
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_students_report_by_class($id = '') {
        $this->db->select("r.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.email, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('rapor_siswa r');

        $this->db->join("siswa s", "r.id_siswa = s.id_siswa AND s.id_kelas = $id AND s.status_transisi = 0 AND s.status_siswa = 1");
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tahun_ajaran ta', 'r.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('pegawai p', 'r.id_pegawai = p.id_pegawai', 'left');

        $this->db->where('r.id_kelas', $id);
        $this->db->order_by('ta.id_tahun_ajaran', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_students_presence_by_class($id = '') {
        $this->db->select("as.*, p.nama_lengkap AS nama_pegawai, s.nisn, s.status_siswa, s.foto_siswa_thumb, s.jenis_kelamin, s.nama_lengkap AS nama_siswa, s.level_tingkat, k.nama_kelas, t.nama_tingkat, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('absensi_siswa as');

        $this->db->join('siswa s', "as.id_siswa = s.id_siswa AND s.id_kelas = $id AND s.status_transisi = 0 AND s.status_siswa = 1");
        $this->db->join('tahun_ajaran ta', 'as.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->join('pegawai p', 'as.id_pegawai = p.id_pegawai', 'left');
        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');

        $this->db->where('as.id_kelas', $id);
        $this->db->order_by('ta.id_tahun_ajaran', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_students_by_grade($level_tingkat = '') {
        $this->db->select("s.*");

        $this->db->from('view_siswa s');

        $this->db->where('s.level_tingkat', $level_tingkat);
        $this->db->where('s.id_kelas', 0);
        $this->db->where('s.status_siswa', 1);
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_detail_class($id = '') {
        $this->db->select("c.*,
                            p.nama_lengkap,
                            p.foto_pegawai,
                            DATE_FORMAT(c.inserted_at, '%d/%m/%Y') AS tanggal_isi,
                            g.nama_tingkat,
                            g.level_tingkat");
        $this->db->from('kelas c');

        $this->db->join('tingkat g', 'c.id_tingkat = g.id_tingkat', 'left');
        $this->db->join('pegawai p', 'c.id_pegawai = p.id_pegawai', 'left');

        $this->db->where('c.id_kelas', $id);

        $sql = $this->db->get();
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
                                k.nama_kelas,
                                t.nama_tingkat,
                                CONCAT(ta.tahun_awal,'/',ta.tahun_akhir) AS tahun_ajaran,
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

        $this->db->join('kelas k', 's.id_kelas = k.id_kelas', 'left');
        $this->db->join('tingkat t', 's.id_tingkat = t.id_tingkat', 'left');
        $this->db->join('tahun_ajaran ta', 's.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('s.id_siswa', $id);
        //$this->db->order_by('p.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_total_student($id = '') {
        $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_siswa)
                                        FROM
                                            siswa
                                        WHERE
                                            jenis_kelamin=1 AND id_kelas=$id
                                    ) AS laki_laki,
                                    (
                                         SELECT
                                            COUNT(id_siswa)
                                        FROM
                                            siswa
                                        WHERE
                                            jenis_kelamin=2 AND id_kelas=$id
                                    ) AS perempuan,
                                    (
                                       SELECT
                                            COUNT(id_siswa)
                                        FROM
                                            siswa
                                        WHERE
                                            id_kelas=$id
                                    ) AS total_siswa");
        return $sql->result();
    }

    public function get_class_by_id($id_kelas = '') {

        $this->db->where('id_kelas', $id_kelas);

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function pass_student_by_id($id_siswa = '', $id_tingkat = '', $level_tingkat = '', $status = '', $id_kelas = '') {

        $data = array(
            'id_tingkat' => $id_tingkat,
            'level_tingkat' => $level_tingkat,
            'status_siswa' => $status,
            'id_kelas' => $id_kelas,
            'status_transisi' => 1,
        );

        $this->db->where_in('id_siswa', $id_siswa);
        $this->db->update($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function add_student_class_by_id($id = '', $data_siswa = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kelas' => $id,
        );

        $this->db->where_in('id_siswa', $data_siswa);
        $this->db->update($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
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

    public function update_report_student($id_rapor = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'file_rapor_siswa' => $value['file_rapor_siswa'],
            'status_rapor_siswa' => 1,
        );

        $this->db->where_in('id_rapor_siswa', $id_rapor);
        $this->db->update($this->table_report, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_presence_student($id_absensi = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'sakit' => $value['sakit'],
            'izin' => $value['izin'],
            'alpha' => $value['alpha'],
            'status_absensi_siswa' => 1,
        );

        $this->db->where_in('id_absensi_siswa', $id_absensi);
        $this->db->update($this->table_presence, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function release_student_by_class($id_siswa = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kelas' => 0,
        );

        $this->db->where_in('id_siswa', $id_siswa);
        $this->db->update($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function remove_presence_by_class($id_siswa = '', $id_kelas = '') {
        $this->db->trans_begin();

        $this->db->where('id_siswa', $id_siswa);
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete($this->table_presence);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function remove_report_by_class($id_siswa = '', $id_kelas = '') {
        $this->db->trans_begin();

        $this->db->where('id_siswa', $id_siswa);
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete($this->table_report);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------------------------------------------------//
}

?>