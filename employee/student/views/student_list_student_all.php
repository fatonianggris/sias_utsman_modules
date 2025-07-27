<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Akedemik Siswa</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Daftar Siswa</a>
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
                    <!--begin::Notice-->
                    <?php echo $this->session->flashdata('flash_message'); ?>
                    <?php $user = $this->session->userdata('sias-employee'); ?>
                    <!--end::Notice-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-11 col-xl-10">
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

                                        </div>
                                        <div class="row align-items-center mt-5">
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                   
                                                    <select class="form-control" id="kt_datatable_search_track">
                                                        <option value="">Pilih Jalur</option>
                                                        <option value="1">Reguler</option>
                                                        <option value="2">ICP</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">                                                  
                                                    <select class="form-control" id="kt_datatable_search_status">
                                                        <option value="">Status Siswa</option>                                                       
                                                        <option value="0">NonAktif</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="2">Lulus</option>
                                                        <option value="3">Keluar</option>
                                                        <option value="">Semua</option>
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
                                    </div>
                                    <div class="col-lg-1 col-xl-2 mt-5 mt-lg-0 text-right">
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
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_student">
                                <thead>
                                    <tr>
                                        <th title="#">#</th>
                                        <th title="Nama Siswa">Nama Siswa</th>
                                        <th title="NISN">NISN</th>                                          
                                        <th title="JK">JK</th>
                                        <th title="Level">Level</th>
                                        <th title="Tingkat">Tingkat</th>
                                        <th title="Jalur">Jalur</th> 
                                        <th title="Kelas">Kelas</th>
                                        <th title="Status">Status</th>
                                        <th title="TA">TA</th>
                                        <th title="Aksi">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($student)) {
                                        foreach ($student as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td><?php echo $value->id_siswa; ?></td>
                                                <td>
                                                    <?php if ($value->foto_siswa_thumb != NULL) { ?>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                                                <img class="" src="<?php echo base_url() . $value->foto_siswa_thumb; ?>" alt="photo">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                                <a href="#" class="text-muted font-weight-bold text-hover-primary"><?php echo $value->email; ?></a>

                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                                <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr($value->nama_lengkap, 0, 1); ?></span>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                                <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->email; ?></a>

                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $value->nisn; ?></td>
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
                                                    <?php echo $value->jalur; ?>
                                                </td>
                                                <td>
                                                    <?php echo strtoupper(strtolower($value->nama_kelas)); ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->status_siswa; ?>
                                                </td>
                                                <td>
                                                    <b><?php echo $value->tahun_ajaran; ?> (<?php echo strtoupper(strtolower($value->semester)); ?>)</b>
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
                                                                    <a href="<?php echo site_url('/employee/student/student/detail_student/' . paramEncrypt($value->id_siswa)); ?>" class="navi-link" >
                                                                        <span class="navi-icon"><i class="fa fa-eye text-success"></i></span>
                                                                        <span class="navi-text font-weight-bold">Lihat</span>
                                                                    </a>
                                                                </li>
                                                                <?php if ($value->status_siswa == 2) { ?>
                                                                    <li class="navi-item">
                                                                        <a href="#" data-toggle="modal" data-target="#modal_register_student" onclick="reg_class('<?php echo $value->level_tingkat; ?>', '<?php echo paramEncrypt($value->id_siswa); ?>')" class="navi-link" >
                                                                            <span class="navi-icon"><i class="fas fa-home text-primary"></i></span>
                                                                            <span class="navi-text font-weight-bold"> Datfarkan Kelas</span>
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
                        </div>
                    </div>
                    <!--end::Entry-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
    <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
</div>
<div class="modal fade" id="modal_register_student" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Daftar Ulang Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('employee/student/student/register_student_class'); ?>"  id="kt_form_tingkat">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="id_siswa" class="hidden" name="id_siswa" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-1">
                        </div>
                        <div class="col-xl-10">
                            <div class="form-group">
                                <label>Masukkan ke Tingkat</label>
                                <select name="id_tingkat" id="kelas" class="form-control form-control-lg">
                                </select> 
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Tingkat yang ingin ditujukan ke Siswa</span>               
                            </div>
                        </div>
                        <div class="col-xl-1">
                        </div>
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
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-student-academic.js">
</script>

<script type="text/javascript">
    function reg_class(level_tingkat, id_siswa) {
        $('#id_siswa').val(id_siswa)
        var url = "<?php echo site_url('employee/student/student/add_ajax_grade/'); ?>" + level_tingkat;
        $('#kelas').load(url);
    }
</script>