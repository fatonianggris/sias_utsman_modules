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
                            <a href="" class="text-muted">Daftar Penilaian Personal Pegawai</a>
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
                <div class="col-xl-6">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/patterns/taieri.svg)">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div>
                                <h2 class="text-white font-weight-bolder line-height-lg ">DAFTAR PENILAIAN PERSONAL
                                </h2>
                                <h4 class="text-white font-weight-bolder">
                                    <?php echo strtoupper($questionnaire[0]->nama_kuisioner); ?>
                                </h4>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 13-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-primary gutter-b" style="height: 150px">
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
                                    <div class="text-inverse-success font-weight-bolder font-size-h2">
                                        <?php echo $eval_result_personal[0]->jumlah_personal_penilai; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Total Penilaian Personal</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-danger gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10" />
                                                <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) " />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-success font-weight-bolder font-size-h2">
                                        <?php echo ($eval_result_personal[0]->jumlah_personal_penilai - $eval_result_personal[0]->total_hasil_personal_penilai); ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Penilaian Belum Selesai</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                </div>
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
                                                <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10" />
                                                <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-success font-weight-bolder font-size-h2">
                                        <?php echo $eval_result_personal[0]->total_hasil_personal_penilai; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Penilaian Selesai Terjawab</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                                                    <select class="form-control" id="kt_datatable_search_grade_penilai">
                                                        <option value="">Tingkat Penilai</option>
                                                        <option value="1">DC/KB/TK</option>
                                                        <option value="3">SD</option>
                                                        <option value="4">SMP</option>
                                                        <option value="5">SMA</option>
                                                        <option value="6">UMUM</option>
                                                        <option value="">SEMUA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_grade_dinilai">
                                                        <option value="">Tingkat Dinilai</option>
                                                        <option value="1">DC/KB/TK</option>
                                                        <option value="3">SD</option>
                                                        <option value="4">SMP</option>
                                                        <option value="5">SMA</option>
                                                        <option value="6">UMUM</option>
                                                        <option value="">SEMUA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_type_eval">
                                                        <option value="">Jenis Penilaian</option>
                                                        <option value="0">Personal</option>
                                                        <option value="1">Sejawat</option>
                                                        <option value="2">Atasan</option>
                                                        <option value="3">Bawahan</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_stat">
                                                        <option value="">Status Pengisian</option>
                                                        <option value="0">Belum Diisi</option>
                                                        <option value="1">Sudah Diisi</option>
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
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_evalution_personal">
                                <thead>
                                    <tr>
                                        <th title="Nama Penilai">Nama Penilai</th>
                                        <th title="Jabatan Penilai">Jabatan Penilai</th>
                                        <th title="Tingkat Penilai">Tingkat Penilai</th>
                                        <th title="Nama Dinilai">Nama Dinilai</th>
                                        <th title="Jabatan Dinilai">Jabatan Dinilai</th>
                                        <th title="Tingkat Dinilai">Tingkat Dinilai</th>
                                        <th title="Penilaian">Penilaian</th>
                                        <th title="Status">Status</th>
                                        <th title="Aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($eval_personal)) {
                                        foreach ($eval_personal as $key => $value) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                            <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr(strtoupper($value->nama_penilai), 0, 1); ?></span>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_penilai); ?></div>
                                                            <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->nip_penilai; ?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $value->nama_jabatan_penilai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->tingkat_penilai; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40 symbol-light-default flex-shrink-0">
                                                            <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr(strtoupper($value->nama_yang_dinilai), 0, 1); ?></span>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_yang_dinilai); ?></div>
                                                            <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->nip_yang_dinilai; ?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $value->nama_jabatan_yang_dinilai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->tingkat_yang_dinilai; ?>
                                                </td>
                                                <td>
                                                    0
                                                </td>
                                                <td>
                                                    <?php echo $value->status_hasil_personal; ?>
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
                                                                <?php if ($value->status_hasil_personal == 0) { ?>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon"><i class="fas fa-ban text-danger"></i></span>
                                                                            <span class="navi-text text-danger">Belum Dinilai</span>
                                                                        </a>
                                                                    </li>
                                                                <?php } else { ?>
                                                                    <li class="navi-item">
                                                                        <a href="<?php echo site_url('employee/master/questionnaire/history_evaluation_questionnaire_personal/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($value->id_pegawai_penilai) . "/" . paramEncrypt($value->id_pegawai_yang_dinilai)); ?>" class="navi-link">
                                                                            <span class="navi-icon"><i class="fas fa-eye text-success"></i></span>
                                                                            <span class="navi-text text-success">Lihat Penilian</span>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
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

<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-evaluation-personal.js">
</script>