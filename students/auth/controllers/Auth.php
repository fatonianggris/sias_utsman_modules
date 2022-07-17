<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('AuthModel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------AUTH------------------------------//
    //

    public function index()
    {
        if ($this->session->userdata('sias-students') == TRUE) {
            redirect('students/dashboard');
        }
        $data['title'] = 'Login SIAS | Sekolah Utsman';
        $data['page'] = $this->AuthModel->get_page();
        $this->load->view('students_auth_login', $data);
    }

    public function login()
    {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        $userIp = $this->input->ip_address();

        $this->form_validation->set_rules('nomor_pembayaran_dpb', 'Nomor Pembayaran', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('students/auth');
        } else {
            $cek_user = $this->AuthModel->check_nomor_student($data);
            $data_user = $this->AuthModel->data_student($data);

            if ($cek_user) {

                if (password_verify(paramEncrypt($data['password']), $cek_user[0]->password)) {

                    if ($this->googleCaptachStore($recaptchaResponse, $userIp) == 1) {

                        $this->session->set_userdata('sias-students', $data_user);
                        redirect('students/dashboard');
                    } else {

                        $this->session->set_flashdata('flash_message', err_msg('Maaf, Google Recaptcha terdapat kesalahan.'));
                        redirect('students/auth');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', login_err('Mohon Maaf., Password anda salah!'));
                    redirect('students/auth');
                }
            } else {
                $this->session->set_flashdata('flash_message', login_err('Mohon Maaf., Nomor Pembayaran tidak ditemukan!'));
                redirect('students/auth');
            }
        }
    }

    public function reset_password()
    {
        $nomor = $this->input->post('nomor_pembayaran');
        $check_nomor = $this->AuthModel->check_nomor_pembayaran_student($nomor);

        if ($check_nomor == true) {
            $this->accept_reset_password($nomor, $check_nomor[0]->email);
        } else {
            echo '0';
        }
    }

    public function accept_reset_password($nomor = '', $email = '')
    {

        $data['page'] = $this->AuthModel->get_page();
        $data['contact'] = $this->AuthModel->get_contact();
        $data['email'] = $email;
        $data['password'] = mt_rand(100000, 999999);

        $subjek = "RESET PASSWORD AKUN DENGAN NOMOR (" . $nomor . ")";
        $content = $this->load->view('mailer_template/reset_password', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $email,
            'subjek' => $subjek,
            'content' => $content,
        );

        if ($nomor) {
            $this->AuthModel->reset_account_password($nomor, $data['password']);
            $this->mailer->send($sendmail);
            echo '1';
        } else {
            echo '0';
        }

        // Panggil fungsi send yang ada di librari Mailer
    }

    public function googleCaptachStore($gpost = '', $ip_address = '')
    {

        $recaptchaResponse = $gpost;

        $userIp = $ip_address;
        $secret = $this->config->item('google_secret_key');
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $status = json_decode($output, true);

        if ($status['success']) {
            return 1;
        } else {
            return 0;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('sias-students');

        redirect('students/auth');
    }

    //----------------------------------------------------------------//
}
