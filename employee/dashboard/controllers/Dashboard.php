<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('DashboardModel');
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    
    public function index() {
        $data['nav_dashboard'] = 'menu-item-open';

        $data['total_employe'] = $this->DashboardModel->get_total_employee($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['total_student'] = $this->DashboardModel->get_total_students($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['total_present'] = $this->DashboardModel->get_total_present($this->usr_employee[0]->id_pegawai);
        $data['new_announcement'] = $this->DashboardModel->get_new_announcement();
        $data['status_update_bio'] = $this->DashboardModel->get_status_bio();
        $data['status_update_quissionare'] = $this->DashboardModel->get_status_quissionare();
        $data['schoolyear'] = $this->DashboardModel->get_schoolyear_now();
        $data['page'] = $this->DashboardModel->get_general_page();
        $data['questionnaire'] = $this->DashboardModel->get_questionnaire_active(); //?  

        $this->template->load('template_employee/template_employee', 'dashboard', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function change_status_bio_student() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);
        $id = paramDecrypt($id);

        $update = $this->DashboardModel->update_status_bio_student($id);

        if ($update == true) {
            $this->DashboardModel->update_date_bio();
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Biodata Siswa telah disimpan.."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
        }
    }

    public function change_status_eval_employe() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);
        $id = paramDecrypt($id);

        $update = $this->DashboardModel->update_status_eval_employe($id);

        if ($update == true) {
            $this->DashboardModel->update_date_eval();
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Update Penilaian Pegawai telah disimpan.."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
        }
    }

    //-----------------------------------------------------------------------//
//
}
