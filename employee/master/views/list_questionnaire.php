<style>
    .steps {
        margin-top: 10px
    }

    .step {
        background: #3d4e77ff;
        padding: 15px;
        margin: 6px 0;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: space-between
    }

    .log {
        font-size: 12px;
        background: #3d4e77ff;
        padding: 10px;
        border-radius: 8px;
        margin-top: 15px;
        height: 100px;
        overflow: auto;
        white-space: pre-line
    }

    button {
        padding: 5px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer
    }

    button.retry {
        background: #ef4444;
        color: #fff;
        margin-left: 10px
    }
</style>
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
                            <a href="" class="text-muted">Daftar Kuisioner Pegawai</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a data-toggle="modal" data-target="#modal_add_questionniare" class="btn btn-light-primary font-weight-bolder btn-sm mr-5"><i class="fa fa-plus"></i>Tambah</a>
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
                                                </span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar mb-7">
                                            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="right">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-hor"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                                                    <!--begin::Navigation-->
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-header pb-1">
                                                            <span class="font-weight-bold font-size-sm">Pilih Opsi:</span>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal_edit_quisionniare"
                                                                class="navi-link btn-edit"
                                                                data-id="<?php echo paramEncrypt($value->id_kuisioner); ?>"
                                                                data-nama="<?php echo htmlspecialchars($value->nama_kuisioner); ?>"
                                                                data-tglmulai="<?php echo $value->tgl_mulai; ?>"
                                                                data-tglakhir="<?php echo $value->tgl_berakhir; ?>"
                                                                data-thajaran="<?php echo $value->th_ajaran; ?>"
                                                                data-maxnilai="<?php echo $value->nilai_penilaian_max; ?>"
                                                                data-personal="<?php echo $value->persentase_personal; ?>"
                                                                data-sejawat="<?php echo $value->persentase_sejawat; ?>"
                                                                data-atasan="<?php echo $value->persentase_atasan; ?>"
                                                                data-bawahan="<?php echo $value->persentase_bawahan; ?>"
                                                                data-deskripsi="<?php echo htmlspecialchars($value->deskripsi_kuisioner); ?>"
                                                                data-keterangan="<?php echo htmlspecialchars($value->keterangan); ?>">
                                                                <span class="navi-icon">
                                                                    <i class="fas fa-pencil-ruler text-warning"></i>
                                                                </span>
                                                                <span class="navi-text text-warning">Edit</span>
                                                            </a>
                                                        </li>

                                                        <li class="navi-item">
                                                            <a href="javascript:act_delete_quisionniare('<?php echo paramEncrypt($value->id_kuisioner); ?>', '<?php echo strtoupper($value->nama_kuisioner); ?>')" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="fas fa-trash text-danger"></i>
                                                                </span>
                                                                <span class="navi-text text-danger">Hapus</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!--end::Navigation-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Description-->
                                    <div class="mb-5 mt-5 font-weight-normal"><?php echo ucfirst(strtolower($value->deskripsi_kuisioner)); ?></div>
                                    <!--end::Description-->
                                    <!--begin::Data-->
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center mr-2">
                                            <span class="font-weight-bold mr-2">Mulai</span>
                                            <span class="label label-md label-light-success label-inline font-weight-bolder"><?php echo TanggalIndo(($value->tgl_mulai)); ?></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="font-weight-bold mr-2">Berakhir</span>
                                            <span class="label label-md label-light-danger label-inline font-weight-bolder"><?php echo TanggalIndo(($value->tgl_berakhir)); ?></span>
                                        </div>
                                    </div>
                                    <!--end::Data-->

                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class=" ">
                                            <a href="<?php echo site_url('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($value->id_kuisioner)); ?>" type="button" class="btn btn-success btn-sm font-weight-bold">
                                                <li class="fas fa-eye"></li> Lihat Detail
                                            </a>
                                        </div>
                                        <div class="">
                                            <?php if ($value->status_kuisioner == 1) { ?>
                                                <input data-switch="true" class="change_quiz_switch<?php echo paramEncrypt($value->id_kuisioner); ?>" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" data-on-text="Aktif" data-off-text="Tidak" />
                                            <?php } else { ?>
                                                <input data-switch="true" class="change_quiz_switch<?php echo paramEncrypt($value->id_kuisioner); ?>" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" data-on-text="Aktif" data-off-text="Tidak" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Footer-->
                            </div>
                        </div>
                <?php
                    }  //ngatur nomor urut
                }
                ?>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>

