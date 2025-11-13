<?php

class QuestionnaireModel extends CI_Model
{

    private $table_schoolyear = 'tahun_ajaran';
    private $table_questionnaire = 'kuisioner';
    private $table_question = 'pertanyaan';
    private $table_question_type = 'tipe_pertanyaan';
    private $table_answer_leader = 'jawaban_atasan';
    private $table_answer_personal = 'jawaban_personal';
    private $table_answer_colleague = 'jawaban_sejawat';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_evaluation = 'penilaian';
    private $table_predicate_value = 'nilai_predikat';
    private $table_result_personal = 'hasil_penilaian_personal';
    private $table_result_colleague = 'hasil_penilaian_sejawat';
    private $table_result_leader = 'hasil_penilaian_atasan';
    private $table_result_subordinate = 'hasil_penilaian_bawahan';
    private $table_vemploye = 'view_pegawai';

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

    public function get_questionnaire_result_by_id_questionnaire_id_emplolyee($id_kuisioner = '', $id_pegawai = '')
    {
        $sql = $this->db->query("SELECT
                                    (
                                    SELECT
                                        COUNT(id_pegawai)
                                    FROM
                                        penilaian
                                    WHERE
                                        id_kuisioner = $id_kuisioner AND FIND_IN_SET($id_pegawai, id_pegawai)
                                ) AS total_personal_dinilai,
                                (
                                    SELECT
                                        COUNT(id_sejawat)
                                    FROM
                                        penilaian
                                    WHERE
                                        id_kuisioner = $id_kuisioner AND FIND_IN_SET($id_pegawai, id_sejawat)
                                ) AS total_sejawat_dinilai,
                                (
                                    SELECT
                                        COUNT(id_atasan)
                                    FROM
                                        penilaian
                                    WHERE
                                        id_kuisioner = $id_kuisioner AND FIND_IN_SET($id_pegawai, id_atasan)
                                ) AS total_atasan_dinilai,
                                (
                                    SELECT
                                        COUNT(id_bawahan)
                                    FROM
                                        penilaian
                                    WHERE
                                        id_kuisioner = $id_kuisioner AND FIND_IN_SET($id_pegawai, id_bawahan)
                                ) AS total_bawahan_dinilai,
                                (
                                    SELECT
                                        COUNT(id_dinilai)
                                    FROM
                                        hasil_penilaian_personal
                                    WHERE
                                        id_kuisioner = $id_kuisioner AND FIND_IN_SET($id_pegawai, id_dinilai)
                                ) AS total_hasil_personal,
                                (
                                    SELECT
                                        COUNT(id_dinilai)
                                    FROM
                                        hasil_penilaian_sejawat
                                    WHERE
                                        id_kuisioner = $id_kuisioner AND FIND_IN_SET($id_pegawai, id_dinilai)
                                ) AS total_hasil_sejawat,
                                (
                                    SELECT
                                        COUNT(id_dinilai)
                                    FROM
                                        hasil_penilaian_atasan
                                    WHERE
                                        id_kuisioner = $id_kuisioner AND FIND_IN_SET($id_pegawai, id_dinilai)
                                ) AS total_hasil_atasan,
                                (
                                    SELECT
                                        COUNT(id_dinilai)
                                    FROM
                                        hasil_penilaian_bawahan
                                    WHERE
                                        id_kuisioner = $id_kuisioner AND FIND_IN_SET($id_pegawai, id_dinilai)
                                ) AS total_hasil_bawahan");
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

    public function get_page()
    {
        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_contact()
    {
        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_predicate_questionnaire_by_id_questionnaire($id_kuisioner = '')
    {
        $this->db->select('nilai_minimal, nilai_maksimal, label_nilai, predikat_abjad');
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->order_by('inserted_at', 'ASC');
        $sql = $this->db->get($this->table_predicate_value);
        return $sql->result_array();
    }

    public function get_employee_by_level_and_position($level = '', $position = '')
    {
        $this->db->select('p.id_pegawai');
        $this->db->from('pegawai p');

        if (!empty($level)) {
            $this->db->where_in('p.level_tingkat', $level);
        }
        if (!empty($position)) {
            $this->db->where_in('p.id_jabatan', $position);
        }
        $this->db->order_by('p.id_pegawai', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_questionnaire_all()
    {
        $this->db->select("q.*, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('kuisioner q');

        $this->db->join('tahun_ajaran ta', 'q.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->order_by('q.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_question_type_all()
    {
        $this->db->select("*");
        $this->db->from('tipe_pertanyaan');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_schoolyear()
    {
        $this->db->select('*');
        $this->db->group_by('tahun_awal');
        $this->db->order_by('tahun_awal', 'ASC');

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }


    public function get_max_id_questionnaire()
    {
        $this->db->select('MAX(id_kuisioner) AS id_kuisioner');
        $sql = $this->db->get($this->table_questionnaire);
        return $sql->result();
    }

    public function get_result_evaluation_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner = '', $id_penilai = '', $id_dinilai = '', $jenis_kuisioner = '')
    {
        $this->db->select('k.*,
                            pp.id_pegawai AS id_pegawai_penilai,
                            pp.nip AS nip_penilai,
                            pp.nama_lengkap AS nama_penilai,
                            pp.level_tingkat AS tingkat_penilai,
                            jp.hasil_nama_jabatan AS nama_jabatan_penilai,
                            pd.id_pegawai AS id_pegawai_yang_dinilai,
                            pd.nama_lengkap AS nama_yang_dinilai,
                            pd.nip AS nip_yang_dinilai,
                            jd.hasil_nama_jabatan AS nama_jabatan_yang_dinilai,
                            pd.level_tingkat AS tingkat_yang_dinilai,
                            hk.id_penilai, 
                            hk.id_dinilai, 
                            hk.nilai_prestasi');
        $this->db->from('hasil_kuisioner hk');

        $this->db->join('kuisioner k', 'hk.id_kuisioner = k.id_kuisioner');
        $this->db->join('pegawai pp', 'pp.id_pegawai = hk.id_penilai');
        $this->db->join('pegawai pd', 'pd.id_pegawai = hk.id_dinilai');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pp.id_jabatan');
        $this->db->join('jabatan jd', 'jd.id_jabatan = pd.id_jabatan');

        $this->db->where('hk.id_kuisioner', $id_kuisioner);
        $this->db->where('hk.id_penilai', $id_penilai);
        $this->db->where('hk.id_dinilai', $id_dinilai);
        $this->db->where('hk.jenis_kuisioner', $jenis_kuisioner);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_personal_answer_eval_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select('j.*, 
                            p.tipe_pertanyaan, 
                            p.isi_pertanyaan, 
                            p.deskripsi_pertanyaan');
        $this->db->from('jawaban_personal j');

        $this->db->join('pertanyaan p', 'j.id_pertanyaan = p.id_pertanyaan');
        $this->db->where('j.id_kuisioner', $id_kuisioner);
        $this->db->where('j.id_penilai', $id_penilai);
        $this->db->where('j.id_dinilai', $id_dinilai);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_colleague_answer_eval_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select('j.*, 
                            p.tipe_pertanyaan, 
                            p.isi_pertanyaan, 
                            p.deskripsi_pertanyaan');
        $this->db->from('jawaban_sejawat j');

        $this->db->join('pertanyaan p', 'j.id_pertanyaan = p.id_pertanyaan');
        $this->db->where('j.id_kuisioner', $id_kuisioner);
        $this->db->where('j.id_penilai', $id_penilai);
        $this->db->where('j.id_dinilai', $id_dinilai);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_leader_answer_eval_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select('j.*, 
                            p.tipe_pertanyaan, 
                            p.isi_pertanyaan, 
                            p.deskripsi_pertanyaan');
        $this->db->from('jawaban_atasan j');

        $this->db->join('pertanyaan p', 'j.id_pertanyaan = p.id_pertanyaan');
        $this->db->where('j.id_kuisioner', $id_kuisioner);
        $this->db->where('j.id_penilai', $id_penilai);
        $this->db->where('j.id_dinilai', $id_dinilai);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_subordinate_answer_eval_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select('j.*, 
                            p.tipe_pertanyaan, 
                            p.isi_pertanyaan, 
                            p.deskripsi_pertanyaan');
        $this->db->from('jawaban_bawahan j');

        $this->db->join('pertanyaan p', 'j.id_pertanyaan = p.id_pertanyaan');
        $this->db->where('j.id_kuisioner', $id_kuisioner);
        $this->db->where('j.id_penilai', $id_penilai);
        $this->db->where('j.id_dinilai', $id_dinilai);

        $sql = $this->db->get();
        return $sql->result();
    }
    public function get_all_employee_evaluation_by_id_questionnaire($id_kuisioner = '')
    {
        // SUBQUERY: personal
        $sub_rp = $this->db
            ->select('rp.id_dinilai AS id_pegawai, COUNT(DISTINCT rp.id_hasil_penilaian_personal) AS cnt_personal, SUM(rp.total_nilai_personal) AS total_nilai_personal', false)
            ->from("{$this->table_result_personal} rp")
            ->where('rp.id_kuisioner', $id_kuisioner)
            ->group_by('rp.id_dinilai')
            ->get_compiled_select();
        $this->db->reset_query();

        // SUBQUERY: colleague / sejawat
        $sub_rc = $this->db
            ->select('rc.id_dinilai AS id_pegawai, COUNT(DISTINCT rc.id_hasil_penilaian_sejawat) AS cnt_sejawat, SUM(rc.total_nilai_sejawat) AS total_nilai_sejawat', false)
            ->from("{$this->table_result_colleague} rc")
            ->where('rc.id_kuisioner', $id_kuisioner)
            ->group_by('rc.id_dinilai')
            ->get_compiled_select();
        $this->db->reset_query();

        // SUBQUERY: leader / atasan
        $sub_rl = $this->db
            ->select('rl.id_dinilai AS id_pegawai, COUNT(DISTINCT rl.id_hasil_penilaian_atasan) AS cnt_atasan, SUM(rl.total_nilai_atasan) AS total_nilai_atasan', false)
            ->from("{$this->table_result_leader} rl")
            ->where('rl.id_kuisioner', $id_kuisioner)
            ->group_by('rl.id_dinilai')
            ->get_compiled_select();
        $this->db->reset_query();

        // SUBQUERY: subordinate / bawahan
        $sub_rs = $this->db
            ->select('rs.id_dinilai AS id_pegawai, COUNT(DISTINCT rs.id_hasil_penilaian_bawahan) AS cnt_bawahan, SUM(rs.total_nilai_bawahan) AS total_nilai_bawahan', false)
            ->from("{$this->table_result_subordinate} rs")
            ->where('rs.id_kuisioner', $id_kuisioner)
            ->group_by('rs.id_dinilai')
            ->get_compiled_select();
        $this->db->reset_query();

        // MAIN QUERY
        $this->db->select("
                            p.id_pegawai,
                            pn.nama_lengkap,
                            pn.nip,
                            pn.level_tingkat,
                            j.hasil_nama_jabatan,
                            k.id_kuisioner,
                            k.persentase_personal,
                            k.persentase_sejawat,
                            k.persentase_atasan,
                            k.persentase_bawahan,
                            k.status_kuisioner,

                            COUNT(DISTINCT sub_personal.id_penilaian) AS jumlah_personal_penilai,
                            COUNT(DISTINCT sub_sejawat.id_penilaian)  AS jumlah_sejawat_penilai,
                            COUNT(DISTINCT sub_atasan.id_penilaian)   AS jumlah_atasan_penilai,
                            COUNT(DISTINCT sub_bawahan.id_penilaian)  AS jumlah_bawahan_penilai,

                            CASE WHEN rp.cnt_personal > 0 THEN IFNULL(rp.cnt_personal, 0) ELSE 0 END AS jumlah_hasil_personal_penilai,
                            CASE WHEN rc.cnt_sejawat > 0 THEN IFNULL(rc.cnt_sejawat, 0) ELSE 0 END AS jumlah_hasil_sejawat_penilai,
                            CASE WHEN rl.cnt_atasan > 0 THEN IFNULL(rl.cnt_atasan, 0) ELSE 0 END AS jumlah_hasil_atasan_penilai,
                            CASE WHEN rs.cnt_bawahan > 0 THEN IFNULL(rs.cnt_bawahan, 0) ELSE 0 END AS jumlah_hasil_bawahan_penilai,

                            CASE WHEN rp.cnt_personal > 0 THEN IFNULL(rp.total_nilai_personal, 0) ELSE 0 END AS total_nilai_personal,
                            CASE WHEN rc.cnt_sejawat > 0 THEN IFNULL(rc.total_nilai_sejawat, 0) ELSE 0 END AS total_nilai_sejawat,
                            CASE WHEN rl.cnt_atasan > 0 THEN IFNULL(rl.total_nilai_atasan, 0) ELSE 0 END AS total_nilai_atasan,
                            CASE WHEN rs.cnt_bawahan > 0 THEN IFNULL(rs.total_nilai_bawahan, 0) ELSE 0 END AS total_nilai_bawahan,
                            (
                                (
                                    (CASE WHEN rp.cnt_personal > 0 THEN IFNULL(rp.total_nilai_personal, 0) ELSE 0 END) +
                                    (CASE WHEN rc.cnt_sejawat > 0 THEN IFNULL(rc.total_nilai_sejawat, 0) ELSE 0 END) +
                                    (CASE WHEN rl.cnt_atasan > 0 THEN IFNULL(rl.total_nilai_atasan, 0) ELSE 0 END) +
                                    (CASE WHEN rs.cnt_bawahan > 0 THEN IFNULL(rs.total_nilai_bawahan, 0) ELSE 0 END)
                                )
                                / NULLIF(
                                    COUNT(DISTINCT sub_personal.id_pegawai) +
                                    COUNT(DISTINCT sub_sejawat.id_pegawai)  +
                                    COUNT(DISTINCT sub_atasan.id_pegawai)   +
                                    COUNT(DISTINCT sub_bawahan.id_pegawai)  ,
                                0)
                            ) AS total_rekap_pkp,
                        ", false);

        $this->db->from('penilaian p');
        $this->db->join('pegawai pn', 'pn.id_pegawai = p.id_pegawai', "left");
        $this->db->join('kuisioner k', 'k.id_kuisioner = p.id_kuisioner', "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pn.id_jabatan', "left");

        // join penilaian sub untuk menghitung jumlah penilai
        $this->db->join("penilaian AS sub_personal", "FIND_IN_SET(p.id_pegawai, sub_personal.id_pegawai) AND sub_personal.id_kuisioner = {$this->db->escape($id_kuisioner)}", "left");
        $this->db->join("penilaian AS sub_sejawat", "FIND_IN_SET(p.id_pegawai, sub_sejawat.id_sejawat) AND sub_sejawat.id_kuisioner = {$this->db->escape($id_kuisioner)}", "left");
        $this->db->join("penilaian AS sub_atasan", "FIND_IN_SET(p.id_pegawai, sub_atasan.id_atasan) AND sub_atasan.id_kuisioner = {$this->db->escape($id_kuisioner)}", "left");
        $this->db->join("penilaian AS sub_bawahan", "FIND_IN_SET(p.id_pegawai, sub_bawahan.id_bawahan) AND sub_bawahan.id_kuisioner = {$this->db->escape($id_kuisioner)}", "left");

        // join hasil agregat tiap tabel hasil penilaian
        $this->db->join("({$sub_rp}) rp", 'rp.id_pegawai = p.id_pegawai', 'left');
        $this->db->join("({$sub_rc}) rc", 'rc.id_pegawai = p.id_pegawai', 'left');
        $this->db->join("({$sub_rl}) rl", 'rl.id_pegawai = p.id_pegawai', 'left');
        $this->db->join("({$sub_rs}) rs", 'rs.id_pegawai = p.id_pegawai', 'left');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->group_by('p.id_pegawai');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_total_result_evaluation_by_id_questionnaire($id_kuisioner = '')
    {
        $this->db->select("
                            s.jumlah_personal_penilai,
                            s.jumlah_sejawat_penilai, 
                            s.jumlah_atasan_penilai,
                            s.jumlah_bawahan_penilai,

                            COUNT(DISTINCT CASE WHEN h.tipe = 'personal' THEN h.id_dinilai END) AS total_hasil_personal_penilai,
                            COUNT(DISTINCT CASE WHEN h.tipe = 'sejawat'  THEN h.id_dinilai END) AS total_hasil_sejawat_penilai,
                            COUNT(DISTINCT CASE WHEN h.tipe = 'atasan'   THEN h.id_dinilai END) AS total_hasil_atasan_penilai,
                            COUNT(DISTINCT CASE WHEN h.tipe = 'bawahan'  THEN h.id_dinilai END) AS total_hasil_bawahan_penilai
                        ");

        $subquery_sum = "
                            SELECT 
                                id_kuisioner,
                                SUM(
                                    IF(id_pegawai IS NULL OR id_pegawai = '', 0, 
                                        (LENGTH(id_pegawai) - LENGTH(UNHEX(REPLACE(HEX(id_pegawai), '2C', ''))) + 1)
                                    )
                                ) AS jumlah_personal_penilai,

                                SUM(
                                    IF(id_sejawat IS NULL OR id_sejawat = '', 0, 
                                        (LENGTH(id_sejawat) - LENGTH(UNHEX(REPLACE(HEX(id_sejawat), '2C', ''))) + 1)
                                    )
                                ) AS jumlah_sejawat_penilai,

                                SUM(
                                    IF(id_atasan IS NULL OR id_atasan = '', 0, 
                                        (LENGTH(id_atasan) - LENGTH(UNHEX(REPLACE(HEX(id_atasan), '2C', ''))) + 1)
                                    )
                                ) AS jumlah_atasan_penilai,

                                SUM(
                                    IF(id_bawahan IS NULL OR id_bawahan = '', 0, 
                                        (LENGTH(id_bawahan) - LENGTH(UNHEX(REPLACE(HEX(id_bawahan), '2C', ''))) + 1)
                                    )
                                ) AS jumlah_bawahan_penilai
                            FROM penilaian
                            WHERE id_kuisioner = $id_kuisioner           
                        ";

        $subquery_h = "
                        SELECT id_kuisioner, 'personal' AS tipe, id_dinilai
                        FROM hasil_penilaian_personal
                        WHERE id_kuisioner = $id_kuisioner 
                        UNION ALL
                        SELECT id_kuisioner, 'sejawat' AS tipe, id_dinilai
                        FROM hasil_penilaian_sejawat
                        WHERE id_kuisioner = $id_kuisioner 
                        UNION ALL
                        SELECT id_kuisioner, 'atasan' AS tipe, id_dinilai
                        FROM hasil_penilaian_atasan
                        WHERE id_kuisioner = $id_kuisioner 
                        UNION ALL
                        SELECT id_kuisioner, 'bawahan' AS tipe, id_dinilai
                        FROM hasil_penilaian_bawahan
                        WHERE id_kuisioner = $id_kuisioner 
                        ";

        $this->db->from('penilaian pn');
        $this->db->join("($subquery_sum) s", "s.id_kuisioner = pn.id_kuisioner", "left");
        $this->db->join("($subquery_h) h", "h.id_kuisioner = pn.id_kuisioner", "left");
        $this->db->where('pn.id_kuisioner', $id_kuisioner);
        $this->db->group_by('pn.id_kuisioner');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_personal_by_id_questionnaire($id = '')
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
                            COALESCE((CASE WHEN h.tipe = 'personal' THEN 1 ELSE 0 END), 0) AS status_hasil_personal
                        ");

        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'personal' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_personal
                        GROUP BY id_hasil_penilaian_personal,id_penilai,id_dinilai
                        ";

        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', 'FIND_IN_SET(pg.id_pegawai, p.id_pegawai) > 0');
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner AND FIND_IN_SET(pg.id_pegawai, h.id_dinilai)
                                        AND FIND_IN_SET(p.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id);


        $sql = $this->db->get();
        return $sql->result();
    }


    public function get_evaluation_colleague_by_id_questionnaire($id = '')
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
                            COALESCE((CASE WHEN h.tipe = 'sejawat' THEN 1 ELSE 0 END), 0) AS status_hasil_sejawat
                        ");

        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'sejawat' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_sejawat
                        GROUP BY id_hasil_penilaian_sejawat,id_penilai,id_dinilai
                        ";

        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', 'FIND_IN_SET(pg.id_pegawai, p.id_sejawat) > 0');
        $this->db->join("($subquery_h) h", "p.id_kuisioner = h.id_kuisioner AND FIND_IN_SET(pg.id_pegawai, h.id_dinilai)
                                        AND FIND_IN_SET(p.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id);
        //$this->db->group_by('p.id_pegawai');

        $sql = $this->db->get();
        return $sql->result();
    }


    public function get_evaluation_leader_by_id_questionnaire($id = '')
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
                            COALESCE((CASE WHEN h.tipe = 'atasan' THEN 1 ELSE 0 END), 0) AS status_hasil_atasan
                        ");
        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'atasan' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_atasan
                        GROUP BY id_hasil_penilaian_atasan,id_penilai,id_dinilai
                        ";
        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', 'FIND_IN_SET(pg.id_pegawai, p.id_atasan) > 0');
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner AND FIND_IN_SET(pg.id_pegawai, h.id_dinilai)
                                        AND FIND_IN_SET(pd.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_evaluation_subordinate_by_id_questionnaire($id = '')
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
                            COALESCE((CASE WHEN h.tipe = 'bawahan' THEN 1 ELSE 0 END), 0) AS status_hasil_bawahan
                        ");
        $subquery_h = "
                        SELECT 
                            id_kuisioner, 
                            'bawahan' AS tipe,
                            id_penilai,
                            id_dinilai
                        FROM hasil_penilaian_bawahan
                        GROUP BY id_hasil_penilaian_bawahan,id_penilai,id_dinilai
                        ";

        $this->db->from('penilaian p');
        $this->db->join('pegawai pd', 'pd.id_pegawai = p.id_pegawai');
        $this->db->join('pegawai pg', 'FIND_IN_SET(pg.id_pegawai, p.id_bawahan) > 0');
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner AND FIND_IN_SET(pg.id_pegawai, h.id_dinilai)
                                        AND FIND_IN_SET(pd.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id);
        //$this->db->group_by('pg.id_pegawai');

        $sql = $this->db->get();
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

    public function get_question_type_by_id_questionnaire($id = '')
    {
        $this->db->select('*');
        $this->db->where('id_kuisioner', $id);
        $this->db->order_by('inserted_at', 'DESC');
        $sql = $this->db->get($this->table_question_type);
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
        $this->db->group_by('id_kuisioner, id_penilai, id_dinilai');

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
        $this->db->group_by('id_kuisioner, id_penilai, id_dinilai');

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
        $this->db->group_by('id_kuisioner, id_penilai, id_dinilai');

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
        $this->db->group_by('id_kuisioner, id_penilai, id_dinilai');

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

    public function get_question_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select('jp.*, p.tipe_pertanyaan, p.isi_pertanyaan, p.deskripsi_pertanyaan');

        $this->db->from('jawaban_personal jp');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = jp.id_pertanyaan');
        $this->db->where('jp.id_kuisioner', $id_kuisioner);
        $this->db->where('jp.id_penilai', $id_penilai);
        $this->db->where('jp.id_dinilai', $id_dinilai);
        $this->db->order_by('jp.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_question_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select('jp.*, p.tipe_pertanyaan, p.isi_pertanyaan, p.deskripsi_pertanyaan');

        $this->db->from('jawaban_sejawat jp');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = jp.id_pertanyaan');
        $this->db->where('jp.id_kuisioner', $id_kuisioner);
        $this->db->where('jp.id_penilai', $id_penilai);
        $this->db->where('jp.id_dinilai', $id_dinilai);
        $this->db->order_by('jp.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select('jp.*, p.tipe_pertanyaan, p.isi_pertanyaan, p.deskripsi_pertanyaan');

        $this->db->from('jawaban_atasan jp');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = jp.id_pertanyaan');
        $this->db->where('jp.id_kuisioner', $id_kuisioner);
        $this->db->where('jp.id_penilai', $id_penilai);
        $this->db->where('jp.id_dinilai', $id_dinilai);
        $this->db->order_by('jp.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $this->db->select('jp.*, p.tipe_pertanyaan, p.isi_pertanyaan, p.deskripsi_pertanyaan');

        $this->db->from('jawaban_bawahan jp');
        $this->db->join('pertanyaan p', 'p.id_pertanyaan = jp.id_pertanyaan');
        $this->db->where('jp.id_kuisioner', $id_kuisioner);
        $this->db->where('jp.id_penilai', $id_penilai);
        $this->db->where('jp.id_dinilai', $id_dinilai);
        $this->db->order_by('jp.inserted_at', 'ASC');

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
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_dinilai) 
                                        AND FIND_IN_SET(p.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(" . $id_pegawai . ", p.id_sejawat)");
        $this->db->group_by('pd.id_pegawai');

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
        $this->db->join("($subquery_h) h", "h.id_kuisioner = p.id_kuisioner 
                                        AND FIND_IN_SET(" . $this->db->escape($id_pegawai) . ", h.id_dinilai) 
                                        AND FIND_IN_SET(p.id_pegawai, h.id_penilai)", "left");
        $this->db->join('jabatan j', 'j.id_jabatan = pg.id_jabatan');
        $this->db->join('jabatan jp', 'jp.id_jabatan = pd.id_jabatan');
        $this->db->where('p.id_kuisioner', $id_kuisioner);
        $this->db->where("FIND_IN_SET(" . $id_pegawai . ", p.id_atasan)");
        $this->db->group_by('pd.id_pegawai');

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

    public function get_employee_by_id($id = '')
    {
        $this->db->select('vp.*, j.hasil_nama_jabatan');
        $this->db->from('view_pegawai vp');
        $this->db->join('jabatan j', ' j.id_jabatan = vp.id_jabatan', 'left');
        $this->db->where('id_pegawai', $id);

        $sql = $this->db->get();
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

    public function get_predicate_value_by_id_questionnaire($id = '')
    {
        $this->db->select('id_nilai_predikat, nilai_minimal, nilai_maksimal, label_nilai, predikat_abjad');

        $this->db->where('id_kuisioner', $id);
        $this->db->order_by('inserted_at', 'DESC');

        $sql = $this->db->get($this->table_predicate_value);
        return $sql->result_array();
    }

    public function get_question_by_id($id = '')
    {
        $this->db->select('*');
        $this->db->where('id_pertanyaan', $id);
        $sql = $this->db->get($this->table_question);
        return $sql->result();
    }

    public function get_question_type_by_id($id = '')
    {
        $this->db->select('*');
        $this->db->where('id_tipe_pertanyaan', $id);
        $sql = $this->db->get($this->table_question_type);
        return $sql->result();
    }

    public function get_predicate_value_by_id($id = '')
    {
        $this->db->select('*');
        $this->db->where('id_nilai_predikat', $id);
        $sql = $this->db->get($this->table_predicate_value);
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
    public function insert_batch_personal_evaluation($data)
    {
        $this->db->trans_begin();

        try {
            // Jalankan insert_batch
            $this->db->insert_batch($this->table_evaluation, $data);

            // Cek status transaksi
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return [
                    'status' => false,
                    'message' => 'Rollback: generate penilian personal gagal'
                ];
            } else {
                $this->db->trans_commit();
                return [
                    'status' => true,
                    'message' => 'Commit: generate penilian personal berhasil'
                ];
            }
        } catch (Exception $e) {
            // Kalau ada exception
            $this->db->trans_rollback();
            return [
                'status' => false,
                'message' => 'Exception: ' . $e->getMessage()
            ];
        }
    }


    public function update_batch_colleague_evaluation($update_data)
    {
        try {
            $this->db->trans_begin();

            foreach ($update_data as $key => $data) {
                if (!empty($data)) {
                    $this->db->update_batch($this->table_evaluation, $data, 'id_pegawai');

                    $error = $this->db->error();
                    if ($error['code'] != 0) {
                        throw new Exception("Error saat update batch {$key}: " . $error['message']);
                    }
                }
            }

            $this->db->trans_commit();
            return [
                'status'  => true,
                'message' => 'Commit: generate penilaian sejawat berhasil'
            ];
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return [
                'status'  => false,
                'message' => 'Rollback: ' . $e->getMessage()
            ];
        }
    }

    public function update_batch_leader_evaluation($update_data)
    {
        try {
            $this->db->trans_begin();

            foreach ($update_data as $key => $data) {
                if (!empty($data)) {
                    $this->db->update_batch($this->table_evaluation, $data, 'id_pegawai');

                    $error = $this->db->error();
                    if ($error['code'] != 0) {
                        throw new Exception("Error saat update batch {$key}: " . $error['message']);
                    }
                }
            }

            $this->db->trans_commit();
            return [
                'status'  => true,
                'message' => 'Commit: generate penilaian pimpinan berhasil'
            ];
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return [
                'status'  => false,
                'message' => 'Rollback: ' . $e->getMessage()
            ];
        }
    }

    public function update_batch_subordinate_evaluation($update_data)
    {
        try {
            $this->db->trans_begin();

            foreach ($update_data as $key => $data) {
                if (!empty($data)) {
                    $this->db->update_batch($this->table_evaluation, $data, 'id_pegawai');

                    $error = $this->db->error();
                    if ($error['code'] != 0) {
                        throw new Exception("Error saat update batch {$key}: " . $error['message']);
                    }
                }
            }

            $this->db->trans_commit();
            return [
                'status'  => true,
                'message' => 'Commit: generate penilaian bawahan berhasil'
            ];
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return [
                'status'  => false,
                'message' => 'Rollback: ' . $e->getMessage()
            ];
        }
    }

    public function insert_questionnaire($value = '')
    {
        $this->db->trans_begin();

        $data = array(
            'nama_kuisioner' => $value['nama_kuisioner'],
            'tgl_mulai' => $value['tgl_mulai'],
            'tgl_berakhir' => $value['tgl_berakhir'],
            'th_ajaran' => $value['th_ajaran'],
            'persentase_personal' => $value['persentase_personal'],
            'persentase_sejawat' => $value['persentase_sejawat'],
            'persentase_atasan' => $value['persentase_atasan'],
            'persentase_bawahan' => $value['persentase_bawahan'],
            'deskripsi_kuisioner' => $value['deskripsi_kuisioner'],
            'nilai_penilaian_max' => $value['nilai_penilaian_max'],
            'jumlah_penilai_sejawat' => $value['jumlah_penilai_sejawat'],
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

    public function insert_question($id_kuisioner = '', $value = '')
    {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $id_kuisioner,
            'tipe_pertanyaan' => $value['tipe_pertanyaan'],
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

    public function insert_question_type($id_kuisioner = '', $value = '')
    {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $id_kuisioner,
            'nama_tipe_pertanyaan' => $value['nama_tipe_pertanyaan'],
            'deskripsi_tipe_pertanyaan' => @$value['deskripsi_tipe_pertanyaan'],
        );

        $this->db->insert($this->table_question_type, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }


    public function auto_generate_questionnaire()
    {

        // Mulai transaksi
        $this->db->trans_begin();

        try {

            $kuisioner = $this->db->get_where($this->table_questionnaire, ['status_kuisioner' => 1])->row_array();

            if (!$kuisioner) {
                // Jika tidak ada data, rollback & return
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Data kuisioner tidak ditemukan'
                ];
            }

            $data_insert = [
                'nama_kuisioner'     => $kuisioner['nama_kuisioner'],
                'deskripsi_kuisioner'  => $kuisioner['deskripsi_kuisioner'],
                'persentase_personal'     => $kuisioner['persentase_personal'],
                'persentase_sejawat'  => $kuisioner['persentase_sejawat'],
                'persentase_atasan'     => $kuisioner['persentase_atasan'],
                'persentase_bawahan'  => $kuisioner['persentase_bawahan'],
                'nilai_penilaian_max'     => $kuisioner['nilai_penilaian_max'],
                'jumlah_penilai_sejawat'  => $kuisioner['jumlah_penilai_sejawat'],
                'tunjangan_kinerja'     => $kuisioner['tunjangan_kinerja'],
                'tipe_penilaian'  => $kuisioner['tipe_penilaian'],
                'th_ajaran'     => $kuisioner['th_ajaran'],
                'tgl_mulai'  => $kuisioner['tgl_mulai'],
                'tgl_berakhir'     => $kuisioner['tgl_berakhir'],
                'keterangan'  => $kuisioner['keterangan'],
                'status_kuisioner'  => $kuisioner['status_kuisioner']

            ];

            $this->db->insert($this->table_questionnaire, $data_insert);

            if ($this->db->affected_rows() <= 0) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Gagal menduplikat data'
                ];
            }

            $id_kuisioner_baru = $this->db->insert_id();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Transaksi database gagal'
                ];
            }


            $this->db->trans_commit();

            $this->disable_status_questionnaire();
            $this->update_status_questionnaire($id_kuisioner_baru, 1);

            return [
                'status'    => true,
                'message'   => 'Data berhasil diduplikat',
                'id_kuisioner_lama'   => $kuisioner['id_kuisioner'],
                'id_kuisioner_baru'   => $id_kuisioner_baru
            ];
        } catch (Throwable $e) {
            // Rollback jika ada error PHP/DB
            $this->db->trans_rollback();

            return [
                'status'  => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ];
        }
    }

    public function auto_generate_predicate_value($id_kuisioner_lama = '', $id_kuisioner_baru = '')
    {

        // Mulai transaksi
        $this->db->trans_begin();

        try {

            $predikat = $this->db->get_where($this->table_predicate_value, ['id_kuisioner' => $id_kuisioner_lama])->result_array();

            if (empty($predikat)) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Data predikat tidak ditemukan'
                ];
            }

            foreach ($predikat as $value) {

                $data_insert = [
                    'id_kuisioner'     => $id_kuisioner_baru,
                    'nilai_minimal'  => $value['nilai_minimal'],
                    'nilai_maksimal'     => $value['nilai_maksimal'],
                    'label_nilai'  => $value['label_nilai'],
                    'predikat_abjad'     => $value['predikat_abjad'],
                    'status_nilai_predikat'  => $value['status_nilai_predikat'],
                ];

                $this->db->insert($this->table_predicate_value, $data_insert);
            }

            if ($this->db->affected_rows() <= 0) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Gagal menduplikat data'
                ];
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Transaksi database gagal'
                ];
            }

            $this->db->trans_commit();

            return [
                'status'    => true,
                'message'   => 'Data predikat berhasil diduplikat',
            ];
        } catch (Throwable $e) {
            // Rollback jika ada error PHP/DB
            $this->db->trans_rollback();

            return [
                'status'  => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ];
        }
    }

    public function auto_generate_question_type($id_kuisioner_lama = '', $id_kuisioner_baru = '')
    {

        // Mulai transaksi
        $this->db->trans_begin();

        try {

            $question_type = $this->db->get_where($this->table_question_type, ['id_kuisioner' => $id_kuisioner_lama])->result_array();

            if (empty($question_type)) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Data tipe pertanyaan tidak ditemukan'
                ];
            }

            foreach ($question_type as $value) {

                $data_insert = [
                    'id_kuisioner'     => $id_kuisioner_baru,
                    'nama_tipe_pertanyaan'  => $value['nama_tipe_pertanyaan'],
                    'deskripsi_tipe_pertanyaan'     => $value['deskripsi_tipe_pertanyaan'],
                    'status_tipe_pertanyaan'  => $value['status_tipe_pertanyaan']
                ];

                $this->db->insert($this->table_question_type, $data_insert);
            }

            if ($this->db->affected_rows() <= 0) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Gagal menduplikat data'
                ];
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Transaksi database gagal'
                ];
            }

            $this->db->trans_commit();

            return [
                'status'    => true,
                'message'   => 'Data tipe pertanyaan berhasil diduplikat',
            ];
        } catch (Throwable $e) {
            // Rollback jika ada error PHP/DB
            $this->db->trans_rollback();

            return [
                'status'  => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ];
        }
    }

    public function auto_generate_question($id_kuisioner_lama = '', $id_kuisioner_baru = '')
    {

        // Mulai transaksi
        $this->db->trans_begin();

        try {

            $new_question_type = $this->db->get_where($this->table_question_type, ['id_kuisioner' => $id_kuisioner_baru])->result_array();

            $this->db->select('q.*, qt.*');
            $this->db->from($this->table_question . ' q');
            $this->db->join($this->table_question_type . ' qt', 'qt.id_tipe_pertanyaan = q.tipe_pertanyaan', 'left');
            $this->db->where('q.id_kuisioner', $id_kuisioner_lama);

            $question = $this->db->get()->result_array();

            if (empty($question)) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Data pertanyaan tidak ditemukan'
                ];
            }

            foreach ($question as $value) {

                foreach ($new_question_type as $value_type) {

                    if ($value_type['nama_tipe_pertanyaan'] == $value['nama_tipe_pertanyaan']) {

                        $data_insert = [
                            'id_kuisioner'     => $id_kuisioner_baru,
                            'tipe_pertanyaan'  => $value_type['id_tipe_pertanyaan'],
                            'isi_pertanyaan'     => $value['isi_pertanyaan'],
                            'deskripsi_pertanyaan'  => $value['deskripsi_pertanyaan']
                        ];
                    }
                }
                $this->db->insert($this->table_question, $data_insert);
            }

            if ($this->db->affected_rows() <= 0) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Gagal menduplikat data'
                ];
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return [
                    'status'  => false,
                    'message' => 'Transaksi database gagal'
                ];
            }

            $this->db->trans_commit();

            return [
                'status'    => true,
                'message'   => 'Data pertanyaan berhasil diduplikat',
            ];
        } catch (Throwable $e) {
            // Rollback jika ada error PHP/DB
            $this->db->trans_rollback();

            return [
                'status'  => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ];
        }
    }



    public function insert_predicate_value($id_kuisioner = '', $value = '')
    {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $id_kuisioner,
            'nilai_minimal' => $value['nilai_minimal'],
            'nilai_maksimal' => $value['nilai_maksimal'],
            'predikat_abjad' => $value['predikat_abjad'],
            'label_nilai' => $value['label_nilai'],
        );

        $this->db->insert($this->table_predicate_value, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_predicate_value($id = '', $value = '')
    {
        $this->db->trans_begin();

        $data = array(
            'nilai_minimal' => $value['nilai_minimal_edit'],
            'nilai_maksimal' => @$value['nilai_maksimal_edit'],
            'label_nilai' => $value['label_nilai_edit'],
            'predikat_abjad' => $value['predikat_abjad_edit'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_nilai_predikat', $id);
        $this->db->update($this->table_predicate_value, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_question_type($id = '', $value = '')
    {
        $this->db->trans_begin();

        $data = array(
            'nama_tipe_pertanyaan' => $value['nama_tipe_pertanyaan_edit'],
            'deskripsi_tipe_pertanyaan' => @$value['deskripsi_tipe_pertanyaan_edit'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_tipe_pertanyaan', $id);
        $this->db->update($this->table_question_type, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_question($id = '', $value = '')
    {
        $this->db->trans_begin();

        $data = array(
            'tipe_pertanyaan' => $value['tipe_pertanyaan_edit'],
            'isi_pertanyaan' => $value['isi_pertanyaan_edit'],
            'deskripsi_pertanyaan' => @$value['deskripsi_pertanyaan_edit'],
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

    public function update_questionnaire($id = '', $value = '')
    {
        $this->db->trans_begin();

        $data = array(
            'nama_kuisioner' => $value['nama_kuisioner_edit'],
            'tgl_mulai' => $value['tgl_mulai_edit'],
            'tgl_berakhir' => $value['tgl_berakhir_edit'],
            'th_ajaran' => $value['th_ajaran_edit'],
            'persentase_personal' => $value['persentase_personal_edit'],
            'persentase_sejawat' => $value['persentase_sejawat_edit'],
            'persentase_atasan' => $value['persentase_atasan_edit'],
            'persentase_bawahan' => $value['persentase_bawahan_edit'],
            'deskripsi_kuisioner' => $value['deskripsi_kuisioner_edit'],
            'nilai_penilaian_max' => $value['nilai_penilaian_max_edit'],
            'keterangan' => @$value['keterangan_edit'],
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

    public function disable_status_questionnaire()
    {
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

    public function update_status_questionnaire($id = '', $value = '')
    {
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

    public function delete_questionnaire($value = '')
    {
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


    public function delete_question_all($value = '')
    {
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

    public function delete_answer_personal($value = '')
    {
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

    public function delete_answer_friend($value = '')
    {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $value);
        $this->db->delete($this->table_answer_colleague);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_answer_leader($value = '')
    {
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

    public function delete_question_by_id($value = '')
    {
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

    public function delete_question_type_by_id($value = '')
    {
        $this->db->trans_begin();

        $this->db->where('id_tipe_pertanyaan', $value);
        $this->db->delete($this->table_question_type);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_predicate_value_by_id($value = '')
    {
        $this->db->trans_begin();

        $this->db->where('id_nilai_predikat', $value);
        $this->db->delete($this->table_predicate_value);

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
