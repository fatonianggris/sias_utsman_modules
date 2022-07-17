<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-students') == FALSE) {
            redirect('students/auth');
        }
        // Load Library
        $this->load->model('AnnouncementModel');
        $this->load->library('form_validation');
    }

    //--------------------------LIST ANNOUNCEMENT----------------------------//

    public function list_announcement_students() {
        $data['title'] = 'Sistem Akademik Siswa | Sekolah Utsman';

        $data['contact'] = $this->AnnouncementModel->get_contact();
        $data['page'] = $this->AnnouncementModel->get_page();
        $data['schoolyear_now'] = $this->AnnouncementModel->get_schoolyear_now();
        $data['announcement'] = $this->AnnouncementModel->get_announcement_students();

        $this->load->view('list_announcement_students', $data);
    }

    //---------------------------------------------------------------//
}
