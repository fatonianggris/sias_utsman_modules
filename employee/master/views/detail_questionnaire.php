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
                        <div class="card-body">
                            <!--begin::User-->
                            <div class="d-flex align-items-center justify-content-center">
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h6 text-dark-75 text-hover-primary">
                                        <?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?>
                                    </a>
                                    <div class="text-danger font-size-xs mt-1 font-weight-bold">
                                        <?php echo (($questionnaire[0]->deskripsi_kuisioner)); ?>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="d-flex align-items-center mr-2">
                                            <span class="font-weight-bold font-size-sm mr-2">Mulai</span>
                                            <span class="label label-sm label-light-success label-inline font-weight-bolder"><?php echo TanggalIndo(($questionnaire[0]->tgl_mulai)); ?></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="font-weight-bold font-size-sm mr-2">Berakhir</span>
                                            <span class="label label-sm label-light-danger label-inline font-weight-bolder"><?php echo TanggalIndo(($questionnaire[0]->tgl_berakhir)); ?></span>
                                        </div>
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
                        <div class="col-xl-12 col-12">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="<?php echo site_url('employee/master/questionnaire/list_question/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" class="btn btn-light btn-sm text-success font-weight-bold ml-2">Lihat Daftar</a>
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
                <!--begin::Content-->
                <div class="col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-warning gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5" />
                                                <path d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M8.5,13 C9.32842712,13 10,12.3284271 10,11.5 C10,10.6715729 9.32842712,10 8.5,10 C7.67157288,10 7,10.6715729 7,11.5 C7,12.3284271 7.67157288,13 8.5,13 Z M13.5,13 C14.3284271,13 15,12.3284271 15,11.5 C15,10.6715729 14.3284271,10 13.5,10 C12.6715729,10 12,10.6715729 12,11.5 C12,12.3284271 12.6715729,13 13.5,13 Z M18.5,13 C19.3284271,13 20,12.3284271 20,11.5 C20,10.6715729 19.3284271,10 18.5,10 C17.6715729,10 17,10.6715729 17,11.5 C17,12.3284271 17.6715729,13 18.5,13 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-success font-weight-bolder mt-4">
                                        <a href="#" data-toggle="modal" data-target="#modal_keterangan_questionnaire" class="btn btn-light text-warning font-weight-bold mr-2">Lihat Keterangan</a>
                                    </div>

                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                </div>
                <div class=" col-xl-4">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                        <!--begin::Body-->
                        <div class="card-body align-items-center">
                            <div>
                                <div class="d-flex justify-content-center">
                                    <p class="text-dark-75 font-weight-bolder font-size-h4 mr-5 ">Tipe Pertanyaan
                                    </p>
                                    <a href="#" data-toggle="modal" data-target="#modal_add_question_type">
                                        <span class="label label-success label-xl label-inline" data-toggle="tooltip" title="Tambah tipe">
                                            <i class="flaticon2-add text-white"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="d-flex flex-wrap justify-content-center">
                                    <?php
                                    if (!empty($question_type)) {
                                        foreach ($question_type as $key => $value) {
                                    ?>
                                            <div class="dropdown mt-1 mr-2">
                                                <a href="#" class="label font-weight-bold label-default label-md label-inline dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                                    <?php echo strtoupper($value->nama_tipe_pertanyaan); ?>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item font-weight-bold" href="#" id="btn_question_type_edit" data-toggle="modal" data-target="#modal_edit_question_type"
                                                        data-id_tipe_pertanyaan="<?php echo paramEncrypt($value->id_tipe_pertanyaan); ?>"
                                                        data-nama_tipe_pertanyaan="<?php echo ($value->nama_tipe_pertanyaan); ?>"
                                                        data-deskripsi_tipe_pertanyaan="<?php echo ($value->deskripsi_tipe_pertanyaan); ?>">
                                                        <i class="flaticon2-add "></i> Edit</a>
                                                    <a class="dropdown-item font-weight-bold" href="javascript:act_delete_question_type('<?php echo paramEncrypt($value->id_tipe_pertanyaan); ?>',  '<?php echo strtoupper($value->nama_tipe_pertanyaan); ?>')">
                                                        <i class="flaticon2-trash "></i> Delete</a>
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 13-->
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-3">
                            <!--begin::Engage Widget 2-->
                            <div class="card card-custom mb-7">
                                <div class="card-body d-flex p-0">
                                    <?php
                                    $bg_personal = '';
                                    if ($eval_result[0]->total_hasil_personal_penilai == $eval_result[0]->jumlah_personal_penilai) {
                                        $bg_personal = 'bg-success';
                                    } else {
                                        $bg_personal = 'bg-danger';
                                    } ?>
                                    <div class="flex-grow-1 <?php echo $bg_personal; ?>  p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 70%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Chat6.svg);">
                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar Penilaian Personal</h4>
                                        <div
                                            class="text-inverse-success font-weight-bolder font-size-h1 mt-3">
                                            <?php echo $eval_result[0]->total_hasil_personal_penilai; ?>/<?php echo $eval_result[0]->jumlah_personal_penilai; ?>
                                        </div>
                                        <div class="text-inverse-success font-weight-bolder mt-3">
                                            <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_personal/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" class="btn btn-light text-dark font-weight-bold mr-2">Lihat Daftar</a>
                                        </div>
                                        <p class="text-inverse-danger font-weight-bolder">*klik lihat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3">
                            <!--begin::Engage Widget 2-->
                            <div class="card card-custom mb-7">
                                <div class="card-body d-flex p-0">
                                    <?php
                                    $bg_sejawat = '';
                                    if ($eval_result[0]->total_hasil_sejawat_penilai == $eval_result[0]->jumlah_sejawat_penilai) {
                                        $bg_sejawat = 'bg-success';
                                    } else {
                                        $bg_sejawat = 'bg-danger';
                                    } ?>
                                    <div class="flex-grow-1 <?php echo $bg_sejawat; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 70%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Chat6.svg);">
                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar Penilaian Sejawat</h4>
                                        <div
                                            class="text-inverse-success font-weight-bolder font-size-h1 mt-3">
                                            <?php echo $eval_result[0]->total_hasil_sejawat_penilai; ?>/<?php echo $eval_result[0]->jumlah_sejawat_penilai; ?>
                                        </div>
                                        <div class="text-inverse-success font-weight-bolder mt-3">
                                            <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_colleague/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" class="btn btn-light text-dark font-weight-bold mr-2">Lihat Daftar</a>
                                        </div>
                                        <p class="text-inverse-danger font-weight-bolder">*klik lihat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3">
                            <!--begin::Engage Widget 2-->
                            <div class="card card-custom mb-7">
                                <div class="card-body d-flex p-0">
                                    <?php
                                    $bg_atasan = '';
                                    if ($eval_result[0]->total_hasil_atasan_penilai == $eval_result[0]->jumlah_atasan_penilai) {
                                        $bg_atasan = 'bg-success';
                                    } else {
                                        $bg_atasan = 'bg-danger';
                                    } ?>
                                    <div class="flex-grow-1 <?php echo $bg_atasan; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 70%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Chat6.svg);">
                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar Penilaian Atasan</h4>
                                        <div
                                            class="text-inverse-success font-weight-bolder font-size-h1 mt-3">
                                            <?php echo $eval_result[0]->total_hasil_atasan_penilai; ?>/<?php echo $eval_result[0]->jumlah_atasan_penilai; ?>
                                        </div>
                                        <div class="text-inverse-success font-weight-bolder mt-3">
                                            <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_leader/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" class="btn btn-light text-dark font-weight-bold mr-2">Lihat Daftar</a>
                                        </div>
                                        <p class="text-inverse-danger font-weight-bolder">*klik lihat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3">
                            <!--begin::Engage Widget 2-->
                            <div class="card card-custom mb-7">
                                <div class="card-body d-flex p-0">
                                    <?php
                                    $bg_bawahan = '';
                                    if ($eval_result[0]->total_hasil_bawahan_penilai == $eval_result[0]->jumlah_bawahan_penilai) {
                                        $bg_bawahan = 'bg-success';
                                    } else {
                                        $bg_bawahan = 'bg-danger';
                                    } ?>
                                    <div class="flex-grow-1 <?php echo $bg_bawahan; ?> p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 176px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 70%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Communication/Chat6.svg);">
                                        <h4 class="text-inverse-danger font-weight-bolder">Daftar Penilaian Bawahan</h4>
                                        <div
                                            class="text-inverse-success font-weight-bolder font-size-h1 mt-3">
                                            <?php echo $eval_result[0]->total_hasil_bawahan_penilai; ?>/<?php echo $eval_result[0]->jumlah_bawahan_penilai; ?>
                                        </div>
                                        <div class="text-inverse-success font-weight-bolder mt-3">
                                            <a href="<?php echo site_url('employee/master/questionnaire/list_evaluation_subordinate/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" class="btn btn-light text-dark font-weight-bold mr-2">Lihat Daftar</a>
                                        </div>
                                        <p class="text-inverse-danger font-weight-bolder">*klik lihat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-7">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            Perbandingan Kuisioner Selesai/Belum Selesai
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Chart-->
                                    <div id="chart_3"></div>
                                    <!--end::Chart-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-xl-5">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--begin::Tiles Widget 13-->
                                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 160px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                                        <!--begin::Body-->
                                        <div class="card-body align-items-center">
                                            <div>
                                                <div class="d-flex justify-content-center">
                                                    <p class="text-dark-75 font-weight-bolder font-size-h4 mr-5 ">Predikat Penilaian
                                                    </p>
                                                    <a href="#" data-toggle="modal" data-target="#modal_add_predicate_value">
                                                        <span class="label label-primary label-xl label-inline" data-toggle="tooltip" title="Tambah tipe">
                                                            <i class="flaticon2-add text-white"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-wrap justify-content-center">
                                                    <?php
                                                    if (!empty($predicate_value)) {
                                                        foreach ($predicate_value as $key => $value) {
                                                    ?>
                                                            <div class="dropdown mt-1 mr-2">
                                                                <a href="#" class="label font-weight-bold label-primary label-md label-inline dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                                                    <?php echo strtoupper($value['label_nilai']); ?> (Min:<?php echo strtoupper($value['nilai_minimal']); ?>,
                                                                    Max:<?php echo strtoupper($value['nilai_maksimal']); ?>, Abjad:<?php echo strtoupper($value['predikat_abjad']); ?>)
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item font-weight-bold" href="#" id="btn_predicate_value_edit" data-toggle="modal" data-target="#modal_edit_predicate_value"
                                                                        data-id_nilai_predikat="<?php echo paramEncrypt($value['id_nilai_predikat']); ?>"
                                                                        data-nilai_minimal="<?php echo ($value['nilai_minimal']); ?>"
                                                                        data-nilai_maksimal="<?php echo ($value['nilai_maksimal']); ?>"
                                                                        data-predikat_abjad="<?php echo ($value['predikat_abjad']); ?>"
                                                                        data-label_nilai="<?php echo ($value['label_nilai']); ?>">
                                                                        <i class="flaticon2-add "></i> Edit</a>
                                                                    <a class="dropdown-item font-weight-bold" href="javascript:act_delete_predicate_value('<?php echo paramEncrypt($value['id_nilai_predikat']); ?>',  '<?php echo strtoupper($value['label_nilai']); ?>')">
                                                                        <i class="flaticon2-trash "></i> Delete</a>
                                                                </div>
                                                            </div>
                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tiles Widget 13-->
                                </div>
                                <div class="col-lg-12">
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="card-title ">
                                                <h3 class="card-label">
                                                    Total Kuisioner
                                                </h3>
                                            </div>
                                            <a href="<?php echo site_url('employee/master/questionnaire/list_employe_evaluation/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" class="btn btn-primary font-weight-bold">Daftar Kuisioner Per Pegawai</a>
                                        </div>
                                        <div class="card-body">
                                            <!--begin::Chart-->
                                            <div id="chart_12" class="d-flex justify-content-center"></div>
                                            <!--end::Chart-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>


<div class="modal fade" id="modal_add_question_type" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Tipe Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('employee/master/questionnaire/post_question_type/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" id="kt_form_add_question_type">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Nama Tipe Pertanyaan</label>
                                <input type="text" name="nama_tipe_pertanyaan" class="form-control form-control-solid form-control-lg" placeholder="Isikan Nama Tipe Pertanyaan" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nama Tipe Pertanyaan yang akan dibuat</span>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Deskripsi Tipe Pertanyaan</label>
                                <textarea name="deskripsi_tipe_pertanyaan" class="form-control form-control-solid" rows="3"></textarea>
                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Deskripsi Tipe Pertanyaan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success font-weight-bold mr-2">Simpan</button>
                    <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_add_predicate_value" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Nilai Predikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('employee/master/questionnaire/post_predicate_value/' . paramEncrypt($questionnaire[0]->id_kuisioner)); ?>" id="kt_form_add_predicate_value">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>Nilai Minimal</label>
                                <input type="text" name="nilai_minimal" class="form-control form-control-solid form-control-lg" placeholder="Isikan Min" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nilai Minimal</span>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>Nilai Maksimal</label>
                                <input type="text" name="nilai_maksimal" class="form-control form-control-solid form-control-lg" placeholder="Isikan Maks" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nilai Maksimal</span>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>Predikat Abjad</label>
                                <input type="text" name="predikat_abjad" class="form-control form-control-solid form-control-lg" placeholder="Isikan Predikat Abjad" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Predikat Abjad </span>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Label Nilai</label>
                                <input type="text" name="label_nilai" class="form-control form-control-solid form-control-lg" placeholder="Isikan Label Nilai" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Label Nilai </span>
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

<div class="modal fade" id="modal_edit_question_type" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Tipe Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="kt_form_edit_question_type" novalidate="novalidate" action="#" enctype="multipart/form-data">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="id_tipe_pertanyaan_edit" id="id_tipe_pertanyaan_edit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Nama Tipe Pertanyaan</label>
                                <input type="text" name="nama_tipe_pertanyaan_edit" id="nama_tipe_pertanyaan_edit" class="form-control form-control-solid form-control-lg" placeholder="Isikan Nama Tipe Pertanyaan" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nama Tipe Pertanyaan yang akan dibuat</span>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Deskripsi Tipe Pertanyaan</label>
                                <textarea name="deskripsi_tipe_pertanyaan_edit" id="deskripsi_tipe_pertanyaan_edit" class="form-control form-control-solid" rows="3"></textarea>
                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Deskripsi Tipe Pertanyaan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success font-weight-bold mr-2">Simpan</button>
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit_predicate_value" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Nilai Predikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="kt_form_edit_predicate_value" novalidate="novalidate" action="#" enctype="multipart/form-data">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="id_nilai_predikat_edit" id="id_nilai_predikat_edit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>Nilai Minimal</label>
                                <input type="text" name="nilai_minimal_edit" id="nilai_minimal_edit" class="form-control form-control-solid form-control-lg" placeholder="Isikan Min" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nilai Minimal</span>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>Nilai Maksimal</label>
                                <input type="text" name="nilai_maksimal_edit" id="nilai_maksimal_edit" class="form-control form-control-solid form-control-lg" placeholder="Isikan Maks" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nilai Maksimal</span>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>Predikat Abjad</label>
                                <input type="text" name="predikat_abjad_edit" id="predikat_abjad_edit" class="form-control form-control-solid form-control-lg" placeholder="Isikan Predikat Abjad" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Predikat Abjad </span>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Label Nilai</label>
                                <input type="text" name="label_nilai_edit" id="label_nilai_edit" value="" class="form-control form-control-solid form-control-lg" placeholder="Isikan Label Nilai" required="">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Label Nilai </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success font-weight-bold mr-2">Simpan</button>
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_keterangan_questionnaire" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Detail Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <?php echo $questionnaire[0]->keterangan; ?>
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
<script>

</script>
<input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-question-type.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-question-type-edit.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-predicate-value.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-predicate-value-edit.js">
</script>
<script>
    var SUM_PERSONAL = <?php echo $eval_result[0]->jumlah_personal_penilai; ?>;
    var SUM_SEJAWAT = <?php echo $eval_result[0]->jumlah_sejawat_penilai; ?>;
    var SUM_ATASAN = <?php echo $eval_result[0]->jumlah_atasan_penilai; ?>;
    var SUM_BAWAHAN = <?php echo $eval_result[0]->jumlah_bawahan_penilai; ?>;

    var CAL_SUM_PERSONAL = <?php echo $eval_result[0]->total_hasil_personal_penilai; ?>;
    var CAL_SUM_SEJAWAT = <?php echo $eval_result[0]->total_hasil_sejawat_penilai; ?>;
    var CAL_SUM_ATASAN = <?php echo $eval_result[0]->total_hasil_atasan_penilai; ?>;
    var CAL_SUM_BAWAHAN = <?php echo $eval_result[0]->total_hasil_bawahan_penilai; ?>;

    const primary = " #6993FF";
    const success = "#1BC5BD";
    const info = "#8950FC";
    const warning = "#FFA800";
    const danger = "#F64E60";


    // Chart 3
    new ApexCharts(document.querySelector("#chart_3"), {
        series: [{
                name: "Selesai",
                data: [CAL_SUM_PERSONAL, CAL_SUM_SEJAWAT, CAL_SUM_ATASAN, CAL_SUM_BAWAHAN]
            },
            {
                name: "Belum Selesai",
                data: [SUM_PERSONAL - CAL_SUM_PERSONAL, SUM_SEJAWAT - CAL_SUM_SEJAWAT, SUM_ATASAN - CAL_SUM_ATASAN, SUM_BAWAHAN - CAL_SUM_BAWAHAN]
            }
        ],
        chart: {
            type: "bar",
            height: 423
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"]
        },
        xaxis: {
            categories: ["Kuisioner Personal", "Kuisioner Sejawat", "Kuisioner Atasan", "Kuisioner Bawahan"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: (val) => val + " Kuisioner"
            }
        },
        colors: [success, danger]
    }).render();

    new ApexCharts(document.querySelector("#chart_12"), {
        series: [SUM_PERSONAL, SUM_SEJAWAT, SUM_ATASAN, SUM_BAWAHAN],
        chart: {
            width: 400,
            type: "pie"
        },
        labels: ["Personal", "Sejawat", "Atasan", "Bawahan"],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: "bottom"
                }
            }
        }],
        colors: [primary, success, warning, danger]
    }).render();
