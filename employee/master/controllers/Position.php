<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->load->model('PositionModel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------BLOG--------------------------------//
    //
     public function list_position() {

        $data['nav_master_pos'] = 'menu-item-open';
        $data['sub_nav_master_pos'] = 'menu-item-active';
        $data['position'] = $this->PositionModel->get_all_position();

        $this->template->load('template_employee/template_employee', 'position_list', $data);
    }

    //---------------------------------POSITION------------------------------------//

    public function post_position() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('level_jabatan', 'Level Jabatan', 'required');
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');
        $this->form_validation->set_rules('hasil_nama_jabatan', 'Hasil Nama Jabatan', 'required');

        $check = $this->PositionModel->check_duplicate_position(strtolower($data['hasil_nama_jabatan']));

        if ($check == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Jabatan '$data[hasil_nama_jabatan]' Telah Tersedia."));
            redirect('employee/master/position/list_position');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/master/position/list_position');
            } else {

                $input = $this->PositionModel->insert_position($data);
                if ($input == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Jabatan '$data[hasil_nama_jabatan]' Telah Tersimpan."));
                    redirect('employee/master/position/list_position');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/master/position/list_position');
                }
            }
        }
    }

    public function update_position($id = '') {

        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('level_jabatan', 'Level Jabatan', 'required');
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');
        $this->form_validation->set_rules('hasil_nama_jabatan', 'Hasil Nama Jabatan', 'required');

        $get_old_name = $this->PositionModel->get_old_name_position($id);
        $check = $this->PositionModel->check_duplicate_position(strtolower($data['hasil_nama_jabatan']));

        if ($check == TRUE && $data['hasil_nama_jabatan'] != $get_old_name[0]->nama_jabatan) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Jabatan '$data[hasil_nama_jabatan]' Telah Tersedia."));
            redirect('employee/master/position/list_position');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/master/position/list_position');
            } else {
                // print_r($data);exit;    
                $edit = $this->PositionModel->update_position($id, $data);
                if ($edit == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Jabatan '$data[hasil_nama_jabatan]' Telah Terupdate."));
                    redirect('employee/master/position/list_position');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/master/position/list_position');
                }
            }
        }
    }

    public function delete_position() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old_name = $this->PositionModel->get_old_name_position($id);
        $delete = $this->PositionModel->delete_position($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Jabatan " . $get_old_name[0]->hasil_nama_jabatan . " Telah Terhapus."));
            redirect('employee/master/position/list_position');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
            redirect('employee/master/position/list_position');
        }
    }

    //-----------------------------------------------------------------------//
}
