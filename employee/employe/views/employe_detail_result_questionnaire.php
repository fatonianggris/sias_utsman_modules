<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Kuisioner</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Detail Kuisioner Penilaian</a>
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
                <a onclick="window.history.back();" class="btn btn-light-danger font-weight-bolder btn-sm"><i
                        class="fa fa-backward"></i>Kembali</a>
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
            <!--end::Notice-->

            <div class="row">
                <div class="col-xl-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <!--begin::Top-->
                            <div class="d-flex">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-2">
                                    <div class="symbol symbol-50 symbol-lg-120 symbol-light-success">
                                        <span class="font-size-h1 symbol-label font-weight-boldest">MP</span>
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin: Info-->
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Title-->
                                        <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                            <!--begin::User-->
                                            <div class="mr-3">
                                                <!--begin::Name-->
                                                <a href="#"
                                                    class="d-flex align-items-center text-dark text-hover-primary font-size-h4 font-weight-bolder mr-3">
                                                    <?php echo $employee[0]->nama_lengkap ?> <i
                                                        class="flaticon2-correct text-success icon-md ml-2"></i>
                                                </a>
                                                <!--end::Name-->
                                                <!--begin::Contacts-->
                                                <div class="d-flex flex-wrap my-2">
                                                    <a href="#"
                                                        class="text-dark text-hover-primary font-weight-bold mr-lg-2 mr-2 mb-lg-0 mb-2">
                                                        <span class="svg-icon svg-icon-md svg-icon-gray-900">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path
                                                                        d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                                        fill="#000000" />
                                                                    <circle fill="#000000" opacity="0.3" cx="19.5"
                                                                        cy="17.5" r="2.5" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> <?php echo $employee[0]->email; ?>
                                                    </a>
                                                    <a href="#"
                                                        class="text-dark text-hover-primary font-weight-bold mr-lg-2 mr-2 mb-lg-0 mb-2">
                                                        <span class="svg-icon svg-icon-md svg-icon-gray-900">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <mask fill="white">
                                                                        <use xlink:href="#path-1" />
                                                                    </mask>
                                                                    <g />
                                                                    <path
                                                                        d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z"
                                                                        fill="#000000" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> <?php echo $employee[0]->nip; ?>
                                                    </a>
                                                    <a href="#"
                                                        class="text-dark text-hover-primary font-weight-bold mr-lg-2 mr-2 mb-lg-0 mb-2">
                                                        <span class="svg-icon svg-icon-md svg-icon-gray-900">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path
                                                                        d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M11.613922,13.2130341 C11.1688026,13.6581534 10.4887934,13.7685037 9.92575695,13.4869855 C9.36272054,13.2054673 8.68271128,13.3158176 8.23759191,13.760937 L6.72658218,15.2719467 C6.67169475,15.3268342 6.63034033,15.393747 6.60579393,15.4673862 C6.51847004,15.7293579 6.66005003,16.0125179 6.92202169,16.0998418 L8.27584113,16.5511149 C9.57592638,16.9844767 11.009274,16.6461092 11.9783003,15.6770829 L15.9775173,11.6778659 C16.867756,10.7876271 17.0884566,9.42760861 16.5254202,8.3015358 L15.8928491,7.03639343 C15.8688153,6.98832598 15.8371895,6.9444475 15.7991889,6.90644684 C15.6039267,6.71118469 15.2873442,6.71118469 15.0920821,6.90644684 L13.4995401,8.49898884 C13.0544207,8.94410821 12.9440704,9.62411747 13.2255886,10.1871539 C13.5071068,10.7501903 13.3967565,11.4301996 12.9516371,11.8753189 L11.613922,13.2130341 Z"
                                                                        fill="#000000" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> <?php echo $employee[0]->nomor_hp; ?>
                                                    </a>
                                                    <a href="#"
                                                        class="text-dark text-hover-primary font-weight-bold mr-lg-2 mr-2 mb-lg-0 mb-2">
                                                        <span class="svg-icon svg-icon-md svg-icon-gray-900">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path
                                                                        d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                                        fill="#000000" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span> <?php echo $employee[0]->hasil_nama_jabatan; ?>
                                                    </a>
                                                </div>
                                                <!--end::Contacts-->
                                            </div>
                                            <!--begin::User-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5 ">
                                                <?php echo $employee[0]->alamat_lengkap ?>
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="text-center">
                                            <a href="#"
                                                class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                                <?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?>
                                            </a>
                                            <div class="text-danger font-size-sm mt-2 font-weight-bold">
                                                <?php echo (($questionnaire[0]->deskripsi_kuisioner)); ?>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center mt-3">
                                                <span
                                                    class="label label-md label-light-success label-inline font-weight-bolder mr-2"><?php echo TanggalIndo(($questionnaire[0]->tgl_mulai)); ?></span>

                                                <b>s/d</b>
                                                <span
                                                    class="label label-md label-light-danger label-inline font-weight-bolder ml-2"><?php echo TanggalIndo(($questionnaire[0]->tgl_berakhir)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 text-center">
                                        <!--begin::Pic-->
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <p class="text-dark-75 font-weight-bolder font-size-h4 mb-0">CETAK NILAI
                                            </p>
                                            <?php if (($questionnaire[0]->jumlah_personal_penilai == $questionnaire[0]->total_hasil_personal_penilai) &&
                                                ($questionnaire[0]->jumlah_sejawat_penilai == $questionnaire[0]->total_hasil_sejawat_penilai) &&
                                                ($questionnaire[0]->jumlah_atasan_penilai == $questionnaire[0]->total_hasil_atasan_penilai) &&
                                                ($questionnaire[0]->jumlah_bawahan_penilai == $questionnaire[0]->total_hasil_bawahan_penilai)
                                            ) { ?>
                                                <div class="symbol symbol-lg-80 symbol-light-danger">
                                                    <span class="font-score-alfabet symbol-label">
                                                        <a href="javascript:generate_evaluation_pdf('<?php echo paramEncrypt($questionnaire[0]->id_kuisioner); ?>', '<?php echo paramEncrypt($employee[0]->id_pegawai); ?>')"> <i class="flaticon-download-1 icon-4x text-dark"></i></a></span>
                                                    <span class="font-weight-bold text-danger blink-hard">klik u/
                                                        unduh</span>
                                                </div>
                                            <?php } else { ?>
                                                <div class="symbol symbol-lg-80 symbol-light-dark">
                                                    <span class="font-score-alfabet symbol-label">-</span>
                                                    <span class="font-weight-bold text-warning blink-hard">PENDING</span>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <!--end::Pic-->
                                    </div>
                                </div>

                            </div>
                            <!--end::Top-->

                            <!--begin::Separator-->
                            <div class="separator separator-solid my-7"></div>
                            <!--end::Separator-->

                            <!--begin::Bottom-->
                            <div class="d-flex align-items-center flex-wrap">
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-user icon-2x text-primary font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-primary">
                                        <span class="font-weight-bolder font-size-sm">Total Nilai Personal</span>
                                        <span class="font-weight-bolder font-size-h5 text-dark "><span
                                                class="text-dark font-weight-bold"></span>
                                            <?php if ($questionnaire[0]->jumlah_personal_penilai == $questionnaire[0]->total_hasil_personal_penilai) {
                                                echo $get_result_personal[0]->total_nilai_personal;
                                            } else {
                                                echo 0;
                                            } ?>
                                        </span>
                                    </div>
                                </div>
                                <!--end: Item-->

                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-network icon-2x text-primary font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark">
                                        <span class="font-weight-bolder font-size-sm text-primary">Total Nilai
                                            Sejawat</span>
                                        <span class="font-weight-bolder font-size-h5 text-dark "><span
                                                class="text-dark  font-weight-bold"></span>
                                            <?php if ($questionnaire[0]->jumlah_sejawat_penilai == $questionnaire[0]->total_hasil_sejawat_penilai) {
                                                echo $get_result_colleague[0]->total_nilai_sejawat;
                                            } else {
                                                echo 0;
                                            } ?>
                                        </span>
                                    </div>
                                </div>
                                <!--end: Item-->

                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-customer icon-2x text-primary font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark">
                                        <span class="font-weight-bolder font-size-sm text-primary ">Total Nilai
                                            Atasan</span>
                                        <span class="font-weight-bolder font-size-h5 text-dark "><span
                                                class="text-dark font-weight-bold"></span>
                                            <?php if ($questionnaire[0]->jumlah_bawahan_penilai == $questionnaire[0]->total_hasil_bawahan_penilai) {
                                                echo $get_result_subordinate[0]->total_nilai_bawahan;
                                            } else {
                                                echo 0;
                                            } ?>
                                        </span>
                                    </div>
                                </div>
                                <!--end: Item-->


                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-map icon-2x text-primary font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark">
                                        <span class="font-weight-bolder font-size-sm text-primary">Total Nilai
                                            Bawahan</span>
                                        <span class="font-weight-bolder font-size-h5"><span
                                                class="text-dark font-weight-bold"></span>

                                            <?php if ($questionnaire[0]->jumlah_atasan_penilai == $questionnaire[0]->total_hasil_atasan_penilai) {
                                                echo $get_result_leader[0]->total_nilai_atasan;
                                            } else {
                                                echo 0;
                                            } ?>
                                        </span>
                                    </div>
                                </div>
                                <!--end: Item-->


                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-graph icon-2x text-warning font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-warning">
                                        <span class="font-weight-bolder font-size-sm">Total Nilai</span>
                                        <span class="font-weight-bolder font-size-h5"><span
                                                class="text-warning font-weight-bold"></span>
                                            <?php echo $get_result_personal[0]->total_nilai_personal + $get_result_colleague[0]->total_nilai_sejawat + $get_result_leader[0]->total_nilai_atasan + $get_result_subordinate[0]->total_nilai_bawahan; ?>
                                        </span>
                                    </div>
                                </div>
                                <!--end: Item-->
                                <?php
                                $data = [$questionnaire[0]->jumlah_personal_dinilai, $questionnaire[0]->jumlah_sejawat_dinilai, $questionnaire[0]->jumlah_atasan_dinilai, $questionnaire[0]->jumlah_bawahan_dinilai];
                                $total_kuisioner = 0;

                                foreach ($data as $val) {
                                    if ($val > 0) {
                                        $total_kuisioner++;
                                    }
                                }

                                ?>
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-map icon-2x text-success font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark">
                                        <span class="font-weight-bolder font-size-sm text-success">Total
                                            Rata-Rata</span>
                                        <span class="font-weight-bolder font-size-h5 text-success"><span
                                                class="text-success font-weight-bold"></span>
                                            <?php
                                            $final_result = "";
                                            $abjad_value = "";
                                            $personal   = ($questionnaire[0]->jumlah_personal_dinilai != 0)
                                                ? ($get_result_personal[0]->total_nilai_personal / $questionnaire[0]->jumlah_personal_dinilai)
                                                : 0;
                                            $colleague  = ($questionnaire[0]->jumlah_sejawat_dinilai != 0)
                                                ? ($get_result_colleague[0]->total_nilai_sejawat / $questionnaire[0]->jumlah_sejawat_dinilai)
                                                : 0;
                                            $leader     = ($questionnaire[0]->jumlah_atasan_dinilai != 0)
                                                ? ($get_result_subordinate[0]->total_nilai_bawahan / $questionnaire[0]->jumlah_atasan_dinilai)
                                                : 0;
                                            $subordinate = ($questionnaire[0]->jumlah_bawahan_dinilai != 0)
                                                ? ($get_result_leader[0]->total_nilai_atasan / $questionnaire[0]->jumlah_bawahan_dinilai)
                                                : 0;
                                            // Total sementara
                                            $total_result = $personal + $colleague + $leader + $subordinate;

                                            // Cegah pembagian nol di level akhir
                                            if ($total_kuisioner == 0 || $total_question[0]->total_pertanyaan == 0) {
                                                echo $final_result = 0;
                                            } else {
                                                $abjad_value = $total_result / $total_kuisioner;
                                                echo round($final_result = $total_result / $total_kuisioner / $total_question[0]->total_pertanyaan, 1);
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <!--end: Item-->
                            </div>
                            <!--end::Bottom-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <!--begin::Card-->
                        <div class="col-xl-7">
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header h-auto">
                                    <!--begin::Title-->
                                    <div class="card-title py-5">
                                        <h3 class="card-label">
                                            Grafik Nilai Anda Tiap Bulan
                                        </h3>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <div class="card-body">
                                    <!--begin::Chart-->
                                    <div id="chart_2"></div>
                                    <!--end::Chart-->
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                        <div class="col-xl-5">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                                                <!--begin::Body-->
                                                <div class="card-body align-items-center">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="text-center">
                                                            <p class="text-dark-75 font-weight-bolder font-size-h4">
                                                                STATUS NILAI ANDA
                                                            </p>
                                                            <?php if (($questionnaire[0]->jumlah_personal_penilai == $questionnaire[0]->total_hasil_personal_penilai) &&
                                                                ($questionnaire[0]->jumlah_sejawat_penilai == $questionnaire[0]->total_hasil_sejawat_penilai) &&
                                                                ($questionnaire[0]->jumlah_atasan_penilai == $questionnaire[0]->total_hasil_atasan_penilai) &&
                                                                ($questionnaire[0]->jumlah_bawahan_penilai == $questionnaire[0]->total_hasil_bawahan_penilai)
                                                            ) { ?>
                                                                <p class="font-score-alfabet-2 mb-0 blink-hard text-success">
                                                                    SUDAH DINILAI</p>
                                                            <?php } else { ?>
                                                                <p class="font-score-alfabet-2 mb-0 blink-hard text-danger">
                                                                    BELUM DINILAI</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <!--begin::Tiles Widget 13-->
                                            <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                                                <!--begin::Body-->
                                                <div class="card-body align-items-center">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                                            <p class="text-dark-75 font-weight-bolder font-size-h4 mb-0">
                                                                SKOR
                                                            </p>
                                                            <?php
                                                            $predikat = "-";
                                                            if (($questionnaire[0]->jumlah_personal_penilai == $questionnaire[0]->total_hasil_personal_penilai) &&
                                                                ($questionnaire[0]->jumlah_sejawat_penilai == $questionnaire[0]->total_hasil_sejawat_penilai) &&
                                                                ($questionnaire[0]->jumlah_atasan_penilai == $questionnaire[0]->total_hasil_atasan_penilai) &&
                                                                ($questionnaire[0]->jumlah_bawahan_penilai == $questionnaire[0]->total_hasil_bawahan_penilai)
                                                            ) {

                                                                foreach ($predicate_value as $value) {
                                                                    if ($abjad_value >= $value['nilai_minimal'] && $abjad_value <= $value['nilai_maksimal']) {
                                                                        $predikat = $value['predikat_abjad'];
                                                                        break;
                                                                    } else {
                                                                        $predikat = "-";
                                                                    }
                                                                }
                                                            ?>
                                                                <div class="symbol symbol-lg-70 symbol-light-danger">
                                                                    <span class="font-score-alfabet symbol-label"><?php echo $predikat; ?></span>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="symbol symbol-lg-70 symbol-light-dark">
                                                                    <span class="font-score-alfabet symbol-label"><?php echo $predikat; ?></span>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Tiles Widget 13-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <!--begin::Engage Widget 2-->
                                            <div class="card card-custom mb-7">
                                                <div class="card-body d-flex p-0">
                                                    <?php
                                                    $bg_person = '';
                                                    if ($questionnaire[0]->total_hasil_personal_penilai == $questionnaire[0]->jumlah_personal_penilai) {
                                                        $bg_person = 'bg-success';
                                                    } else {
                                                        $bg_person = 'bg-danger';
                                                    } ?>
                                                    <div class="flex-grow-1 <?php echo $bg_person; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat"
                                                        style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Clipboard-list.svg);">
                                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar Hasil
                                                            Nilai Personal Anda</h4>
                                                        <div
                                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                                            <?php echo $questionnaire[0]->total_hasil_personal_penilai; ?>/<?php echo $questionnaire[0]->jumlah_personal_penilai; ?>
                                                        </div>
                                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                                            <?php
                                                            if ($questionnaire[0]->jumlah_personal_penilai != 0) { ?>
                                                                <a href="<?php echo site_url('employee/employe/report/list_evaluation_employee_personal_assesed/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
                                                                    class="btn btn-light text-dark font-weight-bold mr-2">Lihat
                                                                    Daftar</a>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-dark font-weight-bolder mr-2"
                                                                    disabled>Tidak Dinilai</button>
                                                            <?php } ?>
                                                        </div>
                                                        <p class="text-inverse-danger font-weight-bolder">*klik lihat
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <!--begin::Engage Widget 2-->
                                            <div class="card card-custom mb-7">
                                                <div class="card-body d-flex p-0">
                                                    <?php
                                                    $bg_sejawat = '';
                                                    if ($questionnaire[0]->total_hasil_sejawat_penilai == $questionnaire[0]->jumlah_sejawat_penilai) {
                                                        $bg_sejawat = 'bg-success';
                                                    } else {
                                                        $bg_sejawat = 'bg-danger';
                                                    } ?>
                                                    <div class="flex-grow-1 <?php echo $bg_sejawat; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat"
                                                        style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Clipboard-list.svg);">
                                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar Hasil
                                                            Nilai Sejawat Anda</h4>
                                                        <div
                                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                                            <?php echo $questionnaire[0]->total_hasil_sejawat_penilai; ?>/<?php echo $questionnaire[0]->jumlah_sejawat_penilai; ?>
                                                        </div>
                                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                                            <?php
                                                            if ($questionnaire[0]->jumlah_sejawat_penilai != 0) { ?>
                                                                <a href="<?php echo site_url('employee/employe/report/list_evaluation_employee_colleague_assesed/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
                                                                    class="btn btn-light text-dark font-weight-bold mr-2">Lihat
                                                                    Daftar</a>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-dark font-weight-bolder mr-2"
                                                                    disabled>Tidak Dinilai</button>
                                                            <?php } ?>
                                                        </div>
                                                        <p class="text-inverse-danger font-weight-bolder">*klik lihat
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <!--begin::Engage Widget 2-->
                                            <div class="card card-custom mb-7">
                                                <div class="card-body d-flex p-0">
                                                    <?php
                                                    $bg_atas = '';
                                                    if ($questionnaire[0]->total_hasil_atasan_penilai == $questionnaire[0]->jumlah_atasan_penilai) {
                                                        $bg_atas = 'bg-success';
                                                    } else {
                                                        $bg_atas = 'bg-danger';
                                                    } ?>
                                                    <div class="flex-grow-1 <?php echo $bg_atas; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat"
                                                        style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Clipboard-list.svg);">
                                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar Hasil
                                                            Nilai Atasan Anda</h4>
                                                        <div
                                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                                            <?php echo $questionnaire[0]->total_hasil_atasan_penilai; ?>/<?php echo $questionnaire[0]->jumlah_atasan_penilai; ?>
                                                        </div>
                                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                                            <?php
                                                            if ($questionnaire[0]->jumlah_atasan_penilai != 0) { ?>
                                                                <a href="<?php echo site_url('employee/employe/report/list_evaluation_employee_leader_assesed/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
                                                                    class="btn btn-light text-dark font-weight-bold mr-2">Lihat
                                                                    Daftar</a>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-dark font-weight-bolder mr-2"
                                                                    disabled>Tidak Dinilai</button>
                                                            <?php } ?>
                                                        </div>
                                                        <p class="text-inverse-danger font-weight-bolder">*klik lihat
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <!--begin::Engage Widget 2-->
                                            <div class="card card-custom mb-7">
                                                <div class="card-body d-flex p-0">
                                                    <?php
                                                    $bg_bawah = '';
                                                    if ($questionnaire[0]->total_hasil_bawahan_penilai == $questionnaire[0]->jumlah_bawahan_penilai) {
                                                        $bg_bawah = 'bg-success';
                                                    } else {
                                                        $bg_bawah = 'bg-danger';
                                                    } ?>
                                                    <div class="flex-grow-1 <?php echo $bg_bawah; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat"
                                                        style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Clipboard-list.svg);">
                                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar Hasil
                                                            Nilai Bawahan Anda</h4>
                                                        <div
                                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                                            <?php echo $questionnaire[0]->total_hasil_bawahan_penilai; ?>/<?php echo $questionnaire[0]->jumlah_bawahan_penilai; ?>
                                                        </div>
                                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                                            <?php
                                                            if ($questionnaire[0]->jumlah_bawahan_penilai != 0) { ?>
                                                                <a href="<?php echo site_url('employee/employe/report/list_evaluation_employee_subordinate_assesed/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
                                                                    class="btn btn-light text-dark font-weight-bold mr-2">Lihat
                                                                    Daftar</a>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-dark font-weight-bolder mr-2"
                                                                    disabled>Tidak Dinilai</button>
                                                            <?php } ?>
                                                        </div>
                                                        <p class="text-inverse-danger font-weight-bolder">*klik lihat
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>

<div class="modal fade" id="modal_keterangan_questionnaire" tabindex="-1" aria-labelledby="exampleModalSizeLg"
    aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Detail Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <?php echo $questionnaire[0]->keterangan; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/features/charts/apexcharts.js">
</script>
<script>
    // Buka modal dan isi form dari data-*
    $(document).on("click", "#btn_question_view", function() {
        let btn = $(this);

        $("#tipe_pertanyaan").text(btn.data("nama_tipe_pertanyaan"));
        $("#isi_pertanyaan").text(btn.data("isi_pertanyaan"));
        $("#deskripsi_pertanyaan").html(btn.data("deskripsi_pertanyaan"));

        $("#modal_view_question").modal("show");
    });
</script>
<script>
    function generate_evaluation_pdf(id_kuisioner, id_pegawai) {

        //alert(rows_selected.join(","));
        KTApp.blockPage({
            overlayColor: '#FFA800',
            state: 'warning',
            size: 'lg',
            opacity: 0.1,
            message: 'Silahkan Tunggu...'
        });

        $.ajax({
            type: "POST",
            url: `${HOST_URL}employee/employe/report/print_data_pdf_evaluation_employee`,
            data: {
                id_kuisioner: id_kuisioner,
                id_pegawai: id_pegawai
            },
            xhrFields: {
                responseType: 'blob' // to avoid binary data being mangled on charset conversion
            },
            success: function(blob, data, xhr) {
                KTApp.unblockPage();
                // check for a filename
                try {
                    var filename = "";
                    var disposition = xhr.getResponseHeader('Content-Disposition');
                    if (disposition && disposition.indexOf('attachment') !== -1) {
                        var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                        var matches = filenameRegex.exec(disposition);
                        if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                    }

                    if (typeof window.navigator.msSaveBlob !== 'undefined') {
                        // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                        window.navigator.msSaveBlob(blob, filename);
                    } else {
                        var URL = window.URL || window.webkitURL;
                        var downloadUrl = URL.createObjectURL(blob);

                        if (filename) {
                            // use HTML5 a[download] attribute to specify filename
                            var a = document.createElement("a");
                            // safari doesn't support this yet
                            if (typeof a.download === 'undefined') {
                                window.open(downloadUrl, '_blank');
                            } else {
                                a.href = downloadUrl;
                                a.download = filename;
                                document.body.appendChild(a);
                                a.click();
                                document.body.removeChild(a); // Cle
                            }
                        } else {
                            window.open(downloadUrl, '_blank');
                        }
                    }

                    Swal.fire({
                        html: "Berhasil!, Laporan berhasil dicetak, Silahkan cek ulang.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Oke!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-success"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                } catch {

                    Swal.fire({
                        html: "Mohon Maaf, Data Penilaian Belum Selesai. Silahkan cek ulang.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Oke!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-success"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            }
        });
    };
</script>