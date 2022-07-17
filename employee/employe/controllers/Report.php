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
        $this->load->library('form_validation');
        
        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //-------------------------------LIST EMPLOYEE REPORT------------------------------//
    //
  
    public function list_employe_report_all() {
        $data['nav_employe_aca'] = 'menu-item-open';
        $data['nav_employe_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_employe_aca_rep'] = 'menu-item-active';

        $data['schoolyear'] = $this->ReportModel->get_schoolyear_future();
        $data['questionnaire'] = $this->ReportModel->get_questionnaire_all();

        $this->template->load('template_employee/template_employee', 'employe_list_report_all', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function list_employe_report_personal($id = '') {
        $id = paramDecrypt($id);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $id_kuisioner = $this->ReportModel->get_questionnaire_active();
        @$data['personal'] = $this->ReportModel->get_status_personal($id_kuisioner[0]->id_kuisioner, $this->usr_employee[0]->id_pegawai);
        @$data['employe'] = $this->ReportModel->get_employe_questionnaire_all($id_kuisioner[0]->id_kuisioner, $this->usr_employee[0]->id_jabatan, $this->usr_employee[0]->id_pegawai, $this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        @$data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner[0]->id_kuisioner); //?  
        $data['status_questionnaire'] = $this->ReportModel->get_questionnaire_active();

        $this->template->load('template_employee/template_employee', 'employe_list_report_personal', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function detail_questionnaire_all($id = '') {
        $id = paramDecrypt($id);

        $data['nav_employe_aca'] = 'menu-item-open';
        $data['nav_employe_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_employe_aca_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id); //? 
        $data['status_questionnaire'] = $this->ReportModel->get_questionnaire_active();
        $data['question'] = $this->ReportModel->get_all_question_by_id($id); //?
        $data['total_question'] = $this->ReportModel->get_total_question($id);
        $data['employe'] = $this->ReportModel->get_employe_questionnaire_academic_all($id, $this->usr_employee[0]->id_jabatan, $this->usr_employee[0]->id_pegawai, $this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire_all', $data);
    }

    public function configure_questionnaire($id = '') {
        $id = paramDecrypt($id);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_que'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id); //? 
        $data['status_questionnaire'] = $this->ReportModel->get_questionnaire_active();
        $data['question'] = $this->ReportModel->get_all_question_by_id($id); //?
        $data['total_question'] = $this->ReportModel->get_total_question($id);
        $data['employe'] = $this->ReportModel->get_employe_questionnaire_all($id, $this->usr_employee[0]->id_jabatan, $this->usr_employee[0]->id_pegawai, $this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire', $data);
    }

    public function detail_result_questionnaire_all($id_kuisioner = '', $id_pegawai = '') {
        $id_pegawai = paramDecrypt($id_pegawai);
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_aca'] = 'menu-item-open';
        $data['nav_employe_aca_nxt'] = 'menu-item-open';
        $data['sub_nav_employe_aca_rep'] = 'menu-item-active';

        $cek_id_kuisioner = $this->ReportModel->get_questionnaire_by_id($id_kuisioner);
        $data['status_questionnaire'] = $this->ReportModel->get_questionnaire_by_id();

        if ($cek_id_kuisioner) {
            $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner); //?   
            $data['question'] = $this->ReportModel->get_all_answer_by_id($id_kuisioner, $id_pegawai); //?
            $data['question_sum'] = $this->ReportModel->get_all_answer_sum_by_id($id_kuisioner, $id_pegawai); //?
            $data['total_question'] = $this->ReportModel->get_total_question($id_kuisioner);
            $data['id_pegawai'] = $this->ReportModel->get_employe_by_id($id_pegawai);
            $data['penilaian'] = $this->ReportModel->get_eval_by_id_employe($id_kuisioner, $id_pegawai);
        }
        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire_result_all', $data);
    }

    public function detail_result_questionnaire($id_pegawai = '') {
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_employe_rep'] = 'menu-item-open';

        $id_kuisioner = $this->ReportModel->get_questionnaire_active();
        $data['status_questionnaire'] = $this->ReportModel->get_questionnaire_active();

        if ($id_kuisioner) {
            $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner[0]->id_kuisioner); //?   
            $data['question'] = $this->ReportModel->get_all_answer_by_id($id_kuisioner[0]->id_kuisioner, $id_pegawai); //?
            $data['question_sum'] = $this->ReportModel->get_all_answer_sum_by_id($id_kuisioner[0]->id_kuisioner, $id_pegawai); //?
            $data['total_question'] = $this->ReportModel->get_total_question($id_kuisioner[0]->id_kuisioner);
            $data['id_pegawai'] = $this->ReportModel->get_employe_by_id($id_pegawai);
            $data['penilaian'] = $this->ReportModel->get_eval_by_id_employe($id_kuisioner[0]->id_kuisioner, $id_pegawai);
        }
        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire_result', $data);
    }

    public function detail_questionnaire_leader($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner); //?   
        $data['question'] = $this->ReportModel->get_all_answer_leader_by_id($id_kuisioner, $id_pegawai); //?
        $data['total_question'] = $this->ReportModel->get_total_question($id_kuisioner);
        $data['id_pegawai'] = $this->ReportModel->get_employe_by_id($id_pegawai);
        $data['penilaian'] = $this->ReportModel->get_eval_by_id_employe($id_kuisioner, $id_pegawai);

        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire_leader', $data);
    }

    public function detail_questionnaire_personal($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner); //?   
        $data['question'] = $this->ReportModel->get_all_answer_personal_by_id($id_kuisioner, $id_pegawai); //?
        $data['total_question'] = $this->ReportModel->get_total_question($id_kuisioner);
        $data['id_pegawai'] = $this->ReportModel->get_employe_by_id($id_pegawai);
        $data['penilaian'] = $this->ReportModel->get_eval_by_id_employe($id_kuisioner, $id_pegawai);

        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire_personal', $data);
    }

    public function detail_questionnaire_friend($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner); //?   
        $data['question'] = $this->ReportModel->get_all_answer_friend_by_id($id_kuisioner, $id_pegawai); //?
        $data['total_question'] = $this->ReportModel->get_total_question($id_kuisioner);
        $data['id_pegawai'] = $this->ReportModel->get_employe_by_id($id_pegawai);
        $data['penilaian'] = $this->ReportModel->get_eval_by_id_employe($id_kuisioner, $id_pegawai);

        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire_friend', $data);
    }

    public function eval_questionnaire_leader($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner); //?   
        $data['question'] = $this->ReportModel->get_all_question_by_id($id_kuisioner); //?
        $data['total_question'] = $this->ReportModel->get_total_question($id_kuisioner);
        $data['id_pegawai'] = $this->ReportModel->get_employe_by_id($id_pegawai);
        $data['penilaian'] = $this->ReportModel->get_eval_by_id_employe($id_kuisioner, $id_pegawai);

        $this->template->load('template_employee/template_employee', 'employe_eval_questionnaire_leader', $data);
    }

    public function eval_questionnaire_personal($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner); //?   
        $data['question'] = $this->ReportModel->get_all_question_by_id($id_kuisioner); //?
        $data['total_question'] = $this->ReportModel->get_total_question($id_kuisioner);
        $data['id_pegawai'] = $this->ReportModel->get_employe_by_id($id_pegawai);
        $data['penilaian'] = $this->ReportModel->get_eval_by_id_employe($id_kuisioner, $id_pegawai);

        $this->template->load('template_employee/template_employee', 'employe_eval_questionnaire_personal', $data);
    }

    public function eval_questionnaire_friend($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id($id_kuisioner); //?   
        $data['question'] = $this->ReportModel->get_all_question_by_id($id_kuisioner); //?
        $data['total_question'] = $this->ReportModel->get_total_question($id_kuisioner);
        $data['id_pegawai'] = $this->ReportModel->get_employe_by_id($id_pegawai);
        $data['penilaian'] = $this->ReportModel->get_eval_by_id_employe($id_kuisioner, $id_pegawai);

        $this->template->load('template_employee/template_employee', 'employe_eval_questionnaire_friend', $data);
    }

    public function choose_penilai_employe() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_penilaian = paramDecrypt($data['id_penilaian']);
        $id_kuisioner = paramDecrypt($data['id_kuisioner']);

        $this->form_validation->set_rules('id_penilai', 'Nama Penilai ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/report/detail_questionnaire/' . paramEncrypt($id_kuisioner)); //folder, controller, method
        } else {

            $insert = $this->ReportModel->update_penilai_employe($id_penilaian, $data);

            if ($insert == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Penilai untuk pegawai '$data[nama_pegawai]' telah ditentukan."));
                redirect('employee/employe/report/detail_questionnaire/' . paramEncrypt($id_kuisioner)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/report/detail_questionnaire/' . paramEncrypt($id_kuisioner)); //folder, controller, method
            }
        }
    }

    public function post_eval_questionnaire_leader($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('soal[]', 'Tipe Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban[]', 'Jawaban Nilai', 'required');

        $nama_pegawai = $this->ReportModel->get_name_emp_by_id($id_pegawai);


        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
        } else {
            $tahun_ajaran = $this->ReportModel->get_schoolyear_active();
            $insert_questionnaire_leader = [];

            for ($i = 0; $i < count($data['soal']); $i++) {
                $insert_questionnaire_leader[] = array('id_kuisioner' => $id_kuisioner, 'id_pegawai' => $id_pegawai, 'id_pertanyaan' => $data['soal'][$i], 'isi_jawaban' => $data['jawaban'][$i], 'th_ajaran' => $tahun_ajaran[0]->id_tahun_ajaran);
            }

            if ($insert_questionnaire_leader) {

                $this->ReportModel->setBatchImportAnswerLeader($insert_questionnaire_leader);
                $this->ReportModel->importAnswerLeader();
                $this->ReportModel->update_status_questionnaire_leader($id_kuisioner, $id_pegawai, $this->usr_employee[0]->id_pegawai);

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Isian <b>KUISIONER PIMPINAN/ATASAN</b> <b>'" . strtoupper(strtolower($nama_pegawai[0]->nama_lengkap)) . "'</b> telah disimpan. Terima kasih."));
                redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
            }
        }
    }

    public function post_eval_questionnaire_personal($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('soal[]', 'Tipe Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban[]', 'Jawaban Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
        } else {
            $tahun_ajaran = $this->ReportModel->get_schoolyear_active();
            $insert_questionnaire_personal = [];

            for ($i = 0; $i < count($data['soal']); $i++) {
                $insert_questionnaire_personal[] = array('id_kuisioner' => $id_kuisioner, 'id_pegawai' => $id_pegawai, 'id_pertanyaan' => $data['soal'][$i], 'isi_jawaban' => $data['jawaban'][$i], 'th_ajaran' => $tahun_ajaran[0]->id_tahun_ajaran);
            }

            if ($insert_questionnaire_personal) {

                $this->ReportModel->setBatchImportAnswerPersonal($insert_questionnaire_personal);
                $this->ReportModel->importAnswerPersonal();
                $this->ReportModel->update_status_questionnaire_personal($id_kuisioner, $id_pegawai);

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Isian <b>KUISIONER PERSONAL</b> Anda telah disimpan. Terima kasih."));
                redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
            }
        }
    }

    public function post_eval_questionnaire_friend($id_kuisioner = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('soal[]', 'Tipe Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban[]', 'Jawaban Nilai', 'required');

        $nama_pegawai = $this->ReportModel->get_name_emp_by_id($id_pegawai);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
        } else {
            $tahun_ajaran = $this->ReportModel->get_schoolyear_active();
            $insert_questionnaire_friend = [];

            for ($i = 0; $i < count($data['soal']); $i++) {
                $insert_questionnaire_friend[] = array('id_kuisioner' => $id_kuisioner, 'id_pegawai' => $id_pegawai, 'id_pertanyaan' => $data['soal'][$i], 'isi_jawaban' => $data['jawaban'][$i], 'th_ajaran' => $tahun_ajaran[0]->id_tahun_ajaran);
            }

            if ($insert_questionnaire_friend) {

                $this->ReportModel->setBatchImportAnswerFriend($insert_questionnaire_friend);
                $this->ReportModel->importAnswerFriend();
                $this->ReportModel->update_status_questionnaire_friend($id_kuisioner, $id_pegawai);

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Isian  <b>KUISIONER SEJAWAT</b> <b>'" . strtoupper(strtolower($nama_pegawai[0]->nama_lengkap)) . "'</b> telah disimpan. Terima kasih."));
                redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/report/list_employe_report_personal/' . paramEncrypt($id_pegawai)); //folder, controller, method
            }
        }
    }

    public function add_ajax_penilai($id_kuisioner = '', $level_tingkat = '', $id_pegawai = '') {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $query = $this->db->query("SELECT
                                        p.id_pegawai,
                                        p.nama_lengkap,
                                        p.nip,
                                        p.level_tingkat
                                    FROM
                                        pegawai p
                                    LEFT JOIN jabatan j ON j.id_jabatan = p.id_jabatan                      
                                    WHERE
                                        p.level_tingkat = $level_tingkat AND p.status_pegawai = 1 AND p.id_jabatan NOT IN (1,6,11) AND j.level_jabatan != 0 AND p.id_pegawai != $id_pegawai AND p.id_pegawai NOT IN(
                                        SELECT
                                            pn.id_sejawat
                                        FROM
                                            penilaian pn
                                        WHERE
                                            pn.id_kuisioner = $id_kuisioner
                                    )");
        $data = "<option value=''>Pilih Penilai</option><option value='0'>KOSONGKAN*</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_pegawai . "'>" . strtoupper(strtolower($value->nama_lengkap)) . " (" . $value->nip . ")</option>";
        }
        echo $data;
    }

    //-------------------------------------------------------------------//
}
