<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolyear extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->load->model('SchoolyearModel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------LIST SCHOOLYEAR--------------------------------//
    //
    public function list_schoolyear() {

        $data['nav_master_scyear'] = 'menu-item-open';
        $data['sub_nav_master_scyear'] = 'menu-item-active';
        $data['schoolyear'] = $this->SchoolyearModel->get_all_schoolyear();
        $this->template->load('template_employee/template_employee', 'schoolyear_list', $data);
    }

    //---------------------------------SCHOOLYEAR------------------------------------//

    public function post_schoolyear() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('tahun_awal', 'Tahun Awal', 'required');
        $this->form_validation->set_rules('tahun_akhir', 'Tahun Akhir', 'required');

        $is_empty = $this->SchoolyearModel->get_all_schoolyear();

        if ($is_empty == FALSE) {
            $data['status_tahun_ajaran'] = 1;
        } else {
            $data['status_tahun_ajaran'] = 0;
        }


        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/schoolyear/list_schoolyear');
        } else {
            $input = false;
            $smt = array('ganjil', 'genap');

            for ($i = 0; $i < count($smt); $i++) {

                $schoolyear_name = $data['label_thn_ajaran'] . ' ' . $data['tahun_awal'] . '/' . $data['tahun_akhir'] . ' Semseter ' . $smt[$i];
                $data['nama_tahun_ajaran'] = $schoolyear_name;
                $data['semester'] = $smt[$i];

                $check = $this->SchoolyearModel->check_duplicate_schoolyear(strtolower($schoolyear_name));

                if ($check == TRUE) {

                    $this->session->set_flashdata('flash_message', warn_msg("Mohon Maaf!, Tahun Ajaran '$schoolyear_name' Telah Tersedia."));
                    redirect('employee/master/schoolyear/list_schoolyear');
                } else {
                    $this->SchoolyearModel->insert_schoolyear($data);
                    $input = true;
                }
            }

            if ($input == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Tahun Ajaran '$schoolyear_name' Telah Tersimpan."));
                redirect('employee/master/schoolyear/list_schoolyear');
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf!, Terjadi kesalahan.'));
                redirect('employee/master/schoolyear/list_schoolyear');
            }
        }
    }

    public function update_schoolyear($id = '') {

        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('tahun_awal', 'Tahun Awal', 'required');
        $this->form_validation->set_rules('tahun_akhir', 'Tahun Akhir', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');

        $schoolyear_name = $data['label_thn_ajaran'] . ' ' . $data['tahun_awal'] . '/' . $data['tahun_akhir'] . ' ' . $data['label_smt'] . ' ' . $data['semester'];
        $get_old_name = $this->SchoolyearModel->get_old_name_schoolyear($id);
        $data['nama_tahun_ajaran'] = $schoolyear_name;

        $check = $this->SchoolyearModel->check_duplicate_schoolyear(strtolower($schoolyear_name));

        if ($check == TRUE && $schoolyear_name != $get_old_name[0]->nama_tahun_ajaran) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Label '$schoolyear_name' Telah Tersedia."));
            redirect('employee/master/schoolyear/list_schoolyear');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/master/schoolyear/list_schoolyear');
            } else {
                // print_r($data);exit;    
                $edit = $this->SchoolyearModel->update_schoolyear($id, $data);
                if ($edit == true) {
               
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Label '$schoolyear_name' Telah Terupdate."));
                    redirect('employee/master/schoolyear/list_schoolyear');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/master/schoolyear/list_schoolyear');
                }
            }
        }
    }

    public function delete_schoolyear() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old_name = $this->SchoolyearModel->get_old_name_schoolyear($id);
        $delete = $this->SchoolyearModel->delete_schoolyear($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Label " . $get_old_name[0]->nama_tahun_ajaran . " Telah Terhapus."));
            redirect('employee/master/schoolyear/list_schoolyear');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
            redirect('employee/master/schoolyear/list_schoolyear');
        }
    }

    //--------------------------------ACTIVATED SCHOOLYEAR------------------------------------//

    public function activate_schoolyear() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $disable = $this->SchoolyearModel->disable_status_schoolyear();
        $activate = $this->SchoolyearModel->update_status_schoolyear($id, 1);

        if ($activate == true && $disable == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Tahun Ajaran Telah Terupdate.."));
            redirect('employee/master/schoolyear/list_schoolyear');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('employee/master/schoolyear/list_schoolyear');
        }
    }

}
