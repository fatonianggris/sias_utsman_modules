<?php

class SettingsModel extends CI_Model
{

	private $table_mailer = 'mailer_config';
	private $table_general_page = 'general_page';
	private $table_contact = 'kontak';
	private $table_present = 'absen_config';
	private $table_structure = 'struktur_akun';
	private $table_third_party = 'third_party';
	private $table_provinsi = 'wilayah_provinsi';

	//
	//-------------------------------SETTING------------------------------//
	//

	public function get_mail_config()
	{

		$this->db->select('*');
		$this->db->where('id_mailer', 1);
		$sql = $this->db->get($this->table_mailer);
		return $sql->result();
	}

	public function get_provinsi()
	{

		$this->db->select('*');
		$sql = $this->db->get($this->table_provinsi);
		return $sql->result();
	}

	public function get_contact_config()
	{
		$this->db->select("p.*,
                                wpasl.nama AS nama_provinsi,                                    
                                wkbasl.nama AS nama_kabupaten_kota,
                                wkbasl.administratif AS nama_kabupaten_kota_adm,
                                wkasl.nama AS nama_kecamatan,
                                wdasl.nama AS nama_kelurahan_desa, 
                                wdasl.administratif AS nama_kelurahan_desa_adm

                         ");
		$this->db->from('kontak p');
		$this->db->join('wilayah_desa wdasl', 'p.kelurahan_desa= wdasl.id AND p.provinsi = wdasl.id_dati1 AND p.kabupaten_kota = wdasl.id_dati2 AND p.kecamatan = wdasl.id_dati3', 'left');
		$this->db->join('wilayah_kecamatan wkasl', 'p.kecamatan = wkasl.id AND p.provinsi = wkasl.id_dati1 AND p.kabupaten_kota = wkasl.id_dati2', 'left');
		$this->db->join('wilayah_kabupaten wkbasl', 'p.kabupaten_kota = wkbasl.id AND p.provinsi = wkbasl.id_dati1', 'left');
		$this->db->join('wilayah_provinsi wpasl', 'p.provinsi = wpasl.id', 'left');

		$this->db->where('id_kontak', 1);
		$sql = $this->db->get();
		return $sql->result();
	}

	public function get_third_party_config()
	{

		$this->db->select('*');
		$this->db->where('id_third_party', 1);
		$sql = $this->db->get($this->table_third_party);
		return $sql->result();
	}

	public function get_present_config()
	{

		$this->db->select('*');
		$this->db->where('id_absen_config', 1);
		$sql = $this->db->get($this->table_present);
		return $sql->result();
	}

	public function get_page_config()
	{

		$this->db->select('*');
		$this->db->where('id_general_page', 1);
		$sql = $this->db->get($this->table_general_page);
		return $sql->result();
	}

	public function delete_structure($value)
	{
		$this->db->trans_begin();

		$this->db->where('id_struktur', $value);
		$this->db->delete($this->table_structure);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_mailer($id = '', $value = '')
	{
		$this->db->trans_begin();

		$data = array(
			'nama_pengirim' => strtoupper($value['nama_pengirim']),
			'host' => $value['host'],
			'email_induk' => $value['email_induk'],
			'password' => $value['password'],
			'port' => $value['port'],
			'smtp_auth' => $value['smtp_auth'],
			'smtp_secure' => $value['smtp_secure'],
			'updated_at' => date("Y-m-d H:i:s")
		);

		$this->db->where('id_mailer', $id);
		$this->db->update($this->table_mailer, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_thirdparty_key($id = '', $value = '')
	{
		$this->db->trans_begin();

		$data = array(
			'onesignal_app_id_emp' => @$value['onesignal_app_id_emp'],
			'onesignal_app_id_emp_safari' => @$value['onesignal_app_id_emp_safari'],
			'onesignal_auth_emp' => @$value['onesignal_auth_emp'],
			'onesignal_app_id_stu' => @$value['onesignal_app_id_stu'],
			'onesignal_app_id_stu_safari' => @$value['onesignal_app_id_stu_safari'],
			'onesignal_auth_stu' => @$value['onesignal_auth_stu'],
			'updated_at' => date("Y-m-d H:i:s")
		);

		$this->db->where('id_third_party', $id);
		$this->db->update($this->table_third_party, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_contact($id = '', $value = '')
	{
		$this->db->trans_begin();

		$data = array(
			'alamat' => $value['alamat'],
			'provinsi' => $value['provinsi'],
			'kabupaten_kota' => $value['kabupaten_kota'],
			'kecamatan' => $value['kecamatan'],
			'kelurahan_desa' => $value['kelurahan_desa'],
			'nomor_telephone' => $value['nomor_telephone'],
			'no_handphone' => @$value['no_handphone'],
			'email' => $value['email'],
			'jam_kerja' => $value['jam_kerja'],
			'akun_instagram' => $value['akun_instagram'],
			'akun_facebook' => $value['akun_facebook'],
			'akun_twitter' => $value['akun_twitter'],
			'akun_youtube' => $value['akun_youtube'],
			'url_website' => $value['url_website'],
			'updated_at' => date("Y-m-d H:i:s")
		);

		$this->db->where('id_kontak', $id);
		$this->db->update($this->table_contact, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_present($id = '', $value = '')
	{
		$this->db->trans_begin();

		$data = array(
			'start_absen' => $value['start_absen'],
			'end_absen' => $value['end_absen'],
			'toleransi_absen' => $value['toleransi_absen'],
			'google_api_key' => @$value['google_api_key'],
			'calendarific_api_key' => @$value['calendarific_api_key'],
			'updated_at' => date("Y-m-d H:i:s")
		);

		$this->db->where('id_absen_config', $id);
		$this->db->update($this->table_present, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_general_page($id = '', $value = '')
	{
		$this->db->trans_begin();

		$data = array(
			'nama_website' => $value['nama_website'],
			'logo_website' => $value['logo_website'],
			'logo_website_thumb' => $value['logo_website_thumb'],
			'greeting_website' => $value['greeting_website'],
			'about_website' => $value['about_website'],
			'url_tutorial_alur' => $value['url_tutorial_alur'],
			'updated_at' => date("Y-m-d H:i:s")
		);

		$this->db->where('id_general_page', $id);
		$this->db->update($this->table_general_page, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_status_loc_present($id = '')
	{
		$this->db->trans_begin();

		$data = array(
			'status_absensi_lokasi' => $id,
		);

		$this->db->where('id_absen_config', 1);
		$this->db->update($this->table_present, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_status_self_present($id = '')
	{
		$this->db->trans_begin();

		$data = array(
			'status_absensi_selfie' => $id,
		);

		$this->db->where('id_absen_config', 1);
		$this->db->update($this->table_present, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_status_cal_present($id = '')
	{
		$this->db->trans_begin();

		$data = array(
			'status_absensi_calendar' => $id,
		);

		$this->db->where('id_absen_config', 1);
		$this->db->update($this->table_present, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}


	public function update_status_qr_present($id = '')
	{
		$this->db->trans_begin();

		$data = array(
			'status_absensi_qrcode' => $id,
		);

		$this->db->where('id_absen_config', 1);
		$this->db->update($this->table_present, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function update_maintenance_finance($id = '')
	{
		$this->db->trans_begin();

		$data = array(
			'status_maintenance_finance' => $id,
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

	public function update_maintenance_report($id = '')
	{
		$this->db->trans_begin();

		$data = array(
			'status_maintenance_report' => $id,
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

	public function update_maintenance_presence($id = '')
	{
		$this->db->trans_begin();

		$data = array(
			'status_maintenance_presence' => $id,
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

	public function update_maintenance_announcement($id = '')
	{
		$this->db->trans_begin();

		$data = array(
			'status_maintenance_announcement' => $id,
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


	public function update_qr_code($nama_qr = '', $ket = '', $foto_qr	= '')
	{
		$this->db->trans_begin();

		$data = array(
			'qrcode' => $nama_qr,
			'foto_qrcode' => $foto_qr,
			'keterangan_qrcode' => $ket,
		);

		$this->db->where('id_absen_config', 1);
		$this->db->update($this->table_present, $data);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	//----------------------------------------------------------------//
}
