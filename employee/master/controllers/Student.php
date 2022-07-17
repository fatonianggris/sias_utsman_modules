<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->load->model('StudentModel');
        $this->load->library('form_validation');
        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //------------------------------LIST STUDENT--------------------------------//
    //
    public function list_student() {

        $data['nav_master_stu'] = 'menu-item-open';
        $data['sub_nav_master_stu'] = 'menu-item-active';
        $data['student'] = $this->StudentModel->get_students_all($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['class'] = $this->StudentModel->get_class($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['grade'] = $this->StudentModel->get_grade($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['schoolyear'] = $this->StudentModel->get_schoolyear();

        $this->template->load('template_employee/template_employee', 'student_list', $data);
    }

    //------------------------------ADD STUDENT--------------------------------//
    //

    public function check_nisn_student() {
        $id = $this->input->post('id');
        $nisn = $this->input->post('nisn');

        $check = $this->StudentModel->get_nisn_student($nisn);
        $check_old = $this->StudentModel->get_student_id($id);

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

    public function add_student() {

        $data['nav_master_stu'] = 'menu-item-open';
        $data['sub_nav_master_stu_add'] = 'menu-item-active';
        $data['provinsi'] = $this->StudentModel->get_provinsi();
        $data['schoolyear'] = $this->StudentModel->get_schoolyear();

        $this->template->load('template_employee/template_employee', 'student_add', $data);
    }

    public function edit_student($id = '') {

        $id = paramDecrypt($id);

        $data['student'] = $this->StudentModel->get_detail_student($id); //?
        $data['provinsi'] = $this->StudentModel->get_provinsi();
        $data['schoolyear'] = $this->StudentModel->get_schoolyear();

        $check = $this->StudentModel->get_student_id($id);

        if ($check == FALSE or empty($check)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_employee/template_employee', 'student_edit', $data);
        }
    }

    public function choose_student_class() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id_siswa = paramDecrypt($data["id_siswa"]);

        $this->form_validation->set_rules('id_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/student/list_student'); //folder, controller, method
        } else {

            $choose_class = $this->StudentModel->update_student_class($id_siswa, $data);

            $student = $this->StudentModel->get_student_id($id_siswa);
            $tahun_ajaran = $this->StudentModel->get_schoolyear_now();
            $id_pegawai = $this->StudentModel->get_class_by_id($data["id_kelas"]);

            for ($z = 0; $z < count($tahun_ajaran); $z++) {

                $create_report[] = array('id_siswa' => $id_siswa, 'id_kelas' => $data["id_kelas"], 'id_tingkat' => $student[0]->id_tingkat, 'level_tingkat' => $student[0]->level_tingkat, 'id_pegawai' => $id_pegawai[0]->id_pegawai, 'th_ajaran' => $tahun_ajaran[$z]->id_tahun_ajaran);
                $create_presence[] = array('id_siswa' => $id_siswa, 'id_kelas' => $data["id_kelas"], 'id_tingkat' => $student[0]->id_tingkat, 'level_tingkat' => $student[0]->level_tingkat, 'id_pegawai' => $id_pegawai[0]->id_pegawai, 'th_ajaran' => $tahun_ajaran[$z]->id_tahun_ajaran);
            }

            if ($choose_class == true) {

                $this->StudentModel->setBatchImportReport($create_report);
                $this->StudentModel->importReport();
                $this->StudentModel->setBatchImportPresence($create_presence);
                $this->StudentModel->importPresence();

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil!, Perpindahan Siswa <b>'" . strtoupper($data['nama_siswa']) . "'</b>  telah Anda dipindahakan."));
                redirect('employee/master/student/list_student');
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf!, Terjadi kesalahan.'));
                redirect('employee/master/student/list_student');
            }
        }
    }

    public function post_student() {
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');

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
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');
        $this->form_validation->set_rules('id_tingkat', 'Tingkat Siswa', 'required');
        $this->form_validation->set_rules('jalur', 'Jalur Siswa', 'required');
        $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
        $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/student/add_student'); //folder, controller, method
        } else {
            if ($data['password'] == $data['cf_password']) {

                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image
                //foto siswa

                if (!empty($_FILES['foto_siswa']['name'])) {

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
                            redirect('employee/master/student/add_student');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg("Maaf, Silahkan upload Foto Siswa terlebih dahulu."));
                        redirect('employee/master/student/add_student');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', err_msg("Maaf, Upload Pas Foto 3X4 diperlukan."));
                    redirect('employee/master/student/add_student');
                }

                //foto akta kelahiran
                if (!empty($_FILES['akta_kelahiran']['name'])) {

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
                            redirect('employee/master/student/add_student');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg("Maaf, Silahkan upload Foto Akta Kelahiran terlebih dahulu."));
                        redirect('employee/master/student/add_student');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', err_msg("Maaf, Upload Foto Akta Kelahiran diperlukan."));
                    redirect('employee/master/student/add_student');
                }

                //foto kartu keluarga
                if (!empty($_FILES['kartu_keluarga']['name'])) {

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
                            redirect('employee/master/student/add_student');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg("Maaf, Silahkan upload Foto Kartu Keluarga terlebih dahulu."));
                        redirect('employee/master/student/add_student');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', err_msg("Maaf, Upload Foto Kartu Keluarga diperlukan."));
                    redirect('employee/master/student/add_student');
                }

                if (!empty($data['nisn'])) {

                    $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $data['nisn'], 'barHeight' => 20, 'factor' => 1,), array())->draw();
                    $barcode_name = $data['nisn'] . '.jpg';
                    $image_dir = 'uploads/student/barcode/'; // penyimpanan file barcode              
                    $data['barcode'] = $image_dir . $barcode_name;
                    imagejpeg($image_resource, $image_dir . $barcode_name);
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Generate Barcode terjadi kesalahan...'));
                    redirect('employee/master/student/add_student');
                }

                $input = $this->StudentModel->insert_student($data);

                if ($input == true) {

                    $this->new_account($data['nama_lengkap'], $data['email'], $data['password'], $data['level_tingkat']);
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Data Siswa '$data[nama_lengkap]' ('$data[nisn]')  telah tersimpan."));
                    redirect('employee/master/student/add_student');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('employee/master/student/add_student');
                }
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Password yang Anda inputkan tidak sama...'));
                redirect('employee/master/student/add_student');
            }
        }
    }

    public function update_student($id = '') {
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');

        $id = paramDecrypt($id);

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
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');
        $this->form_validation->set_rules('id_tingkat', 'Tingkat Siswa', 'required');
        $this->form_validation->set_rules('jalur', 'Jalur Siswa', 'required');

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

        $get_old = $this->StudentModel->get_old_student($id);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/student/edit_student/' . paramEncrypt($id));
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
                        redirect('employee/master/student/edit_student/' . paramEncrypt($id));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('employee/master/student/edit_student/' . paramEncrypt($id));
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
                        redirect('employee/master/student/edit_student/' . paramEncrypt($id));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('employee/master/student/edit_student/' . paramEncrypt($id));
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
                        redirect('employee/master/student/edit_student/' . paramEncrypt($id));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('employee/master/student/edit_student/' . paramEncrypt($id));
                }
            }

            if (!empty($data['password'])) {

                $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
                $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                    redirect('employee/master/student/edit_student/' . paramEncrypt($id));
                } else {

                    $this->StudentModel->update_student_password($id, $data['password']);
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

            $edit = $this->StudentModel->update_student($id, $data);
            if ($edit == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Data Siswa '$data[nama_lengkap]' ('$data[nisn]') Telah diupdate.."));
                redirect('employee/master/student/edit_student/' . paramEncrypt($id));
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                redirect('employee/master/student/edit_student/' . paramEncrypt($id));
            }
        }
    }

    public function delete_student() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old = $this->StudentModel->get_old_student($id);

        $image_old_photo = explode('/', $get_old[0]->foto_siswa);
        $image_name_old_photo = $image_old_photo[3];

        $image_old_barcode = explode('/', $get_old[0]->foto_siswa);
        $image_name_old_barcode = $image_old_barcode[3];

        $delete = $this->StudentModel->delete_student($id);

        if ($delete == true) {
            $this->delete_student_file($image_name_old_photo);
            $this->delete_barcode_photo($image_name_old_barcode);
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Siswa " . $get_old[0]->nama_lengkap . " Telah Terhapus."));
            redirect('employee/master/student/list_student');
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
            redirect('employee/master/student/list_student');
        }
    }

    public function new_account($nama = '', $email = '', $pass = '', $role = '') {

        $data['page'] = $this->StudentModel->get_page();
        $data['contact'] = $this->StudentModel->get_contact();
        $data['nama'] = $nama;
        $data['email'] = $email;
        $data['password'] = $pass;
        $data['role'] = $role;

        $subjek = "AKUN BARU SISWA";
        $content = $this->load->view('mailer_template/new_account', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $email,
            'subjek' => $subjek,
            'content' => $content,
        );

        if ($email) {
            $this->mailer->send($sendmail);
            echo '1';
        } else {
            echo '0';
        }
        // Panggil fungsi send yang ada di librari Mailer
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

}
