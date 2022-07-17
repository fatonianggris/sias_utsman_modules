<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-students') == FALSE) {
            redirect('students/auth');
        }
        $this->user_students = $this->session->userdata("sias-students");
        $this->load->model('AccountModel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DATA AKUN ADMIN------------------------------//
    //
    
    public function check_nisn_student() {
        $id = $this->input->post('id');
        $nisn = $this->input->post('nisn');

        $check = $this->AccountModel->get_nisn_student($nisn);
        $check_old = $this->AccountModel->get_account_id($id);

        if ($check == TRUE && $id == NULL) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nisn != $nisn) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nisn == $nisn) {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == FALSE) {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        }
    }

    public function edit_email_password() {

        $data['title'] = 'Sistem Akademik | Sekolah Utsman ';
        $data['account'] = $this->AccountModel->get_account_id($this->user_students[0]->id_siswa); //? 
        $data['contact'] = $this->AccountModel->get_contact();
        $data['page'] = $this->AccountModel->get_page();

        $check = $this->AccountModel->get_account_id($this->user_students[0]->id_siswa);

        if ($check == FALSE or empty($this->user_students[0]->id_siswa)) {
            $this->load->view('error_404', $data);
        } else {
            $this->load->view('student_edit_email_password', $data);
        }
    }

    public function edit_student_biodata() {

        $data['title'] = 'Sistem Akademik | Sekolah Utsman ';

        $data['contact'] = $this->AccountModel->get_contact();
        $data['page'] = $this->AccountModel->get_page();
        $data['provinsi'] = $this->AccountModel->get_provinsi();
        $data['schoolyear'] = $this->AccountModel->get_schoolyear();

        $data['student'] = $this->AccountModel->get_detail_student($this->user_students[0]->id_siswa); //? 

        $check = $this->AccountModel->get_account_id($this->user_students[0]->id_siswa);

        if ($check == FALSE or empty($this->user_students[0]->id_siswa)) {
            $this->load->view('error_404', $data);
        } else {
            $this->load->view('student_edit_biodata', $data);
        }
    }

    public function update_student_biodata() {
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');

        $id = $this->user_students[0]->id_siswa;

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nik', 'NIK Siswa', 'required');
        $this->form_validation->set_rules('no_akta_kelahiran', 'Nomor Akta Siswa', 'required');
        $this->form_validation->set_rules('nisn', 'NISN Siswa', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap Siswa', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir Siswa', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir Siswa', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('nomor_handphone', 'Nomor Handphone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('th_ajaran', 'Tahun Ajaran', 'required');

        $this->form_validation->set_rules('nama_ayah', 'Nama', 'required');
        $this->form_validation->set_rules('nik_ayah', 'NIK', 'required');
        $this->form_validation->set_rules('tempat_lahir_ayah', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir_ayah', 'Tanggal Lahir ID', 'required');
        $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan', 'required');
        $this->form_validation->set_rules('penghasilan_ayah', 'Penghasilan', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('nik_ibu', 'NIK Ibu', 'required');
        $this->form_validation->set_rules('tempat_lahir_ibu', 'Tempat Lahir Ibu', 'required');
        $this->form_validation->set_rules('tanggal_lahir_ibu', 'Tanggal Lahir Ibu', 'required');
        $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('pendidikan_ibu', 'Pendidikan Ibu', 'required');
        $this->form_validation->set_rules('penghasilan_ibu', 'Penghasilan Ibu', 'required');
        $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required');
        $this->form_validation->set_rules('nik_wali', 'NIK Wali', 'required');
        $this->form_validation->set_rules('tempat_lahir_wali', 'Tempat Lahir Wali', 'required');
        $this->form_validation->set_rules('tanggal_lahir_wali', 'Tanggal Lahir Wali', 'required');
        $this->form_validation->set_rules('pekerjaan_wali', 'Pekerjaan Wali', 'required');
        $this->form_validation->set_rules('pendidikan_wali', 'Pendidikan Wali', 'required');
        $this->form_validation->set_rules('penghasilan_wali', 'Penghasilan Wali', 'required');

        $this->form_validation->set_rules('alamat_rumah_kk', 'Alamat Rumah KK', 'required');
        $this->form_validation->set_rules('provinsi_kk', 'Provinsi KK', 'required');
        $this->form_validation->set_rules('kabupaten_kota_kk', 'Kabupaten/Kota KK', 'required');
        $this->form_validation->set_rules('kecamatan_kk', 'Kecamatan KK', 'required');
        $this->form_validation->set_rules('kelurahan_desa_kk', 'Kelurahan/Desa KK', 'required');
        $this->form_validation->set_rules('rt_kk', 'RT KK', 'required');
        $this->form_validation->set_rules('rw_kk', 'RW KK', 'required');
        $this->form_validation->set_rules('kodepos_kk', 'Kodepos KK', 'required');

        $this->form_validation->set_rules('alamat_rumah_dom', 'Alamat Rumah Domisili', 'required');
        $this->form_validation->set_rules('provinsi_dom', 'Provinsi Domisili', 'required');
        $this->form_validation->set_rules('kabupaten_kota_dom', 'Kabupaten/Kota Domisili', 'required');
        $this->form_validation->set_rules('kecamatan_dom', 'Kecamatan Domisili', 'required');
        $this->form_validation->set_rules('kelurahan_desa_dom', 'Kelurahan/Desa Domisili', 'required');
        $this->form_validation->set_rules('rt_dom', 'RT Domisili', 'required');
        $this->form_validation->set_rules('rw_dom', 'RW Domisili', 'required');
        $this->form_validation->set_rules('kodepos_dom', 'Kodepos Domisili', 'required');

        $this->form_validation->set_rules('alat_transportasi', 'Alat Transportasi', 'required');
        $this->form_validation->set_rules('jenis_tinggal', 'Jenis Tempat Tinggal', 'required');
        $this->form_validation->set_rules('jumlah_saudara', 'Jumlah Saudara', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak Ke', 'required');

        $this->form_validation->set_rules('kebutuhan_khusus', 'Berkebutuhan Khusus', 'required');

        $data['foto_siswa'] = $data['foto_siswa_temp'];
        $data['foto_siswa_thumb'] = $data['foto_siswa_temp_thumb'];

        $data['akta_kelahiran'] = $data['akta_kelahiran_temp'];
        $data['akta_kelahiran_thumb'] = $data['akta_kelahiran_temp_thumb'];

        $data['kartu_keluarga'] = $data['kartu_keluarga_temp'];
        $data['kartu_keluarga_thumb'] = $data['kartu_keluarga_temp_thumb'];

        $image_old_student = explode('/', $data['foto_siswa']);
        $image_name_old_student = $image_old_student[3];

        $image_old_akta = explode('/', $data['akta_kelahiran']);
        $image_name_old_akta = $image_old_akta[3];

        $image_old_kk = explode('/', $data['kartu_keluarga']);
        $image_name_old_kk = $image_old_kk[3];

        $get_old = $this->AccountModel->get_old_student($id);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('students/dashboard/dashboard');
        } else {

            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            //foto siswa
            if (!empty($_FILES['foto_siswa']['tmp_name'])) {

                $this->delete_student_file($image_name_old_student); //delete existing file

                $path = 'uploads/student/images/';
                $path_thumb = 'uploads/student/images/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_siswa')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['foto_siswa'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 300;
                    $img['height'] = 400;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['foto_siswa_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('students/dashboard/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('students/dashboard/dashboard');
                }
            }

            //foto akta kelahiran
            if (!empty($_FILES['akta_kelahiran']['tmp_name'])) {

                $this->delete_student_file($image_name_old_akta); //delete existing file

                $path = 'uploads/student/images/';
                $path_thumb = 'uploads/student/images/thumbs/';

                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('akta_kelahiran')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['akta_kelahiran'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 1080;
                    $img['height'] = 720;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['akta_kelahiran_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('students/dashboard/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('students/dashboard/dashboard');
                }
            }

            //foto kartu keluarga
            if (!empty($_FILES['kartu_keluarga']['tmp_name'])) {

                $this->delete_student_file($image_name_old_kk); //delete existing file

                $path = 'uploads/student/images/';
                $path_thumb = 'uploads/student/images/thumbs/';

                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 3048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('kartu_keluarga')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['kartu_keluarga'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 1080;
                    $img['height'] = 720;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['kartu_keluarga_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('students/dashboard/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('students/dashboard/dashboard');
                }
            }

            if ($data['nisn'] != $get_old[0]->nisn) {

                $image_old_barcode = explode('/', $get_old[0]->foto_siswa);
                $image_name_old_barcode = $image_old_barcode[3];
                $this->delete_barcode_photo($image_name_old_barcode);

                $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $data['nisn'], 'barHeight' => 20, 'factor' => 1,), array())->draw();
                $barcode_name = $data['nisn'] . '.jpg';
                $image_dir = 'uploads/student/barcode/'; // penyimpanan file barcode              
                $data['barcode'] = $image_dir . $barcode_name;
                imagejpeg($image_resource, $image_dir . $barcode_name);
            }

            $edit = $this->AccountModel->update_student($id, $data);
            if ($edit == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Data Siswa '$data[nama_lengkap]' ('$data[nisn]') Telah diupdate.."));
                redirect('students/dashboard/dashboard');
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                redirect('students/dashboard/dashboard');
            }
        }
    }

    public function update_email_password() {
        $id = $this->user_students[0]->id_siswa;

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        if (@$data['password'] != '' or @ $data['password'] != NULL) {
            $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
            $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('students/settings/account/edit_email_password');
            } else {
                $this->AccountModel->update_password($id, $data['password']);
            }
        }

        $edit = $this->AccountModel->update_email_password($id, $data);
        if ($edit == true) {

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email/Password Akun Anda Telah diupdate."));
            redirect('students/settings/account/edit_email_password');
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang.'));
            redirect('students/settings/account/edit_email_password');
        }
    }

    //---------------------------------------DELETE FILE---------------------------------------//

    public function delete_student_file($name = '') {
        $path = 'uploads/student/images/';
        $path_thumb = 'uploads/student/images/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    public function delete_barcode_photo($name = '') {
        $path = 'uploads/student/barcode/';
        @unlink($path . $name);
    }

    //---------------------------------------GET AJAX CLASS---------------------------------------//

    public function add_ajax_grade($id_grad_lvl = '', $id_grad = '') {

        $query = $this->db->get_where('tingkat', array('level_tingkat' => $id_grad_lvl));
        $data = "<option value=''>Pilih Tingkat</option>";
        foreach ($query->result() as $value) {
            if ($id_grad != '' || $id_grad != NULL) {
                if ($id_grad == $value->id_tingkat) {
                    $data .= "<option selected value='" . $value->id_tingkat . "'>" . strtoupper($value->nama_tingkat) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id_tingkat . "'>" . strtoupper($value->nama_tingkat) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id_tingkat . "'>" . strtoupper($value->nama_tingkat) . "</option>";
            }
        }
        echo $data;
    }

    //---------------------------------------GET AJAX WILAYAH---------------------------------------//

    public function add_ajax_kab($id_prov = '', $id_kab = '') {

        $query = $this->db->get_where('wilayah_kabupaten', array('id_dati1' => $id_prov));
        $data = "<option ></option>";
        foreach ($query->result() as $value) {
            if ($id_kab != '' || $id_kab != NULL) {
                if ($id_kab == $value->id) {
                    $data .= "<option selected value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . " [" . strtoupper($value->administratif) . "]" . "</option>";
                } else {
                    $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . " [" . strtoupper($value->administratif) . "]" . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . " [" . strtoupper($value->administratif) . "]" . "</option>";
            }
        }
        echo $data;
    }

    function add_ajax_kec($id_prov = '', $id_kab = '', $id_kec = '') {

        $query = $this->db->get_where('wilayah_kecamatan', array('id_dati1' => $id_prov, 'id_dati2' => $id_kab));
        $data = "<option></option>";
        foreach ($query->result() as $value) {
            if ($id_kec != '' || $id_kec != NULL) {
                if ($id_kec == $value->id) {
                    $data .= "<option selected value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
            }
        }
        echo $data;
    }

    function add_ajax_des($id_prov = '', $id_kab = '', $id_kec = '', $id_des = '') {
        $query = $this->db->get_where('wilayah_desa', array('id_dati1' => $id_prov, 'id_dati2' => $id_kab, 'id_dati3' => $id_kec));
        $data = "<option></option>";
        foreach ($query->result() as $value) {
            if ($id_des != '' || $id_des != NULL) {
                if ($id_des == $value->id) {
                    $data .= "<option selected value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . " [" . strtoupper($value->administratif) . "]" . "</option>";
                } else {
                    $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . " [" . strtoupper($value->administratif) . "]" . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . " [" . strtoupper($value->administratif) . "]" . "</option>";
            }
        }
        echo $data;
    }

    //------------------------------------------------------------------------------//
}
