<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Presence extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        $this->usr_employee = $this->session->userdata("sias-employee");
        $this->load->model('PresenceModel');
    }

    //
    //-------------------------------LIST EMPLOYEE------------------------------//
    //
    
    public function list_employe_presence_all_day() {
        $data['nav_employe_aca'] = 'menu-item-open';
        $data['nav_employe_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_employe_aca_pre'] = 'menu-item-open';
        $data['sub_nav_employe_aca_pre_day'] = 'menu-item-active';

        $data['schoolyear'] = $this->PresenceModel->get_schoolyear();
        $data['present'] = $this->PresenceModel->get_present_all_day($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

        $this->template->load('template_employee/template_employee', 'employe_list_presence_all_day', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function list_employe_presence_all_month() {
        $data['nav_employe_aca'] = 'menu-item-open';
        $data['nav_employe_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_employe_aca_pre'] = 'menu-item-open';
        $data['sub_nav_employe_aca_pre_month'] = 'menu-item-active';

        $data['schoolyear'] = $this->PresenceModel->get_schoolyear();
        $data['present'] = $this->PresenceModel->get_present_all_month($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

        $this->template->load('template_employee/template_employee', 'employe_list_presence_all_month', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function list_employe_presence_personal() {
        $data['nav_employe_pre'] = 'menu-item-open';
        $data['sub_nav_employe_pre'] = 'menu-item-active';

        $data['schoolyear'] = $this->PresenceModel->get_schoolyear();
        $data['present'] = $this->PresenceModel->get_present_by_id($this->usr_employee[0]->id_pegawai);

        $this->template->load('template_employee/template_employee', 'employe_list_presence_personal', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function detail_employe_presence($id = '') {
        $id = paramDecrypt($id);

        $data['present'] = $this->PresenceModel->get_employe_present_id($id); //? 

        if ($data['present'] == FALSE or empty($id)) {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        } else {
            $this->template->load('template_employee/template_employee', 'employe_detail_presence', $data);
        }
    }

    //-----------------------------------------------------------------------//
//
}
