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
                            <a href="" class="text-muted">Daftar Per Pegawai</a>
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
    <?php $user = $this->session->userdata('sias-employee'); ?>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Notice-->
                            <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                                <div class="alert-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="alert-text">
                                    <div class="row align-items-center">
                                        <div class="col-lg-11 col-xl-10">
                                            <div class="row align-items-center">
                                                <div class="col-md-2 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <select class="form-control" id="select_jk">
                                                            <option value="0" selected="">Pilih JK</option>
                                                            <option value="1">Laki-laki</option>
                                                            <option value="2">Perempuan</option>
                                                            <option value="0">Semua</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <select class="form-control" id="select_grade">
                                                            <option value="0" selected="">Pilih Tingkat</option>
                                                            <?php if ($user[0]->level_jabatan == 0) { ?>
                                                                <option value="1">KB/TK</option>                                                              
                                                                <option value="3">SD</option>
                                                                <option value="4">SMP</option>
                                                                <option value="5">SMA</option>                                                               
                                                                <option value="0">SEMUA</option>
                                                            <?php } else { ?>
                                                                <?php if ($user[0]->level_tingkat == 1) { ?>
                                                                    <option value="1">KB/TK</option>                                                                    
                                                                <?php } elseif ($user[0]->level_tingkat == 3) { ?>
                                                                    <option value="3">SD</option>
                                                                <?php } elseif ($user[0]->level_tingkat == 4) { ?>
                                                                    <option value="4">SMP</option>
                                                                <?php } elseif ($user[0]->level_tingkat == 5) { ?>
                                                                    <option value="5">SMA</option>
                                                                <?php } ?>
                                                                <option value="0">SEMUA</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <select class="form-control" id="select_emp">
                                                            <option value="0" selected="">Pilih Pegawai</option>
                                                            <option value="1">Tetap</option>
                                                            <option value="2">Tdk Tetap</option>
                                                            <option value="3">Honorer</option>
                                                            <option value="0">Semua</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        <select class="form-control" id="select_pos">
                                                            <option value="0" selected="">Pilih Jabatan</option>
                                                            <?php
                                                            if (!empty($position)) {
                                                                foreach ($position as $key => $value_pos) {
                                                                    ?>
                                                                    <option value="<?php echo $value_pos->id_jabatan; ?>"><?php echo strtoupper($value_pos->hasil_nama_jabatan); ?></option>                                     
                                                                    <?php
                                                                }
                                                            }
                                                            ?>        
                                                            <option value="0">SEMUA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-xl-2 mt-5 mt-lg-0 text-right">
                                            <a href="<?php echo site_url('employee/master/employe/add_employe'); ?>" class="btn btn-primary btn-md font-weight-bold" >
                                                <i class="flaticon2-add"></i>Tambah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Notice-->
                            <!--begin::List Widget 21-->
                            <div class="card card-custom">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column mb-5">
                                        <span class="card-label font-weight-bolder text-dark mb-1">Daftar Pegawai</span>
                                        <span class="text-muted mt-2 font-weight-bold font-size-sm">Berikut merupakan daftar pegawai</span>
                                    </h3>

                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    <!--begin::Item-->
                                    <div class="row" id="employe">

                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 21-->

                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>

            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<script>

<?php if ($user[0]->level_jabatan == 0) { ?>
        $(document).ready(function () {
            var url = "<?php echo site_url('employee/employe/academic/add_ajax_employe/'); ?>";
            $('#employe').load(url);
        });
        var id_grade = $("#select_grade").val();
<?php } else { ?>
        $(document).ready(function () {
            var url = "<?php echo site_url('employee/employe/academic/add_ajax_employe/' . $user[0]->level_tingkat); ?>";
            $('#employe').load(url);
        });
        var id_grade = <?php echo $user[0]->level_tingkat; ?>;
<?php } ?>;
    var id_jk = $("#select_jk").val();
    var id_grade = $("#select_grade").val();
    var id_emp = $("#select_emp").val();
    var id_pos = $("#select_pos").val();

    $("#select_jk").change(function () {
        id_jk = $(this).val();
        var url = "<?php echo site_url('employee/employe/academic/add_ajax_employe'); ?>/" + id_grade + "/" + id_pos + "/" + id_jk + "/" + id_emp;
        $('#employe').load(url);
        return false;
    });

    $("#select_grade").change(function () {
<?php if ($user[0]->level_jabatan == 0) { ?>
            id_grade = $("#select_grade").val();
<?php } else { ?>
            id_grade = <?php echo $user[0]->level_tingkat; ?>;
<?php } ?>;
        var url = "<?php echo site_url('employee/employe/academic/add_ajax_employe'); ?>/" + id_grade + "/" + id_pos + "/" + id_jk + "/" + id_emp;
        $('#employe').load(url);
        return false;
    });

    $("#select_emp").change(function () {
        id_emp = $(this).val()
        var url = "<?php echo site_url('employee/employe/academic/add_ajax_employe'); ?>/" + id_grade + "/" + id_pos + "/" + id_jk + "/" + id_emp;
        $('#employe').load(url);
        return false;
    });

    $("#select_pos").change(function () {
        id_pos = $(this).val();
        var url = "<?php echo site_url('employee/employe/academic/add_ajax_employe'); ?>/" + id_grade + "/" + id_pos + "/" + id_jk + "/" + id_emp;
        $('#employe').load(url);
        return false;
    });
</script>