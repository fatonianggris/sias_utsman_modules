<?php

class DashboardModel extends CI_Model {

    private $table_announcement = 'pengumuman';
    private $table_student = 'siswa';
    private $table_employe = 'pegawai';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_general_page = 'general_page';

    public function get_total_present($id_pegawai = '') {
        $sql = $this->db->query("SELECT
                                (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_masuk=1 AND a.id_pegawai = '$id_pegawai'
                            ) AS hadir_masuk,
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_masuk=2 AND a.id_pegawai = '$id_pegawai'
                            ) AS izin_absen_masuk,
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_masuk=3 AND a.id_pegawai = '$id_pegawai'
                            ) AS alpha_absen_masuk,
                           
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_pulang=1 AND a.id_pegawai = '$id_pegawai'
                            ) AS hadir_pulang,
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_pulang=2 AND a.id_pegawai = '$id_pegawai'
                            ) AS izin_absen_pulang,
                            (
                                SELECT
                                    COALESCE(COUNT(a.id_pegawai),0)
                                FROM
                                    absensi_pegawai a
                                WHERE 
                                    status_absensi_pulang=3 AND a.id_pegawai = '$id_pegawai'
                            ) AS alpha_absen_pulang");
        return $sql->result();
    }

    public function get_total_employee($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_pegawai)
                                        FROM
                                            pegawai                                       
                                    ) AS total_pegawai");
        } else {
            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_pegawai)
                                        FROM
                                            pegawai 
                                        WHERE level_tingkat = $level_tingkat
                                    ) AS total_pegawai");
        }
        return $sql->result();
    }

    public function get_total_students($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_siswa)
                                        FROM
                                            siswa                                       
                                    ) AS total_siswa");
        } else {
            if ($level_tingkat == 1) {
                $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_siswa)
                                        FROM
                                            siswa 
                                        WHERE level_tingkat = $level_tingkat AND level_tingkat=2
                                    ) AS total_siswa");
            } else {
                $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_siswa)
                                        FROM
                                            siswa 
                                        WHERE level_tingkat = $level_tingkat
                                    ) AS total_siswa");
            }
        }
        return $sql->result();
    }

    public function get_questionnaire_active() {
        $this->db->select("q.*, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('kuisioner q');
        $this->db->join('tahun_ajaran ta', 'q.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->where('status_kuisioner', 1);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_general_page() {

        $this->db->select('*, DATE_FORMAT(updated_bio, "%d/%m/%Y") AS tangal_update_bio,  DATE_FORMAT(updated_eval, "%d/%m/%Y") AS tangal_update_eval');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_schoolyear_now() {

        $this->db->select('*');
        $this->db->where('status_tahun_ajaran', 1);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_new_announcement() {
        $this->db->select('*, DATE_FORMAT(inserted_at, "%d/%m/%Y") AS tanggal_post');
        $this->db->order_by('inserted_at', 'ASC');
        $this->db->limit(1);
        $sql = $this->db->get($this->table_announcement);
        return $sql->result();
    }

    public function get_status_bio() {
        $this->db->where('status_update_biodata', 1);
        $sql = $this->db->get($this->table_student);
        return $sql->result();
    }

    public function get_status_quissionare() {

        $this->db->where('status_penilaian', 1);
        $sql = $this->db->get($this->table_employe);
        return $sql->result();
    }

    public function update_date_bio() {
        $this->db->trans_begin();

        $data = array(
            'updated_bio' => date("Y-m-d H:i:s"),
        );

        $this->db->where('id_general_page', 1);
        $this->db->update($this->table_general_page, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_date_eval() {
        $this->db->trans_begin();

        $data = array(
            'updated_eval' => date("Y-m-d H:i:s"),
        );

        $this->db->where('id_general_page', 1);
        $this->db->update($this->table_general_page, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_bio_student($id = '') {
        $this->db->trans_begin();

        $data = array(
            'status_update_biodata' => $id,
        );

        $this->db->update($this->table_student, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_eval_employe($id = '') {
        $this->db->trans_begin();

        $data = array(
            'status_penilaian' => $id,
        );

        $this->db->update($this->table_employe, $data);

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