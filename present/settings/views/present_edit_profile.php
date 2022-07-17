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
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/css/pages/fonts/dropify.css" rel="stylesheet" type="text/css" />

        <!--end::Global Theme Styles-->
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
                                <h3 class="font-mobile display-4 text-warning font-weight-boldest">DETAIL PROFIL</h3>
                            </div>
                        </div>
                        <!--end::Login Header-->
                        <div class="row flex-center mb-5">
                            <div class="col-6 float-left">
                                <a href="<?php echo site_url('present/dashboard'); ?>" type="button" class="btn btn-danger button-load float-left font-weight-bold"><li class="fa fa-home "></li> Menu</a>
                            </div>
                            <div class="col-6 float-right">
                                <a onclick="window.history.back();" class="btn btn-light-warning button-load font-weight-bold float-right"><i class="fa fa-backward"></i>Kembali</a>           
                            </div>
                        </div>
                        <!--begin::Login Header-->
                        <div class="row flex-center ">
                            <!--begin::Stats Widget 6-->
                            <div class="card card-custom card-stretch bg-warning-o-50 mb-5 text-center">
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
                                            Berikut merupakan halaman detail profile biodata Anda.
                                        </span>
                                    </div>
                                    <img src="<?php echo base_url(); ?>assets/present/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <!--begin::Notice-->
                            <?php echo $this->session->flashdata('flash_message'); ?>
                            <!--end::Notice-->
                            <div class="row" id="kt_form">
                                <!--begin::Card-->
                                <div class="card card-custom text-center" >
                                    <!--begin::Form-->
                                    <form class="form" novalidate="novalidate" action="<?php echo site_url('present/settings/account/update_account_profile'); ?>" enctype="multipart/form-data" method="post" id="kt_edit_profile_form">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" readonly value="<?php echo $account[0]->nama_lengkap; ?>" class="form-control form-control-solid form-control-lg"  placeholder="Isikan Nama Akun"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-6 ">
                                                    <div class="form-group">
                                                        <label>NIK KTP</label>
                                                        <input type="text" readonly class="form-control form-control-solid form-control-lg" value="<?php echo $account[0]->nik; ?>" placeholder="Isikan NIK KTP"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-6">
                                                    <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?php echo $account[0]->nip; ?>" placeholder="Isikan NIK KTP"/>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" readonly="" value="<?php echo $account[0]->email; ?>" class="form-control form-control-solid form-control-lg"  placeholder="Isikan Email Akun"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-group">
                                                        <label>Golongan</label>
                                                        <input type="text" readonly value="<?php echo $account[0]->golongan; ?>" class="form-control form-control-solid form-control-lg"  placeholder="Isikan Email Akun"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Masuk</label>
                                                        <input type="text" readonly value="<?php echo $account[0]->tanggal_masuk; ?>" class="form-control form-control-solid form-control-lg"  placeholder="Isikan Email Akun"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-group">
                                                        <label>Nomor Handphone</label>
                                                        <input type="text" readonly="" value="<?php echo $account[0]->nomor_hp; ?>" class="form-control form-control-solid form-control-lg"  placeholder="Isikan Nomor Handphone"/>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-6">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <?php
                                                        $jk = '';
                                                        if ($account[0]->jenis_kelamin == 1) {
                                                            $jk = 'Laki-Laki';
                                                        } else if ($account[0]->jenis_kelamin == 2) {
                                                            $jk = 'Perempuan';
                                                        }
                                                        ?>  
                                                        <input name="jenis_kelamin" readonly="" value="<?php echo $jk; ?>"class="form-control form-control-solid form-control-lg">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-group">
                                                        <label>Jam Pelajaran</label>
                                                        <input type="text" readonly="" value="<?php echo $account[0]->jam_pelajaran; ?> Jam" class="form-control form-control-solid form-control-lg"  placeholder="Isikan Nomor Handphone"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control form-control-solid" placeholder="Isikan Alamat" name="alamat" rows="3"><?php echo $account[0]->alamat_lengkap; ?></textarea>
                                                    </div>
                                                </div>   
                                                <div class="col-lg-2 mb-3 " >
                                                    <label>Ubah password?</label>
                                                    <div class="text-center">
                                                        <input data-switch="true" class="ubahpass" data-size="large" type="checkbox" data-on-text="Ya"  data-off-text="Tidak" />
                                                    </div>
                                                    <span class="form-text text-dark"><b class="text-danger"></b>*Aktifkan jika ingin mengubah password</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Password Baru</label>
                                                        <input type="password" name="password" class="form-control  form-control-lg"  placeholder="Isikan Password Baru" />
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Password Baru</span>               
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Konfirmasi Password Baru</label>
                                                        <input type="password" name="cf_password" class="form-control  form-control-lg"  placeholder="Isikan Password Baru" />
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Password Baru</span>               
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Foto Pegawai</label>
                                                        <input type="hidden" name="img_foto_pegawai" value="<?php echo $account[0]->foto_pegawai ?>" style="display:none" />
                                                        <input type="hidden" name="img_foto_pegawai_thumb" value="<?php echo $account[0]->foto_pegawai_thumb; ?>" style="display:none" />
                                                        <input type="file" class="dropify" name="foto_ktp" data-default-file="<?php echo site_url($account[0]->foto_pegawai); ?>" data-max-file-size="5M" data-height="200" data-allowed-file-extensions="png jpg jpeg" />
                                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>File berformat png,jpg,jpeg kurang dari 5Mb.</span>               
                                                    </div>
                                                </div>                                               

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button id="kt_login_signin_submit" class="btn btn-success font-weight-bold px-9 py-4 col-lg-2 col-12">Simpan</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card-->

                            </div>
                        </div>
                        <!--end::Login Sign in form-->
                    </div>
                </div>
            </div>
            <!--end::Login-->
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
        <script>var HOST_URL = "<?php echo base_url(); ?>";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/js/pages/crud/forms/widgets/jquery-mask.js"></script>
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/js/pages/custom/login/edit-profile.js"></script>
        <!--end::Page Scripts-->
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js"></script>
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/js/dropify.js"></script>
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
        <script>
            $('#example_1').whatsappChatSupport();
        </script>
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
            $('.dropify').dropify({
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