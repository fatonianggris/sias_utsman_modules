<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        $this->load->model('ReportModel');
        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    
    public function list_student_report_all() {
        $data['nav_student_aca'] = 'menu-item-open';
        $data['nav_student_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_student_aca_rep'] = 'menu-item-active';

        $data['report'] = $this->ReportModel->get_report_all($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['class'] = $this->ReportModel->get_class($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['grade'] = $this->ReportModel->get_grade($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['homeroom'] = $this->ReportModel->get_homeroom_teacher($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['schoolyear'] = $this->ReportModel->get_schoolyear();

        $this->template->load('template_employee/template_employee', 'student_list_report_all', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    //-----------------------------------------------------------------------//
//
}
