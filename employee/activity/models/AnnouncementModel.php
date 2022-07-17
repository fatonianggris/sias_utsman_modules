<?php

class AnnouncementModel extends CI_Model {

    private $table_announcement = 'pengumuman';
    private $table_schoolyear = 'tahun_ajaran';
    private $table_third_party = 'third_party';

    public function get_third_party_key() {

        $this->db->select('*');
        $this->db->where('id_third_party', 1);
        $sql = $this->db->get($this->table_third_party);
        return $sql->result();
    }

    public function get_schoolyear_now() {

        $this->db->select('*');
        $this->db->where('status_tahun_ajaran', 1);
        $sql = $this->db->get($this->table_schoolyear);
        return $sql->result();
    }

    public function get_announcement_all() {
        $this->db->select("p.*, ta.tahun_awal, ta.tahun_akhir, ta.semester");
        $this->db->from('pengumuman p');

        $this->db->join('tahun_ajaran ta', 'p.th_ajaran = ta.id_tahun_ajaran', 'left');
        $this->db->order_by('p.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function check_duplicate_announcement($nama = '') {
        $this->db->where('judul_pengumuman', $nama);
        $sql = $this->db->get($this->table_announcement);
        return $sql->result();
    }

    public function get_old_name_announcement($id = '') {

        $this->db->select('judul_pengumuman');
        $this->db->where('id_pengumuman', $id);

        $sql = $this->db->get($this->table_announcement);
        return $sql->result();
    }

    public function insert_announcement($value = '') {
        $this->db->trans_begin();

        $data = array(
            'judul_pengumuman' => $value['judul_pengumuman'],
            'kategori' => $value['kategori'],
            'tujuan' => $value['tujuan'],
            'th_ajaran' => $value['th_ajaran'],
            'keterangan' => $value['keterangan']
        );
        $this->db->insert($this->table_announcement, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_announcement($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'judul_pengumuman' => $value['judul_pengumuman'],
            'kategori' => $value['kategori'],
            'tujuan' => $value['tujuan'],
            'keterangan' => $value['keterangan'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pengumuman', $id);
        $this->db->update($this->table_announcement, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_announcement($value) {
        $this->db->trans_begin();

        $this->db->where('id_pengumuman', $value);
        $this->db->delete($this->table_announcement);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //------------------------------------------------//
}

?>