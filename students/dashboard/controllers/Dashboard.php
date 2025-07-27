<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('DashboardModel');
        $this->user_students = $this->session->userdata("sias-students");
        if ($this->session->userdata('sias-students') == false) {
            redirect('students/auth');
        }
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //

    public function index()
    {
        $data['nav_dash'] = 'menu-item-here';
        date_default_timezone_set('Asia/Jakarta');

        $data['title'] = 'Sistem Akademik | Sekolah Utsman';

        $data['page'] = $this->DashboardModel->get_general_page();
        $data['contact'] = $this->DashboardModel->get_contact();
        $data['students_config'] = $this->DashboardModel->get_students_config();
        $data['schoolyear'] = $this->DashboardModel->get_schoolyear_now();
        $data['total_students'] = $this->DashboardModel->get_total_presence($this->user_students[0]->id_siswa, $data['schoolyear'][0]->id_tahun_ajaran);
        $data['status_payment_dpb'] = $this->DashboardModel->get_status_payment_dpb($this->user_students[0]->nomor_pembayaran_dpb, date("Y-m"));
        $data['status_payment_du'] = $this->DashboardModel->get_status_payment_du($this->user_students[0]->nomor_pembayaran_du, date("Y"));
        $data['status_student'] = $this->DashboardModel->get_status_student($this->user_students[0]->id_siswa);
        $data['one_signal'] = $this->DashboardModel->get_third_party_key(); //?

        $this->load->view('students_view_dashboard', $data);
        //$this->template->load('template_students/template_students', 'under_dev', $data);
    }

    //-----------------------------------------------------------------------//
//
}