<div class="modal fade" id="modal_add_questionniare" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" enctype="multipart/form-data" novalidate="novalidate" method="POST" action="#" id="kt_add_questionaire_form">
                <input type="hidden" class="txt_csrfname"
                    name="<?php echo $this->security->get_csrf_token_name(); ?>"
                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="form-group">
                                <label>Nama Kuisioner</label>
                                <input type="text" name="nama_kuisioner" id="inisial" class="form-control form-control-solid form-control-lg " placeholder="Isikan Nama Kuisioner">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nama Kuisioner yang akan dibuat</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Penilai Sejawat</label>
                                <input type="text" name="jumlah_penilai_sejawat" id="jumlah_penilai_sejawat" class="form-control form-control-solid form-control-lg " placeholder="Isikan">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>jumlah Penilai Sejawat</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="text" name="tgl_mulai" id="tgl_mulai" readonly="" class="form-control form-control-solid form-control-lg " placeholder="Pilih Tanggal Mulai">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Pilih Tanggal dimulianya Kuisioner</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Tanggal Berakhir</label>
                                <input type="text" name="tgl_berakhir" id="tgl_berakhir" readonly="" class="form-control form-control-solid form-control-lg " placeholder="Pilih Tanggal Akhir">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Tanggal diakhirnya Kuisioner</span>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <select name="th_ajaran" class="form-control form-control-solid form-control-lg">
                                    <option value="">Tahun Ajaran</option>
                                    <?php
                                    if (!empty($schoolyear)) {
                                        foreach ($schoolyear as $key => $value_sch) {
                                    ?>
                                            <option value="<?php echo $value_sch->id_tahun_ajaran; ?>"><?php echo strtoupper($value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' (' . $value_sch->semester . ')'); ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Tahun Ajaran</span>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>Max Penilaian</label>
                                <input type="text" name="nilai_penilaian_max" class="form-control form-control-solid form-control-lg " placeholder="Isikan">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan max penilaian 1-X</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>% Nilai Personal</label>
                                <input type="text" name="persentase_personal" min="0" max="100" id="w1" step="0.01" value="25" class="form-control form-control-solid form-control-lg weight" placeholder="Isikan">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Personal</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>% Nilai Sejawat</label>
                                <input type="text" name="persentase_sejawat" id="w2" min="0" max="100" step="0.01" value="25" class="form-control form-control-solid form-control-lg weight" placeholder="Isikan">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Sejawat</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>% Nilai Atasan</label>
                                <input type="text" name="persentase_atasan" id="w3" min="0" max="100" step="0.01" value="25" class="form-control form-control-solid form-control-lg weight" placeholder="Isikan ">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Atasan</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>% Nilai Bawahan</label>
                                <input type="text" name="persentase_bawahan" id="w4" min="0" max="100" step="0.01" value="25" class="form-control form-control-solid form-control-lg weight" placeholder="Isikan ">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Bawahan</span>
                            </div>
                        </div>
                        <!-- <div class="col-xl-6">
                            <div class="form-group">
                                <label>Besaran Tunjangan(RP)<b class="text-danger"> *DISABLED</b></label>
                                <input type="text" name="tunjangan_kinerja" class="form-control form-control-solid form-control-lg" placeholder="Isikan " disabled>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tunjangan Kinerja</span>
                            </div>
                        </div> -->
                        <!-- <div class="col-xl-3">
                            <div class="form-group">
                                <label>Tipe Penilian Kuisioner</label>
                                <select name="tipe_penilaian" class="form-control form-control-solid form-control-lg">
                                    <option value="">Pilih Tipe</option>
                                    <option value="1">Formatif</option>
                                    <option value="2">Sumatif</option>
                                    <option value="3">Kemajuan</option>
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DPILIH, </b>Pilih Tipe Penilian Kuisioner</span>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-xl-6">

                            <div class="form-group">
                                <label>Deskripsi Kuisioner</label>
                                <textarea name="deskripsi_kuisioner" class="form-control form-control-solid" rows="16"></textarea>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Deskripsi Kuisioner</span>
                            </div>


                        </div>
                        <div class="col-xl-6 text-white font-weight-bold">
                            <label class="text-danger">Progress Generate:</label>
                            <div class="steps" id="steps"></div>
                            <div class="log" id="log">Log: ready...</div>

                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" id="kt-ckeditor-question" class="form-control form-control-solid" rows="8"></textarea>
                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Keterangan Kuisioner</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="startBtn" class="btn btn-success font-weight-bold mr-2">Simpan</button>
                    <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_edit_quisionniare" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="kt_add_questionaire_form_edit" enctype="multipart/form-data" novalidate="novalidate" action="#">
                <input type="hidden" name="id_kuisioner_edit" id="id_kuisioner_edit">
                <input type="hidden" class="txt_csrfname"
                    name="<?php echo $this->security->get_csrf_token_name(); ?>"
                    value="<?php echo $this->security->get_csrf_hash(); ?>">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kuisioner</label>
                        <input type="text" name="nama_kuisioner_edit" id="nama_kuisioner_edit"
                            class="form-control form-control-solid form-control-lg" required>
                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI,</b> Isikan Nama Kuisioner</span>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Tanggal Mulai</label>
                            <input type="text" name="tgl_mulai_edit" id="tgl_mulai_edit"
                                class="form-control form-control-solid form-control-lg" readonly required>
                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI,</b> Pilih tanggal mulai</span>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tanggal Berakhir</label>
                            <input type="text" name="tgl_berakhir_edit" id="tgl_berakhir_edit"
                                class="form-control form-control-solid form-control-lg" readonly required>
                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI,</b> Pilih tanggal berakhir</span>
                        </div>


                        <div class="form-group col-md-4">
                            <label>Tahun Ajaran</label>
                            <select name="th_ajaran_edit" id="th_ajaran_edit"
                                class="form-control form-control-solid form-control-lg" required>
                                <option value="">Pilih Tahun Ajaran</option>
                                <?php foreach ($schoolyear as $sch) { ?>
                                    <option value="<?php echo $sch->id_tahun_ajaran; ?>">
                                        <?php echo strtoupper($sch->tahun_awal . '/' . $sch->tahun_akhir . ' (' . $sch->semester . ')'); ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH,</b> pilih Tahun Ajaran</span>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Max Penilaian</label>
                            <input type="text" name="nilai_penilaian_max_edit" id="nilai_penilaian_max_edit"
                                class="form-control form-control-solid form-control-lg" required>
                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI,</b> isikan max penilaian 1-X</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>% Nilai Personal</label>
                            <input type="text" name="persentase_personal_edit" id="persentase_personal_edit"
                                class="form-control form-control-solid form-control-lg weight_edit" required>
                            <span class="form-text text-dark"><b class="text-danger">*WAJIB, </b>Isikan % Personal</span>
                        </div>
                        <div class="form-group col-md-3">
                            <label>% Nilai Sejawat</label>
                            <input type="text" name="persentase_sejawat_edit" id="persentase_sejawat_edit"
                                class="form-control form-control-solid form-control-lg weight_edit" required>
                            <span class="form-text text-dark"><b class="text-danger">*WAJIB, </b>Isikan % Sejawat</span>
                        </div>
                        <div class="form-group col-md-3">
                            <label>% Nilai Atasan</label>
                            <input type="text" name="persentase_atasan_edit" id="persentase_atasan_edit"
                                class="form-control form-control-solid form-control-lg weight_edit" required>
                            <span class="form-text text-dark"><b class="text-danger">*WAJIB, </b>Isikan % Atasan</span>
                        </div>
                        <div class="form-group col-md-3">
                            <label>% Nilai Bawahan</label>
                            <input type="text" name="persentase_bawahan_edit" id="persentase_bawahan_edit"
                                class="form-control form-control-solid form-control-lg weight_edit" required>
                            <span class="form-text text-dark"><b class="text-danger">*WAJIB, </b>Isikan % Bawahan</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi_kuisioner_edit" id="deskripsi_kuisioner_edit"
                            class="form-control form-control-solid" rows="5"></textarea>
                        <span class="form-text text-dark"><b class="text-danger">*WAJIB,</b> deskripsikan kuisioner</span>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan_edit" id="keterangan_edit"
                            class="form-control form-control-solid kt-ckeditor-question-edit" rows="5"></textarea>
                        <span class="form-text text-dark"><b class="text-dark">*OPSIONAL,</b> isi jika perlu</span>
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

<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-quesionnaire.js"></script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-quesionnaire-edit.js"></script>

<script>

</script>
<script>
    const stepsConfig = [
        "Penilaian Personal",
        "Penilaian Sejawat",
        "Penilaian Atasan",
        "Penilaian Bawahan",
    ];
    const apiUrls = [
        "<?php echo site_url('employee/master/questionnaire/generate_personal_evaluation'); ?>",
        "<?php echo site_url('employee/master/questionnaire/generate_colleague_evaluation'); ?>",
        "<?php echo site_url('employee/master/questionnaire/generate_leader_evaluation'); ?>",
        "<?php echo site_url('employee/master/questionnaire/generate_subordinate_evaluation'); ?>",
    ];

    const steps = stepsConfig.map((name, i) => ({
        id: i,
        name,
        status: "pending",
        progress: 0,
    }));
    let stopped = false,
        paused = false;

    const stepsEl = document.getElementById("steps");
    const logEl = document.getElementById("log");
    const startBtn = document.getElementById("startBtn");

    const sleep = (ms) => new Promise((r) => setTimeout(r, ms));

    function appendLog(text) {
        const t = new Date().toLocaleTimeString();
        logEl.textContent = `[${t}] ${text}\n` + logEl.textContent;
    }

    function renderSteps() {
        stepsEl.innerHTML = "";
        steps.forEach((s) => {
            const div = document.createElement("div");
            div.className = "step";
            div.innerHTML = `<div>${s.id + 1}. ${s.name} - <b>${
                    s.status
                  }</b> <span style='margin-left:10px'>${
                    s.progress
                  }%</span></div>`;
            if (s.status === "failed") {
                const retryBtn = document.createElement("button");
                retryBtn.textContent = "Retry";
                retryBtn.className = "retry";
                retryBtn.onclick = () => {
                    performStep(s.id);
                };
                div.appendChild(retryBtn);
            }
            stepsEl.appendChild(div);
        });
    }
    renderSteps();
</script>
<script>
    let editorInstance;

    $(document).ready(function() {
        // Buka modal dan isi form dari data-*
        $(document).on("click", ".btn-edit", function() {
            let btn = $(this);

            $("#id_kuisioner_edit").val(btn.data("id"));
            $("#nama_kuisioner_edit").val(btn.data("nama"));
            $("#tgl_mulai_edit").val(btn.data("tglmulai"));
            $("#tgl_berakhir_edit").val(btn.data("tglakhir"));
            $("#th_ajaran_edit").val(btn.data("thajaran"));
            $("#nilai_penilaian_max_edit").val(btn.data("maxnilai"));
            $("#persentase_personal_edit").val(btn.data("personal"));
            $("#persentase_sejawat_edit").val(btn.data("sejawat"));
            $("#persentase_atasan_edit").val(btn.data("atasan"));
            $("#persentase_bawahan_edit").val(btn.data("bawahan"));
            $("#deskripsi_kuisioner_edit").val(btn.data("deskripsi"));
            $("#keterangan_edit").val(btn.data("keterangan"));

            $("#modal_edit_quisionniare").modal("show");

            // kalau belum ada editor, buat baru
            if (!editorInstance) {
                ClassicEditor.create(document.querySelector(".kt-ckeditor-question-edit"), {
                        removePlugins: ["Heading", "Link"],
                        toolbar: [
                            "bold",
                            "italic",
                            "|",
                            "undo",
                            "redo",
                            "|",
                            "numberedList",
                            "bulletedList",
                            "|",
                            "insertTable",
                        ],
                    })
                    .then(editor => {
                        editorInstance = editor;

                        // isi CKEditor dengan data-content
                        editor.setData(btn.data("keterangan"));

                        // sync ke textarea biar bisa submit form biasa
                        editor.model.document.on('change:data', () => {
                            document.querySelector("#keterangan_edit").value = editor.getData();
                        });
                    })
                    .catch(error => console.error(error));
            } else {
                // kalau editor sudah ada (modal dibuka ulang), cukup update datanya
                editorInstance.setData(btn.data("keterangan"));
            }
        });


    });
</script>
<?php
if (!empty($questionnaire)) {
    foreach ($questionnaire as $key => $value) {
?>
        <script>
            var csrfName = $('.txt_csrfname').attr('name');
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            var title<?php echo ($value->id_kuisioner); ?> = "<?php echo strtoupper($value->nama_kuisioner); ?>";
            var pro<?php echo ($value->id_kuisioner); ?> = $(".change_quiz_switch<?php echo paramEncrypt($value->id_kuisioner); ?>").bootstrapSwitch();

            pro<?php echo ($value->id_kuisioner); ?>.on("switchChange.bootstrapSwitch", function(event, state) {
                if (state == true) {
                    Swal.fire({
                        title: "Peringatan!",
                        html: "Apakah anda yakin ingin <b class='text-success'>AKTIFKAN</b>  Kuisioner <b>'" + title<?php echo ($value->id_kuisioner); ?> + "'</b> yang anda pilih?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1BC5BD",
                        confirmButtonText: "Ya, Aktifkan!",
                        cancelButtonText: "Tidak, batal!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo site_url("employee/master/questionnaire/activate_status_questionnaire") ?>",
                                data: {
                                    id: '<?php echo paramEncrypt($value->id_kuisioner); ?>',
                                    [csrfName]: csrfHash
                                },
                                dataType: 'JSON',
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
                            pro<?php echo ($value->id_kuisioner); ?>.bootstrapSwitch('state', false);
                            Swal.fire("Dibatalkan!", "Kuisioner <b>'" + title<?php echo ($value->id_kuisioner); ?> + "'</b> batal diaktifkan.", "error");
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Peringatan!",
                        html: "Apakah anda yakin ingin <b class='text-danger'>NONAKTIFKAN</b> Kuisioner <b>'" + title<?php echo ($value->id_kuisioner); ?> + "'</b> yang anda pilih?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, Non Aktifkan!",
                        cancelButtonText: "Tidak, batal!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo site_url("employee/master/questionnaire/disable_status_questionnaire") ?>",
                                data: {
                                    id: '<?php echo paramEncrypt($value->id_kuisioner); ?>',
                                    [csrfName]: csrfHash
                                },
                                dataType: 'JSON',
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
                            pro<?php echo ($value->id_kuisioner); ?>.bootstrapSwitch('state', true);
                            Swal.fire("Dibatalkan!", "Kuisioner <b>'" + title<?php echo ($value->id_kuisioner); ?> + "'</b> batal dinonaktifkan.", "error");
                        }
                    });
                }
            });
        </script>
<?php
    }  //ngatur nomor urut
}
?>

<script>
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }

    $('#tgl_mulai_edit').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows,
        format: 'dd/mm/yyyy'
    });
    $('#tgl_berakhir_edit').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows,
        format: 'dd/mm/yyyy'
    });
