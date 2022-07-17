<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Penilaian</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Hasil Penilaian Pegawai</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a onclick="window.history.back();" class="btn btn-light-danger font-weight-bolder btn-sm"><i class="fa fa-backward"></i>Kembali</a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <!--begin::Notice-->
            <?php echo $this->session->flashdata('flash_message'); ?>    
            <?php $user = $this->session->userdata('sias-employee'); ?>
            <!--end::Notice-->
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom" style="height: 150px;">
                        <!--begin::Body-->
                        <div class="card-body pt-5">                          
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h6 text-dark-75 text-hover-primary">
                                        <?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?>
                                        <?php if ($questionnaire[0]->tipe_penilaian == 1) { ?>
                                            <span class="label label-sm label-light-primary label-inline font-weight-bolder ml-1">
                                                FORMATIF
                                            </span>
                                        <?php } else if ($questionnaire[0]->tipe_penilaian == 2) { ?>
                                            <span class="label label-sm label-light-success label-inline font-weight-bolder ml-1">
                                                SUMATIF
                                            </span>
                                        <?php } else if ($questionnaire[0]->tipe_penilaian == 3) { ?>
                                            <span class="label label-sm label-light-warning label-inline font-weight-bolder ml-1">
                                                KEMAJUAN
                                            </span>
                                        <?php } ?>

                                    </a>
                                    <div class="text-warning font-size-xs mt-1 font-weight-bold">
                                        <?php echo (($questionnaire[0]->deskripsi_kuisioner)); ?>
                                    </div>

                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class=" col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-6" >
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000"/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">
                                        <?php echo $total_question[0]->total_pertanyaan; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Total Pertanyaan</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>

                    </div>

                </div>
                <div class=" col-xl-6">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center">
                            <div>
                                <h4 class="text-danger font-weight-bolder line-height-md mt-2">Keterangan Penilaian
                                </h4>
                                <p class="text-dark-75 font-size-sm font-weight-normal">
                                    <?php echo ucfirst(strtolower($questionnaire[0]->keterangan)); ?>
                                </p>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 13--> 
                </div>
                <div class="col-xl-12 text-center">
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact py-3" id="kt_form">
                        <div class="card-header card-title pt-2" style="justify-content: center">
                            <h2 class="card-label font-size-h2 text-center font-weight-bolder">HASIL KUISIONER PENILAIAN PEGAWAI
                                <span class="text-warning pt-2 font-size-h6 font-weight-bolder d-block"><b class="text-dark-75">PEGAWAI YANG DINILAI </b> "<?php echo strtoupper(strtolower($id_pegawai[0]->nama_lengkap)); ?>"-(<?php echo (($id_pegawai[0]->nip)); ?>)</span>
                                <div class="text-center mt-2">
                                    <div class="align-items-center font-size-sm">
                                        <span class="label label-sm label-light-success label-inline font-weight-bolder mr-2"><?php echo TanggalIndo(($questionnaire[0]->tgl_mulai)); ?></span>
                                        sampai
                                        <span class="label label-sm label-light-danger label-inline font-weight-bolder ml-2"><?php echo TanggalIndo(($questionnaire[0]->tgl_berakhir)); ?></span>
                                    </div>
                                </div>
                                <span class="font-size-h6 font-weight-bolder text-warning">STATUS PENILAIAN:</span>
                                <div class="text-center mt-2">
                                    <div class="align-items-center font-size-sm font-weight-normal">
                                        <?php if (@$penilaian[0]->status_penilaian_personal == 1) { ?>
                                            Personal: <span class="label label-sm label-light-success label-inline font-weight-bolder mr-2">TELAH DIISI</span>
                                        <?php } else { ?>
                                            Personal: <span class="label label-sm label-light-danger label-inline font-weight-bolder mr-2">BELUM DIISI</span>
                                        <?php } ?>
                                        <?php if (@$penilaian[0]->status_penilaian_sejawat == 1) { ?>
                                            Sejawat: <span class="label label-sm label-light-success label-inline font-weight-bolder mr-2">TELAH DIISI</span>
                                        <?php } else { ?>
                                            Sejawat: <span class="label label-sm label-light-danger label-inline font-weight-bolder mr-2">BELUM DIISI</span>
                                        <?php } ?>
                                        <?php if (@$penilaian[0]->status_penilaian_atasan == 1) { ?>
                                            Atasan: <span class="label label-sm label-light-success label-inline font-weight-bolder mr-2">TELAH DIISI</span>
                                        <?php } else { ?>
                                            Atasan: <span class="label label-sm label-light-danger label-inline font-weight-bolder mr-2">BELUM DIISI</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </h2>
                        </div>
                        <div class="card-body">  
                            <?php if ($penilaian[0]->status_penilaian_atasan == 1 && $penilaian[0]->status_penilaian_atasan == 1 && $penilaian[0]->status_penilaian_atasan == 1) { ?>
                                <div class="table-responsive px-mobile ">
                                    <?php echo $this->session->flashdata('flash_message'); ?>
                                    <table class="table table-bordered border-bottom table-light-success text-center" id="table-eval">
                                        <thead>
                                            <tr class="title_row">
                                                <th rowspan="2" colspan="1" class="text-dark">
                                                    No
                                                </th>                                            
                                                <th rowspan="1" colspan="1" class="text-dark">
                                                    KOMPETENSI
                                                </th>
                                                <th rowspan="1" colspan="3" class="text-dark">
                                                    NILAI
                                                </th>
                                                <th rowspan="1" colspan="3" class="text-dark">
                                                    REKAP
                                                </th>
                                                <th rowspan="1" colspan="1" class="text-dark">
                                                    NILAI
                                                </th>
                                            </tr>
                                            <tr class="title_row">
                                                <th>PERTANYAAN</th>
                                                <th>DIRI</th>
                                                <th>SEJAWAT</th>
                                                <th>ATASAN</th>
                                                <th><?php echo $questionnaire[0]->persentase_personal; ?>%</th>
                                                <th><?php echo $questionnaire[0]->persentase_sejawat; ?>%</th>
                                                <th><?php echo $questionnaire[0]->persentase_atasan; ?>%</th>
                                                <th>REKAP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $num_1 = 0;
                                            $num_2 = 0;
                                            $num_3 = 0;
                                            $num_4 = 0;
                                            $num_5 = 0;
                                            if (!empty($question)) {
                                                foreach ($question as $key => $value) {
                                                    $no++;
                                                    if ($value->tipe_pertanyaan == 1) {
                                                        $num_1++;
                                                    } else if ($value->tipe_pertanyaan == 2) {
                                                        $num_2++;
                                                    } else if ($value->tipe_pertanyaan == 3) {
                                                        $num_3++;
                                                    } else if ($value->tipe_pertanyaan == 4) {
                                                        $num_4++;
                                                    } else if ($value->tipe_pertanyaan == 5) {
                                                        $num_5++;
                                                    }
                                                    ?> 
                                                    <tr>
                                                        <td class="font-weight-boldest table-center font-size-sm">
                                                            <?php echo $no; ?>
                                                        </td>
                                                        <td class="table-center font-size-sm text-left">
                                                            <?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-bold col_1">
                                                            <?php echo (($value->jawaban_personal)); ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-bold col_2">
                                                            <?php echo (($value->jawaban_sejawat)); ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-bold col_3">
                                                            <?php echo (($value->jawaban_atasan)); ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_4">
                                                            <?php
                                                            $persen_jp = intval($value->jawaban_personal) * intval($questionnaire[0]->persentase_personal) / 100;
                                                            echo $persen_jp;
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_5">
                                                            <?php
                                                            $persen_js = intval($value->jawaban_sejawat) * intval($questionnaire[0]->persentase_sejawat) / 100;
                                                            echo $persen_js;
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_6">
                                                            <?php
                                                            $persen_ja = intval($value->jawaban_atasan) * intval($questionnaire[0]->persentase_atasan) / 100;
                                                            echo $persen_ja;
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_7">
                                                            <?php echo $persen_jp + $persen_js + $persen_ja; ?>
                                                        </td>
                                                    </tr>  
                                                    <?php
                                                }  //ngatur nomor urut
                                            }
                                            ?>         
                                        </tbody>   
                                        <tfoot>
                                            <tr class="title_row">
                                                <th colspan="2">
                                                    Jumlah (Hasil penilaian kinerja guru)
                                                </th>
                                                <th id="hasil_1">0</th>
                                                <th id="hasil_2">0</th>
                                                <th id="hasil_3">0</th>
                                                <th id="hasil_4">0</th>
                                                <th id="hasil_5">0</th>
                                                <th id="hasil_6">0</th>
                                                <th id="hasil_7">0</th>
                                            </tr>
                                            <?php if ($user[0]->level_jabatan == 0) { ?>
                                                <tr class="title_row">
                                                    <td colspan="10" class="font-size-h4 font-weight-bold ">
                                                        BESARAN TUNJANGAN KINERJA: <b class="font-weight-boldest text-danger" id="tunjangan_k">18203.23</b>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tfoot>  
                                    </table>
                                </div>
                            <?php } else { ?>
                                <section id="wrapper" class="error-page">
                                    <div class="error-box">
                                        <div class="error-body-dev text-center">
                                            <p class="display-3 font-weight-boldest text-danger">PEMBERITAHUAN!</p>
                                            <h3 class="text-uppercase">Mohon Maaf!, Hasil kusioner penilaian masih menunggu status penilaian terisi (3 instrumen penilaian harus terpenuhi semua).</h3>
                                            <p class="mt-5 m-b-30">Silahkan coba beberapa jam lagi, Terima Kasih.</p>
                                        </div>
                                </section>
                            <?php } ?>
                            <?php if ($penilaian[0]->status_penilaian_atasan == 1 && $penilaian[0]->status_penilaian_atasan == 1 && $penilaian[0]->status_penilaian_atasan == 1) { ?>
                                <div class="table-responsive px-mobile mt-5">                               
                                    <table class="table table-bordered border-bottom table-light-warning text-center" id="table-eval-pkp">
                                        <thead>
                                            <tr class="title_row_pkp">
                                                <th rowspan="2" colspan="1" class="text-dark">
                                                    No
                                                </th>   
                                                <th rowspan="1" colspan="4" class="text-dark">
                                                    PKP
                                                </th>   
                                                <th rowspan="1" colspan="3" class="text-dark">
                                                    RERATA
                                                </th> 
                                                <th rowspan="2" colspan="1" class="text-dark">
                                                    NILAI
                                                </th>
                                            </tr>
                                            <tr class="title_row_pkp">
                                                <th>ASPEK</th>
                                                <th>DIRI</th>
                                                <th>SEJAWAT</th>
                                                <th>ATASAN</th>
                                                <th>DIRI</th>
                                                <th>SEJAWAT</th>
                                                <th>ATASAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $num = 0;
                                            if (!empty($question_sum)) {
                                                foreach ($question_sum as $key => $value) {
                                                    $num++;
                                                    ?> 
                                                    <tr>
                                                        <td class="font-weight-boldest table-center font-size-sm">
                                                            <?php echo $num; ?>
                                                        </td>
                                                        <td class="table-center font-size-sm text-left font-weight-boldest">
                                                            <?php
                                                            $count_soal = 0;
                                                            if ($value->tipe_pertanyaan == 1) {
                                                                $count_soal = $num_1;
                                                                echo 'Pendagogik';
                                                            } else if ($value->tipe_pertanyaan == 2) {
                                                                $count_soal = $num_2;
                                                                echo 'Kepribadian';
                                                            } else if ($value->tipe_pertanyaan == 3) {
                                                                $count_soal = $num_3;
                                                                echo 'Sosial';
                                                            } else if ($value->tipe_pertanyaan == 4) {
                                                                $count_soal = $num_4;
                                                                echo 'Profesional';
                                                            } else if ($value->tipe_pertanyaan == 5) {
                                                                $count_soal = $num_5;
                                                                echo 'Spiritual & Karakter';
                                                            }
                                                            ?>                                                       
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-bold col_1_">
                                                            <?php echo (($value->jawaban_personal)); ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-bold col_2">
                                                            <?php echo (($value->jawaban_sejawat)); ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-bold col_3">
                                                            <?php echo (($value->jawaban_atasan)); ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_4">
                                                            <?php
                                                            $sum_jp = intval($value->jawaban_personal) / $count_soal;
                                                            echo round($sum_jp, 2);
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_5">
                                                            <?php
                                                            $sum_js = intval($value->jawaban_sejawat) / $count_soal;
                                                            echo round($sum_js, 2);
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_6">
                                                            <?php
                                                            $sum_ja = intval($value->jawaban_atasan) / $count_soal;
                                                            echo round($sum_ja, 2);
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_7">
                                                            <?php echo round(($sum_jp + $sum_js + $sum_ja) / 3, 2); ?>
                                                        </td>
                                                    </tr>  
                                                    <?php
                                                }  //ngatur nomor urut
                                            }
                                            ?>  
                                            <tr class="title_row_pkp">
                                                <td colspan="10" class="font-size-h4 font-weight-boldest text-danger">
                                                    KATEGORIKAL PKP
                                                </td>
                                            </tr>
                                            <?php
                                            $number = 0;
                                            if (!empty($question_sum)) {
                                                foreach ($question_sum as $key => $value) {
                                                    $number++;
                                                    ?> 
                                                    <tr>
                                                        <td class="font-weight-boldest table-center font-size-sm">
                                                            <?php echo $number; ?>
                                                        </td>
                                                        <td colspan="4" class="table-center font-size-sm text-left font-weight-boldest">
                                                            <?php
                                                            $count_soal = 0;
                                                            if ($value->tipe_pertanyaan == 1) {
                                                                $count_soal = $num_1;
                                                                echo 'Pendagogik';
                                                            } else if ($value->tipe_pertanyaan == 2) {
                                                                $count_soal = $num_2;
                                                                echo 'Kepribadian';
                                                            } else if ($value->tipe_pertanyaan == 3) {
                                                                $count_soal = $num_3;
                                                                echo 'Sosial';
                                                            } else if ($value->tipe_pertanyaan == 4) {
                                                                $count_soal = $num_4;
                                                                echo 'Profesional';
                                                            } else if ($value->tipe_pertanyaan == 5) {
                                                                $count_soal = $num_5;
                                                                echo 'Spiritual & Karakter';
                                                            }
                                                            ?>                                                       
                                                        </td>

                                                        <td class="table-center font-size-sm font-weight-boldest col_4">
                                                            <?php
                                                            $sum_jp = round(intval($value->jawaban_personal) / $count_soal);
                                                            if ($sum_jp <= 15) {
                                                                echo "KURANG";
                                                            } else if ($sum_jp > 15 && $sum_jp <= 25) {
                                                                echo "CUKUP";
                                                            } else if ($sum_jp > 26 && $sum_jp <= 35) {
                                                                echo "BAIK";
                                                            } else if ($sum_jp > 35) {
                                                                echo "SANGAT BAIK";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_5">
                                                            <?php
                                                            $sum_js = round(intval($value->jawaban_sejawat) / $count_soal, 2);
                                                            if ($sum_js <= 15) {
                                                                echo "KURANG";
                                                            } else if ($sum_js > 15 && $sum_js <= 25) {
                                                                echo "CUKUP";
                                                            } else if ($sum_js > 26 && $sum_js <= 35) {
                                                                echo "BAIK";
                                                            } else if ($sum_js > 35) {
                                                                echo "SANGAT BAIK";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_6">
                                                            <?php
                                                            $sum_ja = round(intval($value->jawaban_atasan) / $count_soal, 2);
                                                            if ($sum_ja <= 15) {
                                                                echo "KURANG";
                                                            } else if ($sum_ja > 15 && $sum_ja <= 25) {
                                                                echo "CUKUP";
                                                            } else if ($sum_ja > 26 && $sum_ja <= 35) {
                                                                echo "BAIK";
                                                            } else if ($sum_ja > 35) {
                                                                echo "SANGAT BAIK";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="table-center font-size-sm font-weight-boldest col_7">
                                                            <?php
                                                            $sum_all = round(($sum_jp + $sum_js + $sum_ja) / 3, 2);
                                                            if ($sum_all <= 15) {
                                                                echo "KURANG";
                                                            } else if ($sum_all > 15 && $sum_all <= 25) {
                                                                echo "CUKUP";
                                                            } else if ($sum_all > 26 && $sum_all <= 35) {
                                                                echo "BAIK";
                                                            } else if ($sum_all > 35) {
                                                                echo "SANGAT BAIK";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>  
                                                    <?php
                                                }  //ngatur nomor urut
                                            }
                                            ?>  
                                        </tbody>      
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--end::Entry-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-eval-questionnaire.js">
</script>

<script>
    const formatRupiah = (money) => {
        return new Intl.NumberFormat('id-ID',
                {style: 'currency', currency: 'IDR', minimumFractionDigits: 0}
        ).format(money);
    };

    $(document).ready(function () {
        var dataRows = $("#table-eval tr:not('.title_row')");
        var col1Total = 0;
        var col2Total = 0;
        var col3Total = 0;
        var col4Total = 0;
        var col5Total = 0;
        var col6Total = 0;
        var col7Total = 0;
        var jumlah_skor = <?php echo intval($questionnaire[0]->nilai_penilaian_max) * $no; ?>;
        var tunjangan = <?php echo intval($questionnaire[0]->tunjangan_kinerja); ?>;

        dataRows.each(function () {
            var col1 = $(this).find('.col_1');
            var col2 = $(this).find('.col_2');
            var col3 = $(this).find('.col_3');
            var col4 = $(this).find('.col_4');
            var col5 = $(this).find('.col_5');
            var col6 = $(this).find('.col_6');
            var col7 = $(this).find('.col_7');

            col1Total += parseInt(col1.html());
            col2Total += parseInt(col2.html());
            col3Total += parseInt(col3.html());
            col4Total += parseInt(col4.html());
            col5Total += parseInt(col5.html());
            col6Total += parseInt(col6.html());
            col7Total += parseInt(col7.html());

        });
        $("#hasil_1").text(parseFloat(col1Total / jumlah_skor * 100).toFixed(2));
        $("#hasil_2").text(parseFloat(col2Total / jumlah_skor * 100).toFixed(2));
        $("#hasil_3").text(parseFloat(col3Total / jumlah_skor * 100).toFixed(2));
        $("#hasil_4").text(parseFloat(col4Total / jumlah_skor * 100).toFixed(2));
        $("#hasil_5").text(parseFloat(col5Total / jumlah_skor * 100).toFixed(2));
        $("#hasil_6").text(parseFloat(col6Total / jumlah_skor * 100).toFixed(2));
        $("#hasil_7").text(parseFloat(col7Total / jumlah_skor * 100).toFixed(2));
        $("#tunjangan_k").text(formatRupiah(parseFloat(col7Total / jumlah_skor * 100 * tunjangan)));
    });
</script>