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
            <?php if ($status_questionnaire) { ?>
            <div class="alert alert-custom alert-light-warning shadow-sm fade show mb-3" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text text-dark">
                    <h4 class="alert-heading font-weight-bolder">Peringatan!</h4>
                    <b>MOHON DIPERHATIKAN!</b>, Penilaian "<b><?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?></b>" Terdapat 3 Kriteria Penilaian <b>(PERSONAL/DIRI, SEJAWAT dan ATASAN)</b>. Silahkan melakukan semua instrument <b>PENGISIAN/PENILAIAN</b> Pegawai sesuai daftar penilian yang ditunjukan/disediakan pada tabel dibawah ini. Terima Kasih.
                </div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            <?php } ?>
            <!--begin::Notice-->
            <?php echo $this->session->flashdata('flash_message'); ?>         
            <!--end::Notice-->
            <?php if ($status_questionnaire) { ?>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $paymentDate = date('Y-m-d');
                $paymentDate = date('Y-m-d', strtotime($paymentDate));

                $contractDateBegin = date('Y-m-d', strtotime(str_replace('/', '-', $status_questionnaire[0]->tgl_mulai)));
                $contractDateEnd = date('Y-m-d', strtotime(str_replace('/', '-', $status_questionnaire[0]->tgl_berakhir)));

                if ($paymentDate >= $contractDateBegin && $paymentDate <= $contractDateEnd) {
                    ?>
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
                                                            <select class="form-control" id="kt_datatable_search_grade">
                                                                <option value="">Pilih Level</option>
                                                                <?php if ($user[0]->level_jabatan == 0) { ?>
                                                                    <option value="1">KB/TK</option>                                                         
                                                                    <option value="3">SD</option>
                                                                    <option value="4">SMP</option>
                                                                    <option value="5">SMA</option>      
                                                                    <option value="6">UMUM</option>       
                                                                    <option value="">SEMUA</option>
                                                                <?php } else { ?>
                                                                    <?php if ($user[0]->level_tingkat == 1) { ?>
                                                                        <option value="1">KB/TK</option>                                                           
                                                                    <?php } elseif ($user[0]->level_tingkat == 3) { ?>
                                                                        <option value="3">SD</option>
                                                                    <?php } elseif ($user[0]->level_tingkat == 4) { ?>
                                                                        <option value="4">SMP</option>
                                                                    <?php } elseif ($user[0]->level_tingkat == 5) { ?>
                                                                        <option value="5">SMA</option>
                                                                    <?php } elseif ($user[0]->level_tingkat == 6) { ?>
                                                                        <option value="6">UMUM</option>
                                                                    <?php } ?>
                                                                    <option value="">SEMUA</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <select class="form-control" id="kt_datatable_search_type_emp">
                                                                <option value="">Status Pegawai</option>
                                                                <option value="1">Tetap</option>
                                                                <option value="2">Tdk Tetap</option>
                                                                <option value="3">Honorer</option>
                                                                <option value="">Semua</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <select class="form-control" id="kt_datatable_search_type_eval">
                                                                <option value="">Jenis Penilaian</option>
                                                                <option value="0">Atasan</option>
                                                                <option value="1">Sejawat</option>
                                                                <option value="2">Personal</option>
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
                                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_question_employee">
                                        <thead>
                                            <tr>

                                                <th title="Nama Pegawai">Nama Pegawai</th>    
                                                <th title="JK">JK</th>
                                                <th title="Jabatan">Jabatan</th>
                                                <th title="Level">Level</th>
                                                <th title="Pegawai">Pegawai</th>
                                                <th title="JP">JP</th>
                                                <th title="Masa Jabatan">Masa Jabatan</th>
                                                <th title="Penilaian">Penilaian</th>
                                                <th title="Status">Status</th>                                 
                                                <th title="Aksi">Aksi</th>                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($user[0]->level_jabatan != 0) { ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr(strtoupper($user[0]->nama_lengkap), 0, 1); ?></span>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($user[0]->nama_lengkap); ?></div>
                                                                <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $user[0]->nip; ?></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo $user[0]->jenis_kelamin; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $user[0]->nama_jabatan; ?>
                                                    </td>                                               
                                                    <td>
                                                        <?php echo $user[0]->level_tingkat; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $user[0]->jenis_pegawai; ?>
                                                    </td>
                                                    <td>
                                                        <b><?php echo $user[0]->jam_pelajaran; ?> Jam</b>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            <?php
                                                            $now = time(); // or your date as well
                                                            $newDate = date("Y-m-d", strtotime(str_replace('/', '-', $user[0]->tanggal_masuk)));
                                                            $your_date = strtotime($newDate);
                                                            $datediff = $now - $your_date;

                                                            $masa_jabatan = round($datediff / (60 * 60 * 24));
                                                            ?>
                                                            <?php echo $masa_jabatan; ?> hari
                                                        </b>
                                                    </td>
                                                    <td>
                                                        2
                                                    </td>
                                                    <td>
                                                        <?php if ($personal[0]->status_penilaian_personal == 0) { ?>
                                                            0
                                                        <?php } else { ?>
                                                            1
                                                        <?php } ?>
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
                                                                    <?php if ($personal[0]->status_penilaian_personal == 0) { ?>
                                                                        <li class="navi-item">
                                                                            <a href="<?php echo site_url('employee/employe/report/eval_questionnaire_personal/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($user[0]->id_pegawai)); ?>" class="navi-link" >
                                                                                <span class="navi-icon"><i class="fas fa-pencil-alt text-success"></i></span>
                                                                                <span class="navi-text text-success">Nilai Kuisioner</span>
                                                                            </a>
                                                                        </li>
                                                                    <?php } else { ?>
                                                                        <li class="navi-item">
                                                                            <a href="<?php echo site_url('employee/employe/report/detail_questionnaire_personal/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($user[0]->id_pegawai)); ?>" class="navi-link" >
                                                                                <span class="navi-icon"><i class="fas fa-eye text-warning"></i></span>
                                                                                <span class="navi-text text-warning">Lihat Penilian</span>
                                                                            </a>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> 
                                            <?php } ?>
                                            <?php
                                            if (!empty($employe)) {
                                                foreach ($employe as $key => $value) {
                                                    ?> 
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                    <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr(strtoupper($value->nama_lengkap), 0, 1); ?></span>
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                                    <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->nip; ?></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php echo $value->jenis_kelamin; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value->hasil_nama_jabatan; ?>
                                                        </td>                                               
                                                        <td>
                                                            <?php echo $value->level_tingkat; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value->jenis_pegawai; ?>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $value->jam_pelajaran; ?> Jam</b>
                                                        </td>
                                                        <td>
                                                            <b>
                                                                <?php
                                                                $now = time(); // or your date as well
                                                                $newDate = date("Y-m-d", strtotime(str_replace('/', '-', $value->tanggal_masuk)));
                                                                $your_date = strtotime($newDate);
                                                                $datediff = $now - $your_date;

                                                                $masa_jabatan = round($datediff / (60 * 60 * 24));
                                                                ?>
                                                                <?php echo $masa_jabatan; ?> hari
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <?php if ($user[0]->id_jabatan == 1 || $user[0]->id_jabatan == 6 || $user[0]->id_jabatan == 11 || $user[0]->id_jabatan == 26) { ?>
                                                                0
                                                            <?php } else { ?>
                                                                1
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($user[0]->id_jabatan == 1 || $user[0]->id_jabatan == 6 || $user[0]->id_jabatan == 11 || $user[0]->id_jabatan == 26) { ?>
                                                                <?php echo $value->status_penilaian_atasan; ?>
                                                            <?php } else { ?>
                                                                <?php echo $value->status_penilaian_sejawat; ?>
                                                            <?php } ?>
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
                                                                        <?php if ($user[0]->level_jabatan == 0 || $user[0]->id_jabatan == 1 || $user[0]->id_jabatan == 6 || $user[0]->id_jabatan == 11) { ?>
                                                                            <?php if ($value->status_penilaian_atasan == 0) { ?>
                                                                                <li class="navi-item">
                                                                                    <a href="<?php echo site_url('employee/employe/report/eval_questionnaire_leader/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($value->id_pegawai)); ?>" class="navi-link" >
                                                                                        <span class="navi-icon"><i class="fas fa-pencil-alt text-success"></i></span>
                                                                                        <span class="navi-text text-success">Nilai Kuisioner</span>
                                                                                    </a>
                                                                                </li>
                                                                            <?php } else { ?>
                                                                                <li class="navi-item">
                                                                                    <a href="<?php echo site_url('employee/employe/report/detail_questionnaire_leader/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($value->id_pegawai)); ?>" class="navi-link" >
                                                                                        <span class="navi-icon"><i class="fas fa-eye text-warning"></i></span>
                                                                                        <span class="navi-text text-warning">Lihat Penilian</span>
                                                                                    </a>
                                                                                </li>
                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            <?php if ($value->status_penilaian_sejawat == 0) { ?>
                                                                                <li class="navi-item">
                                                                                    <a href="<?php echo site_url('employee/employe/report/eval_questionnaire_friend/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($value->id_pegawai)); ?>" class="navi-link" >
                                                                                        <span class="navi-icon"><i class="fas fa-pencil-alt text-success"></i></span>
                                                                                        <span class="navi-text text-success">Nilai Kuisioner</span>
                                                                                    </a>
                                                                                </li>
                                                                            <?php } else { ?>
                                                                                <li class="navi-item">
                                                                                    <a href="<?php echo site_url('employee/employe/report/detail_questionnaire_friend/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($value->id_pegawai)); ?>" class="navi-link" >
                                                                                        <span class="navi-icon"><i class="fas fa-eye text-warning"></i></span>
                                                                                        <span class="navi-text text-warning">Lihat Penilian</span>
                                                                                    </a>
                                                                                </li>
                                                                            <?php } ?>
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
                <?php } else { ?>
                    <div class="card card-custom" >
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
            <?php } else { ?>
                <div class="card card-custom" >
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
    <!--end::Entry-->
</div>

<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-question-employe-eval.js">
</script>