<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->load->model('ClassesModel');
        $this->load->library('form_validation');
        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //------------------------------LIST CLASS--------------------------------//
    //
     public function list_class() {

        $data['nav_master_cla'] = 'menu-item-open';
        $data['sub_nav_master_cla'] = 'menu-item-active';

        $data['class'] = $this->ClassesModel->get_class_all($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

        $this->template->load('template_employee/template_employee', 'class_list', $data);
    }

    //---------------------------------CLASS------------------------------------//

    public function post_class() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('inisial_kelas', 'Inisial Kelas', 'required');
        $this->form_validation->set_rules('id_tingkat', 'Nama Tingkat', 'required');
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');

        $check = $this->ClassesModel->check_duplicate_class(strtolower($data['nama_kelas']));

        if ($check == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Kelas '$data[nama_kelas]' Telah Tersedia."));
            redirect('employee/master/classes/list_class');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/master/classes/list_class');
            } else {

                $input = $this->ClassesModel->insert_class($data);
                if ($input == true) {

                    if ($data['id_pegawai'] != 0) {
                        $this->ClassesModel->update_homeroom_status($data['id_pegawai'], 1);
                    }
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Kelas '$data[nama_kelas]' Telah Tersimpan."));
                    redirect('employee/master/classes/list_class');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/master/classes/list_class');
                }
            }
        }
    }

    public function update_class($id = '') {

        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('inisial_kelas', 'Inisial Kelas', 'required');
        $this->form_validation->set_rules('id_tingkat', 'Nama Tingkat', 'required');
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');

        $get_old_name = $this->ClassesModel->get_old_name_class($id);
        $check = $this->ClassesModel->check_duplicate_class(strtolower($data['nama_kelas']));

        $id_pegawai = $this->ClassesModel->get_class_by_id($id);

        if ($check == TRUE && $data['nama_kelas'] != $get_old_name[0]->nama_kelas) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Kelas '$data[nama_kelas]' Telah Tersedia."));
            redirect('employee/master/classes/list_class');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/master/classes/list_class');
            } else {

                $update_report = [];
                $update_presence = [];

                $tahun_ajaran = $this->ClassesModel->get_schoolyear();

                for ($i = 0; $i < count($tahun_ajaran); $i++) {

                    $update_report[] = array('id_pegawai' => $data['id_pegawai'], 'th_ajaran' => $tahun_ajaran[$i]->id_tahun_ajaran);
                    $update_presence[] = array('id_pegawai' => $data['id_pegawai'], 'th_ajaran' => $tahun_ajaran[$i]->id_tahun_ajaran);
                }

                $this->ClassesModel->update_presence_batch($id, $update_presence);
                $this->ClassesModel->update_report_batch($id, $update_report);

                if ($data['id_pegawai'] == 0) {
                    $this->ClassesModel->update_homeroom_status($id_pegawai[0]->id_pegawai, 0);
                } else {
                    $this->ClassesModel->update_homeroom_status($data['id_pegawai'], 1);
                }

                $edit = $this->ClassesModel->update_class($id, $data);
                if ($edit == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Kelas '$data[nama_kelas]' Telah Terupdate."));
                    redirect('employee/master/classes/list_class');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/master/classes/list_class');
                }
            }
        }
    }

    public function delete_class() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old_name = $this->ClassesModel->get_old_name_class($id);
        $delete = $this->ClassesModel->delete_class($id);

        if ($delete == true) {

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Kelas '$get_old_name[0]->nama_kelas' Telah Terhapus."));
            redirect('employee/master/classes/list_class');
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
            redirect('employee/master/classes/list_class');
        }
    }

    //---------------------------------------------------------------//
}