</script>
<script>
    let editorInstance;
    $(document).ready(function() {
        // Buka modal dan isi form dari data-*
        $(document).on("click", "#btn_predicate_value_edit", function() {
            let btn = $(this);

            $("#id_nilai_predikat_edit").val(btn.data("id_nilai_predikat"));
            $("#nilai_minimal_edit").val(btn.data("nilai_minimal"));
            $("#nilai_maksimal_edit").val(btn.data("nilai_maksimal"));
            $("#predikat_abjad_edit").val(btn.data("predikat_abjad"));
            $("#label_nilai_edit").val(btn.data("label_nilai"));

            $("#modal_edit_predicate_value").modal("show");
        });

        $(document).on("click", "#btn_question_type_edit", function() {
            let btn = $(this);

            $("#id_tipe_pertanyaan_edit").val(btn.data("id_tipe_pertanyaan"));
            $("#nama_tipe_pertanyaan_edit").val(btn.data("nama_tipe_pertanyaan"));
            $("#deskripsi_tipe_pertanyaan_edit").val(btn.data("deskripsi_tipe_pertanyaan"));

            $("#modal_edit_question_type").modal("show");
        });

        $(document).on("click", "#btn_question_view", function() {
            let btn = $(this);

            $("#tipe_pertanyaan").text(btn.data("nama_tipe_pertanyaan"));
            $("#isi_pertanyaan").text(btn.data("isi_pertanyaan"));
            $("#deskripsi_pertanyaan").html(btn.data("deskripsi_pertanyaan"));

            $("#modal_view_question").modal("show");
        });

        $(document).on("click", "#btn_question_edit", function() {
            let btn = $(this);

            $("#tipe_pertanyaan_edit").val(btn.data("tipe_pertanyaan"));
            $("#id_pertanyaan_edit").val(btn.data("id_pertanyaan"));
            $("#isi_pertanyaan_edit").val(btn.data("isi_pertanyaan"));

            $("#modal_edit_question").modal("show");

            if (!editorInstance) {
                ClassicEditor.create(document.querySelector(".kt-ckeditor-2-edit"), {
                        removePlugins: ["Heading", "Link"],
                        toolbar: [
                            "bold",
                            "italic",
                            "|",
                            "undo",
                            "redo",
                            "|",
                            "numberedList",
                            "bulletedList"
                        ],
                    })
                    .then(editor => {
                        editorInstance = editor;

                        // isi CKEditor dengan data-content
                        editor.setData(btn.data("deskripsi_pertanyaan"));

                        // sync ke textarea biar bisa submit form biasa
                        editor.model.document.on('change:data', () => {
                            document.querySelector("#deskripsi_pertanyaan_edit").value = editor.getData();
                        });
                    })
                    .catch(error => console.error(error));
            } else {
                // kalau editor sudah ada (modal dibuka ulang), cukup update datanya
                editorInstance.setData(btn.data("deskripsi_pertanyaan"));
            }

        });


    });
