<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Akademik Pegawai</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Detail Pegawai</a>
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
            <div class="row">

                <div class="col-lg-10 col-md-6 col-sm-12">
                    <div class="card card-custom mb-5">
                        <div class="card-body">
                            <div class="d-flex">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-0">
                                    <?php if ($employe[0]->foto_pegawai == NULL or $employe[0]->foto_pegawai == "") { ?>
                                        <div class="symbol symbol-50 symbol-lg-100 symbol-light-danger">
                                            <span class="font-size-h2 symbol-label font-weight-boldest"><?php echo strtoupper(substr($employe[0]->nama_lengkap, 0, 2)); ?></span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="symbol symbol-50 symbol-lg-100">
                                            <img alt="Pic" src="<?php echo base_url() . $employe[0]->foto_pegawai ?>">
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="flex-shrink-0 mr-7">

                                </div>
                                <!--end::Pic-->
                                <!--begin: Info-->
                                <div class="">
                                    <!--begin::Title-->
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <!--begin::User-->
                                        <div class="mr-2">
                                            <div class="d-flex align-items-center mr-2">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3"><?php echo strtoupper($employe[0]->nama_lengkap); ?></a>
                                                <!--end::Name-->
                                                <span class="label label-light-success label-inline font-weight-bolder mr-1"><?php echo strtoupper($employe[0]->nip); ?></span>

                                            </div>
                                            <!--begin::Contacts-->
                                            <div class="d-flex flex-wrap my-2">
                                                <a href="#" class="text-primary text-hover-primary font-weight-bold mr-lg-2 mr-3 mb-lg-0 mb-2">
                                                    <span class="svg-icon svg-icon-md svg-icon-primary mr-1">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <?php echo ($employe[0]->nik); ?>
                                                </a>
                                                <a href="#" class="text-success text-hover-primary font-weight-bold mr-lg-2 mr-5 mb-lg-0 mb-2">
                                                    <span class="svg-icon svg-icon-md svg-icon-success mr-1">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M21,5.5 L21,17.5 C21,18.3284271 20.3284271,19 19.5,19 L4.5,19 C3.67157288,19 3,18.3284271 3,17.5 L3,14.5 C3,13.6715729 3.67157288,13 4.5,13 L9,13 L9,9.5 C9,8.67157288 9.67157288,8 10.5,8 L15,8 L15,5.5 C15,4.67157288 15.6715729,4 16.5,4 L19.5,4 C20.3284271,4 21,4.67157288 21,5.5 Z" fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <?php
                                                    if ($employe[0]->level_tingkat == 1) {
                                                        echo 'KB';
                                                    } else if ($employe[0]->level_tingkat == 2) {
                                                        echo 'TK';
                                                    } else if ($employe[0]->level_tingkat == 3) {
                                                        echo 'SD';
                                                    } else if ($employe[0]->level_tingkat == 4) {
                                                        echo 'SMP';
                                                    }
                                                    ?>        
                                                </a>
                                                <a href="#" class="text-success text-hover-primary font-weight-bold mr-lg-2 mr-5 mb-lg-0 mb-2">
                                                    <span class="svg-icon svg-icon-md svg-icon-success mr-1">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <?php
                                                    echo $employe[0]->email;
                                                    ?>    
                                                </a>
                                                <a href="#" class="text-success text-hover-primary font-weight-bold mr-lg-2 mr-5 mb-lg-0 mb-2">
                                                    <span class="svg-icon svg-icon-md svg-icon-success mr-1">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <span class="py-1" ><?php echo ($employe[0]->hasil_nama_jabatan); ?></span>
                                                </a>
                                            </div>
                                            <!--end::Contacts-->
                                        </div>
                                        <!--begin::User-->
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Content-->
                                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                                        <!--begin::Description-->
                                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                            <?php echo ucwords(strtolower($employe[0]->alamat_lengkap)); ?>
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Info-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <div class="card card-custom mb-5">
                        <div class="card-body py-4 mt-4 mb-3 text-center">
                            <h7 class="card-label text-dark font-weight-bolder">DETAIL BIODATA</h7>
                            <div class="d-flex flex-lg-grow-1 justify-content-lg-center mt-5 text-center">                           
                                <button class="btn btn-xl btn-warning px-2 py-2 my-3 mx-2" data-toggle="modal" data-target="#modal_siswa">Lihat Detail Pegawai</button>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--begin::Card-->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-5">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">                                
                                <h3 class="card-label">Daftar Penilaian Pegawai</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="row align-items-center">

                                            <div class="col-md-5 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_schoolyear">
                                                        <option value="">Pilih Tahun Ajaran</option>                                                      
                                                        <?php
                                                        if (!empty($schoolyear)) {
                                                            foreach ($schoolyear as $key => $value_sch) {
                                                                ?>
                                                                <option value="<?php echo $value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' (' . $value_sch->semester . ')'; ?>"><?php echo strtoupper($value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' (' . $value_sch->semester . ')'); ?></option>                                     
                                                                <?php
                                                            }
                                                        }
                                                        ?>       
                                                        <option value="">SEMUA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_report_class">
                                <thead>
                                    <tr>
                                        <th title="Nama Penilaian">Nama Penilaian</th>  
                                        <th title="TA">TA</th>                                      
                                        <th title="Aksi">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($report)) {
                                        foreach ($report as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <b><?php echo strtoupper(strtolower($value->nama_kuisioner)); ?></b>
                                                </td>
                                                <td >
                                                    <?php echo $value->tahun_awal . '/' . $value->tahun_akhir . ' (' . strtoupper(strtolower($value->semester)) . ')'; ?>
                                                </td>

                                                <td>
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">
                                                            <span class="svg-icon svg-icon-md">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                                                </g>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                            <ul class="navi flex-column navi-hover py-2">
                                                                <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                                    Pilih Aksi:
                                                                </li>
                                                                <?php if ($value->status_penilaian_personal == 1 && $value->status_penilaian_sejawat == 1 && $value->status_penilaian_atasan == 1) { ?>
                                                                    <li class="navi-item">
                                                                        <a href="<?php echo site_url('employee/employe/report/detail_result_questionnaire/' . paramEncrypt($value->id_pegawai)) ?>" class="navi-link" >
                                                                            <span class="navi-icon"><i class="fa fa-eye text-success"></i></span>
                                                                            <span class="navi-text ">Lihat Penilaian</span>
                                                                        </a>
                                                                    </li>
                                                                <?php } else { ?>
                                                                    <li class="navi-item">
                                                                        <a  href="javascript:report_null('<?php echo strtoupper($value->nip); ?>', '<?php echo strtoupper($value->nama_lengkap); ?>')"  class="navi-link" >
                                                                            <span class="navi-icon"><i class="fa fa-eye text-danger"></i></span>
                                                                            <span class="navi-text ">Lihat Penilaian</span>
                                                                        </a>
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
                            </table><!--end: Datatable-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-5">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">                                
                                <h3 class="card-label">Daftar Absensi Pegawai</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Search Form-->                           
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="row align-items-center">
                                            <div class="col-md-5 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_schoolyear_abs">
                                                        <option value="">Pilih Tahun Ajaran</option>                                                      
                                                        <?php
                                                        if (!empty($schoolyear)) {
                                                            foreach ($schoolyear as $key => $value_sch) {
                                                                ?>
                                                                <option value="<?php echo $value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' (' . $value_sch->semester . ')'; ?>"><?php echo strtoupper($value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' (' . $value_sch->semester . ')'); ?></option>                                     
                                                                <?php
                                                            }
                                                        }
                                                        ?>       
                                                        <option value="">SEMUA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_presence_class">
                                <thead>
                                    <tr>
                                        <th title="Tingkat">Tanggal</th>   
                                        <th title="StatusMasuk">StatusMasuk</th>    
                                        <th title="Waktu Masuk">Waktu Masuk</th> 
                                        <th title="StatusPulang">StatusPulang</th>
                                        <th title="Waktu Pulang">Waktu Pulang</th>                                       
                                        <th title="TA">TA</th>      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($presence)) {
                                        foreach ($presence as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <b><?php echo $value->tgl_format; ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $value->status_absensi_masuk; ?>
                                                </td>      
                                                <td>
                                                    <?php if ($value->jam_masuk == NULL or $value->jam_masuk == "") { ?>
                                                        00:00
                                                    <?php } else { ?>
                                                        <?php echo $value->jam_masuk; ?>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->status_absensi_pulang; ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->jam_pulang == NULL or $value->jam_pulang == "") { ?>
                                                        00:00
                                                    <?php } else { ?>
                                                        <?php echo $value->jam_pulang; ?>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <b><?php echo $value->tahun_awal . '/' . $value->tahun_akhir . ' (' . strtoupper(strtolower($value->semester)) . ')'; ?></b>
                                                </td>
                                            </tr>                                                
                                            <?php
                                        }  //ngatur nomor urut
                                    }
                                    ?>          
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-student-detail-employe.js">
</script>
<script>
    function report_null(nis, name) {
        Swal.fire({
            text: "Mohon Maaf, Data Penilaian atas nama Pegawai " + name + " (" + nis + ") belum terpenuhi. Coba lagi beberapa saat.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Oke!",
            customClass: {
                confirmButton: "btn font-weight-bold btn-danger"
            }
        })
    }
</script>
<div class="modal fade" id="modal_siswa" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Biodata Pegawai "<?php echo strtoupper($employe[0]->nama_lengkap); ?>"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body ">
                <div class="row col-12">
                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                        <div class="font-size-h6 font-weight-bold text-danger mb-5">Personal Pegawai</div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">NIP:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder"> <?php echo ($employe[0]->nip); ?></span>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">NIK:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->nik); ?>  
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Email:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder"><?php echo ($employe[0]->email); ?></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Nama Lengkap Pegawai:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo strtoupper($employe[0]->nama_lengkap); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Nomor NPWP:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->npwp); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Tempat Lahir:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo strtoupper($employe[0]->tempat_lahir); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Tanggal Lahir:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->tanggal_lahir); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Jenis Kelamin:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php
                                    if ($employe[0]->jenis_kelamin == 1) {
                                        echo 'Laki-Laki';
                                    } else if ($employe[0]->jenis_kelamin == 2) {
                                        echo 'Perempuan';
                                    }
                                    ?>     
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Warga Negara:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php
                                    if ($employe[0]->warga_negara == 1) {
                                        echo 'WNI';
                                    } else if ($employe[0]->warga_negara == 2) {
                                        echo 'WNA';
                                    }
                                    ?>     
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Status Nikah:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php
                                    if ($employe[0]->status_nikah == 1) {
                                        echo 'Belum Menikah';
                                    } else if ($employe[0]->status_nikah == 2) {
                                        echo 'Menikah';
                                    } else if ($employe[0]->status_nikah == 3) {
                                        echo 'Cerai';
                                    }
                                    ?>     
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Jumlah Anak:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->jumlah_anak); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Agama:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php
                                    if ($employe[0]->agama == 1) {
                                        echo 'Islam';
                                    } else if ($employe[0]->agama == 2) {
                                        echo 'Kristen';
                                    } else if ($employe[0]->agama == 3) {
                                        echo 'Hindu';
                                    } else if ($employe[0]->agama == 4) {
                                        echo 'Budha';
                                    } else if ($employe[0]->agama == 5) {
                                        echo 'Lainnya';
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Tahun Ajaran:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->nama_tahun_ajaran); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Jam Pelajaran:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->jam_pelajaran); ?> Jam
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                        <div class="font-size-h6 font-weight-bold text-danger mb-5">Alamat Pegawai</div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Alamat KK Lengkap:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder"><?php echo ucwords(strtolower($employe[0]->alamat_lengkap)); ?></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Provinsi KK:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder"><?php echo ($employe[0]->nama_provinsi); ?></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Kabupaten/Kota KK:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->nama_kabupaten_kota); ?> - <?php echo strtoupper($employe[0]->nama_kabupaten_kota); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Kecamatan KK:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder"><?php echo ($employe[0]->nama_kecamatan); ?></span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Kelurahan/Desa KK:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->nama_kelurahan_desa); ?> - <?php echo strtoupper($employe[0]->nama_kelurahan_desa); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">RT KK:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->rt); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">RW KK:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->rw); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Kodepos KK:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->kodepos); ?>
                                </span>
                            </div>
                        </div>
                        <div class="font-size-h6 font-weight-bold text-danger mb-5">Data Periodik Pegawai</div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Spesialisasi Lulusan:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ucfirst($employe[0]->spesialisasi); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Program Keahlian:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ucfirst($employe[0]->program_keahlian); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Nomor HP:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    0<?php echo ($employe[0]->nomor_hp); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Jenis Pegawai:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php
                                    if ($employe[0]->jenis_pegawai == 1) {
                                        echo 'Tetap';
                                    } else if ($employe[0]->jenis_pegawai == 2) {
                                        echo 'Tidak Tetap';
                                    } else if ($employe[0]->jenis_pegawai == 3) {
                                        echo 'Honorer';
                                    }
                                    ?>     
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Tanggal Masuk:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->tanggal_masuk); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Golongan:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">
                                    <?php echo ($employe[0]->golongan); ?>
                                </span>
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

