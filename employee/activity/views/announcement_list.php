<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Pengumuman</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Pengumuman Pegawai & Siswa</a>
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
                <div class="col-xl-12">
                    <!--begin::Notice-->
                    <?php echo $this->session->flashdata('flash_message'); ?>
                    <!--end::Notice-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                   
                                                    <select class="form-control" id="kt_datatable_search_category">
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="1">Rendah</option>                                   
                                                        <option value="2">Normal</option>
                                                        <option value="3">Tinggi</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                   
                                                    <select class="form-control" id="kt_datatable_search_destination">
                                                        <option value="">Pilih Tujuan</option>
                                                        <option value="1">Siswa</option>                                   
                                                        <option value="2">Pegawai</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-xl-2 mt-3 mt-lg-0">

                                    </div>
                                    <div class="col-lg-1 col-xl-2 mt-3 mt-lg-0 text-right">
                                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_add_pengumuman" >
                                            <i class="flaticon2-add"></i>Buat
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_announcement">
                                <thead>
                                    <tr>
                                        <th title="Judul Pengumuman">Judul Pengumuman</th>
                                        <th title="Kategori">Kategori</th> 
                                        <th title="Tujuan">Tujuan</th> 
                                        <th title="Deskripsi">Deskripsi</th>
                                        <th title="TH">TH</th>
                                        <th title="Aksi">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($announcement)) {
                                        foreach ($announcement as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td><b><?php echo strtoupper($value->judul_pengumuman); ?></b></td>
                                                <td><?php echo $value->kategori; ?></td>
                                                <td><?php echo strtoupper(strtolower($value->tujuan)); ?></td>
                                                <?php
                                                $words = explode(" ", strip_tags($value->keterangan));
                                                $limit_word = implode(" ", array_splice($words, 0, 15));
                                                ?>
                                                <td><?php echo $limit_word; ?></td>
                                                <td><b><?php echo $value->tahun_awal; ?>/<?php echo $value->tahun_akhir; ?></b></td>
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
                                                                    <a role="button" class="navi-link" data-toggle="modal" data-target="#modal_edit_announcement<?php echo $value->id_pengumuman; ?>">
                                                                        <span class="navi-icon"><i class="la la-edit text-success"></i></span>
                                                                        <span class="navi-text">Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="javascript:act_delete_announcement('<?php echo paramEncrypt($value->id_pengumuman); ?>', '<?php echo strtoupper($value->judul_pengumuman); ?>')"  class="navi-link">
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
                    <!--end::Entry-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<div class="modal fade" id="modal_add_pengumuman" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('/employee/activity/announcement/post_announcement'); ?>"  id="kt_form_pengumuman">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Judul Pengumuman</label>
                                <input type="text" name="judul_pengumuman" class="form-control form-control-solid form-control-lg " placeholder="Isikan Nama Pengumuman">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Judul Pengumuman</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Kategori Pengumuman</label>
                                <select name="kategori" class="form-control form-control-solid form-control-lg">
                                    <option value="">Pilih Kategori</option>
                                    <option value="1">Rendah</option>                                   
                                    <option value="2">Normal</option>
                                    <option value="3">Tinggi</option>
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Kategori</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Ditujukan ke-</label>
                                <select name="tujuan" class="form-control form-control-solid form-control-lg">
                                    <option value="">Pilih Tujuan</option>
                                    <option value="1">Siswa</option>                                   
                                    <option value="2">Pegawai</option>
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Tujuan</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">                       
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Deskripsi/Keterangan</label>
                                <textarea name="keterangan" class="form-control form-control-solid" rows="5" ></textarea>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Deskripsi Pengumuman</span>
                            </div>
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
if (!empty($announcement)) {
    foreach ($announcement as $key => $value) {
        ?> 
        <div class="modal fade" id="modal_edit_announcement<?php echo $value->id_pengumuman; ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Pengumuman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('/employee/activity/announcement/update_announcement/' . paramEncrypt($value->id_pengumuman)); ?>"  id="kt_form_pengumuman">
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-body">
                            <div class="row mt-2">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>Judul Pengumuman</label>
                                        <input type="text" name="judul_pengumuman" value="<?php echo $value->judul_pengumuman; ?>" class="form-control form-control-solid form-control-lg " placeholder="Isikan Nama Pengumuman">
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Judul Pengumuman</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Kategori Pengumuman</label>
                                        <select name="kategori" class="form-control form-control-solid form-control-lg">
                                            <option value="<?php echo $value->kategori; ?>">
                                                <?php
                                                if ($value->kategori == 1) {
                                                    echo 'Rendah';
                                                } else if ($value->kategori == 2) {
                                                    echo 'Normal';
                                                } else if ($value->kategori == 3) {
                                                    echo 'Tinggi';
                                                }
                                                ?>
                                            </option>
                                            <option value="1">Rendah</option>                                   
                                            <option value="2">Normal</option>
                                            <option value="3">Tinggi</option>
                                        </select>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Kategori</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Ditujukan ke-</label>
                                        <select name="tujuan" class="form-control form-control-solid form-control-lg">
                                            <option value="<?php echo $value->tujuan; ?>">
                                                <?php
                                                if ($value->tujuan == 1) {
                                                    echo 'Siswa';
                                                } else if ($value->tujuan == 2) {
                                                    echo 'Pegawai';
                                                }
                                                ?>
                                            </option>
                                            <option value="1">Siswa</option>                                   
                                            <option value="2">Pegawai</option>
                                        </select>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Tujuan</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                       
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Deskripsi/Keterangan</label>
                                        <textarea name="keterangan" class="form-control form-control-solid" rows="5" ><?php echo $value->keterangan; ?></textarea>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Deskripsi Pengumuman jika ada</span>
                                    </div>
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
    }  //ngatur nomor urut
}
?>   
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-announcement.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-announcement.js">
</script>
<input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<script>
    function act_delete_announcement(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Pengumuman " + name + "?",
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
                    url: "<?php echo site_url("/employee/activity/announcement/delete_announcement") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Pengumuman '" + name + "' telah terhapus.", "success");
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
                Swal.fire("Dibatalkan!", "Pengumuman " + name + " batal dihapus.", "error");
            }
        });
    }
</script>