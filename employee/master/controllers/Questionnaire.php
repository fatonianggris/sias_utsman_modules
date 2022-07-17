<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaire extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->load->model('QuestionnaireModel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------BLOG--------------------------------//
    //
    
    public function list_questionnaire() {

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['schoolyear'] = $this->QuestionnaireModel->get_schoolyear_future();
        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_all();

        $this->template->load('template_employee/template_employee', 'list_questionnaire', $data);
    }

    public function detail_questionnaire($id = '') {
        $id = paramDecrypt($id);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id($id); //?   
        $data['question'] = $this->QuestionnaireModel->get_all_question_by_id($id); //? 
        $data['total_question'] = $this->QuestionnaireModel->get_total_question($id);
        $this->template->load('template_employee/template_employee', 'detail_questionnaire', $data);
    }

    public function post_questionnaire() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kuisioner', 'Nama Kuisioner ', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai ', 'required');
        $this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir ', 'required');
        $this->form_validation->set_rules('th_ajaran', 'Tahun Ajaran ', 'required');
        $this->form_validation->set_rules('deskripsi_kuisioner', 'Deskripsi Kuisioner ', 'required');
        $this->form_validation->set_rules('persentase_personal', 'Persentase Personal ', 'required');
        $this->form_validation->set_rules('persentase_sejawat', 'Persentase Sejawat ', 'required');
        $this->form_validation->set_rules('persentase_atasan', 'Persentase Atasan ', 'required');
        $this->form_validation->set_rules('tipe_penilaian', 'Tipe Penilian ', 'required');
        $this->form_validation->set_rules('nilai_penilaian_max', 'Penilaian Max ', 'required');
        $this->form_validation->set_rules('tunjangan_kinerja', 'Tunjangan Kinerja ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/questionnaire/list_questionnaire'); //folder, controller, method
        } else {

            $insert = $this->QuestionnaireModel->insert_questionnaire($data);

            if ($insert == true) {
                $id = $this->QuestionnaireModel->get_max_id_questionnaire();
                $this->QuestionnaireModel->insert_questionnaire_eval($id[0]->max_id_questionnaire);

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Kuisioner dengan nama '$data[nama_kuisioner]' telah dibuat."));
                redirect('employee/master/questionnaire/list_questionnaire');
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/master/questionnaire/list_questionnaire');
            }
        }
    }

    public function post_question($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('tipe_pertanyaan', 'Tipe Pertanyaan ', 'required');
        $this->form_validation->set_rules('isi_pertanyaan', 'Isi Pertanyaan ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id)); //folder, controller, method
        } else {

            $insert = $this->QuestionnaireModel->insert_question($id, $data);

            if ($insert == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Pertanyaan '$data[isi_pertanyaan]' telah dibuat."));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
            }
        }
    }

    public function edit_questionnaire($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kuisioner', 'Nama Kuisioner ', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai ', 'required');
        $this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir ', 'required');
        $this->form_validation->set_rules('th_ajaran', 'Tahun Ajaran ', 'required');
        $this->form_validation->set_rules('deskripsi_kuisioner', 'Deskripsi Kuisioner ', 'required');
        $this->form_validation->set_rules('persentase_personal', 'Persentase Personal ', 'required');
        $this->form_validation->set_rules('persentase_sejawat', 'Persentase Sejawat ', 'required');
        $this->form_validation->set_rules('persentase_atasan', 'Persentase Atasan ', 'required');
        $this->form_validation->set_rules('tipe_penilaian', 'Tipe Penilian ', 'required');
        $this->form_validation->set_rules('nilai_penilaian_max', 'Penilaian Max ', 'required');
        $this->form_validation->set_rules('tunjangan_kinerja', 'Tunjangan Kinerja ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
        } else {

            $update = $this->QuestionnaireModel->update_questionnaire($id, $data);

            if ($update == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Kuisioner dengan nama '$data[nama_kuisioner]' telah diupdate."));
                redirect('employee/master/questionnaire/list_questionnaire');
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/master/questionnaire/list_questionnaire');
            }
        }
    }

    public function edit_question($id = '', $id_kuisioner = '') {
        $id = paramDecrypt($id);
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('tipe_pertanyaan', 'Tipe Pertanyaan ', 'required');
        $this->form_validation->set_rules('isi_pertanyaan', 'Isi Pertanyaan ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id_kuisioner)); //folder, controller, method
        } else {

            $update = $this->QuestionnaireModel->update_question($id, $data);

            if ($update == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Pertanyaan '$data[isi_pertanyaan]' telah diupdate."));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id_kuisioner));
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id_kuisioner));
            }
        }
    }

    public function delete_question() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_name = $this->QuestionnaireModel->get_question_by_id($id);
        $delete = $this->QuestionnaireModel->delete_question($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Pertanyaan '" . $get_name[0]->isi_pertanyaan . "' Telah Terhapus."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
        }
    }

    public function activate_status_questionnaire() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $disable = $this->QuestionnaireModel->disable_status_questionnaire();
        $activate = $this->QuestionnaireModel->update_status_questionnaire($id, 1);

        if ($activate == true && $disable == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kuisioner telah diaktifkan."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
        }
    }

    public function disable_status_questionnaire() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $disable = $this->QuestionnaireModel->disable_status_questionnaire();
        $activate = $this->QuestionnaireModel->update_status_questionnaire($id, 0);

        if ($activate == true && $disable == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kuisioner telah dinonaktifkan."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
        }
    }

    public function delete_questionnaire() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old_name = $this->QuestionnaireModel->get_questionnaire_by_id($id);

        $delete_questionnaire = $this->QuestionnaireModel->delete_questionnaire($id);
        $delete_question = $this->QuestionnaireModel->delete_question_all($id);

        if ($delete_questionnaire == TRUE && $delete_question == TRUE) {

            $this->QuestionnaireModel->delete_answer_personal($id);
            $this->QuestionnaireModel->delete_answer_friend($id);
            $this->QuestionnaireModel->delete_answer_leader($id);

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Kuisioner <b>'" . strtoupper($get_old_name[0]->nama_kuisioner) . "'</b> Telah Terhapus."));
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
        }
    }

    //-----------------------------------------------------------------------//
}
