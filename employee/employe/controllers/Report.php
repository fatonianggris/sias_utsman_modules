<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MX_Controller
{

    protected $allowed_roles = [5, 7, 10];
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        $this->load->model('ReportModel');

        $this->load->library('form_validation');
        $this->load->library('pdfgenerator');
        $this->load->library('qrcodesignature');

        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //-------------------------------LIST EMPLOYEE REPORT------------------------------//
    //

    public function list_employe_quesionnaire()
    {

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['list_questionnaire'] = $this->ReportModel->get_all_questionnaire_by_id_employee($this->usr_employee[0]->id_pegawai);
        // var_dump($data['list_questionnaire']);exit;

        $this->template->load('template_employee/template_employee', 'employe_list_report_evaluation', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function list_evaluation_employee_personal($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_personal'] = $this->ReportModel->get_evaluation_personal_assesor_by_id_questionnaire_id_empoyee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['eval_result_personal'] = $this->ReportModel->get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['count_eval_personal'] = count($data['eval_personal']);

        $this->template->load('template_employee/template_employee', 'employe_personal_evaluation_list', $data);
    }

    public function list_evaluation_employee_personal_assesed($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_res'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_personal'] = $this->ReportModel->get_evaluation_personal_assesed_by_id_questionnaire_id_empoyee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['eval_result_personal'] = $this->ReportModel->get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['count_eval_personal'] = count($data['eval_personal']);
        //var_dump($data['eval_result_personal']);exit;

        $this->template->load('template_employee/template_employee', 'employe_personal_evaluation_list_assesed', $data);
    }

    public function list_evaluation_employee_colleague($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_colleague'] = $this->ReportModel->get_evaluation_colleague_assesor_by_id_questionnaire_id_empoyee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['eval_result_colleague'] = $this->ReportModel->get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['count_eval_colleague'] = count($data['eval_colleague']);
        //var_dump( $data['eval_colleague']);exit;

        $this->template->load('template_employee/template_employee', 'employe_colleague_evaluation_list', $data);
    }

    public function list_evaluation_employee_colleague_assesed($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_res'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_colleague'] = $this->ReportModel->get_evaluation_colleague_assesed_by_id_questionnaire_id_empoyee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['eval_result_colleague'] = $this->ReportModel->get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['count_eval_colleague'] = count($data['eval_colleague']);
        //var_dump( $data['eval_result_colleague']);exit;

        $this->template->load('template_employee/template_employee', 'employe_colleague_evaluation_list_assesed', $data);
    }

    public function list_evaluation_employee_leader($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_leader'] = $this->ReportModel->get_evaluation_leader_assesor_by_id_questionnaire_id_empoyee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['eval_result_leader'] = $this->ReportModel->get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['count_eval_leader'] = count($data['eval_leader']);

        $this->template->load('template_employee/template_employee', 'employe_leader_evaluation_list', $data);
    }

    public function list_evaluation_employee_leader_assesed($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_res'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_leader'] = $this->ReportModel->get_evaluation_leader_assesed_by_id_questionnaire_id_empoyee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['eval_result_leader'] = $this->ReportModel->get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['count_eval_leader'] = count($data['eval_leader']);

        $this->template->load('template_employee/template_employee', 'employe_leader_evaluation_list_assesed', $data);
    }

    public function list_evaluation_employee_subordinate($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_subordinate'] = $this->ReportModel->get_evaluation_subordinate_assesor_by_id_questionnaire_id_empoyee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['eval_result_subordinate'] = $this->ReportModel->get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['count_eval_subordinate'] = count($data['eval_subordinate']);

        $this->template->load('template_employee/template_employee', 'employe_subordinate_evaluation_list', $data);
    }

    // ini kebalikan dari penilai
    public function list_evaluation_employee_subordinate_assesed($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_res'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_subordinate'] = $this->ReportModel->get_evaluation_subordinate_assesed_by_id_questionnaire_id_empoyee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['eval_result_subordinate'] = $this->ReportModel->get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['count_eval_subordinate'] = count($data['eval_subordinate']);

        $this->template->load('template_employee/template_employee', 'employe_subordinate_evaluation_list_assesed', $data);
    }


    public function detail_questionnaire_employee($id_kuisioner = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_by_id_questionnaire($id_kuisioner);

        $data['total_question'] = $this->ReportModel->get_total_question_by_id_questionnaire($id_kuisioner);
        $data['predicate_value'] = $this->ReportModel->get_predicate_value_by_id_questionnaire($id_kuisioner);
        $data['employee'] = $this->ReportModel->get_employee_by_id($this->usr_employee[0]->id_pegawai);

        $data['get_result_personal'] = $this->ReportModel->get_total_eval_personal_by_id_questionnaire_id_employee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['get_result_colleague'] = $this->ReportModel->get_total_eval_colleague_by_id_questionnaire_id_employee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['get_result_leader'] = $this->ReportModel->get_total_eval_leader_by_id_questionnaire_id_employee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['get_result_subordinate'] = $this->ReportModel->get_total_eval_subordinate_by_id_questionnaire_id_employee($id_kuisioner, $this->usr_employee[0]->id_pegawai);

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire_id_employee($id_kuisioner, $this->usr_employee[0]->id_pegawai);
        // var_dump($data['questionnaire']);exit;

        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire', $data);
    }

    public function detail_result_questionnaire_employee()
    {

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_res'] = 'menu-item-active';

        $get_quest_active = $this->ReportModel->get_questionnaire_active_status_questionnaire();

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($get_quest_active[0]->id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_by_id_questionnaire($get_quest_active[0]->id_kuisioner);

        $data['total_question'] = $this->ReportModel->get_total_question_by_id_questionnaire($get_quest_active[0]->id_kuisioner);
        $data['predicate_value'] = $this->ReportModel->get_predicate_value_by_id_questionnaire($get_quest_active[0]->id_kuisioner);
        $data['employee'] = $this->ReportModel->get_employee_by_id($this->usr_employee[0]->id_pegawai);

        $data['get_result_personal'] = $this->ReportModel->get_total_eval_personal_by_id_questionnaire_id_employee($get_quest_active[0]->id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['get_result_colleague'] = $this->ReportModel->get_total_eval_colleague_by_id_questionnaire_id_employee($get_quest_active[0]->id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['get_result_leader'] = $this->ReportModel->get_total_eval_leader_by_id_questionnaire_id_employee($get_quest_active[0]->id_kuisioner, $this->usr_employee[0]->id_pegawai);
        $data['get_result_subordinate'] = $this->ReportModel->get_total_eval_subordinate_by_id_questionnaire_id_employee($get_quest_active[0]->id_kuisioner, $this->usr_employee[0]->id_pegawai);

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire_id_employee($get_quest_active[0]->id_kuisioner, $this->usr_employee[0]->id_pegawai);
        //var_dump($data['questionnaire']);exit;

        $this->template->load('template_employee/template_employee', 'employe_detail_result_questionnaire', $data);
    }


    public function history_evaluation_questionnaire_personal($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->ReportModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_personal', $data);
    }

    public function history_evaluation_questionnaire_colleague($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->ReportModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_colleague', $data);
    }

    public function history_evaluation_questionnaire_leader($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->ReportModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_leader', $data);
    }

    public function history_evaluation_questionnaire_subordinate($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->ReportModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_subordinate', $data);
    }

    public function history_evaluation_questionnaire_personal_assesed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->ReportModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_personal_assesed', $data);
    }

    public function history_evaluation_questionnaire_colleague_assesed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->ReportModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_colleague_assesed', $data);
    }

    public function history_evaluation_questionnaire_leader_assesed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->ReportModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_leader_assesed', $data);
    }

    public function history_evaluation_questionnaire_subordinate_assesed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->ReportModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_subordinate_assesed', $data);
    }

    public function evaluation_questionnaire_personal($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_by_id_questionnaire($id_kuisioner);
        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        // var_dump($data['question_type']);
        // exit;

        $this->template->load('template_employee/template_employee', 'employe_eval_questionnaire_personal', $data);
    }

    public function evaluation_questionnaire_colleague($id_kuisioner = '',  $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_by_id_questionnaire($id_kuisioner);
        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
        // var_dump($data['result_eval']);
        // exit;

        $this->template->load('template_employee/template_employee', 'employe_eval_questionnaire_colleague', $data);
    }

    public function evaluation_questionnaire_leader($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_by_id_questionnaire($id_kuisioner);
        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_eval_questionnaire_leader', $data);
    }

    public function evaluation_questionnaire_subordinate($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_employe_rep'] = 'menu-item-open';
        $data['sub_nav_employe_rep'] = 'menu-item-active';

        $data['questionnaire'] = $this->ReportModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->ReportModel->get_question_by_id_questionnaire($id_kuisioner);
        $data['question_type'] = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_dinilai'] = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->ReportModel->get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_eval_questionnaire_subordinate', $data);
    }

    public function post_evaluation_questionnaire_personal($id_kuisioner = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = $this->usr_employee[0]->id_pegawai;
        $id_dinilai = paramDecrypt($id_dinilai);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('soal[]', 'ID Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban[]', 'Jawaban Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/report/evaluation_questionnaire_personal/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
        } else {
            $insert_questionnaire_personal = [];

            for ($i = 0; $i < count($data['soal']); $i++) {
                $insert_questionnaire_personal[] = array('id_kuisioner' => $id_kuisioner, 'id_penilai' => $id_penilai, 'id_dinilai' => $id_dinilai, 'id_pertanyaan' => $data['soal'][$i], 'isi_jawaban' => $data['jawaban'][$i]);
            }

            $total_nilai = array_sum(array_column($insert_questionnaire_personal, 'isi_jawaban'));

            if ($insert_questionnaire_personal) {

                $result = $this->ReportModel->importAnswerPersonal($insert_questionnaire_personal);

                if ($result['status'] === true) {

                    $status =  $this->ReportModel->insert_result_questionnaire_personal($id_kuisioner, $id_penilai, $id_dinilai, $total_nilai);
                    if ($status['status'] === true) {
                        $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Penilaian <b>KUISIONER PERSONAL</b> Anda telah disimpan. Terima kasih."));
                        redirect('employee/employe/report/history_evaluation_questionnaire_personal/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($result['message'] . ', Silahkan input ulang.'));
                        redirect('employee/employe/report/evaluation_questionnaire_personal/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', err_msg($result['message'] . ', Silahkan input ulang.'));
                    redirect('employee/employe/report/evaluation_questionnaire_personal/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/report/evaluation_questionnaire_personal/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
            }
        }
    }

    public function post_evaluation_questionnaire_colleague($id_kuisioner = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = $this->usr_employee[0]->id_pegawai;
        $id_dinilai = paramDecrypt($id_dinilai);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('soal[]', 'ID Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban[]', 'Jawaban Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/report/evaluation_questionnaire_colleague/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
        } else {
            $insert_questionnaire_colleague = [];

            for ($i = 0; $i < count($data['soal']); $i++) {
                $insert_questionnaire_colleague[] = array('id_kuisioner' => $id_kuisioner, 'id_penilai' => $id_penilai, 'id_dinilai' => $id_dinilai, 'id_pertanyaan' => $data['soal'][$i], 'isi_jawaban' => $data['jawaban'][$i]);
            }

            $total_nilai = array_sum(array_column($insert_questionnaire_colleague, 'isi_jawaban'));

            if ($insert_questionnaire_colleague) {

                $result = $this->ReportModel->importAnswerColleague($insert_questionnaire_colleague);

                if ($result['status'] == true) {

                    $status =  $this->ReportModel->insert_result_questionnaire_colleague($id_kuisioner, $id_penilai, $id_dinilai, $total_nilai);

                    if ($status['status'] === true) {
                        $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Penilaian <b>KUISIONER SEJAWAT</b> Anda telah disimpan. Terima kasih."));
                        redirect('employee/employe/report/history_evaluation_questionnaire_colleague/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($result['message'] . ', Silahkan input ulang.'));
                        redirect('employee/employe/report/evaluation_questionnaire_colleague/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', err_msg($result['message'] . ', Silahkan input ulang.'));
                    redirect('employee/employe/report/evaluation_questionnaire_colleague/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/report/evaluation_questionnaire_colleague/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
            }
        }
    }

    public function post_evaluation_questionnaire_leader($id_kuisioner = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = $this->usr_employee[0]->id_pegawai;
        $id_dinilai = paramDecrypt($id_dinilai);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('soal[]', 'ID Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban[]', 'Jawaban Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/report/evaluation_questionnaire_leader/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
        } else {
            $insert_questionnaire_leader = [];

            for ($i = 0; $i < count($data['soal']); $i++) {
                $insert_questionnaire_leader[] = array('id_kuisioner' => $id_kuisioner, 'id_penilai' => $id_penilai, 'id_dinilai' => $id_dinilai, 'id_pertanyaan' => $data['soal'][$i], 'isi_jawaban' => $data['jawaban'][$i]);
            }

            $total_nilai = array_sum(array_column($insert_questionnaire_leader, 'isi_jawaban'));

            if ($insert_questionnaire_leader) {

                $result = $this->ReportModel->importAnswerLeader($insert_questionnaire_leader);

                if ($result['status'] === true) {

                    $status =  $this->ReportModel->insert_result_questionnaire_leader($id_kuisioner, $id_penilai, $id_dinilai, $total_nilai);

                    if ($status['status'] === true) {
                        $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Penilaian <b>KUISIONER ATASAN</b> Anda telah disimpan. Terima kasih."));
                        redirect('employee/employe/report/history_evaluation_questionnaire_leader/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($result['message'] . ', Silahkan input ulang.'));
                        redirect('employee/employe/report/evaluation_questionnaire_leader/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', err_msg($result['message'] . ', Silahkan input ulang.'));
                    redirect('employee/employe/report/evaluation_questionnaire_leader/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/report/evaluation_questionnaire_leader/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
            }
        }
    }

    public function post_evaluation_questionnaire_subordinate($id_kuisioner = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = $this->usr_employee[0]->id_pegawai;
        $id_dinilai = paramDecrypt($id_dinilai);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('soal[]', 'ID Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban[]', 'Jawaban Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/report/evaluation_questionnaire_subordinate/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
        } else {
            $insert_questionnaire_subordinate = [];

            for ($i = 0; $i < count($data['soal']); $i++) {
                $insert_questionnaire_subordinate[] = array('id_kuisioner' => $id_kuisioner, 'id_penilai' => $id_penilai, 'id_dinilai' => $id_dinilai, 'id_pertanyaan' => $data['soal'][$i], 'isi_jawaban' => $data['jawaban'][$i]);
            }

            $total_nilai = array_sum(array_column($insert_questionnaire_subordinate, 'isi_jawaban'));

            if ($insert_questionnaire_subordinate) {

                $result = $this->ReportModel->importAnswerSubordinate($insert_questionnaire_subordinate);

                if ($result['status'] === true) {
                    $status =  $this->ReportModel->insert_result_questionnaire_subordinate($id_kuisioner, $id_penilai, $id_dinilai, $total_nilai);

                    if ($status['status'] === true) {
                        $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Penilaian <b>KUISIONER BAWAHAN</b> Anda telah disimpan. Terima kasih."));
                        redirect('employee/employe/report/history_evaluation_questionnaire_subordinate/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($result['message'] . ', Silahkan input ulang.'));
                        redirect('employee/employe/report/evaluation_questionnaire_subordinate/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', err_msg($result['message'] . ', Silahkan input ulang.'));
                    redirect('employee/employe/report/evaluation_questionnaire_subordinate/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/report/evaluation_questionnaire_subordinate/' . paramEncrypt($id_kuisioner) . "/" . paramEncrypt($id_penilai) . "/" . paramEncrypt($id_dinilai));
            }
        }
    }
    //-------------------------------------------------------------------//

    public function print_data_pdf_evaluation_personal()
    {
        $param = $this->input->post();
        $data  = $this->security->xss_clean($param);


        $id_kuisioner = paramDecrypt($data['id_kuisioner']);
        $id_penilai = paramDecrypt($data['id_penilai']);
        $id_dinilai = paramDecrypt($data['id_dinilai']);

        $token = $this->security->get_csrf_hash();

        if (!empty($this->usr_employee)) {

            $fileName = 'hasil_nilai_personal_' . date('d-m-Y') . $id_kuisioner . $id_penilai . $id_dinilai;


            if ($data['id_kuisioner'] == '' or $data['id_penilai'] == null or $data['id_dinilai'] == null || empty($data['id_kuisioner'] || empty($data['id_penilai']) || empty($data['id_dinilai']))) {

                $output = [
                    "status" => false,
                    "token"                  => $token,
                    "messages"               => "Mohon Maaf, ID Penilai dan ID dinilai belum ditemukan. Silahkan cek ulang.",
                ];
            } else {

                $output = [
                    "status" => true,
                    "token"                  => $token,
                    "messages"               => "Berhasil!, Laporan berhasil dicetak, Silahkan cek ulang.",
                ];

                $get['question']        = $this->ReportModel->get_question_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['question_type']   = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_eval']     = $this->ReportModel->get_result_eval_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['id_penilai']      = $this->ReportModel->get_employe_by_id_employee($id_penilai);
                $get['id_dinilai']      = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
                $get['total_question']  = count($get['question']);
                $get['page']            = $this->ReportModel->get_page();
                $get['contact']         = $this->ReportModel->get_contact();
                $get['tanggal_penilaian'] = $get['result_eval'][0]->inserted_at;
                $get['jenis_penilian']  = 'Penilaian Personal';
                $get['qr_code_dinilai'] = $this->qrcodesignature->generate($get['id_dinilai'][0]->nama_lengkap);
                $get['qr_code_ketua']   = $this->qrcodesignature->generate('QODRAT ASYRAF RUTBAH');

                if ($get['result_eval'] == null or $get['result_eval'] == false) {
                    //add new data
                    $output = [
                        "status" => false,
                        "token"                  => $token,
                        "messages"               => "Mohon Maaf, Data Anda tidak ditemukan. Silahkan cek ulang.",
                    ];
                } else {
                    $html = $this->load->view('pdf_template/hasil_penilaian_personal', $get, true);
                    $this->pdfgenerator->generate($html, $fileName, 0, './uploads/pendaftaran/files/', true, 'A4');
                }
            }
        } else {
            $output = [
                "status" => false,
                "token"                  => $token,
                "messages"               => "Opps!, ID User Tidak Terdaftar, Silahkan coba lagi.",
            ];
        }

        echo json_encode($output);
    }


    public function print_data_pdf_evaluation_colleague()
    {
        $param = $this->input->post();
        $data  = $this->security->xss_clean($param);


        $id_kuisioner = paramDecrypt($data['id_kuisioner']);
        $id_penilai = paramDecrypt($data['id_penilai']);
        $id_dinilai = paramDecrypt($data['id_dinilai']);

        $token = $this->security->get_csrf_hash();

        if (!empty($this->usr_employee)) {

            $fileName = 'hasil_nilai_sejawat_' . date('d-m-Y') . $id_kuisioner . $id_penilai . $id_dinilai;


            if ($data['id_kuisioner'] == '' or $data['id_penilai'] == null or $data['id_dinilai'] == null || empty($data['id_kuisioner'] || empty($data['id_penilai']) || empty($data['id_dinilai']))) {

                $output = [
                    "status" => false,
                    "token"                  => $token,
                    "messages"               => "Mohon Maaf, ID Penilai dan ID dinilai belum ditemukan. Silahkan cek ulang.",
                ];
            } else {

                $output = [
                    "status" => true,
                    "token"                  => $token,
                    "messages"               => "Berhasil!, Laporan berhasil dicetak, Silahkan cek ulang.",
                ];

                $get['question']        = $this->ReportModel->get_question_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['question_type']   = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_eval']     = $this->ReportModel->get_result_eval_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['id_penilai']      = $this->ReportModel->get_employe_by_id_employee($id_penilai);
                $get['id_dinilai']      = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
                $get['total_question']  = count($get['question']);
                $get['page']            = $this->ReportModel->get_page();
                $get['contact']         = $this->ReportModel->get_contact();
                $get['tanggal_penilaian'] = $get['result_eval'][0]->inserted_at;
                $get['jenis_penilian']  = 'Penilaian Sejawat';
                $get['qr_code_dinilai'] = $this->qrcodesignature->generate($get['id_dinilai'][0]->nama_lengkap);
                $get['qr_code_ketua']   = $this->qrcodesignature->generate('QODRAT ASYRAF RUTBAH');

                if ($get['result_eval'] == null or $get['result_eval'] == false) {
                    //add new data
                    $output = [
                        "status" => false,
                        "token"                  => $token,
                        "messages"               => "Mohon Maaf, Data Anda tidak ditemukan. Silahkan cek ulang.",
                    ];
                } else {
                    $html = $this->load->view('pdf_template/hasil_penilaian_sejawat', $get, true);
                    $this->pdfgenerator->generate($html, $fileName, 0, './uploads/pendaftaran/files/', true, 'A4');
                }
            }
        } else {
            $output = [
                "status" => false,
                "token"                  => $token,
                "messages"               => "Opps!, ID User Tidak Terdaftar, Silahkan coba lagi.",
            ];
        }

        echo json_encode($output);
    }

    public function print_data_pdf_evaluation_subordinate()
    {
        $param = $this->input->post();
        $data  = $this->security->xss_clean($param);


        $id_kuisioner = paramDecrypt($data['id_kuisioner']);
        $id_penilai = paramDecrypt($data['id_penilai']);
        $id_dinilai = paramDecrypt($data['id_dinilai']);

        $token = $this->security->get_csrf_hash();

        if (!empty($this->usr_employee)) {

            $fileName = 'hasil_nilai_atasan_' . date('d-m-Y') . $id_kuisioner . $id_penilai . $id_dinilai;


            if ($data['id_kuisioner'] == '' or $data['id_penilai'] == null or $data['id_dinilai'] == null || empty($data['id_kuisioner'] || empty($data['id_penilai']) || empty($data['id_dinilai']))) {

                $output = [
                    "status" => false,
                    "token"                  => $token,
                    "messages"               => "Mohon Maaf, ID Penilai dan ID dinilai belum ditemukan. Silahkan cek ulang.",
                ];
            } else {

                $output = [
                    "status" => true,
                    "token"                  => $token,
                    "messages"               => "Berhasil!, Laporan berhasil dicetak, Silahkan cek ulang.",
                ];

                $get['question']        = $this->ReportModel->get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['question_type']   = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_eval']     = $this->ReportModel->get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['id_penilai']      = $this->ReportModel->get_employe_by_id_employee($id_penilai);
                $get['id_dinilai']      = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
                $get['total_question']  = count($get['question']);
                $get['page']            = $this->ReportModel->get_page();
                $get['contact']         = $this->ReportModel->get_contact();
                $get['tanggal_penilaian'] = $get['result_eval'][0]->inserted_at;
                $get['jenis_penilian']  = 'Penilaian Bawahan';
                $get['qr_code_dinilai'] = $this->qrcodesignature->generate($get['id_dinilai'][0]->nama_lengkap);
                $get['qr_code_ketua']   = $this->qrcodesignature->generate('QODRAT ASYRAF RUTBAH');

                if ($get['result_eval'] == null or $get['result_eval'] == false) {
                    //add new data
                    $output = [
                        "status" => false,
                        "token"                  => $token,
                        "messages"               => "Mohon Maaf, Data Anda tidak ditemukan. Silahkan cek ulang.",
                    ];
                } else {
                    $html = $this->load->view('pdf_template/hasil_penilaian_atasan', $get, true);
                    $this->pdfgenerator->generate($html, $fileName, 0, './uploads/pendaftaran/files/', true, 'A4');
                }
            }
        } else {
            $output = [
                "status" => false,
                "token"                  => $token,
                "messages"               => "Opps!, ID User Tidak Terdaftar, Silahkan coba lagi.",
            ];
        }

        echo json_encode($output);
    }

    public function print_data_pdf_evaluation_leader()
    {
        $param = $this->input->post();
        $data  = $this->security->xss_clean($param);


        $id_kuisioner = paramDecrypt($data['id_kuisioner']);
        $id_penilai = paramDecrypt($data['id_penilai']);
        $id_dinilai = paramDecrypt($data['id_dinilai']);

        $token = $this->security->get_csrf_hash();

        if (!empty($this->usr_employee)) {

            $fileName = 'hasil_nilai_bawahan_' . date('d-m-Y') . $id_kuisioner . $id_penilai . $id_dinilai;


            if ($data['id_kuisioner'] == '' or $data['id_penilai'] == null or $data['id_dinilai'] == null || empty($data['id_kuisioner'] || empty($data['id_penilai']) || empty($data['id_dinilai']))) {

                $output = [
                    "status" => false,
                    "token"                  => $token,
                    "messages"               => "Mohon Maaf, ID Penilai dan ID dinilai belum ditemukan. Silahkan cek ulang.",
                ];
            } else {

                $output = [
                    "status" => true,
                    "token"                  => $token,
                    "messages"               => "Berhasil!, Laporan berhasil dicetak, Silahkan cek ulang.",
                ];

                $get['question']        = $this->ReportModel->get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['question_type']   = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_eval']     = $this->ReportModel->get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['id_penilai']      = $this->ReportModel->get_employe_by_id_employee($id_penilai);
                $get['id_dinilai']      = $this->ReportModel->get_employe_by_id_employee($id_dinilai);
                $get['total_question']  = count($get['question']);
                $get['page']            = $this->ReportModel->get_page();
                $get['contact']         = $this->ReportModel->get_contact();
                $get['tanggal_penilaian'] = $get['result_eval'][0]->inserted_at;
                $get['jenis_penilian']  = 'Penilaian Atasan';
                $get['qr_code_dinilai'] = $this->qrcodesignature->generate($get['id_dinilai'][0]->nama_lengkap);
                $get['qr_code_ketua']   = $this->qrcodesignature->generate('QODRAT ASYRAF RUTBAH');

                if ($get['result_eval'] == null or $get['result_eval'] == false) {
                    //add new data
                    $output = [
                        "status" => false,
                        "token"                  => $token,
                        "messages"               => "Mohon Maaf, Data Anda tidak ditemukan. Silahkan cek ulang.",
                    ];
                } else {
                    $html = $this->load->view('pdf_template/hasil_penilaian_bawahan', $get, true);
                    $this->pdfgenerator->generate($html, $fileName, 0, './uploads/pendaftaran/files/', true, 'A4');
                }
            }
        } else {
            $output = [
                "status" => false,
                "token"                  => $token,
                "messages"               => "Opps!, ID User Tidak Terdaftar, Silahkan coba lagi.",
            ];
        }

        echo json_encode($output);
    }


    public function print_data_pdf_evaluation_employee()
    {
        $param = $this->input->post();
        $data  = $this->security->xss_clean($param);

        $id_kuisioner = paramDecrypt($data['id_kuisioner']);
        $id_pegawai = paramDecrypt($data['id_pegawai']);

        $token = $this->security->get_csrf_hash();

        if (!empty($this->usr_employee)) {

            $fileName = 'hasil_penilaian_pegawai_' . date('d-m-Y') . $id_kuisioner . $id_pegawai;

            if ($data['id_kuisioner'] == '' or $data['id_pegawai'] == null || empty($data['id_kuisioner'] || empty($data['id_pegawai']))) {

                $output = [
                    "status" => false,
                    "token"                  => $token,
                    "messages"               => "Mohon Maaf, ID Penilai dan ID dinilai belum ditemukan. Silahkan cek ulang.",
                ];
            } else {

                $output = [
                    "status" => true,
                    "token"                  => $token,
                    "messages"               => "Berhasil!, Laporan berhasil dicetak, Silahkan cek ulang.",
                ];

                $get['questionnaire']       = $this->ReportModel->get_questionnaire_by_id_questionnaire_id_employee($id_kuisioner, $id_pegawai);
                $get['predicate_value'] = $this->ReportModel->get_predicate_value_by_id_questionnaire($id_kuisioner);
                $get['question_personal']   = $this->ReportModel->get_question_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, null, $id_pegawai);
                $get['question_colleague']  = $this->ReportModel->get_question_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, null, $id_pegawai);
                $get['question_leader']     = $this->ReportModel->get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, null, $id_pegawai);
                $get['question_subordinate'] = $this->ReportModel->get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, null, $id_pegawai);
                $get['question_type']       = $this->ReportModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_personal']     = $this->ReportModel->get_result_eval_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, null, $id_pegawai);
                $get['result_colleague']    = $this->ReportModel->get_result_eval_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, null, $id_pegawai);
                $get['result_leader']       = $this->ReportModel->get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, null, $id_pegawai);
                $get['result_subordinate']  = $this->ReportModel->get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, null, $id_pegawai);
                $get['id_pegawai']          = $this->ReportModel->get_employe_by_id_employee($id_pegawai);
                $get['total_question']      = count($get['question_personal']);
                $get['page']                = $this->ReportModel->get_page();
                $get['contact']             = $this->ReportModel->get_contact();
                $get['tanggal_penilaian']   = $get['result_personal'][0]->inserted_at;
                $get['jenis_penilian']      = 'Rekap Penilaian Keseluruhan';
                $get['qr_code_dinilai']     = $this->qrcodesignature->generate($get['id_pegawai'][0]->nama_lengkap);
                $get['qr_code_ketua']       = $this->qrcodesignature->generate('QODRAT ASYRAF RUTBAH');

                $data = [$get['questionnaire'][0]->jumlah_personal_dinilai, $get['questionnaire'][0]->jumlah_sejawat_dinilai, $get['questionnaire'][0]->jumlah_atasan_dinilai, $get['questionnaire'][0]->jumlah_bawahan_dinilai];
                $total_kuisioner = array_sum(array_map(fn($v) => $v ?? 0, $data));
                $get['total_kuisioner']                = $total_kuisioner;

                // var_dump($get['questionnaire']);
                // exit();

                if ($get['result_personal'] == null or $get['result_personal'] == false) {
                    //add new data
                    $output = [
                        "status" => false,
                        "token"                  => $token,
                        "messages"               => "Mohon Maaf, Data Anda tidak ditemukan. Silahkan cek ulang.",
                    ];
                } else {
                    $html = $this->load->view('pdf_template/hasil_penilaian_pegawai', $get, true);
                    $this->pdfgenerator->generate($html, $fileName, 0, './uploads/pendaftaran/files/', true, 'A4');
                }
            }
        } else {
            $output = [
                "status" => false,
                "token"                  => $token,
                "messages"               => "Opps!, ID User Tidak Terdaftar, Silahkan coba lagi.",
            ];
        }

        echo json_encode($output);
    }
}
