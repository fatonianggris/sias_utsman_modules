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
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/students/dist/assets/media/logos/favicon.ico" />
        <link href="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css"  />

        <style>
            .dataTables_scrollBody::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
                border-radius: 10px;
            }

            .dataTables_scrollBody::-webkit-scrollbar {
                width: 6px;
                background-color: #F5F5F5;
            }

            .dataTables_scrollBody::-webkit-scrollbar-thumb {
                background-color: #777;
                border-radius: 10px;
            }

            .table.table-separate th:last-child, .table.table-separate td:last-child {
                padding-right: 5px !important;
            }
            .table.table-separate th:first-child, .table.table-separate td:first-child{
                padding-left: 5px !important;
            }

            .dropdown-menu > li > a, .dropdown-menu > .dropdown-item {
                outline: none !important;
                display: inline-block;
                flex-grow: 1;
            }

            scroller::-webkit-scrollbar {
                display: none; 
            }

            .swal2-container .swal2-html-container {
                max-height: max-content;
                overflow: auto;
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
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/students/dist/assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-3">
                            <div class="text-center">
                                <h3 class="font-mobile display-4 text-warning font-weight-boldest">RIWAYAT RAPOR SISWA</h3>
                            </div>
                        </div>
                        <!--end::Login Header-->
                        <div class="row flex-center mb-5">
                            <div class="col-6 float-left">
                                <a href="<?php echo site_url('students/dashboard'); ?>" type="button" class="btn btn-danger button-load float-left font-weight-bold"><li class="fa fa-home "></li> Menu</a>
                            </div>
                            <div class="col-6 float-right">
                                <a onclick="window.history.back();" class="btn btn-light-warning button-load font-weight-bold float-right"><i class="fa fa-backward"></i>Kembali</a>           
                            </div>
                        </div>
                        <div class="login-signin ">
                            <div class="row flex-center ">
                                <!--begin::Stats Widget 6-->
                                <div class="card card-custom card-stretch bg-warning-o-50 mb-5">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex align-items-center py-0 mt-2">
                                        <div class="d-flex flex-column flex-grow-1 py-1 py-lg-5">
                                            <?php
                                            $user = $this->session->userdata('sias-students');
                                            $word = explode(" ", strip_tags($user[0]->nama_lengkap));
                                            $limit_word = implode(" ", array_splice($word, 0, 2));
                                            ?>
                                            <a class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary"><b class="text-danger">Hi, <?php echo strtoupper(strtolower($limit_word)); ?>!</b></a>
                                            <span class=" text-dark-75 font-size-md">
                                                Berikut riwayat Rapor Online atas nama <b>"<?php echo strtoupper(strtolower($user[0]->nama_lengkap)); ?>" (<?php echo strtoupper(strtolower($user[0]->nis)); ?>)</b> yang telah ditempuh.
                                            </span>
                                        </div>
                                        <img src="<?php echo base_url(); ?>assets/students/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                                    </div>
                                    <!--end::Body-->
                                </div>
                            </div>
                            <div class="row ">
                                <?php echo $this->session->flashdata('flash_message'); ?>
                                <!--begin::Entry-->
                                <!--begin::Card-->
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <div class="accordion accordion-toggle-arrow" id="accordionExample4">
                                            <div class="card">
                                                <div class="card-header  bg-warning-o-50 " id="headingOne4">
                                                    <div class="card-title text-dark-75" data-toggle="collapse" data-target="#collapseOne4">
                                                        <i class="flaticon2-search text-dark-75 "></i> Filter Pencarian
                                                    </div>
                                                </div>
                                                <div id="collapseOne4" class="collapse " data-parent="#accordionExample4">
                                                    <div class="card-body">
                                                        <!--begin: Search Form-->
                                                        <form class="mb-1">
                                                            <div class="row mb-5">    
                                                                <div class="col-md-3 my-2 col-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <select class="form-control datatable-input" data-col-index="2">
                                                                            <option value="">Pilih Status</option>     
                                                                            <option value="DIPROSES">Diproses</option>                                                                           
                                                                            <option value="DIUPLOAD">Diupload</option>                                                                               
                                                                            <option value="">Semua</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 my-2 col-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <select class="form-control datatable-input" data-col-index="4">
                                                                            <option value="">Pilih Level</option>      
                                                                            <option value="KB">KB</option>
                                                                            <option value="TK">TK</option>
                                                                            <option value="SD">SD</option>
                                                                            <option value="SMP">SMP</option>
                                                                            <option value="SMA">SMA</option>   
                                                                            <option value="">Semua</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 my-2 col-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <select class="form-control datatable-input" data-col-index="5">
                                                                            <option value="">Pilih Tingkat</option> 
                                                                            <?php
                                                                            if (!empty($grade)) {
                                                                                foreach ($grade as $key => $value_gra) {
                                                                                    ?>
                                                                                    <option value="<?php echo $value_gra->nama_tingkat; ?>"><?php echo strtoupper($value_gra->nama_tingkat); ?></option>                                     
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>       
                                                                            <option value="">Semua</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 my-2 col-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <select class="form-control datatable-input" data-col-index="6">
                                                                            <option value="">Pilih Kelas</option>      
                                                                            <?php
                                                                            if (!empty($class)) {
                                                                                foreach ($class as $key => $value_clas) {
                                                                                    ?>
                                                                                    <option value="<?php echo $value_clas->nama_kelas; ?>"><?php echo strtoupper($value_clas->nama_kelas); ?></option>                                     
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>       
                                                                            <option value="">Semua</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 my-2 col-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <select class="form-control datatable-input" data-col-index="8">
                                                                            <option value="">Pilih Semester</option>     
                                                                            <option value="GANJIL">Ganjil</option>                                                                           
                                                                            <option value="GENAP">Genap</option>                                                                               
                                                                            <option value="">Semua</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3  my-2 col-6">
                                                                    <div class="d-flex align-items-center">                                                   
                                                                        <select class="form-control datatable-input" data-col-index="7">
                                                                            <option value="">Pilih Tahun Ajaran</option>
                                                                            <?php
                                                                            if (!empty($schoolyear)) {
                                                                                foreach ($schoolyear as $key => $value_sch) {
                                                                                    ?>
                                                                                    <option value="<?php echo $value_sch->tahun_awal . '/' . $value_sch->tahun_akhir; ?>"><?php echo strtoupper($value_sch->tahun_awal . '/' . $value_sch->tahun_akhir); ?></option>                                     
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>       
                                                                            <option value="">SEMUA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row text-lg-left text-center">
                                                                <div class="col-lg-9 col-12 mt-lg-3">
                                                                    <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                                                        <span>
                                                                            <i class="la la-search"></i>
                                                                            <span>Cari</span>
                                                                        </span>
                                                                    </button>&#160;&#160;
                                                                    <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                                                        <span>
                                                                            <i class="la la-close"></i>
                                                                            <span>Reset</span>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                                <div class="col-lg-2 text-lg-right text-left col-6 mt-lg-3 mt-6">

                                                                </div>
                                                        </form>     

                                                    </div>
                                                    <!--begin: Datatable-->

                                                </div>
                                            </div>
                                        </div>                                         
                                    </div>
                                    <!--begin: Datatable-->
                                    <table class="table table-separate table-hover table-light-success table-checkable font-size-sm " id="kt_datatable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nama Siswa</th>
                                                <th>Status</th>
                                                <th>NIS</th>
                                                <th>Level</th>
                                                <th>Tingkat</th>
                                                <th>Kelas</th>
                                                <th>Tahun Ajaran</th>   
                                                <th>Semester</th>  
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($report)) {
                                                foreach ($report as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td class="font-weight-bolder text-primary">
                                                            <?php echo strtoupper(strtolower($value->nama_siswa)); ?>
                                                        </td>
                                                        <td class="font-weight-bolder">
                                                            <?php echo $value->status_rapor_siswa; ?>
                                                        </td>
                                                        <td class="font-weight-bolder">
                                                            <?php echo $value->nis; ?>
                                                        </td>
                                                        <td class="font-weight-bolder">
                                                            <?php echo $value->level_tingkat; ?>
                                                        </td>
                                                        <td class="font-weight-bolder">
                                                            <span class="label label-lg font-weight-bold label-light-default label-inline">
                                                                <?php echo $value->nama_tingkat; ?>
                                                            </span> 
                                                        </td>                                                       
                                                        <td class="font-weight-bolder">
                                                            <span class="label label-lg font-weight-bold label-light-default label-inline">
                                                                <?php echo strtoupper(strtolower($value->nama_kelas)); ?>
                                                            </span> 
                                                        </td>
                                                        <td class="font-weight-bolder"> 
                                                            <?php echo $value->tahun_awal; ?>/<?php echo $value->tahun_akhir; ?>
                                                        </td>
                                                        <td class="font-weight-bolder">
                                                            <?php echo strtoupper(strtolower($value->semester)); ?>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div class="dropdown dropdown-inline">
                                                                <a href="javascript:;" class="btn btn-xs  btn-clean btn-icon btn-outline-primary" data-toggle="dropdown">
                                                                    <i class="la la-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                    <ul class="nav nav-hover flex-column">

                                                                        <?php if ($value->file_rapor_siswa != "" || $value->file_rapor_siswa != NULL) { ?>
                                                                            <li class="nav-item">
                                                                                <a type="button" class="button-load nav-link" href="<?php echo site_url('students/academic/academic/detail_student_report/' . paramEncrypt($value->id_rapor_siswa)) ?>"><i class="nav-icon fas fa-eye text-warning"></i><span class="nav-text text-warning text-hover-primary font-weight-normal">Detail Rapor</span></a>
                                                                            </li>
                                                                        <?php } else { ?>
                                                                            <li class="nav-item">
                                                                                <a type="button" class="button-load nav-link" href="javascript:report_null('<?php echo strtoupper($value->nis); ?>', '<?php echo strtoupper($value->nama_siswa); ?>')" ><i class="nav-icon fas fa-eye text-danger"></i><span class="nav-text text-danger text-hover-primary font-weight-normal">Detail Rapor</span></a>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }  //ngatur nomor urut
                                            }
                                            ?>         
                                        </tbody>                                     
                                    </table>
                                    <!--end: Datatable-->
                                    <!--end: Datatable-->
                                </div>
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
                <div class="wcs_popup_header_description">Pilih salah satu <b>Admin SIAS</b> dibawah ini</div>
            </div>	
            <div class="wcs_popup_person_container">
                <?php if ($contact[0]->no_handphone != "" or $contact[0]->no_handphone != NULL) { ?>
                    <div class="wcs_popup_person" data-number="<?php echo "62" . substr($contact[0]->no_handphone, 1); ?>" data-default-msg="Assslamualaikum, permisi mau bertanya?">
                        <div class="wcs_popup_person_img"><img src="<?php echo base_url() . $page[0]->logo_website; ?>" alt=""></div>
                        <div class="wcs_popup_person_content">
                            <div class="wcs_popup_person_name">Admin SIAS</div>
                            <div class="wcs_popup_person_description">Petugas SIAS </div>
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
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/js/scripts.bundle.js"></script>

    <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/datatables/datatables.bundle.js"></script> 
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/datatables/dataTables.checkboxes.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/js/pages/crud/datatables/search-options/document-report.js"></script>
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
    <script src="<?php echo base_url(); ?>assets/students/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
    <script>
        $('#example_1').whatsappChatSupport();
    </script>
    <script>
        function report_null(nis, name) {
        Swal.fire({
        text: "Mohon Maaf, Data rapor dengan Siswa " + name + " (" + nis + ") belum diupload oleh Wali Kelas.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Oke!",
                customClass: {
                confirmButton: "btn font-weight-bold btn-danger"
                }
        })
        }
    </script>
</body>
<!--end::Body-->
</html>