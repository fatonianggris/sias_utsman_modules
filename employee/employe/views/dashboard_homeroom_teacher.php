<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Wali Kelas</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Dashboard Wali Kelas</a>
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
            <!--begin::Notice-->
            <?php echo $this->session->flashdata('flash_message'); ?>
            <!--end::Notice-->
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body pt-7">                          
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                    <?php if ($class[0]->foto_pegawai == NULL or $class[0]->foto_pegawai == "") { ?>
                                        <div  class="symbol-label font-weight-boldest"><?php echo strtoupper(substr($class[0]->nama_lengkap, 0, 2)); ?></div>
                                    <?php } else { ?>
                                        <div class="symbol-label" style="background-image:url('<?php echo base_url() . $class[0]->foto_pegawai; ?>')"></div>
                                    <?php } ?>

                                </div>
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                        <?php if ($class[0]->nama_lengkap != NULL or $class[0]->nama_lengkap != "") { ?>
                                            <?php echo strtoupper(strtolower($class[0]->nama_lengkap)); ?>
                                        <?php } else { ?>
                                            <b class="text-danger">BELUM ADA</b>
                                        <?php } ?>
                                    </a>
                                    <div class="text-muted">Wali Kelas "<?php echo strtoupper(strtolower($class[0]->nama_kelas)); ?>"</div>
                                    <div class="mt-2">
                                        <a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">
                                            <?php
                                            if ($class[0]->level_tingkat == 1) {
                                                echo 'KB';
                                            } else if ($class[0]->level_tingkat == 2) {
                                                echo 'TK';
                                            } else if ($class[0]->level_tingkat == 3) {
                                                echo 'SD';
                                            } else if ($class[0]->level_tingkat == 4) {
                                                echo 'SMP';
                                            }
                                            ?>   
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1"><?php echo strtoupper(strtolower($class[0]->nama_tingkat)); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class=" col-xl-4">
                    <div class="row">
                        <div class="col-xl-6">
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
                                    <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">
                                        <?php echo $total[0]->laki_laki; ?>
                                    </div>
                                    <a href="#" class="text-inverse-success font-weight-bold font-size-lg mt-1">Laki-Laki</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom bg-primary gutter-b" style="height: 150px">
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
                                    <div class="text-white font-weight-bolder font-size-h2 mt-3">
                                        <?php echo $total[0]->perempuan; ?>
                                    </div>
                                    <a href="#" class="text-white text-hover-primary font-weight-bold font-size-lg mt-1">Perempuan</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                    </div>

                </div>
                <div class=" col-xl-4">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/patterns/taieri.svg)">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center">
                            <div>
                                <h3 class="text-white font-weight-bolder line-height-lg mt-4">TOTAL SISWA
                                </h3>
                                <h1 class="text-white display-2 font-weight-bolder">
                                    <?php echo $total[0]->total_siswa; ?>
                                </h1>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 13--> 
                </div>
                <div class="col-xl-12">
                    <!--begin::Entry-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-11 col-xl-10">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query" />
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_gender">
                                                        <option value="">Pilih JK</option>
                                                        <option value="1">Laki-laki</option>
                                                        <option value="2">Perempuan</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_status_student">
                                                        <option value="">Status Siswa</option>
                                                        <option value="0">NonAktif</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="2">Lulus</option>
                                                        <option value="3">Keluar</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-xl-2 mt-5 mt-lg-0 text-right">
                                        <div class="btn-group mr-5">
                                            <button class="btn btn-primary font-weight-bold btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <form class="form" id="frm-excel" action="<?php echo site_url('ppdb/report/export_data_csv'); ?>" method="POST">  
                                                    <input type="text" id="id_check_excel" class="form-control" value="" name="data_check" style="display:none">                         
                                                    <button class="dropdown-item text-primary" role="button" type="submit"><i class="flaticon2-file-1 text-primary"></i> Export csv</button>
                                                </form>
                                                <a href="#" data-toggle="modal" data-target="#modal_add_student" class="dropdown-item text-success" >
                                                    <i class="flaticon2-add text-success"></i> Tambah
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--end: Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_student">
                                <thead>
                                    <tr>
                                        <th title="#">#</th>
                                        <th title="Nama Siswa">Nama Siswa</th>
                                        <th title="NISN">NISN</th>                                          
                                        <th title="JK">JK</th>
                                        <th title="Level">Level</th>
                                        <th title="Tingkat">Tingkat</th>
                                        <th title="Jalur">Jalur</th> 
                                        <th title="Kelas">Kelas</th>
                                        <th title="Status">Status</th>
                                        <th title="TA">TA</th>
                                        <th title="Aksi">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($student)) {
                                        foreach ($student as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td><?php echo $value->id_siswa; ?></td>
                                                <td>
                                                    <?php if ($value->foto_siswa_thumb != NULL) { ?>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                                                <img class="" src="<?php echo base_url() . $value->foto_siswa_thumb; ?>" alt="photo">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                                <a href="#" class="text-muted font-weight-bold text-hover-primary"><?php echo $value->email; ?></a>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr($value->nama_lengkap, 0, 1); ?></span>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                                <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->email; ?></a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $value->nisn; ?></td>
                                                <td>
                                                    <?php echo $value->jenis_kelamin; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->level_tingkat; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->nama_tingkat; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->jalur; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->nama_kelas; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->status_siswa; ?>
                                                </td>
                                                <td>
                                                    <b><?php echo $value->tahun_ajaran; ?> (<?php echo strtoupper(strtolower($value->semester)); ?>)</b>
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
                                                                <li class="navi-item">
                                                                    <a href="<?php echo site_url('/employee/student/student/detail_student/' . paramEncrypt($value->id_siswa)); ?>" class="navi-link" >
                                                                        <span class="navi-icon"><i class="fa fa-eye text-success"></i></span>
                                                                        <span class="navi-text">Lihat</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="javascript:act_release_student('<?php echo paramEncrypt($value->id_siswa); ?>','<?php echo paramEncrypt($class[0]->id_kelas); ?>',  '<?php echo strtoupper($value->nama_lengkap); ?>', '<?php echo $value->nis; ?>')"  class="navi-link">
                                                                        <span class="navi-icon"><i class="fas fa-door-open text-danger"></i></span>
                                                                        <span class="navi-text text-danger font-weight-bold">Keluarkan</span>
                                                                    </a>
                                                                </li>
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
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-student-dashboard-hometeacher.js">
</script>

<div class="modal fade" id="modal_add_student" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Siswa Kelas "<?php echo strtoupper(strtolower($class[0]->nama_kelas)); ?>"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('employee/employe/homeroomteacher/add_student_class/' . paramEncrypt($class[0]->id_kelas)); ?>"  id="kt_form_tingkat">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-1">
                        </div>
                        <div class="col-xl-10">
                            <div class="form-group">
                                <label>Pilih Siswa</label>
                                <select name="id_siswa[]" id="kt_select2_3" class="form-control form-control-lg select2" multiple="multiple">
                                    <?php
                                    if (!empty($student_grade)) {
                                        foreach ($student_grade as $key => $value) {
                                            ?> 
                                            <option value="<?php echo $value->id_siswa; ?>"><?php echo ucwords(strtolower($value->nama_lengkap)); ?> (<?php echo ucwords(strtolower($value->nisn)); ?>)</option>
                                            <?php
                                        }  //ngatur nomor urut
                                    }
                                    ?>            
                                </select> 
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Siswa yang akan diinputkan, boleh lebih dari satu</span>               
                            </div>
                        </div>
                        <div class="col-xl-1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success font-weight-bold mr-2">Simpan</button>
                    <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</div>
<script>
    function act_release_student(id_siswa, id_kelas, name, nis) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin Mengeluarkan Siswa " + name + " (" + nis + ")?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, keluarkan!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("employee/employe/homeroomteacher/release_student_class") ?>",
                    data: {id_siswa: id_siswa, id_kelas: id_kelas, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Dikeluarkan!", "Siswa '" + name + "' (" + nis + ") telah dikeluarkan.", "success");
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
                Swal.fire("Dibatalkan!", "Siswa " + name + "' (" + nis + ")  batal dikeluarkan.", "error");
            }
        });
    }
</script>