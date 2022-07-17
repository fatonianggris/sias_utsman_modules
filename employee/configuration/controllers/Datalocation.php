<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class DataLocation extends REST_Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model('ApiLocationModel');
    }

    /**
     * Api store location office.
     *
     * @return void
     */
    public function storeLocation_post() {
        $lat = $this->input->post('lat');
        $longt = $this->input->post('longt');

        $cleanPost['lat'] = $lat;
        $cleanPost['longt'] = $longt;

        // Store the location
        $store = $this->ApiLocationModel->insertLocation($cleanPost);
        // Check is stored
        if ($store) {
            $data = [
                'message' => 'success',
            ];
        } else {
            $data = [
                'message' => 'error',
            ];
        }
        // Return the result
        $this->response($data, REST_Controller::HTTP_OK);
    }

    /**
     * Api delete location office.
     *
     * @return void
     */
    public function deleteLocationTable_post() {
        // Delete the location
        $this->ApiLocationModel->deleteTableLocation();
    }

    /**
     * Api get the location office.
     *
     * @return void
     */
    public function showAllDataLocation_get() {
        $data = $this->ApiLocationModel->getLocationArea();
        // Return the json
        $this->response($data, REST_Controller::HTTP_OK);
    }

    /**
     * Api store the md5 location office.
     *
     * @return void
     */
    public function storeMd5Location_post() {
        $md5 = $this->input->post('md5');
        $hashMd5 = md5($md5);

        $cleanPost['md5'] = $hashMd5;
        // Store new md5
        $this->ApiLocationModel->insertMd5($cleanPost);
    }

    /**
     * Function get time.
     *
     * @param $total
     * @return array
     */
    public function getTime($total) {
        $hours = (int) ($total / 3600);
        $seconds_remain = ($total - ($hours * 3600));
        $minutes = (int) ($seconds_remain / 60);
        $seconds = ($seconds_remain - ($minutes * 60));
        return array($hours, $minutes, $seconds);
    }

}
