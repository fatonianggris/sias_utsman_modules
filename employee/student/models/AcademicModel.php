<?php

class AcademicModel extends CI_Model {

    private $table_position = 'jabatan';
    private $table_employe = 'pegawai';
    private $table_grade = 'tingkat';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_presence = 'absensi_siswa';
    private $table_report = 'rapor_siswa';
    private $table_student = 'siswa';
    private $table_class = 'kelas';
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
        $this->db->where('tahun_awal = YEAR(CURDATE())');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_schoolyear);
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

    public function get_class_by_id($id_kelas = '') {

        $this->db->where('id_kelas', $id_kelas);

        $sql = $this->db->get($this->table_class);
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

        $this->db->where('s.status_siswa', 1);
        $this->db->where('s.id_kelas', $id);
        $this->db->order_by('s.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_students_by_grade($id_tingkat = '') {
        $this->db->select("s.*");

        $this->db->from('view_siswa s');

        $this->db->where('s.id_tingkat', $id_tingkat);
        $this->db->where('s.id_kelas', 0);
        $this->db->where('s.status_siswa', 1);
        $this->db->order_by('s.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_employe_by_grade() {

        $this->db->select('p.nama_lengkap, p.nip, t.level_tingkat, t.nama_tingkat');
        $this->db->from('pegawai p');
        $this->db->join('tingkat t', 'p.level_tingkat = t.level_tingkat', 'left');
        $this->db->order_by('p.inserted_at', 'ASC');

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

    public function get_class_ajax($level_tingkat = '', $id_tingkat = '') {

        $this->db->select("k.*, t.level_tingkat, t.id_tingkat, t.nama_tingkat, p.nama_lengkap");
        $this->db->from('kelas k');
        $this->db->join('tingkat t', 'k.id_tingkat = t.id_tingkat', 'left');
        $this->db->join('pegawai p', 'k.id_pegawai = p.id_pegawai', 'left');


        if ($id_tingkat != 0) {

            $this->db->where('t.id_tingkat', $id_tingkat);
        }

        if ($level_tingkat != 0) {

            $this->db->where('t.level_tingkat', $level_tingkat);
        }

        $this->db->order_by('p.inserted_at ASC');

        $sql = $this->db->get();
        return $sql;
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