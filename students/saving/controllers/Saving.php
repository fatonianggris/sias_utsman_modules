<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Saving extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->user_students = $this->session->userdata("sias-students");
        if ($this->session->userdata('sias-students') == false) {
            redirect('students/auth');
        }
        $this->load->model('SavingModel');
    }

    public function list_student_general_saving()
    {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->SavingModel->get_contact();
        $data['page'] = $this->SavingModel->get_page();
        $data['class'] = $this->SavingModel->get_class();
        $data['grade'] = $this->SavingModel->get_grade();
        $data['schoolyear'] = $this->SavingModel->get_schoolyear_all();
        $data['general_saving'] = $this->SavingModel->get_general_saving_by_nis_student($this->user_students[0]->nis);
		$data['general_saldo'] = $this->SavingModel->get_all_saldo_by_nis_student($this->user_students[0]->nis);

        $this->load->view('list_students_general_saving', $data);
    }

    public function list_student_qurban_saving()
    {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->SavingModel->get_contact();
        $data['page'] = $this->SavingModel->get_page();
        $data['class'] = $this->SavingModel->get_class();
        $data['grade'] = $this->SavingModel->get_grade();
        $data['schoolyear'] = $this->SavingModel->get_schoolyear_all();
        $data['qurban_saving'] = $this->SavingModel->get_qurban_saving_by_nis_student($this->user_students[0]->nis);
		$data['qurban_saldo'] = $this->SavingModel->get_all_saldo_by_nis_student($this->user_students[0]->nis);


        $this->load->view('list_students_qurban_saving', $data);
    }

    public function list_student_tour_saving()
    {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->SavingModel->get_contact();
        $data['page'] = $this->SavingModel->get_page();
        $data['class'] = $this->SavingModel->get_class();
        $data['grade'] = $this->SavingModel->get_grade();
        $data['schoolyear'] = $this->SavingModel->get_schoolyear_all();
        $data['tour_saving'] = $this->SavingModel->get_tour_saving_by_nis_student($this->user_students[0]->nis);
		$data['tour_saldo'] = $this->SavingModel->get_all_saldo_by_nis_student($this->user_students[0]->nis);

        $this->load->view('list_students_tour_saving', $data);
    }

    public function detail_student_general_transaction($id = '')
    {
        $id = paramDecrypt($id);
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->SavingModel->get_contact();
        $data['page'] = $this->SavingModel->get_page();
        $data['detail_general'] = $this->SavingModel->get_general_transaction_by_id_transaction($id);

        $this->load->view('detail_students_general_transaction', $data);
    }

	public function detail_student_qurban_transaction($id = '')
    {
        $id = paramDecrypt($id);
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->SavingModel->get_contact();
        $data['page'] = $this->SavingModel->get_page();
        $data['detail_qurban'] = $this->SavingModel->get_qurban_transaction_by_id_transaction($id);

        $this->load->view('detail_students_qurban_transaction', $data);
    }

	public function detail_student_tour_transaction($id = '')
    {
        $id = paramDecrypt($id);
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->SavingModel->get_contact();
        $data['page'] = $this->SavingModel->get_page();
        $data['detail_tour'] = $this->SavingModel->get_tour_transaction_by_id_transaction($id);

        $this->load->view('detail_students_tour_transaction', $data);
    }

    public function list_joint_saving()
    {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->SavingModel->get_contact();
        $data['page'] = $this->SavingModel->get_page();
        $data['class'] = $this->SavingModel->get_class();
        $data['grade'] = $this->SavingModel->get_grade();
        $data['schoolyear'] = $this->SavingModel->get_schoolyear_all();
        $data['joint_saving'] = $this->SavingModel->get_joint_saving_by_nis_student($this->user_students[0]->nis_siswa);

        $this->load->view('list_students_joint_saving', $data);
    }

	public function detail_student_joint_transaction($id = '')
    {
        $id = paramDecrypt($id);
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->SavingModel->get_contact();
        $data['page'] = $this->SavingModel->get_page();
        $data['detail_joint'] = $this->SavingModel->get_joint_transaction_by_nis_saving($id);

        $this->load->view('detail_students_joint_transaction', $data);
    }

}
