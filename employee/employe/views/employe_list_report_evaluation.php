<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Penilaian Pegawai</h5>
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
                <!--begin::Card-->
                <div class="col-xl-6">
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header h-auto">
                            <!--begin::Title-->
                            <div class="card-title py-5">
                                <h3 class="card-label">
                                    Hasil Nilai Anda Tiap Bulan
                                </h3>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="chart_1"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="col-xl-6">
                    <div class="card card-custom gutter-b">

                        <div class="card-body">
                            <p><b class="text-danger">KETERANGAN PENILAIAN:</b><br>
                                Penilaian Pelaksanaan Pekerjaan merupakan upaya untuk melakukan penilaian terhadap guru dan karyawan tentang kinerja yang ditampilkannya dalam periode waktu tertentu.
                                Subjek pelaksana DP3 terdiri dari:
                            </p>
                            <ol>
                                <li>Atasan langsung dari guru yang dinilai</li>
                                <li>Guru yang menilai dirinya sendiri (self-assessment)</li>
                                <li>Rekan kerja yang sering berinteraksi dengan guru yang dinilai</li>
                                <li>Subordinat guru yang dinilai (jika memiliki)</li>
                            </ol>
                            <p><b class="text-danger">PANDUAN PENILAIAN:</b><br> Penilaian Terdapat 4 Kriteria Penilaian <b>(PERSONAL, SEJAWAT, ATASAN & BAWAHAN)</b>.
                                Silahkan mengisi semua instrument <b>PENGISIAN/PENILAIAN</b>.
                            </p>

                            <p><b class="text-danger">KETERANGAN STATUS PENILAIAN:</b><br>
                                <span class="label label-danger label-inline font-weight-bold mr-2">BELUM MENILAI (0/1)</span>: Ada 1 kuisioner dan belum dinilai dari 1 kuisioner.<br>
                                <span class="label label-warning label-inline font-weight-bold mr-2">SEDANG MENILAI (2/3)</span>: Ada 2 kuisioner dinilai dan 1 kuisioner belum dinilai dari 3 kuisioner. <br>
                                <span class="label label-success label-inline font-weight-bold mr-2">SUDAH MENILAI (1/1)</span>: Ada 1 kuisioner dinilai dari 1 kuisioner dan terpenuhi.<br>
                                <span class="label label-dark label-inline font-weight-bold mr-2">TIDAK MENILAI</span>: Anda tidak perlu melakukan penilaian kuisioner ini.
                            </p>
                            <p class="mb-0"><b class="text-danger">KETERANGAN STATUS HASIL EVALUASI:</b><br>
                                <span class="label label-danger label-inline font-weight-bold mr-2">BELUM KELUAR</span>: Hasil penilaian dari atasan/teman/bawahan sedang dalam proses menilai Anda.<br>
                                <span class="label label-success label-inline font-weight-bold mr-2 ">SUDAH KELUAR</span>: Hasil penilaian dari atasan/teman/bawahan telah selesai dan Anda dapat melihatnya.
                            </p>
                        </div>
                    </div>
                </div>
                <!--end::Card-->

                <div class="col-xl-12">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-body">
                            <?php $user = $this->session->userdata('sias-employee'); ?>
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-11">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query" />
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_personal_eval">
                                                        <option value="">Penilaian Personal</option>
                                                        <option value="0">Belum Dinilai</option>
                                                        <option value="1">Sedang Dinilai</option>
                                                        <option value="2">Sudah Dinilai</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_colleague_eval">
                                                        <option value="">Penilaian Sejawat</option>
                                                        <option value="0">Belum Dinilai</option>
                                                        <option value="1">Sedang Dinilai</option>
                                                        <option value="2">Sudah Dinilai</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_laeder_eval">
                                                        <option value="">Penilaian Atasan</option>
                                                        <option value="0">Belum Dinilai</option>
                                                        <option value="1">Sedang Dinilai</option>
                                                        <option value="2">Sudah Dinilai</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_subordinate_eval">
                                                        <option value="">Penilaian Bawahan</option>
                                                        <option value="0">Belum Dinilai</option>
                                                        <option value="1">Sedang Dinilai</option>
                                                        <option value="2">Sudah Dinilai</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0 ">
                                                <div class="d-flex align-items-center mt-5">
                                                    <select class="form-control" id="kt_datatable_search_questionnaire_result">
                                                        <option value="">Hasil Kuisioner</option>
                                                        <option value="0">Belum Keluar</option>
                                                        <option value="1">Sudah Keluar</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 mt-5 mt-lg-0 text-right">
                                        <div class="btn-group mr-5">
                                            <button class="btn btn-primary font-weight-bold btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_result_questionnaire_employee">
                                <thead>
                                    <tr>
                                        <th title="Nama Kuisioner">Nama Kuisioner</th>
                                        <th title="Jumlah Sejawat Dinilai">Jumlah Sejawat Dinilai</th>
                                        <th title="Jumlah Atasan Dinilai">Jumlah Atasan Dinilai</th>
                                        <th title="Jumlah Bawahan Dinilai">Jumlah Bawahan Dinilai</th>
                                        <th title="Penilaian Personal">Penilaian Personal</th>
                                        <th title="Penilaian Sejawat">Penilaian Sejawat</th>
                                        <th title="Penilaian Atasan">Penilaian Atasan</th>
                                        <th title="Penilaian Bawahan">Penilaian Bawahan</th>
                                        <th title="Hasil Eval">Hasil Eval</th>
                                        <th title="Status Kuisioner">Status Kuisioner</th>
                                        <th title="Aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($list_questionnaire)) {
                                        foreach ($list_questionnaire as $key => $value) {
                                    ?>
                                            <tr class="pulse pulse-danger">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40 symbol-light-success flex-shrink-0">
                                                            <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr(strtoupper($value->nama_kuisioner), 0, 1); ?></span>
                                                        </div>
                                                        <div class="ml-2">
                                                            <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_kuisioner); ?></div>
                                                            <span class="label label-sm label-light-success label-inline font-weight-bolder"><?php echo TanggalIndo(($value->tgl_mulai)); ?></span>
                                                            <span class="label label-sm label-light-danger label-inline font-weight-bolder"><?php echo TanggalIndo(($value->tgl_berakhir)); ?></span>
                                                        </div>
                                                        <span class="pulse-ring"></span>
                                                    </div>
                                                </td>
                                             
                                                <td>
                                                    <?php echo $value->jumlah_sejawat_dinilai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->jumlah_atasan_dinilai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->jumlah_bawahan_dinilai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->total_hasil_personal_dinilai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->total_hasil_sejawat_dinilai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->total_hasil_atasan_dinilai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->total_hasil_bawahan_dinilai; ?>
                                                </td>
                                                <td>
                                                    <?php if (($value->jumlah_personal_penilai == $value->total_hasil_personal_penilai) &&
                                                        ($value->jumlah_sejawat_penilai == $value->total_hasil_sejawat_penilai) &&
                                                        ($value->jumlah_atasan_penilai == $value->total_hasil_atasan_penilai) &&
                                                        ($value->jumlah_bawahan_penilai == $value->total_hasil_bawahan_penilai)
                                                    ) {
                                                        echo '1';
                                                    } else {
                                                        echo '0';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->status_kuisioner; ?>
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
                                                            <span class="pulse-ring"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                            <ul class="navi flex-column navi-hover py-2">
                                                                <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                                    Pilih Aksi:
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="<?php echo site_url('employee/employe/report/detail_questionnaire_employee/' . paramEncrypt($value->id_kuisioner)); ?>" class="navi-link">
                                                                        <span class="navi-icon"><i class="fas fa-eye text-warning"></i></span>
                                                                        <span class="navi-text text-warning">Lihat Kuisioner</span>
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
</div>
<!--end::Entry-->
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/features/charts/apexcharts.js">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-result-questionnaire-employee.js">
</script>