</script>

<script>
    function act_delete_question_type(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            html: "Apakah anda yakin ingin menghapus Pertanyaan <b>'" + name + "'</b>?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("/employee/master/questionnaire/delete_question_type") ?>",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },

                    dataType: "json",
                    success: function(result) {
                        if (result.status) {
                            Swal.fire("Sukses", result.message, "success").then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Gagal", result.message, "error");
                        }
                    },
                    error: function(result) {
                        console.log(result);
                        Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                    }
                });

            } else {
                Swal.fire("Dibatalkan!", "Tipe Pertanyaan " + name + " batal dihapus.", "error");
            }
        });
    }
</script>

<script>
    function act_delete_predicate_value(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            html: "Apakah anda yakin ingin menghapus Nilai Predikat Label <b>'" + name + "'</b>?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("/employee/master/questionnaire/delete_predicate_value") ?>",
                    data: {
                        id: id,
                        [csrfName]: csrfHash
                    },

                    dataType: "json",
                    success: function(result) {
                        if (result.status) {
                            Swal.fire("Sukses", result.message, "success").then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Gagal", result.message, "error");
                        }
                    },
                    error: function(result) {
                        console.log(result);
                        Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                    }
                });

            } else {
                Swal.fire("Dibatalkan!", "Nilai Predikat Label " + name + " batal dihapus.", "error");
            }
        });
    }
</script>