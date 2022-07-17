<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Pengaturan</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Konfigurasi Halaman</a>
                        </li>                       
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
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

            <!--end::Notice-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom" id="kt_form" >
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Konfigurasi Halaman Website
                            </h3>
                        </div>

                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" action="<?php echo site_url('employee/configuration/settings/update_general_page'); ?>" enctype="multipart/form-data" method="post" id="kt_add_page_form">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!--begin::Engage Widget 2-->
                                        <div class="card card-custom mb-7">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 bg-success p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 140px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/home/Building.svg);">
                                                    <h5 class="text-inverse-danger font-weight-bolder">Maintenance Keuangan</h5>
                                                    <p class="text-white my-2">Aktifkan Maintenance Keuangan Siswa</p>
                                                    <?php if ($page[0]->status_maintenance_finance == 1) { ?>
                                                        <input data-switch="true" class="update_finance_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
                                                    <?php } else { ?>
                                                        <input data-switch="true" class="update_finance_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
                                                    <?php } ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Engage Widget 2-->
                                    <!--end::Card-->
                                    <div class="col-lg-3 col-6">
                                        <!--begin::Engage Widget 2-->
                                        <div class="card card-custom mb-7">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 bg-primary p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 140px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%;background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/home/Book-open.svg);">
                                                    <h5 class="text-inverse-danger font-weight-bolder">Maintenance E-Rapor</h5>
                                                    <p class="text-inverse-danger my-2">Aktifkan Maintenance E-Rapor Siswa</p>
                                                    <?php if ($page[0]->status_maintenance_report == 1) { ?>
                                                        <input data-switch="true" class="update_report_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
                                                    <?php } else { ?>
                                                        <input data-switch="true" class="update_report_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
                                                    <?php } ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Engage Widget 2-->
                                    <!--end::Card-->
                                    <div class="col-lg-3 col-6">
                                        <!--begin::Engage Widget 2-->
                                        <div class="card card-custom mb-7">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 bg-warning p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 140px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%;background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/home/Clock.svg);">
                                                    <h5 class="text-inverse-danger font-weight-bolder">Maintenance Absensi</h5>
                                                    <p class="text-inverse-danger my-2">Aktifkan Maintenance Absensi Siswa</p>
                                                    <?php if ($page[0]->status_maintenance_presence == 1) { ?>
                                                        <input data-switch="true" class="update_presence_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
                                                    <?php } else { ?>
                                                        <input data-switch="true" class="update_presence_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
                                                    <?php } ?>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Engage Widget 2-->
                                    <!--end::Card-->
                                    <div class="col-lg-3 col-6">
                                        <!--begin::Engage Widget 2-->
                                        <div class="card card-custom mb-7">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 bg-info p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 140px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%;background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/home/Key.svg);">
                                                    <h5 class="text-inverse-danger font-weight-bolder">Maintenance Pengumuman</h5>
                                                    <p class="text-inverse-danger my-2">Aktifkan Maintenance Pengumuman Siswa</p>
                                                    <?php if ($page[0]->status_maintenance_announcement == 1) { ?>
                                                        <input data-switch="true" class="update_announcement_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
                                                    <?php } else { ?>
                                                        <input data-switch="true" class="update_announcement_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
                                                    <?php } ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Engage Widget 2-->
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Nama Website</label>
                                            <input type="text" name="nama_website" value="<?php echo $page[0]->nama_website ?>" class="form-control  form-control-lg"  placeholder="Isikan Nama Website"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nama Website, Contoh : "Website SiNJOP"</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Deskripsi Website</label>
                                            <input type="text" name="greeting_website" value="<?php echo $page[0]->greeting_website ?>"  class="form-control  form-control-lg"  placeholder="Isikan Sambutan"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Deskripsi Website</span>               
                                        </div>
                                    </div>     
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>URL Video Tutorial Klien</label>
                                            <input type="text" name="url_tutorial_alur" value="<?php echo $page[0]->url_tutorial_alur ?>"  class="form-control  form-control-lg"  placeholder="Isikan URL Video"/>
                                            <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan URL Video</span>               
                                        </div>
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Upload Logo Website</label>
                                            <input type="text" name="logo_temp" value="<?php echo $page[0]->logo_website ?>" style="display:none" />
                                            <input type="text" name="logo_temp_thumb" value="<?php echo $page[0]->logo_website_thumb; ?>" style="display:none" />
                                            <input type="file" class="dropify" name="logo_website" data-default-file="<?php echo base_url() . $page[0]->logo_website; ?>"  data-max-file-size="2M" data-height="225" data-allowed-file-extensions="png jpg jpeg" />
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>berformat jpg, png, jpeg, dan berukuran dibawah 2Mb (logo diutamakan resolusi 500*500 pixel).</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label>Tentang Website</label>
                                            <textarea class="form-control" id="kt-ckeditor-1" placeholder="Isikan Alamat" name="about_website" rows="2"><?php echo $page[0]->about_website; ?></textarea>
                                            <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Tentang Website</span>               
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div class="card-footer">
                                <button id="kt_login_signin_submit" class="btn btn-success font-weight-bold py-4 col-lg-1 col-12">Simpan</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
    <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</div>
