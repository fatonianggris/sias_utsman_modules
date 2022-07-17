<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-present') == FALSE) {
            redirect('present/auth');
        }
        $this->user_present = $this->session->userdata("sias-present");
        $this->load->model('AccountModel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DATA AKUN ADMIN------------------------------//
    //
    
    public function edit_profile() {

        $data['title'] = 'Absensi | Sekolah Utsman ';
        $data['account'] = $this->AccountModel->get_account_id($this->user_present[0]->id_pegawai); //? 
        $data['contact'] = $this->AccountModel->get_contact();
        $data['page'] = $this->AccountModel->get_page();

        $check = $this->AccountModel->get_account_id($this->user_present[0]->id_pegawai);

        if ($check == FALSE or empty($this->user_present[0]->id_pegawai)) {
            $this->load->view('error_404', $data);
        } else {
            $this->load->view('present_edit_profile', $data);
        }
    }

    public function update_account_profile() {
        $id = $this->user_present[0]->id_pegawai;

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['foto_pegawai'] = $data['img_foto_pegawai'];
        $data['foto_pegawai_thumb'] = $data['img_foto_pegawai_thumb'];
        $image_old = explode('/', $data['img_foto_pegawai']);
        $image_name_old = $image_old[3];

        $this->load->library('upload'); //load library upload file
        $this->load->library('image_lib'); //load library image

        if (!empty($_FILES['foto_pegawai']['tmp_name'])) {

            $this->delete_ktp_photo($image_name_old); //delete existing file

            $path = 'uploads/employe/images/';
            $path_thumb = 'uploads/employe/images/thumbs/';
            //config upload file
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 5048; //set without limit
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
                $img['width'] = 1000;
                $img['height'] = 1000;

                $this->image_lib->initialize($img);
                if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                    $data['foto_pegawai_thumb'] = $path_thumb . $name;
                } else {
                    $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                    redirect('present/settings/account/edit_profile');
                }
            } else {
                $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                redirect('present/settings/account/edit_profile');
            }
        }
        if (@$data['password'] != '' or @ $data['password'] != NULL) {
            $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
            $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('present/settings/account/edit_profile');
            } else {
                $this->AccountModel->update_password($id, $data['password']);
            }
        }

        $edit = $this->AccountModel->update_account_profile($id, $data);
        if ($edit == true) {

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Profile Akun Anda Telah diupdate.."));
            redirect('present/settings/account/edit_profile');
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
            redirect('present/settings/account/edit_profile');
        }
    }

    //---------------------------------------DELETE FILE---------------------------------------//

    public function delete_photo($name = '') {
        $path = 'uploads/employe/images/';
        $path_thumb = 'uploads/employe/images/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //------------------------------------------------------------------------------//
}
