<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Export extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-employee') == FALSE) {
            redirect('employee/auth');
        }
        $this->load->model('ExportModel');
        $this->load->library('pdfgenerator');
        $this->load->library('form_validation');
    }

    //---------------------------EKSPORT DATA MAHASISWA---------------------------------//

    public function export_present_day_csv() {
        $this->load->helper('download');

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $extension = 'csv';

        $fileName = 'HASIL_REKAP_ABSENSI_' . date('d-m-Y');

        //var_dump($data['data_check']);exit;

        if ($data['data_check'] == '' or $data['data_check'] == NULL || empty($data['data_check'] || !$data['data_check'])) {

            $this->session->set_flashdata('flash_message', warn_msg('Pilih/Centang data terlebih dahulu'));
            redirect('employee/employe/presence/list_employe_presence_all_day');
        } else {

            if (!empty($extension)) {
                $extension = $extension;
            } elseif ($extension == 'xlsx') {
                $extension = 'xlsx';
            } else {
                $extension = 'xls';
            }

            $empInfo = $this->ExportModel->get_data_export_presence_day($data['data_check']);
//            var_dump($empInfo);
//            exit;
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'NAMA PEGAWAI');
            $sheet->setCellValue('B1', 'NIP');
            $sheet->setCellValue('C1', 'TINGKAT');
            $sheet->setCellValue('D1', 'STATUS ABSENSI MASUK');
            $sheet->setCellValue('E1', 'WAKTU MASUK');
            $sheet->setCellValue('F1', 'TELAT MASUK');
            $sheet->setCellValue('G1', 'STATUS ABSENSI PULANG');
            $sheet->setCellValue('H1', 'WAKTU PULANG');
            $sheet->setCellValue('I1', 'TELAT PULANG');
            $sheet->setCellValue('J1', 'TANGGAL');
            $sheet->setCellValue('K1', 'TAHUN AJARAN');

            $rowCount = 2;

            foreach ($empInfo as $element) {

                $tingkat = '';
                if ($element['level_tingkat'] == '1') {
                    $tingkat = 'KB/TK';
                } else if ($element['level_tingkat'] == '3') {
                    $tingkat = 'SD';
                } else if ($element['level_tingkat'] == '4') {
                    $tingkat = 'SMP';
                } else if ($element['level_tingkat'] == '5') {
                    $tingkat = 'SMA';
                } else if ($element['level_tingkat'] == '6') {
                    $tingkat = 'UMUM';
                }

                $status_masuk = '';
                if ($element['status_absensi_masuk'] == '0') {
                    $status_masuk = 'BELUM ABSEN';
                } else if ($element['status_absensi_masuk'] == '1') {
                    $status_masuk = 'HADIR';
                } else if ($element['status_absensi_masuk'] == '2') {
                    $status_masuk = 'IZIN';
                } else if ($element['status_absensi_masuk'] == '3') {
                    $status_masuk = 'ALPHA';
                }

                $status_pulang = '';
                if ($element['status_absensi_pulang'] == '0') {
                    $status_pulang = 'BELUM ABSEN';
                } else if ($element['status_absensi_pulang'] == '1') {
                    $status_pulang = 'HADIR';
                } else if ($element['status_absensi_pulang'] == '2') {
                    $status_pulang = 'IZIN';
                } else if ($element['status_absensi_pulang'] == '3') {
                    $status_pulang = 'ALPHA';
                }

                $sheet->setCellValue('A' . $rowCount, $element['nama_lengkap']);
                $sheet->setCellValue('B' . $rowCount, $element['nip']);
                $sheet->setCellValue('C' . $rowCount, $tingkat);
                $sheet->setCellValue('D' . $rowCount, $status_masuk);
                $sheet->setCellValue('E' . $rowCount, $element['jam_masuk']);
                $sheet->setCellValue('F' . $rowCount, $element['jam_masuk_telat']);
                $sheet->setCellValue('G' . $rowCount, $status_pulang);
                $sheet->setCellValue('H' . $rowCount, $element['jam_pulang']);
                $sheet->setCellValue('I' . $rowCount, $element['jam_pulang_telat']);
                $sheet->setCellValue('J' . $rowCount, $element['tgl_format']);
                $sheet->setCellValue('K' . $rowCount, $element['tahun_awal'] . "/" . $element['tahun_akhir']);

                $rowCount++;
            }

            if ($extension == 'csv') {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
                $fileName = $fileName . '.csv';
            } elseif ($extension == 'xlsx') {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
                $fileName = $fileName . '.xlsx';
            } else {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
                $fileName = $fileName . '.xls';
            }

            $this->output->set_header('Content-Type: application/vnd.ms-excel');
            $this->output->set_header("Content-type: application/csv");
            $this->output->set_header('Cache-Control: max-age=0');
            header('Content-Disposition: attachment;filename="' . $fileName . '"');
            $writer->save('php://output');
        }
    }

    public function export_present_month_csv() {
        $this->load->helper('download');

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $extension = 'csv';

        $fileName = 'HASIL_REKAP_ABSENSI_' . date('d-m-Y');

        //var_dump($data['data_check']);exit;

        if ($data['data_check'] == '' or $data['data_check'] == NULL || empty($data['data_check'] || !$data['data_check'])) {

            $this->session->set_flashdata('flash_message', warn_msg('Pilih/Centang data terlebih dahulu'));
            redirect('employee/employe/presence/list_employe_presence_all_month');
        } else {

            if (!empty($extension)) {
                $extension = $extension;
            } elseif ($extension == 'xlsx') {
                $extension = 'xlsx';
            } else {
                $extension = 'xls';
            }

            $empInfo = $this->ExportModel->get_data_export_presence_month($data['data_check']);
//            var_dump($empInfo);
//            exit;
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'NAMA PEGAWAI');
            $sheet->setCellValue('B1', 'NIP');
            $sheet->setCellValue('C1', 'TINGKAT');
            $sheet->setCellValue('D1', 'TOTAL HADIR MASUK');
            $sheet->setCellValue('E1', 'TOTAL IZIN MASUK');
            $sheet->setCellValue('F1', 'TOTAL ALPHA MASUK');
            $sheet->setCellValue('G1', 'TOTAL HADIR PULANG');
            $sheet->setCellValue('H1', 'TOTAL IZIN PULANG');
            $sheet->setCellValue('I1', 'TOTAL ALPHA PULANG');
            $sheet->setCellValue('J1', 'TOTAL TELAT MASUK');
            $sheet->setCellValue('K1', 'TOTAL TELAT PULANG');
            $sheet->setCellValue('L1', 'BULAN');
            $sheet->setCellValue('M1', 'TAHUN AJARAN');

            $rowCount = 2;

            foreach ($empInfo as $element) {

                $tingkat = '';
                if ($element['level_tingkat'] == '1') {
                    $tingkat = 'KB/TK';
                } else if ($element['level_tingkat'] == '3') {
                    $tingkat = 'SD';
                } else if ($element['level_tingkat'] == '4') {
                    $tingkat = 'SMP';
                } else if ($element['level_tingkat'] == '5') {
                    $tingkat = 'SMA';
                } else if ($element['level_tingkat'] == '6') {
                    $tingkat = 'UMUM';
                }

                $sheet->setCellValue('A' . $rowCount, $element['nama_lengkap']);
                $sheet->setCellValue('B' . $rowCount, $element['nip']);
                $sheet->setCellValue('C' . $rowCount, $tingkat);
                $sheet->setCellValue('D' . $rowCount, $element['hadir_masuk']);
                $sheet->setCellValue('E' . $rowCount, $element['izin_masuk']);
                $sheet->setCellValue('F' . $rowCount, $element['alpha_masuk']);
                $sheet->setCellValue('G' . $rowCount, $element['hadir_pulang']);
                $sheet->setCellValue('H' . $rowCount, $element['izin_pulang']);
                $sheet->setCellValue('I' . $rowCount, $element['alpha_pulang']);
                $sheet->setCellValue('J' . $rowCount, $element['telat_masuk']);
                $sheet->setCellValue('K' . $rowCount, $element['telat_pulang']);
                $sheet->setCellValue('L' . $rowCount, bulanindoSQLnumber($element['bulan']));
                $sheet->setCellValue('M' . $rowCount, $element['tahun_ajaran']);

                $rowCount++;
            }

            if ($extension == 'csv') {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
                $fileName = $fileName . '.csv';
            } elseif ($extension == 'xlsx') {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
                $fileName = $fileName . '.xlsx';
            } else {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
                $fileName = $fileName . '.xls';
            }

            $this->output->set_header('Content-Type: application/vnd.ms-excel');
            $this->output->set_header("Content-type: application/csv");
            $this->output->set_header('Cache-Control: max-age=0');
            header('Content-Disposition: attachment;filename="' . $fileName . '"');
            $writer->save('php://output');
        }
    }

    public function print_eval_employe($id_kuisioner = '', $id_pegawai = '') {
        $id_pegawai = paramDecrypt($id_pegawai);
        $id_kuisioner = paramDecrypt($id_kuisioner);

        $check_no = $this->ExportModel->check_id_employe($id_pegawai);

        if ($id_pegawai == '' or $id_pegawai == NULL or $check_no == FALSE) {

            $this->session->set_flashdata('flash_message', err_msg('Maaf, Data Anda tidak ditemukan!'));
            redirect('employee/employe/report/detail_result_questionnaire/' . paramEncrypt($id_kuisioner));
        } else {

            $data['questionnaire'] = $this->ExportModel->get_questionnaire_by_id($id_kuisioner); //?   
            $data['question'] = $this->ExportModel->get_all_answer_by_id($id_kuisioner, $id_pegawai); //?
            $data['question_sum'] = $this->ExportModel->get_all_answer_sum_by_id($id_kuisioner, $id_pegawai); //?         
            $data['pegawai'] = $this->ExportModel->get_employe_by_id($id_pegawai);
            $data['penilaian'] = $this->ExportModel->get_eval_by_id_employe($id_kuisioner, $id_pegawai);
            $data['kepsek'] = $this->ExportModel->get_kepsek($data['pegawai'][0]->level_tingkat);

            $data['page'] = $this->ExportModel->get_page();
            $data['contact'] = $this->ExportModel->get_contact();

            if ($data['penilaian'] == NULL or $data['penilaian'][0]->status_penilaian_personal == 0 or $data['penilaian'][0]->status_penilaian_sejawat == 0 or $data['penilaian'][0]->status_penilaian_atasan == 0) {
                //add new data
                $this->session->set_flashdata('flash_message', err_msg('Maaf,Hasil Penilaian pegawai masih belum lengkap'));
                redirect('employee/employe/report/detail_questionnaire_all/' . paramEncrypt($id_kuisioner));
            } else {

                $html = $this->load->view('pdf_template/eval_report', $data, true);
                $this->pdfgenerator->generate($html, $data['pegawai'][0]->nama_lengkap . "_" . $data['pegawai'][0]->nip . '_rapor_penilian_pegawai', 1, '', TRUE, 'A4', 'potrait');
            }
        }
    }

    //-----------------------------------------------------------------------//
//
}