<!--end::Content-->
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-page.js">
</script>
<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Klik atau Geser file Anda disini',
            'replace': 'Klik atau Geser file Anda untuk mengganti',
            'remove': 'Hapus',
            'error': 'Ooops, terjadi kesalahan.'
        }
    });
</script>

<script>
    var csrfName = $('.txt_csrfname').attr('name');
    var csrfHash = $('.txt_csrfname').val(); // CSRF hash

    var pro1 = $(".update_finance_switch").bootstrapSwitch();
    pro1.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin MENGAKTIFKAN Maintenance Keuangan Siswa Sekarang?",
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
                        url: "<?php echo site_url("employee/configuration/settings/change_status_maintenance_finance") ?>",
                        data: {id: '<?php echo paramEncrypt(1); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Diaktifkan!", "Maintenance Keuangan Siswa telah diaktifkan!.", "success");
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
                    pro1.bootstrapSwitch('state', false);
                    Swal.fire("Dibatalkan!", "Maintenance Keuangan Siswa batal diaktifkan.", "error");
                }
            });
        } else {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin NONAKTIFKAN Maintenance Keuangan Siswa Sekarang?",
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
                        url: "<?php echo site_url("employee/configuration/settings/change_status_maintenance_finance") ?>",
                        data: {id: '<?php echo paramEncrypt(0); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Dinonaktifkan!", "Maintenance Keuangan Siswa telah dinonaktifkan!.", "success");
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
                    pro1.bootstrapSwitch('state', true);
                    Swal.fire("Dibatalkan!", "Maintenance Keuangan Siswa batal dinonaktifkan.", "error");
                }
            });
        }
    });
</script>
<script>
    var pro2 = $(".update_report_switch").bootstrapSwitch();
    pro2.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin MENGAKTIFKAN Maintenance E-Rapor Siswa Sekarang?",
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
                        url: "<?php echo site_url("employee/configuration/settings/change_status_maintenance_report") ?>",
                        data: {id: '<?php echo paramEncrypt(1); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Diaktifkan!", "Maintenance E-Rapor Siswa telah diaktifkan!.", "success");
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
                    pro2.bootstrapSwitch('state', false);
                    Swal.fire("Dibatalkan!", "Maintenance E-Rapor Siswa batal diaktifkan.", "error");
                }
            });
        } else {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin NONAKTIFKAN Maintenance E-Rapor Siswa Sekarang?",
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
                        url: "<?php echo site_url("employee/configuration/settings/change_status_maintenance_report") ?>",
                        data: {id: '<?php echo paramEncrypt(0); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Dinonaktifkan!", "Maintenance E-Rapor Siswa telah dinonaktifkan!.", "success");
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
                    pro2.bootstrapSwitch('state', true);
                    Swal.fire("Dibatalkan!", "Maintenance E-Rapor Siswa batal dinonaktifkan.", "error");
                }
            });
        }
    });
</script>
<script>
    var pro3 = $(".update_presence_switch").bootstrapSwitch();
    pro3.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin MENGAKTIFKAN Maintenance Absensi Siswa Sekarang?",
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
                        url: "<?php echo site_url("employee/configuration/settings/change_status_maintenance_presence") ?>",
                        data: {id: '<?php echo paramEncrypt(1); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Diaktifkan!", "Maintenance Absensi Siswa telah diaktifkan!.", "success");
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
                    pro3.bootstrapSwitch('state', false);
                    Swal.fire("Dibatalkan!", "Maintenance Absensi Siswa batal diaktifkan.", "error");
                }
            });
        } else {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin NONAKTIFKAN Maintenance Absensi Siswa Sekarang?",
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
                        url: "<?php echo site_url("employee/configuration/settings/change_status_maintenance_presence") ?>",
                        data: {id: '<?php echo paramEncrypt(0); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Dinonaktifkan!", "Maintenance Absensi Siswa telah dinonaktifkan!.", "success");
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
                    pro3.bootstrapSwitch('state', true);
                    Swal.fire("Dibatalkan!", "Maintenance Absensi Siswa batal dinonaktifkan.", "error");
                }
            });
        }
    });
</script>
<script>
    var pro4 = $(".update_announcement_switch").bootstrapSwitch();
    pro4.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin MENGAKTIFKAN Maintenance Pengumuman Siswa Sekarang?",
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
                        url: "<?php echo site_url("employee/configuration/settings/change_status_maintenance_announcement") ?>",
                        data: {id: '<?php echo paramEncrypt(1); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Diaktifkan!", "Maintenance Pengumuman Siswa telah diaktifkan!.", "success");
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
                    pro4.bootstrapSwitch('state', false);
                    Swal.fire("Dibatalkan!", "Maintenance Pengumuman Siswa batal diaktifkan.", "error");
                }
            });
        } else {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin NONAKTIFKAN Maintenance Pengumuman Siswa Sekarang?",
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
                        url: "<?php echo site_url("employee/configuration/settings/change_status_maintenance_announcement") ?>",
                        data: {id: '<?php echo paramEncrypt(0); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Dinonaktifkan!", "Maintenance Pengumuman Siswa telah dinonaktifkan!.", "success");
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
                    pro4.bootstrapSwitch('state', true);
                    Swal.fire("Dibatalkan!", "Maintenance Pengumuman Siswa batal dinonaktifkan.", "error");
                }
            });
        }
    });
</script>