<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Absensi Anda</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Daftar Absensi Anda</a>
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
                                                    <div class="col-md-2 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <select class="form-control" id="kt_datatable_search_in">
                                                                <option value="">Status Masuk</option> 
                                                                <option value="0">Belum</option> 
                                                                <option value="1">Hadir</option>                                                              
                                                                <option value="2">Izin</option>                                                              
                                                                <option value="3">Alpha</option>
                                                                <option value="">Semua</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <select class="form-control" id="kt_datatable_search_out">
                                                                <option value="">Status Pulang</option>  
                                                                <option value="0">Belum</option> 
                                                                <option value="1">Hadir</option>                                                               
                                                                <option value="2">Izin</option>                                                              
                                                                <option value="3">Alpha</option>
                                                                <option value="">Semua</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 my-2 my-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <input type="text" class="form-control" placeholder="Inpukan Tanggal" id="kt_datatable_search_date" readonly=""/>

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
                                                                        <option value="<?php echo $value_sch->tahun_awal . '/' . $value_sch->tahun_akhir; ?>"><?php echo strtoupper($value_sch->tahun_awal . '/' . $value_sch->tahun_akhir); ?></option>                                     
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
                                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_presence_academic_emp">
                                        <thead>
                                            <tr>
                                                <th title="#">#</th>
                                                <th title="Nama Pegawai">Nama Pegawai</th>
                                                <th title="StatusMasuk">StatusMasuk</th>                                          
                                                <th title="Waktu Masuk">Waktu Masuk</th>
                                                <th title="Telat Masuk">Telat Masuk</th>
                                                <th title="StatusPulang">StatusPulang</th>         
                                                <th title="Waktu Pulang">Waktu Pulang</th>
                                                <th title="Telat Pulang">Telat Pulang</th>
                                                <th title="Tanggal">Tanggal</th> 
                                                <th title="TA">TA</th>   
                                                <th title="Aksi">Aksi</th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($present)) {
                                                foreach ($present as $key => $value) {
                                                    ?> 
                                                    <tr>
                                                        <td><?php echo $value->id_absensi_pegawai; ?></td>
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
                                                            <?php echo $value->status_absensi_masuk; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($value->jam_masuk == NULL or $value->jam_masuk == "") { ?>
                                                                00:00
                                                            <?php } else { ?>
                                                                <?php echo $value->jam_masuk; ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($value->jam_masuk_telat == NULL or $value->jam_masuk_telat == "") { ?>
                                                                0 Menit
                                                            <?php } else { ?>
                                                                <?php echo $value->jam_masuk_telat; ?> Menit
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value->status_absensi_pulang; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($value->jam_pulang == NULL or $value->jam_pulang == "") { ?>
                                                                00:00
                                                            <?php } else { ?>
                                                                <?php echo $value->jam_pulang; ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($value->jam_pulang_telat == NULL or $value->jam_pulang_telat == "") { ?>
                                                                0 Menit
                                                            <?php } else { ?>
                                                                <?php echo $value->jam_pulang_telat; ?> Menit
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $value->tgl_format; ?></b>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $value->tahun_awal; ?>/<?php echo $value->tahun_akhir; ?></b>
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
                                                                        <li class="navi-item">
                                                                            <a href="<?php echo site_url('employee/employe/presence/detail_employe_presence/' . paramEncrypt($value->id_absensi_pegawai)); ?>" class="navi-link" >
                                                                                <span class="navi-icon"><i class="fas fa-eye text-success"></i></span>
                                                                                <span class="navi-text font-weight-normal">Lihat Detail</span>
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
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>

            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-employe-presence-personal.js">
</script>