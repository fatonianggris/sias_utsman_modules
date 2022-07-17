<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../../">
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="https://keenthemes.com/metronic" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--end::Layout Themes-->
        <link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css"  />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/present/dist/assets/media/logos/favicon.ico" />
        <style>
            .blink-hard {
                animation: blinker 1s step-end infinite;
            }
            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }
        </style>
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script>
            var OneSignal = window.OneSignal || [];
            var initConfig = {
                appId: "<?php echo $one_signal[0]->onesignal_app_id_emp; ?>",
                safari_web_id: "<?php echo $one_signal[0]->onesignal_app_id_emp_safari; ?>",
                notifyButton: {
                    enable: true,
                    size: 'medium', /* One of 'small', 'medium', or 'large' */
                    theme: 'default', /* One of 'default' (red-white) or 'inverse" (white-red) */
                    position: 'bottom-left',
                    text: {
                        'tip.state.unsubscribed': 'Kilk untuk mendapatkan notifikasi',
                        'tip.state.subscribed': "Anda telah mengaktifkan notifikasi",
                        'tip.state.blocked': "Anda memblokir notifikasi",
                        'message.prenotify': 'Kilk untuk mendapatkan notifikasi',
                        'message.action.subscribed': "Terima kasih telah menambahkan notifikasi!",
                        'message.action.resubscribed': "Anda telah mengaktifkan notifikasi",
                        'message.action.unsubscribed': "Anda tidak akan mendapatkan notifikasi",
                        'dialog.main.title': 'KELOLA NOTIFIKASI',
                        'dialog.main.button.subscribe': 'AKTIFKAN',
                        'dialog.main.button.unsubscribe': 'NON-AKTIFKAN',
                        'dialog.blocked.title': 'Unblock Notifikasi',
                        'dialog.blocked.message': "Ikuti intruksi untuk mengaktifkan notifikasi:"
                    },
                },
            };
            OneSignal.push(function () {
                OneSignal.SERVICE_WORKER_PARAM = {scope: '/push/onesignal/'};
                OneSignal.SERVICE_WORKER_PATH = 'push/onesignal/OneSignalSDKWorker.js'
                OneSignal.SERVICE_WORKER_UPDATER_PATH = 'push/onesignal/OneSignalSDKUpdaterWorker.js'
                OneSignal.init(initConfig);
            });
        </script>
    </head>
    <!--end::Head-->
    <?php $user = $this->session->userdata('sias-present'); ?>
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/present/dist/assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-3">
                            <div class="text-center">
                                <h3 class="font-mobile display-4 text-warning font-weight-boldest">HALAMAN DASHBOARD</h3>
                            </div>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Stats Widget 6-->
                        <div class="card card-custom card-stretch bg-warning-o-50 mb-5">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center py-0 mt-2">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                                    <?php
                                    $word = explode(" ", strip_tags($user[0]->nama_lengkap));
                                    $limit_word = implode(" ", array_splice($word, 0, 2));
                                    ?>
                                    <a href="#" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary"><b class="text-danger">Hi, <?php echo strtoupper(strtolower($limit_word)); ?>!</b></a>
                                    <span class=" text-dark-75 font-size-md">
                                        Berikut merupakan halaman dashboard terkait kehadiaran Anda.
                                    </span>
                                </div>
                                <img src="<?php echo base_url(); ?>assets/present/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                            </div>
                            <!--end::Body-->
                        </div>
                        <?php echo $this->session->flashdata('flash_message'); ?>
                        <!--end::Stats Widget 6-->
                        <div class="mb-2">
                            <?php
                            date_default_timezone_set('Asia/Jakarta');

                            function minutes($time = '') {
                                $time = explode(':', $time);
                                return ($time[0] * 60) + ($time[1]) + ($time[2] / 60);
                            }

                            $curr_time = strtotime(date('H:i:s'));
                            $time_in = strtotime($present_config[0]->start_absen);
                            $time_out = strtotime($present_config[0]->end_absen);

                            $interval_in = ($curr_time - $time_in);
                            $diff_in = round($interval_in / 60);

                            $interval_out = ($curr_time - $time_out);
                            $diff_out = round($interval_out / 60);
                            ?>
                            <?php if (!empty($present_now)) { ?>
                                <?php if (new DateTime() < new DateTime("12:00:00")) { ?>
                                    <?php if ($present_now[0]->status_absensi_masuk == 0) { ?>
                                        <h1 class="font-weight-bolder text-warning">Absensi Masuk</h1>
                                        <?php if ($diff_in > minutes($present_config[0]->toleransi_absen)) { ?>
                                            <div class="text-danger font-weight-bold font-size-sm blink-hard">"Anda Telat <?php echo $diff_in; ?> Menit"</div>
                                        <?php } ?>
                                    <?php } else if ($present_now[0]->status_absensi_masuk == 1) { ?>
                                        <h1 class="font-weight-bolder text-success">Telah Absen Masuk</h1>
                                    <?php } else if ($present_now[0]->status_absensi_masuk == 2) { ?>
                                        <h1 class="font-weight-bolder text-primary">Izin Absen Masuk</h1>
                                    <?php } else if ($present_now[0]->status_absensi_masuk == 3) { ?>
                                        <h1 class="font-weight-bolder text-danger">Telat Absen Masuk</h1>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if ($present_now[0]->status_absensi_pulang == 0) { ?>
                                        <h1 class="font-weight-bolder text-warning">Absensi Pulang</h1>
                                        <?php if ($diff_out > minutes($present_config[0]->toleransi_absen)) { ?>
                                            <div class="text-danger font-weight-bold font-size-sm blink-hard">"Anda Telat <?php echo $diff_out; ?> Menit"</div>
                                        <?php } ?>
                                    <?php } else if ($present_now[0]->status_absensi_pulang == 1) { ?>
                                        <h1 class="font-weight-bolder text-success">Telah Absen Pulang</h1>
                                    <?php } else if ($present_now[0]->status_absensi_pulang == 2) { ?>
                                        <h1 class="font-weight-bolder text-primary">Izin Absen Pulang</h1>
                                    <?php } else if ($present_now[0]->status_absensi_pulang == 3) { ?>
                                        <h1 class="font-weight-bolder text-danger">Telat Absen Pulang</h1>
                                    <?php } ?>
                                <?php } ?>
                            <?php } else { ?>
                                <h1 class="font-weight-bolder text-danger">Belum Waktu Absen</h1>
                            <?php } ?>
                            <div class="text-dark-75 font-weight-bold">Silahkan melakukan absen dengan kilk tombol absen dibawah ini:</div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-6 ">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-dark-o-30" >
                                    <div class="card-body ">
                                        <div class="text-dark-75 font-weight-bolder font-size-sm mb-1 font-size-h5">Hari/Tanggal</div>
                                        <span class="svg-icon svg-icon-3x svg-icon-dark-50 ">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" x="2" y="5" width="19" height="4" rx="1"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="11" width="19" height="10" rx="1"/>
                                            </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <?php
                                        $date = date("Y-m-d");
                                        $nameOfDay = date('l', strtotime($date));
                                        ?>
                                        <div class="font-weight-boldest text-dark-75 mt-2 font-size-h2"><?php echo hariIndo(strtolower($nameOfDay)); ?></div>
                                        <div class="font-weight-boldest font-size-sm text-danger font-size-h3"><?php echo date("d/m/Y"); ?></div>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php if (!empty($present_now)) { ?>
                                <?php if (new DateTime() < new DateTime("12:00:00")) { ?>
                                    <?php if ($present_now[0]->status_absensi_masuk == 0) { ?>
                                        <div class="col-xl-6 col-6">
                                            <!--begin::Tiles Widget 12-->
                                            <div class="card card-custom gutter-b text-center bg-warning-o-80" >

                                                <div class="card-body">
                                                    <div class="text-danger font-weight-bolder font-size-sm font-size-h6">Status Absen</div>
                                                    <span class="svg-icon svg-icon-3x svg-icon-danger">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                                        <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="text-danger font-weight-boldest font-size-h4 mt-1">BELUM ABSEN</div>
                                                    <a href="#" data-toggle="modal" data-target="#modal_list_letter"  class="btn btn-danger btn-shadow-hover font-weight-bold mt-2 blink-hard"><i class="fa fa-check"></i>Klik Disini</a>
                                                </div>
                                            </div>
                                            <!--end::Tiles Widget 12-->
                                        </div> 
                                    <?php } else if ($present_now[0]->status_absensi_masuk == 1) { ?>
                                        <div class="col-xl-6 col-6">
                                            <!--begin::Tiles Widget 12-->
                                            <div class="card card-custom gutter-b text-center bg-success-o-80" >
                                                <div class="card-body">
                                                    <div class="text-success font-weight-bolder font-size-sm font-size-h6">Status Absen</div>
                                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                                        <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="text-success font-weight-boldest font-size-h4 mt-1">SUDAH ABSEN</div>
                                                    <a class="btn btn-success btn-shadow-hover font-weight-bold mt-2 "><i class="fas fa-clock"></i> <?php echo $present_now[0]->jam_masuk; ?></a>
                                                </div>
                                            </div>
                                            <!--end::Tiles Widget 12-->
                                        </div> 
                                    <?php } else if ($present_now[0]->status_absensi_masuk == 2) { ?>
                                        <div class="col-xl-6 col-6">
                                            <!--begin::Tiles Widget 12-->
                                            <div class="card card-custom gutter-b text-center bg-primary-o-80" >
                                                <div class="card-body">
                                                    <div class="text-primary font-weight-bolder font-size-sm font-size-h6">Status Absen</div>
                                                    <span class="svg-icon svg-icon-3x svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                        <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                                        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="text-primary font-weight-boldest font-size-h4 mt-1">IZIN ABSEN</div>
                                                    <a class="btn btn-primary btn-shadow-hover font-weight-bold mt-2 "><i class="fas fa-clock"></i> <?php echo $present_now[0]->jam_masuk; ?></a>
                                                </div>
                                            </div>
                                            <!--end::Tiles Widget 12-->
                                        </div> 
                                    <?php } else if ($present_now[0]->status_absensi_masuk == 3) { ?>
                                        <div class="col-xl-6 col-6">
                                            <!--begin::Tiles Widget 12-->
                                            <div class="card card-custom gutter-b text-center bg-danger-o-80" >
                                                <div class="card-body">
                                                    <div class="text-danger font-weight-bolder font-size-sm font-size-h6">Status Absen</div>
                                                    <span class="svg-icon svg-icon-3x svg-icon-danger">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                        <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="text-danger font-weight-boldest font-size-h4 mt-1">TELAT ABSEN</div>
                                                    <a class="btn btn-danger btn-shadow-hover font-weight-bold mt-2 "><i class="fas fa-clock"></i>Waktu Habis</a>
                                                </div>
                                            </div>
                                            <!--end::Tiles Widget 12-->
                                        </div> 
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if ($present_now[0]->status_absensi_pulang == 0) { ?>
                                        <div class="col-xl-6 col-6">
                                            <!--begin::Tiles Widget 12-->
                                            <div class="card card-custom gutter-b text-center bg-warning-o-80" >

                                                <div class="card-body">
                                                    <div class="text-danger font-weight-bolder font-size-sm font-size-h6">Status Absen</div>
                                                    <span class="svg-icon svg-icon-3x svg-icon-danger">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                                        <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="text-danger font-weight-boldest font-size-h4 mt-1">BELUM ABSEN</div>
                                                    <a href="#" data-toggle="modal" data-target="#modal_list_letter" class="btn btn-danger btn-shadow-hover font-weight-bold mt-2 blink-hard"><i class="fa fa-check"></i>Klik Disini</a>
                                                </div>
                                            </div>
                                            <!--end::Tiles Widget 12-->
                                        </div> 
                                    <?php } else if ($present_now[0]->status_absensi_pulang == 1) { ?>
                                        <div class="col-xl-6 col-6">
                                            <!--begin::Tiles Widget 12-->
                                            <div class="card card-custom gutter-b text-center bg-success-o-80" >
                                                <div class="card-body">
                                                    <div class="text-success font-weight-bolder font-size-sm font-size-h6">Status Absen</div>
                                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                                        <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="text-success font-weight-boldest font-size-h4 mt-1">SUDAH ABSEN</div>
                                                    <a class="btn btn-success btn-shadow-hover font-weight-bold mt-2 "><i class="fas fa-clock"></i> <?php echo $present_now[0]->jam_pulang; ?></a>
                                                </div>
                                            </div>
                                            <!--end::Tiles Widget 12-->
                                        </div> 
                                    <?php } else if ($present_now[0]->status_absensi_pulang == 2) { ?>
                                        <div class="col-xl-6 col-6">
                                            <!--begin::Tiles Widget 12-->
                                            <div class="card card-custom gutter-b text-center bg-primary-o-80" >
                                                <div class="card-body">
                                                    <div class="text-primary font-weight-bolder font-size-sm font-size-h6">Status Absen</div>
                                                    <span class="svg-icon svg-icon-3x svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                        <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                                        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="text-primary font-weight-boldest font-size-h4 mt-1">IZIN ABSEN</div>
                                                    <a class="btn btn-primary btn-shadow-hover font-weight-bold mt-2 "><i class="fas fa-clock"></i> <?php echo $present_now[0]->jam_pulang; ?></a>
                                                </div>
                                            </div>
                                            <!--end::Tiles Widget 12-->
                                        </div> 
                                    <?php } else if ($present_now[0]->status_absensi_pulang == 3) { ?>
                                        <div class="col-xl-6 col-6">
                                            <!--begin::Tiles Widget 12-->
                                            <div class="card card-custom gutter-b text-center bg-danger-o-80" >
                                                <div class="card-body">
                                                    <div class="text-danger font-weight-bolder font-size-sm font-size-h6">Status Absen</div>
                                                    <span class="svg-icon svg-icon-3x svg-icon-danger">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                        <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <div class="text-danger font-weight-boldest font-size-h4 mt-1">TELAT ABSEN</div>
                                                    <a class="btn btn-danger btn-shadow-hover font-weight-bold mt-2"><i class="fas fa-clock"></i>Waktu Habis</a>
                                                </div>
                                            </div>
                                            <!--end::Tiles Widget 12-->
                                        </div> 
                                    <?php } ?>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="col-xl-6 col-6">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom gutter-b text-center bg-dark-o-30" >
                                        <div class="card-body">
                                            <div class="text-dark-75 font-weight-bolder font-size-sm font-size-h5 mb-4">Status Absen</div>
                                            <span class="svg-icon svg-icon-3x svg-icon-dark">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                                <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <div class="text-dark font-weight-boldest font-size-h4 mt-3">BELUM WAKTU ABSEN</div>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div> 
                            <?php } ?>
                        </div>

                        <div class="col-12">
                            <div class="mb-1">
                                <h5 class="font-weight-bolder text-success">Total Absen Masuk</h5>                              
                            </div>
                            <div class="row mb-5">
                                <div class="card card-custom col-4  bg-success-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">HADIR</div>
                                            <div class="font-weight-bolder font-size-h3">
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
                                <div class="card card-custom col-4  bg-warning-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">IZIN</div>
                                            <div class="font-weight-bolder font-size-h3">
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
                                <div class="card card-custom col-4  bg-danger-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">ALPHA</div>
                                            <div class="font-weight-bolder font-size-h3">
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
                            <div class="mb-1">
                                <h5 class="font-weight-bolder text-danger">Total Absen Pulang</h5>                              
                            </div>
                            <div class="row mb-5">
                                <div class="card card-custom col-4  bg-success-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">HADIR</div>
                                            <div class="font-weight-bolder font-size-h3">
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
                                <div class="card card-custom col-4  bg-warning-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">IZIN</div>
                                            <div class="font-weight-bolder font-size-h3">
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
                                <div class="card card-custom col-4  bg-danger-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">ALPHA</div>
                                            <div class="font-weight-bolder font-size-h3">
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
                        <div class="login-signin">
                            <div class="mb-5">
                                <h1 class="font-weight-bolder text-warning">Panel Menu</h1>
                                <div class="text-danger font-weight-bold">Silahkan pilih menu aktifitas dibawah ini:</div>
                            </div>                      
                            <div class="row">
                                <div class="col-xl-6 col-6 ">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom gutter-b text-center bg-primary" >
                                        <div class="card-body ">
                                            <span class="svg-icon svg-icon-3x svg-icon-white ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <div class="font-weight-bolder font-size-sm mt-3 text-white">History Kehadiran Anda</div>
                                            <a id="button_load" href="<?php echo site_url('present/history/present/list_history_present') ?>" class="btn btn-light-warning button-load btn-shadow-hover font-weight-bold mt-3"><i class="fa fa-eye"></i> Lihat</a>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <div class="col-xl-6 col-6">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom gutter-b text-center bg-primary">
                                        <div class="card-body">
                                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <div class="text-white font-weight-bolder font-size-sm mt-3">Detail Bio Profile Anda</div>
                                            <a href="<?php echo site_url('present/settings/account/edit_profile') ?>" class="btn btn-light-warning button-load btn-shadow-hover font-weight-bold mt-3"><i class="fa fa-eye"></i> Lihat</a>

                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div> 

                            </div>
                            <div class="text-center">
                                <a href="<?php echo site_url('present/auth/logout'); ?>" type="button" class="btn btn-warning button-load font-weight-bold px-9 py-4 my-3 mx-4 mt-1"><li class="fas fa-door-open font-size-h4"></li> Keluar</a>
                            </div>
                            <!--end::form-->  
                            <div class="mt-5 text-center">
                                <span class="mr-1 text-dark-75">2021©</span>
                                <a href="" target="_blank" class="text-dark-75 text-hover-primary">Sekolah Utsman</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->

        <div class="modal fade" id="modal_list_letter"  data-keyboard="false" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content" id="kt_form_nop">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Status Kehadiran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">                   
                        <div class="row">
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-warning-o-60" >

                                    <div class="card-body">
                                        <div class="text-success font-weight-bolder font-size-sm font-size-h6">Absen Hadir</div>
                                        <span class="svg-icon svg-icon-3x svg-icon-success">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                            <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                                            </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-success font-weight-boldest font-size-h1">HADIR</div>
                                        <a href="<?php echo site_url('present/history/present/do_present'); ?>" class="btn btn-success btn-shadow-hover button-load font-weight-bold mt-2 "><i class="fa fa-check"></i> Hadir</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div> 
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-warning-o-60" >

                                    <div class="card-body">
                                        <div class="text-danger font-weight-bolder font-size-sm font-size-h6">Absen Izin</div>
                                        <span class="svg-icon svg-icon-3x svg-icon-danger">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                            <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
                                            </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-danger font-weight-boldest font-size-h1">IZIN</div>
                                        <a href="<?php echo site_url('present/history/present/do_present_permission'); ?>" class="btn btn-danger button-load btn-shadow-hover font-weight-bold mt-2"><i class="fa fa-check"></i> Izin</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
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

        <script>var HOST_URL = "<?php echo base_url(); ?>";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400}, "colors": {"theme": {"base": {"white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32"}, "light": {"white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0"}, "inverse": {"white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff"}}, "gray": {"gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32"}}, "font-family": "Poppins"};</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/present/dist/assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
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
        <!--end::Page Scripts-->
        <script>
            $('#example_1').whatsappChatSupport();
        </script>

    </body>
    <!--end::Body-->
</html>