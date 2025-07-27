<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Dashboard Pegawai</a>
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
            <?php $user = $this->session->userdata('sias-employee'); ?>
            <?php if ($questionnaire) { ?>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $paymentDate = date('Y-m-d');
                $paymentDate = date('Y-m-d', strtotime($paymentDate));

                $contractDateBegin = date('Y-m-d', strtotime(str_replace('/', '-', $questionnaire[0]->tgl_mulai)));
                $contractDateEnd = date('Y-m-d', strtotime(str_replace('/', '-', $questionnaire[0]->tgl_berakhir)));

                if ($paymentDate >= $contractDateBegin && $paymentDate <= $contractDateEnd) {
                    ?>
                    <div class="alert alert-custom alert-light-warning shadow-sm fade show mb-3 text-center" role="alert">              
                        <div class="alert-text text-dark">
                            <h4 class="alert-heading font-weight-boldest blink-hard text-danger">PEMBERITAHUAN!</h4>
                            <h6 class="alert-heading font-weight-bolder blink-hard text-danger">KUISIONER PENILAIAN PEGAWAI TELAH DIBUKA!</h6>
                            Kuisioner "<b><?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?></b>" Terdapat 3 Kriteria Penilaian <b>(PERSONAL/DIRI, SEJAWAT dan ATASAN)</b>. Silahkan melakukan semua instrument <b>PENGISIAN/PENILAIAN</b> Pegawai sebelum Tanggal <b class="text-danger"><?php echo TanggalIndo(strtolower($questionnaire[0]->tgl_berakhir)); ?></b>. 
                            <a href="<?php echo site_url('employee/employe/report/list_employe_report_personal/' . paramEncrypt($user[0]->id_pegawai)); ?>" class="text-danger font-weight-bolder blink-hard">KLIK DISINI</a> atau melalui Menu <b>Penilaian Pegawai</b> untuk melakukan penilaian. Terima Kasih. 
                        </div>                
                    </div>
                <?php } ?>
            <?php } ?>
            <!--begin::Notice-->
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b" style="height: 350px">
                        <!--begin::Body-->
                        <div class="card-body pt-10">                          
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                    <div class="symbol-label" style="background-image:url('<?php echo base_url() . $user[0]->foto_pegawai; ?>')"></div>

                                </div>
                                <div>
                                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?php echo ucwords(strtolower($user[0]->nama_lengkap)); ?></a>
                                    <div class="text-warning font-weight-bolder"><?php echo ucwords(strtolower($user[0]->nama_jabatan)); ?></div>
                                    <div class="mt-2">
                                        <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">
                                            <?php
                                            if ($user[0]->level_tingkat == 1) {
                                                echo 'KB/TK';
                                            } else if ($user[0]->level_tingkat == 3) {
                                                echo 'SD';
                                            } else if ($user[0]->level_tingkat == 4) {
                                                echo 'SMP';
                                            } else if ($user[0]->level_tingkat == 5) {
                                                echo 'SMA';
                                            }
                                            ?>
                                        </a>
                                        <?php if ($user[0]->status_pegawai == 1) { ?>
                                            <a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">TETAP
                                            </a>
                                        <?php } else if ($user[0]->status_pegawai == 0) { ?>
                                            <a href="#" class="btn btn-sm btn-warning font-weight-bold py-2 px-3 px-xxl-5 my-1">TIDAK TETAP
                                            </a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <!--end::User-->
                            <!--begin::Contact-->
                            <div class="pt-8 pb-6">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Email:</span>
                                    <a href="#" class="text-muted text-hover-primary"><?php echo (($user[0]->email)); ?></a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">No. Handphone:</span>
                                    <span class="text-muted"><?php echo (($user[0]->nomor_hp)); ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">NIP:</span>
                                    <span class="text-muted"><?php echo (($user[0]->nip)); ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">NIK KTP:</span>
                                    <span class="text-muted"><?php echo (($user[0]->nik)); ?></span>
                                </div>
                            </div>
                            <!--end::Contact-->
                            <!--begin::Contact-->
                            <div class="pb-10"><?php echo ucwords(strtolower($user[0]->alamat_lengkap)); ?>.</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="col-xl-4">
                    <?php if ($user[0]->level_jabatan == 0) { ?>
                        <div class="row">
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 11-->
                                <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3"><?php echo (($total_employe[0]->total_pegawai)); ?></div>
                                        <a href="#" class="text-inverse-success font-weight-bold font-size-lg mt-1">Total Pegawai</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 11-->
                            </div>
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom bg-warning gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-white font-weight-bolder font-size-h2 mt-3"><?php echo (($total_student[0]->total_siswa)); ?></div>
                                        <a href="#" class="text-inverse-success font-weight-bold font-size-lg mt-1">Total Siswa</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                        </div>
                        <!--begin::Tiles Widget 13-->

                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <!--begin::Engage Widget 2-->
                                <div class="card card-custom mb-7">
                                    <div class="card-body d-flex p-0">
                                        <div class="flex-grow-1 bg-success p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/home/Door-open.svg);">
                                            <h4 class="text-inverse-danger font-weight-bolder">Aktifkan Update Bio Siswa</h4>
                                            <p class="text-inverse-danger my-2">TA <?php echo $schoolyear[0]->tahun_awal . "/" . $schoolyear[0]->tahun_akhir; ?></p>
                                            <?php if (!$status_update_bio) { ?>
                                                <input data-switch="true" class="update_bio_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
                                            <?php } else { ?>
                                                <input data-switch="true" class="update_bio_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
                                            <?php } ?>  
                                            <p class="text-inverse-danger my-2">Tgl Update <br> <b class=""><?php echo $page[0]->tangal_update_bio; ?></b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Engage Widget 2-->
                            <!--end::Card-->
                            <div class="col-lg-6 col-6">
                                <!--begin::Engage Widget 2-->
                                <div class="card card-custom mb-7">
                                    <div class="card-body d-flex p-0">
                                        <div class="flex-grow-1 bg-primary p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%;background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/files/Uploaded-file.svg);">
                                            <h4 class="text-inverse-danger font-weight-bolder">Aktifkan Nilai Pegawai</h4>
                                            <p class="text-inverse-danger my-2">TA <?php echo $schoolyear[0]->tahun_awal . "/" . $schoolyear[0]->tahun_akhir; ?></p>
                                            <?php if (!$status_update_quissionare) { ?>
                                                <input data-switch="true" class="update_quis_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
                                            <?php } else { ?>
                                                <input data-switch="true" class="update_quis_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
                                            <?php } ?>  
                                            <p class="text-inverse-danger my-2">Tgl Update <br> <b class=""><?php echo $page[0]->tangal_update_eval; ?></b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Engage Widget 2-->
                        </div>
                    <?php } else { ?>

                        <div class="card col-xl-12 text-center">
                            <div class="mb-1 mt-9">
                                <h5 class="font-weight-bolder text-success">Total Absen Masuk</h5>                              
                            </div>
                            <div class="row m-2">
                                <div class="card card-custom col-4 bg-success" >
                                    <!--begin::Body-->
                                    <div class="card-body-2 d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-white font-weight-bolder">HADIR</div>
                                            <div class="font-weight-bolder font-size-h3 text-white">
                                                <?php if ($total_present[0]->hadir_masuk == NULL || $total_present[0]->hadir_masuk == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $total_present[0]->hadir_masuk; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->

                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                                <!--end::Stats Widget 6-->
                                <div class="card card-custom col-4  bg-warning" >
                                    <!--begin::Body-->
                                    <div class="card-body-2 d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-white font-weight-bolder">IZIN</div>
                                            <div class="font-weight-bolder font-size-h3 text-white">
                                                <?php if ($total_present[0]->izin_absen_masuk == NULL || $total_present[0]->izin_absen_masuk == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $total_present[0]->izin_absen_masuk; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                                <!--end::Stats Widget 6-->
                                <div class="card card-custom col-4  bg-danger" >
                                    <!--begin::Body-->
                                    <div class="card-body-2 d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-white font-weight-bolder">ALPHA</div>
                                            <div class="font-weight-bolder font-size-h3 text-white">
                                                <?php if ($total_present[0]->alpha_absen_masuk == NULL || $total_present[0]->alpha_absen_masuk == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $total_present[0]->alpha_absen_masuk; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                            </div>
                            <div class="mb-1 mt-4">
                                <h5 class="font-weight-bolder text-danger">Total Absen Pulang</h5>                              
                            </div>
                            <div class="row m-2 mb-9">
                                <div class="card card-custom col-4  bg-success" >
                                    <!--begin::Body-->
                                    <div class="card-body-2 d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-white font-weight-bolder">HADIR</div>
                                            <div class="font-weight-bolder font-size-h3 text-white">
                                                <?php if ($total_present[0]->hadir_pulang == NULL || $total_present[0]->hadir_pulang == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $total_present[0]->hadir_pulang; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->

                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                                <!--end::Stats Widget 6-->
                                <div class="card card-custom col-4  bg-warning" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-white font-weight-bolder">IZIN</div>
                                            <div class="font-weight-bolder font-size-h3 text-white">
                                                <?php if ($total_present[0]->izin_absen_pulang == NULL || $total_present[0]->izin_absen_pulang == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $total_present[0]->izin_absen_pulang; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                                <!--end::Stats Widget 6-->
                                <div class="card card-custom col-4 bg-danger" >
                                    <!--begin::Body-->
                                    <div class="card-body-2 d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-white font-weight-bolder">ALPHA</div>
                                            <div class="font-weight-bolder font-size-h3 text-white">
                                                <?php if ($total_present[0]->alpha_absen_pulang == NULL || $total_present[0]->alpha_absen_pulang == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $total_present[0]->alpha_absen_pulang; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                            </div>
                        </div>

                    <?php } ?>
                </div>
                <div class="col-xl-4">
                    <!--begin::Stats Widget 2-->
                    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/shapes/abstract-2.svg)">
                        <!--begin::Body-->
                        <div class="card-body">
                            <a href="#" class="card-title font-weight-bold text-danger text-hover-primary font-size-h5">Pengumuman</a>
                            <div class="font-weight-bold text-success mt-9 mb-5"><?php echo (($new_announcement[0]->tanggal_post)); ?></div>
                            <p class="text-dark-75 font-weight-bolder font-size-h5 m-0"><?php echo ucwords(strtolower($new_announcement[0]->judul_pengumuman)); ?></p>
                            <p class="text-dark-50 font-weight-normal font-size-md mt-3"><?php echo ucwords(strtolower($new_announcement[0]->keterangan)); ?></p>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 2-->
                </div>
                <?php if ($user[0]->level_jabatan != 0) { ?>
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 11-->
                                <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3"><?php echo (($total_employe[0]->total_pegawai)); ?></div>
                                        <a href="#" class="text-inverse-success font-weight-bold font-size-lg mt-1">Total Pegawai</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 11-->
                            </div>
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom bg-warning gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-white font-weight-bolder font-size-h2 mt-3"><?php echo (($total_student[0]->total_siswa)); ?></div>
                                        <a href="#" class="text-inverse-success font-weight-bold font-size-lg mt-1">Total Siswa</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                        </div>
                        <!--begin::Tiles Widget 13-->
                        <!--end::Content-->
                    </div>
                <?php } ?>
            </div>
        </div>
        <!--end::Profile 4-->
    </div>
    <!--end::Entry-->
    <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</div>
<script>
    var csrfName = $('.txt_csrfname').attr('name');
    var csrfHash = $('.txt_csrfname').val(); // CSRF hash

    var pro = $(".update_bio_switch").bootstrapSwitch();
    pro.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin MENGAKTIFKAN Update Biodata Siswa Sekarang?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1BC5BD",
                confirmButtonText: "Ya, Aktifkan!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("employee/dashboard/change_status_bio_student") ?>",
                        data: {id: '<?php echo paramEncrypt(0); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Diaktifkan!", "Update Biodata Siswa telah diaktifkan!.", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        },
                        error: function (result) {
                            console.log(result);
                            Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                        }
                    });
                } else {
                    pro.bootstrapSwitch('state', false);
                    Swal.fire("Dibatalkan!", "Update Biodata Siswa batal diaktifkan.", "error");
                }
            });
        } else {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin NONAKTIFKAN Update Biodata Siswa Sekarang?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non Aktifkan!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("employee/dashboard/change_status_bio_student") ?>",
                        data: {id: '<?php echo paramEncrypt(1); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Dinonaktifkan!", "Update Biodata Siswa telah dinonaktifkan!.", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        },
                        error: function (result) {
                            console.log(result);
                            Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                        }
                    });
                } else {
                    pro.bootstrapSwitch('state', true);
                    Swal.fire("Dibatalkan!", "Update Biodata Siswa batal dinonaktifkan.", "error");
                }
            });
        }
    });
