<?php

class ReportModel extends CI_Model
{

    private $table_schoolyear = 'tahun_ajaran';
    private $table_questionnaire = 'kuisioner';
    private $table_question = 'pertanyaan';
    private $table_evaluation = 'penilaian';
    private $table_vemploye = 'view_pegawai';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';

    private $table_answer_personal = 'jawaban_personal';
    private $table_answer_colleague = 'jawaban_sejawat';
    private $table_answer_leader = 'jawaban_atasan';
    private $table_answer_subordinate = 'jawaban_bawahan';

    private $table_result_personal = 'hasil_penilaian_personal';
    private $table_result_colleague = 'hasil_penilaian_sejawat';
    private $table_result_leader = 'hasil_penilaian_atasan';
    private $table_result_subordinate = 'hasil_penilaian_bawahan';
    private $table_predicate_value = 'nilai_predikat';
    private $table_question_type = 'tipe_pertanyaan';

    public function importAnswerPersonal($data = '')
    {
        return $this->importBatch($this->table_answer_personal, $data);
    }

    public function importAnswerColleague($data = '')
    {
        return $this->importBatch($this->table_answer_colleague, $data);
    }

    public function importAnswerLeader($data = '')
    {
        return $this->importBatch($this->table_answer_leader, $data);
    }

    public function importAnswerSubordinate($data = '')
    {
        return $this->importBatch($this->table_answer_subordinate, $data);
    }

    private function importBatch($table, $data)
    {
        try {
            if (empty($data)) {
                return [
                    'status'  => false,
                    'message' => 'Data yang diinputkan kosong'
                ];
            }

            $this->db->trans_start();
            $this->db->insert_batch($table, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Rollback: generate penilaian gagal');
            }

            return [
                'status'  => true,
                'message' => 'Sukses insert batch'
            ];
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return [
                'status'  => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function get_predicate_value_by_id_questionnaire($id_kuisioner = '')
    {
        $this->db->select('id_nilai_predikat, nilai_minimal, nilai_maksimal, label_nilai, predikat_abjad');

        $this->db->from('nilai_predikat');
        $this->db->where("id_kuisioner", $id_kuisioner);
        $this->db->order_by('nilai_minimal', 'DESC');

        $sql = $this->db->get();
        return $sql->result_array();
    }

    public function get_total_question_by_id_questionnaire($id_kuisioner = '')
    {

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

    public function get_all_questionnaire_by_id_employee($id_pegawai = '')
    {

        $this->db->select(" k.*,
                            pn.id_pegawai AS id_pegawai_penilai,                     
                            IF(
                                pn.id_pegawai IS NULL OR pn.id_pegawai = '', 
                                0, 
                                (LENGTH(pn.id_pegawai) 
                                - LENGTH(UNHEX(REPLACE(HEX(pn.id_pegawai), '2C', ''))) + 1)
                            ) AS jumlah_personal_dinilai,

                            IF(
                                pn.id_sejawat IS NULL OR pn.id_sejawat = '', 
                                0, 
                                (LENGTH(pn.id_sejawat) 
                                - LENGTH(UNHEX(REPLACE(HEX(pn.id_sejawat), '2C', ''))) + 1)
                            ) AS jumlah_sejawat_dinilai,

                            IF(
                                pn.id_atasan IS NULL OR pn.id_atasan = '', 
                                0, 
                                (LENGTH(pn.id_atasan) 
                                - LENGTH(UNHEX(REPLACE(HEX(pn.id_atasan), '2C', ''))) + 1)
                            ) AS jumlah_atasan_dinilai,

                            IF(
                                pn.id_bawahan IS NULL OR pn.id_bawahan = '', 
                                0, 
                                (LENGTH(pn.id_bawahan) 
                                - LENGTH(UNHEX(REPLACE(HEX(pn.id_bawahan), '2C', ''))) + 1)
                            ) AS jumlah_bawahan_dinilai,
                            th.tahun_awal,
                            th.tahun_akhir,

                            COUNT(DISTINCT CASE WHEN p.tipe = 'personal' THEN p.id_pegawai END) AS jumlah_personal_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'sejawat'  THEN p.id_sejawat END) AS jumlah_sejawat_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'atasan'   THEN p.id_atasan END) AS jumlah_atasan_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'bawahan'  THEN p.id_bawahan END) AS jumlah_bawahan_penilai,

                            COUNT(DISTINCT CASE WHEN h.tipe = 'personal' THEN h.id_penilai END) AS total_hasil_personal_penilai,
                            COUNT(DISTINCT CASE WHEN h.tipe = 'sejawat'  THEN h.id_penilai END) AS total_hasil_sejawat_penilai,
                            COUNT(DISTINCT CASE WHEN h.tipe = 'atasan'   THEN h.id_penilai END) AS total_hasil_atasan_penilai,
                            COUNT(DISTINCT CASE WHEN h.tipe = 'bawahan'  THEN h.id_penilai END) AS total_hasil_bawahan_penilai,

                            COUNT(DISTINCT CASE WHEN n.tipe = 'personal' THEN n.id_dinilai END) AS total_hasil_personal_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'sejawat'  THEN n.id_dinilai END) AS total_hasil_sejawat_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'atasan'   THEN n.id_dinilai END) AS total_hasil_atasan_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'bawahan'  THEN n.id_dinilai END) AS total_hasil_bawahan_dinilai
                            
