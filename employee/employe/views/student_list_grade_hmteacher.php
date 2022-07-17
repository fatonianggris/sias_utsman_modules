<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Kenaikan Siswa</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Daftar Kenaikan Siswa</a>
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

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
             <?php echo $this->session->flashdata('flash_message'); ?>
            <!--end::Notice-->
            <div class="row">
                <div class="col-xl-6">
                    <!--begin::Entry-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <div class="card-title">
                                <h3 class="card-label">Kelas "<?php echo strtoupper($class[0]->nama_kelas); ?>"
                                    <span class="d-block text-muted pt-2 font-size-sm">Berikut merupakan daftar Siswa kelas "<?php echo strtoupper($class[0]->nama_kelas); ?>"</span></h3>
                            </div>
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-10">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query_class" />
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_genderclass">
                                                        <option value="">Pilih JK</option>
                                                        <option value="1">Laki-laki</option>
                                                        <option value="2">Perempuan</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-2 mt-5 mt-lg-0">
                                        <div class="btn-group">
                                            <button class="btn btn-primary font-weight-bold btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
<!--                                            <div class="dropdown-menu">
                                                <form class="form" id="frm-excel" action="<?php echo site_url('ppdb/report/export_data_csv'); ?>" method="POST">  
                                                    <input type="text" id="id_check_excel" class="form-control" value="" name="data_check" style="display:none">                         
                                                        <button class="dropdown-item text-dark font-weight-normal" role="button" type="submit"><i class="flaticon2-line-chart text-success"></i> Naik Kelas</button>
                                                </form>
                                            </div>-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Search Form-->

                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_student_class">
                                <thead>
                                    <tr>
                                        <th title="#">#</th>
                                        <th title="Nama Siswa">Nama Siswa</th>                                 
                                        <th title="JK">JK</th>  
                                        <th title="Status">Status</th>                                      
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
                                                                <a href="#" class="text-muted font-weight-bold text-hover-primary"><?php echo $value->nisn; ?></a>
                                                                <?php if ($value->status_siswa == 0) { ?>
                                                                    <span class="label font-weight-bold label-md label-default label-inline">NONAKTIF</span>
                                                                <?php } else if ($value->status_siswa == 1) { ?>
                                                                    <span class="label font-weight-bold label-md label-success label-inline">AKTIF</span>
                                                                <?php } else if ($value->status_siswa == 2) { ?>
                                                                    <span class="label font-weight-bold label-md label-warning label-inline">LULUS</span>
                                                                <?php } else if ($value->status_siswa == 3) { ?>
                                                                    <span class="label font-weight-bold label-md label-danger label-inline">KELUAR</span>
                                                                <?php } ?>
                                                                <?php if ($value->nama_kelas != NULL || $value->nama_kelas != "") { ?>
                                                                    <span class="label font-weight-bold label-md label-default label-inline"><?php echo strtoupper(strtolower($value->nama_kelas)); ?></span>
                                                                <?php } else { ?>
                                                                    <span class="label font-weight-bold label-md label-danger label-inline">KOSONG</span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr($value->nama_lengkap, 0, 1); ?></span>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                                <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->nisn; ?></a>
                                                                <?php if ($value->status_siswa == 0) { ?>
                                                                    <span class="label font-weight-bold label-md label-default label-inline">NONAKTIF</span>
                                                                <?php } else if ($value->status_siswa == 1) { ?>
                                                                    <span class="label font-weight-bold label-md label-success label-inline">AKTIF</span>
                                                                <?php } else if ($value->status_siswa == 2) { ?>
                                                                    <span class="label font-weight-bold label-md label-warning label-inline">LULUS</span>
                                                                <?php } else if ($value->status_siswa == 3) { ?>
                                                                    <span class="label font-weight-bold label-md label-danger label-inline">KELUAR</span>
                                                                <?php } ?>
                                                                <?php if ($value->nama_kelas != NULL || $value->nama_kelas != "") { ?>
                                                                    <span class="label font-weight-bold label-md label-default label-inline"><?php echo strtoupper(strtolower($value->nama_kelas)); ?></span>
                                                                <?php } else { ?>
                                                                    <span class="label font-weight-bold label-md label-danger label-inline">KOSONG</span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->jenis_kelamin; ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->status_transisi; ?>
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
                                                                    <a href="javascript:pass_grade_student('<?php echo paramEncrypt($value->id_siswa); ?>','<?php echo ($value->nisn); ?>','<?php echo ($value->nama_lengkap); ?>')" class="navi-link" >
                                                                        <span class="navi-icon"><i class="flaticon2-line-chart text-success"></i></span>
                                                                        <span class="navi-textd">Naik Kelas</span>
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
                </div>
                <!--end::Card-->
                <div class="col-xl-6">
                    <!--begin::Entry-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <div class="card-title">
                                <h3 class="card-label">Kelas Transisi
                                    <span class="d-block text-muted pt-2 font-size-sm">Berikut merupakan daftar Siswa kelas transisi setelah kenaikan kelas</span></h3>
                            </div>
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-10">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query_class_transition" />
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_gendertrans">
                                                        <option value="">Pilih JK</option>
                                                        <option value="1">Laki-laki</option>
                                                        <option value="2">Perempuan</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 mt-5 mt-lg-0">
                                        <div class="btn-group ">
                                            <button class="btn btn-primary font-weight-bold btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
<!--                                            <div class="dropdown-menu ">
                                                <a href="<?php echo site_url('employee/master/student/add_student'); ?>" class="dropdown-item text-dark font-weight-normal" >
                                                    <i class="flaticon-home-2 text-warning"></i> Pilih Kelas
                                                </a>
                                            </div>-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--end: Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_student_class_transition">
                                <thead>
                                    <tr>
                                        <th title="#">#</th>
                                        <th title="Nama Siswa">Nama Siswa</th>                                                                                                     
                                        <th title="JK">JK</th>
                                        <th title="Status">Status</th>    
                                        <th title="Aksi">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($student_transition)) {
                                        foreach ($student_transition as $key => $value) {
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
                                                                <a href="#" class="text-muted font-weight-bold text-hover-primary"><?php echo $value->nisn; ?></a>
                                                                <?php if ($value->status_siswa == 0) { ?>
                                                                    <span class="label font-weight-bold label-md label-default label-inline">NONAKTIF</span>
                                                                <?php } else if ($value->status_siswa == 1) { ?>
                                                                    <span class="label font-weight-bold label-md label-success label-inline">AKTIF</span>
                                                                <?php } else if ($value->status_siswa == 2) { ?>
                                                                    <span class="label font-weight-bold label-md label-warning label-inline">LULUS</span>
                                                                <?php } else if ($value->status_siswa == 3) { ?>
                                                                    <span class="label font-weight-bold label-md label-danger label-inline">KELUAR</span>
                                                                <?php } ?>
                                                                <?php if ($value->nama_kelas != NULL || $value->nama_kelas != "") { ?>
                                                                    <span class="label font-weight-bold label-md label-default label-inline"><?php echo strtoupper(strtolower($value->nama_kelas)); ?></span>
                                                                <?php } else { ?>
                                                                    <span class="label font-weight-bold label-md label-danger label-inline">KOSONG</span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr($value->nama_lengkap, 0, 1); ?></span>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                                <a href="#" class="text-muted font-weight-bold text-hover-primary"><?php echo $value->nisn; ?></a>
                                                                <?php if ($value->status_siswa == 0) { ?>
                                                                    <span class="label font-weight-bold label-md label-default label-inline">NONAKTIF</span>
                                                                <?php } else if ($value->status_siswa == 1) { ?>
                                                                    <span class="label font-weight-bold label-md label-success label-inline">AKTIF</span>
                                                                <?php } else if ($value->status_siswa == 2) { ?>
                                                                    <span class="label font-weight-bold label-md label-warning label-inline">LULUS</span>
                                                                <?php } else if ($value->status_siswa == 3) { ?>
                                                                    <span class="label font-weight-bold label-md label-danger label-inline">KELUAR</span>
                                                                <?php } ?>
                                                                <?php if ($value->nama_kelas != NULL || $value->nama_kelas != "") { ?>
                                                                    <span class="label font-weight-bold label-md label-default label-inline"><?php echo strtoupper(strtolower($value->nama_kelas)); ?></span>
                                                                <?php } else { ?>
                                                                    <span class="label font-weight-bold label-md label-danger label-inline">KOSONG</span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->jenis_kelamin; ?>
                                                </td>

                                                <td>
                                                    <?php echo $value->status_transisi; ?> 
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
                                                                    <a href="#" data-toggle="modal" data-target="#modal_chose_class" class="navi-link" >
                                                                        <span class="navi-icon"><i class="fa fa-home text-success"></i></span>
                                                                        <span class="navi-text">Pilih Kelas</span>
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
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

    <!--end::Entry-->
</div>
<?php
if (!empty($student_transition)) {
    foreach ($student_transition as $key => $value) {
        ?> 
        <div class="modal fade" id="modal_chose_class" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Siswa "<?php echo strtoupper(strtolower($value->nama_lengkap)); ?>" Untuk Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('employee/employe/homeroomteacher/choose_student_class/' . paramEncrypt($value->id_siswa)); ?>"  id="kt_form_tingkat">
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                        <input type="hidden" class="hidden" name="id_kelas_homeroom" value="<?php echo paramEncrypt($class[0]->id_kelas); ?>"/>
                        <input type="hidden" class="hidden" name="id_siswa" value="<?php echo paramEncrypt($value->id_siswa); ?>"/>
                        <input type="hidden" class="hidden" name="nama_siswa" value="<?php echo strtoupper(strtolower($value->nama_lengkap)); ?>"/>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-1">
                                </div>
                                <div class="col-xl-10">
                                    <div class="form-group">
                                        <label>Nama Kelas</label>
                                        <select name="id_kelas" id="pilih_kelas" class="form-control form-control-lg" onClick="choose_class(<?php echo $value->level_tingkat; ?>);" required="">
                                            <option value="">Pilih Kelas</option>
                                        </select> 
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kelas yang ingin dipindahkan</span>               
                                    </div>
                                </div>
                                <div class="col-xl-1">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success font-weight-bold mr-2">Pindahkan</button>
                            <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }  //ngatur nomor urut
}
?>        
<input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-student-grade-hometeacher.js">
</script>
<script>
    var loadedOptions = false;//global variable
    function choose_class(level_tingkat)
    {
        if (!loadedOptions) {
            var url = "<?php echo site_url('employee/employe/homeroomteacher/add_ajax_class/'); ?>" + level_tingkat;
            $('#pilih_kelas').load(url, function () {
                loadedOptions = true; //set it to true once request is done
            });
        }
        return false;
    }
</script>
<script>
    function pass_grade_student(id_siswa, nis, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin Menaikan Kelas Siswa " + name + " (" + nis + ")?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#1BC5BD",
            confirmButtonText: "Ya, naikan!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("employee/employe/homeroomteacher/pass_grade_student") ?>",
                    data: {id_siswa: id_siswa, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Berhasil!", "Siswa '" + name + "' (" + nis + ") telah naik kelas.", "success");
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

