<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Kuisioner</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Detail Kuisioner Penilaian</a>
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
                    <div class="card card-custom" style="height: 150px;">
                        <!--begin::Body-->
                        <div class="card-body pt-5">                          
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h6 text-dark-75 text-hover-primary">
                                        <?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?>
                                        <?php if ($questionnaire[0]->tipe_penilaian == 1) { ?>
                                            <span class="label label-sm label-light-primary label-inline font-weight-bolder ml-1">
                                                FORMATIF
                                            </span>
                                        <?php } else if ($questionnaire[0]->tipe_penilaian == 2) { ?>
                                            <span class="label label-sm label-light-success label-inline font-weight-bolder ml-1">
                                                SUMATIF
                                            </span>
                                        <?php } else if ($questionnaire[0]->tipe_penilaian == 3) { ?>
                                            <span class="label label-sm label-light-warning label-inline font-weight-bolder ml-1">
                                                KEMAJUAN
                                            </span>
                                        <?php } ?>
                                    </a>
                                    <div class="text-warning font-size-xs mt-1 font-weight-bold">
                                        <?php echo (($questionnaire[0]->deskripsi_kuisioner)); ?>
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
                <div class="col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-12" >
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000"/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">
                                        <?php echo $total_question[0]->total_pertanyaan; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Total Pertanyaan</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>

                    </div>

                </div>
                <div class=" col-xl-6">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center">
                            <div>
                                <h4 class="text-dark-75 font-weight-bolder line-height-lg mt-1">Keterangan
                                </h4>
                                <p class="text-dark-75 font-size-sm font-weight-normal">
                                    <?php
                                    $words = explode(" ", $questionnaire[0]->keterangan);
                                    $limit_word = implode(" ", array_splice($words, 0, 10));
                                    ?>
                                    <?php echo ucfirst(strtolower($limit_word)); ?>
                                </p>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-7">
                                        <span class="font-weight-bold font-size-sm  mr-4">Mulai</span>
                                        <span class="label label-sm label-light-success label-inline font-weight-bolder"><?php echo TanggalIndo(($questionnaire[0]->tgl_mulai)); ?></span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-bold font-size-sm mr-4">Berakhir</span>
                                        <span class="label label-sm label-light-danger label-inline font-weight-bolder"><?php echo TanggalIndo(($questionnaire[0]->tgl_berakhir)); ?></span>
                                    </div>
                                </div>
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
                                            <div class="col-md-3 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_type">
                                                        <option value="">Pilih Tipe Pertanyaan</option>
                                                        <option value="1">Pendagogik</option>
                                                        <option value="2">Kepribadian</option>
                                                        <option value="3">Sosial</option>
                                                        <option value="4">Profesional</option>
                                                        <option value="5">Spiritual & Karakter</option>
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
                                                <a href="#" data-toggle="modal" data-target="#modal_add_question" class="dropdown-item text-success" >
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
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_question">
                                <thead>
                                    <tr>
                                        <th title="#">#</th>
                                        <th title="Tipe">Tipe</th>
                                        <th title="Isi Pertanyaan">Isi Pertanyaan</th>                                                                 
                                        <th title="Aksi">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($question)) {
                                        foreach ($question as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_pertanyaan; ?>
                                                </td>                                                
                                                <td >
                                                    <?php echo $value->tipe_pertanyaan; ?>
                                                </td>
                                                <td >
                                                    <b><?php echo ucwords(strtolower($value->isi_pertanyaan)); ?></b>
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
                                                                    <a  href="#" data-toggle="modal" data-target="#modal_view_question<?php echo paramEncrypt($value->id_pertanyaan); ?>" class="navi-link" >
                                                                        <span class="navi-icon"><i class="fas fa-eye text-success"></i></span>
                                                                        <span class="navi-text">Lihat</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a  href="#" data-toggle="modal" data-target="#modal_edit_question<?php echo paramEncrypt($value->id_pertanyaan); ?>"  class="navi-link" >
                                                                        <span class="navi-icon"><i class="fas fa-pencil-ruler text-warning"></i></span>
                                                                        <span class="navi-text">Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="javascript:act_delete_question('<?php echo paramEncrypt($value->id_pertanyaan); ?>',  '<?php echo strtoupper($value->isi_pertanyaan); ?>')"  class="navi-link">
                                                                        <span class="navi-icon"><i class="fas fa-trash text-danger"></i></span>
                                                                        <span class="navi-text text-danger">Hapus</span>
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

<div class="modal fade" id="modal_add_question" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('employee/master/questionnaire/post_question/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" id="kt_form_pertanyaan">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" class="hidden" name="th_ajaran" value="<?php echo $questionnaire[0]->th_ajaran; ?>">
                <div class="modal-body">                                
                    <div class="row">       
                        <div class="col-xl-5">
                            <div class="form-group">
                                <label>Tipe Penilian Kuisioner</label>
                                <select name="tipe_pertanyaan" class="form-control form-control-solid form-control-lg">
                                    <option value="">Pilih Tipe Pertanyaan</option>
                                    <option value="1">Pendagogik</option>
                                    <option value="2">Kepribadian</option>
                                    <option value="3">Sosial</option>
                                    <option value="4">Profesional</option>
                                    <option value="5">Spiritual & Karakter</option>
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DPILIH, </b>Pilih Tipe Pertanyaan Kuisioner</span>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="form-group">
                                <label>Deskripsi Pertanyaan</label>
                                <textarea name="deskripsi_pertanyaan" class="form-control form-control-solid" rows="3" ></textarea>
                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Deskripsi Pertanyaan</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Isi Pertanyaan</label>
                                <textarea name="isi_pertanyaan" class="form-control form-control-solid" rows="5" ></textarea>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Pertanyaan</span>
                            </div>
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
if (!empty($question)) {
    foreach ($question as $key => $value) {
        ?> 
        <div class="modal fade" id="modal_view_question<?php echo paramEncrypt($value->id_pertanyaan); ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lihat Pertanyaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">                                
                        <div class="timeline timeline-3">
                            <div class="timeline-items">

                                <div class="timeline-item">
                                    <div class="timeline-media">
                                        <i class="flaticon2-talk text-primary"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="">        
                                                <?php if ($value->tipe_pertanyaan == 1) { ?>
                                                    <span class="label label-light-info font-weight-bolder label-inline">Pendagogik</span>
                                                <?php } else if ($value->tipe_pertanyaan == 2) { ?>
                                                    <span class="label label-light-primary font-weight-bolder label-inline">Kepribadian</span>
                                                <?php } else if ($value->tipe_pertanyaan == 3) { ?>
                                                    <span class="label label-light-success font-weight-bolder label-inline">Sosial</span>
                                                <?php } else if ($value->tipe_pertanyaan == 4) { ?>
                                                    <span class="label label-light-warning font-weight-bolder label-inline">Profesional</span>
                                                <?php } else if ($value->tipe_pertanyaan == 5) { ?>
                                                    <span class="label label-light-danger font-weight-bolder label-inline">Spiritual & Karakter</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <p class="p-0">
                                            <?php echo ucwords(strtolower($value->isi_pertanyaan)); ?>
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="mr-2">
                                                <a href="#" class="text-warning text-hover-primary font-weight-bold">
                                                    <li class="fas fa-comment-alt"></li> Keterangan
                                                </a>
                                                <p class="p-0">
                                                    <?php echo ucfirst(strtolower($value->deskripsi_pertanyaan)); ?>
                                                </p>
                                            </div>
                                        </div>
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
        <?php
    }  //ngatur nomor urut
}
?>   
<?php
if (!empty($question)) {
    foreach ($question as $key => $value) {
        ?> 
        <div class="modal fade" id="modal_edit_question<?php echo paramEncrypt($value->id_pertanyaan); ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Pertanyaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('employee/master/questionnaire/edit_question/' . paramEncrypt($value->id_pertanyaan) . "/" . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>">
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-body">                                
                            <div class="row">       
                                <div class="col-xl-5">
                                    <div class="form-group">
                                        <label>Tipe Penilian Kuisioner</label>
                                        <select name="tipe_pertanyaan" class="form-control form-control-solid form-control-lg" required="">
                                            <option value="<?php echo $value->tipe_pertanyaan; ?>" selected="">
                                                <?php
                                                if ($value->tipe_pertanyaan == 1) {
                                                    echo 'Pendagogik';
                                                } else if ($value->tipe_pertanyaan == 2) {
                                                    echo 'Kepribadian';
                                                } else if ($value->tipe_pertanyaan == 3) {
                                                    echo 'Sosial';
                                                } else if ($value->tipe_pertanyaan == 4) {
                                                    echo 'Profesional';
                                                } else if ($value->tipe_pertanyaan == 5) {
                                                    echo 'Spiritual & Karakter';
                                                }
                                                ?>
                                            </option>
                                            <option value="1">Pendagogik</option>
                                            <option value="2">Kepribadian</option>
                                            <option value="3">Sosial</option>
                                            <option value="4">Profesional</option>
                                            <option value="5">Spiritual & Karakter</option>
                                        </select>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DPILIH, </b>Pilih Tipe Pertanyaan Kuisioner</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Deskripsi Pertanyaan</label>
                                        <textarea name="deskripsi_pertanyaan" class="form-control form-control-solid" rows="3" ><?php echo $value->deskripsi_pertanyaan; ?></textarea>
                                        <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Deskripsi Pertanyaan</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Isi Pertanyaan</label>
                                        <textarea name="isi_pertanyaan" class="form-control form-control-solid" rows="5" required=""><?php echo $value->isi_pertanyaan; ?></textarea>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Pertanyaan</span>
                                    </div>
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
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-question.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-question.js">
</script>
<script>
    function act_delete_question(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Pertanyaan '" + name + "'?",
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
                    url: "<?php echo site_url("/employee/master/questionnaire/delete_question") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Pertanyaan '" + name + "' telah terhapus.", "success");
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
                Swal.fire("Dibatalkan!", "Pertanyaan " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
