<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Present extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('PresentModel');
		$this->load->library('form_validation');
		$this->user_present = $this->session->userdata("sias-present");

		if ($this->session->userdata('sias-present') == FALSE) {
			redirect('present/auth');
		}
	}

	//
	//---------------------------------LETTER-----------------------------------//
	//

	public function list_history_present()
	{
		$data['title'] = 'Histori Absen | Sekolah Utsman ';

		$data['contact'] = $this->PresentModel->get_contact();
		$data['page'] = $this->PresentModel->get_page();
		$data['schoolyear'] = $this->PresentModel->get_schoolyear_all();
		$data['present_config'] = $this->PresentModel->get_present_config();
		$data['present'] = $this->PresentModel->get_history_present_all($this->user_present[0]->id_pegawai);

		$this->load->view('list_history_present', $data);
	}

	public function do_present()
	{
		$data['title'] = 'Absen | Sekolah Utsman ';
		date_default_timezone_set('Asia/Jakarta');

		$data['contact'] = $this->PresentModel->get_contact();
		$data['page'] = $this->PresentModel->get_page();
		$data['present_config'] = $this->PresentModel->get_present_config();
		$data['present_now'] = $this->PresentModel->get_present_now($this->user_present[0]->id_pegawai, date("Y-m-d"));

		$this->load->view('do_present', $data);
	}

	public function do_present_permission()
	{
		$data['title'] = 'Absen | Sekolah Utsman ';
		date_default_timezone_set('Asia/Jakarta');

		$data['contact'] = $this->PresentModel->get_contact();
		$data['page'] = $this->PresentModel->get_page();
		$data['present_config'] = $this->PresentModel->get_present_config();
		$data['present_now'] = $this->PresentModel->get_present_now($this->user_present[0]->id_pegawai, date("Y-m-d"));

		$this->load->view('do_present_permission', $data);
	}

	public function do_present_scanner()
	{
		$data['title'] = 'Absen | Sekolah Utsman ';
		date_default_timezone_set('Asia/Jakarta');

		$data['contact'] = $this->PresentModel->get_contact();
		$data['page'] = $this->PresentModel->get_page();
		$data['present_config'] = $this->PresentModel->get_present_config();
		$data['present_now'] = $this->PresentModel->get_present_now($this->user_present[0]->id_pegawai, date("Y-m-d"));

		$this->load->view('do_present_scanner', $data);
	}

	public function detail_history_present($id = '')
	{
		$id = paramDecrypt($id);

		$data['title'] = 'Detail Histori Absen | Sekolah Utsman ';

		$data['present'] = $this->PresentModel->get_history_present_id($id); //? 
		$data['contact'] = $this->PresentModel->get_contact();
		$data['page'] = $this->PresentModel->get_page();

		if ($data['present'] == FALSE or empty($id)) {
			$datas['title'] = 'ERROR | PAGE NOT FOUND';
			$this->load->view('error_404', $datas);
		} else {
			$this->load->view('detail_history_present', $data);
		}
	}

	public function inside_poly($lat, $longt, $fenceArea)
	{
		$x = $lat;
		$y = $longt;

		$inside = false;
		for ($i = 0, $j = count($fenceArea) - 1; $i < count($fenceArea); $j = $i++) {
			$xi = $fenceArea[$i]['lat'];
			$yi = $fenceArea[$i]['longt'];
			$xj = $fenceArea[$j]['lat'];
			$yj = $fenceArea[$j]['longt'];

			$intersect = (($yi > $y) != ($yj > $y)) && ($x < ($xj - $xi) * ($y - $yi) / ($yj - $yi) + $xi);
			if ($intersect) {
				$inside = !$inside;
			}
		}

		return $inside;
	}

	public function check_location()
	{
		$lat = $this->input->post('latitude');
		$longt = $this->input->post('longtitude');

		$get_poly = $this->PresentModel->get_all_polygon();

		if ($lat != NULL && $longt != NULL && $this->inside_poly($lat, $longt, $get_poly) == TRUE) {
			$isAvailable = true;
			echo json_encode(array(
				'valid' => $isAvailable,
			));
		} else {
			$isAvailable = false;
			echo json_encode(array(
				'valid' => $isAvailable,
			));
		}
	}

	public function post_present_in()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);
		date_default_timezone_set('Asia/Jakarta');

		$present = $this->PresentModel->get_present_config();

		$this->form_validation->set_rules('lat', 'Lokasi Anda diperlukan', 'required');
		$this->form_validation->set_rules('longt', 'Lokasi Anda diperlukan', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
			redirect('present/dashboard');
		} else {

			if ($present[0]->status_absensi_selfie == 1) {

				$this->load->library('upload'); //load library upload file
				$this->load->library('image_lib'); //load library image

				if (!empty($_FILES['foto_bukti']['name'])) {

					$path = 'uploads/present/images/';
					$path_thumb = 'uploads/present/images/thumbs/';
					//config upload file
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 5048; //set without limit
					$config['overwrite'] = FALSE; //if have same name, add number
					$config['remove_spaces'] = TRUE; //change space into _
					$config['encrypt_name'] = TRUE;
					//initialize config upload
					$this->upload->initialize($config);

					if ($this->upload->do_upload('foto_bukti')) { //if success upload data
						$result['upload'] = $this->upload->data();
						$name = $result['upload']['file_name'];
						$data['foto_bukti'] = $path . $name;

						$img['image_library'] = 'gd2';
						$img['source_image'] = $path . $name;
						$img['new_image'] = $path_thumb . $name;
						$img['maintain_ratio'] = true;
						$img['width'] = 1080;
						$img['height'] = 720;

						$this->image_lib->initialize($img);
						if ($this->image_lib->resize()) { //if success to resize (create thumbs)
							$data['foto_bukti_thumb'] = $path_thumb . $name;
						} else {
							$this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
							redirect('present/dashboard');
						}
					} else {
						$this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
						redirect('present/dashboard');
					}
				}
			}
			// print_r($data);exit;    
			$insert = $this->PresentModel->insert_present_in($this->user_present[0]->id_pegawai, date("Y-m-d"), $data);

			if ($insert == true) {
				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Anda telah Absen Masuk pada pukul: " . date("Y-m-d H:i:s") . "."));
				redirect('present/dashboard');
			} else {
				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
				redirect('present/dashboard');
			}
		}
	}

	public function post_present_out()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);
		date_default_timezone_set('Asia/Jakarta');

		$present = $this->PresentModel->get_present_config();

		$this->form_validation->set_rules('lat', 'Lokasi Anda diperlukan', 'required');
		$this->form_validation->set_rules('longt', 'Lokasi Anda diperlukan', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
			redirect('present/dashboard');
		} else {

			if ($present[0]->status_absensi_selfie == 1) {

				$this->load->library('upload'); //load library upload file
				$this->load->library('image_lib'); //load library image

				if (!empty($_FILES['foto_bukti']['name'])) {

					$path = 'uploads/present/images/';
					$path_thumb = 'uploads/present/images/thumbs/';
					//config upload file
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 5048; //set without limit
					$config['overwrite'] = FALSE; //if have same name, add number
					$config['remove_spaces'] = TRUE; //change space into _
					$config['encrypt_name'] = TRUE;
					//initialize config upload
					$this->upload->initialize($config);

					if ($this->upload->do_upload('foto_bukti')) { //if success upload data
						$result['upload'] = $this->upload->data();
						$name = $result['upload']['file_name'];
						$data['foto_bukti'] = $path . $name;

						$img['image_library'] = 'gd2';
						$img['source_image'] = $path . $name;
						$img['new_image'] = $path_thumb . $name;
						$img['maintain_ratio'] = true;
						$img['width'] = 1080;
						$img['height'] = 720;

						$this->image_lib->initialize($img);
						if ($this->image_lib->resize()) { //if success to resize (create thumbs)
							$data['foto_bukti_thumb'] = $path_thumb . $name;
						} else {
							$this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
							redirect('present/dashboard');
						}
					} else {
						$this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
						redirect('present/dashboard');
					}
				}
			}
			// print_r($data);exit;
			$insert = $this->PresentModel->insert_present_out($this->user_present[0]->id_pegawai, date("Y-m-d"), $data);

			if ($insert == true) {
				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Anda telah Absen Pulang pada pukul: " . date("Y-m-d H:i:s") . "."));
				redirect('present/dashboard');
			} else {
				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
				redirect('present/dashboard');
			}
		}
	}

	public function post_present_permission_in()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);
		date_default_timezone_set('Asia/Jakarta');

		$present = $this->PresentModel->get_present_config();

		$this->form_validation->set_rules('lat', 'Lokasi Anda diperlukan', 'required');
		$this->form_validation->set_rules('longt', 'Lokasi Anda diperlukan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan/Alasan Izin', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
			redirect('present/dashboard');
		} else {

			if ($present[0]->status_absensi_selfie == 1) {

				$this->load->library('upload'); //load library upload file
				$this->load->library('image_lib'); //load library image

				if (!empty($_FILES['foto_bukti']['name'])) {

					$path = 'uploads/present/images/';
					$path_thumb = 'uploads/present/images/thumbs/';
					//config upload file
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 5048; //set without limit
					$config['overwrite'] = FALSE; //if have same name, add number
					$config['remove_spaces'] = TRUE; //change space into _
					$config['encrypt_name'] = TRUE;
					//initialize config upload
					$this->upload->initialize($config);

					if ($this->upload->do_upload('foto_bukti')) { //if success upload data
						$result['upload'] = $this->upload->data();
						$name = $result['upload']['file_name'];
						$data['foto_bukti'] = $path . $name;

						$img['image_library'] = 'gd2';
						$img['source_image'] = $path . $name;
						$img['new_image'] = $path_thumb . $name;
						$img['maintain_ratio'] = true;
						$img['width'] = 1080;
						$img['height'] = 720;

						$this->image_lib->initialize($img);
						if ($this->image_lib->resize()) { //if success to resize (create thumbs)
							$data['foto_bukti_thumb'] = $path_thumb . $name;
						} else {
							$this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
							redirect('present/dashboard');
						}
					} else {
						$this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
						redirect('present/dashboard');
					}
				}
			}
			// print_r($data);exit;    
			$insert = $this->PresentModel->insert_present_permission_in($this->user_present[0]->id_pegawai, date("Y-m-d"), $data);

			if ($insert == true) {
				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Anda telah Izin Absen Masuk pada pukul: " . date("Y-m-d H:i:s") . "."));
				redirect('present/dashboard');
			} else {
				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
				redirect('present/dashboard');
			}
		}
	}

	public function post_present_permission_out()
	{

		$param = $this->input->post();
		$data = $this->security->xss_clean($param);
		date_default_timezone_set('Asia/Jakarta');

		$present = $this->PresentModel->get_present_config();

		$this->form_validation->set_rules('lat', 'Lokasi Anda diperlukan', 'required');
		$this->form_validation->set_rules('longt', 'Lokasi Anda diperlukan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan/Alasan Izin', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
			redirect('present/dashboard');
		} else {

			if ($present[0]->status_absensi_selfie == 1) {

				$this->load->library('upload'); //load library upload file
				$this->load->library('image_lib'); //load library image

				if (!empty($_FILES['foto_bukti']['name'])) {

					$path = 'uploads/present/images/';
					$path_thumb = 'uploads/present/images/thumbs/';
					//config upload file
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 5048; //set without limit
					$config['overwrite'] = FALSE; //if have same name, add number
					$config['remove_spaces'] = TRUE; //change space into _
					$config['encrypt_name'] = TRUE;
					//initialize config upload
					$this->upload->initialize($config);

					if ($this->upload->do_upload('foto_bukti')) { //if success upload data
						$result['upload'] = $this->upload->data();
						$name = $result['upload']['file_name'];
						$data['foto_bukti'] = $path . $name;

						$img['image_library'] = 'gd2';
						$img['source_image'] = $path . $name;
						$img['new_image'] = $path_thumb . $name;
						$img['maintain_ratio'] = true;
						$img['width'] = 1080;
						$img['height'] = 720;

						$this->image_lib->initialize($img);
						if ($this->image_lib->resize()) { //if success to resize (create thumbs)
							$data['foto_bukti_thumb'] = $path_thumb . $name;
						} else {
							$this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
							redirect('present/dashboard');
						}
					} else {
						$this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
						redirect('present/dashboard');
					}
				}
			}
			// print_r($data);exit;    
			$insert = $this->PresentModel->insert_present_permission_out($this->user_present[0]->id_pegawai, date("Y-m-d"), $data);

			if ($insert == true) {
				$this->session->set_flashdata('flash_message', succ_msg("Berhasil, Anda telah Izin Absen Pulang pada pukul: " . date("Y-m-d H:i:s") . "."));
				redirect('present/dashboard');
			} else {
				$this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
				redirect('present/dashboard');
			}
		}
	}

	public function timer_clock()
	{
		date_default_timezone_set('Asia/Jakarta');
		echo $timestamp = date('H:i:s');
	}

	public function send_notification($title = '', $nop = '', $pemohon = '', $postlink = '')
	{

		$key = $this->PresentModel->get_third_party_key(); //?   

		$data = array(
			"app_id" => $key[0]->onesignal_app_id,
			"included_segments" => array('All'),
			"headings" => array(
				"en" => "$title"
			),
			"contents" => array(
				"en" => "NOP: $nop - ($pemohon)"
			),
			"url" => "$postlink"
		);

		// Print Output in JSON Format
		$data_string = json_encode($data);

		// API URL
		$url = "https://onesignal.com/api/v1/notifications";

		//Curl Headers
		$headers = array(
			"Authorization: Basic " . $key[0]->onesignal_auth . "",
			"Content-Type: application/json;
                charset = utf-8"
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		// Variable for Print the Result
		$response = curl_exec($ch);

		curl_close($ch);

		if ($response) {
			echo '1';
		} else {
			echo '0';
		}
	}

	//--------------------------------------------------------------------------//
}