</script>
<script>
    var csrfName = $('.txt_csrfname').attr('name');
    var csrfHash = $('.txt_csrfname').val(); // CSRF hash

    var pro = $(".update_quis_switch").bootstrapSwitch();
    pro.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin MENGAKTIFKAN Penilaian Pegawai Sekarang?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1BC5BD",
                confirmButtonText: "Ya, Aktifkan!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("employee/dashboard/change_status_eval_employe") ?>",
                        data: {id: '<?php echo paramEncrypt(0); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Diaktifkan!", "Penilaian Pegawai telah diaktifkan!.", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        },
                        error: function (result) {
                            console.log(result);
                            Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                        }
                    });
                } else {
                    pro.bootstrapSwitch('state', false);
                    Swal.fire("Dibatalkan!", "Penilaian Pegawai batal diaktifkan.", "error");
                }
            });
        } else {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin NONAKTIFKAN Penilaian Pegawai Sekarang?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non Aktifkan!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("employee/dashboard/change_status_eval_employe") ?>",
                        data: {id: '<?php echo paramEncrypt(1); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Dinonaktifkan!", "Penilaian Pegawai telah dinonaktifkan!.", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        },
                        error: function (result) {
                            console.log(result);
                            Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                        }
                    });
                } else {
                    pro.bootstrapSwitch('state', true);
                    Swal.fire("Dibatalkan!", "UPenilaian Pegawai batal dinonaktifkan.", "error");
                }
            });
        }
    });
</script>
