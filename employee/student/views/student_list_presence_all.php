<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Absensi Siswa</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Daftar Absensi Siswa</a>
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


    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->

            <!--end::Notice-->
            <?php $user = $this->session->userdata('sias-employee'); ?>
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-11">
                                <div class="row align-items-center">
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query" />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="d-flex align-items-center">                                                  
                                            <select class="form-control" id="kt_datatable_search_gender">
                                                <option value="">Pilih JK</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                                <option value="">Semua</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="d-flex align-items-center">                                                   
                                            <select class="form-control" id="kt_datatable_search_grade_lvl">
                                                <option value="">Pilih Level</option>
                                                <?php if ($user[0]->level_jabatan == 0) { ?>
                                                    <option value="1">KB</option>
                                                    <option value="2">TK</option>
                                                    <option value="3">SD</option>
                                                    <option value="4">SMP</option>
                                                    <option value="5">SMA</option>                                                               
                                                    <option value="">SEMUA</option>
                                                <?php } else { ?>
                                                    <?php if ($user[0]->level_tingkat == 1) { ?>
                                                        <option value="1">KB</option>
                                                        <option value="2">TK</option>
                                                    <?php } elseif ($user[0]->level_tingkat == 3) { ?>
                                                        <option value="3">SD</option>
                                                    <?php } elseif ($user[0]->level_tingkat == 4) { ?>
                                                        <option value="4">SMP</option>
                                                    <?php } elseif ($user[0]->level_tingkat == 5) { ?>
                                                        <option value="5">SMA</option>
                                                    <?php } ?>
                                                    <option value="">SEMUA</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="d-flex align-items-center">                                                   
                                            <select class="form-control" id="kt_datatable_search_grade">
                                                <option value="">Pilih Tingkat</option>
                                                <?php
                                                if (!empty($grade)) {
                                                    foreach ($grade as $key => $value_gra) {
                                                        ?>
                                                        <option value="<?php echo $value_gra->nama_tingkat; ?>"><?php echo strtoupper($value_gra->nama_tingkat); ?></option>                                     
                                                        <?php
                                                    }
                                                }
                                                ?>       
                                                <option value="">SEMUA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="d-flex align-items-center">                                                  
                                            <select class="form-control" id="kt_datatable_search_class">
                                                <option value="">Pilih Kelas</option>
                                                <?php
                                                if (!empty($class)) {
                                                    foreach ($class as $key => $value_clas) {
                                                        ?>
                                                        <option value="<?php echo $value_clas->nama_kelas; ?>"><?php echo strtoupper($value_clas->nama_kelas); ?></option>                                     
                                                        <?php
                                                    }
                                                }
                                                ?>       
                                                <option value="">SEMUA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="d-flex align-items-center">                                                   
                                            <select class="form-control" id="kt_datatable_search_schoolyear">
                                                <option value="">Tahun Ajaran</option>
                                                <?php
                                                if (!empty($schoolyear)) {
                                                    foreach ($schoolyear as $key => $value_sch) {
                                                        ?>
                                                        <option value="<?php echo $value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' (' . $value_sch->semester . ')'; ?>"><?php echo strtoupper($value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' (' . $value_sch->semester . ')'); ?></option>                                     
                                                        <?php
                                                    }
                                                }
                                                ?>       
                                                <option value="">SEMUA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-5">

                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">                                                  
                                            <select class="form-control" id="kt_datatable_search_homeroom">
                                                <option value="">Pilih Wali Kelas</option>
                                                <?php
                                                if (!empty($homeroom)) {
                                                    foreach ($homeroom as $key => $value_sch) {
                                                        ?>
                                                        <option value="<?php echo $value_sch->nama_lengkap; ?>"><?php echo ucwords(strtolower($value_sch->nama_lengkap)); ?></option>                                     
                                                        <?php
                                                    }
                                                }
                                                ?>       
                                                <option value="">Semua</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="d-flex align-items-center">                                                  
                                            <select class="form-control" id="kt_datatable_search_status_presence">
                                                <option value="">Status Absen</option>
                                                <option value="0">Belum Diisi</option>
                                                <option value="1">Sudah Diisi</option>                                               
                                                <option value="">Semua</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2 my-md-0">
                                        <div class="d-flex align-items-center">                                                  
                                            <select class="form-control" id="kt_datatable_search_status_student">
                                                <option value="">Status Siswa</option>
                                                <option value="0">NonAktif</option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Lulus</option>
                                                <option value="3">Keluar</option>
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
                                    <div class="dropdown-menu">
                                        <form class="form" id="frm-excel" action="<?php echo site_url('ppdb/report/export_data_csv'); ?>" method="POST">  
                                            <input type="text" id="id_check_excel" class="form-control" value="" name="data_check" style="display:none">                         
                                            <button class="dropdown-item text-primary" role="button" type="submit"><i class="flaticon2-file-1 text-primary"></i> Export csv</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_presence_academic">
                        <thead>
                            <tr>
                                <th title="#">#</th>
                                <th title="Nama Siswa">Nama Siswa</th>                                                                                         
                                <th title="JK">JK</th>
                                <th title="Level">Level</th>
                                <th title="Tingkat">Tingkat</th>
                                <th title="Kelas">Kelas</th>
                                <th title="Wali Kelas">Wali Kelas</th>
                                <th title="Sakit">Sakit</th>
                                <th title="Izin">Izin</th>
                                <th title="Alpha">Alpha</th>
                                <th title="TA">TA</th>
                                <th title="StatusSiswa">StatusSiswa</th>
                                <th title="Status">Status</th>                                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($presence)) {
                                foreach ($presence as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $value->id_absensi_siswa; ?></td>
                                        <td>
                                            <?php if ($value->foto_siswa_thumb != NULL) { ?>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                                        <img class="" src="<?php echo base_url() . $value->foto_siswa_thumb; ?>" alt="photo">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-dark-75 font-weight-bolder font-size-lg mb-0"><?php echo ucwords($value->nama_siswa); ?></div>
                                                        <a href="#" class="text-muted font-weight-bold text-hover-primary"><?php echo $value->nisn; ?></a>
                                                        <?php if ($value->status_siswa == 0) { ?>
                                                            <span class="label font-weight-bold label-md label-default label-inline">NONAKTIF</span>
                                                        <?php } else if ($value->status_siswa == 1) { ?>
                                                            <span class="label font-weight-bold label-md label-success label-inline">AKTIF</span>
                                                        <?php } else if ($value->status_siswa == 2) { ?>
                                                            <span class="label font-weight-bold label-md label-warning label-inline">LULUS</span>
                                                        <?php } else if ($value->status_siswa == 3) { ?>
                                                            <span class="label font-weight-bold label-md label-danger label-inline">KELUAR</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                        <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr($value->nama_siswa, 0, 1); ?></span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_siswa); ?></div>
                                                        <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->nisn; ?></a>
                                                        <?php if ($value->status_siswa == 0) { ?>
                                                            <span class="label font-weight-bold label-md label-default label-inline">NONAKTIF</span>
                                                        <?php } else if ($value->status_siswa == 1) { ?>
                                                            <span class="label font-weight-bold label-md label-success label-inline">AKTIF</span>
                                                        <?php } else if ($value->status_siswa == 2) { ?>
                                                            <span class="label font-weight-bold label-md label-warning label-inline">LULUS</span>
                                                        <?php } else if ($value->status_siswa == 3) { ?>
                                                            <span class="label font-weight-bold label-md label-danger label-inline">KELUAR</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php echo $value->jenis_kelamin; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->level_tingkat; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->nama_tingkat; ?>
                                        </td>
                                        <td>
                                            <?php echo strtoupper(strtolower($value->nama_kelas)); ?>
                                        </td>
                                        <td>
                                            <?php if ($value->nama_pegawai != NULL || $value->nama_pegawai != "") { ?>
                                                <b><?php echo ucwords(strtolower($value->nama_pegawai)); ?></b>
                                            <?php } else { ?>
                                                <b class="text-danger">Belum Ada</b>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <b><?php echo $value->sakit; ?></b>
                                        </td>
                                        <td>
                                            <b><?php echo $value->izin; ?></b>
                                        </td>
                                        <td>
                                            <b><?php echo $value->alpha; ?></b>
                                        </td>
                                        <td>
                                            <b><?php echo $value->tahun_awal . '/' . $value->tahun_akhir . ' (' . strtoupper(strtolower($value->semester)) . ')'; ?></b>
                                        </td>
                                        <td>
                                            <?php echo $value->status_siswa; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->status_absensi_siswa; ?>
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
            <!--end::Entry-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-presence-academic.js">
</script>