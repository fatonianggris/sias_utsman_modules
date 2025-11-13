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
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom" style="height: 150px;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::User-->
                            <div class="d-flex align-items-center justify-content-center">
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h6 text-dark-75 text-hover-primary">
                                        <?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?>
                                    </a>
                                    <div class="text-danger font-size-xs mt-1 font-weight-bold">
                                        <?php echo (($questionnaire[0]->deskripsi_kuisioner)); ?>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="d-flex align-items-center mr-2">
                                            <span class="font-weight-bold font-size-sm mr-2">Mulai</span>
                                            <span
                                                class="label label-sm label-light-success label-inline font-weight-bolder"><?php echo TanggalIndo(($questionnaire[0]->tgl_mulai)); ?></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="font-weight-bold font-size-sm mr-2">Berakhir</span>
                                            <span
                                                class="label label-sm label-light-danger label-inline font-weight-bolder"><?php echo TanggalIndo(($questionnaire[0]->tgl_berakhir)); ?></span>
                                        </div>
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
                <div class="col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                <path
                                                    d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="#" data-toggle="modal" data-target="#modal_pertanyaan_questionnaire" class="btn btn-light btn-sm text-success font-weight-bold ml-2">Lihat Soal</a>
                                    <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">
                                        <?php echo $total_question[0]->total_pertanyaan; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Total
                                        Pertanyaan</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                </div>
                <!--begin::Content-->
                <div class="col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-warning gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5" />
                                                <path
                                                    d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M8.5,13 C9.32842712,13 10,12.3284271 10,11.5 C10,10.6715729 9.32842712,10 8.5,10 C7.67157288,10 7,10.6715729 7,11.5 C7,12.3284271 7.67157288,13 8.5,13 Z M13.5,13 C14.3284271,13 15,12.3284271 15,11.5 C15,10.6715729 14.3284271,10 13.5,10 C12.6715729,10 12,10.6715729 12,11.5 C12,12.3284271 12.6715729,13 13.5,13 Z M18.5,13 C19.3284271,13 20,12.3284271 20,11.5 C20,10.6715729 19.3284271,10 18.5,10 C17.6715729,10 17,10.6715729 17,11.5 C17,12.3284271 17.6715729,13 18.5,13 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-success font-weight-bolder mt-4">
                                        <a href="#" data-toggle="modal" data-target="#modal_keterangan_questionnaire"
                                            class="btn btn-light text-warning font-weight-bold mr-2">Lihat
                                            Keterangan</a>
                                    </div>

                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                </div>
                <div class=" col-xl-4">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b"
                        style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                        <!--begin::Body-->
                        <div class="card-body align-items-center">
                            <div>
                                <div class="d-flex justify-content-center">
                                    <p class="text-dark-75 font-weight-bolder font-size-h4">Tipe Pertanyaan
                                    </p>
                                </div>
                                <div class="d-flex flex-wrap justify-content-center">
                                    <?php
                                    if (!empty($question_type)) {
                                        foreach ($question_type as $key => $value) {
                                    ?>
                                            <a href="#"
                                                class="label font-weight-bold label-default label-md label-inline mr-2 mt-1"
                                                data-toggle="" aria-haspopup="true" aria-expanded="false">
                                                <?php echo strtoupper($value->nama_tipe_pertanyaan); ?>
                                            </a>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 13-->
                </div>
                <div class="col-xl-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <!--begin::Top-->
                            <div class="row align-items-center">
                                <!-- Kiri -->
                                <div class="col-xl-7 d-flex align-items-start">
                                    <!--begin::Pic-->
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="symbol symbol-50 symbol-lg-120 symbol-light-success">
                                            <span class="font-size-h1 symbol-label font-weight-boldest">MP</span>
                                        </div>
                                    </div>
                                    <!--end::Pic-->

                                    <!--begin::Info-->
                                    <div>
                                        <a href="#"
                                            class="d-flex align-items-center text-dark text-hover-primary font-size-h3 font-weight-bolder mr-3 mt-1">
                                            <?= $employee[0]->nama_lengkap ?>
                                            <i class="flaticon2-correct text-success icon-md ml-2"></i>
                                        </a>

                                        <!--Kontak-->
                                        <div class="d-flex flex-wrap my-1">
                                            <a href="#" class="text-dark text-hover-primary font-weight-bold mr-3">
                                                <i class="flaticon2-mail text-muted mr-1"></i>
                                                <?php echo $employee[0]->email; ?>
                                            </a>
                                            <a href="#" class="text-dark text-hover-primary font-weight-bold mr-3">
                                                <i class="flaticon2-lock text-muted mr-1"></i>
                                                <?php echo $employee[0]->nip; ?>
                                            </a>
                                            <a href="#" class="text-dark text-hover-primary font-weight-bold mr-3">
                                                <i class="flaticon2-phone text-muted mr-1"></i>
                                                <?php echo $employee[0]->nomor_hp; ?>
                                            </a>
                                            <a href="#" class="text-dark text-hover-primary font-weight-bold">
                                                <i class="flaticon2-avatar text-muted mr-1"></i>
                                                <?php echo $employee[0]->hasil_nama_jabatan; ?>
                                            </a>
                                        </div>

                                        <!--Alamat-->
                                        <div class="text-dark-50 font-weight-bold">
                                            <?php echo $employee[0]->alamat_lengkap ?>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!-- End Kiri -->

                                <!-- Kanan -->
                                <div class="col-xl-5 d-flex align-items-center justify-content-between">
                                    <div class="text-center">
                                        <p class="text-dark-75 font-weight-bolder font-size-h4">STATUS NILAI PEGAWAI</p>
                                        <?php if (
                                            ($questionnaire[0]->jumlah_personal_penilai == $questionnaire[0]->total_hasil_personal_penilai) &&
                                            ($questionnaire[0]->jumlah_sejawat_penilai == $questionnaire[0]->total_hasil_sejawat_penilai) &&
                                            ($questionnaire[0]->jumlah_atasan_penilai == $questionnaire[0]->total_hasil_atasan_penilai) &&
                                            ($questionnaire[0]->jumlah_bawahan_penilai == $questionnaire[0]->total_hasil_bawahan_penilai)
                                        ) { ?>
                                            <p class="font-score-eval mb-0 blink-hard text-success">SUDAH DINILAI</p>
                                        <?php } else { ?>
                                            <p class="font-score-eval mb-0 blink-hard text-danger">BELUM DINILAI</p>
                                        <?php } ?>
                                    </div>

                                    <div class="text-center">
                                        <p class="text-dark-75 font-weight-bolder font-size-h4 mb-0">SKOR</p>
                                        <?php
                                        $data = [$questionnaire[0]->jumlah_personal_dinilai, $questionnaire[0]->jumlah_sejawat_dinilai, $questionnaire[0]->jumlah_atasan_dinilai, $questionnaire[0]->jumlah_bawahan_dinilai];
                                        $total_kuisioner = 0;

                                        foreach ($data as $val) {
                                            if ($val > 0) {
                                                $total_kuisioner++;
                                            }
                                        }

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
                                            $final_result = 0;
                                        } else {
                                            $abjad_value = $total_result / $total_kuisioner;
                                            $final_result = $total_result / $total_kuisioner / $total_question[0]->total_pertanyaan;
                                        }
                                        ?>
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
                                            <div class="symbol symbol-lg-90 symbol-light-danger">
                                                <span class="font-score-alfabet symbol-label"><?php echo $predikat; ?></span>
                                            </div>
                                        <?php } else { ?>
                                            <div class="symbol symbol-lg-90 symbol-light-dark">
                                                <span class="font-score-alfabet symbol-label"><?php echo $predikat; ?></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- End Kanan -->
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
                                        <i class="flaticon-map icon-2x text-primary font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark">
                                        <span class="font-weight-bolder font-size-sm text-primary">Total Nilai
                                            Bawahan</span>
                                        <span class="font-weight-bolder font-size-h5"><span
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
                                        <i class="flaticon-graph icon-2x text-warning font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-warning">
                                        <span class="font-weight-bolder font-size-sm">Total Nilai</span>
                                        <span class="font-weight-bolder font-size-h5"><span
                                                class="text-warning font-weight-bold"></span>
                                            <?php if (
                                                ($questionnaire[0]->jumlah_personal_penilai == $questionnaire[0]->total_hasil_personal_penilai) &&
                                                ($questionnaire[0]->jumlah_sejawat_penilai == $questionnaire[0]->total_hasil_sejawat_penilai) &&
                                                ($questionnaire[0]->jumlah_atasan_penilai == $questionnaire[0]->total_hasil_atasan_penilai) &&
                                                ($questionnaire[0]->jumlah_bawahan_penilai == $questionnaire[0]->total_hasil_bawahan_penilai)
                                            ) { ?>
                                                <?php echo $get_result_personal[0]->total_nilai_personal + $get_result_colleague[0]->total_nilai_sejawat + $get_result_leader[0]->total_nilai_atasan + $get_result_subordinate[0]->total_nilai_bawahan; ?>
                                            <?php } else { ?>
                                                <?php echo '0'; ?>
                                            <?php } ?>
                                        </span>
                                    </div>
                                </div>
                                <!--end: Item-->
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
                                            <?php if (
                                                ($questionnaire[0]->jumlah_personal_penilai == $questionnaire[0]->total_hasil_personal_penilai) &&
                                                ($questionnaire[0]->jumlah_sejawat_penilai == $questionnaire[0]->total_hasil_sejawat_penilai) &&
                                                ($questionnaire[0]->jumlah_atasan_penilai == $questionnaire[0]->total_hasil_atasan_penilai) &&
                                                ($questionnaire[0]->jumlah_bawahan_penilai == $questionnaire[0]->total_hasil_bawahan_penilai)
                                            ) { ?>
                                                <?php echo round($final_result, 1); ?>
                                            <?php } else { ?>
                                                <?php echo $final_result; ?>
                                            <?php } ?>
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
                        <div class="col-lg-3 col-3">
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
                                            Nilai Personal Pegawai</h4>
                                        <div
                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                            <?php echo $questionnaire[0]->total_hasil_personal_penilai; ?>/<?php echo $questionnaire[0]->jumlah_personal_penilai; ?>
                                        </div>
                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                            <?php
                                            if ($questionnaire[0]->jumlah_personal_penilai != 0) { ?>
                                                <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_employee_personal_assesed/' . paramEncrypt($employee[0]->id_pegawai) . '/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
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
                        <div class="col-lg-3 col-3">
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
                                            Nilai Sejawat Pegawai</h4>
                                        <div
                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                            <?php echo $questionnaire[0]->total_hasil_sejawat_penilai; ?>/<?php echo $questionnaire[0]->jumlah_sejawat_penilai; ?>
                                        </div>
                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                            <?php
                                            if ($questionnaire[0]->jumlah_sejawat_penilai != 0) { ?>
                                                <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_employee_colleague_assesed/' . paramEncrypt($employee[0]->id_pegawai) . '/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
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
                        <div class="col-lg-3 col-3">
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
                                            Nilai Atassan Pegawai</h4>
                                        <div
                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                            <?php echo $questionnaire[0]->total_hasil_atasan_penilai; ?>/<?php echo $questionnaire[0]->jumlah_atasan_penilai; ?>
                                        </div>
                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                            <?php
                                            if ($questionnaire[0]->jumlah_atasan_penilai != 0) { ?>
                                                <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_employee_leader_assesed/' . paramEncrypt($employee[0]->id_pegawai) . '/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
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
                        <div class="col-lg-3 col-3">
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
                                            Nilai Bawahan Pegawai</h4>
                                        <div
                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                            <?php echo $questionnaire[0]->total_hasil_bawahan_penilai; ?>/<?php echo $questionnaire[0]->jumlah_bawahan_penilai; ?>
                                        </div>
                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                            <?php
                                            if ($questionnaire[0]->jumlah_bawahan_penilai != 0) { ?>
                                                <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_employee_subordinate_assesed/' . paramEncrypt($employee[0]->id_pegawai) . '/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
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
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-7">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            Perbandingan Penilian Selesai/Belum Selesai
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Chart-->
                                    <div id="chart_3"></div>
                                    <!--end::Chart-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-xl-5">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--begin::Tiles Widget 13-->
                                    <div class="card card-custom bgi-no-repeat gutter-b"
                                        style="height: 160px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                                        <!--begin::Body-->
                                        <div class="card-body align-items-center">
                                            <div>
                                                <div class="d-flex justify-content-center">
                                                    <p class="text-dark-75 font-weight-bolder font-size-h4">Predikat
                                                        Penilaian
                                                    </p>

                                                </div>
                                                <div class="d-flex flex-wrap justify-content-center">
                                                    <?php
                                                    if (!empty($predicate_value)) {
                                                        foreach ($predicate_value as $key => $value) {
                                                    ?>
                                                            <a href="#"
                                                                class="label font-weight-bolder label-primary label-md label-inline mt-1 mr-2"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <?php echo strtoupper($value['label_nilai']); ?>
                                                                (Min:<?php echo strtoupper($value['nilai_minimal']); ?>,
                                                                Max:<?php echo strtoupper($value['nilai_maksimal']); ?>,
                                                                Abjad:<?php echo strtoupper($value['predikat_abjad']); ?>
                                                                )
                                                            </a>
                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tiles Widget 13-->
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <!--begin::Engage Widget 2-->
                                            <div class="card card-custom mb-7">
                                                <div class="card-body d-flex p-0">
                                                    <?php
                                                    $bg_person = '';
                                                    if ($questionnaire[0]->total_hasil_personal_dinilai == $questionnaire[0]->jumlah_personal_dinilai) {
                                                        $bg_person = 'bg-success';
                                                    } else {
                                                        $bg_person = 'bg-danger';
                                                    } ?>
                                                    <div class="flex-grow-1 <?php echo $bg_person; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat"
                                                        style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Chat6.svg);">
                                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar
                                                            Penilaian Personal</h4>
                                                        <div
                                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                                            <?php echo $questionnaire[0]->total_hasil_personal_dinilai; ?>/<?php echo $questionnaire[0]->jumlah_personal_dinilai; ?>
                                                        </div>
                                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                                            <?php
                                                            if ($questionnaire[0]->jumlah_personal_dinilai != 0) { ?>
                                                                <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_employee_personal/' . paramEncrypt($employee[0]->id_pegawai) . '/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
                                                                    class="btn btn-light text-dark font-weight-bold mr-2">Lihat
                                                                    Daftar</a>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-dark font-weight-bolder mr-2"
                                                                    disabled>Tidak Perlu Menilai</button>
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
                                                    if ($questionnaire[0]->total_hasil_sejawat_dinilai == $questionnaire[0]->jumlah_sejawat_dinilai) {
                                                        $bg_sejawat = 'bg-success';
                                                    } else {
                                                        $bg_sejawat = 'bg-danger';
                                                    } ?>
                                                    <div class="flex-grow-1 <?php echo $bg_sejawat; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat"
                                                        style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Chat6.svg);">
                                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar
                                                            Penilaian Sejawat</h4>
                                                        <div
                                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                                            <?php echo $questionnaire[0]->total_hasil_sejawat_dinilai; ?>/<?php echo $questionnaire[0]->jumlah_sejawat_dinilai; ?>
                                                        </div>
                                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                                            <?php
                                                            if ($questionnaire[0]->jumlah_sejawat_dinilai != 0) { ?>
                                                                <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_employee_colleague/' . paramEncrypt($employee[0]->id_pegawai) . '/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
                                                                    class="btn btn-light text-dark font-weight-bold mr-2">Lihat
                                                                    Daftar</a>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-dark font-weight-bolder mr-2"
                                                                    disabled>Tidak Perlu Menilai</button>
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
                                                    if ($questionnaire[0]->total_hasil_atasan_dinilai == $questionnaire[0]->jumlah_atasan_dinilai) {
                                                        $bg_atas = 'bg-success';
                                                    } else {
                                                        $bg_atas = 'bg-danger';
                                                    } ?>
                                                    <div class="flex-grow-1 <?php echo $bg_atas; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat"
                                                        style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Chat6.svg);">
                                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar
                                                            Penilaian Atassan</h4>
                                                        <div
                                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                                            <?php echo $questionnaire[0]->total_hasil_atasan_dinilai; ?>/<?php echo $questionnaire[0]->jumlah_atasan_dinilai; ?>
                                                        </div>
                                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                                            <?php
                                                            if ($questionnaire[0]->jumlah_atasan_dinilai != 0) { ?>
                                                                <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_employee_leader/' . paramEncrypt($employee[0]->id_pegawai) . '/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
                                                                    class="btn btn-light text-dark font-weight-bold mr-2">Lihat
                                                                    Daftar</a>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-dark font-weight-bolder mr-2"
                                                                    disabled>Tidak Perlu Menilai</button>
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
                                                    if ($questionnaire[0]->total_hasil_bawahan_dinilai == $questionnaire[0]->jumlah_bawahan_dinilai) {
                                                        $bg_bawah = 'bg-success';
                                                    } else {
                                                        $bg_bawah = 'bg-danger';
                                                    } ?>
                                                    <div class="flex-grow-1 <?php echo $bg_bawah; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat"
                                                        style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Chat6.svg);">
                                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar
                                                            Penilaian Bawahan</h4>
                                                        <div
                                                            class="text-inverse-success font-weight-bolder font-size-h2 mt-2">
                                                            <?php echo $questionnaire[0]->total_hasil_bawahan_dinilai; ?>/<?php echo $questionnaire[0]->jumlah_bawahan_dinilai; ?>
                                                        </div>
                                                        <div class="text-inverse-success font-weight-bolder mt-2">
                                                            <?php
                                                            if ($questionnaire[0]->jumlah_bawahan_dinilai != 0) { ?>
                                                                <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_employee_subordinate/' . paramEncrypt($employee[0]->id_pegawai) . '/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>"
                                                                    class="btn btn-light text-dark font-weight-bold mr-2">Lihat
                                                                    Daftar</a>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-dark font-weight-bolder mr-2"
                                                                    disabled>Tidak Perlu Menilai</button>
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

<div class="modal fade" id="modal_pertanyaan_questionnaire" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <!--begin::Timeline-->
                        <div class="timeline timeline-3">
                            <div class="timeline-items">
                                <?php if (!empty($question)) {
                                    foreach ($question as $key => $value) {
                                ?>
                                        <div class="timeline-item">
                                            <div class="timeline-media">
                                                <i class="flaticon-chat text-default"></i>
                                            </div>
                                            <div class="timeline-content">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <div class="mr-2">
                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">
                                                            <?php echo $value->deskripsi_pertanyaan; ?>
                                                        </a>
                                                    </div>
                                                    <span class="label label-light-primary font-weight-bolder label-inline ml-2"><?php echo $value->nama_tipe_pertanyaan; ?></span>
                                                </div>
                                                <p class="p-0">
                                                    <?php echo $value->isi_pertanyaan; ?>
                                                </p>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
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
<script>
    var SUM_PERSONAL = <?php echo $questionnaire[0]->jumlah_personal_dinilai; ?>;
    var SUM_SEJAWAT = <?php echo $questionnaire[0]->jumlah_sejawat_dinilai; ?>;
    var SUM_ATASAN = <?php echo $questionnaire[0]->jumlah_atasan_dinilai; ?>;
    var SUM_BAWAHAN = <?php echo $questionnaire[0]->jumlah_bawahan_dinilai; ?>;

    var CAL_SUM_PERSONAL = <?php echo $questionnaire[0]->total_hasil_personal_dinilai; ?>;
    var CAL_SUM_SEJAWAT = <?php echo $questionnaire[0]->total_hasil_sejawat_dinilai; ?>;
    var CAL_SUM_ATASAN = <?php echo $questionnaire[0]->total_hasil_atasan_dinilai; ?>;
    var CAL_SUM_BAWAHAN = <?php echo $questionnaire[0]->total_hasil_bawahan_dinilai; ?>;

    const primary = " #6993FF";
    const success = "#1BC5BD";
    const info = "#8950FC";
    const warning = "#FFA800";
    const danger = "#F64E60";

    // Chart 3
    new ApexCharts(document.querySelector("#chart_3"), {
        series: [{
                name: "Selesai",
                data: [CAL_SUM_PERSONAL, CAL_SUM_SEJAWAT, CAL_SUM_ATASAN, CAL_SUM_BAWAHAN]
            },
            {
                name: "Belum Selesai",
                data: [SUM_PERSONAL - CAL_SUM_PERSONAL, SUM_SEJAWAT - CAL_SUM_SEJAWAT, SUM_ATASAN - CAL_SUM_ATASAN, SUM_BAWAHAN - CAL_SUM_BAWAHAN]
            }
        ],
        chart: {
            type: "bar",
            height: 423
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"]
        },
        xaxis: {
            categories: ["Kuisioner Personal", "Kuisioner Sejawat", "Kuisioner Atasan", "Kuisioner Bawahan"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: (val) => val + " Kuisioner"
            }
        },
        colors: [success, danger]
    }).render();
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