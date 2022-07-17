<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Presence extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('PresenceModel');
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    
    public function list_student_presence_all() {
        $data['nav_student_aca'] = 'menu-item-open';
        $data['nav_student_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_student_aca_pre'] = 'menu-item-active';

        $data['presence'] = $this->PresenceModel->get_presence_all($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['class'] = $this->PresenceModel->get_class($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['grade'] = $this->PresenceModel->get_grade($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['homeroom'] = $this->PresenceModel->get_homeroom_teacher($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

        $data['schoolyear'] = $this->PresenceModel->get_schoolyear();

        $this->template->load('template_employee/template_employee', 'student_list_presence_all', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    //-----------------------------------------------------------------------//
//
}
