<?php

class AgendaModel extends CI_Model {

    private $table_kategori = 'kategori';
    private $table_merek = 'merek';

    //
    //---------------------------GENERAL----------------------//
    //

    public function get_jumlah_item() {
        $sql = $this->db->query('SELECT (SELECT COUNT(id_kategori) FROM kategori WHERE tipe_kategori=1) AS jumlah_kategori,(SELECT COUNT(id_kategori) FROM kategori  WHERE tipe_kategori=2) AS jumlah_sub_kategori, (SELECT COUNT(id_merek) FROM merek) AS jumlah_merek');
        return $sql->result();
    }

    //
    //---------------------------KATEGORI----------------------//
    //
    
    public function cek_duplikat_kategori($nama = '') {
        $this->db->where('nama_kategori', $nama);
        $sql = $this->db->get($this->table_kategori);
        return $sql->result();
    }

    public function get_jumlah_kategori() {
        $sql = $this->db->query('SELECT COUNT(id_kategori) AS jumlah_kategori FROM kategori');
        return $sql->result();
    }

    public function get_nameimgkategori_by_id($id = '') {

        $this->db->select('nama_kategori, gambar_kategori');
        $this->db->where('id_kategori', $id);

        $sql = $this->db->get($this->table_kategori);
        return $sql->result();
    }

    public function get_struktur_kategori($parent_key = '') {
        $sql = $this->db->query('SELECT id_kategori, nama_kategori FROM kategori WHERE id_level="' . $parent_key . '"');
        return $sql->result_array();
    }

    public function get_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori');
        return $sql->result();
    }

    public function insert_kategori($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_level' => $value['id_level'],
            'nama_kategori' => $value['nama_kategori'],
            'tipe_kategori' => $value['tipe_kategori'],
            'desc_kategori' => $value['desc_kategori'],
            'gambar_kategori' => $value['gambar_kategori'],
            'gambar_kategori_thumb' => $value['gambar_kategori_thumb'],
            'url_slug' => $value['url_slug'],
        );
        $this->db->insert($this->table_kategori, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_kategori($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_level' => $value['id_level'],
            'nama_kategori' => $value['nama_kategori'],
            'tipe_kategori' => $value['tipe_kategori'],
            'desc_kategori' => $value['desc_kategori'],
            'gambar_kategori' => $value['gambar_kategori'],
            'gambar_kategori_thumb' => $value['gambar_kategori_thumb'],
            'url_slug' => $value['url_slug'],
        );

        $this->db->where('id_kategori', $id);
        $this->db->update($this->table_kategori, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_kategori($value) {
        $this->db->trans_begin();

        $this->db->where('id_kategori', $value);
        $this->db->delete($this->table_kategori);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------------------------//
    //
    //-------------------------TAG-----------------------//

    public function cek_duplikat_merek($nama = '') {
        $this->db->where('nama_merek', $nama);
        $sql = $this->db->get($this->table_merek);
        return $sql->result();
    }

    public function get_jumlah_merek() {
        $sql = $this->db->query('SELECT COUNT(id_merek) AS jumlah_merek FROM merek');
        return $sql->result();
    }

    public function get_merek() {
        $sql = $this->db->query('SELECT * FROM merek');
        return $sql->result();
    }

    public function get_nameimgmerek_by_id($id = '') {

        $this->db->select('nama_merek, logo_merek');
        $this->db->where('id_merek', $id);

        $sql = $this->db->get($this->table_merek);
        return $sql->result();
    }

    public function insert_merek($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_merek' => $value['nama_merek'],
            'desc_merek' => $value['desc_merek'],
            'logo_merek' => $value['logo_merek'],
            'logo_merek_thumb' => $value['logo_merek_thumb'],
            'url_slug' => $value['url_slug'],
        );
        $this->db->insert($this->table_merek, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_merek($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_merek' => $value['nama_merek'],
            'desc_merek' => $value['desc_merek'],
            'logo_merek' => $value['logo_merek'],
            'logo_merek_thumb' => $value['logo_merek_thumb'],
            'url_slug' => $value['url_slug'],
        );

        $this->db->where('id_merek', $id);
        $this->db->update($this->table_merek, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_merek($value) {
        $this->db->trans_begin();

        $this->db->where('id_merek', $value);
        $this->db->delete($this->table_merek);

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