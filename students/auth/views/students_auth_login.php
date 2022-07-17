<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../../">
        <meta charset="utf-8" />
        <title>Login SIAS | Sekolah Utsman</title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="https://keenthemes.com/metronic" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/students/dist/assets/media/logos/favicon.ico" />
        <style>
            .flex-center {
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }

            .g-recaptcha {
                display: inline-block;
            }
        </style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/students/dist/assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-10">
                            <a href="">
                                <img src="<?php echo base_url() . $page[0]->logo_website; ?>"  class="max-h-150px" alt="" />
                            </a>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="mb-8">
                                <h4 class="font-weight-bolder">Login Sistem Akademik Siswa</h4>
                                <h1 class="font-weight-bolder text-warning">Sekolah Utsman</h1>
                                <div class="text-danger font-weight-bold">Silahkan login sesuai NIS dan Kata Sandi anda:</div>
                            </div>
                            <?php echo $this->session->flashdata('flash_message'); ?>
                            <form class="form" novalidate="novalidate" method="POST" action="<?php echo base_url(); ?>students/auth/login"  id="kt_login_signin_form_students">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group mb-5">
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Inputkan NIS Anda" name="nis" autocomplete="off" />
                                </div>
                                <div class="form-group mb-5">
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Inputkan Kata Sandi Anda" name="password" />
                                </div>
                                <!--begin::Action-->
                                <div class="form-group text-center">
                                    <div class="g-recaptcha " data-sitekey="<?php echo $this->config->item('google_site_key') ?>"></div>  
                                </div>
                                <!--begin::Action-->
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0 text-dark font-weight-bold">
                                            <input type="checkbox" name="remember" />
                                            <span></span>Remember me</label>
                                    </div>
                                    <a href="javascript:;" id="kt_login_forgot" class="text-warning font-weight-bolder text-hover-danger">Lupa Kata Sandi ?</a>
                                </div>
                                <button id="kt_login_signin_submit" class="btn btn-warning font-weight-bold px-9 py-4 my-3 mx-4"><li class="fas fa-lock"></li> Masuk</button>
                            </form>
                            <div class="mt-8">
                                <span class="mr-1 text-dark-75">2021©</span>
                                <a href="" target="_blank" class="text-dark-75 text-hover-primary">Sekolah Utsman</a>
                            </div>
                        </div>
                        <!--end::Login Sign in form-->                        
                        <!--begin::Login forgot password form-->
                        <div class="login-forgot">
                            <div class="mb-5">
                                <h3>Lupa Kata Sandi ?</h3>
                                <div class="text-warning font-weight-bold">Silahkan masukkan email anda untuk mereset kata sandi.</div>
                            </div>
                            <form class="form" id="kt_login_forgot_form">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group mb-10">
                                    <label class="font-size-h7 text-danger pt-5">*Email yang terdaftar sebelumnya.</label>
                                    <input id="email_reset" class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Inputkan Email Anda" name="email" autocomplete="off" />
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <a onclick="act_reset_password()" class="btn btn-warning font-weight-bold px-9 py-4 my-3 mx-2">Reset Password</a>
                                    <button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Batal</button>
                                </div>
                            </form>
                        </div>
                        <!--end::Login forgot password form-->
                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
        <script>
            function act_reset_password() {
                var email = $('#email_reset').val();
                Swal.fire({
                    title: "Peringatan!",
                    text: "Apakah anda yakin mengirimkan PASSWORD BARU dengan EMAIL '" + email + "' yang telah Anda daftarkan sebelumnya?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1BC5BD",
                    confirmButtonText: "Ya, yakin & kirim!",
                    cancelButtonText: "Tidak, batal!",
                    showLoaderOnConfirm: true,
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    preConfirm: () => {
                        return $.ajax({
                            type: "post",
                            url: "<?php echo site_url("students/auth/reset_password") ?>",
                            data: {email: email},
                            dataType: 'html',
                            success: function (result) {
                                if (result == '1') {
                                    Swal.fire("Dikirimkan!", "Password Baru telah dikirimkan ke Email '" + email + "'. Silahkan cek EMAIL Anda!", "success");
                                    setTimeout(function () {
                                        location.reload();
                                    }, 2000);
                                } else if (result == '0') {

                                    Swal.fire("Opps!", "Email '" + email + "' Tidak Terdaftar dalam sistem Kami!", "error");
                                }
                            },
                            error: function (result) {
                                console.log(result);
                                Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                            }
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then(function (result) {
                    if (!result.isConfirm) {
                        Swal.fire("Dibatalkan!", "Reset Password Baru dibatalkan.", "error");
                    }
                });
            }
        </script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400}, "colors": {"theme": {"base": {"white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32"}, "light": {"white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0"}, "inverse": {"white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff"}}, "gray": {"gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32"}}, "font-family": "Poppins"};</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/students/dist/assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="<?php echo base_url(); ?>assets/students/dist/assets/js/pages/custom/login/login-students.js"></script>
        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>