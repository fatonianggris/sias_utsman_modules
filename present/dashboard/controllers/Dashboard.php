<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('DashboardModel');
        $this->user_present = $this->session->userdata("sias-present");
        if ($this->session->userdata('sias-present') == FALSE) {
            redirect('present/auth');
        }
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    public function index() {
        $data['nav_dash'] = 'menu-item-here';
        date_default_timezone_set('Asia/Jakarta');

        $data['title'] = 'Sistem Absensi | Sekolah Utsman';

        $data['page'] = $this->DashboardModel->get_general_page();
        $data['contact'] = $this->DashboardModel->get_contact();
        $data['present_config'] = $this->DashboardModel->get_present_config();
        $data['total_present'] = $this->DashboardModel->get_total_present($this->user_present[0]->id_pegawai);
        $data['present_now'] = $this->DashboardModel->get_present_now($this->user_present[0]->id_pegawai, date("Y-m-d"));
        $data['one_signal'] = $this->DashboardModel->get_third_party_key(); //?  

        $this->load->view('present_view_dashboard', $data);
        //$this->template->load('template_present/template_present', 'under_dev', $data);
    }

    //-----------------------------------------------------------------------//
//
}
