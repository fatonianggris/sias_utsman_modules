<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Siswa</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Edit Siswa</a>
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
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <?php echo $this->session->flashdata('flash_message'); ?>
            <?php $user = $this->session->userdata('sias-employee'); ?>
            <!--end::Notice-->
            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin: Wizard-->
                    <div class="wizard wizard-2" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav border-right py-5 px-5 py-lg-20 px-lg-12">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-steps">
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-icon">
                                            <span class="svg-icon svg-icon-2x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">Biodata Siswa</h3>
                                            <div class="wizard-desc">Edit Data Diri Siswa</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->
                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-icon">
                                            <span class="svg-icon svg-icon-2x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">Biodata Orang Tua</h3>
                                            <div class="wizard-desc">Edit Data Orangtua Siswa</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2 Nav-->
                                <!--begin::Wizard Step 3 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-icon">
                                            <span class="svg-icon svg-icon-2x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">Data Alamat Siswa</h3>
                                            <div class="wizard-desc">Edit Data Alamat Siswa</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 3 Nav-->
                                <!--begin::Wizard Step 4 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-icon">
                                            <span class="svg-icon svg-icon-2x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z" fill="#000000" opacity="0.3" />
                                                <path d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z" fill="#000000" />
                                                <path d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z" fill="#000000" />
                                                <path d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000" />
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">Data Periodik</h3>
                                            <div class="wizard-desc">Edit Data Periodik Siswa</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 4 Nav-->
                                <!--begin::Wizard Step 5 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-icon">
                                            <span class="svg-icon svg-icon-2x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1" />
                                                <path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">Upload Berkas</h3>
                                            <div class="wizard-desc">Upload Syarat Berkas Pendaftaran</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 5 Nav-->
                            </div>
                        </div>
                        <!--end: Wizard Nav-->
                        <!--begin: Wizard Body-->
                        <div class="wizard-body py-5 px-5 py-lg-20 px-lg-15">
                            <!--begin: Wizard Form-->
                            <div class="row px-4">
                                <div class="col-xl-12">
                                    <form class="form" method="POST" action="<?php echo site_url('/employee/master/student/update_student/' . paramEncrypt($student[0]->id_siswa)); ?>" enctype="multipart/form-data" id="kt_form_student">
                                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="id_siswa" value="<?php echo $student[0]->id_siswa; ?>">
                                        <!--begin::Wizard Step 1-->
                                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Personal Siswa:</h3>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>NISN</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-user"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="nisn" value="<?php echo $student[0]->nisn; ?>" class="form-control form-control-solid form-control-lg" id="kt_maxlength_nisn" maxlength="10" placeholder="Inputkan NISN Siswa" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>untuk pendaftar yang belum memiliki NISN silahkan isi NIS Siswa</span>
                                                        <small id="info" class="form-control-feedback"></small>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Nomor Formulir Calon Siswa</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-file-text"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="nomor_formulir" class="form-control form-control-solid form-control-lg" placeholder="Nomor Formulir Calon Siswa" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI JIKA ADA, </b>isikan Nomor Formulir jika Ada</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>NIK</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-credit-card"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="nik" value="<?php echo $student[0]->nik; ?>" class="form-control form-control-solid form-control-lg" id="kt_maxlength_nik" maxlength="16" placeholder="Inputkan NIK Siswa" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NIK KTP siswa jika ada</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>No. Akta Kelahiran</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-file-text"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="no_akta_kelahiran" value="<?php echo $student[0]->no_akta_kelahiran; ?>" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Nomor Akra Kelahiran" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan No Akta Kelahiran siswa jika ada</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Nama Lengkap Siswa</label>
                                                        <input type="text" name="nama_lengkap" value="<?php echo $student[0]->nama_lengkap; ?>" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Nama Lengkap Siswa" />
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nama Lengkap sesuai akta kelahiran</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Nama Panggilan Siswa</label>
                                                        <input type="text" name="nama_panggilan" value="<?php echo $student[0]->nama_panggilan; ?>" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Nama Panggilan Siswa" value="Agus" />
                                                        <span class="form-text text-dark"><b>*TIDAK WAJIB DIISI, </b>isikan Nama Panggilan siswa jika ada</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input type="text" name="tempat_lahir" value="<?php echo $student[0]->tempat_lahir; ?>" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Tempat Lahir Siswa" />
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tempat Lahir sesuai akta kelahiran</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <div class="input-group input-group-lg input-group-solid" id="kt_daterangepicker_5">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="tanggal_lahir" value="<?php echo $student[0]->tanggal_lahir; ?>" class="form-control form-control-solid form-control-lg" readonly="readonly" placeholder="Inputkan Tanggal Lahir" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tanggal Lahir sesuai akta kelahiran</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-3">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->jenis_kelamin; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->jenis_kelamin == 1) {
                                                                    echo 'Laki-laki';
                                                                } else if ($student[0]->jenis_kelamin == 2) {
                                                                    echo 'Perempuan';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1">Laki-laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Jenis Kelamin</span>
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-3">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="agama" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->agama; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->agama == 1) {
                                                                    echo 'Islam';
                                                                } else if ($student[0]->agama == 2) {
                                                                    echo 'Kristen';
                                                                } else if ($student[0]->agama == 3) {
                                                                    echo 'Hindu';
                                                                } else if ($student[0]->agama == 4) {
                                                                    echo 'Budha';
                                                                } else if ($student[0]->agama == 5) {
                                                                    echo 'Lainnya';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1">Islam</option>
                                                            <option value="2">Kristen</option>
                                                            <option value="3">Hindu</option>
                                                            <option value="4">Budha</option>
                                                            <option value="5">Lainnya.</option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Agama siswa</span>
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                                <div class="col-xl-3">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>RomBel</label>
                                                        <input name="rombel" type="text" value="<?php echo $student[0]->rombel; ?>" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Rombel Siswa" />
                                                        <span class="form-text text-dark"><b>*TIDAK WAJIB DIISI, </b>isikan RomBel siswa</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group">
                                                        <label>Tahun Ajaran</label>
                                                        <select name="th_ajaran" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->th_ajaran; ?>" selected="">
                                                                <?php
                                                                echo $student[0]->nama_tahun_ajaran;
                                                                ?>
                                                            </option> 
                                                            <?php
                                                            if (!empty($schoolyear)) {
                                                                foreach ($schoolyear as $key => $value_sch) {
                                                                    ?>
                                                                    <option value="<?php echo $value_sch->id_tahun_ajaran; ?>"><?php echo ucwords(strtolower($value_sch->nama_tahun_ajaran)); ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Tahun Ajaran</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="separator separator-dashed my-10"></div>
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Kontak Siswa:</h3>

                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Nomor HP Siswa/Orangtua</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text font-weight-bold">
                                                                    (62)
                                                                </span>
                                                            </div>
                                                            <input type="text" name="nomor_handphone" value="<?php echo $student[0]->nomor_handphone; ?>" id="kt_maxlength_nohp" class="form-control form-control-lg form-control-solid" maxlength="13" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nomor HP Siswa/Orangtua, Contoh: 89526352763</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Nomor Telepon</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-phone"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="nomor_telepon" value="<?php echo $student[0]->nomor_telepon; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Nomor Telepon" />
                                                        </div>
                                                        <span class="form-text text-dark"><b>*TIDAK WAJIB DIISI, </b>isikan Nomor Telepon jika ada</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Email Siswa/Orangtua</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="email" type="email" value="<?php echo $student[0]->email; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Email Siswa" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Email Siswa/Orangtua</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 1-->
                                        <!--begin: Wizard Step 2-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Ayah Siswa:</h3>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Nama Lengkap Ayah</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="text" name="nama_ayah" value="<?php echo $student[0]->nama_ayah; ?>" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Nama Lengkap Ayah" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nama Lengkap Ayah</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>NIK KTP</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-credit-card"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="nik_ayah" value="<?php echo $student[0]->nik_ayah; ?>" class="form-control form-control-solid form-control-lg" id="kt_maxlength_nik_ayah" maxlength="16" placeholder="Inputkan NIK Ayah" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NIK Ayah sesuai KTP</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir Ayah</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="tempat_lahir_ayah" type="text" value="<?php echo $student[0]->tempat_lahir_ayah; ?>" class="form-control form-control-lg form-control-solid" placeholder="Tempat Lahir" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tempat Lahir Ayah</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir Ayah</label>
                                                        <div class="input-group input-group-lg input-group-solid" id="kt_daterangepicker_ayah">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                            <input name="tanggal_lahir_ayah" type="text" value="<?php echo $student[0]->tanggal_lahir_ayah; ?>" class="form-control form-control-lg form-control-solid" readonly="readonly" placeholder="Inputkan Tanggal Lahir Ayah" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tanggal Lahir Ayah</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Pekerjaan Ayah</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="text" name="pekerjaan_ayah" value="<?php echo $student[0]->pekerjaan_ayah; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Pekerjaan Ayah" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Pekerjaan Ayah</span>
                                                        <!--end::Select-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Input-->
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Pendidikan Ayah</label>
                                                        <!--begin::Select-->
                                                        <select name="pendidikan_ayah" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->pendidikan_ayah; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->pendidikan_ayah == 1) {
                                                                    echo 'Tidak Sekolah';
                                                                } else if ($student[0]->pendidikan_ayah == 2) {
                                                                    echo 'SD';
                                                                } else if ($student[0]->pendidikan_ayah == 3) {
                                                                    echo 'SMP';
                                                                } else if ($student[0]->pendidikan_ayah == 4) {
                                                                    echo 'SMA';
                                                                } else if ($student[0]->pendidikan_ayah == 5) {
                                                                    echo 'D-I/D-II';
                                                                } else if ($student[0]->pendidikan_ayah == 6) {
                                                                    echo 'D-III';
                                                                } else if ($student[0]->pendidikan_ayah == 7) {
                                                                    echo 'D-IV/S1';
                                                                } else if ($student[0]->pendidikan_ayah == 8) {
                                                                    echo 'S2/S3';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1">Tidak Sekolah</option>
                                                            <option value="2">SD</option>
                                                            <option value="3">SLTP</option>
                                                            <option value="4">SLTA</option>
                                                            <option value="5">D-I/D-II</option>
                                                            <option value="6">D-III</option>
                                                            <option value="7">D-IV/S1</option>
                                                            <option value="8">S2/S3</option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Pendidikan Ayah</span>
                                                        <!--end::Select-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-5">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Penghasilan Ayah</label>
                                                        <select name="penghasilan_ayah" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->penghasilan_ayah; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->penghasilan_ayah == 1) {
                                                                    echo 'Kurang dari Rp. 1.500.000';
                                                                } else if ($student[0]->penghasilan_ayah == 2) {
                                                                    echo 'Rp. 1.500.000 - Rp. 2.500.000';
                                                                } else if ($student[0]->penghasilan_ayah == 3) {
                                                                    echo 'Rp. 2.500.000 - RP. 3.500.000';
                                                                } else if ($student[0]->penghasilan_ayah == 4) {
                                                                    echo 'Rp. 3.500.000 - Rp. 4.500.000';
                                                                } else if ($student[0]->penghasilan_ayah == 5) {
                                                                    echo 'Rp. 4.500.000 - Rp. 5.500.000';
                                                                } else if ($student[0]->penghasilan_ayah == 6) {
                                                                    echo 'Lebih dari Rp. 5.500.000';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1"> Kurang dari Rp. 1.500.000</option>
                                                            <option value="2">Rp. 1.500.000 - Rp. 2.500.000</option>
                                                            <option value="3">Rp. 2.500.000 - RP. 3.500.000</option>
                                                            <option value="4">Rp. 3.500.000 - Rp. 4.500.000</option>
                                                            <option value="5">Rp. 4.500.000 - Rp. 5.500.000</option>
                                                            <option value="6">Lebih dari Rp. 5.500.000</option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Penghasilan Ayah</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-2">
                                                    <label>Jadikan Wali?</label>
                                                    <?php if ($student[0]->status_wali == 1) { ?>
                                                        <span class="switch switch-lg switch-icon">
                                                            <label>
                                                                <input type="checkbox" id="wali_ayah" name="status_wali" value="1" checked>
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="switch switch-lg switch-icon">
                                                            <label>
                                                                <input type="checkbox" id="wali_ayah" value="1" name="status_wali">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    <?php } ?>
                                                    <small id="info_checkbox_ayah" class="fv-plugins-message-container text-danger"></small>
                                                </div>
                                            </div>

                                            <div class="separator separator-dashed my-10"></div>
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Ibu Siswa:</h3>

                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Nama Lengkap Ibu</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="text" name="nama_ibu" value="<?php echo $student[0]->nama_ibu; ?>" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Nama Lengkap Ibu" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nama Lengkap Ibu</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>NIK KTP</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-credit-card"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="nik_ibu" value="<?php echo $student[0]->nik_ibu; ?>" class="form-control form-control-solid form-control-lg" id="kt_maxlength_nik_ibu" maxlength="16" placeholder="Inputkan NIK Ibu" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NIK Ibu sesuai KTP</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir Ibu</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="tempat_lahir_ibu" type="text" value="<?php echo $student[0]->tempat_lahir_ibu; ?>" class="form-control form-control-lg form-control-solid" placeholder="Tempat Lahir" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tempat Lahir Ibu</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir Ibu</label>
                                                        <div class="input-group input-group-lg input-group-solid" id="kt_daterangepicker_ibu">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="tanggal_lahir_ibu" value="<?php echo $student[0]->tanggal_lahir_ibu; ?>" class="form-control form-control-lg form-control-solid" readonly="readonly" placeholder="Inputkan Tanggal Lahir Ibu" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tanggal Lahir Ibu</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Pekerjaan Ibu</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="pekerjaan_ibu" type="text" value="<?php echo $student[0]->pekerjaan_ibu; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Pekerjaan Ibu" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Pekerjaan Ibu</span>
                                                        <!--end::Select-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Input-->
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Pendidikan Ibu</label>
                                                        <!--begin::Select-->
                                                        <select name="pendidikan_ibu" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->pendidikan_ibu; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->pendidikan_ibu == 1) {
                                                                    echo 'Tidak Sekolah';
                                                                } else if ($student[0]->pendidikan_ibu == 2) {
                                                                    echo 'SD';
                                                                } else if ($student[0]->pendidikan_ibu == 3) {
                                                                    echo 'SMP';
                                                                } else if ($student[0]->pendidikan_ibu == 4) {
                                                                    echo 'SMA';
                                                                } else if ($student[0]->pendidikan_ibu == 5) {
                                                                    echo 'D-I/D-II';
                                                                } else if ($student[0]->pendidikan_ibu == 6) {
                                                                    echo 'D-III';
                                                                } else if ($student[0]->pendidikan_ibu == 7) {
                                                                    echo 'D-IV/S1';
                                                                } else if ($student[0]->pendidikan_ibu == 8) {
                                                                    echo 'S2/S3';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1">Tidak Sekolah</option>
                                                            <option value="2">SD</option>
                                                            <option value="3">SLTP</option>
                                                            <option value="4">SLTA</option>
                                                            <option value="5">D-I/D-II</option>
                                                            <option value="6">D-III</option>
                                                            <option value="7">D-IV/S1</option>
                                                            <option value="8">S2/S3</option>
                                                        </select>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Pendidikan Ibu</span>
                                                        <!--end::Select-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-5">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Penghasilan Ibu</label>
                                                        <select name="penghasilan_ibu" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->penghasilan_ibu; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->penghasilan_ibu == 1) {
                                                                    echo 'Kurang dari Rp. 1.500.000';
                                                                } else if ($student[0]->penghasilan_ibu == 2) {
                                                                    echo 'Rp. 1.500.000 - Rp. 2.500.000';
                                                                } else if ($student[0]->penghasilan_ibu == 3) {
                                                                    echo 'Rp. 2.500.000 - RP. 3.500.000';
                                                                } else if ($student[0]->penghasilan_ibu == 4) {
                                                                    echo 'Rp. 3.500.000 - Rp. 4.500.000';
                                                                } else if ($student[0]->penghasilan_ibu == 5) {
                                                                    echo 'Rp. 4.500.000 - Rp. 5.500.000';
                                                                } else if ($student[0]->penghasilan_ibu == 6) {
                                                                    echo 'Lebih dari Rp. 5.500.000';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1"> Kurang dari Rp. 1.500.000</option>
                                                            <option value="2">Rp. 1.500.000 - Rp. 2.500.000</option>
                                                            <option value="3">Rp. 2.500.000 - RP. 3.500.000</option>
                                                            <option value="4">Rp. 3.500.000 - Rp. 4.500.000</option>
                                                            <option value="5">Rp. 4.500.000 - Rp. 5.500.000</option>
                                                            <option value="6"> Lebih dari Rp. 5.500.000</option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Penghasilan Ibu</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-2">
                                                    <label>Jadikan Wali?</label>
                                                    <?php if ($student[0]->status_wali == 2) { ?>
                                                        <span class="switch switch-lg switch-icon">
                                                            <label>
                                                                <input type="checkbox" id="wali_ibu" name="status_wali" value="2" checked>
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="switch switch-lg switch-icon">
                                                            <label>
                                                                <input type="checkbox" id="wali_ibu" value="2" name="status_wali">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    <?php } ?>
                                                    <small id="info_checkbox_ibu" class="fv-plugins-message-container text-danger"></small>
                                                </div>
                                            </div>

                                            <div class="separator separator-dashed my-10"></div>
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Wali Siswa:</h3>

                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Nama Lengkap Wali</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="nama_wali" type="text" value="<?php echo $student[0]->nama_wali; ?>" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Nama Lengkap Wali" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nama Lengkap Wali</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>NIK KTP</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-credit-card"></i>
                                                                </span>
                                                            </div>
                                                            <input name="nik_wali" type="text" value="<?php echo $student[0]->nik_wali; ?>" class="form-control form-control-solid form-control-lg" id="kt_maxlength_nik_wali" maxlength="16" placeholder="Inputkan NIK Wali" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">* WAJIB DIISI, </b>isikan NIK Wali sesuai KTP</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir Wali</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="tempat_lahir_wali" type="text" value="<?php echo $student[0]->tempat_lahir_wali; ?>" class="form-control form-control-lg form-control-solid" placeholder="Tempat Lahir" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Tempat Lahir Wali</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir Wali</label>
                                                        <div class="input-group input-group-lg input-group-solid" id="kt_daterangepicker_wali">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="tanggal_lahir_wali" value="<?php echo $student[0]->tanggal_lahir_wali; ?>" class="form-control input-group-lg input-group-solid" readonly="" placeholder="Inputkan Tanggal Lahir Wali" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tanggal Lahir Wali</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Pekerjaan Wali</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="pekerjaan_wali" type="text" value="<?php echo $student[0]->pekerjaan_wali; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Pekerjaan Wali" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Pekerjaan Wali</span>
                                                        <!--end::Select-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Input-->
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Pendidikan Wali</label>
                                                        <!--begin::Select-->
                                                        <select name="pendidikan_wali" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->pendidikan_wali; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->pendidikan_wali == 1) {
                                                                    echo 'Tidak Sekolah';
                                                                } else if ($student[0]->pendidikan_wali == 2) {
                                                                    echo 'SD';
                                                                } else if ($student[0]->pendidikan_wali == 3) {
                                                                    echo 'SMP';
                                                                } else if ($student[0]->pendidikan_wali == 4) {
                                                                    echo 'SMA';
                                                                } else if ($student[0]->pendidikan_wali == 5) {
                                                                    echo 'D-I/D-II';
                                                                } else if ($student[0]->pendidikan_wali == 6) {
                                                                    echo 'D-III';
                                                                } else if ($student[0]->pendidikan_wali == 7) {
                                                                    echo 'D-IV/S1';
                                                                } else if ($student[0]->pendidikan_wali == 8) {
                                                                    echo 'S2/S3';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1">Tidak Sekolah</option>
                                                            <option value="2">SD</option>
                                                            <option value="3">SLTP</option>
                                                            <option value="4">SLTA</option>
                                                            <option value="5">D-I/D-II</option>
                                                            <option value="6">D-III</option>
                                                            <option value="7">D-IV/S1</option>
                                                            <option value="8">S2/S3</option>
                                                        </select>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Pendidikan Wali</span>
                                                        <!--end::Select-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-5">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Penghasilan Wali</label>
                                                        <select name="penghasilan_wali" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->penghasilan_ibu; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->penghasilan_wali == 1) {
                                                                    echo 'Kurang dari Rp. 1.500.000';
                                                                } else if ($student[0]->penghasilan_wali == 2) {
                                                                    echo 'Rp. 1.500.000 - Rp. 2.500.000';
                                                                } else if ($student[0]->penghasilan_wali == 3) {
                                                                    echo 'Rp. 2.500.000 - RP. 3.500.000';
                                                                } else if ($student[0]->penghasilan_wali == 4) {
                                                                    echo 'Rp. 3.500.000 - Rp. 4.500.000';
                                                                } else if ($student[0]->penghasilan_wali == 5) {
                                                                    echo 'Rp. 4.500.000 - Rp. 5.500.000';
                                                                } else if ($student[0]->penghasilan_wali == 6) {
                                                                    echo 'Lebih dari Rp. 5.500.000';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1"> Kurang dari Rp. 1.500.000</option>
                                                            <option value="2">Rp. 1.500.000 - Rp. 2.500.000</option>
                                                            <option value="3">Rp. 2.500.000 - RP. 3.500.000</option>
                                                            <option value="4">Rp. 3.500.000 - Rp. 4.500.000</option>
                                                            <option value="5">Rp. 4.500.000 - Rp. 5.500.000</option>
                                                            <option value="6"> Lebih dari Rp. 5.500.000</option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Penghasilan Wali</span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <h6 id="info_wali" class="font-size-h6"></h6>
                                        </div>
                                        <!--end: Wizard Step 2-->
                                        <!--begin: Wizard Step 3-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Alamat KK:</h3>
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group ">
                                                        <label>Alamat KK Lengkap</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <textarea class="form-control" name="alamat_rumah_kk" rows="3"><?php echo $student[0]->alamat_rumah_kk; ?></textarea>
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Alamat KK Lengkap</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group ">
                                                        <label>Provinsi KK</label>
                                                        <select name="provinsi_kk" id="provinsi_kk" class="form-control form-control-lg form-control-solid select2">
                                                            <option value="<?php echo $student[0]->provinsi_kk; ?>" selected="">
                                                                <?php echo ucwords(strtolower($student[0]->nama_provinsi_kk)); ?>
                                                            </option>
                                                            <?php
                                                            if (!empty($provinsi)) {
                                                                foreach ($provinsi as $key => $value_prov_kk) {
                                                                    ?>
                                                                    <option value="<?php echo $value_prov_kk->id; ?>"><?php echo ucwords(strtolower($value_prov_kk->nama)); ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Provinsi</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group ">
                                                        <label>Kabupaten/Kota KK</label>
                                                        <select name="kabupaten_kota_kk" id="kabupaten_kota_kk" class="form-control form-control-lg form-control-solid select2">
                                                            <option value="<?php echo $student[0]->kabupaten_kota_kk; ?>" selected="">
                                                                <?php echo ucwords(strtolower($student[0]->nama_kabupaten_kota_kk)); ?> [<?php echo strtoupper($student[0]->nama_kabupaten_kota_kk_adm); ?>]
                                                            </option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kabupaten/Kota</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group ">
                                                        <label>Kecamatan KK</label>
                                                        <select name="kecamatan_kk" id="kecamatan_kk" class="form-control form-control-lg form-control-solid select2">
                                                            <option value="<?php echo $student[0]->kecamatan_kk; ?>" selected="">
                                                                <?php echo ucwords(strtolower($student[0]->nama_kecamatan_kk)); ?>
                                                            </option>

                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kecamatan</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group ">
                                                        <label>Kelurahan/Desa KK</label>
                                                        <select name="kelurahan_desa_kk" id="kelurahan_desa_kk" class="form-control form-control-lg  form-control-solid select2">
                                                            <option value="<?php echo $student[0]->kelurahan_desa_kk; ?>" selected="">
                                                                <?php echo ucwords(strtolower($student[0]->nama_kelurahan_desa_kk)); ?> [<?php echo strtoupper($student[0]->nama_kelurahan_desa_kk_adm); ?>]
                                                            </option>

                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Desa/kelurahan</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-2">
                                                    <div class="form-group ">
                                                        <label>RT KK</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="rt_kk" type="text" value="<?php echo $student[0]->rt_kk; ?>" class="form-control form-control-lg form-control-solid" id="kt_maxlength_rt" maxlength="3" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan RT</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2">
                                                    <div class="form-group ">
                                                        <label>RW KK</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="rw_kk" type="text" value="<?php echo $student[0]->rw_kk; ?>" class="form-control form-control-lg form-control-solid" id="kt_maxlength_rw" maxlength="3" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan RW</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <div class="form-group">
                                                        <label>Kodepos KK</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="kodepos_kk" type="text" value="<?php echo $student[0]->kodepos_kk; ?>" class="form-control form-control-lg form-control-solid" id="kt_maxlength_kodepos" maxlength="6" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kodepos</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <label>Jadikan Alamat Domisili?</label>
                                                    <?php if ($student[0]->status_alamat == 1) { ?>
                                                        <span class="switch switch-lg switch-icon">
                                                            <label>
                                                                <input type="checkbox" id="alamat" name="status_alamat" value="1" checked>
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="switch switch-lg switch-icon">
                                                            <label>
                                                                <input type="checkbox" id="alamat" value="1" name="status_alamat">
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    <?php } ?>
                                                    <small id="info_checkbox_alamat" class="fv-plugins-message-container text-danger"></small>
                                                </div>
                                                <div class="col-xl-1">
                                                </div>
                                            </div>
                                            <div class="separator separator-dashed my-10"></div>
                                            <!--end::Input-->
                                            <!--begin::Input-->
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Alamat Domisili Sekarang:</h3>
                                            <!--end::Input-->
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group ">
                                                        <label>Alamat Domisili Sekarang Lengkap</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <textarea class="form-control" name="alamat_rumah_dom" rows="3"><?php echo $student[0]->alamat_rumah_dom; ?></textarea>
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Alamat Domisili Lengkap</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group ">
                                                        <label>Provinsi Domisili</label>
                                                        <select name="provinsi_dom" id="provinsi_dom" class="form-control form-control-lg form-control-solid select2">
                                                            <option value="<?php echo $student[0]->provinsi_dom; ?>" selected="">
                                                                <?php echo ucwords(strtolower($student[0]->nama_provinsi_dom)); ?>
                                                            </option>
                                                            <option value="">Pilih Provinsi</option>
                                                            <?php
                                                            if (!empty($provinsi)) {
                                                                foreach ($provinsi as $key => $value_prov_dom) {
                                                                    ?>
                                                                    <option value="<?php echo $value_prov_dom->id; ?>"><?php echo ucwords(strtolower($value_prov_dom->nama)); ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Provinsi</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group ">
                                                        <label>Kabupaten/Kota Domisili</label>
                                                        <select name="kabupaten_kota_dom" id="kabupaten_kota_dom" class="form-control form-control-lg  form-control-solid select2">
                                                            <option value="<?php echo $student[0]->kabupaten_kota_dom; ?>" selected="">
                                                                <?php echo ucwords(strtolower($student[0]->nama_kabupaten_kota_dom)); ?> [<?php echo strtoupper($student[0]->nama_kabupaten_kota_dom_adm); ?>]
                                                            </option>

                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kabupaten/Kota</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group ">
                                                        <label>Kecamatan Domisili</label>
                                                        <select name="kecamatan_dom" id="kecamatan_dom" class="form-control form-control-lg form-control-solid select2">
                                                            <option value="<?php echo $student[0]->kecamatan_dom; ?>" selected="">
                                                                <?php echo ucwords(strtolower($student[0]->nama_kecamatan_dom)); ?>
                                                            </option>

                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kecamatan</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group ">
                                                        <label>Kelurahan/Desa Domisili</label>
                                                        <select name="kelurahan_desa_dom" id="kelurahan_desa_dom" class="form-control form-control-lg  form-control-solid select2">
                                                            <option value="<?php echo $student[0]->kelurahan_desa_dom; ?>" selected="">
                                                                <?php echo ucwords(strtolower($student[0]->nama_kelurahan_desa_dom)); ?> [<?php echo strtoupper($student[0]->nama_kelurahan_desa_dom_adm); ?>]
                                                            </option>

                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kelurahan/Desa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-2">
                                                    <div class="form-group ">
                                                        <label>RT Dom.</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="rt_dom" type="text" value="<?php echo $student[0]->rt_dom; ?>" class="form-control form-control-lg form-control-solid" placeholder="RT" id="kt_maxlength_rt_dom" maxlength="3" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan RT</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2">
                                                    <div class="form-group ">
                                                        <label>RW Dom.</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="rw_dom" type="text" value="<?php echo $student[0]->rw_dom; ?>" class="form-control form-control-lg form-control-solid" placeholder="RW" id="kt_maxlength_rw_dom" maxlength="3" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan RW</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <div class="form-group">
                                                        <label>Kodepos Domisili</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="kodepos_dom" type="text" value="<?php echo $student[0]->kodepos_dom; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Kodepos" id="kt_maxlength_kodepos_dom" maxlength="6" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kodepos</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-1">
                                                </div>
                                            </div>
                                            <!--end::Select-->
                                            <h6 id="info_alamat" class="font-size-h6"></h6>
                                        </div>
                                        <!--end: Wizard Step 3-->
                                        <!--begin::Wizard Step 4-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Periodik Siswa:</h3>
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-3">
                                                    <div class="form-group">
                                                        <label>Alat Transportasi</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="alat_transportasi" type="text" value="<?php echo $student[0]->alat_transportasi; ?>" class="form-control form-control-lg form-control-solid" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Alat Transportasi Siswa</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="form-group">
                                                        <label>Jenis Tempat Tinggal</label>
                                                        <select name="jenis_tinggal" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->jenis_tinggal; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->jenis_tinggal == 1) {
                                                                    echo 'Bersama Orangtua';
                                                                } else if ($student[0]->jenis_tinggal == 2) {
                                                                    echo 'Asrama';
                                                                } else if ($student[0]->jenis_tinggal == 3) {
                                                                    echo 'Kos';
                                                                } else if ($student[0]->jenis_tinggal == 4) {
                                                                    echo 'Bersama Nenek/Kakek';
                                                                } else if ($student[0]->jenis_tinggal == 5) {
                                                                    echo 'Bersama Wali';
                                                                } else if ($student[0]->jenis_tinggal == 6) {
                                                                    echo 'Lainnya';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1">Bersama Orangtua</option>
                                                            <option value="2">Asrama</option>
                                                            <option value="3">Kos</option>
                                                            <option value="4">Bersama Nenek/Kakek</option>
                                                            <option value="5">Bersama Wali</option>
                                                            <option value="6">Lainnya</option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>piluh Jenis Tempat Tinggal Siswa</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Jarak Rumah ke Sekolah</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="jarak_rumah_sekolah" type="text" value="<?php echo $student[0]->jarak_rumah_sekolah; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Jarak Rumah - Sekolah" />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text font-weight-bolder">.Km</span>
                                                            </div>
                                                        </div>
                                                        <span class="form-text text-dark"><b>*TIDAK WAJIB DIISI, </b>isikan Jarak Rumah ke Sekolah</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Jumlah Saudara</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="jumlah_saudara" type="text" value="<?php echo $student[0]->jumlah_saudara; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Jumlah Saudara" />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text font-weight-bolder">.Sdr</span>
                                                            </div>
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Jumlah Saudara</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Anak Ke-</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-user"></i>
                                                                </span>
                                                            </div>
                                                            <input name="anak_ke" type="text" value="<?php echo $student[0]->anak_ke; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Anak ke-" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Siswa Anak ke</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2">

                                                </div>
                                                <div class="col-xl-2">

                                                </div>
                                            </div>
                                            <div class="separator separator-dashed my-10"></div>
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Jasmani Siswa:</h3>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Berkebutuhan Khusus</label>
                                                        <div class="radio-inline">
                                                            <label class="radio radio-lg">
                                                                <input type="radio" name="kebutuhan_khusus" <?php echo ($student[0]->kebutuhan_khusus == '0') ? 'checked' : '' ?> value="0">
                                                                <span></span>Tidak</label>
                                                            <label class="radio radio-lg">
                                                                <input type="radio" name="kebutuhan_khusus" <?php echo ($student[0]->kebutuhan_khusus == '1') ? 'checked' : '' ?> value="1">
                                                                <span></span>Ya</label>
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih salah satu</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Tinggi Badan</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="tinggi_badan" type="text" value="<?php echo $student[0]->tinggi_badan; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Tinggi Badan" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text font-weight-bolder">.Cm</span>
                                                            </div>
                                                        </div>
                                                        <span class="form-text text-dark"><b>*TIDAK WAJIB DIISI, </b>isikan Tinggi Badan Siswa</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Berat Badan</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="berat_badan" type="text" value="<?php echo $student[0]->berat_badan; ?>" class="form-control form-control-lg form-control-solid" placeholder="Inputkan Berat Badan" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text font-weight-bolder">.Kg</span>
                                                            </div>
                                                        </div>
                                                        <span class="form-text text-dark"><b>*TIDAK WAJIB DIISI, </b>isikan Berat Badan Siswa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Input-->
                                            <div class="separator separator-dashed my-10"></div>
                                            <h3 class="mb-10 font-weight-bold text-dark">Informasi Akademik Siswa:</h3>
                                            <div class="row">

                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Level Tingkat</label>
                                                        <select name="level_tingkat" id="tingkat" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->level_tingkat; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->level_tingkat == 1) {
                                                                    echo 'KB';
                                                                } else if ($student[0]->level_tingkat == 2) {
                                                                    echo 'TK';
                                                                } else if ($student[0]->level_tingkat == 3) {
                                                                    echo 'SD';
                                                                } else if ($student[0]->level_tingkat == 4) {
                                                                    echo 'SMP';
                                                                } else if ($student[0]->level_tingkat == 5) {
                                                                    echo 'SMA';
                                                                }
                                                                ?>
                                                            </option>
                                                            <?php if ($user[0]->level_jabatan == 0) { ?>
                                                                <option value="1">KB/TK</option>
                                                                <option value="2">TK</option>  
                                                                <option value="3">SD</option>
                                                                <option value="4">SMP</option>
                                                                <option value="5">SMA</option>                                                               

                                                            <?php } else { ?>
                                                                <?php if ($user[0]->level_tingkat == 1) { ?>
                                                                    <option value="1">KB</option>            
                                                                    <option value="2">TK</option>  
                                                                <?php } elseif ($user[0]->level_tingkat == 3) { ?>
                                                                    <option value="3">SD</option>
                                                                <?php } elseif ($user[0]->level_tingkat == 4) { ?>
                                                                    <option value="4">SMP</option>
                                                                <?php } elseif ($user[0]->level_tingkat == 5) { ?>
                                                                    <option value="5">SMA</option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Level Tingkat</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div class="form-group">
                                                        <label>Tingkat Siswa</label>
                                                        <select name="id_tingkat" id="kelas" class="form-control form-control-solid form-control-lg">
                                                            <option value="">Pilih Tingkat Siswa</option>

                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Tingkat Siswa</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div class="form-group">
                                                        <label>Jalur Siswa</label>
                                                        <select name="jalur" class="form-control form-control-solid form-control-lg">
                                                            <option value="<?php echo $student[0]->jalur; ?>" selected="">
                                                                <?php
                                                                if ($student[0]->jalur == 1) {
                                                                    echo 'Reguler';
                                                                } else if ($student[0]->jalur == 2) {
                                                                    echo 'ICP';
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="1">Reguler</option>
                                                            <option value="2">ICP</option>
                                                        </select>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Jalur Siswa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Ubah password?</label>
                                                        <div class="input-group">
                                                            <input data-switch="true" class="ubahpass" data-size="large" type="checkbox" data-on-text="Ya" data-off-text="Tidak" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger"></b>*Aktifkan jika ingin mengubah password</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="password" type="password" class="form-control form-control-lg form-control-solid" placeholder="Isikan Password" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Password</span>

                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group">
                                                        <label>Konfirmasi Password</label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input name="cf_password" type="password" class="form-control form-control-lg form-control-solid" placeholder="Isikan Konfirmasi Password" />
                                                        </div>
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Konfirmasi Password</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 4-->
                                        <!--begin::Wizard Step 5-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <h3 class="mb-20 font-weight-bold text-dark">Upload Berkas:</h3>
                                            <div class="row ">
                                                <div class="col-xl-4">
                                                    <div class="form-group ">
                                                        <label>Upload Pas Foto 3x4</label>
                                                        <input type="text" name="foto_siswa_temp" value="<?php echo $student[0]->foto_siswa ?>" style="display:none" />
                                                        <input type="text" name="foto_siswa_temp_thumb" value="<?php echo $student[0]->foto_siswa_thumb; ?>" style="display:none" />
                                                        <input type="file" class="dropify_pf" name="foto_siswa" data-default-file="<?php echo base_url() . $student[0]->foto_siswa; ?>" data-max-file-size="3M" data-height="200" data-allowed-file-extensions="png jpg jpeg" />
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>format file png,jpg,jpeg dan ukuran < 3Mb</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="form-group ">
                                                        <label>Foto Akta Kelahiran</label>
                                                        <input type="text" name="akta_kelahiran_temp" value="<?php echo $student[0]->akta_kelahiran ?>" style="display:none" />
                                                        <input type="text" name="akta_kelahiran_temp_thumb" value="<?php echo $student[0]->akta_kelahiran_thumb; ?>" style="display:none" />
                                                        <input type="file" class="dropify_ak" name="akta_kelahiran" data-default-file="<?php echo base_url() . $student[0]->akta_kelahiran; ?>" data-max-file-size="3M" data-height="200" data-allowed-file-extensions="png jpg jpeg" />
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>format file png,jpg,jpeg dan ukuran < 3Mb</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-xl-12">
                                                    <div class="form-group ">
                                                        <label>Foto Kartu Keluarga</label>
                                                        <input type="text" name="kartu_keluarga_temp" value="<?php echo $student[0]->kartu_keluarga ?>" style="display:none" />
                                                        <input type="text" name="kartu_keluarga_temp_thumb" value="<?php echo $student[0]->kartu_keluarga_thumb; ?>" style="display:none" />
                                                        <input type="file" class="dropify_kk" name="kartu_keluarga" data-default-file="<?php echo base_url() . $student[0]->kartu_keluarga; ?>" data-max-file-size="3M" data-height="200" data-allowed-file-extensions="png jpg jpeg" />
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>format file png,jpg,jpeg dan ukuran < 3Mb</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Wizard Step 5-->
                                        <!--begin: Wizard Actions-->
                                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                            </div>
                                        </div>
                                        <!--end: Wizard Actions-->
                                    </form>
                                </div>
                                <!--end: Wizard-->
                            </div>
                            <!--end: Wizard Form-->
                        </div>
                        <!--end: Wizard Body-->
                    </div>
                    <!--end: Wizard-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/custom/wizard/wizard-student-edit.js">
</script>

<script>

    $(document).ready(function () {

        var info_wali = document.getElementById('info_wali');
        var info_checkbox_ayah = document.getElementById('info_checkbox_ayah');
        var info_checkbox_ibu = document.getElementById('info_checkbox_ibu');
        var info_checkbox_alamat = document.getElementById('info_checkbox_alamat');

        var nama_ayah = $('input[name="nama_ayah"]');
        var nik_ayah = $('input[name="nik_ayah"]');
        var tmptl_ayah = $('input[name="tempat_lahir_ayah"]');
        var tgl_ayah = $('input[name="tanggal_lahir_ayah"]');
        var pkrj_ayah = $('input[name="pekerjaan_ayah"]');
        var pnd_ayah = $('select[name="pendidikan_ayah"]');
        var png_ayah = $('select[name="penghasilan_ayah"]');

        var nama_ibu = $('input[name="nama_ibu"]');
        var nik_ibu = $('input[name="nik_ibu"]');
        var tmptl_ibu = $('input[name="tempat_lahir_ibu"]');
        var tgl_ibu = $('input[name="tanggal_lahir_ibu"]');
        var pkrj_ibu = $('input[name="pekerjaan_ibu"]');
        var pnd_ibu = $('select[name="pendidikan_ibu"]');
        var png_ibu = $('select[name="penghasilan_ibu"]');

        var alamat_rumah_kk = $('textarea[name="alamat_rumah_kk"]');
        var provinsi_kk = $('select[name="provinsi_kk"]');
        var kabupaten_kota_kk = $('select[name="kabupaten_kota_kk"]');
        var kecamatan_kk = $('select[name="kecamatan_kk"]');
        var kelurahan_desa_kk = $('select[name="kelurahan_desa_kk"]');
        var rt_kk = $('input[name="rt_kk"]');
        var rw_kk = $('input[name="rw_kk"]');
        var kodepos_kk = $('input[name="kodepos_kk"]');

        $('#alamat').click(function () {
            if ($(this).prop("checked") == true) {

                $('textarea[name="alamat_rumah_dom"]').val(alamat_rumah_kk.val()).prop('readonly', true);
                $('input[name="rt_dom"]').val(rt_kk.val()).prop('readonly', true);
                $('input[name="rw_dom"]').val(rw_kk.val()).prop('readonly', true);
                $('input[name="kodepos_dom"]').val(kodepos_kk.val()).prop('readonly', true);

                $('select[name="provinsi_dom"]').removeAttr('id');
                $('select[name="kabupaten_kota_dom"]').removeAttr('id');
                $('select[name="kecamatan_dom"]').removeAttr('id');
                $('select[name="kelurahan_desa_dom"]').removeAttr('id');

                var option_prov = $("<option selected></option>").val(provinsi_kk.val()).text(provinsi_kk.select2('data')[0].text);
                $("select[name='provinsi_dom']").append(option_prov).trigger('change');
                var option_kab = $("<option selected></option>").val(kabupaten_kota_kk.val()).text(kabupaten_kota_kk.select2('data')[0].text);
                $("select[name='kabupaten_kota_dom']").append(option_kab).trigger('change');
                var option_kec = $("<option selected></option>").val(kecamatan_kk.val()).text(kecamatan_kk.select2('data')[0].text);
                $("select[name='kecamatan_dom']").append(option_kec).trigger('change');
                var option_kel = $("<option selected></option>").val(kelurahan_desa_kk.val()).text(kelurahan_desa_kk.select2('data')[0].text);
                $("select[name='kelurahan_desa_dom']").append(option_kel).trigger('change');
                $('select[name="provinsi_dom"] option:not(:selected)').prop('disabled', true);
                $('select[name="kabupaten_kota_dom"] option:not(:selected)').prop('disabled', true);
                $('select[name="kecamatan_dom"] option:not(:selected)').prop('disabled', true);
                $('select[name="kelurahan_desa_dom"] option:not(:selected)').prop('disabled', true);

                alamat_rumah_kk.prop('readonly', true);
                rt_kk.prop('readonly', true);
                rw_kk.prop('readonly', true);
                kodepos_kk.prop('readonly', true);
                $('select[name="provinsi_kk"] option:not(:selected)').prop('disabled', true);
                $('select[name="kabupaten_kota_kk"] option:not(:selected)').prop('disabled', true);
                $('select[name="kecamatan_kk"] option:not(:selected)').prop('disabled', true);
                $('select[name="kelurahan_desa_kk"] option:not(:selected)').prop('disabled', true);

                info_alamat.innerHTML = "<b class='text-danger'>*Anda menggunakan data Alamat KK sebagai Alamat Domisili</b>";
                info_checkbox_alamat.innerHTML = "<b>*Nonaktfikan untuk mengubah formulir Alamat KK</b>";

            } else if ($(this).prop("checked") == false) {

                var id_prov_kk = provinsi_kk.val();
                var id_kab_kk = kabupaten_kota_kk.val();
                var id_kec_kk = kecamatan_kk.val();
                var id_des_kk = kelurahan_desa_kk.val();

                var url = "<?php echo site_url('employee/master/student/add_ajax_kab'); ?>/" + id_prov_kk + "/" + id_kab_kk;
                $('#kabupaten_kota_kk').load(url);
                var url = "<?php echo site_url('employee/master/student/add_ajax_kec'); ?>/" + id_prov_kk + "/" + id_kab_kk + "/" + id_kec_kk;
                $('#kecamatan_kk').load(url);
                var url = "<?php echo site_url('employee/master/student/add_ajax_des'); ?>/" + id_prov_kk + "/" + id_kab_kk + "/" + id_kec_kk + "/" + id_des_kk;
                $('#kelurahan_desa_kk').load(url);


                $('select[name="provinsi_dom"]').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true
                });
                $('select[name="kabupaten_kota_dom"]').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true
                });
                $('select[name="kecamatan_dom"]').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true
                });
                $('select[name="kelurahan_desa_dom"]').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true
                });

                $('select[name="provinsi_kk"]').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true
                });
                $('select[name="kabupaten_kota_kk"]').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true
                });
                $('select[name="kecamatan_kk"]').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true
                });
                $('select[name="kelurahan_desa_kk"]').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true
                });

                $('textarea[name="alamat_rumah_dom"]').val('').prop('readonly', false);
                $('input[name="rt_dom"]').val('').prop('readonly', false);
                $('input[name="rw_dom"]').val('').prop('readonly', false);
                $('input[name="kodepos_dom"]').val('').prop('readonly', false);

                $('select[name="provinsi_dom"]').attr('id', 'provinsi');
                $('select[name="kabupaten_kota_dom"]').attr('id', 'kabupaten_kota_dom');
                $('select[name="kecamatan_dom"]').attr('id', 'kecamatan_dom');
                $('select[name="kelurahan_desa_dom"]').attr('id', 'kelurahan_desa_dom');

                $('input[name="nama_wali"]').val('').prop('readonly', false);
                $('input[name="nik_wali"]').val('').prop('readonly', false);
                $('input[name="tempat_lahir_wali"]').val('').prop('readonly', false);
                $('input[name="tanggal_lahir_wali"]').val('');
                $('input[name="pekerjaan_wali"]').val('').prop('readonly', false);

                $('select[name="provinsi_dom"]').find("option:last").remove();
                $('select[name="provinsi_dom"]').find("option:first").remove();
                var prov_dom = $("<option selected></option>").val("").text("Pilih Provinsi");
                $("select[name='provinsi_dom']").append(prov_dom).trigger('change');
                $('select[name="kabupaten_kota_dom"]').find("option").remove();
                $('select[name="kecamatan_dom"]').find("option").remove();
                $('select[name="kelurahan_desa_dom"]').find("option").remove();

                $('select[name="provinsi_dom"] option:not(:selected)').prop('disabled', false);
                $('select[name="kabupaten_kota_dom"] option:not(:selected)').prop('disabled', false);
                $('select[name="kecamatan_dom"] option:not(:selected)').prop('disabled', false);
                $('select[name="kelurahan_desa_dom"] option:not(:selected)').prop('disabled', false);

                alamat_rumah_kk.prop('readonly', false);
                rt_kk.prop('readonly', false);
                rw_kk.prop('readonly', false);
                kodepos_kk.prop('readonly', false);
                $('select[name="provinsi_kk"] option:not(:selected)').prop('disabled', false);
                $('select[name="kabupaten_kota_kk"] option:not(:selected)').prop('disabled', false);
                $('select[name="kecamatan_kk"] option:not(:selected)').prop('disabled', false);
                $('select[name="kelurahan_desa_kk"] option:not(:selected)').prop('disabled', false);

                info_alamat.innerHTML = "";
                info_checkbox_alamat.innerHTML = "<b>*Alamat KK sebagai Alamat Domisili dinonakitfkan</b>";
            }
        });

        $('#wali_ayah').click(function () {
            if ($(this).prop("checked") == true) {

                $('input[name="nama_wali"]').val(nama_ayah.val()).prop('readonly', true);
                $('input[name="nik_wali"]').val(nik_ayah.val()).prop('readonly', true);
                $('input[name="tempat_lahir_wali"]').val(tmptl_ayah.val()).prop('readonly', true);
                $('input[name="tanggal_lahir_wali"]').val(tgl_ayah.val());
                $('input[name="pekerjaan_wali"]').val(pkrj_ayah.val()).prop('readonly', true);
                $("select[name='pendidikan_wali'] option[value='" + pnd_ayah.val() + "']").prop("selected", "selected");
                $("select[name='penghasilan_wali'] option[value='" + png_ayah.val() + "']").prop("selected", "selected");
                $('select[name="pendidikan_wali"] option:not(:selected)').prop('disabled', true);
                $('select[name="penghasilan_wali"] option:not(:selected)').prop('disabled', true);
                $('#kt_daterangepicker_wali').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                }, "option", "disabled", true);

                nama_ayah.prop('readonly', true);
                nik_ayah.prop('readonly', true);
                tmptl_ayah.prop('readonly', true);
                pkrj_ayah.prop('readonly', true);
                $('#kt_daterangepicker_ayah').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                }, "option", "disabled", true);
                $('select[name="pendidikan_ayah"] option:not(:selected)').prop('disabled', true);
                $('select[name="penghasilan_ayah"] option:not(:selected)').prop('disabled', true);

                info_wali.innerHTML = "<b class='text-danger'>*Anda menggunakan data Ayah sebagai Wali</b>";
                info_checkbox_ayah.innerHTML = "<b>*Nonaktfikan untuk mengubah formulir Ayah</b>";
                $('#wali_ibu').prop('disabled', true);

            } else if ($(this).prop("checked") == false) {

                $('input[name="nama_wali"]').val('').prop('readonly', false);
                $('input[name="nik_wali"]').val('').prop('readonly', false);
                $('input[name="tempat_lahir_wali"]').val('').prop('readonly', false);
                $('input[name="tanggal_lahir_wali"]').val('');
                $('input[name="pekerjaan_wali"]').val('').prop('readonly', false);
                $("select[name='pendidikan_wali'] option[value='']").prop("selected", "selected");
                $("select[name='penghasilan_wali'] option[value='']").prop("selected", "selected");
                $('select[name="pendidikan_wali"] option:not(:selected)').attr('disabled', false);
                $('select[name="penghasilan_wali"] option:not(:selected)').attr('disabled', false);
                $('#kt_daterangepicker_wali').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                }, function (start, label) {
                    $('#kt_daterangepicker_wali .form-control').val(start.format('DD/MM/YYYY'));
                });

                nama_ayah.prop('readonly', false);
                nik_ayah.prop('readonly', false);
                tmptl_ayah.prop('readonly', false);
                pkrj_ayah.prop('readonly', false);
                $('select[name="pendidikan_ayah"] option:not(:selected)').attr('disabled', false);
                $('select[name="penghasilan_ayah"] option:not(:selected)').attr('disabled', false);
                $('#kt_daterangepicker_ayah').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                }, function (start, label) {
                    $('#kt_daterangepicker_ayah .form-control').val(start.format('DD/MM/YYYY'));
                });

                $('#wali_ibu').prop('disabled', false);
                info_wali.innerHTML = "";
                info_checkbox_ayah.innerHTML = "<b>*Ayah sebagai Wali dinonakitfkan</b>";
            }
        });

        $('#wali_ibu').click(function () {
            if ($(this).prop("checked") == true) {

                $('input[name="nama_wali"]').val(nama_ibu.val()).prop('readonly', true);
                $('input[name="nik_wali"]').val(nik_ibu.val()).prop('readonly', true);
                $('input[name="tempat_lahir_wali"]').val(tmptl_ibu.val()).prop('readonly', true);
                $('input[name="tanggal_lahir_wali"]').val(tgl_ibu.val());
                $('input[name="pekerjaan_wali"]').val(pkrj_ibu.val()).prop('readonly', true);
                $("select[name='pendidikan_wali'] option[value='" + pnd_ibu.val() + "']").prop("selected", "selected");
                $("select[name='penghasilan_wali'] option[value='" + png_ibu.val() + "']").prop("selected", "selected");
                $('select[name="pendidikan_wali"] option:not(:selected)').prop('disabled', true);
                $('select[name="penghasilan_wali"] option:not(:selected)').prop('disabled', true);
                $('#kt_daterangepicker_wali').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                }, "option", "disabled", true);

                nama_ibu.prop('readonly', true);
                nik_ibu.prop('readonly', true);
                tmptl_ibu.prop('readonly', true);
                pkrj_ibu.prop('readonly', true);
                $('#kt_daterangepicker_ibu').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                }, "option", "disabled", true);
                $('select[name="pendidikan_ibu"] option:not(:selected)').prop('disabled', true);
                $('select[name="penghasilan_ibu"] option:not(:selected)').prop('disabled', true);

                info_wali.innerHTML = "<b class='text-danger'>*Anda menggunakan data Ibu sebagai Wali</b>";
                info_checkbox_ibu.innerHTML = "<b>*Nonaktfikan untuk mengubah formulir Ibu</b>";
                $('#wali_ayah').prop('disabled', true);

            } else if ($(this).prop("checked") == false) {

                $('input[name="nama_wali"]').val('').prop('readonly', false);
                $('input[name="nik_wali"]').val('').prop('readonly', false);
                $('input[name="tempat_lahir_wali"]').val('').prop('readonly', false);
                $('input[name="tanggal_lahir_wali"]').val('');
                $('input[name="pekerjaan_wali"]').val('').prop('readonly', false);
                $("select[name='pendidikan_wali'] option[value='']").prop("selected", "selected");
                $("select[name='penghasilan_wali'] option[value='']").prop("selected", "selected");
                $('select[name="pendidikan_wali"] option:not(:selected)').attr('disabled', false);
                $('select[name="penghasilan_wali"] option:not(:selected)').attr('disabled', false);
                $('#kt_daterangepicker_wali').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                }, function (start, label) {
                    $('#kt_daterangepicker_wali .form-control').val(start.format('DD/MM/YYYY'));
                });

                nama_ibu.prop('readonly', false);
                nik_ibu.prop('readonly', false);
                tmptl_ibu.prop('readonly', false);
                pkrj_ibu.prop('readonly', false);
                $('select[name="pendidikan_ibu"] option:not(:selected)').attr('disabled', false);
                $('select[name="penghasilan_ibu"] option:not(:selected)').attr('disabled', false);
                $('#kt_daterangepicker_ibu').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                }, function (start, label) {
                    $('#kt_daterangepicker_ibu .form-control').val(start.format('DD/MM/YYYY'));
                });

                $('#wali_ayah').prop('disabled', false);
                info_wali.innerHTML = "";
                info_checkbox_ibu.innerHTML = "<b>*Ibu sebagai Wali dinonakitfkan</b>";
            }
        });
    });
