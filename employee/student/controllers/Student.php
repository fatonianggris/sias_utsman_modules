<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        $this->load->model('StudentModel');
        $this->load->library('form_validation');
        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    
    public function list_student_all() {
        $data['nav_student_aca'] = 'menu-item-open';
        $data['nav_student_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_student_aca_all'] = 'menu-item-active';
        $data['student'] = $this->StudentModel->get_students_all($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['class'] = $this->StudentModel->get_class($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['grade'] = $this->StudentModel->get_grade($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['schoolyear'] = $this->StudentModel->get_schoolyear();
        $this->template->load('template_employee/template_employee', 'student_list_student_all', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function detail_student($id = '') {
        $id = paramDecrypt($id);

        $data['nav_student_aca'] = 'menu-item-open';
        $data['nav_student_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_student_aca_all'] = 'menu-item-active';
        $data['report'] = $this->StudentModel->get_students_report_by_id($id);
        $data['presence'] = $this->StudentModel->get_students_presence_by_id($id);
        $data['student'] = $this->StudentModel->get_detail_student($id); //?   
        $data['class'] = $this->StudentModel->get_class();
        $data['grade'] = $this->StudentModel->get_grade();
        $data['schoolyear'] = $this->StudentModel->get_schoolyear_all();
        $this->template->load('template_employee/template_employee', 'student_detail_academic', $data);
    }

    public function register_student_class() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_siswa = paramDecrypt($data['id_siswa']);
        $tingkat = explode(',', $data['id_tingkat']);

        $this->form_validation->set_rules('id_siswa', 'Siswa Diperlukan', 'required');
        $this->form_validation->set_rules('id_tingkat', 'Tingkat Siswa Diperlukan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/student/student/list_student_all'); //folder, controller, method
        } else {
            $tahun_ajaran = $this->StudentModel->get_schoolyear();

            $register_student = $this->StudentModel->register_student($id_siswa, $tingkat[0], $tingkat[1], $tahun_ajaran[0]->id_tahun_ajaran);

            if ($register_student == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Siswa yang bersangkutan telah didaftarkan kembali."));
                redirect('employee/student/student/list_student_all'); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/student/student/list_student_all'); //folder, controller, method
            }
        }
    }

    //---------------------------------------GET AJAX CLASS---------------------------------------//

    public function add_ajax_grade($id_grad_lvl = '', $id_grad = '') {

        $query = $this->db->get_where('tingkat', array('level_tingkat >' => $id_grad_lvl));
        $data = "<option value=''>Pilih Tingkat</option>";
        foreach ($query->result() as $value) {
            if ($id_grad != '' || $id_grad != NULL) {
                if ($id_grad == $value->id_tingkat) {
                    $data .= "<option selected value='" . $value->id_tingkat . ',' . $value->level_tingkat . "'>" . strtoupper($value->nama_tingkat) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id_tingkat . ',' . $value->level_tingkat . "'>" . strtoupper($value->nama_tingkat) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id_tingkat . ',' . $value->level_tingkat . "'>" . strtoupper($value->nama_tingkat) . "</option>";
            }
        }
        echo $data;
    }

    //-----------------------------------------------------------------------//
//
}
