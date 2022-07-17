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
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Notice-->
                            <?php $user = $this->session->userdata('sias-employee'); ?>
                            <!--end::Notice-->
                            <!--begin::Notice-->
                            <?php echo $this->session->flashdata('flash_message'); ?>
                            <!--end::Notice-->
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-body">
                                    <!--begin: Search Form-->
                                    <!--begin::Search Form-->
                                    <div class="mb-7">
                                        <div class="row align-items-center">
                                            <div class="col-lg-11">
                                                <div class="row align-items-center">
                                                    <div class="col-md-3 my-2 my-md-0">
                                                        <div class="input-icon">
                                                            <input type="text" class="form-control" placeholder="Cari..." id="kt_datatable_search_query" />
                                                            <span>
                                                                <i class="flaticon2-search-1 text-muted"></i>
                                                            </span>
                                                        </div>
                                                    </div>                                                   
                                                    <div class="col-md-3 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">                                                          
                                                            <select class="form-control datatable-input" id='kt_datatable_search_month'>
                                                                <option value="">Pilih Bulan</option>
                                                                <option value="Januari">Januari</option>
                                                                <option value="Februari">Februari</option>
                                                                <option value="Maret">Maret</option>
                                                                <option value="April">April</option>
                                                                <option value="Mei">Mei</option>
                                                                <option value="Juni">Juni</option>
                                                                <option value="Juli">Juli</option>
                                                                <option value="Agustus">Agustus</option>
                                                                <option value="September">September</option>
                                                                <option value="Oktober">Oktober</option>
                                                                <option value="November">November</option>
                                                                <option value="Desember">Desember</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">                                                   
                                                            <select class="form-control" id="kt_datatable_search_schoolyear">
                                                                <option value="">Pilih Tahun Ajaran</option>
                                                                <?php
                                                                if (!empty($schoolyear)) {
                                                                    foreach ($schoolyear as $key => $value_sch) {
                                                                        ?>
                                                                        <option value="<?php echo $value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' ' . $value_sch->semester; ?>"><?php echo ($value_sch->tahun_awal . '/' . $value_sch->tahun_akhir . ' ' . $value_sch->semester); ?></option>                                     
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>       
                                                                <option value="">SEMUA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 mt-5 mt-lg-0 text-right">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary font-weight-bold btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form class="form" id="frm-excel" action="<?php echo site_url('employee/report/export/export_present_month_csv'); ?>" method="POST">  
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
                                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_presence_academic_emp_all_month">
                                        <thead>
                                            <tr>
                                                <th title="#">#</th>
                                                <th title="Nama Pegawai">Nama Pegawai</th>
                                                <th title="Hadir Masuk">Hadir Masuk</th>                                          
                                                <th title="Izin Masuk">Izin Masuk</th>
                                                <th title="Alpha Masuk">Alpha Masuk</th>
                                                <th title="Hadir Pulang">Hadir Pulang</th>         
                                                <th title="Izin Pulang">Izin Pulang</th>
                                                <th title="Alpha Pulang">Alpha Pulang</th>
                                                <th title="Telat Pulang">Telat Masuk</th>
                                                <th title="Telat Pulang">Telat Pulang</th>
                                                <th title="Bulan">Bulan</th> 
                                                <th title="TA">TA</th>  

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($present)) {
                                                foreach ($present as $key => $value) {
                                                    ?> 
                                                    <tr>
                                                        <td><?php echo $value->id_pegawai; ?></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                    <img class="" src="<?php echo base_url() . $value->foto_pegawai_thumb; ?>" alt="photo">
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                                    <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->nip; ?></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $value->hadir_masuk; ?></b>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $value->izin_masuk; ?></b>
                                                        </td>
                                                        <td>
                                                            <b class="text-danger"><?php echo $value->alpha_masuk; ?></b>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $value->hadir_pulang; ?></b>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $value->izin_pulang; ?></b>
                                                        </td>
                                                        <td>
                                                            <b class="text-danger"><?php echo $value->alpha_pulang; ?></b>
                                                        </td>
                                                        <td>
                                                            <b class="text-warning"><?php echo $value->telat_masuk; ?></b>
                                                        </td>
                                                        <td>
                                                            <b class="text-warning"><?php echo $value->telat_pulang; ?></b>
                                                        </td>
                                                        <td>
                                                            <b class="text-primary"><?php echo bulanindoSQLnumber($value->bulan); ?></b>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $value->tahun_ajaran; ?></b>
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
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>

            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-employe-presence-all-month.js">
</script>