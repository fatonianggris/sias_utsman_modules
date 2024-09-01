<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->user_students = $this->session->userdata("sias-students");
        if ($this->session->userdata('sias-students') == FALSE) {
            redirect('students/auth');
        }
        $this->load->model('FinanceModel');
    }

    public function list_student_payment_dpb() {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->FinanceModel->get_contact();
        $data['page'] = $this->FinanceModel->get_page();
        $data['class'] = $this->FinanceModel->get_class();
        $data['grade'] = $this->FinanceModel->get_grade();
        $data['schoolyear'] = $this->FinanceModel->get_schoolyear_all();
        $data['loan'] = $this->FinanceModel->get_payment_loan_dpb_by_number_student($this->user_students[0]->nomor_pembayaran_dpb);
        $data['payment'] = $this->FinanceModel->get_payment_dpb_by_id_student($this->user_students[0]->id_siswa);
        $data['check_payment'] = $this->FinanceModel->get_loan_dpb_by_number_student($this->user_students[0]->nomor_pembayaran_dpb);

        $this->load->view('list_students_payment_dpb', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function list_student_payment_du() {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->FinanceModel->get_contact();
        $data['page'] = $this->FinanceModel->get_page();
        $data['class'] = $this->FinanceModel->get_class();
        $data['grade'] = $this->FinanceModel->get_grade();
        $data['schoolyear'] = $this->FinanceModel->get_schoolyear_all();
        $data['loan'] = $this->FinanceModel->get_payment_loan_du_by_number_student($this->user_students[0]->nomor_pembayaran_du);
        $data['payment'] = $this->FinanceModel->get_payment_du_by_id_student($this->user_students[0]->id_siswa);

        $this->load->view('list_students_payment_du', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function detail_student_payment_du($id = '') {
        $id = paramDecrypt($id);
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->FinanceModel->get_contact();
        $data['page'] = $this->FinanceModel->get_page();
        $data['detail_payment'] = $this->FinanceModel->get_payment_du_by_id_payment($id);

        $this->template->load('template_students/template_students', 'student_view_finance_payment_du', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }
    
    public function detail_student_payment_dpb($id = '') {
        $id = paramDecrypt($id);
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->FinanceModel->get_contact();
        $data['page'] = $this->FinanceModel->get_page();
        $data['detail_payment'] = $this->FinanceModel->get_payment_dpb_by_id_payment($id);

        $this->template->load('template_students/template_students', 'student_view_finance_payment_dpb', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

}
