<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->user_employe = $this->session->userdata("sias-employee");

        $this->load->model('AccountModel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DATA AKUN ADMIN------------------------------//
    //

    public function edit_profile($id = '') {

        $id = paramDecrypt($id);

        $data['nav_set'] = 'menu-item-here';

        $data['profile'] = $this->AccountModel->get_detail_profile($id); //?
        $data['provinsi'] = $this->AccountModel->get_provinsi();

        $check = $this->AccountModel->get_account_id($id);
        if ($check == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_employee/template_employee', 'account_edit_profile', $data);
        }
    }

    public function check_nik_profile() {
        $id = $this->input->post('id');
        $nik = $this->input->post('nik');

        $check = $this->AccountModel->get_nik_employe($nik);
        $check_old = $this->AccountModel->get_old_employe($id);

        if ($check == TRUE && $id == NULL) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nik != $nik) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nik == $nik) {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == FALSE) {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        }
    }

    public function check_nip_profile() {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');

        $check = $this->AccountModel->get_nip_employe($nip);
        $check_old = $this->AccountModel->get_old_employe($id);

        if ($check == TRUE && $id == NULL) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nip != $nip) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nip == $nip) {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == FALSE) {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        }
    }

        public function update_account_profile($id = '') {

        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nik', 'NISN Pegawai', 'required');
        // $this->form_validation->set_rules('nip', 'NIP Pegawai', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap Pegawai', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tanggal Lahir Pegawai', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Agama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Nomor Handphone', 'required');
        $this->form_validation->set_rules('agama', 'Email', 'required');
        $this->form_validation->set_rules('warga_negara', 'Warga Negara', 'required');
        $this->form_validation->set_rules('status_nikah', 'Status Nikah', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('jumlah_anak', 'Jumlah Anak', 'required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kelurahan_desa', 'Kelurahan/Desa', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor Handphone', 'required');

        $data['foto_pegawai'] = $data['img_foto_pegawai'];
        $data['foto_pegawai_thumb'] = $data['img_foto_pegawai_thumb'];

        $image_old = explode('/', $data['img_foto_pegawai']);
        $image_name_old = $image_old[3];

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/settings/account/edit_profile/' . paramEncrypt($id));
        } else {

            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image

            if (!empty($_FILES['foto_pegawai']['tmp_name'])) {

                $this->delete_emp_photo($image_name_old); //delete existing file

                $path = 'uploads/employe/images/';
                $path_thumb = 'uploads/employe/images/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 1048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_pegawai')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['foto_pegawai'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 800;
                    $img['height'] = 800;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['foto_pegawai_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('employee/settings/account/edit_profile/' . paramEncrypt($id));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('employee/settings/account/edit_profile/' . paramEncrypt($id));
                }
            }
            if (!empty($data['password'])) {

                $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
                $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                    redirect('employee/settings/account/edit_profile/' . paramEncrypt($id));
                } else {

                    $this->AccountModel->update_password($id, $data['password']);
                }
            }

            $edit = $this->AccountModel->update_profile($id, $data);
            if ($edit == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Profil Anda '$data[nama_lengkap]' ('$data[nip]') Telah diupdate.."));
                redirect('employee/settings/account/edit_profile/' . paramEncrypt($id));
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                redirect('employee/settings/account/edit_profile/' . paramEncrypt($id));
            }
        }
    }

    //---------------------------------------DELETE FILE---------------------------------------//

    public function delete_emp_photo($name = '') {
        $path = 'uploads/employe/images/';
        $path_thumb = 'uploads/employe/images/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //------------------------------------------------------------------------------//
}
