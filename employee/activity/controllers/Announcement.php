<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        // Load Library
        $this->load->model('AnnouncementModel');
        $this->load->library('form_validation');
    }

    //--------------------------LIST ANNOUNCEMENT----------------------------//

    public function list_announcement() {

        $data['nav_activity_dsanoun'] = 'menu-item-open';
        $data['sub_nav_activity_dsanoun'] = 'menu-item-active';
        $data['announcement'] = $this->AnnouncementModel->get_announcement_all();
        $this->template->load('template_employee/template_employee', 'announcement_list', $data);
    }

    public function post_announcement() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Pengumuman', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Pengumuman', 'required');

        $status = '';
        if ($data['kategori'] == 1) {
            $status = "RENDAH";
        } elseif ($data['kategori'] == 2) {
            $status = "NORMAL";
        } elseif ($data['kategori'] == 3) {
            $status = "PENTING";
        }

        $th_now = $this->AnnouncementModel->get_schoolyear_now();
        $data['th_ajaran'] = $th_now[0]->id_tahun_ajaran;

        $check = $this->AnnouncementModel->check_duplicate_announcement(strtolower($data['judul_pengumuman']));

        if ($check == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Judul Pengumuman '$data[judul_pengumuman]' Telah Tersedia."));
            redirect('employee/activity/announcement/list_announcement');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/activity/announcement/list_announcement');
            } else {

                $input = $this->AnnouncementModel->insert_announcement($data);
                if ($input == true) {
                    if ($data['tujuan'] == 1) {
                        $this->send_notification_student("PENGUMUMAN SEKOLAH!", $data['judul_pengumuman'], $status);
                    } else {
                        $this->send_notification_employee("PENGUMUMAN SEKOLAH!", $data['judul_pengumuman'], $status);
                    }
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Judul Pengumuman '$data[judul_pengumuman]' Telah Tersimpan."));
                    redirect('employee/activity/announcement/list_announcement');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/activity/announcement/list_announcement');
                }
            }
        }
    }

    public function update_announcement($id = '') {

        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Pengumuman', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Pengumuman', 'required');

        $get_old_name = $this->AnnouncementModel->get_old_name_announcement($id);
        $check = $this->AnnouncementModel->check_duplicate_announcement(strtolower($data['judul_pengumuman']));

        if ($check == TRUE && $data['judul_pengumuman'] != $get_old_name[0]->judul_pengumuman) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Judul Pengumuman '$data[judul_pengumuman]' Telah Tersedia."));
            redirect('employee/activity/announcement/list_announcement');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/activity/announcement/list_announcement');
            } else {

                $edit = $this->AnnouncementModel->update_announcement($id, $data);
                if ($edit == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Judul Pengumuman '$data[judul_pengumuman]' Telah Terupdate."));
                    redirect('employee/activity/announcement/list_announcement');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
                    redirect('employee/activity/announcement/list_announcement');
                }
            }
        }
    }

    public function delete_announcement() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old_name = $this->AnnouncementModel->get_old_name_announcement($id);
        $delete = $this->AnnouncementModel->delete_announcement($id);

        if ($delete == true) {

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Judul Pengumuman '" . $get_old_name[0]->judul_pengumuman . "' Telah Terhapus."));
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
        }
    }

    public function send_notification_employee($title = '', $ket = '', $pemohon = '') {

        $key = $this->AnnouncementModel->get_third_party_key(); //?   

        $data = array(
            "app_id" => $key[0]->onesignal_app_id_emp,
            "included_segments" => array('All'),
            "headings" => array(
                "en" => "$title"
            ),
            "contents" => array(
                "en" => "$ket - ($pemohon)"
            ),
        );

        // Print Output in JSON Format
        $data_string = json_encode($data);

        // API URL
        $url = "https://onesignal.com/api/v1/notifications";

        //Curl Headers
        $headers = array
            (
            "Authorization: Basic " . $key[0]->onesignal_auth_emp . "",
            "Content-Type: application/json; charset = utf-8"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        // Variable for Print the Result
        $response = curl_exec($ch);

        curl_close($ch);

        if ($response) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function send_notification_student($title = '', $ket = '', $pemohon = '') {

        $key = $this->AnnouncementModel->get_third_party_key(); //?   

        $data = array(
            "app_id" => $key[0]->onesignal_app_id_stu,
            "included_segments" => array('All'),
            "headings" => array(
                "en" => "$title"
            ),
            "contents" => array(
                "en" => "$ket - ($pemohon)"
            ),
        );

        // Print Output in JSON Format
        $data_string = json_encode($data);

        // API URL
        $url = "https://onesignal.com/api/v1/notifications";

        //Curl Headers
        $headers = array
            (
            "Authorization: Basic " . $key[0]->onesignal_auth_stu . "",
            "Content-Type: application/json; charset = utf-8"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        // Variable for Print the Result
        $response = curl_exec($ch);

        curl_close($ch);

        if ($response) {
            echo '1';
        } else {
            echo '0';
        }
    }

    //---------------------------------------------------------------//
}
