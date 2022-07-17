<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Academic extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->user_students = $this->session->userdata("sias-students");
        if ($this->session->userdata('sias-students') == FALSE) {
            redirect('students/auth');
        }
        $this->load->model('AcademicModel');
    }

    public function list_student_report() {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->AcademicModel->get_contact();
        $data['page'] = $this->AcademicModel->get_page();
        $data['class'] = $this->AcademicModel->get_class();
        $data['grade'] = $this->AcademicModel->get_grade();
        $data['schoolyear'] = $this->AcademicModel->get_schoolyear_all();
        $data['report'] = $this->AcademicModel->get_report_by_id_student($this->user_students[0]->id_siswa);

        $this->load->view('list_students_report', $data);
    }

    public function detail_student_report($id = '') {
        $id = paramDecrypt($id);
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->AcademicModel->get_contact();
        $data['page'] = $this->AcademicModel->get_page();

        $data['detail_report'] = $this->AcademicModel->get_report_by_id_report($id);

        $this->load->view('detail_students_report', $data);
    }

    public function list_student_presence() {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->AcademicModel->get_contact();
        $data['page'] = $this->AcademicModel->get_page();
        $data['class'] = $this->AcademicModel->get_class();
        $data['grade'] = $this->AcademicModel->get_grade();
        $data['schoolyear'] = $this->AcademicModel->get_schoolyear_all();
        $data['presence'] = $this->AcademicModel->get_presence_by_id_student($this->user_students[0]->id_siswa);

        $this->load->view('list_students_presence', $data);
    }

}
