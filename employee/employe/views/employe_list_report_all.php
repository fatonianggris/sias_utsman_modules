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
                            <a href="" class="text-muted">Daftar Penilaian Pegawai</a>
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
                <?php
                if (!empty($questionnaire)) {
                    foreach ($questionnaire as $key => $value) {
                        ?> 
                        <div class="col-xl-4">
                            <div class="card card-custom gutter-b card-stretch">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Pic-->
                                        <div class="symbol mr-4 symbol-lg-75 symbol-primary">
                                            <span class="symbol-label font-size-h1 text-uppercase font-weight-boldest"><?php echo substr($value->nama_kuisioner, 0, 1); ?></span>
                                        </div>
                                        <!--end::Pic-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column mr-auto">
                                            <!--begin: Title-->
                                            <div class="d-flex flex-column mr-auto">
                                                <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1"> <?php echo ucwords(strtolower($value->nama_kuisioner)); ?>
                                                </a>
                                                <span class="text-warning font-weight-bolder">
                                                    <?php echo $value->tahun_awal . "/" . $value->tahun_akhir; ?> <?php echo strtoupper(strtolower($value->semester)); ?>
                                                    <?php if ($value->tipe_penilaian == 1) { ?>
                                                        <span class="label label-sm label-light-primary label-inline font-weight-bolder ml-1">
                                                            FORMATIF
                                                        </span>
                                                    <?php } else if ($value->tipe_penilaian == 2) { ?>
                                                        <span class="label label-sm label-light-success label-inline font-weight-bolder ml-1">
                                                            SUMATIF
                                                        </span>
                                                    <?php } else if ($value->tipe_penilaian == 3) { ?>
                                                        <span class="label label-sm label-light-warning label-inline font-weight-bolder ml-1">
                                                            KEMAJUAN
                                                        </span>
                                                    <?php }
                                                    ?>
                                                </span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Info-->

                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Description-->
                                    <div class="mb-5 mt-5 font-weight-normal"><?php echo ucfirst(strtolower($value->deskripsi_kuisioner)); ?></div>
                                    <!--end::Description-->
                                    <!--begin::Data-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center mr-7">
                                            <span class="font-weight-bold mr-4">Mulai</span>
                                            <span class="label label-md label-light-success label-inline font-weight-bolder"><?php echo TanggalIndo(($value->tgl_mulai)); ?></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="font-weight-bold mr-4">Berakhir</span>
                                            <span class="label label-md label-light-danger label-inline font-weight-bolder"><?php echo TanggalIndo(($value->tgl_berakhir)); ?></span>
                                        </div>
                                    </div>
                                    <!--end::Data-->

                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center mr-15">
                                            <a href="<?php echo site_url('employee/employe/report/detail_questionnaire_all/' . paramEncrypt($value->id_kuisioner)); ?>" type="button" class="btn btn-success btn-sm font-weight-bold"><li class="fas fa-eye"></li> Lihat Detail</a>
                                        </div>
                                        <div class="d-flex align-items-center ml-25">
                                            <?php if ($value->status_kuisioner == 1) { ?>
                                                <span class="label label-xl  ml-5  label-light-success label-inline font-weight-bolder">AKTIF</span>
                                            <?php } else { ?>
                                                <span class="label label-xl label-light-danger label-inline font-weight-bolder">NON AKTIF</span>
                                            <?php } ?>  
                                        </div>
                                    </div>
                                </div>
                                <!--end::Footer-->
                            </div>
                        </div>
                        <?php
                    }  //ngatur nomor urut
                } else {
                ?>   
                <div class="col-12" >
                    <div class="card card-body" >
                        <section id="wrapper" class="error-page">
                            <div class="error-box">
                                <div class="error-body-dev text-center">
                                    <p class="display-3 font-weight-boldest text-danger">PEMBERITAHUAN!</p>
                                    <h3 class="text-uppercase">Mohon Maaf!, Penilaian Pegawai sedang ditutup, silahkan lihat jadwal pengisian penilaian pegawai.</h3>
                                    <p class="mt-5 m-b-30">Silahkan coba beberapa hari lagi, Terima Kasih.</p>
                                </div>
                        </section>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
