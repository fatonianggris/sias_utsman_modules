<?php

class ClassesModel extends CI_Model {

    private $table_class = 'kelas';
    private $table_grade = 'tingkat';
    private $table_employe = 'pegawai';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_presence = 'absensi_siswa';
    private $table_report = 'rapor_siswa';

    //
    //------------------------------CLASS--------------------------------//
    //

    public function get_class_all($level_jabatan = '', $level_tingkat = '') {

        if ($level_jabatan == 0) {
            $this->db->select("c.id_kelas, c.nama_kelas, c.inisial_kelas, c.id_tingkat, c.id_pegawai, p.nama_lengkap,  DATE_FORMAT(c.inserted_at, '%d/%m/%Y') AS tanggal_isi, g.nama_tingkat as tingkat, g.level_tingkat");
            $this->db->from('kelas c');
            $this->db->join('tingkat g', 'c.id_tingkat = g.id_tingkat', 'left');
            $this->db->join('pegawai p', 'c.id_pegawai = p.id_pegawai', 'left');
        } else {
            if ($level_tingkat == 1) {
                $this->db->select("c.id_kelas, c.nama_kelas, c.inisial_kelas, c.id_tingkat, c.id_pegawai, p.nama_lengkap,  DATE_FORMAT(c.inserted_at, '%d/%m/%Y') AS tanggal_isi, g.nama_tingkat as tingkat, g.level_tingkat");
                $this->db->from('kelas c');
                $this->db->join('tingkat g', 'c.id_tingkat = g.id_tingkat', 'left');
                $this->db->join('pegawai p', 'c.id_pegawai = p.id_pegawai', 'left');
                $this->db->where('c.level_tingkat', $level_tingkat);
                $this->db->where('c.level_tingkat', 2);
            } else {
                $this->db->select("c.id_kelas, c.nama_kelas, c.inisial_kelas, c.id_tingkat, c.id_pegawai, p.nama_lengkap,  DATE_FORMAT(c.inserted_at, '%d/%m/%Y') AS tanggal_isi, g.nama_tingkat as tingkat, g.level_tingkat");
                $this->db->from('kelas c');
                $this->db->join('tingkat g', 'c.id_tingkat = g.id_tingkat', 'left');
                $this->db->join('pegawai p', 'c.id_pegawai = p.id_pegawai', 'left');
                $this->db->where('c.level_tingkat', $level_tingkat);
            }
        }
        $this->db->order_by('c.inserted_at', 'ASC');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_schoolyear() {
        $this->db->select('*');
        $this->db->where('tahun_awal = YEAR(CURDATE())');
        $this->db->order_by('inserted_at', 'ASC');

        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function check_duplicate_class($nama = '') {
        $this->db->where('nama_kelas', $nama);
        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function get_class_by_id($id = '') {

        $this->db->select('*');
        $this->db->where('id_kelas', $id);

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function get_old_name_class($id = '') {

        $this->db->select('nama_kelas');
        $this->db->where('id_kelas', $id);

        $sql = $this->db->get($this->table_class);
        return $sql->result();
    }

    public function insert_class($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_kelas' => $value['nama_kelas'],
            'inisial_kelas' => $value['inisial_kelas'],
            'id_tingkat' => $value['id_tingkat'],
            'level_tingkat' => $value['level_tingkat'],
            'id_pegawai' => @$value['id_pegawai'],
        );
        $this->db->insert($this->table_class, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_presence_batch($id_kelas = '', $value = '') {
        $this->db->trans_begin();

        $this->db->where('id_kelas', $id_kelas);
        $this->db->update_batch($this->table_presence, $value, 'th_ajaran');

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_report_batch($id_kelas = '', $value = '') {
        $this->db->trans_begin();

        $this->db->where('id_kelas', $id_kelas);
        $this->db->update_batch($this->table_report, $value, 'th_ajaran');

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_class($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_kelas' => $value['nama_kelas'],
            'inisial_kelas' => $value['inisial_kelas'],
            'id_tingkat' => $value['id_tingkat'],
            'level_tingkat' => $value['level_tingkat'],
            'id_pegawai' => @$value['id_pegawai'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_kelas', $id);
        $this->db->update($this->table_class, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_homeroom_status($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_wali_kelas' => $value,
        );

        $this->db->where('id_pegawai', $id);
        $this->db->update($this->table_employe, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_class($value) {
        $this->db->trans_begin();

        $this->db->where('id_kelas', $value);
        $this->db->delete($this->table_class);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //--------------------------------------------------------------------//
//
}

?>