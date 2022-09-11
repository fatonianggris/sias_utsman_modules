<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('sias-employee') == FALSE) {
			redirect('employee/auth');
		}
		$this->usr_employee = $this->session->userdata("sias-employee");

		$this->load->model('SettingsModel');
		$this->load->library('form_validation');
	}

	//
	//-------------------------------SETTING------------------------------//
	//

	public function email_configuration()
	{

		$data['title'] = 'Control Panel | Pengaturan Login Admin ';
		$data['nav_config'] = 'menu-item-open';
		$data['sub_nav_config_email'] = 'menu-item-active';

		$data['mailer'] = $this->SettingsModel->get_mail_config(); //?    
		$this->template->load('template_employee/template_employee', 'admin_view_email_config', $data);
	}

	public function contact_configuration()
	{

		$data['title'] = 'Control Panel | Pengaturan Login Admin ';
		$data['nav_config'] = 'menu-item-open';
		$data['sub_nav_config_contact'] = 'menu-item-active';

		$data['provinsi'] = $this->SettingsModel->get_provinsi();
		$data['contact'] = $this->SettingsModel->get_contact_config(); //?    
		$this->template->load('template_employee/template_employee', 'admin_view_contact_config', $data);
	}

	public function general_page_configuration()
	{

		$data['title'] = 'Control Panel | Pengaturan Login Admin ';
		$data['nav_config'] = 'menu-item-open';
		$data['sub_nav_config_general'] = 'menu-item-active';

		$data['page'] = $this->SettingsModel->get_page_config(); //?    
		$this->template->load('template_employee/template_employee', 'admin_view_page_config', $data);
	}

	public function thirdparty_configuration()
	{

		$data['title'] = 'Control Panel | Pengaturan Login Admin ';
		$data['nav_config'] = 'menu-item-open';
		$data['sub_nav_config_thridparty'] = 'menu-item-active';

		$data['thirdparty'] = $this->SettingsModel->get_third_party_config(); //?    
		$this->template->load('template_employee/template_employee', 'admin_view_thirdparty_key', $data);
	}

	public function present_configuration()
	{

		$data['title'] = 'Control Panel | Pengaturan Login Admin ';
		$data['nav_config'] = 'menu-item-open';
		$data['sub_nav_config_present'] = 'menu-item-active';

		$data['present'] = $this->SettingsModel->get_present_config(); //?    
		$this->template->load('template_employee/template_employee', 'admin_view_present_config', $data);
	}

	public function post_structure()
	{
		$param = $this->input->post();
		$data = $this->security->xss_clean($param);

		$this->form_validation->set_rules('id_role_struktur', 'Role Struktur', 'required');
		$this->form_validation->set_rules('nama_struktur', 'Nama Struktur ', 'required');

		$check = $this->SettingsModel->check_structure_duplicate($data['nama_struktur']);

		if ($check == TRUE) {

			$this->session->set_flashdata('flash_message', warn_msg("Mohon Maaf, Nama Struktur tersebut Telah Tersedia..."));
			redirect('employee/configuration/settings/account_structure_configuration');
		} else {
			if ($this->form_validation->run() == FALSE) {

				$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
				redirect('employee/configuration/settings/account_structure_configuration');
			} else {

				$input = $this->SettingsModel->insert_structure($data);
				if ($input == true) {

					$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Struktur '$data[nama_struktur]' telah disimpan.."));
					redirect('employee/configuration/settings/account_structure_configuration');
				} else {

					$this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
					redirect('employee/configuration/settings/account_structure_configuration');
				}
			}
		}
	}

	public function update_mailer()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);

		$this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required');
		$this->form_validation->set_rules('host', 'Host', 'required');
		$this->form_validation->set_rules('email_induk', 'Email Utama', 'required');
		$this->form_validation->set_rules('password', 'Password Email', 'required');
		$this->form_validation->set_rules('port', 'Port', 'required');
		$this->form_validation->set_rules('smtp_auth', 'SMTP AUTH', 'required');
		$this->form_validation->set_rules('smtp_secure', 'SMTP SECURE', 'required');

		if ($this->form_validation->run() == FALSE) {
			//
			$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
			redirect('employee/configuration/settings/email_configuration');
		} else {

			// print_r($data);exit;    
			$edit = $this->SettingsModel->update_mailer(1, $data);
			if ($edit == true) {

				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi Email Telah Terupdate.."));
				redirect('employee/configuration/settings/email_configuration');
			} else {

				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
				redirect('employee/configuration/settings/email_configuration');
			}
		}
	}

	public function update_contact()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);

		$this->form_validation->set_rules('alamat', 'Alamat Kantor', 'required');
		$this->form_validation->set_rules('email', 'Email Website', 'required');
		$this->form_validation->set_rules('jam_kerja', 'Jam Kerja', 'required');
		$this->form_validation->set_rules('email', 'Email Website', 'required');
		$this->form_validation->set_rules('jam_kerja', 'Jam Kerja', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi Kantor', 'required');
		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota Kantor', 'required');
		$this->form_validation->set_rules('kecamatan', 'kecamatan Kantor', 'required');
		$this->form_validation->set_rules('kelurahan_desa', 'Kelurahan/Desa Kantor', 'required');

		if ($this->form_validation->run() == FALSE) {
			//
			$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
			redirect('employee/configuration/settings/contact_configuration');
		} else {

			// print_r($data);exit;    
			$edit = $this->SettingsModel->update_contact(1, $data);
			if ($edit == true) {

				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi Kontak Website Telah Terupdate.."));
				redirect('employee/configuration/settings/contact_configuration');
			} else {

				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
				redirect('employee/configuration/settings/contact_configuration');
			}
		}
	}

	public function update_third_party()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);
		// print_r($data);exit;    
		$edit = $this->SettingsModel->update_thirdparty_key(1, $data);
		if ($edit == true) {

			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi Key Third Party Telah Terupdate.."));
			redirect('employee/configuration/settings/thirdparty_configuration');
		} else {

			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
			redirect('employee/configuration/settings/thirdparty_configuration');
		}
	}

	public function update_present()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);

		$this->form_validation->set_rules('start_absen', 'Jam Masuk Pegawai', 'required');
		$this->form_validation->set_rules('end_absen', 'Jam Pulang Pegawai', 'required');
		$this->form_validation->set_rules('toleransi_absen', 'Waktu Toleransi Masuk & Pulang', 'required');

		if ($this->form_validation->run() == FALSE) {
			//
			$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
			redirect('employee/configuration/settings/present_configuration');
		} else {

			// print_r($data);exit;    
			$edit = $this->SettingsModel->update_present(1, $data);
			if ($edit == true) {

				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi Absensi Website Telah Terupdate.."));
				redirect('employee/configuration/settings/present_configuration');
			} else {

				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
				redirect('employee/configuration/settings/present_configuration');
			}
		}
	}

	public function update_general_page()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);

		$data['logo_website'] = $data['logo_temp'];
		$data['logo_website_thumb'] = $data['logo_temp_thumb'];

		$get_logo_temp = explode('/', $data['logo_temp']);
		$path_logo_temp = $get_logo_temp[3];

		$this->form_validation->set_rules('nama_website', 'Nama Website', 'required');
		$this->form_validation->set_rules('about_website', 'Tentang Website', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
			redirect('employee/configuration/settings/general_page_configuration');
		} else {
			$this->load->library('upload'); //load library upload file
			$this->load->library('image_lib'); //load library image

			if (!empty($_FILES['logo_website']['tmp_name'])) {

				$this->delete_general_file($path_logo_temp); //delete existing file

				$path = 'uploads/general/images/';
				$path_thumb = 'uploads/general/images/thumbs/';
				//config upload file
				$config['upload_path'] = $path;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 2048; //set without limit
				$config['overwrite'] = FALSE; //if have same name, add number
				$config['remove_spaces'] = TRUE; //change space into _
				$config['encrypt_name'] = TRUE;
				//initialize config upload
				$this->upload->initialize($config);

				if ($this->upload->do_upload('logo_website')) { //if success upload data
					$result['upload'] = $this->upload->data();
					$name = $result['upload']['file_name'];
					$data['logo_website'] = $path . $name;

					$img['image_library'] = 'gd2';
					$img['source_image'] = $path . $name;
					$img['new_image'] = $path_thumb . $name;
					$img['maintain_ratio'] = true;
					$img['width'] = 600;
					$img['height'] = 600;

					$this->image_lib->initialize($img);
					if ($this->image_lib->resize()) { //if success to resize (create thumbs)
						$data['logo_website_thumb'] = $path_thumb . $name;
					} else {
						$this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
						redirect('employee/configuration/settings/general_page_configuration');
					}
				} else {
					$this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
					redirect('employee/configuration/settings/general_page_configuration');
				}
			}
			// print_r($data);exit;    
			$edit = $this->SettingsModel->update_general_page(1, $data);
			if ($edit == true) {
				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi Halaman Website Telah Terupdate..."));
				redirect('employee/configuration/settings/general_page_configuration');
			} else {
				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
				redirect('employee/configuration/settings/general_page_configuration');
			}
		}
	}

	public function change_status_loc_present()
	{

		$param = $this->input->post('id');
		$id = $this->security->xss_clean($param);
		$id = paramDecrypt($id);

		$update = $this->SettingsModel->update_status_loc_present($id);

		if ($update == true) {
			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Absensi Lokasi telah disimpan.."));
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
		}
	}

	public function change_status_self_present()
	{

		$param = $this->input->post('id');
		$id = $this->security->xss_clean($param);
		$id = paramDecrypt($id);

		$update = $this->SettingsModel->update_status_self_present($id);

		if ($update == true) {
			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Absensi Selfie telah disimpan.."));
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
		}
	}

	public function change_status_cal_present()
	{

		$param = $this->input->post('id');
		$id = $this->security->xss_clean($param);
		$id = paramDecrypt($id);

		$update = $this->SettingsModel->update_status_cal_present($id);

		if ($update == true) {
			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Absensi Kalender telah disimpan.."));
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
		}
	}

	public function change_status_maintenance_finance()
	{

		$param = $this->input->post('id');
		$id = $this->security->xss_clean($param);
		$id = paramDecrypt($id);

		$update = $this->SettingsModel->update_maintenance_finance($id);

		if ($update == true) {
			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Status Maintenance Keuangan telah disimpan.."));
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
		}
	}

	public function change_status_maintenance_report()
	{

		$param = $this->input->post('id');
		$id = $this->security->xss_clean($param);
		$id = paramDecrypt($id);

		$update = $this->SettingsModel->update_maintenance_report($id);

		if ($update == true) {
			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Status Maintenance E-Rapor Siswa telah disimpan.."));
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
		}
	}

	public function change_status_maintenance_presence()
	{

		$param = $this->input->post('id');
		$id = $this->security->xss_clean($param);
		$id = paramDecrypt($id);

		$update = $this->SettingsModel->update_maintenance_presence($id);

		if ($update == true) {
			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Status Maintenance Absensi Siswa telah disimpan.."));
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
		}
	}

	public function change_status_maintenance_announcement()
	{

		$param = $this->input->post('id');
		$id = $this->security->xss_clean($param);
		$id = paramDecrypt($id);

		$update = $this->SettingsModel->update_maintenance_announcement($id);

		if ($update == true) {
			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Status Maintenance Pengumuman Siswa telah disimpan.."));
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
		}
	}

	public function change_status_qr_present()
	{

		$param = $this->input->post('id');
		$id = $this->security->xss_clean($param);
		$id = paramDecrypt($id);

		$update = $this->SettingsModel->update_status_qr_present($id);

		if ($update == true) {
			$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Absensi QR Code telah disimpan.."));
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
		}
	}


	function generate_qrcode()
	{
		$ket = $this->input->post('ket');
		$param = $this->input->post('qr');
		$param = $this->security->xss_clean($param);

		$old_qr = $this->SettingsModel->get_present_config(); //?
		$this->delete_qrcode($old_qr[0]->foto_qrcode);

		/* Load QR Code Library */
		$this->load->library('ciqrcode');

		/* Data */
		$hex_data   = bin2hex($param);
		$save_name  = $hex_data . '.png';

		/* QR Code File Directory Initialize */
		$dir = 'uploads/general/images/qrcode/';
		if (!file_exists($dir)) {
			mkdir($dir, 0775, true);
		}

		/* QR Configuration  */
		$config['cacheable']    = true;
		$config['imagedir']     = $dir;
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(255, 255, 255);
		$config['white']        = array(255, 255, 255);
		$this->ciqrcode->initialize($config);

		/* QR Data  */
		$params['data']     = $param;
		$params['level']    = 'L';
		$params['size']     = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $save_name;

		$name_dir_fotoqr = $dir . $save_name;

		if ($this->ciqrcode->generate($params)) {

			$update = $this->SettingsModel->update_qr_code($param, $ket, $name_dir_fotoqr);

			if ($update == true) {
				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Generate QR Code baru telah diupdate."));
			} else {
				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
			}
		} else {
			$this->session->set_flashdata('flash_message', err_msg('Maaf, Generate QR Code Terjadi kesalahan...'));
		}
	}

	public function delete_general_file($name = '')
	{
		$path = './uploads/general/images/';
		$path_thumb = './uploads/general/images/thumbs/';
		@unlink($path . $name);
		@unlink($path_thumb . $name);
	}

	public function delete_qrcode($path = '')
	{
		@unlink($path);
	}

	//----------------------------------------------------------------//
}
