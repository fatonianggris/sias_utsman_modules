<?php

class QuestionnaireModel extends CI_Model {

    private $table_schoolyear = 'tahun_ajaran';
    private $table_questionnaire = 'kuisioner';
    private $table_question = 'pertanyaan';
    private $table_answer_leader = 'jawaban_atasan';
    private $table_answer_personal = 'jawaban_personal';
    private $table_answer_friend = 'jawaban_sejawat';

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

    public function get_max_id_questionnaire() {
        $this->db->select('MAX(id_kuisioner) AS max_id_questionnaire');
        $sql = $this->db->get($this->table_questionnaire);
        return $sql->result();
    }

    public function get_all_question_by_id($id = '') {
        $this->db->select('*');
        $this->db->where('id_kuisioner', $id);
        $this->db->order_by('inserted_at', 'DESC');
        $sql = $this->db->get($this->table_question);
        return $sql->result();
    }

    public function get_question_by_id($id = '') {
        $this->db->select('*');
        $this->db->where('id_pertanyaan', $id);
        $sql = $this->db->get($this->table_question);
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

    public function insert_questionnaire($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_kuisioner' => $value['nama_kuisioner'],
            'tgl_mulai' => $value['tgl_mulai'],
            'tgl_berakhir' => $value['tgl_berakhir'],
            'th_ajaran' => $value['th_ajaran'],
            'persentase_personal' => $value['persentase_personal'],
            'persentase_sejawat' => $value['persentase_sejawat'],
            'persentase_atasan' => $value['persentase_atasan'],
            'deskripsi_kuisioner' => $value['deskripsi_kuisioner'],
            'tipe_penilaian' => $value['tipe_penilaian'],
            'nilai_penilaian_max' => $value['nilai_penilaian_max'],
            'tunjangan_kinerja' => $value['tunjangan_kinerja'],
            'keterangan' => @$value['keterangan'],
        );

        $this->db->insert($this->table_questionnaire, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_questionnaire_eval($id_kuisioner = '') {
        $this->db->query("INSERT INTO penilaian(id_pegawai, id_kuisioner)
                            SELECT
                                p.id_pegawai,
                                $id_kuisioner
                            FROM
                                pegawai p
                            LEFT JOIN jabatan j ON j.id_jabatan = p.id_jabatan
                            WHERE
                                p.status_pegawai = 1 AND j.level_jabatan != 0");

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_question($id_kuisioner = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $id_kuisioner,
            'tipe_pertanyaan' => $value['tipe_pertanyaan'],
            'th_ajaran' => $value['th_ajaran'],
            'isi_pertanyaan' => $value['isi_pertanyaan'],
            'deskripsi_pertanyaan' => @$value['deskripsi_pertanyaan'],
        );

        $this->db->insert($this->table_question, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_question($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'tipe_pertanyaan' => $value['tipe_pertanyaan'],
            'isi_pertanyaan' => $value['isi_pertanyaan'],
            'deskripsi_pertanyaan' => @$value['deskripsi_pertanyaan'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pertanyaan', $id);
        $this->db->update($this->table_question, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_questionnaire($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_kuisioner' => $value['nama_kuisioner'],
            'tgl_mulai' => $value['tgl_mulai'],
            'tgl_berakhir' => $value['tgl_berakhir'],
            'th_ajaran' => $value['th_ajaran'],
            'persentase_personal' => $value['persentase_personal'],
            'persentase_sejawat' => $value['persentase_sejawat'],
            'persentase_atasan' => $value['persentase_atasan'],
            'deskripsi_kuisioner' => $value['deskripsi_kuisioner'],
            'tipe_penilaian' => $value['tipe_penilaian'],
            'nilai_penilaian_max' => $value['nilai_penilaian_max'],
            'tunjangan_kinerja' => $value['tunjangan_kinerja'],
            'keterangan' => @$value['keterangan'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_kuisioner', $id);
        $this->db->update($this->table_questionnaire, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function disable_status_questionnaire() {
        $this->db->trans_begin();

        $data = array(
            'status_kuisioner' => 0,
        );

        $this->db->update($this->table_questionnaire, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_questionnaire($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_kuisioner' => $value,
        );

        $this->db->where('id_kuisioner', $id);
        $this->db->update($this->table_questionnaire, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_questionnaire($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $value);
        $this->db->delete($this->table_questionnaire);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_question_all($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $value);
        $this->db->delete($this->table_question);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_answer_personal($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $value);
        $this->db->delete($this->table_answer_personal);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_answer_friend($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $value);
        $this->db->delete($this->table_answer_friend);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_answer_leader($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $value);
        $this->db->delete($this->table_answer_leader);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_question($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_pertanyaan', $value);
        $this->db->delete($this->table_question);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //--------------------------------------------------------------------//
//
}

?>