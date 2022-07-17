<?php

class ReportModel extends CI_Model {

    private $table_schoolyear = 'tahun_ajaran';
    private $table_questionnaire = 'kuisioner';
    private $table_question = 'pertanyaan';
    private $table_evaluation = 'penilaian';
    private $table_vemploye = 'view_pegawai';
    private $table_answer_leader = 'jawaban_atasan';
    private $table_answer_personal = 'jawaban_personal';
    private $table_answer_friend = 'jawaban_sejawat';
    private $_batchImportAnswerLeader;
    private $_batchImportAnswerPersonal;
    private $_batchImportAnswerFriend;

    public function setBatchImportAnswerLeader($batchImport) {
        $this->_batchImportAnswerLeader = $batchImport;
    }

    public function importAnswerLeader() {
        $data = $this->_batchImportAnswerLeader;
        $this->db->insert_batch($this->table_answer_leader, $data);
    }

    public function setBatchImportAnswerPersonal($batchImport) {
        $this->_batchImportAnswerPersonal = $batchImport;
    }

    public function importAnswerPersonal() {
        $data = $this->_batchImportAnswerPersonal;
        $this->db->insert_batch($this->table_answer_personal, $data);
    }

    public function setBatchImportAnswerFriend($batchImport) {
        $this->_batchImportAnswerFriend = $batchImport;
    }

    public function importAnswerFriend() {
        $data = $this->_batchImportAnswerFriend;
        $this->db->insert_batch($this->table_answer_friend, $data);
    }

