<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="<?php echo base_url(); ?>assets/students/dist/assets/css/pages/login/classic/login-4.css"
        rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/prismjs/prismjs.bundle.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/students/dist/assets/css/style.bundle.css" rel="stylesheet"
        type="text/css" />
    <!--end::Global Theme Styles-->
    <!--end::Layout Themes-->
    <link
        href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css"
        rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/students/dist/assets/media/logos/favicon.ico" />
    <style>
    .blink-hard {
        animation: blinker 1s step-end infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

    .wrapper-slider-custom {
        width: 50%;
        margin: auto;
        overflow: hidden;
    }


    .slider-container-custom {
        display: flex;
        /* Penting agar tidak numpuk */
        transition: transform 0.5s ease-in-out;
        flex-wrap: nowrap;
    }

    .box-information {
        height: 157px;
    }
    </style>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
    var OneSignal = window.OneSignal || [];
    var initConfig = {
        appId: "<?php echo $one_signal[0]->onesignal_app_id_stu; ?>",
        safari_web_id: "<?php echo $one_signal[0]->onesignal_app_id_stu_safari; ?>",
        notifyButton: {
            enable: true,
            size: 'medium',
            /* One of 'small', 'medium', or 'large' */
            theme: 'default',
            /* One of 'default' (red-white) or 'inverse" (white-red) */
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
    OneSignal.push(function() {
        OneSignal.SERVICE_WORKER_PARAM = {
            scope: '/push/onesignal/'
        };
        OneSignal.SERVICE_WORKER_PATH = 'push/onesignal/OneSignalSDKWorker.js'
        OneSignal.SERVICE_WORKER_UPDATER_PATH = 'push/onesignal/OneSignalSDKUpdaterWorker.js'
        OneSignal.init(initConfig);
    });
    </script>
</head>
<!--end::Head-->
<?php $user = $this->session->userdata('sias-students'); ?>
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                style="background-image: url('<?php echo base_url(); ?>assets/students/dist/assets/media/bg/bg-3.jpg');">
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
                                <a
                                    class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary"><b
                                        class="text-danger">Assalamualikum,
                                        <?php echo strtoupper(strtolower($limit_word)); ?>!</b></a>
                                <span class="text-dark-75 font-size-md font-weight-bold">
                                    Berikut merupakan halaman dashboard Akademik Siswa.
                                </span>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/students/dist/assets/media/svg/avatars/004-boy-1.svg"
                                alt="" class="align-self-end h-100px">
                        </div>
                        <!--end::Body-->
                    </div>
                    <?php echo $this->session->flashdata('flash_message'); ?>
                    <!--end::Stats Widget 6-->

                    <div class="row">
                        <div class="wrapper-slider-custom">
                            <div class="slider-container-custom" id="slider">
                                <?php if ($status_payment_du) { ?>
                                <?php if ($status_payment_du[0]->status_pembayaran == "MENUNGGU") { ?>
                                <div class="col-xl-12 col-12 slider-card">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom text-center bg-danger-o-50 box-information">
                                        <div class="card-body ">
                                            <div class="text-dark-75 font-weight-bolder font-size-sm font-size-h6 mb-1">
                                                Status
                                                Bayar DU</div>
                                            <span class="svg-icon svg-icon-3x svg-icon-danger ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20"
                                                            height="20" rx="10" />
                                                        <path
                                                            d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z"
                                                            fill="#000000"
                                                            transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) " />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $date = date("Y-m-d");
                                        $nameOfMonth = date('F', strtotime($date));
                                        ?>
                                            <div class="font-weight-bolder font-size-sm text-dark-75">
                                                TAHUN AJARAN
                                            </div>
                                            <div class="font-weight-boldest font-size-sm text-dark-75 font-size-h5">
                                                <?php echo date("Y"); ?>/<?php echo date("Y")+1; ?>
                                            </div>
                                            <div class="font-weight-boldest text-danger font-size-h2 blink-hard">TUNGGAK
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <?php } else { ?>
                                <div class="col-xl-12 col-12 slider-card">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom text-center bg-success-o-50 box-information">
                                        <div class="card-body ">
                                            <div class="text-dark-75 font-weight-bolder font-size-sm font-size-h6 mb-1">
                                                Status
                                                Bayar DU</div>
                                            <span class="svg-icon svg-icon-3x svg-icon-success ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20"
                                                            height="20" rx="10" />
                                                        <path
                                                            d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $date = date("Y-m-d");
                                        $nameOfMonth = date('F', strtotime($date));
                                        ?>
                                            <div class="font-weight-bolder font-size-sm text-dark-75 ">
                                                TAHUN AJARAN
                                            </div>
                                            <div class="font-weight-boldest font-size-sm text-dark-75 font-size-h5">
                                                <?php echo date("Y"); ?>/<?php echo date("Y")+1; ?>
                                            </div>
                                            <div class="font-weight-boldest text-success font-size-h2 blink-hard">LUNAS
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <?php } ?>
                                <?php } else { ?>
                                <div class="col-xl-12 col-12 slider-card">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom text-center bg-warning-o-50 box-information">
                                        <div class="card-body ">
                                            <div class="text-dark-75 font-weight-bolder font-size-sm font-size-h6 mb-1">
                                                Status
                                                Bayar DU</div>
                                            <span class="svg-icon svg-icon-3x svg-icon-warning ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                        <rect fill="#000000" x="11" y="10" width="2" height="7"
                                                            rx="1" />
                                                        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $date = date("Y-m-d");
                                        $nameOfMonth = date('F', strtotime($date));
                                        ?>
                                            <div class="font-weight-bolder font-size-sm text-dark-75">
                                                TAHUN AJARAN
                                            </div>
                                            <div class="font-weight-boldest font-size-sm text-dark-75 font-size-h5">
                                                <?php echo date("Y"); ?>/<?php echo date("Y")+1; ?>
                                            </div>
                                            <div class="font-weight-boldest text-warning font-size-h3 blink-hard mt-1">
                                                MENUNGGU
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <?php } ?>
                                <?php $bulan = date('m'); ?>
                                <?php if ($bulan == '07') { ?>
                                <div class="col-xl-12 col-12 slider-card">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom text-center bg-success-o-50 box-information">
                                        <div class="card-body ">
                                            <div class="text-dark-75 font-weight-bolder font-size-sm font-size-h6 mb-1">
                                                Status
                                                Bayar DPB</div>
                                            <span class="svg-icon svg-icon-3x svg-icon-success ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20"
                                                            height="20" rx="10" />
                                                        <path
                                                            d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $date = date("Y-m-d");
                                            $nameOfMonth = date('F', strtotime($date));
                                            ?>
                                            <div class="font-weight-boldest font-size-sm text-dark-75 font-size-h4">
                                                <?php echo strtoupper(bulanindoSQLtext($nameOfMonth)); ?></div>
                                            <div class="font-weight-bolder font-size-sm text-dark-75">
                                                <?php echo date("Y"); ?>
                                            </div>
                                            <div class="font-weight-boldest text-success font-size-h2 blink-hard">LUNAS
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <?php } else { ?>
                                <?php if ($status_payment_dpb) { ?>
                                <?php if ($status_payment_dpb[0]->status_pembayaran == "MENUNGGU") { ?>
                                <div class="col-xl-12 col-12 slider-card">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom text-center bg-danger-o-50 box-information">
                                        <div class="card-body ">
                                            <div class="text-dark-75 font-weight-bolder font-size-sm font-size-h6 mb-1">
                                                Status
                                                Bayar DPB</div>
                                            <span class="svg-icon svg-icon-3x svg-icon-danger ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20"
                                                            height="20" rx="10" />
                                                        <path
                                                            d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z"
                                                            fill="#000000"
                                                            transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) " />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $date = date("Y-m-d");
                                            $nameOfMonth = date('F', strtotime($date));
                                            ?>
                                            <div
                                                class="font-weight-boldest font-size-sm text-dark-75 font-size-h5 mt-1">
                                                <?php echo strtoupper(bulanindoSQLtext($nameOfMonth)); ?></div>
                                            <div class="font-weight-bolder font-size-sm text-dark-75">
                                                <?php echo date("Y"); ?>
                                            </div>
                                            <div class="font-weight-boldest text-danger font-size-h2 blink-hard">TUNGGAK
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <?php } else { ?>
                                <div class="col-xl-12 col-12 slider-card">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom text-center bg-success-o-50 box-information">
                                        <div class="card-body ">
                                            <div class="text-dark-75 font-weight-bolder font-size-sm font-size-h6 mb-1">
                                                Status
                                                Bayar DPB</div>
                                            <span class="svg-icon svg-icon-3x svg-icon-success ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20"
                                                            height="20" rx="10" />
                                                        <path
                                                            d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $date = date("Y-m-d");
                                            $nameOfMonth = date('F', strtotime($date));
                                            ?>
                                            <div class="font-weight-boldest font-size-sm text-dark-75 font-size-h4">
                                                <?php echo strtoupper(bulanindoSQLtext($nameOfMonth)); ?></div>
                                            <div class="font-weight-bolder font-size-sm text-dark-75">
                                                <?php echo date("Y"); ?>
                                            </div>
                                            <div class="font-weight-boldest text-success font-size-h2 blink-hard">LUNAS
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <?php } ?>
                                <?php } else { ?>
                                <div class="col-xl-12 col-12 slider-card">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom text-center bg-warning-o-50 box-information">
                                        <div class="card-body ">
                                            <div class="text-dark-75 font-weight-bolder font-size-sm font-size-h6 mb-1">
                                                Status
                                                Bayar DPB</div>
                                            <span class="svg-icon svg-icon-3x svg-icon-warning ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                        <rect fill="#000000" x="11" y="10" width="2" height="7"
                                                            rx="1" />
                                                        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $date = date("Y-m-d");
                                        $nameOfMonth = date('F', strtotime($date));
                                        ?>
                                            <div class="font-weight-boldest font-size-sm text-dark-75 font-size-h5">
                                                <?php echo strtoupper(bulanindoSQLtext($nameOfMonth)); ?></div>
                                            <div class="font-weight-bolder font-size-sm text-dark-75">
                                                <?php echo date("Y"); ?>
                                            </div>
                                            <div class="font-weight-boldest text-warning font-size-h3 blink-hard mt-1">
                                                MENUNGGU
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-6">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom text-center bg-primary-o-90 box-information">
                                <div class="card-body">
                                    <?php if ($user[0]->foto_siswa == NULL or $user[0]->foto_siswa == "") { ?>
                                    <div class="symbol symbol-70 symbol-lg-100 symbol-light-danger ">
                                        <span
                                            class="font-size-h2 symbol-label font-weight-bolder"><?php echo strtoupper(substr($user[0]->nama_lengkap, 0, 2)); ?></span>
                                    </div>
                                    <?php } else { ?>
                                    <div class="symbol symbol-70 symbol-lg-100">
                                        <img alt="Pic" src="<?php echo base_url() . $user[0]->foto_siswa ?>">
                                    </div>
                                    <?php } ?>
                                    <div class="mt-2">
                                        <span
                                            class="label label-lg font-weight-bolder label-light-warning label-inline">
                                            <?php
												if ($user[0]->level_tingkat == 1) {
													echo 'KB';
												} else if ($user[0]->level_tingkat == 2) {
													echo 'TK';
												} else if ($user[0]->level_tingkat == 3) {
													echo 'SD';
												} else if ($user[0]->level_tingkat == 4) {
													echo 'SMP';
												}
												?>
                                        </span>
                                        <span
                                            class="label label-lg font-weight-bolder label-light-success label-inline">
                                            <?php
                                            if ($user[0]->jalur == 1) {
                                                echo 'REGULER';
                                            } else if ($user[0]->jalur == 2) {
                                                echo 'ICP';
                                            }
                                            ?>
                                            -
                                        </span>
                                        <br>
                                        <span
                                            class="label label-lg font-weight-bolder label-light-danger label-inline mt-2">
                                            KELAS: -
                                            <!-- <?php echo ($user[0]->nama_kelas); ?> -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                    </div>
                    <?php if ($page[0]->status_maintenance_presence == 0) { ?>
                    <div class="col-12">
                        <div class="mt-5">
                            <h5 class="font-weight-bolder font-size-h6 text-dark">Total Kehadiran TA:
                                <?php echo $schoolyear[0]->tahun_awal . "/" . $schoolyear[0]->tahun_awal . " " . strtoupper($schoolyear[0]->semester); ?>
                            </h5>
                        </div>
                        <div class="row mb-4">
                            <div class="card card-custom col-4 bg-success-o-50">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1">
                                        <div class="text-dark-50 font-weight-bolder">SAKIT</div>
                                        <div class="font-weight-bolder font-size-h3">
                                            <?php if ($total_students) { ?>
                                            <?php if ($total_students[0]->sakit == NULL || $total_students[0]->sakit == "") { ?>
                                            0
                                            <?php } else { ?>
                                            <?php echo $total_students[0]->sakit; ?>
                                            <?php } ?>
                                            <?php } else { ?>
                                            0
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--end::Stats-->

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--begin:: form-->
                            <!--end::Stats Widget 6-->
                            <div class="card card-custom col-4  bg-warning-o-50">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1">
                                        <div class="text-dark-50 font-weight-bolder">IZIN</div>
                                        <div class="font-weight-bolder font-size-h3">
                                            <?php if ($total_students) { ?>
                                            <?php if ($total_students[0]->izin == NULL || $total_students[0]->izin == "") { ?>
                                            0
                                            <?php } else { ?>
                                            <?php echo $total_students[0]->izin; ?>
                                            <?php } ?>
                                            <?php } else { ?>
                                            0
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--begin:: form-->
                            <!--end::Stats Widget 6-->
                            <div class="card card-custom col-4  bg-danger-o-50">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Stats-->
                                    <div class="flex-grow-1">
                                        <div class="text-dark-50 font-weight-bolder">ALPHA</div>
                                        <div class="font-weight-bolder font-size-h3">
                                            <?php if ($total_students) { ?>
                                            <?php if ($total_students[0]->alpha == NULL || $total_students[0]->alpha == "") { ?>
                                            0
                                            <?php } else { ?>
                                            <?php echo $total_students[0]->alpha; ?>
                                            <?php } ?>
                                            <?php } else { ?>
                                            0
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
                    <?php }?>
                    <div class="login-signin">
                        <div class="mb-2 mt-4">
                            <h1 class="font-weight-bolder text-warning mb-1">Panel Menu</h1>
                            <div class="text-danger font-weight-bolder font-size-sm">Silahkan pilih menu aktifitas
                                dibawah ini:</div>
                        </div>
                        <div class="row">
                            <?php if ($page[0]->status_maintenance_finance == 1) { ?>
                            <div class="col-xl-6 col-6 ">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-dark-o-90 box-information">
                                    <div class="card-body ">
                                        <span class="svg-icon svg-icon-3x svg-icon-dark ">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2"
                                                        height="4" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2"
                                                        height="5" rx="1" />
                                                    <path
                                                        d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="font-weight-bolder font-size-sm mt-3 text-dark">Riwayat Pembayaran
                                            Siswa</div>
                                        <a href="javascript:act_maintenance()"
                                            class="btn btn-light-dark btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fas fa-ban"></i>Non Aktif</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } else { ?>
                            <div class="col-xl-6 col-6 ">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-primary box-information">
                                    <div class="card-body ">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2"
                                                        height="4" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2"
                                                        height="5" rx="1" />
                                                    <path
                                                        d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="font-weight-bolder font-size-sm mt-3 text-white">Riwayat Tagihan
                                            DU/DPB
                                            Siswa</div>
                                        <a href="#" data-toggle="modal" data-target="#modal_list_letter"
                                            class="btn btn-light-warning btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fa fa-eye"></i> Lihat</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } ?>
                            <?php if ($page[0]->status_maintenance_finance == 1) { ?>
                            <div class="col-xl-6 col-6 ">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-dark-o-90 box-information">
                                    <div class="card-body ">
                                        <span class="svg-icon svg-icon-3x svg-icon-dark ">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2"
                                                        height="4" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2"
                                                        height="5" rx="1" />
                                                    <path
                                                        d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="font-weight-bolder font-size-sm mt-3 text-dark">Riwayat Tabungan
                                            Siswa
                                        </div>
                                        <a href="javascript:act_maintenance()"
                                            class="btn btn-light-dark btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fas fa-ban"></i>Non Aktif</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } else { ?>
                            <div class="col-xl-6 col-6 ">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-primary box-information">
                                    <div class="card-body ">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M6.5,16 L7.5,16 C8.32842712,16 9,16.6715729 9,17.5 L9,19.5 C9,20.3284271 8.32842712,21 7.5,21 L6.5,21 C5.67157288,21 5,20.3284271 5,19.5 L5,17.5 C5,16.6715729 5.67157288,16 6.5,16 Z M16.5,16 L17.5,16 C18.3284271,16 19,16.6715729 19,17.5 L19,19.5 C19,20.3284271 18.3284271,21 17.5,21 L16.5,21 C15.6715729,21 15,20.3284271 15,19.5 L15,17.5 C15,16.6715729 15.6715729,16 16.5,16 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M5,4 L19,4 C20.1045695,4 21,4.8954305 21,6 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6 C3,4.8954305 3.8954305,4 5,4 Z M15.5,15 C17.4329966,15 19,13.4329966 19,11.5 C19,9.56700338 17.4329966,8 15.5,8 C13.5670034,8 12,9.56700338 12,11.5 C12,13.4329966 13.5670034,15 15.5,15 Z M15.5,13 C16.3284271,13 17,12.3284271 17,11.5 C17,10.6715729 16.3284271,10 15.5,10 C14.6715729,10 14,10.6715729 14,11.5 C14,12.3284271 14.6715729,13 15.5,13 Z M7,8 L7,8 C7.55228475,8 8,8.44771525 8,9 L8,11 C8,11.5522847 7.55228475,12 7,12 L7,12 C6.44771525,12 6,11.5522847 6,11 L6,9 C6,8.44771525 6.44771525,8 7,8 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="font-weight-bolder font-size-sm mt-3 text-white">Riwayat Tabungan
                                            Siswa</div>
                                        <a href="#" data-toggle="modal" data-target="#modal_list_saving"
                                            class="btn btn-light-warning btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fa fa-eye"></i> Lihat</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <?php if ($page[0]->status_maintenance_report == 1) { ?>
                            <div class="col-xl-6 col-6" style="display: none;">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-dark-o-90 box-information">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-dark">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        </span>
                                        <div class="font-weight-bolder font-size-sm mt-3 text-dark">Daftar Rapor Online
                                            Siswa</div>
                                        <a href="javascript:act_maintenance()"
                                            class="btn btn-light-dark btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fas fa-ban"></i>Non Aktif</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } else { ?>
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-primary box-information">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-white font-weight-bolder font-size-sm mt-3">Daftar Rapor Online
                                            Siswa</div>
                                        <a href="<?php echo site_url('students/academic/academic/list_student_report') ?>"
                                            class="btn btn-light-warning button-load btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fa fa-eye"></i> Lihat</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } ?>
                            <?php if ($page[0]->status_maintenance_presence == 1) { ?>
                            <div class="col-xl-6 col-6 " style="display: none;">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-dark-o-90 box-information">
                                    <div class="card-body ">
                                        <span class="svg-icon svg-icon-3x svg-icon-dark ">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="font-weight-bolder font-size-sm mt-3 text-dark">Riwayat Kehadiran
                                            Siswa</div>
                                        <a href="javascript:act_maintenance()"
                                            class="btn btn-light-dark btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fas fa-ban"></i>Non Aktif</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } else { ?>
                            <div class="col-xl-6 col-6 ">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-primary box-information">
                                    <div class="card-body ">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="font-weight-bolder font-size-sm mt-3 text-white">Riwayat Kehadiran
                                            Siswa</div>
                                        <a href="<?php echo site_url('students/academic/academic/list_student_presence') ?>"
                                            class="btn btn-light-warning button-load btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fa fa-eye"></i> Lihat</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } ?>
                            <?php if ($page[0]->status_maintenance_announcement == 1) { ?>
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-dark-o-90 box-information">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-dark">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <path
                                                        d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z"
                                                        fill="#000000" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="16" width="4"
                                                        height="4" rx="2" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-dark font-weight-bolder font-size-sm mt-3">Daftar Pengumuman
                                            Sekolah</div>
                                        <a href="javascript:act_maintenance()"
                                            class="btn btn-light-dark btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fas fa-ban"></i>Non Aktif</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } else { ?>
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-primary box-information">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <path
                                                        d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z"
                                                        fill="#000000" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="16" width="4"
                                                        height="4" rx="2" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-white font-weight-bolder font-size-sm mt-3">Daftar Pengumuman
                                            Sekolah</div>
                                        <a href="<?php echo site_url('students/announcement/announcement/list_announcement_students') ?>"
                                            class="btn btn-light-warning button-load btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fas fa-eye"></i> Lihat</a>

                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                            <?php } ?>
                            <div class="col-xl-6 col-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b text-center bg-primary box-information">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <polygon fill="#000000" opacity="0.3"
                                                        transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) "
                                                        points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476" />
                                                    <path
                                                        d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z"
                                                        fill="#000000"
                                                        transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) " />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-white font-weight-bolder font-size-sm mt-3">Ganti
                                            Password/Email Siswa</div>
                                        <a href="<?php echo site_url('students/settings/account/edit_email_password') ?>"
                                            class="btn btn-light-warning button-load btn-shadow-hover font-weight-bold mt-3"><i
                                                class="fas fa-pencil-ruler"></i> Ganti</a>

                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-3 ">
                            </div>

                            <div class="col-xl-3 col-3 ">
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="<?php echo site_url('students/auth/logout'); ?>" type="button"
                                class="btn btn-warning button-load font-weight-bold px-9 py-4 my-3 mx-4 mt-1">
                                <li class="fas fa-door-open font-size-h4"></li> Keluar
                            </a>
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

    <div class="modal fade" id="modal_list_letter" data-keyboard="false" data-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content" id="kt_form_nop">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Daftar Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-6">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom text-center bg-warning-o-60">

                                <div class="card-body">
                                    <div class="text-success font-weight-bolder font-size-sm font-size-h6">Pembayaran
                                    </div>
                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14"
                                                    rx="2" />
                                                <rect fill="#000000" x="2" y="8" width="20" height="3" />
                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2"
                                                    rx="1" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-success font-weight-boldest font-size-h1">DPB</div>
                                    <a href="<?php echo site_url('students/finance/finance/list_student_payment_dpb') ?>"
                                        class="btn btn-success btn-shadow-hover button-load font-weight-bold mt-2 "><i
                                            class="fas fa-eye"></i> Lihat</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                        <div class="col-xl-6 col-6">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom text-center bg-warning-o-60">

                                <div class="card-body">
                                    <div class="text-danger font-weight-bolder font-size-sm font-size-h6">Pembayaran
                                    </div>
                                    <span class="svg-icon svg-icon-3x svg-icon-danger">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="5"
                                                    rx="1" />
                                                <path
                                                    d="M5,7 L8,7 L8,21 L7,21 C5.8954305,21 5,20.1045695 5,19 L5,7 Z M19,7 L19,19 C19,20.1045695 18.1045695,21 17,21 L11,21 L11,7 L19,7 Z"
                                                    fill="#000000" />
                                                <!--</g>-->
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-danger font-weight-boldest font-size-h1">DU</div>
                                    <a href="<?php echo site_url('students/finance/finance/list_student_payment_du'); ?>"
                                        class="btn btn-danger button-load btn-shadow-hover font-weight-bold mt-2"><i
                                            class="fas fa-eye"></i> Lihat</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-danger font-weight-bold"
                        data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_list_saving" data-keyboard="false" data-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content" id="kt_form_nop">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Tabungan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom text-center bg-warning-o-60">

                                <div class="card-body">
                                    <div class="text-success font-weight-bolder font-size-sm">Tabungan
                                    </div>
                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="14px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14"
                                                    rx="2" />
                                                <rect fill="#000000" x="2" y="8" width="20" height="3" />
                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2"
                                                    rx="1" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-success font-weight-boldest">UMUM</div>
                                    <a href="<?php echo site_url('students/saving/list_student_general_saving'); ?>"
                                        class="btn btn-success btn-sm btn-shadow-hover button-load font-weight-bold mt-2 ">
                                        Lihat</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                        <div class="col-4">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom text-center bg-warning-o-60">

                                <div class="card-body">
                                    <div class="text-warning font-weight-bolder font-size-sm">Tabungan
                                    </div>
                                    <span class="svg-icon svg-icon-3x svg-icon-warning">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="14px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M6.98113892,21.5 L7.61810208,21.5 C7.84357761,21.5 8.04115745,21.3490893 8.10048399,21.1315587 L9.37729932,16.4497595 C9.44617559,16.1972133 9.69816937,16.0405293 9.95512991,16.0904778 C11.3596584,16.3634926 12.3746151,16.5 13,16.5 C13.646503,16.5 15.0010968,16.3541177 17.0637814,16.0623532 L17.0637875,16.0623965 C17.3131816,16.0271199 17.5498754,16.1828763 17.6161485,16.4258779 L18.899516,21.1315587 C18.9588425,21.3490893 19.1564224,21.5 19.3818979,21.5 L20.0384026,21.5 C20.2990829,21.5 20.5160222,21.2997228 20.5368102,21.0398726 L21.1544815,13.3189809 C21.3306498,11.1168774 19.6883048,9.18890717 17.4862013,9.01273889 C17.3800862,9.00424968 17.2736745,9 17.1672204,9 L13,9 C12.0256112,6.96792142 11.1922779,5.63458808 10.5,5 C10.1827335,4.70917234 8.36084967,3.94216891 5.03434861,2.69898968 L5.03438003,2.69890562 C4.87913228,2.64088647 4.7062453,2.71970582 4.64822614,2.87495357 C4.62696245,2.93185098 4.62346541,2.99386164 4.63819725,3.05278899 L4.92939183,4.21785549 C4.97292798,4.39200007 4.919759,4.57611822 4.79008912,4.70024499 C4.13636504,5.32602378 3.70633533,5.75927545 3.5,6 C3.28507393,6.25074708 2.97597493,7.00745907 2.57270301,8.27013596 L2.5727779,8.27015988 C2.52651585,8.4150101 2.54869436,8.57304154 2.6330412,8.69956179 L3.23554277,9.60331416 C3.38359021,9.82538532 3.67995409,9.89202755 3.9088158,9.75471052 L4.75,9.25 C5.15859127,9.00484524 5.68855714,9.13733671 5.9337119,9.54592798 C6.00837879,9.67037279 6.05044776,9.81164184 6.05602542,9.95666096 L6.48150833,21.0192166 C6.49183398,21.2876836 6.71247339,21.5 6.98113892,21.5 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-warning font-weight-boldest">Qurban</div>
                                    <a href="<?php echo site_url('students/saving/list_student_qurban_saving'); ?>"
                                        class="btn btn-sm btn-warning button-load btn-shadow-hover font-weight-bold mt-2">Lihat</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                        <div class="col-4">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom text-center bg-warning-o-60">

                                <div class="card-body">
                                    <div class="text-danger font-weight-bolder font-size-sm">Tabungan
                                    </div>
                                    <span class="svg-icon svg-icon-3x svg-icon-danger">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="14px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="9" />
                                                <path
                                                    d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-danger font-weight-boldest">WISATA</div>
                                    <a href="<?php echo site_url('students/saving/list_student_tour_saving'); ?>"
                                        class="btn btn-danger btn-sm button-load btn-shadow-hover font-weight-bold mt-2">Lihat</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-danger font-weight-bold"
                        data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="whatsapp_chat_support wcs_fixed_right" id="example_1">
        <!-- <div class="wcs_button_label">
            Butuh bantuan?
        </div> -->
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
                <div class="wcs_popup_header_description">Pilih salah satu <b>Admin SIAS</b> dibawah ini</div>
            </div>
            <div class="wcs_popup_person_container">
                <?php if ($contact[0]->no_handphone != "" or $contact[0]->no_handphone != NULL) { ?>
                <div class="wcs_popup_person" data-number="<?php echo "62" . substr($contact[0]->no_handphone, 1); ?>"
                    data-default-msg="Assslamualaikum, permisi mau bertanya?">
                    <div class="wcs_popup_person_img"><img src="<?php echo base_url() . $page[0]->logo_website; ?>"
                            alt=""></div>
                    <div class="wcs_popup_person_content">
                        <div class="wcs_popup_person_name">Admin SIAS</div>
                        <div class="wcs_popup_person_description">Petugas SIAS</div>
                        <div class="wcs_popup_person_status">Sedang Online</div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
    var HOST_URL = "<?php echo base_url(); ?>";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/prismjs/prismjs.bundle.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script
        src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js">
    </script>
    <script>
    const slider = document.getElementById("slider");
    const cards = document.querySelectorAll(".slider-card");
    const cardWidth = cards[0].offsetWidth;
    let index = 0;

    function slideNext() {
        index = (index + 1) % cards.length;
        slider.style.transform = `translateX(-${index * cardWidth}px)`;
    }

    setInterval(slideNext, 3000);

    window.addEventListener('resize', () => {
        const newWidth = cards[0].offsetWidth;
        slider.style.transform = `translateX(-${index * newWidth}px)`;
    });
    </script>
    <?php if ($status_student[0]->status_update_biodata == 1) { ?>
    <script>
    Swal.fire({
        title: "Pemberitahuan!",
        text: "Mohon Maaf, Untuk penyesuian data Siswa sesuai aturan DIKNAS, dimohon para Siswa untuk melakukan update Biodata terbaru. Terima Kasih.",
        icon: "warning",
        buttonsStyling: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: "Update Biodata",
        customClass: {
            confirmButton: "btn button-load font-weight-bold btn-warning"
        }
    }).then((result) => {
        if (result.value) {
            window.location.href = HOST_URL + 'students/settings/account/edit_student_biodata';
        }
    });
    </script>
    <?php } ?>

    <?php if ($page[0]->status_maintenance_finance == 1 || $page[0]->status_maintenance_report == 1 || $page[0]->status_maintenance_presence == 1 || $page[0]->status_maintenance_announcement == 1) { ?>
    <script>
    function act_maintenance() {
        Swal.fire({
            title: "Pemberitahuan!",
            text: "Mohon Maaf, Untuk sementara waktu fitur ini sedang dinonaktifkan. Silahkan coba beberapa saat, Terima Kasih.",
            icon: "warning",
            buttonsStyling: false,
            allowOutsideClick: true,
            allowEscapeKey: true,
            confirmButtonText: "Tutup",
            customClass: {
                confirmButton: "btn button-load font-weight-bold btn-danger"
            }
        });
    }
    </script>
    <?php } ?>
    <script>
    $('#example_1').whatsappChatSupport();
    </script>
    <script>
    $('.button-load').click(function() {
        KTApp.blockPage({
            overlayColor: '#FFA800',
            state: 'warning',
            size: 'lg',
            opacity: 0.2,
            message: 'Silahkan Tunggu...'
        });
    });
    </script>
</body>
<!--end::Body-->

</html>