<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Jabatan</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Daftar Jabatan</a>
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
                            <h3 class="card-title font-weight-bolder text-dark">Informasi Jabatan Pegawai</h3>

                        </div>
                        <!--end:Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <blockquote class="blockquote">
                                <p class="mb-0">
                                    Jabatan adalah kedudukan yang menunjukkan tugas, tanggung jawab, wewenang, dan hak seorang pegawai dalam rangka suatu satuan organisasi.
                                    Anda dapat menambahkan Jabatan Pegawai sesuai organisasi sekolah anda.
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
                                    <div class="col-lg-10 col-xl-9">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query" />
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">

                                                    <select class="form-control" id="kt_datatable_search_position">
                                                        <option value="">Pilih Jabatan</option>
                                                        <option value="0">Admin</option>
                                                        <option value="1">Internal</option>
                                                        <option value="2">Fungsional</option>
                                                        <option value="3">Eksternal</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>        
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">

                                                    <select class="form-control" id="kt_datatable_search_grade">
                                                        <option value="">Pilih Tingkat</option>
                                                        <option value="1">KB/TK</option>                                                       
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
                                    <div class="col-lg-2 col-xl-3 text-right">
                                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_add_position" >
                                            <i class="flaticon2-add"></i>Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Search Form-->

                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_position">
                                <thead>
                                    <tr>
                                        <th title="Nama Kelas">Nama Jabatan</th>
                                        <th title="Level">Level</th>   
                                        <th title="Tingkat">Tingkat</th>  
                                        <th title="Tanggal">Tanggal</th>
                                        <th title="Field #5">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($position)) {
                                        foreach ($position as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td><?php echo strtoupper($value->hasil_nama_jabatan); ?></td>
                                                <td><?php echo $value->level_jabatan; ?></td>
                                                <td><?php echo $value->level_tingkat; ?></td>
                                                <td><?php echo $value->inserted_at; ?></td>
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
                                                                    <a role="button" class="navi-link" data-toggle="modal" data-target="#modal_edit_position<?php echo $value->id_jabatan; ?>">
                                                                        <span class="navi-icon"><i class="la la-edit text-success"></i></span>
                                                                        <span class="navi-text">Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="javascript:act_delete_position('<?php echo paramEncrypt($value->id_jabatan); ?>', '<?php echo strtoupper($value->nama_jabatan); ?>')"  class="navi-link">
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
<div class="modal fade" id="modal_add_position" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Jabatan Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('/employee/master/position/post_position'); ?>" id="kt_form_jabatan">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="alert alert-custom alert-secondary alert-shadow mb-2" role="alert">
                        <div class="alert-text">
                            <span class="form-text text-dark-75 mb-1">*untuk jabatan Kepala Sekolah, Wakil Kepala, Tata Usaha, Bendahara dst. Termasuk ke dalam <b class="text-danger">"Jabatan Internal"</b>.</span>
                            <span class="form-text text-dark-75 mb-1">**untuk jabatan BK, Guru dst. Termasuk ke dalam <b class="text-danger">"Jabatan Fungsional"</b>.</span>
                            <span class="form-text text-dark-75 mb-1">***untuk jabatan Komite dst. Termasuk ke dalam <b class="text-danger">"Jabatan Eksternal"</b>.</span>
                        </div>
                    </div>
                    <div class="row mt-5">

                        <div class="col-xl-8">
                            <div class="form-group">
                                <label>Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control form-control-solid form-control-lg " placeholder="Isikan Nama Jabatan">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Contoh: WakaSek, Kepala Sekolah, Tata Usaha, dst</span>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Level Jenjang</label>
                                <select name="level_tingkat" onChange="getPosition(this);"  class="form-control form-control-solid form-control-lg">
                                    <option value="">Pilih Jenjang</option>
                                    <option value="1">KB/TK</option>                                    
                                    <option value="3">SD </option>
                                    <option value="4">SMP </option>
                                    <option value="5">SMA</option>  
                                    <option value="6">UMUM</option>  
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Jenjang/Tingkat</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-1">
                        </div>                        
                        <div class="col-xl-10">
                            <div class="form-group">
                                <label>Hasil Nama Jabatan</label>
                                <input type="text" name="hasil_nama_jabatan" id="hasil_nama_jabatan" readonly="" class="form-control form-control-solid form-control-lg " placeholder="Hasil Nama Jabatan">
                                <span class="form-text text-dark"><b class="text-danger">*OTOMATIS, </b>isi Nama Jabatan kemudian pilih Tingkat</span>
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
                                <select name="level_jabatan" class="form-control form-control-solid form-control-lg">
                                    <option value="">Pilih Jabatan</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Jabatan Internal*</option>                                   
                                    <option value="2">Jabatan Fungsional**</option>
                                    <option value="3">Jabatan Eksternal***</option>
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Level Jabatan</span>
                            </div>
                        </div>
                        <div class="col-xl-1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success font-weight-bold mr-2" >Simpan</button>
                    <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (!empty($position)) {
    foreach ($position as $key => $value) {
        ?> 
        <div class="modal fade" id="modal_edit_position<?php echo $value->id_jabatan; ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('/employee/master/position/update_position/' . paramEncrypt($value->id_jabatan)); ?>" >
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-body">
                            <div class="alert alert-custom alert-secondary alert-shadow mb-2" role="alert">
                                <div class="alert-text">
                                    <span class="form-text text-dark-75 mb-1">*untuk jabatan Kepala Sekolah, Wakil Kepala, Tata Usaha, Bendahara dst. Termasuk ke dalam <b class="text-danger">"Jabatan Internal"</b>.</span>
                                    <span class="form-text text-dark-75 mb-1">**untuk jabatan BK, Guru dst. Termasuk ke dalam <b class="text-danger">"Jabatan Fungsional"</b>.</span>
                                    <span class="form-text text-dark-75 mb-1">***untuk jabatan Komite dst. Termasuk ke dalam <b class="text-danger">"Jabatan Eksternal"</b>.</span>
                                </div>
                            </div>
                            <div class="row mt-5">

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>Nama Jabatan</label>
                                        <input type="text" name="nama_jabatan" id="nama_jabatan<?php echo $value->id_jabatan; ?>" value="<?php echo $value->nama_jabatan; ?>" class="form-control form-control-solid form-control-lg " placeholder="Isikan Nama Jabatan" required="">
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Contoh: WakaSek SD, Kepala Sekolah SMP, Tata Usaha SD, dst</span>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>Level Jenjang</label>
                                        <select name="level_tingkat" id="nama_tingkat<?php echo $value->id_jabatan; ?>"  onChange="getPositionEdit<?php echo $value->id_jabatan; ?>(this);" class="form-control form-control-solid form-control-lg" required="">
                                            <?php if ($value->level_tingkat == 1) { ?>
                                                <option value="1" selected="">KB/TK</option>                                            
                                            <?php } else if ($value->level_tingkat == 3) { ?>
                                                <option value="2" selected="">SD</option>
                                            <?php } else if ($value->level_tingkat == 4) { ?>
                                                <option value="3" selected="">SMP</option>
                                            <?php } else if ($value->level_tingkat == 5) { ?>
                                                <option value="4" selected="">SMA</option>   
                                            <?php } else if ($value->level_tingkat == 6) { ?>
                                                <option value="4" selected="">UMUM</option>       
                                            <?php } ?>
                                            <option value="1">KB/TK</option>                                           
                                            <option value="3">SD</option>
                                            <option value="4">SMP</option>
                                            <option value="5">SMA</option>
                                            <option value="6">UMUM</option>  
                                        </select>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Jenjang/Tingkat</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-1">
                                </div>                        
                                <div class="col-xl-10">
                                    <div class="form-group">
                                        <label>Hasil Nama Jabatan</label>
                                        <input type="text" name="hasil_nama_jabatan" id="hasil_nama_jabatan<?php echo $value->id_jabatan; ?>" value="<?php echo $value->hasil_nama_jabatan; ?>" id="hasil_nama_jabatan" readonly="" class="form-control form-control-solid form-control-lg " placeholder="Hasil Nama Jabatan">
                                        <span class="form-text text-dark"><b class="text-danger">*OTOMATIS, </b>isi Nama Jabatan kemudian pilih Tingkat</span>
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
                                        <label>Level Jabatan</label>
                                        <select name="level_jabatan" class="form-control form-control-solid form-control-lg" required="">
                                            <?php if ($value->level_jabatan == 1) { ?>
                                                <option value="1" selected="">Jabatan Internal*</option> 
                                            <?php } else if ($value->level_jabatan == 2) { ?>
                                                <option value="2" selected="">Jabatan Fungsional**</option>
                                            <?php } else if ($value->level_jabatan == 3) { ?>
                                                <option value="3" selected="">Jabatan Eksternal***</option>
                                            <?php } else if ($value->level_jabatan == 0) { ?>
                                                <option value="0" selected="">Admin</option>
                                            <?php } ?>
                                            <option value="0">Admin</option>
                                            <option value="1">Jabatan Internal*</option>                                   
                                            <option value="2">Jabatan Fungsional**</option>
                                            <option value="3">Jabatan Eksternal***</option>
                                        </select>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Level Jabatan</span>

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

<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-position.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-position.js">
</script>
<script>
    var grade = '', name = '';
    function getPosition(sel) {
        grade = sel.options[sel.selectedIndex].text;
        $('#hasil_nama_jabatan').val(name + '-' + grade);
    }

    $("#nama_jabatan").on('input', function () {
        name = $(this).val()
        if (name.length) {
            $('#hasil_nama_jabatan').val(name + '-' + grade);
        } else {
            $('#hasil_nama_jabatan').val("");
        }
    });
</script>
<?php
if (!empty($position)) {
    foreach ($position as $key => $value) {
        ?> 
        <script>
            var grade<?php echo $value->id_jabatan; ?> = $("#nama_tingkat<?php echo $value->id_jabatan; ?> option:selected").text();
            var name<?php echo $value->id_jabatan; ?> = $("#nama_jabatan<?php echo $value->id_jabatan; ?>").val();

            function getPositionEdit<?php echo $value->id_jabatan; ?>(sel) {
                grade<?php echo $value->id_jabatan; ?> = sel.options[sel.selectedIndex].text;
                $('#hasil_nama_jabatan<?php echo $value->id_jabatan; ?>').val(name<?php echo $value->id_jabatan; ?> + '-' + grade<?php echo $value->id_jabatan; ?>);
            }
            $("#nama_jabatan<?php echo $value->id_jabatan; ?>").on('input', function () {
                name<?php echo $value->id_jabatan; ?> = $(this).val()
                if (name<?php echo $value->id_jabatan; ?>.length) {
                    $('#hasil_nama_jabatan<?php echo $value->id_jabatan; ?>').val(name<?php echo $value->id_jabatan; ?> + '-' + grade<?php echo $value->id_jabatan; ?>);
                } else {
                    $('#hasil_nama_jabatan<?php echo $value->id_jabatan; ?>').val("");
                }
            });
        </script>
        <?php
    }  //ngatur nomor urut
}
?>   
<script>
    function act_delete_position(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Jabatan " + name + "?",
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
                    url: "<?php echo site_url("/employee/master/position/delete_position") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Jabatan '" + name + "' telah terhapus.", "success");
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
                Swal.fire("Dibatalkan!", "Jabatan " + name + " batal dihapus.", "error");
            }
        });
    }
</script>