</script>

<script>
    function act_delete_quisionniare(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            html: "Apakah anda yakin ingin menghapus Kuisioner <b>'" + name + "'</b>?",
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
                    url: "<?php echo site_url("/employee/master/questionnaire/delete_questionnaire") ?>",
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
                Swal.fire("Dibatalkan!", "Kuisioner <b>'" + name + "'</b> batal dihapus.", "error");
            }
        });
    }
</script>
<script>
    const inputs = Array.from(document.querySelectorAll('.weight'));
    const totalEl = document.getElementById('total');
    let updating = false; // lock agar tidak loop saat set value programatik

    // Helper: jumlahkan nilai input
    function sumValues() {
        return inputs.reduce((s, el) => s + (parseFloat(el.value) || 0), 0);
    }

    // Helper: clamp dan normalisasi angka
    function cleanNumber(v) {
        let n = Number(v);
        if (!isFinite(n) || isNaN(n)) n = 0;
        if (n < 0) n = 0;
        if (n > 100) n = 100;
        return n;
    }

    // Redistribusi proporsional ke kolom selain idx, menjaga rasio sebelumnya.
    function rebalance(excludeIdx) {
        if (updating) return;
        updating = true;

        // Nilai baru kolom yang diubah
        const newVal = cleanNumber(inputs[excludeIdx].value);
        inputs[excludeIdx].value = newVal;

        // Sisa ruang yang harus dibagi ke kolom lain
        let remaining = 100 - newVal;

        // Ambil nilai lama kolom lain (sebelum diubah)
        const otherIdx = inputs.map((_, i) => i).filter(i => i !== excludeIdx);
        const oldVals = otherIdx.map(i => cleanNumber(inputs[i].value));
        const oldSum = oldVals.reduce((a, b) => a + b, 0);

        // Jika semua kolom lain 0, bagi rata
        let newVals;
        if (oldSum === 0) {
            const equal = remaining / otherIdx.length;
            newVals = otherIdx.map(() => equal);
        } else {
            // Skala proporsional berdasarkan rasio nilai sebelumnya
            newVals = oldVals.map(v => (v / oldSum) * remaining);
        }

        // Terapkan pembulatan ke 2 desimal, lalu koreksi selisih agar total = 100 persis
        newVals = newVals.map(v => Math.round(v * 100) / 100);
        let applied = newVals.reduce((a, b) => a + b, 0);
        let delta = Math.round((remaining - applied) * 100) / 100; // sisa karena pembulatan

        // Tambahkan delta ke kolom terakhir (atau yang terbesar) supaya pas 100
        if (Math.abs(delta) >= 0.01) {
            // pilih indeks yang punya nilai terbesar supaya aman dari negatif
            let k = 0;
            for (let i = 1; i < newVals.length; i++)
                if (newVals[i] > newVals[k]) k = i;
            newVals[k] = Math.round((newVals[k] + delta) * 100) / 100;
        }

        // Tulis ke input lain
        otherIdx.forEach((i, j) => {
            // Pastikan clamp 0..100 meski sangat jarang perlu
            let v = Math.max(0, Math.min(100, newVals[j]));
            inputs[i].value = v;
        });

        updating = false;
    }

    // Pasang listener input di semua kolom
    inputs.forEach((el, idx) => {
        el.addEventListener('input', () => rebalance(idx));
        el.addEventListener('change', () => rebalance(idx)); // jaga-jaga kalau input blur
    });

    // Inisialisasi total awal (dan memastikan konsistensi)
    rebalance(0); // trigger sekali supaya total persis 100 dari nilai default
