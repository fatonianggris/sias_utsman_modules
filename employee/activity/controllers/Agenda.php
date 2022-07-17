<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        // Load Library
        $this->load->model('AgendaModel');
        $this->load->library('form_validation');
    }

    //--------------------------LIST AGENDA----------------------------//

    public function list_agenda() {

        $data['nav_activity_agn'] = 'menu-item-open';
        $data['sub_nav_activity_agn'] = 'menu-item-active';
        $this->template->load('template_employee/template_employee', 'calendar_agenda', $data);
    }

    //---------------------------------------------------------------//
//
}