                        ", false);

        /** 🔹 Subquery penilaian (gabungan) */
        $subquery_p = "
                        SELECT id_kuisioner, 'personal' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_pegawai)
                        UNION ALL
                        SELECT id_kuisioner, 'sejawat' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_sejawat)
                        UNION ALL
                        SELECT id_kuisioner, 'atasan' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_atasan)
                        UNION ALL
                        SELECT id_kuisioner, 'bawahan' AS tipe,id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_bawahan)
                        ";

        $subquery_h = "
                        SELECT id_kuisioner, 'personal' AS tipe, id_penilai
                        FROM hasil_penilaian_personal
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_dinilai)
                        UNION ALL
                        SELECT id_kuisioner, 'sejawat' AS tipe, id_penilai
                        FROM hasil_penilaian_sejawat
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_dinilai)
                        UNION ALL
                        SELECT id_kuisioner, 'atasan' AS tipe, id_penilai
                        FROM hasil_penilaian_atasan
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_dinilai)
                        UNION ALL
                        SELECT id_kuisioner, 'bawahan' AS tipe, id_penilai
                        FROM hasil_penilaian_bawahan
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_dinilai)
                        ";

        $subquery_n = "
                        SELECT id_kuisioner, 'personal' AS tipe, id_dinilai
                        FROM hasil_penilaian_personal
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'sejawat' AS tipe, id_dinilai
                        FROM hasil_penilaian_sejawat
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'atasan' AS tipe, id_dinilai
                        FROM hasil_penilaian_atasan
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'bawahan' AS tipe, id_dinilai
                        FROM hasil_penilaian_bawahan
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_penilai)
                        ";

        $this->db->from('kuisioner k');
        $this->db->join("($subquery_p) p", "p.id_kuisioner = k.id_kuisioner", "left");
        $this->db->join("($subquery_h) h", "h.id_kuisioner = k.id_kuisioner", "left");
        $this->db->join("($subquery_n) n", "n.id_kuisioner = k.id_kuisioner", "left");
        $this->db->join('penilaian pn', "pn.id_kuisioner = k.id_kuisioner AND pn.id_pegawai = " . $this->db->escape($id_pegawai), "left");
        $this->db->join('tahun_ajaran th', 'k.th_ajaran = th.id_tahun_ajaran');
        $this->db->group_by("k.id_kuisioner");

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_questionnaire_by_id_questionnaire_id_employee($id_kuisioner = '', $id_pegawai = '')
    {

        $this->db->select(" k.*,
                            pn.id_pegawai AS id_pegawai_penilai,            
                            th.tahun_awal,
                            th.tahun_akhir,
                            IF(
                                pn.id_pegawai IS NULL OR pn.id_pegawai = '', 
                                0, 
                                (LENGTH(pn.id_pegawai) 
                                - LENGTH(UNHEX(REPLACE(HEX(pn.id_pegawai), '2C', ''))) + 1)
                            ) AS jumlah_personal_dinilai,

                            IF(
                                pn.id_sejawat IS NULL OR pn.id_sejawat = '', 
                                0, 
                                (LENGTH(pn.id_sejawat) 
                                - LENGTH(UNHEX(REPLACE(HEX(pn.id_sejawat), '2C', ''))) + 1)
                            ) AS jumlah_sejawat_dinilai,

                            IF(
                                pn.id_atasan IS NULL OR pn.id_atasan = '', 
                                0, 
                                (LENGTH(pn.id_atasan) 
                                - LENGTH(UNHEX(REPLACE(HEX(pn.id_atasan), '2C', ''))) + 1)
                            ) AS jumlah_atasan_dinilai,

                            IF(
                                pn.id_bawahan IS NULL OR pn.id_bawahan = '', 
                                0, 
                                (LENGTH(pn.id_bawahan) 
                                - LENGTH(UNHEX(REPLACE(HEX(pn.id_bawahan), '2C', ''))) + 1)
                            ) AS jumlah_bawahan_dinilai,

                            COUNT(DISTINCT CASE WHEN n.tipe = 'personal' THEN n.id_dinilai END) AS total_hasil_personal_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'sejawat'  THEN n.id_dinilai END) AS total_hasil_sejawat_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'atasan'   THEN n.id_dinilai END) AS total_hasil_atasan_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'bawahan'  THEN n.id_dinilai END) AS total_hasil_bawahan_dinilai,

                            COUNT(DISTINCT CASE WHEN p.tipe = 'personal' THEN p.id_pegawai END) AS jumlah_personal_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'sejawat'  THEN p.id_sejawat END) AS jumlah_sejawat_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'atasan'   THEN p.id_atasan END) AS jumlah_bawahan_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'bawahan'  THEN p.id_bawahan END) AS jumlah_atasan_penilai,

                            COUNT(DISTINCT hp.id_penilai) AS total_hasil_personal_penilai,
                            COUNT(DISTINCT hs.id_penilai) AS total_hasil_sejawat_penilai,
                            COUNT(DISTINCT ha.id_penilai) AS total_hasil_bawahan_penilai,
                            COUNT(DISTINCT hb.id_penilai) AS total_hasil_atasan_penilai
                        ", false);

        /** 🔹 Subquery penilaian (gabungan) */

        $subquery_n = "
                        SELECT id_kuisioner, 'personal' AS tipe, id_dinilai
                        FROM hasil_penilaian_personal
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'sejawat' AS tipe, id_dinilai
                        FROM hasil_penilaian_sejawat
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'atasan' AS tipe, id_dinilai
                        FROM hasil_penilaian_atasan
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'bawahan' AS tipe, id_dinilai
                        FROM hasil_penilaian_bawahan
                        WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_penilai)
                        ";

        $subquery_p = "
                        SELECT id_kuisioner, 'personal' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_pegawai)
                        UNION ALL
                        SELECT id_kuisioner, 'sejawat' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_sejawat)
                        UNION ALL
                        SELECT id_kuisioner, 'atasan' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_atasan)
                        UNION ALL
                        SELECT id_kuisioner, 'bawahan' AS tipe,id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", id_bawahan)
                        ";

        $this->db->from('kuisioner k');
        $this->db->join("($subquery_p) p", "p.id_kuisioner = k.id_kuisioner", "left");
        $this->db->join("($subquery_n) n", "n.id_kuisioner = k.id_kuisioner", "left");

        // hasil penilaian personal
        $this->db->join('hasil_penilaian_personal hp', "
            hp.id_kuisioner = k.id_kuisioner 
            AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", hp.id_dinilai)
        ", 'left');

        // hasil penilaian sejawat
        $this->db->join('hasil_penilaian_sejawat hs', "
            hs.id_kuisioner = k.id_kuisioner 
            AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", hs.id_dinilai)
        ", 'left');

        // hasil penilaian atasan
        $this->db->join('hasil_penilaian_atasan ha', "
            ha.id_kuisioner = k.id_kuisioner 
            AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", ha.id_dinilai)
        ", 'left');

        // hasil penilaian bawahan
        $this->db->join('hasil_penilaian_bawahan hb', "
            hb.id_kuisioner = k.id_kuisioner 
            AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", hb.id_dinilai)
        ", 'left');
        $this->db->join('penilaian pn', "pn.id_kuisioner = k.id_kuisioner", "left");
        $this->db->join('tahun_ajaran th', 'k.th_ajaran = th.id_tahun_ajaran');
        $this->db->where("k.id_kuisioner", $id_kuisioner);
        $this->db->where("pn.id_pegawai", $id_pegawai);
        // $this->db->group_by('pn.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner = '', $id_penilai = '')
    {
        $this->db->select("
                            s.jumlah_personal_dinilai,
                            s.jumlah_sejawat_dinilai, 
                            s.jumlah_atasan_dinilai,
                            s.jumlah_bawahan_dinilai,

                            COUNT(DISTINCT CASE WHEN n.tipe = 'personal' THEN n.id_dinilai END) AS total_hasil_personal_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'sejawat'  THEN n.id_dinilai END) AS total_hasil_sejawat_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'atasan'   THEN n.id_dinilai END) AS total_hasil_atasan_dinilai,
                            COUNT(DISTINCT CASE WHEN n.tipe = 'bawahan'  THEN n.id_dinilai END) AS total_hasil_bawahan_dinilai
                        ");

        $subquery_sum = "
                            SELECT 
                                id_kuisioner,
                                SUM(
                                    IF(id_pegawai IS NULL OR id_pegawai = '', 0, 
                                        (LENGTH(id_pegawai) - LENGTH(UNHEX(REPLACE(HEX(id_pegawai), '2C', ''))) + 1)
                                    )
                                ) AS jumlah_personal_dinilai,

                                SUM(
                                    IF(id_sejawat IS NULL OR id_sejawat = '', 0, 
                                        (LENGTH(id_sejawat) - LENGTH(UNHEX(REPLACE(HEX(id_sejawat), '2C', ''))) + 1)
                                    )
                                ) AS jumlah_sejawat_dinilai,

                                SUM(
                                    IF(id_atasan IS NULL OR id_atasan = '', 0, 
                                        (LENGTH(id_atasan) - LENGTH(UNHEX(REPLACE(HEX(id_atasan), '2C', ''))) + 1)
                                    )
                                ) AS jumlah_atasan_dinilai,

                                SUM(
                                    IF(id_bawahan IS NULL OR id_bawahan = '', 0, 
                                        (LENGTH(id_bawahan) - LENGTH(UNHEX(REPLACE(HEX(id_bawahan), '2C', ''))) + 1)
                                    )
                                ) AS jumlah_bawahan_dinilai
                            FROM penilaian
                            WHERE id_kuisioner = $id_kuisioner AND
                            FIND_IN_SET(" . $this->db->escape($id_penilai) . ", id_pegawai)      
                        ";


        $subquery_n = "
                        SELECT id_kuisioner, 'personal' AS tipe, id_dinilai
                        FROM hasil_penilaian_personal
                        WHERE FIND_IN_SET(" . $this->db->escape($id_penilai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'sejawat' AS tipe, id_dinilai
                        FROM hasil_penilaian_sejawat
                        WHERE FIND_IN_SET(" . $this->db->escape($id_penilai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'atasan' AS tipe, id_dinilai
                        FROM hasil_penilaian_atasan
                        WHERE FIND_IN_SET(" . $this->db->escape($id_penilai) . ", id_penilai)
                        UNION ALL
                        SELECT id_kuisioner, 'bawahan' AS tipe, id_dinilai
                        FROM hasil_penilaian_bawahan
                        WHERE FIND_IN_SET(" . $this->db->escape($id_penilai) . ", id_penilai)
                        ";

        $this->db->from('penilaian pn');
        $this->db->join("($subquery_sum) s", "s.id_kuisioner = pn.id_kuisioner", "left");
        $this->db->join("($subquery_n) n", "n.id_kuisioner = pn.id_kuisioner", "left");
        $this->db->where('pn.id_kuisioner', $id_kuisioner);
        $this->db->where('pn.id_pegawai', $id_penilai);

        $sql = $this->db->get();
        return $sql->result();
    }


    public function get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner = '', $id_dinilai = '')
    {
        $this->db->select("
                            COUNT(DISTINCT CASE WHEN p.tipe = 'personal' THEN p.id_pegawai END) AS jumlah_personal_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'sejawat'  THEN p.id_sejawat END) AS jumlah_sejawat_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'atasan'   THEN p.id_atasan END) AS jumlah_bawahan_penilai,
                            COUNT(DISTINCT CASE WHEN p.tipe = 'bawahan'  THEN p.id_bawahan END) AS jumlah_atasan_penilai,

                            COUNT(DISTINCT hp.id_penilai) AS total_hasil_personal_penilai,
                            COUNT(DISTINCT hs.id_penilai) AS total_hasil_sejawat_penilai,
                            COUNT(DISTINCT ha.id_penilai) AS total_hasil_bawahan_penilai,
                            COUNT(DISTINCT hb.id_penilai) AS total_hasil_atasan_penilai
    ");

        $subquery_p = "
                        SELECT id_kuisioner, 'personal' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_dinilai) . ", id_pegawai)
                        UNION ALL
                        SELECT id_kuisioner, 'sejawat' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_dinilai) . ", id_sejawat)
                        UNION ALL
                        SELECT id_kuisioner, 'atasan' AS tipe, id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_dinilai) . ", id_atasan)
                        UNION ALL
                        SELECT id_kuisioner, 'bawahan' AS tipe,id_pegawai, id_sejawat, id_atasan, id_bawahan
                        FROM penilaian WHERE FIND_IN_SET(" . $this->db->escape($id_dinilai) . ", id_bawahan)
                        ";

        $this->db->from('penilaian pn');
        $this->db->join("($subquery_p) p", "p.id_kuisioner = pn.id_kuisioner", "left");

        // hasil penilaian personal
        $this->db->join('hasil_penilaian_personal hp', "
        hp.id_kuisioner = pn.id_kuisioner 
        AND FIND_IN_SET(" . $this->db->escape($id_dinilai) . ", hp.id_dinilai)
        ", 'left');

        // hasil penilaian sejawat
        $this->db->join('hasil_penilaian_sejawat hs', "
        hs.id_kuisioner = pn.id_kuisioner 
        AND FIND_IN_SET(" . $this->db->escape($id_dinilai) . ", hs.id_dinilai)
        ", 'left');

        // hasil penilaian atasan
        $this->db->join('hasil_penilaian_atasan ha', "
        ha.id_kuisioner = pn.id_kuisioner 
        AND FIND_IN_SET(" . $this->db->escape($id_dinilai) . ", ha.id_dinilai)
        ", 'left');

        // hasil penilaian bawahan
        $this->db->join('hasil_penilaian_bawahan hb', "
        hb.id_kuisioner = pn.id_kuisioner 
        AND FIND_IN_SET(" . $this->db->escape($id_dinilai) . ", hb.id_dinilai)
        ", 'left');

        $this->db->where('pn.id_kuisioner', $id_kuisioner);
        $this->db->where('pn.id_pegawai', $id_dinilai);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_personal_assesor_by_id_questionnaire_id_empoyee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select("
                            p.id_penilaian,
                            pd.id_pegawai AS id_pegawai_penilai,
                            pd.nip AS nip_penilai,
                            pd.nama_lengkap AS nama_penilai,
                            pd.level_tingkat AS tingkat_penilai,
                            jp.hasil_nama_jabatan AS nama_jabatan_penilai,
                            
                            pg.id_pegawai AS id_pegawai_yang_dinilai,
                            pg.nama_lengkap AS nama_yang_dinilai,
                            pg.nip AS nip_yang_dinilai,
                            j.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                            pg.level_tingkat AS tingkat_yang_dinilai,
                            
                            COALESCE((CASE WHEN h.tipe = 'personal' THEN 1 ELSE 0 END), 0) AS status_hasil_personal_dinilai
                        ");
        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'personal' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_personal
                        GROUP BY id_hasil_penilaian_personal
                        ";

        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', "pd.id_pegawai = p.id_pegawai");
        $this->db->join('pegawai pg', "FIND_IN_SET(pg.id_pegawai, p.id_pegawai) > 0");
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_penilai)
                                        AND FIND_IN_SET(pg.id_pegawai, h.id_dinilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where('p.id_pegawai', $id_pegawai);
        $this->db->group_by('pg.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }


    public function get_evaluation_personal_assesed_by_id_questionnaire_id_empoyee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select("
                            p.id_penilaian,
                            pd.id_pegawai AS id_pegawai_penilai,
                            pd.nip AS nip_penilai,
                            pd.nama_lengkap AS nama_penilai,
                            pd.level_tingkat AS tingkat_penilai,
                            jp.hasil_nama_jabatan AS nama_jabatan_penilai,

                            pg.id_pegawai AS id_pegawai_yang_dinilai,
                            pg.nama_lengkap AS nama_yang_dinilai,
                            pg.nip AS nip_yang_dinilai,
                            j.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                            pg.level_tingkat AS tingkat_yang_dinilai,
                          
                            COALESCE((CASE WHEN h.tipe = 'personal' THEN 1 ELSE 0 END), 0) AS status_hasil_personal_penilai
                        ");
        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'personal' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_personal
                        GROUP BY id_hasil_penilaian_personal
                        ";

        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', "pd.id_pegawai = p.id_pegawai");
        $this->db->join('pegawai pg', "FIND_IN_SET(pg.id_pegawai, p.id_pegawai) > 0");
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_dinilai)
                                        AND FIND_IN_SET(p.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where('p.id_pegawai', $id_pegawai);
        $this->db->group_by('pg.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_colleague_assesor_by_id_questionnaire_id_empoyee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select("
                        p.id_penilaian,
                        pd.id_pegawai AS id_pegawai_penilai,
                        pd.nip AS nip_penilai,
                        pd.nama_lengkap AS nama_penilai,
                        pd.level_tingkat AS tingkat_penilai,
                        jp.hasil_nama_jabatan AS nama_jabatan_penilai,

                        pg.id_pegawai AS id_pegawai_yang_dinilai,
                        pg.nama_lengkap AS nama_yang_dinilai,
                        pg.nip AS nip_yang_dinilai,
                        j.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                        pg.level_tingkat AS tingkat_yang_dinilai,

                        COALESCE((CASE WHEN h.tipe = 'sejawat' THEN 1 ELSE 0 END), 0) AS status_hasil_sejawat_dinilai
                       
                        ");

        // subquery hasil_penilaian_sejawat
        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'sejawat' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_sejawat
                        GROUP BY id_hasil_penilaian_sejawat
                        ";

        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', 'FIND_IN_SET(pg.id_pegawai, p.id_sejawat) > 0');
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_penilai) 
                                        AND FIND_IN_SET(pg.id_pegawai, h.id_dinilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where('p.id_pegawai', $id_pegawai);
        $this->db->group_by('pg.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_colleague_assesed_by_id_questionnaire_id_empoyee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select("
                        p.id_penilaian,
                        pd.id_pegawai AS id_pegawai_penilai,
                        pd.nip AS nip_penilai,
                        pd.nama_lengkap AS nama_penilai,
                        pd.level_tingkat AS tingkat_penilai,
                        jp.hasil_nama_jabatan AS nama_jabatan_penilai,

                        pg.id_pegawai AS id_pegawai_yang_dinilai,
                        pg.nama_lengkap AS nama_yang_dinilai,
                        pg.nip AS nip_yang_dinilai,
                        j.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                        pg.level_tingkat AS tingkat_yang_dinilai,

                        COALESCE((CASE WHEN h.tipe = 'sejawat' THEN 1 ELSE 0 END), 0) AS status_hasil_sejawat_penilai
                        ");

        // subquery hasil_penilaian_sejawat
        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'sejawat' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_sejawat
                        GROUP BY id_hasil_penilaian_sejawat
                        ";

        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', "pg.id_pegawai = $id_pegawai");
        $this->db->join("($subquery_h) h", "h.id_kuisioner = $id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_dinilai) 
                                        AND FIND_IN_SET(p.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(" . $id_pegawai . ", p.id_sejawat)");
        $this->db->group_by('p.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_leader_assesor_by_id_questionnaire_id_empoyee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select("
                            p.id_penilaian,
                            pd.id_pegawai AS id_pegawai_penilai,
                            pd.nip AS nip_penilai,
                            pd.nama_lengkap AS nama_penilai,
                            pd.level_tingkat AS tingkat_penilai,
                            jp.hasil_nama_jabatan AS nama_jabatan_penilai,

                            pg.id_pegawai AS id_pegawai_yang_dinilai,
                            pg.nama_lengkap AS nama_yang_dinilai,
                            pg.nip AS nip_yang_dinilai,
                            j.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                            pg.level_tingkat AS tingkat_yang_dinilai,
                            
                            COALESCE((CASE WHEN h.tipe = 'atasan' THEN 1 ELSE 0 END), 0) AS status_hasil_atasan_dinilai
                        ");

        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'atasan' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_atasan
                        GROUP BY id_hasil_penilaian_atasan
                        ";
        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', 'FIND_IN_SET(pg.id_pegawai, p.id_atasan) > 0');
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_penilai) 
                                        AND FIND_IN_SET(pg.id_pegawai, h.id_dinilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where('p.id_pegawai', $id_pegawai);
        $this->db->group_by('pg.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_leader_assesed_by_id_questionnaire_id_empoyee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select("
                            p.id_penilaian,
                            pd.id_pegawai AS id_pegawai_penilai,
                            pd.nip AS nip_penilai,
                            pd.nama_lengkap AS nama_penilai,
                            pd.level_tingkat AS tingkat_penilai,
                            jp.hasil_nama_jabatan AS nama_jabatan_penilai,

                            pg.id_pegawai AS id_pegawai_yang_dinilai,
                            pg.nama_lengkap AS nama_yang_dinilai,
                            pg.nip AS nip_yang_dinilai,
                            j.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                            pg.level_tingkat AS tingkat_yang_dinilai,
                          
                            COALESCE((CASE WHEN h.tipe = 'atasan' THEN 1 ELSE 0 END), 0) AS status_hasil_atasan_penilai
                        ");

        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'atasan' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_bawahan
                        GROUP BY id_hasil_penilaian_bawahan
                        ";
        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', "pg.id_pegawai = $id_pegawai");
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_dinilai) 
                                        AND FIND_IN_SET(p.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(" . $id_pegawai . ", p.id_bawahan)");
        $this->db->group_by('pd.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_subordinate_assesor_by_id_questionnaire_id_empoyee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select("
                            p.id_penilaian,
                            pd.id_pegawai AS id_pegawai_penilai,
                            pd.nip AS nip_penilai,
                            pd.nama_lengkap AS nama_penilai,
                            pd.level_tingkat AS tingkat_penilai,
                            jp.hasil_nama_jabatan AS nama_jabatan_penilai,

                            pg.id_pegawai AS id_pegawai_yang_dinilai,
                            pg.nama_lengkap AS nama_yang_dinilai,
                            pg.nip AS nip_yang_dinilai,
                            j.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                            pg.level_tingkat AS tingkat_yang_dinilai,
                          
                            COALESCE((CASE WHEN h.tipe = 'bawahan' THEN 1 ELSE 0 END), 0) AS status_hasil_bawahan_dinilai
                        ");
        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'bawahan' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_bawahan
                        GROUP BY id_hasil_penilaian_bawahan
                        ";
        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', 'FIND_IN_SET(pg.id_pegawai, p.id_bawahan) > 0');
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_penilai) 
                                        AND FIND_IN_SET(pg.id_pegawai, h.id_dinilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where('p.id_pegawai', $id_pegawai);
        $this->db->group_by('pg.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_subordinate_assesed_by_id_questionnaire_id_empoyee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select("
                            p.id_penilaian,
                            pd.id_pegawai AS id_pegawai_penilai,
                            pd.nip AS nip_penilai,
                            pd.nama_lengkap AS nama_penilai,
                            pd.level_tingkat AS tingkat_penilai,
                            jp.hasil_nama_jabatan AS nama_jabatan_penilai,

                            pg.id_pegawai AS id_pegawai_yang_dinilai,
                            pg.nama_lengkap AS nama_yang_dinilai,
                            pg.nip AS nip_yang_dinilai,
                            j.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                            pg.level_tingkat AS tingkat_yang_dinilai,
                            
                            COALESCE((CASE WHEN h.tipe = 'bawahan' THEN 1 ELSE 0 END), 0) AS status_hasil_bawahan_penilai
                        ");

        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'bawahan' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_atasan
                        GROUP BY id_hasil_penilaian_atasan
                        ";

        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', "pg.id_pegawai = $id_pegawai");
        $this->db->join("($subquery_h) h", "h.id_kuisioner = $id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_dinilai) 
                                        AND FIND_IN_SET(p.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(" . $id_pegawai . ", p.id_atasan)");
        $this->db->group_by('p.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_result_eval_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select("COALESCE(COUNT(total_nilai_personal), 0) AS hasil_nilai_personal, COALESCE(SUM(total_nilai_personal), 0) AS jumlah_nilai_personal, inserted_at");
        $this->db->where('id_kuisioner', $id_kuisioner);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {
            $this->db->where('id_penilai', $id_penilai);
        }

        $this->db->where('id_dinilai', $id_dinilai);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {

            $this->db->group_by('id_kuisioner, id_penilai, id_dinilai');
        } else {
            $this->db->group_by('id_kuisioner, id_dinilai');
        }

        $sql = $this->db->get($this->table_result_personal);
        return $sql->result();
    }

    public function get_result_eval_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select("COALESCE(COUNT(total_nilai_sejawat), 0) AS hasil_nilai_sejawat, COALESCE(SUM(total_nilai_sejawat), 0) AS jumlah_nilai_sejawat, inserted_at");
        $this->db->where('id_kuisioner', $id_kuisioner);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {
            $this->db->where('id_penilai', $id_penilai);
        }

        $this->db->where('id_dinilai', $id_dinilai);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {

            $this->db->group_by('id_kuisioner, id_penilai, id_dinilai');
        } else {
            $this->db->group_by('id_kuisioner, id_dinilai');
        }

        $sql = $this->db->get($this->table_result_colleague);
        return $sql->result();
    }

    public function get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select("COALESCE(COUNT(total_nilai_atasan), 0) AS hasil_nilai_atasan, COALESCE(SUM(total_nilai_atasan), 0) AS jumlah_nilai_atasan, inserted_at");
        $this->db->where('id_kuisioner', $id_kuisioner);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {
            $this->db->where('id_penilai', $id_penilai);
        }

        $this->db->where('id_dinilai', $id_dinilai);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {

            $this->db->group_by('id_kuisioner, id_penilai, id_dinilai');
        } else {
            $this->db->group_by('id_kuisioner, id_dinilai');
        }

        $sql = $this->db->get($this->table_result_leader);
        return $sql->result();
    }

    public function get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select("COALESCE(COUNT(total_nilai_bawahan), 0) AS hasil_nilai_bawahan, COALESCE(SUM(total_nilai_bawahan), 0) AS jumlah_nilai_bawahan, inserted_at");
        $this->db->where('id_kuisioner', $id_kuisioner);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {
            $this->db->where('id_penilai', $id_penilai);
        }

        $this->db->where('id_dinilai', $id_dinilai);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {

            $this->db->group_by('id_kuisioner, id_penilai, id_dinilai');
        } else {
            $this->db->group_by('id_kuisioner, id_dinilai');
        }

        $sql = $this->db->get($this->table_result_subordinate);
        return $sql->result();
    }
    public function get_total_eval_personal_by_id_questionnaire_id_employee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select('IFNULL(SUM(total_nilai_personal), 0) AS total_nilai_personal');
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(id_dinilai, " . $this->db->escape($id_pegawai) . ")", null, false);

        $sql = $this->db->get($this->table_result_personal);
        return $sql->result();
    }

    public function get_total_eval_colleague_by_id_questionnaire_id_employee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select('IFNULL(SUM(total_nilai_sejawat), 0) AS total_nilai_sejawat');
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(id_dinilai, " . $this->db->escape($id_pegawai) . ")", null, false);

        $sql = $this->db->get($this->table_result_colleague);
        return $sql->result();
    }

    public function get_total_eval_leader_by_id_questionnaire_id_employee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select('IFNULL(SUM(total_nilai_atasan), 0) AS total_nilai_atasan');
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(id_dinilai, " . $this->db->escape($id_pegawai) . ")", null, false);

        $sql = $this->db->get($this->table_result_leader);
        return $sql->result();
    }

    public function get_total_eval_subordinate_by_id_questionnaire_id_employee($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select('IFNULL(SUM(total_nilai_bawahan), 0) AS total_nilai_bawahan');
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(id_dinilai, " . $this->db->escape($id_pegawai) . ")", null, false);

        $sql = $this->db->get($this->table_result_subordinate);
        return $sql->result();
    }

    public function get_employee_by_id($id = '')
    {
        $this->db->select('vp.*, j.hasil_nama_jabatan');
        $this->db->from('view_pegawai vp');
        $this->db->join('jabatan j', ' j.id_jabatan = vp.id_jabatan', 'left');
        $this->db->where('id_pegawai', $id);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_schoolyear_future()
    {
        $this->db->select('*');
        $this->db->where('tahun_awal >= NOW()');
        $this->db->order_by('inserted_at', 'ASC');
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_questionnaire_by_id_questionnaire($id = '')
    {
        $this->db->select("q.*, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('kuisioner q');

        $this->db->join('tahun_ajaran ta', 'q.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('q.id_kuisioner', $id);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_questionnaire_active_status_questionnaire()
    {
        $this->db->select('id_kuisioner, status_kuisioner');
        $this->db->where('status_kuisioner', 1);

        $sql = $this->db->get($this->table_questionnaire);
        return $sql->result();
    }

    public function get_question_type_by_id_questionnaire($id = '')
    {
        $this->db->select('*');
        $this->db->where('id_kuisioner', $id);
        $this->db->order_by('inserted_at', 'DESC');
        $sql = $this->db->get($this->table_question_type);
        return $sql->result();
    }

    public function get_question_by_id_questionnaire($id = '')
    {
        $this->db->select("q.*, tp.nama_tipe_pertanyaan");

        $this->db->from('pertanyaan q');
        $this->db->join('tipe_pertanyaan tp', 'q.tipe_pertanyaan = tp.id_tipe_pertanyaan', 'left');
        $this->db->where('q.id_kuisioner', $id);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_question_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select(' jp.*, 
                            COALESCE(SUM(jp.isi_jawaban), 0) AS total_isi_jawaban,
                            p.id_pertanyaan,
                            p.tipe_pertanyaan, 
                            p.isi_pertanyaan, 
                            p.deskripsi_pertanyaan, 
                            p.inserted_at');

        $this->db->from('jawaban_personal jp');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = jp.id_pertanyaan');
        $this->db->where('jp.id_kuisioner', $id_kuisioner);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {
            $this->db->where('jp.id_penilai', $id_penilai);
        }

        $this->db->where('jp.id_dinilai', $id_dinilai);
        $this->db->group_by('p.id_pertanyaan');
        $this->db->order_by('jp.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_question_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select(' jp.*, 
                            COALESCE(SUM(jp.isi_jawaban), 0) AS total_isi_jawaban,
                            p.id_pertanyaan,
                            p.tipe_pertanyaan, 
                            p.isi_pertanyaan, 
                            p.deskripsi_pertanyaan, 
                            p.inserted_at');

        $this->db->from('jawaban_sejawat jp');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = jp.id_pertanyaan');
        $this->db->where('jp.id_kuisioner', $id_kuisioner);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {
            $this->db->where('jp.id_penilai', $id_penilai);
        }

        $this->db->where('jp.id_dinilai', $id_dinilai);
        $this->db->group_by('p.id_pertanyaan');
        $this->db->order_by('jp.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select(' jp.*, 
                            COALESCE(SUM(jp.isi_jawaban), 0) AS total_isi_jawaban,
                            p.id_pertanyaan,
                            p.tipe_pertanyaan, 
                            p.isi_pertanyaan, 
                            p.deskripsi_pertanyaan, 
                            p.inserted_at');

        $this->db->from('jawaban_atasan jp');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = jp.id_pertanyaan');
        $this->db->where('jp.id_kuisioner', $id_kuisioner);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {
            $this->db->where('jp.id_penilai', $id_penilai);
        }

        $this->db->where('jp.id_dinilai', $id_dinilai);
        $this->db->group_by('p.id_pertanyaan');
        $this->db->order_by('jp.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select(' jp.*, 
                            COALESCE(SUM(jp.isi_jawaban), 0) AS total_isi_jawaban,
                            p.id_pertanyaan,
                            p.tipe_pertanyaan, 
                            p.isi_pertanyaan, 
                            p.deskripsi_pertanyaan, 
                            p.inserted_at');

        $this->db->from('jawaban_bawahan jp');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = jp.id_pertanyaan');
        $this->db->where('jp.id_kuisioner', $id_kuisioner);

        if (!empty($id_penilai) || $id_penilai != "" || $id_penilai != NULL) {
            $this->db->where('jp.id_penilai', $id_penilai);
        }

        $this->db->where('jp.id_dinilai', $id_dinilai);
        $this->db->group_by('p.id_pertanyaan');
        $this->db->order_by('jp.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_eval_by_id_employe($id_kuisioner = '', $id_pegawai = '')
    {
        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where('id_pegawai', $id_pegawai);
        $sql = $this->db->get($this->table_evaluation);
        return $sql->result();
    }

    public function get_schoolyear_active()
    {
        $this->db->select('*');
        $this->db->where('status_tahun_ajaran', 1);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_employe_by_id_employee($id = '')
    {
        $this->db->select('p.*, j.hasil_nama_jabatan');
        $this->db->from($this->table_vemploye . ' p');
        $this->db->join('jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->where('p.id_pegawai', $id);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_questionnaire_active()
    {
        $this->db->select('*');
        $this->db->where('status_kuisioner', 1);
        $sql = $this->db->get($this->table_questionnaire);
        return $sql->result();
    }

    public function get_contact()
    {
        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_page()
    {
        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_employe_questionnaire_academic_all($id_kuisioner = '', $id_jabatan = '', $id_pegawai = '', $level_jabatan = '', $level_tingkat = '')
    {

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

    public function get_employe_questionnaire_all($id_kuisioner = '', $id_jabatan = '', $id_pegawai = '', $level_jabatan = '', $level_tingkat = '')
    {

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

    public function insert_result_questionnaire_personal($id_kuisioner = '', $id_penilai = '', $id_dinilai = '', $total_nilai = '')
    {
        try {
            $this->db->trans_begin();

            $data = [
                'id_kuisioner'        => $id_kuisioner,
                'id_penilai'          => $id_penilai,
                'id_dinilai'          => $id_dinilai,
                'total_nilai_personal' => $total_nilai,
            ];

            $this->db->insert($this->table_result_personal, $data);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception('Rollback: insert penilaian personal gagal');
            }

            $this->db->trans_commit();

            return [
                'status'  => true,
                'message' => 'Sukses insert penilaian personal'
            ];
        } catch (Exception $e) {

            return [
                'status'  => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function insert_result_questionnaire_colleague($id_kuisioner = '', $id_penilai = '', $id_dinilai = '', $total_nilai = '')
    {
        try {
            $this->db->trans_begin();

            $data = [
                'id_kuisioner'        => $id_kuisioner,
                'id_penilai'          => $id_penilai,
                'id_dinilai'          => $id_dinilai,
                'total_nilai_sejawat' => $total_nilai,
            ];

            $this->db->insert($this->table_result_colleague, $data);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception('Rollback: insert penilaian sejawat gagal');
            }

            $this->db->trans_commit();

            return [
                'status'  => true,
                'message' => 'Sukses insert penilaian sejawat'
            ];
        } catch (Exception $e) {

            return [
                'status'  => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function insert_result_questionnaire_leader($id_kuisioner = '', $id_penilai = '', $id_dinilai = '', $total_nilai = '')
    {
        try {
            $this->db->trans_begin();

            $data = [
                'id_kuisioner'        => $id_kuisioner,
                'id_penilai'          => $id_penilai,
                'id_dinilai'          => $id_dinilai,
                'total_nilai_atasan' => $total_nilai,
            ];

            $this->db->insert($this->table_result_leader, $data);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception('Rollback: insert penilaian atasan gagal');
            }

            $this->db->trans_commit();

            return [
                'status'  => true,
                'message' => 'Sukses insert penilaian atasan'
            ];
        } catch (Exception $e) {

            return [
                'status'  => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function insert_result_questionnaire_subordinate($id_kuisioner = '', $id_penilai = '', $id_dinilai = '', $total_nilai = '')
    {
        try {
            $this->db->trans_begin();

            $data = [
                'id_kuisioner'        => $id_kuisioner,
                'id_penilai'          => $id_penilai,
                'id_dinilai'          => $id_dinilai,
                'total_nilai_bawahan' => $total_nilai,
            ];

            $this->db->insert($this->table_result_subordinate, $data);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception('Rollback: insert penilaian bawahan gagal');
            }

            $this->db->trans_commit();

            return [
                'status'  => true,
                'message' => 'Sukses insert penilaian bawahan'
            ];
        } catch (Exception $e) {

            return [
                'status'  => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
