<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeroomTeacher extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        $this->load->model('HomeroomTeacherModel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DASHBOARD HOMEROOM------------------------------//
    //
    
    public function dashboard_homeroom_teacher($id = '') {
        $id = paramDecrypt($id);

        $data['nav_employe_hmtea'] = 'menu-item-open';
        $data['sub_nav_employe_hmtea_das'] = 'menu-item-active';

        $data['class'] = $this->HomeroomTeacherModel->get_detail_class($id); //?   
        $data['total'] = $this->HomeroomTeacherModel->get_total_student($id); //?   
        $data['student'] = $this->HomeroomTeacherModel->get_students_by_class($id);
        $data['student_grade'] = $this->HomeroomTeacherModel->get_students_by_grade($data['class'][0]->level_tingkat);


        $this->template->load('template_employee/template_employee', 'dashboard_homeroom_teacher', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function list_student_homeroom_teacher_report($id = '') {
        $id = paramDecrypt($id);

        $data['nav_employe_hmtea'] = 'menu-item-open';
        $data['sub_nav_employe_hmtea_rep'] = 'menu-item-active';
        $data['class'] = $this->HomeroomTeacherModel->get_detail_class($id); //?  
        $data['report'] = $this->HomeroomTeacherModel->get_students_report_by_class($id);
        $data['schoolyear'] = $this->HomeroomTeacherModel->get_schoolyear();

    
        $this->template->load('template_employee/template_employee', 'student_list_report_hmteacher', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function list_student_homeroom_teacher_presence($id = '') {
        $id = paramDecrypt($id);

        $data['nav_employe_hmtea'] = 'menu-item-open';
        $data['sub_nav_employe_hmtea_pre'] = 'menu-item-active';
        $data['class'] = $this->HomeroomTeacherModel->get_detail_class($id); //?  
        $data['presence'] = $this->HomeroomTeacherModel->get_students_presence_by_class($id);
        $data['schoolyear'] = $this->HomeroomTeacherModel->get_schoolyear();
        
        

        $this->template->load('template_employee/template_employee', 'student_list_presence_hmteacher', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function list_student_homeroom_teacher_grade($id = '') {
        $id = paramDecrypt($id);

        $data['nav_employe_hmtea'] = 'menu-item-open';
        $data['sub_nav_employe_hmtea_gra'] = 'menu-item-active';

        $data['class'] = $this->HomeroomTeacherModel->get_detail_class($id); //?  
        $data['class_tingkat'] = $this->HomeroomTeacherModel->get_class_by_tingkat($id); //?  
        $data['student'] = $this->HomeroomTeacherModel->get_students_by_class($id);
        $data['student_transition'] = $this->HomeroomTeacherModel->get_students_by_class_transition($id);

        $this->template->load('template_employee/template_employee', 'student_list_grade_hmteacher', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function add_student_class($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('id_siswa[]', 'Siswa Diperlukan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/homeroomteacher/dashboard_homeroom_teacher/' . paramEncrypt($id)); //folder, controller, method
        } else {

            $add_student = $this->HomeroomTeacherModel->add_student_class_by_id($id, $data['id_siswa']);

            $tahun_ajaran = $this->HomeroomTeacherModel->get_schoolyear();
            $id_pegawai = $this->HomeroomTeacherModel->get_class_by_id($id);

            $create_report = [];
            $create_presence = [];

            for ($i = 0; $i < count($data['id_siswa']); $i++) {
                for ($z = 0; $z < count($tahun_ajaran); $z++) {

                    $student = $this->HomeroomTeacherModel->get_student_by_id($data['id_siswa'][$i]);

                    $create_report[] = array('id_siswa' => $data['id_siswa'][$i], 'id_kelas' => $id, 'id_tingkat' => $student[0]->id_tingkat, 'level_tingkat' => $student[0]->level_tingkat, 'id_pegawai' => $id_pegawai[0]->id_pegawai, 'th_ajaran' => $tahun_ajaran[$z]->id_tahun_ajaran);
                    $create_presence[] = array('id_siswa' => $data['id_siswa'][$i], 'id_kelas' => $id, 'id_tingkat' => $student[0]->id_tingkat, 'level_tingkat' => $student[0]->level_tingkat, 'id_pegawai' => $id_pegawai[0]->id_pegawai, 'th_ajaran' => $tahun_ajaran[$z]->id_tahun_ajaran);
                }
            }

            if ($add_student == true) {

                $this->HomeroomTeacherModel->setBatchImportReport($create_report);
                $this->HomeroomTeacherModel->importReport();
                $this->HomeroomTeacherModel->setBatchImportPresence($create_presence);
                $this->HomeroomTeacherModel->importPresence();

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Siswa yang Anda pilih telah ditambahkan."));
                redirect('employee/employe/homeroomteacher/dashboard_homeroom_teacher/' . paramEncrypt($id)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf!, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/homeroomteacher/dashboard_homeroom_teacher/' . paramEncrypt($id)); //folder, controller, method
            }
        }
    }

    public function add_report_student($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_kelas = paramDecrypt($data["id_kelas"]);

        if ($id == NULL) {

            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf!, ID Rapor tidak temukan."));
            redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
        } else {

            $this->load->library('upload'); //load library upload file           

            if (!empty($_FILES['file_rapor_siswa'])) {

                $path = 'uploads/rapor/files/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 5048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file_rapor_siswa')) {//if success upload data
                    $result['upload'] = $this->upload->data();

                    $name = $result['upload']['file_name'];
                    $data['file_rapor_siswa'] = $path . $name;
                } else {
                    $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf!, Silahkan upload File Rapor Siswa berformat PDF dan Filezise < 5Mb."));
                    redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf!, Upload File Rapor Siswa diperlukan."));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
            }

            $add_rapor = $this->HomeroomTeacherModel->update_report_student($id, $data);

            if ($add_rapor == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, File Rapor Siswa <b>'" . strtoupper($data['nama_siswa']) . "'</b>  telah Anda tambahkan."));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf!, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
            }
        }
    }

    public function edit_report_student($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $file_report_old = explode('/', $data['file_rapor_siswa_temp']);
        $file_report = $file_report_old[3];

        $id_kelas = paramDecrypt($data["id_kelas"]);

        if ($id == NULL) {

            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf!, ID Rapor tidak temukan."));
            redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
        } else {

            $this->load->library('upload'); //load library upload file           

            if (!empty($_FILES['file_rapor_siswa']['tmp_name'])) {

                $this->delete_report_file($file_report);

                $path = 'uploads/rapor/files/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 5048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file_rapor_siswa')) {//if success upload data
                    $result['upload'] = $this->upload->data();

                    $name = $result['upload']['file_name'];
                    $data['file_rapor_siswa'] = $path . $name;
                } else {
                    $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf!, Silahkan upload File Rapor Siswa berformat PDF dan Filezise < 5Mb."));
                    redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf!, Upload File Rapor Siswa diperlukan."));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
            }

            $update_rapor = $this->HomeroomTeacherModel->update_report_student($id, $data);

            if ($update_rapor == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, File Rapor Siswa <b>'" . strtoupper($data['nama_siswa']) . "'</b>  telah Anda Update."));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf!, Terjadi kesalahan, Silahkan input ulang.'));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_report/' . paramEncrypt($id_kelas)); //folder, controller, method
            }
        }
    }

    public function add_presence_student($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_kelas = paramDecrypt($data["id_kelas"]);

        $this->form_validation->set_rules('sakit', 'Total Sakit', 'required');
        $this->form_validation->set_rules('izin', 'Total Izin', 'required');
        $this->form_validation->set_rules('alpha', 'Total Alpha', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_presence/' . paramEncrypt($id_kelas)); //folder, controller, method
        } else {

            $insert_presence = $this->HomeroomTeacherModel->update_presence_student($id, $data);

            if ($insert_presence == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Absensi Siswa <b>'" . strtoupper($data['nama_siswa']) . "'</b>  telah Anda inputkan."));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_presence/' . paramEncrypt($id_kelas)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf!, Terjadi kesalahan.'));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_presence/' . paramEncrypt($id_kelas)); //folder, controller, method
            }
        }
    }

    public function edit_presence_student($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_kelas = paramDecrypt($data["id_kelas"]);

        $this->form_validation->set_rules('sakit', 'Total Sakit', 'required');
        $this->form_validation->set_rules('izin', 'Total Izin', 'required');
        $this->form_validation->set_rules('alpha', 'Total Alpha', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_presence/' . paramEncrypt($id_kelas)); //folder, controller, method
        } else {

            $insert_presence = $this->HomeroomTeacherModel->update_presence_student($id, $data);

            if ($insert_presence == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Absensi Siswa <b>'" . strtoupper($data['nama_siswa']) . "'</b>  telah Anda update."));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_presence/' . paramEncrypt($id_kelas)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf!, Terjadi kesalahan.'));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_presence/' . paramEncrypt($id_kelas)); //folder, controller, method
            }
        }
    }

    public function choose_student_class($id = '') {
        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_kelas = paramDecrypt($data["id_kelas_homeroom"]);
        $id_siswa = paramDecrypt($data["id_siswa"]);

        $this->form_validation->set_rules('id_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_grade/' . paramEncrypt($id_kelas)); //folder, controller, method
        } else {

            $choose_class = $this->HomeroomTeacherModel->update_student_class($id_siswa, $data);

            $student = $this->HomeroomTeacherModel->get_student_by_id($id_siswa);
            $tahun_ajaran = $this->HomeroomTeacherModel->get_schoolyear();
            $id_pegawai = $this->HomeroomTeacherModel->get_class_by_id($data["id_kelas"]);

            for ($z = 0; $z < count($tahun_ajaran); $z++) {

                $create_report[] = array('id_siswa' => $id_siswa, 'id_kelas' => $data["id_kelas"], 'id_tingkat' => $student[0]->id_tingkat, 'level_tingkat' => $student[0]->level_tingkat, 'id_pegawai' => $id_pegawai[0]->id_pegawai, 'th_ajaran' => $tahun_ajaran[$z]->id_tahun_ajaran);
                $create_presence[] = array('id_siswa' => $id_siswa, 'id_kelas' => $data["id_kelas"], 'id_tingkat' => $student[0]->id_tingkat, 'level_tingkat' => $student[0]->level_tingkat, 'id_pegawai' => $id_pegawai[0]->id_pegawai, 'th_ajaran' => $tahun_ajaran[$z]->id_tahun_ajaran);
            }

            if ($choose_class == true) {

                $this->HomeroomTeacherModel->setBatchImportReport($create_report);
                $this->HomeroomTeacherModel->importReport();
                $this->HomeroomTeacherModel->setBatchImportPresence($create_presence);
                $this->HomeroomTeacherModel->importPresence();

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Perpindahan Siswa <b>'" . strtoupper($data['nama_siswa']) . "'</b>  telah Anda dipindahakan."));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_grade/' . paramEncrypt($id_kelas)); //folder, controller, method
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf!, Terjadi kesalahan.'));
                redirect('employee/employe/homeroomteacher/list_student_homeroom_teacher_grade/' . paramEncrypt($id_kelas)); //folder, controller, method
            }
        }
    }

    public function pass_grade_student() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_siswa = paramDecrypt($data['id_siswa']);

        $student = $this->HomeroomTeacherModel->get_student_by_id($id_siswa);

        $check_grade = $this->HomeroomTeacherModel->check_grade_student($student[0]->id_tingkat, $student[0]->level_tingkat);

        if ($check_grade) {

            $pass = $this->HomeroomTeacherModel->pass_student_by_id($id_siswa, $check_grade[0]->id_tingkat, $check_grade[0]->level_tingkat, 1, $student[0]->id_kelas);

            if ($pass == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Siswa <b>'" . strtoupper($student[0]->nama_lengkap) . '-' . strtoupper($student[0]->nisn) . "'</b> Telah Naik Kelas."));
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
            }
        } else {

            $pass = $this->HomeroomTeacherModel->pass_student_by_id($id_siswa, $student[0]->id_tingkat, $student[0]->level_tingkat, 2, 0);

            if ($pass == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Siswa <b>'" . strtoupper($student[0]->nama_lengkap) . '-' . strtoupper($student[0]->nisn) . "'</b> Telah Lulus."));
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
            }
        }
    }

    public function release_student_class() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_kelas = paramDecrypt($data['id_kelas']);
        $id_siswa = paramDecrypt($data['id_siswa']);

        $release = $this->HomeroomTeacherModel->release_student_by_class($id_siswa);
        $remove_presence = $this->HomeroomTeacherModel->remove_presence_by_class($id_siswa, $id_kelas);
        $remove_report = $this->HomeroomTeacherModel->remove_report_by_class($id_siswa, $id_kelas);

        $student = $this->HomeroomTeacherModel->get_student_by_id($id_siswa);

        $file_report_old = explode('/', $remove_report[0]->file_rapor_siswa);
        $file_report = $file_report_old[3];

        if ($release == true && $remove_presence == true && $remove_report == true) {
            $this->delete_report_file($file_report);

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Siswa <b>'" . strtoupper($student[0]->nama_lengkap) . '-' . strtoupper($student[0]->nisn) . "'</b> Telah Dikeluarkan."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
        }
    }

    public function delete_report_file($name = '') {
        $path = 'uploads/rapor/files/';
        @unlink($path . $name);
    }

    public function add_ajax_class($level_tingkat = '') {

        $query = $this->db->get_where('kelas', array('level_tingkat' => $level_tingkat));
        $data = "<option value=''>Pilih Kelas</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_kelas . "'>" . strtoupper(strtolower($value->nama_kelas)) . "</option>";
        }
        echo $data;
    }

    //-------------------------------------------------------------------//
}