</script>
<script>
    $(document).ready(function () {

        var nama_ayah = $('input[name="nama_ayah"]');
        var nik_ayah = $('input[name="nik_ayah"]');
        var tmptl_ayah = $('input[name="tempat_lahir_ayah"]');
        var tgl_ayah = $('input[name="tanggal_lahir_ayah"]');
        var pkrj_ayah = $('input[name="pekerjaan_ayah"]');
        var pnd_ayah = $('select[name="pendidikan_ayah"]');
        var png_ayah = $('select[name="penghasilan_ayah"]');

        var nama_ibu = $('input[name="nama_ibu"]');
        var nik_ibu = $('input[name="nik_ibu"]');
        var tmptl_ibu = $('input[name="tempat_lahir_ibu"]');
        var tgl_ibu = $('input[name="tanggal_lahir_ibu"]');
        var pkrj_ibu = $('input[name="pekerjaan_ibu"]');
        var pnd_ibu = $('select[name="pendidikan_ibu"]');
        var png_ibu = $('select[name="penghasilan_ibu"]');

        var alamat_rumah_kk = $('textarea[name="alamat_rumah_kk"]');
        var provinsi_kk = $('select[name="provinsi_kk"]');
        var kabupaten_kota_kk = $('select[name="kabupaten_kota_kk"]');
        var kecamatan_kk = $('select[name="kecamatan_kk"]');
        var kelurahan_desa_kk = $('select[name="kelurahan_desa_kk"]');
        var rt_kk = $('input[name="rt_kk"]');
        var rw_kk = $('input[name="rw_kk"]');
        var kodepos_kk = $('input[name="kodepos_kk"]');

        if ('<?php echo $student[0]->status_wali; ?>' == 1) {

            $('input[name="nama_wali"]').prop('readonly', true);
            $('input[name="nik_wali"]').prop('readonly', true);
            $('input[name="tempat_lahir_wali"]').prop('readonly', true);
            $('input[name="pekerjaan_wali"]').prop('readonly', true);
            $('select[name="pendidikan_wali"] option:not(:selected)').prop('disabled', true);
            $('select[name="penghasilan_wali"] option:not(:selected)').prop('disabled', true);
            $('#kt_daterangepicker_wali').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, "option", "disabled", true);

            nama_ayah.prop('readonly', true);
            nik_ayah.prop('readonly', true);
            tmptl_ayah.prop('readonly', true);
            pkrj_ayah.prop('readonly', true);
            $('#kt_daterangepicker_ayah').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, "option", "disabled", true);
            $('select[name="pendidikan_ayah"] option:not(:selected)').prop('disabled', true);
            $('select[name="penghasilan_ayah"] option:not(:selected)').prop('disabled', true);

            info_wali.innerHTML = "<b class='text-danger'>*Anda menggunakan data Ayah sebagai Wali</b>";
            info_checkbox_ayah.innerHTML = "<b>*Nonaktfikan untuk mengubah formulir Ayah</b>";
            $('#wali_ibu').prop('disabled', true);

        } else if ('<?php echo $student[0]->status_wali; ?>' == 2) {

            $('input[name="nama_wali"]').prop('readonly', true);
            $('input[name="nik_wali"]').prop('readonly', true);
            $('input[name="tempat_lahir_wali"]').prop('readonly', true);
            $('input[name="pekerjaan_wali"]').prop('readonly', true);
            $('select[name="pendidikan_wali"] option:not(:selected)').prop('disabled', true);
            $('select[name="penghasilan_wali"] option:not(:selected)').prop('disabled', true);
            $('#kt_daterangepicker_wali').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, "option", "disabled", true);

            nama_ibu.prop('readonly', true);
            nik_ibu.prop('readonly', true);
            tmptl_ibu.prop('readonly', true);
            pkrj_ibu.prop('readonly', true);
            $('#kt_daterangepicker_ibu').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, "option", "disabled", true);
            $('select[name="pendidikan_ibu"] option:not(:selected)').prop('disabled', true);
            $('select[name="penghasilan_ibu"] option:not(:selected)').prop('disabled', true);

            info_wali.innerHTML = "<b class='text-danger'>*Anda menggunakan data Ibu sebagai Wali</b>";
            info_checkbox_ibu.innerHTML = "<b>*Nonaktfikan untuk mengubah formulir Ibu</b>";
            $('#wali_ayah').prop('disabled', true);
        }

        if ('<?php echo $student[0]->status_alamat; ?>' == 1) {

            $('textarea[name="alamat_rumah_dom"]').prop('readonly', true);
            $('input[name="rt_dom"]').prop('readonly', true);
            $('input[name="rw_dom"]').prop('readonly', true);
            $('input[name="kodepos_dom"]').prop('readonly', true);


            $('select[name="kabupaten_kota_dom"] option:not(:selected)').prop('disabled', true);
            $('select[name="provinsi_dom"] option:not(:selected)').prop('disabled', true);
            $('select[name="kecamatan_dom"] option:not(:selected)').prop('disabled', true);
            $('select[name="kelurahan_desa_dom"] option:not(:selected)').prop('disabled', true);

            alamat_rumah_kk.prop('readonly', true);
            rt_kk.prop('readonly', true);
            rw_kk.prop('readonly', true);
            kodepos_kk.prop('readonly', true);

            $('select[name="provinsi_kk"] option:not(:selected)').prop('disabled', true);
            $('select[name="kabupaten_kota_kk"] option:not(:selected)').prop('disabled', true);
            $('select[name="kecamatan_kk"] option:not(:selected)').prop('disabled', true);
            $('select[name="kelurahan_desa_kk"] option:not(:selected)').prop('disabled', true);

            info_alamat.innerHTML = "<b class='text-danger'>*Anda menggunakan data Alamat KK sebagai Alamat Domisili</b>";
            info_checkbox_alamat.innerHTML = "<b>*Nonaktfikan untuk mengubah formulir Alamat KK</b>";
        }
    });
