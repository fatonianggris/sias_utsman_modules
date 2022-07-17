<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Academic extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        $this->load->model('AcademicModel');
        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    
    public function list_employe_academic_all() {
        $data['nav_employe_aca'] = 'menu-item-open';
        $data['sub_nav_employe_aca_per'] = 'menu-item-active';

        $data['position'] = $this->AcademicModel->get_position($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

        $this->template->load('template_employee/template_employee', 'employe_list_academic_all', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function detail_employe($id = '') {
        $id = paramDecrypt($id);

        $data['nav_employe_aca'] = 'menu-item-open';
        $data['sub_nav_employe_aca_per'] = 'menu-item-active';

        $data['report'] = $this->AcademicModel->get_employe_report_by_id($id);
        $data['presence'] = $this->AcademicModel->get_employe_presence_by_id($id);
        $data['employe'] = $this->AcademicModel->get_detail_employe($id); //?         
        $data['schoolyear'] = $this->AcademicModel->get_schoolyear_all();
        $this->template->load('template_employee/template_employee', 'employe_detail_academic', $data);
    }

    function add_ajax_employe($id_tingkat = '', $id_jabatan = '', $id_jk = '', $id_stat_pegawai = '') {
        $query = $this->AcademicModel->get_employe_ajax($id_tingkat, $id_jabatan, $id_jk, $id_stat_pegawai);

        $data = "";
        foreach ($query->result() as $value) {
            $img = '';
            if ($value->jenis_kelamin == 1) {
                $img = '<img src="' . base_url() . 'assets/employee/dist/assets/media/svg/avatars/029-boy-11.svg" alt="" class="align-self-end h-100px">';
            } else {
                $img = '<img src="' . base_url() . 'assets/employee/dist/assets/media/svg/avatars/014-girl-7.svg" alt="" class="align-self-end h-100px">';
            }
            $data .= '<div class="col-xl-3  mb-7">
                        <!--begin::Stats Widget 4-->
                        <div class="card card-custom card-stretch bg-light-warning">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center py-0 mt-2">
                                <div class="d-flex flex-column flex-grow-1 py-lg-5 text-center">
                                    <a href="' . site_url('employee/employe/academic/detail_employe/') . paramEncrypt($value->id_pegawai) . '" class="card-title font-weight-bolder text-dark-75 font-size-h8 mb-2 text-hover-primary">' . ucwords(strtolower($value->nama_lengkap)) . '</a>
                                    <span class="label label-jab label-light-info label-inline font-weight-bold">' . strtoupper($value->hasil_nama_jabatan) . '</span>
                                </div>
                                ' . $img . '
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 4-->
                    </div>';
        }
        echo $data;
    }

    //-----------------------------------------------------------------------//
//
}
