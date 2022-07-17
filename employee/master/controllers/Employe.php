<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }

        $this->load->model('EmployeModel');
        $this->load->library('form_validation');
        $this->usr_employee = $this->session->userdata("sias-employee");
    }

    //
    //------------------------------LIST EMPLOYEE--------------------------------//
    //
    
     public function list_employe() {

        $data['nav_master_emp'] = 'menu-item-open';
        $data['sub_nav_master_emp'] = 'menu-item-active';

        $data['employe'] = $this->EmployeModel->get_employe_all($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);
        $data['position'] = $this->EmployeModel->get_position($this->usr_employee[0]->level_jabatan, $this->usr_employee[0]->level_tingkat);

        $this->template->load('template_employee/template_employee', 'employe_list', $data);
    }

    //------------------------------EMPLOYE----------------------------------//
    //
    
    public function check_nik_employee() {
        $id = $this->input->post('id');
        $nik = $this->input->post('nik');

        $check = $this->EmployeModel->get_nik_employe($nik);
        $check_old = $this->EmployeModel->get_old_employe($id);

        if ($check == TRUE && $id == NULL) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nik != $nik) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nik == $nik) {
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

    public function check_nip_employee() {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');

        $check = $this->EmployeModel->get_nip_employe($nip);
        $check_old = $this->EmployeModel->get_old_employe($id);

        if ($check == TRUE && $id == NULL) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nip != $nip) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nip == $nip) {
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

    public function add_employe() {

        $data['nav_master_emp'] = 'menu-item-open';
        $data['sub_nav_master_emp_add'] = 'menu-item-active';
        $data['provinsi'] = $this->EmployeModel->get_provinsi();
        $data['schoolyear'] = $this->EmployeModel->get_schoolyear();
        $this->template->load('template_employee/template_employee', 'employe_add', $data);
    }

    public function edit_employe($id = '') {

        $id = paramDecrypt($id);

        $data['employe'] = $this->EmployeModel->get_detail_employe($id); //?
        $data['provinsi'] = $this->EmployeModel->get_provinsi();
        $data['schoolyear'] = $this->EmployeModel->get_schoolyear();

        $check = $this->EmployeModel->get_employe_id($id);

        if ($check == FALSE or empty($check)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_employee/template_employee', 'employe_edit', $data);
        }
    }

    public function post_employe() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nik', 'NISN Pegawai', 'required');
        // $this->form_validation->set_rules('nip', 'NIP Pegawai', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap Pegawai', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tanggal Lahir Pegawai', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Agama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Nomor Handphone', 'required');
        $this->form_validation->set_rules('agama', 'Email', 'required');
        $this->form_validation->set_rules('warga_negara', 'Warga Negara', 'required');
        $this->form_validation->set_rules('status_nikah', 'Status Nikah', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        // $this->form_validation->set_rules('spesialisasi', 'Spesialisasi Lulusan', 'required');
        $this->form_validation->set_rules('jumlah_anak', 'Jumlah Anak', 'required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamata Lengkap', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kelurahan_desa', 'Kelurahan/Desa', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor Handphone', 'required');
        // $this->form_validation->set_rules('jam_pelajaran', 'Jam Pelajaran', 'required');
        $this->form_validation->set_rules('jenis_pegawai', 'Jenis Pegawai', 'required');
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan Pegawai', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[cf_password]');
        $this->form_validation->set_rules('cf_password', 'Password Konfirmasi', 'required');
        $this->form_validation->set_rules('th_ajaran', 'Tahun Ajaran', 'required');

        $check = $this->EmployeModel->check_duplicate_nik(strtolower($data['nik']));

        if ($check == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, NIK Pegawai '$data[nama_lengkap]' Telah Terpakai."));
            redirect('employee/master/employe/add_employe');
        } else {
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('employee/master/employe/add_employe'); //folder, controller, method
            } else {
                if ($data['password'] == $data['cf_password']) {

                    $this->load->library('upload'); //load library upload file
                    $this->load->library('image_lib'); //load library image

                    if (!empty($_FILES['foto_pegawai'])) {

                        $path = 'uploads/employe/images/';
                        $path_thumb = 'uploads/employe/images/thumbs/';

                        //config upload file
                        $config['upload_path'] = $path;
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = 1048; //set limit
                        $config['overwrite'] = FALSE; //if have same name, add number
                        $config['remove_spaces'] = TRUE; //change space into _
                        $config['encrypt_name'] = TRUE;
                        //initialize config upload
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('foto_pegawai')) {//if success upload data
                            $result['upload'] = $this->upload->data();
                            $name = $result['upload']['file_name'];
                            $data['foto_pegawai'] = $path . $name;

                            $img['image_library'] = 'gd2';
                            $img['source_image'] = $path . $name;
                            $img['new_image'] = $path_thumb . $name;
                            $img['maintain_ratio'] = true;
                            $img['width'] = 600;
                            $img['height'] = 600;

                            $this->image_lib->initialize($img);

                            if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                                $data['foto_pegawai_thumb'] = $path_thumb . $name;
                            } else {

                                $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                                redirect('employee/master/employe/add_employe');
                            }
                        } else {

                            $this->session->set_flashdata('flash_message', err_msg("Maaf, Silahkan upload Foto Pegawai terlebih dahulu."));
                            redirect('employee/master/employe/add_employe');
                        }
                    }

                    $input = $this->EmployeModel->insert_employee($data);

                    if ($input == true) {
                        $this->new_account($data['nama_lengkap'], $data['email'], $data['password'], $data['level_tingkat']);
                        $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Data Pegawai '$data[nama_lengkap]' ('$data[nip]') telah tersimpan."));
                        redirect('employee/master/employe/add_employe');
                    } else {

                        $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                        redirect('employee/master/employe/add_employe');
                    }
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Password yang Anda inputkan tidak sama...'));
                    redirect('employee/master/employe/add_employe');
                }
            }
        }
    }

    public function update_employe($id = '') {

        $id = paramDecrypt($id);

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nik', 'NISN Pegawai', 'required');
        // $this->form_validation->set_rules('nip', 'NIP Pegawai', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap Pegawai', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tanggal Lahir Pegawai', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Agama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Nomor Handphone', 'required');
        $this->form_validation->set_rules('agama', 'Email', 'required');
        $this->form_validation->set_rules('warga_negara', 'Warga Negara', 'required');
        $this->form_validation->set_rules('status_nikah', 'Status Nikah', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        // $this->form_validation->set_rules('spesialisasi', 'Spesialisasi Lulusan', 'required');
        $this->form_validation->set_rules('jumlah_anak', 'Jumlah Anak', 'required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamata Lengkap', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kelurahan_desa', 'Kelurahan/Desa', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor Handphone', 'required');
        // $this->form_validation->set_rules('jam_pelajaran', 'Jam Pelajaran', 'required');
        $this->form_validation->set_rules('jenis_pegawai', 'Jenis Pegawai', 'required');
        $this->form_validation->set_rules('level_tingkat', 'Level Tingkat', 'required');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan Pegawai', 'required');
        $this->form_validation->set_rules('th_ajaran', 'Tahun Ajaran', 'required');

        $data['foto_pegawai'] = $data['img_foto_pegawai'];
        $data['foto_pegawai_thumb'] = $data['img_foto_pegawai_thumb'];

        $image_old = explode('/', $data['img_foto_pegawai']);
        $image_name_old = $image_old[3];

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('employee/master/employe/edit_employe/' . paramEncrypt($id));
        } else {

            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image

            if (!empty($_FILES['foto_pegawai']['tmp_name'])) {

                $this->delete_employe_photo($image_name_old); //delete existing file

                $path = 'uploads/employe/images/';
                $path_thumb = 'uploads/employe/images/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 1048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_pegawai')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['foto_pegawai'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 800;
                    $img['height'] = 800;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['foto_pegawai_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('employee/master/employe/edit_employe/' . paramEncrypt($id));
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('employee/master/employe/edit_employe/' . paramEncrypt($id));
                }
            }
            if (!empty($data['password'])) {

                $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
                $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                    redirect('employee/master/employe/edit_employe/' . paramEncrypt($id));
                } else {

                    $this->EmployeModel->update_employe_password($id, $data['password']);
                }
            }

            $edit = $this->EmployeModel->update_employe($id, $data);
            if ($edit == true) {

                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Data Pegawai '$data[nama_lengkap]' ('$data[nip]') Telah diupdate.."));
                redirect('employee/master/employe/edit_employe/' . paramEncrypt($id));
            } else {

                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                redirect('employee/master/employe/edit_employe/' . paramEncrypt($id));
            }
        }
    }

    public function delete_employe() {

        $param = $this->input->post('id');
        $id = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

        $get_old = $this->EmployeModel->get_old_employe($id);
        $image_old = explode('/', $get_old[0]->foto_pegawai);
        $image_name_old = $image_old[3];

        $delete = $this->EmployeModel->delete_employe($id);

        if ($delete == true) {
            $this->delete_employe_photo($image_name_old);
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Nama Employe " . $get_old[0]->nama_lengkap . " Telah Terhapus."));
            redirect('employee/master/employe/list_employe');
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan.'));
            redirect('employee/master/employe/list_employe');
        }
    }

    public function new_account($nama = '', $email = '', $pass = '', $role = '') {

        $data['page'] = $this->EmployeModel->get_page();
        $data['contact'] = $this->EmployeModel->get_contact();
        $data['nama'] = $nama;
        $data['email'] = $email;
        $data['password'] = $pass;
        $data['role'] = $role;

        $subjek = "AKUN BARU PEGAWAI";
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

    public function delete_employe_photo($name = '') {
        $path = 'uploads/employe/images/';
        $path_thumb = 'uploads/employe/images/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
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

    //---------------------------------------GET AJAX NAME OFFICER---------------------------------------//
    public function add_ajax_homeroom($lvl_tingkat = '', $id_pegawai = '') {
        if ($id_pegawai != '' || $id_pegawai != NULL) {
            if ($lvl_tingkat == 2) {
                $query = $this->db->query("SELECT
                                            *
                                        FROM
                                            pegawai
                                        WHERE
                                            level_tingkat = 1 AND id_pegawai NOT IN(
                                        SELECT
                                            id_pegawai
                                        FROM
                                            kelas
                                        ) OR id_pegawai = $id_pegawai");
            } else {
                $query = $this->db->query("SELECT
                                            *
                                        FROM
                                            pegawai
                                        WHERE
                                            level_tingkat = $lvl_tingkat AND id_pegawai NOT IN(
                                        SELECT
                                            id_pegawai
                                        FROM
                                            kelas
                                        ) OR id_pegawai = $id_pegawai");
            }
        } else {
            if ($lvl_tingkat == 2) {
                $query = $this->db->query("SELECT
                                            *
                                        FROM
                                            pegawai
                                        WHERE
                                            level_tingkat = 1 AND id_pegawai NOT IN(
                                        SELECT
                                            id_pegawai
                                        FROM
                                            kelas
                                        )");
            } else {
                $query = $this->db->query("SELECT
                                            *
                                        FROM
                                            pegawai
                                        WHERE
                                            level_tingkat = $lvl_tingkat AND id_pegawai NOT IN(
                                        SELECT
                                            id_pegawai
                                        FROM
                                            kelas
                                        )");
            }
        }
        $data = "<option value='0'>Pilih Wali Kelas</option><option value='0'>KOSONGKAN</option>";
        foreach ($query->result() as $value) {
            if ($id_pegawai != '' || $id_pegawai != NULL) {
                if ($id_pegawai == $value->id_pegawai) {
                    $data .= "<option selected value='" . $value->id_pegawai . "'>" . strtoupper($value->nama_lengkap) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id_pegawai . "'>" . strtoupper($value->nama_lengkap) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id_pegawai . "'>" . strtoupper($value->nama_lengkap) . "</option>";
            }
        }
        echo $data;
    }

    //---------------------------------------GET AJAX POSITION---------------------------------------//
    public function add_ajax_position($id_pos = '', $id_jab = '') {

        $query = $this->db->get_where('jabatan', array('level_tingkat' => $id_pos));
        $data = "<option value=''>Pilih Jabatan</option>";
        foreach ($query->result() as $value) {
            if ($id_jab != '' || $id_jab != NULL) {
                if ($id_jab == $value->id_jabatan) {
                    $data .= "<option selected value='" . $value->id_jabatan . "'>" . strtoupper($value->hasil_nama_jabatan) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id_jabatan . "'>" . strtoupper($value->hasil_nama_jabatan) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id_jabatan . "'>" . strtoupper($value->hasil_nama_jabatan) . "</option>";
            }
        }
        echo $data;
    }

    //---------------------------------------GET AJAX WILAYAH---------------------------------------//

    public function add_ajax_kab($id_prov = '', $id_kab = '') {

        $query = $this->db->get_where('wilayah_kabupaten', array('id_dati1' => $id_prov));
        $data = "<option></option>";
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

?>
    