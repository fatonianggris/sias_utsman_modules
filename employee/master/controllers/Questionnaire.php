<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Questionnaire extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->load->model('QuestionnaireModel');
        $this->load->library('form_validation');
        $this->load->library('UniqueColumnGenerator');
        $this->load->library('pdfgenerator');
        $this->load->library('qrcodesignature');

        $this->employee = $this->session->userdata("sias-employee");
    }

    //
    //------------------------------BLOG--------------------------------//
    //

    public function list_questionnaire()
    {

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['schoolyear'] = $this->QuestionnaireModel->get_schoolyear();

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_all();
        $data['question_type'] = $this->QuestionnaireModel->get_question_type_all();

        $this->template->load('template_employee/template_employee', 'list_questionnaire', $data);
    }

    public function list_question($id = '')
    {
        $id = paramDecrypt($id);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['question_type'] = $this->QuestionnaireModel->get_question_type_all();
        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id); //?   
        $data['question'] = $this->QuestionnaireModel->get_question_by_id_questionnaire($id);
        $data['total_question'] = $this->QuestionnaireModel->get_total_question_by_id_questionnaire($id);

        $query = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id);
        $question_types = [];
        foreach ($query as $row) {
            $question_types[$row->id_tipe_pertanyaan] = [
                "title" => $row->nama_tipe_pertanyaan,
                "class" => "label-light-default", // bisa juga ambil dari DB kalau ada kolom khusus
            ];
        }
        $data['question_type_json'] = json_encode($question_types, JSON_PRETTY_PRINT);

        $this->template->load('template_employee/template_employee', 'list_question', $data);
    }

    public function list_employe_evaluation($id_kusioner = '')
    {
        $id_kusioner = paramDecrypt($id_kusioner);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['list_evaluation'] = $this->QuestionnaireModel->get_all_employee_evaluation_by_id_questionnaire($id_kusioner);
        $data['question'] = $this->QuestionnaireModel->get_question_by_id_questionnaire($id_kusioner);
        $data['total_question'] = count($data['question']);
        $data['predicate'] = $this->QuestionnaireModel->get_predicate_questionnaire_by_id_questionnaire($id_kusioner);
        // var_dump($data['list_evaluation']);
        // exit;

        $this->template->load('template_employee/template_employee', 'list_evaluation_employee', $data);
    }

    public function list_evaluation_personal($id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_personal'] = $this->QuestionnaireModel->get_evaluation_personal_by_id_questionnaire($id_kuisioner);
        $data['eval_result_personal'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire($id_kuisioner);

        // var_dump($data['eval_result_personal']);
        // exit;

        $this->template->load('template_employee/template_employee', 'personal_evaluation_list', $data);
    }


    public function list_evaluation_colleague($id = "")
    {
        $id = paramDecrypt($id);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id);
        $data['eval_colleague'] = $this->QuestionnaireModel->get_evaluation_colleague_by_id_questionnaire($id);
        $data['eval_result_sejawat'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire($id);
        // var_dump($data['eval_colleague']);
        // exit;

        $this->template->load('template_employee/template_employee', 'colleague_evaluation_list', $data);
    }

    public function list_evaluation_leader($id = "")
    {
        $id = paramDecrypt($id);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id);
        $data['eval_leader'] = $this->QuestionnaireModel->get_evaluation_leader_by_id_questionnaire($id);
        $data['eval_result_atasan'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire($id);
        // var_dump($data['eval_result_atasan']);
        // exit;

        $this->template->load('template_employee/template_employee', 'leader_evaluation_list', $data);
    }

    public function list_evaluation_subordinate($id = "")
    {
        $id = paramDecrypt($id);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id);
        $data['eval_subordinate'] = $this->QuestionnaireModel->get_evaluation_subordinate_by_id_questionnaire($id);
        $data['eval_result_bawahan'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire($id);

        $this->template->load('template_employee/template_employee', 'subordinate_evaluation_list', $data);
    }

    public function list_evaluation_employee_personal($id_pegawai = '', $id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_personal'] = $this->QuestionnaireModel->get_evaluation_personal_assesor_by_id_questionnaire_id_empoyee($id_kuisioner, $id_pegawai);
        $data['eval_result_personal'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner, $id_pegawai);
        $data['count_eval_personal'] = count($data['eval_personal']);

        $this->template->load('template_employee/template_employee', 'employe_personal_evaluation_list', $data);
    }

    public function list_evaluation_employee_colleague($id_pegawai = '', $id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_colleague'] = $this->QuestionnaireModel->get_evaluation_colleague_assesor_by_id_questionnaire_id_empoyee($id_kuisioner, $id_pegawai);
        $data['eval_result_colleague'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner, $id_pegawai);
        $data['count_eval_colleague'] = count($data['eval_colleague']);
        //var_dump( $data['eval_colleague']);exit;

        $this->template->load('template_employee/template_employee', 'employe_colleague_evaluation_list', $data);
    }

    public function list_evaluation_employee_leader($id_pegawai = '', $id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_leader'] = $this->QuestionnaireModel->get_evaluation_leader_assesor_by_id_questionnaire_id_empoyee($id_kuisioner, $id_pegawai);
        $data['eval_result_leader'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner, $id_pegawai);
        $data['count_eval_leader'] = count($data['eval_leader']);

        $this->template->load('template_employee/template_employee', 'employe_leader_evaluation_list', $data);
    }

    public function list_evaluation_employee_subordinate($id_pegawai = '', $id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_subordinate'] = $this->QuestionnaireModel->get_evaluation_subordinate_assesor_by_id_questionnaire_id_empoyee($id_kuisioner, $id_pegawai);
        $data['eval_result_subordinate'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire_id_assessor($id_kuisioner, $id_pegawai);
        $data['count_eval_subordinate'] = count($data['eval_subordinate']);

        $this->template->load('template_employee/template_employee', 'employe_subordinate_evaluation_list', $data);
    }

    public function list_evaluation_employee_personal_assesed($id_pegawai = '', $id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_personal'] = $this->QuestionnaireModel->get_evaluation_personal_assesed_by_id_questionnaire_id_empoyee($id_kuisioner, $id_pegawai);
        $data['eval_result_personal'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner, $id_pegawai);
        $data['count_eval_personal'] = count($data['eval_personal']);
        //var_dump($data['eval_result_personal']);exit;

        $this->template->load('template_employee/template_employee', 'employe_personal_evaluation_list_assesed', $data);
    }

    public function list_evaluation_employee_colleague_assesed($id_pegawai = '', $id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';


        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_colleague'] = $this->QuestionnaireModel->get_evaluation_colleague_assesed_by_id_questionnaire_id_empoyee($id_kuisioner, $id_pegawai);
        $data['eval_result_colleague'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner, $id_pegawai);
        $data['count_eval_colleague'] = count($data['eval_colleague']);
        //var_dump( $data['eval_colleague']);exit;

        $this->template->load('template_employee/template_employee', 'employe_colleague_evaluation_list_assesed', $data);
    }

    public function list_evaluation_employee_leader_assesed($id_pegawai = '', $id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_leader'] = $this->QuestionnaireModel->get_evaluation_leader_assesed_by_id_questionnaire_id_empoyee($id_kuisioner, $id_pegawai);
        $data['eval_result_leader'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner, $id_pegawai);
        $data['count_eval_leader'] = count($data['eval_leader']);

        $this->template->load('template_employee/template_employee', 'employe_leader_evaluation_list_assesed', $data);
    }

    public function list_evaluation_employee_subordinate_assesed($id_pegawai = '', $id_kuisioner = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['eval_subordinate'] = $this->QuestionnaireModel->get_evaluation_subordinate_assesed_by_id_questionnaire_id_empoyee($id_kuisioner, $id_pegawai);
        $data['eval_result_subordinate'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire_id_assessed($id_kuisioner, $id_pegawai);
        $data['count_eval_subordinate'] = count($data['eval_subordinate']);

        $this->template->load('template_employee/template_employee', 'employe_subordinate_evaluation_list_assesed', $data);
    }

    public function detail_questionnaire_employee($id_pegawai = '', $id_kuisioner = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_pegawai = paramDecrypt($id_pegawai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['question_type'] = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->QuestionnaireModel->get_question_by_id_questionnaire($id_kuisioner);

        $data['total_question'] = $this->QuestionnaireModel->get_total_question_by_id_questionnaire($id_kuisioner);
        $data['predicate_value'] = $this->QuestionnaireModel->get_predicate_value_by_id_questionnaire($id_kuisioner);
        $data['employee'] = $this->QuestionnaireModel->get_employee_by_id($id_pegawai);

        $data['get_result_personal'] = $this->QuestionnaireModel->get_total_eval_personal_by_id_questionnaire_id_employee($id_kuisioner, $id_pegawai);
        $data['get_result_colleague'] = $this->QuestionnaireModel->get_total_eval_colleague_by_id_questionnaire_id_employee($id_kuisioner, $id_pegawai);
        $data['get_result_leader'] = $this->QuestionnaireModel->get_total_eval_leader_by_id_questionnaire_id_employee($id_kuisioner,  $id_pegawai);
        $data['get_result_subordinate'] = $this->QuestionnaireModel->get_total_eval_subordinate_by_id_questionnaire_id_employee($id_kuisioner,  $id_pegawai);

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire_id_employee($id_kuisioner,  $id_pegawai);
        // var_dump($data['questionnaire']);
        // exit;

        $this->template->load('template_employee/template_employee', 'employe_detail_questionnaire', $data);
    }


    public function history_evaluation_questionnaire_personal($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->QuestionnaireModel->get_question_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);

        $data['id_dinilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
        $data['id_penilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_eval_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_personal', $data);
    }

    public function history_evaluation_questionnaire_colleague($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->QuestionnaireModel->get_question_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_eval_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_colleague', $data);
    }

    public function history_evaluation_questionnaire_leader($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->QuestionnaireModel->get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_leader', $data);
    }

    public function history_evaluation_questionnaire_subordinate($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->QuestionnaireModel->get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_subordinate', $data);
    }


    public function history_evaluation_questionnaire_leader_assesed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->QuestionnaireModel->get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_leader_assesed', $data);
    }

    public function history_evaluation_questionnaire_subordinate_assesed($id_kuisioner = '', $id_penilai = '', $id_dinilai = '')
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['question'] = $this->QuestionnaireModel->get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $data['question_type'] = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
        $data['total_question'] = count($data['question']);
        $data['id_penilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
        $data['id_dinilai'] = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'employe_history_questionnaire_subordinate_assesed', $data);
    }


    public function result_personal_evaluation($id_kuisioner = "", $id_penilai = "", $id_dinilai = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_evaluation_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner, $id_penilai, $id_dinilai, 0);
        $data['list_answered_eval'] = $this->QuestionnaireModel->get_personal_answer_eval_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'result_personal_evaluation', $data);
    }

    public function result_colleague_evaluation($id_kuisioner = "", $id_penilai = "", $id_dinilai = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_evaluation_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner, $id_penilai, $id_dinilai, 1);
        $data['list_answered_eval'] = $this->QuestionnaireModel->get_colleague_answer_eval_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'result_colleague_evaluation', $data);
    }

    public function result_leader_evaluation($id_kuisioner = "", $id_penilai = "", $id_dinilai = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_evaluation_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner, $id_penilai, $id_dinilai, 2);
        $data['list_answered_eval'] = $this->QuestionnaireModel->get_leader_answer_eval_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'result_leader_evaluation', $data);
    }

    public function result_subordinate_evaluation($id_kuisioner = "", $id_penilai = "", $id_dinilai = "")
    {
        $id_kuisioner = paramDecrypt($id_kuisioner);
        $id_penilai = paramDecrypt($id_penilai);
        $id_dinilai = paramDecrypt($id_dinilai);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id_kuisioner);
        $data['result_eval'] = $this->QuestionnaireModel->get_result_evaluation_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner, $id_penilai, $id_dinilai, 3);
        $data['list_answered_eval'] = $this->QuestionnaireModel->get_subordinate_answer_eval_by_id_questionnaire_id_evaluator_id_participant($id_kuisioner, $id_penilai, $id_dinilai);

        $this->template->load('template_employee/template_employee', 'result_subordinate_evaluation', $data);
    }

    public function detail_questionnaire($id = '')
    {
        $id = paramDecrypt($id);

        $data['nav_master_ansque'] = 'menu-item-open';
        $data['sub_nav_master_ansque'] = 'menu-item-active';

        $data['questionnaire'] = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id); //?   
        $data['question'] = $this->QuestionnaireModel->get_question_by_id_questionnaire($id); //? 
        $data['question_type'] = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id);
        $data['total_question'] = $this->QuestionnaireModel->get_total_question_by_id_questionnaire($id);
        $data['predicate_value'] = $this->QuestionnaireModel->get_predicate_value_by_id_questionnaire($id);
        $data['eval_result'] = $this->QuestionnaireModel->get_total_result_evaluation_by_id_questionnaire($id);

        $query = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id);
        $question_types = [];
        foreach ($query as $row) {
            $question_types[$row->id_tipe_pertanyaan] = [
                "title" => $row->nama_tipe_pertanyaan,
                "class" => "label-light-default", // bisa juga ambil dari DB kalau ada kolom khusus
            ];
        }
        $data['question_type_json'] = json_encode($question_types, JSON_PRETTY_PRINT);

        $this->template->load('template_employee/template_employee', 'detail_questionnaire', $data);
    }

    public function auto_generate_questionnaire_evaluation($return_json = true)
    {

        if ($this->employee[0]->id_jabatan == 26) {

            $generate_kuisioner = $this->QuestionnaireModel->auto_generate_questionnaire();

            if ($generate_kuisioner['status']) {

                $generate_predikat = $this->QuestionnaireModel->auto_generate_predicate_value($generate_kuisioner['id_kuisioner_lama'], $generate_kuisioner['id_kuisioner_baru']);
                $generate_tipe_pertanyaan = $this->QuestionnaireModel->auto_generate_question_type($generate_kuisioner['id_kuisioner_lama'], $generate_kuisioner['id_kuisioner_baru']);
                $generate_pertanyaan = $this->QuestionnaireModel->auto_generate_question($generate_kuisioner['id_kuisioner_lama'], $generate_kuisioner['id_kuisioner_baru']);

                if ($generate_predikat['status'] && $generate_tipe_pertanyaan['status'] && $generate_pertanyaan['status']) {

                    $generate_personal = $this->generate_personal_evaluation(false);
                    $generate_colleague = $this->generate_colleague_evaluation(false);
                    $generate_leader = $this->generate_leader_evaluation(false);
                    $generate_subordinate = $this->generate_subordinate_evaluation(false);

                    if ($generate_personal['status'] && $generate_colleague['status'] && $generate_leader['status'] && $generate_subordinate['status']) {
                        $output = array(
                            "status" => true,
                            "message" => "Auto generate kuisioner berhasil!",
                        );
                    } else {

                        $output = array(
                            "status" => false,
                            "message_personal" => $generate_personal['message'],
                            "message_colleague" => $generate_colleague['message'],
                            "message_leader" => $generate_leader['message'],
                            "message_subordinate" => $generate_subordinate['message'],
                        );
                    }
                } else {
                    $output = array(
                        "status" => false,
                        "message_predikat" => $generate_predikat['message'],
                        "message_tipe_pertanyaan" => $generate_tipe_pertanyaan['message'],
                        "message_pertanyaan" => $generate_pertanyaan['message'],
                    );
                }
            }
        } else {

            $output = array(
                "status" => false,
                "message" => "User tidak terdaftar!",
            );
        }

        if ($return_json) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
        }

        return $output;
    }

    public function generate_personal_evaluation($return_json = true)
    {
        $get_id_questionnaire = $this->QuestionnaireModel->get_max_id_questionnaire();
        //generate eval presonal by id_pegawai
        $input_personal = array_column($this->QuestionnaireModel->get_employee_by_level_and_position([], []), 'id_pegawai');
        $data_personal = $this->uniquecolumngenerator->generate_val_personal_by_column($input_personal, 'id_pegawai', $get_id_questionnaire[0]->id_kuisioner, 'id_kuisioner');
        $insert_data_personal = $this->uniquecolumngenerator->generate_insert_data($input_personal, $data_personal, 'id_pegawai', 'id_kuisioner');
        $result_personal = $this->QuestionnaireModel->insert_batch_personal_evaluation($insert_data_personal);

        if ($result_personal['status']) {
            $output = array(
                "status" => true,
                "message" => $result_personal['message'],
            );
        } else {
            $output = array(
                "status" => false,
                "message" => $result_personal['message'],
            );
        }

        if ($return_json) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
        }

        return $output;
    }

    public function generate_colleague_evaluation($return_json = true)
    {
        $total_penilai_sejawat = 3;
        // --- Konfigurasi sejawat (mapping level & posisi) ---//
        $configs = [
            'tk'  => [
                'levels'    => [1],
                'positions' => [1, 2, 16],
            ],
            'sd'  => [
                'levels'    => [3],
                'positions' => [6, 8, 7, 17, 21],
            ],
            'smp' => [
                'levels'    => [4],
                'positions' => [11, 12, 13, 18, 22],
            ],
            'aq'  => [
                'levels'    => [1, 3, 4, 6],
                'positions' => [27, 32, 33, 34, 37, 38],
            ],
            'lpi' => [
                'levels'    => [1, 3, 4, 6],
                'positions' => [35, 36],
            ],

            //'positions' => [1, 2, 3, 6, 7, 8, 11, 12, 13, 20, 21, 22, 32, 33, 34, 35, 36],
        ];

        $update_data = [];
        // Loop semua configs
        foreach ($configs as $key => $cfg) {
            $input = array_column(
                $this->QuestionnaireModel->get_employee_by_level_and_position(
                    $cfg['levels'],
                    $cfg['positions']
                ),
                'id_pegawai'
            );

            $data = $this->uniquecolumngenerator->generate_val_unique_colleague_by_column(
                $input,
                $total_penilai_sejawat
            );

            $update_data[$key] = $this->uniquecolumngenerator->generate_update_data(
                $input,
                $data,
                'id_pegawai',
                'id_sejawat'
            );
        }

        $result_sejawat = $this->QuestionnaireModel->update_batch_colleague_evaluation($update_data);

        if ($result_sejawat['status']) {
            $output = array(
                "status" => true,
                "message" => $result_sejawat['message'],
            );
        } else {
            $output = array(
                "status" => false,
                "message" => $result_sejawat['message'],
            );
        }

        if ($return_json) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
        }

        return $output;
    }

    public function generate_leader_evaluation($return_json = true)
    {
        // --- Konfigurasi leader (mapping pimpinan & bawahan) ---
        $leader_configs = [
            'lpi_general' => [
                'lead_levels'    => [6],
                'lead_positions' => [36],
                'sub_levels'     => [1, 3, 4, 6],
                'sub_positions'  => [1, 2, 3, 6, 7, 8, 11, 12, 13, 20, 21, 22, 28, 29, 30, 31],
            ],
            'lpi_aq' => [
                'lead_levels'    => [6],
                'lead_positions' => [35],
                'sub_levels'     => [1, 3, 4],
                'sub_positions'  => [32, 33, 34],
            ],
            'kepsek_tk' => [
                'lead_levels'    => [1],
                'lead_positions' => [1, 2, 3, 20],
                'sub_levels'     => [1],
                'sub_positions'  => [16],
            ],
            'kepsek_sd' => [
                'lead_levels'    => [3],
                'lead_positions' => [6, 7, 8, 21],
                'sub_levels'     => [3],
                'sub_positions'  => [17],
            ],
            'kepsek_smp' => [
                'lead_levels'    => [4],
                'lead_positions' => [11, 12, 13, 22],
                'sub_levels'     => [4],
                'sub_positions'  => [18],
            ],
            'koor_aq_tk' => [
                'lead_levels'    => [3],
                'lead_positions' => [34],
                'sub_levels'     => [3],
                'sub_positions'  => [37],
            ],
            'koor_aq_sd' => [
                'lead_levels'    => [3],
                'lead_positions' => [34],
                'sub_levels'     => [3],
                'sub_positions'  => [37],
            ],
            'koor_aq_smp' => [
                'lead_levels'    => [4],
                'lead_positions' => [32],
                'sub_levels'     => [4],
                'sub_positions'  => [38],
            ],
            'ketua_yayasan' => [
                'lead_levels'    => [0],
                'lead_positions' => [26],
                'sub_levels'     => [6],
                'sub_positions'  => [35, 36],
            ],
        ];

        $update_leader_data = [];

        foreach ($leader_configs as $key => $cfg) {
            // Ambil pimpinan
            $input_lead = array_column(
                $this->QuestionnaireModel->get_employee_by_level_and_position(
                    $cfg['lead_levels'],
                    $cfg['lead_positions']
                ),
                'id_pegawai'
            );

            // Ambil bawahan
            $input_sub = array_column(
                $this->QuestionnaireModel->get_employee_by_level_and_position(
                    $cfg['sub_levels'],
                    $cfg['sub_positions']
                ),
                'id_pegawai'
            );

            // Generate nilai unik pimpinan
            $data = $this->uniquecolumngenerator->generate_val_unique_leader_by_row($input_lead, $input_sub);

            // Siapkan data update
            $update_leader_data[$key] = $this->uniquecolumngenerator->generate_update_data(
                $input_lead,
                $data,
                'id_pegawai',
                'id_bawahan'
            );
        }

        // --- Update batch leader evaluation ---
        $result_leader = $this->QuestionnaireModel->update_batch_leader_evaluation($update_leader_data);
        if ($result_leader['status']) {
            $output = array(
                "status" => true,
                "message" => $result_leader['message'],
            );
        } else {
            $output = array(
                "status" => false,
                "message" => $result_leader['message'],
            );
        }

        if ($return_json) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
        }

        return $output;
    }

    public function generate_subordinate_evaluation($return_json = true)
    {

        // --- Konfigurasi bawahan (mapping bawahan & atasannya) ---
        $subordinate_configs = [
            'tk' => [
                'sub_levels'    => [1],
                'sub_positions' => [16],
                'lead_levels'   => [1],
                'lead_positions' => [1, 2, 3, 20],
            ],
            'sd' => [
                'sub_levels'    => [3],
                'sub_positions' => [17],
                'lead_levels'   => [3],
                'lead_positions' => [6, 7, 8, 21],
            ],
            'smp' => [
                'sub_levels'    => [4],
                'sub_positions' => [18],
                'lead_levels'   => [4],
                'lead_positions' => [11, 12, 13, 22],
            ],
            'aq_sd' => [
                'sub_levels'    => [3],
                'sub_positions' => [37],
                'lead_levels'   => [3],
                'lead_positions' => [34],
            ],
            'aq_smp' => [
                'sub_levels'    => [4],
                'sub_positions' => [38],
                'lead_levels'   => [4],
                'lead_positions' => [32],
            ],
            'lpi_aq' => [
                'sub_levels'    => [1, 3, 4],
                'sub_positions' => [32, 33, 34],
                'lead_levels'   => [6],
                'lead_positions' => [35],
            ],
            'lpi_umum' => [
                'sub_levels'    => [1, 3, 4],
                'sub_positions' => [1, 2, 3, 6, 7, 8, 11, 12, 13, 20, 21, 22],
                'lead_levels'   => [6],
                'lead_positions' => [36],
            ],
        ];

        $update_subordinate_data = [];

        foreach ($subordinate_configs as $key => $cfg) {
            // Ambil bawahan
            $input_sub = array_column(
                $this->QuestionnaireModel->get_employee_by_level_and_position(
                    $cfg['sub_levels'],
                    $cfg['sub_positions']
                ),
                'id_pegawai'
            );

            // Ambil atasannya
            $input_lead = array_column(
                $this->QuestionnaireModel->get_employee_by_level_and_position(
                    $cfg['lead_levels'],
                    $cfg['lead_positions']
                ),
                'id_pegawai'
            );

            // Generate nilai unik bawahan
            $data = $this->uniquecolumngenerator->generate_val_unique_subordinate_by_column($input_lead, $input_sub);

            // Siapkan data update
            $update_subordinate_data[$key] = $this->uniquecolumngenerator->generate_update_data(
                $input_sub,
                $data,
                'id_pegawai',
                'id_atasan'
            );
        }

        $result_subordinate = $this->QuestionnaireModel->update_batch_subordinate_evaluation($update_subordinate_data);
        // --- Update batch leader evaluation ---
        if ($result_subordinate['status']) {
            $output = array(
                "status" => true,
                "message" => $result_subordinate['message'],
            );
        } else {
            $output = array(
                "status" => false,
                "message" => $result_subordinate['message'],
            );
        }

        if ($return_json) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
        }

        return $output;
    }

    public function post_questionnaire()
    {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kuisioner', 'Nama Kuisioner ', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai ', 'required');
        $this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir ', 'required');
        $this->form_validation->set_rules('th_ajaran', 'Tahun Ajaran ', 'required');
        $this->form_validation->set_rules('persentase_personal', 'Persentase Personal ', 'required');
        $this->form_validation->set_rules('persentase_sejawat', 'Persentase Sejawat ', 'required');
        $this->form_validation->set_rules('persentase_atasan', 'Persentase Atasan ', 'required');
        $this->form_validation->set_rules('persentase_bawahan', 'Persentase Bawahan ', 'required');
        $this->form_validation->set_rules('nilai_penilaian_max', 'Penilaian Max ', 'required');
        $this->form_validation->set_rules('jumlah_penilai_sejawat', 'Jumlah Penilian Sejawat', 'required');
        $this->form_validation->set_rules('deskripsi_kuisioner', 'Deskripsi Kuisioner ', 'required');
        // $this->form_validation->set_rules('tipe_penilaian', 'Tipe Penilian ', 'required');
        // $this->form_validation->set_rules('tunjangan_kinerja', 'Tunjangan Kinerja ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $output = array(
                "status" => false,
                "message" => validation_errors(),
            );
        } else {

            $insert = $this->QuestionnaireModel->insert_questionnaire($data);
            if ($insert) {
                $output = array(
                    "status" => true,
                    "message" => 'Kuisioner Berhasil Dibuat',
                );
            } else {
                $output = array(
                    "status" => false,
                    "message" => 'Kuisioner Gagal Dibuat',
                );
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function post_question($id = '')
    {
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

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Pertanyaan <b>" . $data['isi_pertanyaan'] . "</b> telah dibuat."));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
            }
        }
    }

    public function post_question_type($id = '')
    {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_tipe_pertanyaan', 'Nama Tipe Pertanyaan ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id)); //folder, controller, method
        } else {

            $insert = $this->QuestionnaireModel->insert_question_type($id, $data);
            if ($insert == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Nama Tipe Pertanyaan <b>" . strtoupper($data['nama_tipe_pertanyaan']) . "</b> telah dibuat."));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
            }
        }
    }

    public function post_predicate_value($id = '')
    {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nilai_minimal', 'Nilai Miminal ', 'required');
        $this->form_validation->set_rules('nilai_maksimal', 'Nilai Maksimal ', 'required');
        $this->form_validation->set_rules('predikat_abjad', 'Predikat Abjad ', 'required');
        $this->form_validation->set_rules('label_nilai', 'Label Nilai ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id)); //folder, controller, method
        } else {

            $insert = $this->QuestionnaireModel->insert_predicate_value($id, $data);
            if ($insert == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Label Predikat Nilai <b>" . strtoupper($data['label_nilai']) . "</b> telah dibuat."));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($id));
            }
        }
    }

    public function edit_questionnaire()
    {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id = paramDecrypt($data['id_kuisioner_edit']);

        $this->form_validation->set_rules('nama_kuisioner_edit', 'Nama Kuisioner ', 'required');
        $this->form_validation->set_rules('tgl_mulai_edit', 'Tanggal Mulai ', 'required');
        $this->form_validation->set_rules('tgl_berakhir_edit', 'Tanggal Berakhir ', 'required');
        $this->form_validation->set_rules('th_ajaran_edit', 'Tahun Ajaran ', 'required');
        $this->form_validation->set_rules('persentase_personal_edit', 'Persentase Personal ', 'required');
        $this->form_validation->set_rules('persentase_sejawat_edit', 'Persentase Sejawat ', 'required');
        $this->form_validation->set_rules('persentase_atasan_edit', 'Persentase Atasan ', 'required');
        $this->form_validation->set_rules('persentase_bawahan_edit', 'Persentase Bawahan ', 'required');
        $this->form_validation->set_rules('nilai_penilaian_max_edit', 'Penilaian Max ', 'required');
        $this->form_validation->set_rules('deskripsi_kuisioner_edit', 'Deskripsi Kuisioner ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $output = array(
                "status" => false,
                "message" => validation_errors(),
            );
        } else {

            $update = $this->QuestionnaireModel->update_questionnaire($id, $data);

            if ($update) {
                $output = array(
                    "status" => true,
                    "message" => "Berhasil!, Kuisioner dengan Nama <b>" . $data['nama_kuisioner_edit'] . "</b> telah diupdate.",
                );
            } else {
                $output = array(
                    "status" => false,
                    "message" => 'Maaf, Terjadi kesalahan, Silahkan input ulang.',
                );
            }
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function edit_question($id = '')
    {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id = paramDecrypt($data['id_pertanyaan_edit']);

        $this->form_validation->set_rules('tipe_pertanyaan_edit', 'Tipe Pertanyaan ', 'required');
        $this->form_validation->set_rules('isi_pertanyaan_edit', 'Isi Pertanyaan ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $output = array(
                "status" => false,
                "message" => validation_errors(),
            );
        } else {

            $update = $this->QuestionnaireModel->update_question($id, $data);

            if ($update == true) {

                $output = array(
                    "status" => true,
                    "message" => "Berhasil!, Pertanyaan dengan Nama <b>" . $data['isi_pertanyaan_edit'] . "</b> telah diupdate.",
                );
            } else {

                $output = array(
                    "status" => false,
                    "message" => 'Maaf, Terjadi kesalahan, Silahkan input ulang.',
                );
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function edit_question_type($id = '')
    {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id = paramDecrypt($data['id_tipe_pertanyaan_edit']);

        $this->form_validation->set_rules('nama_tipe_pertanyaan_edit', 'Nama Tipe Pertanyaan ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $output = array(
                "status" => false,
                "message" => validation_errors(),
            );
        } else {

            $update = $this->QuestionnaireModel->update_question_type($id, $data);

            if ($update == true) {

                $output = array(
                    "status" => true,
                    "message" => "Berhasil!, Tipe Pertanyaan dengan Nama <b>" . $data['nama_tipe_pertanyaan_edit'] . "</b> telah diupdate.",
                );
            } else {

                $output = array(
                    "status" => false,
                    "message" => 'Maaf, Terjadi kesalahan, Silahkan input ulang.',
                );
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function edit_predicate_value($id = '')
    {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id = paramDecrypt($data['id_nilai_predikat_edit']);

        $this->form_validation->set_rules('nilai_minimal_edit', 'Nilai Miminal ', 'required');
        $this->form_validation->set_rules('nilai_maksimal_edit', 'Nilai Maksimal ', 'required');
        $this->form_validation->set_rules('predikat_abjad_edit', 'Predikat Abjad ', 'required');

        $this->form_validation->set_rules('label_nilai_edit', 'Label Nilai ', 'required');

        if ($this->form_validation->run() == FALSE) {

            $output = array(
                "status" => false,
                "message" => validation_errors(),
            );
        } else {

            $update = $this->QuestionnaireModel->update_predicate_value($id, $data);

            if ($update == true) {

                $output = array(
                    "status" => true,
                    "message" => "Berhasil!, Nilai Predikat dengan Label <b>" . $data['label_nilai_edit'] . "</b> telah diupdate.",
                );
            } else {

                $output = array(
                    "status" => false,
                    "message" => 'Maaf, Terjadi kesalahan, Silahkan input ulang.',
                );
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }


    public function delete_question()
    {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_name = $this->QuestionnaireModel->get_question_by_id($id);
        $delete = $this->QuestionnaireModel->delete_question_by_id($id);

        if ($delete == true) {

            $output = array(
                "status" => true,
                "message" => "Berhasil!, Pertanyaan dengan Nama <b>" . $get_name[0]->isi_pertanyaan  . "</b> Telah Terhapus.",
            );
        } else {
            $output = array(
                "status" => false,
                "message" => 'Maaf, Terjadi kesalahan, Silahkan hapus ulang.',
            );
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function delete_question_type()
    {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_name = $this->QuestionnaireModel->get_question_type_by_id($id);
        $delete = $this->QuestionnaireModel->delete_question_type_by_id($id);

        if ($delete == true) {

            $output = array(
                "status" => true,
                "message" => "Berhasil!, Tipe Pertanyaan dengan Nama <b>" . $get_name[0]->nama_tipe_pertanyaan  . "</b> Telah Terhapus.",
            );
        } else {
            $output = array(
                "status" => false,
                "message" => 'Maaf, Terjadi kesalahan, Silahkan hapus ulang.',
            );
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }


    public function delete_predicate_value()
    {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_name = $this->QuestionnaireModel->get_predicate_value_by_id($id);
        $delete = $this->QuestionnaireModel->delete_predicate_value_by_id($id);

        if ($delete == true) {

            $output = array(
                "status" => true,
                "message" => "Berhasil!, Nilai Predikat dengan Label <b>" . $get_name[0]->label_nilai  . "</b> Telah Terhapus.",
            );
        } else {
            $output = array(
                "status" => false,
                "message" => 'Maaf, Terjadi kesalahan, Silahkan hapus ulang.',
            );
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function activate_status_questionnaire()
    {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);
        $get_name = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id);

        $disable = $this->QuestionnaireModel->disable_status_questionnaire();
        $activate = $this->QuestionnaireModel->update_status_questionnaire($id, 1);

        if ($activate == true && $disable == true) {
            $output = array(
                "status" => true,
                "message" => "Berhasil!, Kuisioner dengan Nama <b>" . strtoupper($get_name[0]->nama_kuisioner)  . "</b> Telah diaktifkan.",
            );
        } else {
            $output = array(
                "status" => false,
                "message" => 'Maaf, Terjadi kesalahan, Silahkan aktifkan ulang.',
            );
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function disable_status_questionnaire()
    {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);
        $get_name = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id);

        $disable = $this->QuestionnaireModel->disable_status_questionnaire();
        $activate = $this->QuestionnaireModel->update_status_questionnaire($id, 0);

        if ($activate == true && $disable == true) {
            $output = array(
                "status" => true,
                "message" => "Berhasil!, Kuisioner dengan Nama <b>" . strtoupper($get_name[0]->nama_kuisioner)  . "</b> Telah dinonaktifkan.",
            );
        } else {
            $output = array(
                "status" => false,
                "message" => 'Maaf, Terjadi kesalahan, Silahkan aktifkan ulang.',
            );
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function delete_questionnaire()
    {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old_name = $this->QuestionnaireModel->get_questionnaire_by_id_questionnaire($id);

        $delete_questionnaire = $this->QuestionnaireModel->delete_questionnaire($id);
        $delete_question = $this->QuestionnaireModel->delete_question_all($id);

        if ($delete_questionnaire == TRUE && $delete_question == TRUE) {

            $this->QuestionnaireModel->delete_answer_personal($id);
            $this->QuestionnaireModel->delete_answer_friend($id);
            $this->QuestionnaireModel->delete_answer_leader($id);

            $output = array(
                "status" => true,
                "message" => "Berhasil!, Kuisioner dengan Nama <b>" . strtoupper($get_old_name[0]->nama_kuisioner)  . "</b> Telah Terhapus.",
            );
        } else {

            $output = array(
                "status" => false,
                "message" => 'Maaf, Terjadi kesalahan, Silahkan hapus ulang.',
            );
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    //-----------------------------------------------------------------------//


    public function print_data_pdf_evaluation_personal()
    {
        $param = $this->input->post();
        $data  = $this->security->xss_clean($param);

        $id_kuisioner = paramDecrypt($data['id_kuisioner']);
        $id_penilai = paramDecrypt($data['id_penilai']);
        $id_dinilai = paramDecrypt($data['id_dinilai']);

        $token = $this->security->get_csrf_hash();

        if (!empty($this->employee)) {

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

                $get['question']        = $this->QuestionnaireModel->get_question_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['question_type']   = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_eval']     = $this->QuestionnaireModel->get_result_eval_personal_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['id_penilai']      = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
                $get['id_dinilai']      = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
                $get['total_question']  = count($get['question']);
                $get['page']            = $this->QuestionnaireModel->get_page();
                $get['contact']         = $this->QuestionnaireModel->get_contact();
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

        if (!empty($this->employee)) {

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

                $get['question']        = $this->QuestionnaireModel->get_question_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['question_type']   = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_eval']     = $this->QuestionnaireModel->get_result_eval_colleague_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['id_penilai']      = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
                $get['id_dinilai']      = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
                $get['total_question']  = count($get['question']);
                $get['page']            = $this->QuestionnaireModel->get_page();
                $get['contact']         = $this->QuestionnaireModel->get_contact();
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

        if (!empty($this->employee)) {

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

                $get['question']        = $this->QuestionnaireModel->get_question_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['question_type']   = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_eval']     = $this->QuestionnaireModel->get_result_eval_leader_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['id_penilai']      = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
                $get['id_dinilai']      = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
                $get['total_question']  = count($get['question']);
                $get['page']            = $this->QuestionnaireModel->get_page();
                $get['contact']         = $this->QuestionnaireModel->get_contact();
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

        if (!empty($this->employee)) {

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

                $get['question']        = $this->QuestionnaireModel->get_question_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['question_type']   = $this->QuestionnaireModel->get_question_type_by_id_questionnaire($id_kuisioner);
                $get['result_eval']     = $this->QuestionnaireModel->get_result_eval_subordinate_by_id_questionnaire_id_assessor_id_assessed($id_kuisioner, $id_penilai, $id_dinilai);
                $get['id_penilai']      = $this->QuestionnaireModel->get_employe_by_id_employee($id_penilai);
                $get['id_dinilai']      = $this->QuestionnaireModel->get_employe_by_id_employee($id_dinilai);
                $get['total_question']  = count($get['question']);
                $get['page']            = $this->QuestionnaireModel->get_page();
                $get['contact']         = $this->QuestionnaireModel->get_contact();
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
}