</script>

<script>
    const inputs_edit = Array.from(document.querySelectorAll('.weight_edit'));
    let updating_edit = false; // lock agar tidak loop saat set value programatik

    // Helper: jumlahkan nilai input
    function sumValues_edit() {
        return inputs_edit.reduce((s, el) => s + (parseFloat(el.value) || 0), 0);
    }

    // Helper: clamp dan normalisasi angka
    function cleanNumber_edit(v) {
        let n = Number(v);
        if (!isFinite(n) || isNaN(n)) n = 0;
        if (n < 0) n = 0;
        if (n > 100) n = 100;
        return n;
    }

    // Redistribusi proporsional ke kolom selain idx, menjaga rasio sebelumnya.
    function rebalance_edit(excludeIdx) {
        if (updating_edit) return;
        updating_edit = true;

        // Nilai baru kolom yang diubah
        const newVal = cleanNumber_edit(inputs_edit[excludeIdx].value);
        inputs_edit[excludeIdx].value = newVal;

        // Sisa ruang yang harus dibagi ke kolom lain
        let remaining = 100 - newVal;

        // Ambil nilai lama kolom lain (sebelum diubah)
        const otherIdx = inputs_edit.map((_, i) => i).filter(i => i !== excludeIdx);
        const oldVals = otherIdx.map(i => cleanNumber_edit(inputs_edit[i].value));
        const oldSum = oldVals.reduce((a, b) => a + b, 0);

        // Jika semua kolom lain 0, bagi rata
        let newVals;
        if (oldSum === 0) {
            const equal = remaining / otherIdx.length;
            newVals = otherIdx.map(() => equal);
        } else {
            // Skala proporsional berdasarkan rasio nilai sebelumnya
            newVals = oldVals.map(v => (v / oldSum) * remaining);
        }

        // Terapkan pembulatan ke 2 desimal, lalu koreksi selisih agar total = 100 persis
        newVals = newVals.map(v => Math.round(v * 100) / 100);
        let applied = newVals.reduce((a, b) => a + b, 0);
        let delta = Math.round((remaining - applied) * 100) / 100; // sisa karena pembulatan

        // Tambahkan delta ke kolom terakhir (atau yang terbesar) supaya pas 100
        if (Math.abs(delta) >= 0.01) {
            // pilih indeks yang punya nilai terbesar supaya aman dari negatif
            let k = 0;
            for (let i = 1; i < newVals.length; i++)
                if (newVals[i] > newVals[k]) k = i;
            newVals[k] = Math.round((newVals[k] + delta) * 100) / 100;
        }

        // Tulis ke input lain
        otherIdx.forEach((i, j) => {
            // Pastikan clamp 0..100 meski sangat jarang perlu
            let v = Math.max(0, Math.min(100, newVals[j]));
            inputs_edit[i].value = v;
        });

        updating_edit = false;
    }

    // Pasang listener input di semua kolom
    inputs_edit.forEach((el, idx) => {
        el.addEventListener('input', () => rebalance_edit(idx));
        el.addEventListener('change', () => rebalance_edit(idx)); // jaga-jaga kalau blur
    });

    // Inisialisasi total awal (dan memastikan konsistensi)
    if (inputs_edit.length > 0) {
        rebalance_edit(0);
    }
</script>