<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Tingkatan Siswa</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Daftar Tingkatan Siswa</a>
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
            <div class="row">
                <div class="col-xl-4 mb-7">
                    <!--begin::List Widget 16-->
                    <div class="card card-custom">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title font-weight-bolder text-dark">Informasi Tingkat/Jenjang</h3>

                        </div>
                        <!--end:Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <blockquote class="blockquote">
                                <p class="mb-0">
                                    Jenjang pendidikan adalah tahapan pendidikan yang ditetapkan berdasarkan tingkat perkembangan peserta didik, tujuan yang akan dicapai, dan kemampuan yang dikembangkan.
                                    Anda dapat menambahkan Tingkat/Jenjang Pendidikan sesuai kurikulum sekolah anda.
                                </p>
                                <footer class="blockquote-footer">Admin                                    
                                </footer>
                            </blockquote>
                            <div class="separator separator-dashed my-5"></div>
                            <h5 class="card-title font-weight-bold text-dark">Panduan</h5>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 13-->
                </div>
                <div class="col-xl-8">
                    <!--begin::Notice-->
                    <?php echo $this->session->flashdata('flash_message'); ?>
                    <!--end::Notice-->
                    <!--begin::Entry-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query" />
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_grade">
                                                        <option value="">Pilih Level</option>
                                                        <option value="1">KB</option>
                                                        <option value="2">TK</option>
                                                        <option value="3">SD</option>
                                                        <option value="4">SMP</option>
                                                        <option value="5">SMA</option>
                                                        <option value="6">UMUM</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-4 text-right">
                                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_add_grade" >
                                            <i class="flaticon2-add"></i>Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--end: Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_grade">
                                <thead>
                                    <tr>
                                        <th title="Nama Tingkat">Nama Tingkat</th>
                                        <th title="Level">Level</th>                                          
                                        <th title="Tanggal Buat">Tanggal</th>
                                        <th title="Field #5">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($grade)) {
                                        foreach ($grade as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td><?php echo strtoupper($value->nama_tingkat); ?></td>
                                                <td><?php echo $value->level_tingkat; ?></td>
                                                <td>
                                                    <?php echo $value->inserted_at; ?>
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
                                                                <li  class="navi-item">
                                                                    <a role="button" class="navi-link" data-toggle="modal" data-target="#modal_edit_grade<?php echo $value->id_tingkat; ?>">
                                                                        <span class="navi-icon"><i class="la la-edit text-success"></i></span>
                                                                        <span class="navi-text">Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="javascript:act_delete_grade('<?php echo paramEncrypt($value->id_tingkat); ?>', '<?php echo strtoupper($value->nama_tingkat); ?>')"  class="navi-link">
                                                                        <span class="navi-icon"><i class="la la-close text-danger"></i></span>
                                                                        <span class="navi-text">Hapus</span>
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
                            <!--end: Datatable-->
                        </div>
                    </div>
                    <!--end::Card-->

                    <!--end::Entry-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<div class="modal fade" id="modal_add_grade" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Tingkat/Jenjang Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('/employee/master/grade/post_grade'); ?>"  id="kt_form_tingkat">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-1">
                        </div>
                        <div class="col-xl-10">
                            <div class="form-group">
                                <label>Nama Jenjang/Tingkat</label>
                                <input type="text" name="nama_tingkat" class="form-control form-control-solid form-control-lg" placeholder="Isikan Nama Jenjang/Tingkat">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Contoh: KELAS I, KELAS XI, TK KECIL dst</span>
                            </div>
                        </div>
                        <div class="col-xl-1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-1">
                        </div>                        
                        <div class="col-xl-10">
                            <div class="form-group">
                                <label>Level Jenjang</label>
                                <select name="level_tingkat" class="form-control form-control-solid form-control-lg">
                                    <option value="">Pilih Jenjang</option>
                                    <option value="1">Kelompok Bermain (KB)</option>
                                    <option value="2">Taman Kanak-kanak (TK)</option>
                                    <option value="3">Sekolah Dasar (SD)</option>
                                    <option value="4">Sekolah Menengah Pertama (SMP)</option>
                                    <option value="5">Sekolah Menengah Atas (SMA)</option>
                                    <option value="6">Umum</option>
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Jenjang/Tingkat</span>
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
</div>
<?php
if (!empty($grade)) {
    foreach ($grade as $key => $value) {
        ?> 
        <div class="modal fade" id="modal_edit_grade<?php echo $value->id_tingkat; ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Tingkat/Jenjang Pendidikan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('/employee/master/grade/update_grade/' . paramEncrypt($value->id_tingkat)); ?>" >
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-1">
                                </div>
                                <div class="col-xl-10">
                                    <div class="form-group">
                                        <label>Nama Jenjang/Tingkat</label>
                                        <input type="text" name="nama_tingkat" value="<?php echo $value->nama_tingkat; ?>" class="form-control form-control-solid form-control-lg" placeholder="Isikan Nama Jenjang/Tingkat" required="">
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Contoh: SD KELAS 1, SMP KELAS III, dst</span>
                                    </div>
                                </div>
                                <div class="col-xl-1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-1">
                                </div>                        
                                <div class="col-xl-10">
                                    <div class="form-group">
                                        <label>Level Jenjang</label>
                                        <select name="level_tingkat" class="form-control form-control-solid form-control-lg" required="">
                                            <?php if ($value->level_tingkat == 1) { ?>
                                                <option value="1" selected="">Kelompok Bermain (KB)</option>
                                            <?php } else if ($value->level_tingkat == 2) { ?>
                                                <option value="2" selected="">Taman Kanak-kanak (TK)</option>
                                            <?php } else if ($value->level_tingkat == 3) { ?>
                                                <option value="3" selected="">Sekolah Dasar (SD)</option>
                                            <?php } else if ($value->level_tingkat == 4) { ?>
                                                <option value="4" selected="">Sekolah Menengah Pertama (SMP)</option>
                                            <?php } else if ($value->level_tingkat == 5) { ?>
                                                <option value="5" selected="">Sekolah Menengah Atas (SMA)</option>
                                            <?php } else if ($value->level_tingkat == 5) { ?>
                                                <option value="6" selected="">UMUM</option>
                                            <?php } ?>
                                            <option value="1">Kelompok Bermain (KB)</option>
                                            <option value="2">Taman Kanak-kanak (TK)</option>
                                            <option value="3">Sekolah Dasar (SD)</option>
                                            <option value="4">Sekolah Menengah Pertama (SMP)</option>
                                            <option value="5">Sekolah Menengah Atas (SMA)</option>
                                            <option value="6">Umum</option>
                                        </select>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Jenjang/Tingkat</span>
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
        </div>
        <?php
    }  //ngatur nomor urut
}
?>          
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-grade.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-grade.js">
</script>

<script>
    function act_delete_grade(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Tingkat " + name + "?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("/employee/master/grade/delete_grade") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Tingkat '" + name + "' telah terhapus.", "success");
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
                Swal.fire("Dibatalkan!", "Tingkat " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
