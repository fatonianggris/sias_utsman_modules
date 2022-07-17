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
                            <a href="" class="text-muted">Penilaian Pegawai</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a data-toggle="modal" data-target="#modal_add_quisionniare" class="btn btn-light-primary font-weight-bolder btn-sm mr-5"><i class="fa fa-plus"></i>Tambah</a>

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
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar mb-7">
                                            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="right" >
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-hor"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                                                    <!--begin::Navigation-->
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-header pb-1">
                                                            <span class="text-primary font-weight-bold font-size-sm">Pilih Opsi:</span>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a data-toggle="modal" data-target="#modal_edit_quisionniare<?php echo $value->id_kuisioner ?>" class="navi-link">
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
                                        <div class="d-flex align-items-end mr-15">
                                            <a href="<?php echo site_url('employee/master/questionnaire/detail_questionnaire/' . paramEncrypt($value->id_kuisioner)); ?>" type="button" class="btn btn-success btn-sm font-weight-bold"><li class="fas fa-eye"></li> Lihat Detail</a>
                                        </div>
                                        <div class="d-flex align-items-end ml-15">
                                            <?php if ($value->status_kuisioner == 1) { ?>
                                                <input data-switch="true" class="change_quiz_switch<?php echo paramEncrypt($value->id_kuisioner); ?>" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" data-on-text="Aktif"  data-off-text="Tidak" />
                                            <?php } else { ?>
                                                <input data-switch="true" class="change_quiz_switch<?php echo paramEncrypt($value->id_kuisioner); ?>" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" data-on-text="Aktif" data-off-text="Tidak"/>
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

<div class="modal fade" id="modal_add_quisionniare" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('employee/master/questionnaire/post_questionnaire'); ?>" id="kt_form_kuisioner">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">                   
                    <div class="row">                      
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Nama Kuisioner</label>
                                <input type="text" name="nama_kuisioner" id="inisial" class="form-control form-control-solid form-control-lg " placeholder="Isikan Nama Kuisioner" >
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nama Kuisioner yang akan dibuat</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="text" name="tgl_mulai" id="tgl_mulai" readonly="" class="form-control form-control-solid form-control-lg " placeholder="Pilih Tanggal Mulai" >
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
                                <input type="text" name="nilai_penilaian_max" class="form-control form-control-solid form-control-lg " placeholder="Isikan" >
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan nilai max penilaian</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>% Nilai Personal</label>
                                <input type="text" name="persentase_personal" class="form-control form-control-solid form-control-lg " placeholder="Isikan" >
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Personal</span>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>% Nilai Sejawat</label>
                                <input type="text" name="persentase_sejawat" class="form-control form-control-solid form-control-lg " placeholder="Isikan">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Sejawat</span>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>% Nilai Atasan</label>
                                <input type="text" name="persentase_atasan" class="form-control form-control-solid form-control-lg " placeholder="Isikan ">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Atasan</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Besaran Tunjangan(RP)</label>
                                <input type="text" name="tunjangan_kinerja" class="form-control form-control-solid form-control-lg " placeholder="Isikan ">
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tunjangan Kinerja</span>
                            </div>
                        </div>
                        <div class="col-xl-3">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Deskripsi Kuisioner</label>
                                <textarea name="deskripsi_kuisioner" class="form-control form-control-solid" rows="5" ></textarea>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Deskripsi Kuisioner</span>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xl-1"></div>
                        <div class="col-xl-10">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control form-control-solid" rows="3" ></textarea>
                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Keterangan Kuisioner</span>
                            </div>
                        </div>
                        <div class="col-xl-1"></div>
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
if (!empty($questionnaire)) {
    foreach ($questionnaire as $key => $value) {
        ?> 
        <div class="modal fade" id="modal_edit_quisionniare<?php echo $value->id_kuisioner; ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Kuisioner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('employee/master/questionnaire/edit_questionnaire/' . paramEncrypt($value->id_kuisioner)); ?>" >
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-body">                   
                            <div class="row">                      
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Nama Kuisioner</label>
                                        <input type="text" name="nama_kuisioner" required="" value="<?php echo $value->nama_kuisioner; ?>" class="form-control form-control-solid form-control-lg " placeholder="Isikan Nama Kuisioner" >
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nama Kuisioner yang akan dibuat</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input type="text" name="tgl_mulai" required="" id="tgl_mulai<?php echo $value->id_kuisioner; ?>"  value="<?php echo $value->tgl_mulai; ?>" readonly="" class="form-control form-control-solid form-control-lg " placeholder="Pilih Tanggal Mulai" >
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Pilih Tanggal dimulianya Kuisioner</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Tanggal Berakhir</label>
                                        <input type="text" name="tgl_berakhir" required="" id="tgl_berakhir<?php echo $value->id_kuisioner; ?>"  value="<?php echo $value->tgl_berakhir; ?>" readonly="" class="form-control form-control-solid form-control-lg " placeholder="Pilih Tanggal Akhir">
                                        <span class="form-text text-dark"><b class="text-danger">*OTOMATIS, </b>pilih Tanggal diakhirnya Kuisioner</span>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <select name="th_ajaran" class="form-control form-control-solid form-control-lg" required="">
                                            <option value="<?php echo $value->th_ajaran; ?>" selected=""><?php echo strtoupper($value->tahun_awal . '/' . $value->tahun_akhir . ' (' . $value->semester . ')'); ?></option>
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
                                        <input type="number" name="nilai_penilaian_max" value="<?php echo $value->nilai_penilaian_max; ?>" required="" class="form-control form-control-solid form-control-lg " placeholder="Isikan" >
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan nilai max penilaian</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-2">
                                    <div class="form-group">
                                        <label>% Nilai Personal</label>
                                        <input type="number" min="1" max="100" name="persentase_personal" value="<?php echo $value->persentase_personal; ?>"  required="" class="form-control form-control-solid form-control-lg " placeholder="Isikan" >
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Personal</span>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                    <div class="form-group">
                                        <label>% Nilai Sejawat</label>
                                        <input type="number"  min="1" max="100" name="persentase_sejawat" value="<?php echo $value->persentase_sejawat; ?>" required="" class="form-control form-control-solid form-control-lg " placeholder="Isikan">
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Sejawat</span>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                    <div class="form-group">
                                        <label>% Nilai Atasan</label>
                                        <input type="number"  min="1" max="100" value="<?php echo $value->persentase_atasan; ?>" name="persentase_atasan" required="" class="form-control form-control-solid form-control-lg " placeholder="Isikan ">
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan % Atasan</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Besaran Tunjangan(RP)</label>
                                        <input type="number" name="tunjangan_kinerja" value="<?php echo $value->tunjangan_kinerja; ?>"  class="form-control form-control-solid form-control-lg " placeholder="Isikan " required="">
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tunjangan Kinerja</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Tipe Penilian Kuisioner</label>
                                        <select name="tipe_penilaian" required="" class="form-control form-control-solid form-control-lg">
                                            <option value="<?php echo $value->tipe_penilaian; ?>" selected="">
                                                <?php
                                                if ($value->tipe_penilaian == 1) {
                                                    echo 'Formatif';
                                                } else if ($value->tipe_penilaian == 2) {
                                                    echo 'Sumatif';
                                                } else if ($value->tipe_penilaian == 3) {
                                                    echo 'Kemajuan';
                                                }
                                                ?>
                                            </option>
                                            <option value="1">Formatif</option>
                                            <option value="2">Sumatif</option>
                                            <option value="3">Kemajuan</option>
                                        </select>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DPILIH, </b>Pilih Tipe Penilian Kuisioner</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Deskripsi Kuisioner</label>
                                        <textarea name="deskripsi_kuisioner" class="form-control form-control-solid" rows="5" ><?php echo $value->deskripsi_kuisioner; ?></textarea>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Deskripsi Kuisioner</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-1"></div>
                                <div class="col-xl-10">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" class="form-control form-control-solid" rows="3" ><?php echo $value->keterangan; ?></textarea>
                                        <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Keterangan Kuisioner</span>
                                    </div>
                                </div>
                                <div class="col-xl-1"></div>
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
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-quesionnaire.js">
</script>
<?php
if (!empty($questionnaire)) {
    foreach ($questionnaire as $key => $value) {
        ?> 
        <script>
            var csrfName = $('.txt_csrfname').attr('name');
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash

            var title<?php echo ($value->id_kuisioner); ?> = "<?php echo $value->nama_kuisioner; ?>";
            var pro<?php echo ($value->id_kuisioner); ?> = $(".change_quiz_switch<?php echo paramEncrypt($value->id_kuisioner); ?>").bootstrapSwitch();

            pro<?php echo ($value->id_kuisioner); ?>.on("switchChange.bootstrapSwitch", function (event, state) {
                if (state == true) {
                    Swal.fire({
                        title: "Peringatan!",
                        text: "Apakah anda yakin ingin MENGAKTIFKAN Kuisioner '" + title<?php echo ($value->id_kuisioner); ?> + "' yang anda pilih?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1BC5BD",
                        confirmButtonText: "Ya, Aktifkan!",
                        cancelButtonText: "Tidak, batal!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }).then(function (result) {
                        if (result.value) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo site_url("employee/master/questionnaire/activate_status_questionnaire") ?>",
                                data: {id: '<?php echo paramEncrypt($value->id_kuisioner); ?>', [csrfName]: csrfHash},
                                dataType: 'html',
                                success: function (result) {
                                    Swal.fire("Diaktifkan!", "Kuisioner '" + title<?php echo ($value->id_kuisioner); ?> + "' telah diaktifkan!.", "success");
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
                            pro<?php echo ($value->id_kuisioner); ?>.bootstrapSwitch('state', false);
                            Swal.fire("Dibatalkan!", "Kuisioner '" + title<?php echo ($value->id_kuisioner); ?> + "' batal diaktifkan.", "error");
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Peringatan!",
                        text: "Apakah anda yakin ingin NONAKTIFKAN Kuisioner '" + title<?php echo ($value->id_kuisioner); ?> + "' yang anda pilih?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, Non Aktifkan!",
                        cancelButtonText: "Tidak, batal!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }).then(function (result) {
                        if (result.value) {
                            $.ajax({
                                type: "post",
                                url: "<?php echo site_url("employee/master/questionnaire/disable_status_questionnaire") ?>",
                                data: {id: '<?php echo paramEncrypt($value->id_kuisioner); ?>', [csrfName]: csrfHash},
                                dataType: 'html',
                                success: function (result) {
                                    Swal.fire("Dinonaktifkan!", "Kuisioner '" + title<?php echo ($value->id_kuisioner); ?> + "' telah dinonaktifkan!.", "success");
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
                            pro<?php echo ($value->id_kuisioner); ?>.bootstrapSwitch('state', true);
                            Swal.fire("Dibatalkan!", "Kuisioner '" + title<?php echo ($value->id_kuisioner); ?> + "' batal dinonaktifkan.", "error");
                        }
                    });
                }
            });
        </script>
        <?php
    }  //ngatur nomor urut
}
?>  
<?php
if (!empty($questionnaire)) {
    foreach ($questionnaire as $key => $value) {
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

            $('#tgl_mulai<?php echo $value->id_kuisioner; ?>').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows,
                format: 'dd/mm/yyyy'
            });
            $('#tgl_berakhir<?php echo $value->id_kuisioner; ?>').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows,
                format: 'dd/mm/yyyy'
            });
        </script>
        <?php
    }  //ngatur nomor urut
}
?>  
<script>
    function act_delete_quisionniare(id, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Kuisioner '" + name + "'?",
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
                    url: "<?php echo site_url("/employee/master/questionnaire/delete_questionnaire") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Kuisioner '" + name + "' telah terhapus.", "success");
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
                Swal.fire("Dibatalkan!", "Kuisioner " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