    public function get_total_question($id_kuisioner = '') {

        $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_pertanyaan)
                                        FROM
                                            pertanyaan 
                                        WHERE id_kuisioner = $id_kuisioner
                                    ) AS total_pertanyaan,
                                    (
                                        SELECT
                                            COUNT(id_penilaian)
                                        FROM
                                            penilaian 
                                        WHERE id_kuisioner = $id_kuisioner
                                    ) AS total_penilaian,
                                    (
                                        SELECT
                                            COUNT(id_penilaian)
                                        FROM
                                            penilaian 
                                        WHERE id_kuisioner = $id_kuisioner AND status_penilaian_personal=1 AND status_penilaian_sejawat=1 AND status_penilaian_atasan=1
                                    ) AS total_penilaian_done");
        return $sql->result();
    }

    public function get_schoolyear_future() {
        $this->db->select('*');
        $this->db->where('tahun_awal >= NOW()');
        $this->db->order_by('inserted_at', 'ASC');
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_questionnaire_all() {
        $this->db->select("q.*, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('kuisioner q');

        $this->db->join('tahun_ajaran ta', 'q.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->order_by('q.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_name_emp_by_id($id_pegawai = '') {
        $this->db->select('*');
        $this->db->where('id_pegawai', $id_pegawai);

        $sql = $this->db->get($this->table_vemploye);
        return $sql->result();
    }

    public function get_all_answer_by_id($id_kuisioner = '', $id_pegawai = '') {
        $this->db->select('p.tipe_pertanyaan,
                            p.isi_pertanyaan,
                            COALESCE(jp.isi_jawaban, 0) AS jawaban_personal,
                            COALESCE(ja.isi_jawaban, 0) AS jawaban_atasan,
                            COALESCE(js.isi_jawaban, 0) AS jawaban_sejawat');

        $this->db->from('pertanyaan p');
        $this->db->join('jawaban_personal jp', ' p.id_pertanyaan = jp.id_pertanyaan', 'left');
        $this->db->join('jawaban_atasan ja', ' p.id_pertanyaan = ja.id_pertanyaan', 'left');
        $this->db->join('jawaban_sejawat js', ' p.id_pertanyaan = js.id_pertanyaan', 'left');

        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where('jp.id_pegawai', $id_pegawai);
        $this->db->where('ja.id_pegawai', $id_pegawai);
        $this->db->where('js.id_pegawai', $id_pegawai);
        $this->db->order_by('p.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_all_answer_sum_by_id($id_kuisioner = '', $id_pegawai = '') {
        $this->db->select('p.tipe_pertanyaan,                           
                            SUM(COALESCE(jp.isi_jawaban, 0)) AS jawaban_personal,
                            SUM(COALESCE(ja.isi_jawaban, 0)) AS jawaban_atasan,
                            SUM(COALESCE(js.isi_jawaban, 0)) AS jawaban_sejawat');

        $this->db->from('pertanyaan p');
        $this->db->join('jawaban_personal jp', ' p.id_pertanyaan = jp.id_pertanyaan', 'left');
        $this->db->join('jawaban_atasan ja', ' p.id_pertanyaan = ja.id_pertanyaan', 'left');
        $this->db->join('jawaban_sejawat js', ' p.id_pertanyaan = js.id_pertanyaan', 'left');

        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where('jp.id_pegawai', $id_pegawai);
        $this->db->where('ja.id_pegawai', $id_pegawai);
        $this->db->where('js.id_pegawai', $id_pegawai);
        $this->db->group_by('p.tipe_pertanyaan');
        $this->db->order_by('p.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_all_answer_leader_by_id($id_kuisioner = '', $id_pegawai = '') {
        $this->db->select('j.*, p.isi_pertanyaan');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = j.id_pertanyaan', 'left');

        $this->db->where('j.id_kuisioner', $id_kuisioner);
        $this->db->where('j.id_pegawai', $id_pegawai);
        $this->db->order_by('j.inserted_at', 'DESC');

        $sql = $this->db->get('jawaban_atasan j');
        return $sql->result();
    }

    public function get_all_answer_personal_by_id($id_kuisioner = '', $id_pegawai = '') {
        $this->db->select('j.*, p.isi_pertanyaan');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = j.id_pertanyaan', 'left');

        $this->db->where('j.id_kuisioner', $id_kuisioner);
        $this->db->where('j.id_pegawai', $id_pegawai);
        $this->db->order_by('j.inserted_at', 'DESC');

        $sql = $this->db->get('jawaban_personal j');
        return $sql->result();
    }

    public function get_all_answer_friend_by_id($id_kuisioner = '', $id_pegawai = '') {
        $this->db->select('j.*, p.isi_pertanyaan');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = j.id_pertanyaan', 'left');

        $this->db->where('j.id_kuisioner', $id_kuisioner);
        $this->db->where('j.id_pegawai', $id_pegawai);
        $this->db->order_by('j.inserted_at', 'DESC');

        $sql = $this->db->get('jawaban_sejawat j');
        return $sql->result();
    }

    public function get_all_question_by_id($id = '') {
        $this->db->select('*');
        $this->db->where('id_kuisioner', $id);
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_question);
        return $sql->result();
    }

    public function get_eval_by_id_employe($id_kuisioner = '', $id_pegawai = '') {
        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where('id_pegawai', $id_pegawai);
        $sql = $this->db->get($this->table_evaluation);
        return $sql->result();
    }

    public function get_schoolyear_active() {
        $this->db->select('*');
        $this->db->where('status_tahun_ajaran', 1);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_employe_by_id($id = '') {
        $this->db->select('*');
        $this->db->where('id_pegawai', $id);
        $sql = $this->db->get($this->table_vemploye);
        return $sql->result();
    }

    public function get_status_personal($id_kuisioner = '', $id_pegawai = '') {
        $this->db->select('*');
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where('id_kuisioner', $id_kuisioner);
        $sql = $this->db->get($this->table_evaluation);
        return $sql->result();
    }

    public function get_questionnaire_active() {
        $this->db->select('*');
        $this->db->where('status_kuisioner', 1);
        $sql = $this->db->get($this->table_questionnaire);
        return $sql->result();
    }

    public function get_questionnaire_by_id($id = '') {
        $this->db->select("q.*, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('kuisioner q');

        $this->db->join('tahun_ajaran ta', 'q.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('q.id_kuisioner', $id);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_employe_questionnaire_academic_all($id_kuisioner = '', $id_jabatan = '', $id_pegawai = '', $level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select("pe.*,
                                p.*,
                                p.id_pegawai AS id_pegawai_asli,
                                (
                                 SELECT
                                    nama_lengkap
                                 FROM
                                    view_pegawai vp 
                                 WHERE vp.id_pegawai = pe.id_sejawat
                                 ) AS nama_penilai,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran");
            $this->db->from('penilaian pe');
            $this->db->join('view_pegawai p', 'p.id_pegawai = pe.id_pegawai', 'left');
            $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
            $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
            $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
            $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
            $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
            $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
            $this->db->where('pe.id_kuisioner', $id_kuisioner);
            $this->db->where_not_in('pe.id_pegawai', $id_pegawai);
        } else {
            if ($id_jabatan == 1 || $id_jabatan == 6 || $id_jabatan == 11 || $id_jabatan == 27) {
                $this->db->select("pe.*, 
                                    p.*,
                                    p.id_pegawai AS id_pegawai_asli,
                                      (
                                     SELECT
                                        nama_lengkap
                                     FROM
                                        view_pegawai vp 
                                     WHERE vp.id_pegawai = pe.id_sejawat
                                     ) AS nama_penilai,
                                    wpasl.nama AS nama_provinsi,                                    
                                    wkbasl.nama AS nama_kabupaten_kota,
                                    wkbasl.administratif AS nama_kabupaten_kota_adm,
                                    wkasl.nama AS nama_kecamatan,
                                    wdasl.nama AS nama_kelurahan_desa, 
                                    wdasl.administratif AS nama_kelurahan_desa_adm,
                                    j.hasil_nama_jabatan,
                                    ta.nama_tahun_ajaran");

                $this->db->from('penilaian pe');
                $this->db->join('view_pegawai p', 'p.id_pegawai = pe.id_pegawai', 'left');
                $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
                $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
                $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
                $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
                $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
                $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->where('p.level_tingkat', $level_tingkat);
                $this->db->where('pe.id_kuisioner', $id_kuisioner);
                $this->db->where_not_in('pe.id_pegawai', $id_pegawai);
            } else {
                $this->db->select("pe.*, 
                                p.*,
                                p.id_pegawai AS id_pegawai_asli,                               
                                (
                               SELECT
                                  nama_lengkap
                               FROM
                                  view_pegawai vp 
                               WHERE vp.id_pegawai = pe.id_sejawat
                               ) AS nama_penilai,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran");

                $this->db->from('penilaian pe');
                $this->db->join('view_pegawai p', 'p.id_pegawai = pe.id_pegawai', 'left');
                $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
                $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
                $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
                $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
                $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
                $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->where('p.level_tingkat', $level_tingkat);
                $this->db->where('pe.id_kuisioner', $id_kuisioner);
                $this->db->where('pe.id_sejawat', $id_pegawai);
            }
        }

        $this->db->order_by('pe.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_employe_questionnaire_all($id_kuisioner = '', $id_jabatan = '', $id_pegawai = '', $level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select("pe.*,
                                p.*,
                                (
                                 SELECT
                                    nama_lengkap
                                 FROM
                                    view_pegawai vp 
                                 WHERE vp.id_pegawai = pe.id_sejawat
                                 ) AS nama_penilai,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran");
            $this->db->from('penilaian pe');
            $this->db->join('view_pegawai p', 'p.id_pegawai = pe.id_pegawai', 'left');
            $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
            $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
            $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
            $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
            $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
            $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
            $this->db->where('pe.id_kuisioner', $id_kuisioner);
            $this->db->where_in('p.id_jabatan', array(1, 6, 11, 27));
        } else {
            if ($id_jabatan == 1 || $id_jabatan == 6 || $id_jabatan == 11 || $id_jabatan == 27) {
                $this->db->select("pe.*, 
                                p.*,
                                  (
                                 SELECT
                                    nama_lengkap
                                 FROM
                                    view_pegawai vp 
                                 WHERE vp.id_pegawai = pe.id_sejawat
                                 ) AS nama_penilai,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran");

                $this->db->from('penilaian pe');
                $this->db->join('view_pegawai p', 'p.id_pegawai = pe.id_pegawai', 'left');
                $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
                $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
                $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
                $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
                $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
                $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->where('p.level_tingkat', $level_tingkat);
                $this->db->where('pe.id_kuisioner', $id_kuisioner);
                $this->db->where_not_in('pe.id_pegawai', $id_pegawai);
            } else {
                $this->db->select("pe.*, 
                                p.*,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm,
                                j.hasil_nama_jabatan,
                                ta.nama_tahun_ajaran");

                $this->db->from('penilaian pe');
                $this->db->join('view_pegawai p', 'p.id_pegawai = pe.id_pegawai', 'left');
                $this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
                $this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
                $this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
                $this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');
                $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
                $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
                $this->db->where('p.level_tingkat', $level_tingkat);
                $this->db->where('pe.id_kuisioner', $id_kuisioner);
                $this->db->where('pe.id_sejawat', $id_pegawai);
            }
        }

        $this->db->order_by('pe.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function update_status_questionnaire_leader($id_kuisioner = '', $id_pegawai = '', $id_atasan = '') {
        $this->db->trans_begin();

        $data = array(
            'id_atasan' => $id_atasan,
            'status_penilaian_atasan' => 1,
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update($this->table_evaluation, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_questionnaire_friend($id_kuisioner = '', $id_pegawai = '') {
        $this->db->trans_begin();

        $data = array(
            'status_penilaian_sejawat' => 1,
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update($this->table_evaluation, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_questionnaire_personal($id_kuisioner = '', $id_pegawai = '') {
        $this->db->trans_begin();

        $data = array(
            'status_penilaian_personal' => 1,
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update($this->table_evaluation, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_penilai_employe($id_penilaian = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_sejawat' => $value['id_penilai'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->update($this->table_evaluation, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}

?>