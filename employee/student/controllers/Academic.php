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
        $this->load->library('form_validation');

        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    
    public function list_student_academic_class() {
        $data['nav_student_aca'] = 'menu-item-open';
        $data['sub_nav_student_aca_cla'] = 'menu-item-active';
        $data['employe_grade'] = $this->AcademicModel->get_employe_by_grade();
        $data['grade'] = $this->AcademicModel->get_grade($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['schoolyear'] = $this->AcademicModel->get_schoolyear();
        $this->template->load('template_employee/template_employee', 'student_list_academic_class', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function detail_student_academic_class($id = '') {
        $id = paramDecrypt($id);

        $data['nav_student_aca'] = 'menu-item-open';
        $data['sub_nav_student_aca_cla'] = 'menu-item-active';
        $data['class'] = $this->AcademicModel->get_detail_class($id); //?   
        $data['total'] = $this->AcademicModel->get_total_student($id); //?   
        $data['student'] = $this->AcademicModel->get_students_by_class($id);
        $data['schoolyear'] = $this->AcademicModel->get_schoolyear();
        $data['student_grade'] = $this->AcademicModel->get_students_by_grade($data['class'][0]->id_tingkat);

        $this->template->load('template_employee/template_employee', 'student_detail_class', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function add_student_class($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('id_siswa[]', 'Siswa Diperlukan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/student/academic/detail_student_academic_class/' . paramEncrypt($id)); //folder, controller, method
        } else {

            $add_student = $this->AcademicModel->add_student_class_by_id($id, $data['id_siswa']);

            $tahun_ajaran = $this->AcademicModel->get_schoolyear();
            $id_pegawai = $this->AcademicModel->get_class_by_id($id);

            $create_report = [];
            $create_presence = [];

            for ($i = 0; $i < count($data['id_siswa']); $i++) {
                for ($z = 0; $z < count($tahun_ajaran); $z++) {

                    $student = $this->AcademicModel->get_student_by_id($data['id_siswa'][$i]);

                    $create_report[] = array('id_siswa' => $data['id_siswa'][$i], 'id_kelas' => $id, 'id_tingkat' => $student[0]->id_tingkat, 'level_tingkat' => $student[0]->level_tingkat, 'id_pegawai' => $id_pegawai[0]->id_pegawai, 'th_ajaran' => $tahun_ajaran[$z]->id_tahun_ajaran);
                    $create_presence[] = array('id_siswa' => $data['id_siswa'][$i], 'id_kelas' => $id, 'id_tingkat' => $student[0]->id_tingkat, 'level_tingkat' => $student[0]->level_tingkat, 'id_pegawai' => $id_pegawai[0]->id_pegawai, 'th_ajaran' => $tahun_ajaran[$z]->id_tahun_ajaran);
                }
            }

            if ($add_student == true) {

                $this->AcademicModel->setBatchImportReport($create_report);
                $this->AcademicModel->importReport();
                $this->AcademicModel->setBatchImportPresence($create_presence);
                $this->AcademicModel->importPresence();

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Siswa yang Anda pilih telah ditambahkan."));
                redirect('employee/student/academic/detail_student_academic_class/' . paramEncrypt($id)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/student/academic/detail_student_academic_class/' . paramEncrypt($id)); //folder, controller, method
            }
        }
    }

    public function release_student_class() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_kelas = paramDecrypt($data['id_kelas']);
        $id_siswa = paramDecrypt($data['id_siswa']);

        $release = $this->AcademicModel->release_student_by_class($id_siswa);
        $remove_presence = $this->AcademicModel->remove_presence_by_class($id_siswa, $id_kelas);
        $remove_report = $this->AcademicModel->remove_report_by_class($id_siswa, $id_kelas);

        $student = $this->AcademicModel->get_student_by_id($id_siswa);

        $file_report_old = explode('/', $remove_report[0]->file_rapor_siswa);
        $file_report = $file_report_old[3];

        if ($release == true && $remove_presence == true && $remove_report == true) {
            $this->delete_report_file($file_report);

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Siswa <b>'" . strtoupper($student[0]->nama_lengkap) . '-' . strtoupper($student[0]->nisn) . "'</b> Telah Dikeluarkan."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
        }
    }

    function add_ajax_class($id_tingkat = '', $level_tingkat = '') {
        $query = $this->AcademicModel->get_class_ajax($id_tingkat, $level_tingkat);

        $data = "";
        foreach ($query->result() as $value) {
            $img = '';
            $tingkat = '';
            $level = '';
            $url = site_url('/employee/student/academic/detail_student_academic_class/' . paramEncrypt($value->id_kelas));
            $nama = '';
            if ($value->level_tingkat == 1) {
                $img = '<div class="symbol-label mb-3" style="background-image: url(' . base_url('assets/employee/dist/assets/media/stock-600x400/img-45.jpg') . ')"></div>';
                $level = '<span class="label label-lg label-light-info label-inline mb-3 mt-1 font-weight-bold">KB</span>';
                $tingkat = '<span class="label label-lg label-light-info label-inline mb-3 mt-1 font-weight-bold">' . $value->nama_tingkat . '</span>';
            } elseif ($value->level_tingkat == 2) {
                $img = '<div class="symbol-label mb-3" style="background-image: url(' . base_url('assets/employee/dist/assets/media/stock-600x400/img-45.jpg') . ')"></div>';
                $level = '<span class="label label-lg label-light-primary label-inline mb-3 mt-1 font-weight-bold">TK</span>';
                $tingkat = '<span class="label label-lg label-light-primary label-inline mb-3 mt-1 font-weight-bold">' . $value->nama_tingkat . '</span>';
            } elseif ($value->level_tingkat == 3) {
                $img = '<div class="symbol-label mb-3" style="background-image: url(' . base_url('assets/employee/dist/assets/media/stock-600x400/img-45.jpg') . ')"></div>';
                $level = '<span class="label label-lg label-light-success label-inline mb-3 mt-1 font-weight-bold">SD</span>';
                $tingkat = '<span class="label label-lg label-light-success label-inline mb-3 mt-1 font-weight-bold">' . $value->nama_tingkat . '</span>';
            } elseif ($value->level_tingkat == 4) {
                $img = '<div class="symbol-label mb-3" style="background-image: url(' . base_url('assets/employee/dist/assets/media/stock-600x400/img-45.jpg') . ')"></div>';
                $level = '<span class="label label-lg label-light-warning label-inline mb-3 mt-1 font-weight-bold">SMP</span>';
                $tingkat = '<span class="label label-lg label-light-warning label-inline mb-3 mt-1 font-weight-bold">' . $value->nama_tingkat . '</span>';
            } elseif ($value->level_tingkat == 5) {
                $img = '<div class="symbol-label mb-3" style="background-image: url(' . base_url('assets/employee/dist/assets/media/stock-600x400/img-45.jpg') . ')"></div>';
                $level = '<span class="label label-lg label-light-danger label-inline mb-3 mt-1 font-weight-bold">SMA</span>';
                $tingkat = '<span class="label label-lg label-light-danger label-inline mb-3 mt-1 font-weight-bold">' . $value->nama_tingkat . '</span>';
                $url = '';
            } elseif ($value->level_tingkat == 6) {
                $img = '<div class="symbol-label mb-3" style="background-image: url(' . base_url('assets/employee/dist/assets/media/stock-600x400/img-45.jpg') . ')"></div>';
                $level = '<span class="label label-lg label-light-dark label-inline mb-3 mt-1 font-weight-bold">UMUM</span>';
                $tingkat = '<span class="label label-lg label-light-dark label-inline mb-3 mt-1 font-weight-bold">' . $value->nama_tingkat . '</span>';
            }

            if ($value->id_pegawai == 0) {
                $nama = '<span class="label label-sm label-danger label-inline font-weight-bold">BELUM ADA</span>';
            } else {
                $nama = '<span class="label label-sm label-success label-inline font-weight-bold">' . strtoupper($value->nama_lengkap) . '</span>';
            }


            $data .= '<div class="col-xl-3 d-flex mb-8">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                            <div class="d-flex flex-column">
                                ' . $img . '
                                <a href="' . $url . '" class="btn btn-light-primary font-weight-bolder py-2 font-size-sm">Lihat</a>
                            </div>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column my-lg-0 my-2 pr-3 ">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">' . strtoupper($value->nama_kelas) . '</a>
                            <div>
                            ' . $level . '
                            ' . $tingkat . '                                                           
                            </div>
                            <span class="text-muted font-weight-bold font-size-sm">
                                ' . $nama . '
                            </span>
                        </div>
                        <!--end::Title-->
                    </div>
                    ';
        }
        echo $data;
    }

    public function delete_report_file($name = '') {
        $path = 'uploads/rapor/files/';
        @unlink($path . $name);
    }

    //-----------------------------------------------------------------------//
//
}
