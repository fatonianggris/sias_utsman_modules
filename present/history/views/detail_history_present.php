<html lang="en">
    <!--begin::Head-->
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $title; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="<?php echo base_url(); ?>" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/css/pages/fonts/dropify.css" rel="stylesheet" type="text/css" />

        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/present/dist/assets/media/logos/favicon.ico" />
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css"  />
        <style>
            .table thead th {
                vertical-align: top; 
                border-bottom: 2px solid #EBEDF3;
            }
        </style>
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/present/dist/assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-3">
                            <div class="text-center">
                                <h3 class="font-mobile display-4 text-warning font-weight-boldest">DETAIL LAPORAN</h3>
                            </div>
                        </div>
                        <div class="row flex-center mb-5">
                            <div class="col-6 float-left">
                                <a href="<?php echo site_url('present/dashboard'); ?>" type="button" class="btn btn-danger button-load float-left font-weight-bold"><li class="fa fa-home "></li> Menu</a>
                            </div>
                            <div class="col-6 float-right">
                                <a onclick="window.history.back();" class="btn btn-light-warning button-load font-weight-bold float-right"><i class="fa fa-backward"></i>Kembali</a>           
                            </div>
                        </div>
                        <div class="row flex-center ">
                            <!--begin::Stats Widget 6-->
                            <div class="card card-custom card-stretch bg-warning-o-50 mb-5">
                                <!--begin::Body-->
                                <div class="card-body d-flex align-items-center py-0 mt-2">
                                    <div class="d-flex flex-column flex-grow-1 py-1 py-lg-5">
                                        <?php
                                        $user = $this->session->userdata('sias-present');
                                        $word = explode(" ", strip_tags($user[0]->nama_lengkap));
                                        $limit_word = implode(" ", array_splice($word, 0, 2));
                                        ?>
                                        <a href="#" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary"><b class="text-danger">Hi, <?php echo strtoupper(strtolower($limit_word)); ?>!</b></a>
                                        <span class=" text-dark-75 font-size-md">
                                            Berikut merupakan detail kehadiran Anda yang dilaporkan di Sistem Absensi
                                        </span>
                                    </div>
                                    <img src="<?php echo base_url(); ?>assets/present/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="row" id="kt_form" >
                                <!--begin::Card-->
                                <div class="card card-custom" >
                                    <div class="card-header mt-2" style="justify-content: center">
                                        <div class="card-title text-center">                                
                                            <h2 class="card-label font-size-h3 font-weight-bolder">
                                                Detail Kehadiran Pegawai "<?php echo strtoupper(strtolower($user[0]->nama_lengkap)); ?>" - <?php echo $user[0]->nip; ?>
                                                <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                $date = $present[0]->tgl_asli;
                                                $nameOfDay = date('l', strtotime($date));
                                                ?>
                                                <span class="text-warning pt-2 font-size-sm font-weight-bold d-block">Berikut detail kehadiran pada Hari/Tanggal "<?php echo hariIndo(strtolower($nameOfDay)); ?> - <?php echo $present[0]->tgl_post; ?>", TA: <?php echo $present[0]->tahun_ajaran; ?></span>
                                            </h2>
                                        </div>
                                    </div>
                                    <!--begin::Form-->
                                    <form class="form" novalidate="novalidate"enctype="multipart/form-data" method="post" >
                                        <div class="card-body">  

                                            <div class="row border-bottom">
                                                <div class="col-lg-6 border-right border-left border-top">
                                                    <div class="row mt-2">
                                                        <div class="col-lg-12">
                                                            <h2 class="text-center text-warning font-weight-bolder mb-5 mt-5">
                                                                ABSENSI MASUK
                                                            </h2>
                                                        </div>
                                                        <div class="col-lg-12 text-center col-12  mb-5 ">    
                                                            <?php if ($present[0]->status_absensi_masuk == 0) { ?>
                                                                <p class="font-weight-boldest display-3 mb-1 text-primary text-center">BELUM ABSEN</p>
                                                            <?php } elseif ($present[0]->status_absensi_masuk == 1) { ?>
                                                                <p class="font-weight-boldest display-3 mb-1 text-success text-center">HADIR</p>
                                                            <?php } elseif ($present[0]->status_absensi_masuk == 2) { ?>
                                                                <p class="font-weight-boldest display-3 mb-1 text-warning text-center">IZIN</p>
                                                                <?php if ($present[0]->keterangan_masuk != "" || $present[0]->keterangan_masuk != NULL) { ?>
                                                                    "<p class="font-weight-bold mb-1 text-danger text-center"> "<?php echo $present[0]->keterangan_masuk; ?>"</p>"
                                                                <?php } ?>
                                                            <?php } elseif ($present[0]->status_absensi_masuk == 3) { ?>
                                                                <p class="font-weight-boldest display-3 mb-1 text-danger text-center">ALPHA</p>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-lg-12 col-6">
                                                            <div class="form-group">
                                                                <label>Waktu Masuk</label>
                                                                <input type="text" name="jam_masuk" disabled="" value="<?php echo ($present[0]->jam_masuk == NULL or $present[0]->jam_masuk == '') ? '00:00' : $present[0]->jam_masuk; ?>" class="form-control  form-control-lg"  placeholder="Isikan Nama Pemilik"/>
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-12 col-6">
                                                            <div class="form-group">
                                                                <label>Menit Telat</label>
                                                                <input type="text" name="jam_masuk_telat" disabled="" value="<?php echo ($present[0]->jam_masuk_telat == NULL or $present[0]->jam_masuk_telat == '') ? 0 : $present[0]->jam_masuk_telat; ?>" class="form-control  form-control-lg"  placeholder="Isikan Nama Pemilik"/>
                                                            </div>
                                                        </div> 
                                                        <div class="mb-3">
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Lokasi Absen Masuk</label>
                                                                <iframe    
                                                                    width="93%"
                                                                    frameborder="0" 
                                                                    scrolling="no" 
                                                                    marginheight="0" 
                                                                    marginwidth="0" 
                                                                    src = "https://maps.google.com/maps?q=<?php echo ($present[0]->lat_masuk); ?>,<?php echo ($present[0]->longt_masuk); ?>&hl=es;z=14&amp;output=embed">                                                                   
                                                                </iframe>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12 text-center">                                        
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label class="font-weight-bolder font-size-h6">Bukti Masuk</label> <a href="#" type="button" class="bt btn-xs font-weight-bold ml-2" data-toggle="modal" data-target="#modal_bukti_masuk" > <span class="label label-md font-weight-boldest label-primary label-inline">Lihat</span></a>
                                                                    <input type="file" class="dropify_masuk" name="foto_surat" disabled="" data-default-file="<?php echo site_url($present[0]->foto_absensi_masuk); ?>" data-max-file-size="5M" data-height="120" data-allowed-file-extensions="png jpg jpeg" />
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>       
                                                <div class="col-lg-6 border-right border-left border-top">
                                                    <div class="row mt-2">
                                                        <div class="col-lg-12">
                                                            <h2 class="text-center text-warning font-weight-bolder mb-5 mt-5">
                                                                ABSENSI PULANG
                                                            </h2>
                                                        </div>
                                                        <div class="col-lg-12 text-center col-12  mb-5 ">    

                                                            <?php if ($present[0]->status_absensi_pulang == 0) { ?>
                                                                <p class="font-weight-boldest display-3 mb-1 text-primary text-center">BELUM ABSEN</p>
                                                            <?php } elseif ($present[0]->status_absensi_pulang == 1) { ?>
                                                                <p class="font-weight-boldest display-3 mb-1 text-success text-center">HADIR</p>
                                                            <?php } elseif ($present[0]->status_absensi_pulang == 2) { ?>
                                                                <p class="font-weight-boldest display-3 mb-1 text-warning text-center">IZIN</p>
                                                                <?php if ($present[0]->keterangan_pulang != "" || $present[0]->keterangan_pulang != NULL) { ?>
                                                                    "<p class="font-weight-bold mb-1 text-danger text-center"> "<?php echo $present[0]->keterangan_pulang; ?>"</p>"
                                                                <?php } ?>
                                                            <?php } elseif ($present[0]->status_absensi_pulang == 3) { ?>
                                                                <p class="font-weight-boldest display-3 mb-1 text-danger text-center">ALPHA</p>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-lg-12 col-6">
                                                            <div class="form-group">
                                                                <label>Waktu Pulang</label>
                                                                <input type="text" name="jam_pulang" disabled="" value="<?php echo ($present[0]->jam_pulang == NULL or $present[0]->jam_pulang == '') ? '00:00' : $present[0]->jam_pulang; ?>" class="form-control  form-control-lg"  placeholder="Isikan Nama Pemilik"/>
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-12 col-6">
                                                            <div class="form-group">
                                                                <label>Menit Telat</label>
                                                                <input type="text" name="jam_pulang_telat" disabled="" value="<?php echo ($present[0]->jam_pulang_telat == NULL or $present[0]->jam_pulang_telat == '') ? 0 : $present[0]->jam_pulang_telat; ?>" class="form-control  form-control-lg"  placeholder="Isikan Nama Pemilik"/>
                                                            </div>
                                                        </div> 
                                                        <div class="mb-3">
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Lokasi Absen Pulang</label>
                                                                <iframe 
                                                                    width="93%"
                                                                    frameborder="0" 
                                                                    scrolling="no" 
                                                                    marginheight="0" 
                                                                    marginwidth="0" 
                                                                    src = "https://maps.google.com/maps?q=<?php echo ($present[0]->lat_pulang); ?>,<?php echo ($present[0]->longt_pulang); ?>&hl=es;z=14&amp;output=embed">                                                                   
                                                                </iframe>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12 text-center">                                        
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label class="font-weight-bolder font-size-h6">Bukti Pulang</label> <a href="#" type="button" class="bt btn-xs font-weight-bold ml-2" data-toggle="modal" data-target="#modal_bukti_pulang" > <span class="label label-md font-weight-boldest label-primary label-inline">Lihat</span></a>
                                                                    <input type="file" class="dropify_pulang" name="foto_surat" disabled="" data-default-file="<?php echo site_url($present[0]->foto_absensi_pulang); ?>" data-max-file-size="5M" data-height="120" data-allowed-file-extensions="png jpg jpeg" />
                                                                </div>
                                                            </div>
                                                        </div>                                        
                                                    </div>
                                                </div>     
                                            </div>                                                                                   
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card-->
                            </div>
                        </div>

                    </div>
                    <!--end::Login Sign in form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <div class="modal fade" id="modal_bukti_masuk" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Bukti Absensi Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img alt="Pic" class="col-12" src="<?php echo base_url() . $present[0]->foto_absensi_masuk; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_bukti_pulang" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Bukti Absensi Pulang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img alt="Pic" class="col-12" src="<?php echo base_url() . $present[0]->foto_absensi_pulang; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="whatsapp_chat_support wcs_fixed_right" id="example_1">
        <div class="wcs_button_label">
            Butuh bantuan?
        </div>	
        <div class="wcs_button wcs_button_circle">
            <span class="fa fa-phone"></span>
        </div>	

        <div class="wcs_popup">
            <div class="wcs_popup_close">
                <span class="far fa-times-circle mt-2"></span>
            </div>
            <div class="wcs_popup_header">
                <strong>Butuh bantuan? Kontak Kami </strong>
                <br>
                <div class="wcs_popup_header_description">Pilih salah satu <b>Admin SIAP</b> dibawah ini</div>
            </div>	
            <div class="wcs_popup_person_container">
                <?php if ($contact[0]->no_handphone != "" or $contact[0]->no_handphone != NULL) { ?>
                    <div class="wcs_popup_person" data-number="<?php echo "62" . substr($contact[0]->no_handphone, 1); ?>" data-default-msg="Assslamualaikum, permisi mau bertanya?">
                        <div class="wcs_popup_person_img"><img src="<?php echo base_url() . $page[0]->logo_website; ?>" alt=""></div>
                        <div class="wcs_popup_person_content">
                            <div class="wcs_popup_person_name">Admin SIAP</div>
                            <div class="wcs_popup_person_description">Petugas SIAP</div>
                            <div class="wcs_popup_person_status">Sedang Online</div>
                        </div>	
                    </div>  
                <?php } ?>
            </div>
        </div>
    </div>	
    <!--end::Main-->

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/present/dist/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->
    <!--end::Page Scripts-->
    <script src="<?php echo base_url(); ?>assets/present/dist/assets/js/dropify.js"></script>
    <script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
    <script>
        $('.button-load').click(function () {
        KTApp.blockPage({
        overlayColor: '#FFA800',
                state: 'warning',
                size: 'lg',
                opacity: 0.2,
                message: 'Silahkan Tunggu...'
        });
        });
    </script>
    <script>
        $('#example_1').whatsappChatSupport();
    </script>
    <script>
        $('.dropify_masuk').dropify({
        messages: {
        'default': 'Klik atau Geser file Anda disini',
                'replace': 'Klik atau Geser file Anda untuk mengganti',
                'remove': 'Hapus',
                'error': 'Ooops, terjadi kesalahan.'
        }
        });
        $('.dropify_pulang').dropify({
        messages: {
        'default': 'Klik atau Geser file Anda disini',
                'replace': 'Klik atau Geser file Anda untuk mengganti',
                'remove': 'Hapus',
                'error': 'Ooops, terjadi kesalahan.'
        }
        });
    </script>

</body>
<!--end::Body-->
</html>