<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('ApiModel');
    }

    //
    //-------------------------------DATA AKUN ADMIN------------------------------//
    //
    
    public function send_present_in() {
        date_default_timezone_set('Asia/Jakarta');

        $data['title'] = 'Absensi | Sekolah Utsman ';
        $present_config = $this->ApiModel->get_present_config();

        $api_key = $present_config[0]->calendarific_api_key;
        $country = 'ID';
        $year = date('Y');
        $type = 'national,local,religious';
        $url = 'https://calendarific.com/api/v2/holidays?api_key=' . $api_key . '&country=' . $country . '&year=' . $year . '&type=' . $type;

        //Implementasi request get public API menggunakan CURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($result, true);
        $holiday = $data['response']['holidays'];

        $arr_holiday = array();
        foreach ($holiday as $datas) {
            $arr_holiday[] = $datas['date']['iso'];
        }

        $today = hariIndo(strtolower(date('l', strtotime(date("Y-m-d")))));
        $present = $this->ApiModel->get_present_config();

        if ($present[0]->status_absensi_calendar == 1) {
            if (in_array(date("Y-m-d"), $arr_holiday) && strcmp($today, 'MINGGU')) {
                $this->send_notification_employee("ABSEN LIBUR!", "Absen diliburkan untuk hari ini", date("Y-m-d"), base_url());
                echo "libur";
            } else {
                if ($this->ApiModel->insert_present() == TRUE) {
                    $this->send_notification_employee("ABSEN MASUK!", "Silahkan Untuk Melakukan Absen Masuk", date("Y-m-d"), base_url());
                }
                echo "masuk";
            }
        } else {
            if ($this->ApiModel->insert_present() == TRUE) {
                $this->send_notification_employee("ABSEN MASUK!", "Silahkan Untuk Melakukan Absen Masuk", date("Y-m-d"), base_url());
            }
            echo "masuk";
        }
    }

    public function send_present_out() {
        date_default_timezone_set('Asia/Jakarta');

        $data['title'] = 'Absensi | Sekolah Utsman ';
        $present_config = $this->ApiModel->get_present_config();

        $api_key = $present_config[0]->calendarific_api_key;
        $country = 'ID';
        $year = date('Y');
        $type = 'national,local,religious';
        $url = 'https://calendarific.com/api/v2/holidays?api_key=' . $api_key . '&country=' . $country . '&year=' . $year . '&type=' . $type;

        //Implementasi request get public API menggunakan CURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($result, true);
        $holiday = $data['response']['holidays'];

        $arr_holiday = array();
        foreach ($holiday as $datas) {
            $arr_holiday[] = $datas['date']['iso'];
        }

        $today = hariIndo(strtolower(date('l', strtotime(date("Y-m-d")))));
        $present = $this->ApiModel->get_present_config();

        if ($present[0]->status_absensi_calendar == 1) {
            if (in_array(date("Y-m-d"), $arr_holiday) && strcmp($today, 'MINGGU')) {
                echo "libur";
            } else {
                $this->send_notification_employee("ABSEN PULANG!", "Silahkan Untuk Melakukan Absen Pulang", date("Y-m-d"), base_url());
                echo "pulang";
            }
        } else {
            $this->send_notification_employee("ABSEN PULANG!", "Silahkan Untuk Melakukan Absen Pulang", date("Y-m-d"), base_url());
            echo "pulang";
        }
    }

    public function send_present_in_exp() {
        date_default_timezone_set('Asia/Jakarta');

        $data['title'] = 'Absensi | Sekolah Utsman';
        $present_config = $this->ApiModel->get_present_config();
        $tahun_ajaran = $this->ApiModel->get_schoolyear();

        $api_key = $present_config[0]->calendarific_api_key;
        $country = 'ID';
        $year = date('Y');
        $type = 'national,local,religious';
        $url = 'https://calendarific.com/api/v2/holidays?api_key=' . $api_key . '&country=' . $country . '&year=' . $year . '&type=' . $type;

        //Implementasi request get public API menggunakan CURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($result, true);
        $holiday = $data['response']['holidays'];

        $arr_holiday = array();
        foreach ($holiday as $datas) {
            $arr_holiday[] = $datas['date']['iso'];
        }

        $today = hariIndo(strtolower(date('l', strtotime(date("Y-m-d")))));
        $present = $this->ApiModel->get_present_config();

        if ($present[0]->status_absensi_calendar == 1) {
            if (in_array(date("Y-m-d"), $arr_holiday) && strcmp($today, 'MINGGU')) {
                echo "libur";
            } else {
                $this->send_notification_employee("ABSEN MASUK BERAKHIR!", "Masa Untuk Absen Masuk Telah Berakhir", date("Y-m-d"), base_url());
                $this->ApiModel->update_present_in_exp(date("Y-m-d"), $tahun_ajaran[0]->id_tahun_ajaran);
                echo "masuk";
            }
        } else {
            $this->send_notification_employee("ABSEN MASUK BERAKHIR!", "Masa Untuk Absen Masuk Telah Berakhir", date("Y-m-d"), base_url());
            $this->ApiModel->update_present_in_exp(date("Y-m-d"), $tahun_ajaran[0]->id_tahun_ajaran);
            echo "masuk";
        }
    }

    public function send_present_out_exp() {
        date_default_timezone_set('Asia/Jakarta');

        $data['title'] = 'Absensi | Sekolah Utsman';
        $present_config = $this->ApiModel->get_present_config();
        $tahun_ajaran = $this->ApiModel->get_schoolyear();

        $api_key = $present_config[0]->calendarific_api_key;
        $country = 'ID';
        $year = date('Y');
        $type = 'national,local,religious';
        $url = 'https://calendarific.com/api/v2/holidays?api_key=' . $api_key . '&country=' . $country . '&year=' . $year . '&type=' . $type;

        //Implementasi request get public API menggunakan CURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($result, true);
        $holiday = $data['response']['holidays'];

        $arr_holiday = array();
        foreach ($holiday as $datas) {
            $arr_holiday[] = $datas['date']['iso'];
        }

        $today = hariIndo(strtolower(date('l', strtotime(date("Y-m-d")))));
        $present = $this->ApiModel->get_present_config();

        if ($present[0]->status_absensi_calendar == 1) {
            if (in_array(date("Y-m-d"), $arr_holiday) && strcmp($today, 'MINGGU')) {
                echo "libur";
            } else {
                $this->send_notification_employee("ABSEN PULANG BERAKHIR!", "Masa Untuk Absen Pulang Telah Berakhir", date("Y-m-d"), base_url());
                $this->ApiModel->update_present_out_exp(date("Y-m-d"), $tahun_ajaran[0]->id_tahun_ajaran);
                echo "pulang";
            }
        } else {
            $this->send_notification_employee("ABSEN PULANG BERAKHIR!", "Masa Untuk Absen Pulang Telah Berakhir", date("Y-m-d"), base_url());
            $this->ApiModel->update_present_out_exp(date("Y-m-d"), $tahun_ajaran[0]->id_tahun_ajaran);
            echo "pulang";
        }
    }

    public function send_notification_employee($title = '', $ket = '', $pemohon = '', $url = '') {

        $key = $this->ApiModel->get_third_party_key(); //?   

        $data = array(
            "app_id" => $key[0]->onesignal_app_id_emp,
            "included_segments" => array('All'),
            "headings" => array(
                "en" => "$title"
            ),
            "contents" => array(
                "en" => "$ket - ($pemohon)"
            ),
            "url" => "$url"
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
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        // Variable for Print the Result
        $response = curl_exec($ch);

        curl_close($ch);

        if ($response) {
            echo '1';
        } else {
            var_dump($ch);
            exit;
            echo '0';
        }
    }

    //------------------------------------------------------------------------------//
}