</script>

<script>
    $(document).ready(function () {

        var provinsi_kk = $('select[name="provinsi_kk"]');
        var kabupaten_kota_kk = $('select[name="kabupaten_kota_kk"]');
        var kecamatan_kk = $('select[name="kecamatan_kk"]');
        var kelurahan_desa_kk = $('select[name="kelurahan_desa_kk"]');

        var id_prov_kk = provinsi_kk.val();
        var id_kab_kk = kabupaten_kota_kk.val();
        var id_kec_kk = kecamatan_kk.val();
        var id_des_kk = kelurahan_desa_kk.val();

        if ('<?php echo $student[0]->status_alamat; ?>' == 0) {

            var url = "<?php echo site_url('employee/master/student/add_ajax_kab'); ?>/" + id_prov_kk + "/" + id_kab_kk;
            $('#kabupaten_kota_kk').load(url);
            var url = "<?php echo site_url('employee/master/student/add_ajax_kec'); ?>/" + id_prov_kk + "/" + id_kab_kk + "/" + id_kec_kk;
            $('#kecamatan_kk').load(url);
            var url = "<?php echo site_url('employee/master/student/add_ajax_des'); ?>/" + id_prov_kk + "/" + id_kab_kk + "/" + id_kec_kk + "/" + id_des_kk;
            $('#kelurahan_desa_kk').load(url);
        }

        $("#provinsi_kk").change(function () {
            id_prov_kk = $(this).val();
            var url = "<?php echo site_url('employee/master/student/add_ajax_kab'); ?>/" + id_prov_kk + "/" + id_kab_kk;
            $('#kabupaten_kota_kk').load(url);
            return false;
        });

        $("#kabupaten_kota_kk").change(function () {
            id_kab_kk = $(this).val();
            var url = "<?php echo site_url('employee/master/student/add_ajax_kec'); ?>/" + id_prov_kk + "/" + id_kab_kk + "/" + id_kec_kk;
            $('#kecamatan_kk').load(url);
            return false;
        });

        $("#kecamatan_kk").change(function () {
            id_kec_kk = $(this).val()
            var url = "<?php echo site_url('employee/master/student/add_ajax_des'); ?>/" + id_prov_kk + "/" + id_kab_kk + "/" + id_kec_kk + "/" + id_des_kk;
            $('#kelurahan_desa_kk').load(url);
            return false;
        });

        var id_prov_dom = <?php echo $student[0]->provinsi_dom; ?>;
        var id_kab_dom = <?php echo $student[0]->kabupaten_kota_dom; ?>;
        var id_kec_dom = <?php echo $student[0]->kecamatan_dom; ?>;
        var id_des_dom = <?php echo $student[0]->kelurahan_desa_dom; ?>;

        if ('<?php echo $student[0]->status_alamat; ?>' == 0) {

            var url = "<?php echo site_url('employee/master/student/add_ajax_kab'); ?>/" + id_prov_dom + "/" + id_kab_dom;
            $('#kabupaten_kota_dom').load(url);
            var url = "<?php echo site_url('employee/master/student/add_ajax_kec'); ?>/" + id_prov_dom + "/" + id_kab_dom + "/" + id_kec_dom;
            $('#kecamatan_dom').load(url);
            var url = "<?php echo site_url('employee/master/student/add_ajax_des'); ?>/" + id_prov_dom + "/" + id_kab_dom + "/" + id_kec_dom + "/" + id_des_dom;
            $('#kelurahan_desa_dom').load(url);
        }

        $("#provinsi_dom").change(function () {
            id_prov_dom = $(this).val();
            var url = "<?php echo site_url('employee/master/student/add_ajax_kab'); ?>/" + id_prov_dom + "/" + id_kab_dom;
            $('#kabupaten_kota_dom').load(url);
            return false;
        });

        $("#kabupaten_kota_dom").change(function () {
            id_kab_dom = $(this).val();
            var url = "<?php echo site_url('employee/master/student/add_ajax_kec'); ?>/" + id_prov_dom + "/" + id_kab_dom + "/" + id_kec_dom;
            $('#kecamatan_dom').load(url);
            return false;
        });

        $("#kecamatan_dom").change(function () {
            id_kec_dom = $(this).val()
            var url = "<?php echo site_url('employee/master/student/add_ajax_des'); ?>/" + id_prov_dom + "/" + id_kab_dom + "/" + id_kec_dom + "/" + id_des_dom;
            $('#kelurahan_desa_dom').load(url);
            return false;
        });

        var id_grade_level = <?php echo $student[0]->level_tingkat; ?>;
        var id_tingkat = <?php echo $student[0]->id_tingkat; ?>;

        var url = "<?php echo site_url('employee/master/student/add_ajax_grade'); ?>/" + id_grade_level + "/" + id_tingkat;
        $('#kelas').load(url);

        $("#tingkat").change(function () {
            id_grade_level = $(this).val();
            var url = "<?php echo site_url('employee/master/student/add_ajax_grade'); ?>/" + id_grade_level + "/" + id_tingkat;
            $('#kelas').load(url);
            return false;
        });
    });
</script>
<script>
    $('.dropify_ak').dropify({
        messages: {
            'default': 'Klik atau Geser file Anda disini',
            'replace': 'Klik atau Geser file Anda untuk mengganti',
            'remove': 'Hapus',
            'error': 'Ooops, terjadi kesalahan.'
        }
    });
    $('.dropify_kk').dropify({
        messages: {
            'default': 'Klik atau Geser file Anda disini',
            'replace': 'Klik atau Geser file Anda untuk mengganti',
            'remove': 'Hapus',
            'error': 'Ooops, terjadi kesalahan.'
        }
    });
    $('.dropify_pf').dropify({
        messages: {
            'default': 'Klik atau Geser file Anda disini',
            'replace': 'Klik atau Geser file Anda untuk mengganti',
            'remove': 'Hapus',
            'error': 'Ooops, terjadi kesalahan.'
        }
    });
</script>