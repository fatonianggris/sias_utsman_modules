<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->load->model('GradeModel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------LIST GRADE--------------------------------//
    //
    public function list_grade() {

        $data['nav_master_grad'] = 'menu-item-open';
        $data['sub_nav_master_grad'] = 'menu-item-active';
        $data['grade'] = $this->GradeModel->get_all_grade();
        $this->template->load('template_employee/template_employee', 'grade_list', $data);
    }

    //---------------------------------GRADE------------------------------------//

    public function post_grade() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_tingkat', 'Nama Tingkat', 'required');
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');

        $check = $this->GradeModel->check_duplicate_grade(strtolower($data['nama_tingkat']));

        if ($check == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Tingkat '$data[nama_tingkat]' Telah Tersedia."));
            redirect('employee/master/grade/list_grade');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/master/grade/list_grade');
            } else {

                $input = $this->GradeModel->insert_grade($data);
                if ($input == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Tingkat '$data[nama_tingkat]' Telah Tersimpan."));
                    redirect('employee/master/grade/list_grade');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/master/grade/list_grade');
                }
            }
        }
    }

    public function update_grade($id = '') {

        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_tingkat', 'Nama Tingkat', 'required');
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');

        $get_old_name = $this->GradeModel->get_old_name_grade($id);
        $check = $this->GradeModel->check_duplicate_grade(strtolower($data['nama_tingkat']));

        if ($check == TRUE && $data['nama_tingkat'] != $get_old_name[0]->nama_tingkat) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Tingkat '$data[nama_tingkat]' Telah Tersedia."));
            redirect('employee/master/grade/list_grade');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/master/grade/list_grade');
            } else {
                // print_r($data);exit;    
                $edit = $this->GradeModel->update_grade($id, $data);
                if ($edit == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Tingkat '$data[nama_tingkat]' Telah Terupdate."));
                    redirect('employee/master/grade/list_grade');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/master/grade/list_grade');
                }
            }
        }
    }

    public function delete_grade() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old_name = $this->GradeModel->get_old_name_grade($id);
        $delete = $this->GradeModel->delete_grade($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Tingkat '$get_old_name[0]->nama_tingkat' Telah Terhapus."));
            redirect('employee/master/grade/list_grade');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
            redirect('employee/master/grade/list_grade');
        }
    }

    //-----------------------------------------------------------------------//
}
