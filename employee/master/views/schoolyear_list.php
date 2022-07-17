<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Tahun Ajaran</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Daftar Tahun Ajaran</a>
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
                            <h3 class="card-title font-weight-bolder text-dark">Informasi Tahun Ajaran</h3>
                        </div>
                        <!--end:Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <blockquote class="blockquote">
                                <p class="mb-0">
                                    Tahun ajaran adalah tingkatan masa siswa belajar.
                                    Arti lainnya dari tahun ajaran adalah masa belajar dalam tahun tertentu.
                                    Anda dapat menambahkan Tahun Ajaran sesuai masa pergantian tahun ajaran baru.
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
                    <div class="">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-body">
                                <!--begin: Search Form-->
                                <div class="mb-7">
                                    <div class="row align-items-center">
                                        <div class="col-lg-9 col-xl-8">
                                            <div class="row align-items-center">
                                                <div class="col-md-7 my-2 my-md-0">
                                                    <div class="input-icon">
                                                        <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query" />
                                                        <span>
                                                            <i class="flaticon2-search-1 text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <select class="form-control" id="kt_datatable_search_smt">
                                                            <option value="">Pilih Semester</option>
                                                            <option value="ganjil">Ganjil</option>
                                                            <option value="genap">Genap</option>
                                                            <option value="ganjil">Semua</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xl-4 text-right">
                                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_add_schoolyear">
                                                <i class="flaticon2-add"></i>Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Search Form-->
                                <!--begin: Datatable-->
                                <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_schoolyear">
                                    <thead>
                                        <tr>
                                            <th title="Nama Tahun Ajaran">Nama Tahun Ajaran</th>
                                            <th title="Field #2">Tahun Ajaran</th>
                                            <th title="Semester">Semester</th>
                                            <th title="Status">Status</th>
                                            <th title="Field #5">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($schoolyear)) {
                                            foreach ($schoolyear as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $value->nama_tahun_ajaran; ?></td>
                                                    <td><?php echo $value->tahun_awal . '/' . $value->tahun_akhir; ?></td>
                                                    <td><?php echo $value->semester ?></td>
                                                    <td>
                                                        <?php if ($value->status_tahun_ajaran == 1) { ?>
                                                            <a href="javascript:;" class="btn btn-icon btn-xs btn-success"><i class="flaticon2-check-mark"></i></a>
                                                        <?php } else { ?>
                                                            <a href="javascript:act_activate_schoolyear('<?php echo paramEncrypt($value->id_tahun_ajaran); ?>', '<?php echo strtoupper($value->nama_tahun_ajaran); ?>')" class="btn btn-icon btn-xs btn-default"><i class="flaticon2-delete"></i></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown dropdown-inline">
                                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">
                                                                <span class="svg-icon svg-icon-md">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000" />
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
                                                                        <a role="button" class="navi-link" data-toggle="modal" data-target="#modal_edit_schoolyear<?php echo $value->id_tahun_ajaran; ?>">
                                                                            <span class="navi-icon"><i class="la la-edit text-success"></i></span>
                                                                            <span class="navi-text">Edit</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="javascript:act_delete_schoolyear('<?php echo paramEncrypt($value->id_tahun_ajaran); ?>', '<?php echo strtoupper($value->nama_tahun_ajaran); ?>')" class="navi-link">
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
                    </div>
                    <!--end::Entry-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<div class="modal fade" id="modal_add_schoolyear" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Tahun Ajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('/employee/master/schoolyear/post_schoolyear'); ?>" id="kt_form_tahunajaran">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        <b>Pemberitahuan!,</b> Tahun Ajaran yang dibuat akan secara otomatis tersimpan 2 Tahun Ajaran yaitu Genap & Ganjil
                    </div>
                    <div class="row">
                        <div class="col-xl-1">
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>*</label>
                                <input type="text" name="label_thn_ajaran" class="form-control form-control-solid form-control-lg font-weight-bold" value="Tahun Ajaran" readonly placeholder="Enter full name">
                                <span class="form-text text-dark"><b>*OTOMATIS, </b>terisi oleh sistem</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Tahun Awal</label>
                                <div class="input-group input-group-solid">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                    <input type="text" name="tahun_awal" id="kt_datepicker_awal" readonly="" class="form-control form-control-solid form-control-lg" placeholder="Tahun Awal">
                                </div>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tahun Awal</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Tahun Akhir</label>
                                <div class="input-group input-group-solid">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                    <input type="text" name="tahun_akhir" id="kt_datepicker_akhir" readonly="" class="form-control form-control-solid form-control-lg" placeholder="Tahun Akhir">
                                </div>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tahun Akhir</span>

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
if (!empty($schoolyear)) {
    foreach ($schoolyear as $key => $value) {
        ?>
        <div class="modal fade" id="modal_edit_schoolyear<?php echo $value->id_tahun_ajaran; ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('/employee/master/schoolyear/update_schoolyear/' . paramEncrypt($value->id_tahun_ajaran)); ?>">
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-1">
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>*</label>
                                        <input type="text" name="label_thn_ajaran" class="form-control form-control-solid form-control-lg font-weight-bold" value="Tahun Ajaran" readonly placeholder="Enter full name">
                                        <span class="form-text text-dark"><b>*OTOMATIS, </b>terisi oleh sistem</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Tahun Awal</label>
                                        <div class="input-group input-group-solid">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                            <input type="text" name="tahun_awal" value="<?php echo $value->tahun_awal; ?>" id="kt_datepicker_awal_modal<?php echo $value->id_tahun_ajaran; ?>" readonly="" class="form-control form-control-solid form-control-lg" placeholder="Tahun Awal" required="">
                                        </div>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tahun Awal</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Tahun Akhir</label>
                                        <div class="input-group input-group-solid">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                            <input type="text" name="tahun_akhir" value="<?php echo $value->tahun_akhir; ?>" id="kt_datepicker_akhir_modal<?php echo $value->id_tahun_ajaran; ?>" readonly="" class="form-control form-control-solid form-control-lg" placeholder="Tahun Akhir" required="">
                                        </div>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tahun Akhir</span>

                                    </div>
                                </div>
                                <div class="col-xl-1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3">
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>*</label>
                                        <input type="text" name="label_smt" class="form-control form-control-solid form-control-lg font-weight-bold" value="Semester" readonly placeholder="Enter full name">
                                        <span class="form-text text-dark"><b>*OTOMATIS, </b>terisi oleh sistem</span>
                                    </div>

                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Ganjil/Genap</label>
                                        <select name="semester" id="semester" class="form-control form-control-solid form-control-lg " required="">
                                            <?php if ($value->semester == 'ganjil') { ?>
                                                <option value="ganjil" selected="">Ganjil</option>
                                            <?php } else { ?>
                                                <option value="genap" selected="">Genap</option>
                                            <?php } ?>
                                            <option value="ganjil">Ganjil</option>
                                            <option value="genap">Genap</option>
                                        </select>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Semester</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
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
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-schoolyear.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-schoolyear.js">
</script>
<?php
if (!empty($schoolyear)) {
    foreach ($schoolyear as $key => $value) {
        ?>
        <script>
            $("#kt_datepicker_awal_modal<?php echo $value->id_tahun_ajaran; ?>").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });

            $("#kt_datepicker_akhir_modal<?php echo $value->id_tahun_ajaran; ?>").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        </script>
        <?php
    }  //ngatur nomor urut
}
?>
<script>
    function act_delete_schoolyear(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Label " + name + "?",
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
                    url: "<?php echo site_url("/employee/master/schoolyear/delete_schoolyear") ?>",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Label '" + name + "' telah terhapus.", "success");
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
                Swal.fire("Dibatalkan!", "Label " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
<script>
    function act_activate_schoolyear(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin mengaktifkan Label " + name + "?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, aktifkan!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("/employee/master/schoolyear/activate_schoolyear") ?>",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Teraktifkan!", "Label '" + name + "' telah diaktifkan.", "success");
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
                Swal.fire("Dibatalkan!", "Label " + name + " batal diaktifkan.", "error");
            }
        });
    }
</script>