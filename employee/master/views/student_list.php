<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Siswa</h5>
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
                                                <a href="<?php echo site_url('employee/master/student/add_student'); ?>" class="dropdown-item text-success" >
                                                    <i class="flaticon2-add text-success"></i> Tambah
                                                </a>                                               
                                                <a href="<?php echo site_url('employee/master/student/add_student'); ?>" class="dropdown-item text-danger" >
                                                    <i class="flaticon-delete text-danger"></i> Hapus
                                                </a>
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
                                                    <?php echo $value->nama_kelas; ?>
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
                                                                        <span class="navi-icon"><i class="fas fa-eye text-primary"></i></span>
                                                                        <span class="navi-text">Lihat</span>
                                                                    </a>
                                                                </li>
                                                                <?php if ($value->id_kelas == 0) { ?>
                                                                    <li class="navi-item">
                                                                        <a href="#" data-id_siswa="<?php echo paramEncrypt($value->id_siswa); ?>" data-nama_siswa="<?php echo strtoupper($value->nama_lengkap); ?>" data-level_tingkat="<?php echo strtoupper($value->level_tingkat); ?>"  data-toggle="modal" data-target="#modal_choose_class" class="navi-link" >
                                                                            <span class="navi-icon"><i class="fas fa-home text-success"></i></span>
                                                                            <span class="navi-text">Pilih Kelas</span>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                                <li class="navi-item">
                                                                    <a href="<?php echo site_url('/employee/master/student/edit_student/' . paramEncrypt($value->id_siswa)); ?>" class="navi-link" >
                                                                        <span class="navi-icon"><i class="fas fa-pencil-ruler text-warning"></i></span>
                                                                        <span class="navi-text">Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="javascript:act_delete_student('<?php echo paramEncrypt($value->id_siswa); ?>', '<?php echo strtoupper($value->nama_lengkap); ?>', '<?php echo $value->nis; ?>')"  class="navi-link">
                                                                        <span class="navi-icon"><i class="far fa-trash-alt text-danger"></i></span>
                                                                        <span class="navi-text">Hapus</span>
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

<div class="modal fade" id="modal_choose_class" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('employee/master/student/choose_student_class'); ?>" id="kt_form_tingkat">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                <input type="hidden" class="hidden" name="id_siswa" id="id_siswa" value=""/>
                <input type="hidden" class="hidden" name="nama_siswa" id="nama_siswa" value=""/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-1">
                        </div>
                        <div class="col-xl-10">
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <select name="id_kelas" id="pilih_kelas" class="form-control form-control-lg" required="">
                                    <option value="">Pilih Kelas</option>
                                </select> 
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kelas yang ingin dipindahkan</span>               
                            </div>
                        </div>
                        <div class="col-xl-1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success font-weight-bold mr-2">Pindahkan</button>
                    <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-student.js">
</script>
<script>
    var loadedOptions = false;//global variable

    $('#modal_choose_class').on('show.bs.modal', function (e) {
        loadedOptions = false;

        var id_siswa = $(e.relatedTarget).data('id_siswa');
        var nama_siswa = $(e.relatedTarget).data('nama_siswa');
        var level_tingkat = $(e.relatedTarget).data('level_tingkat');

        $(e.currentTarget).find('#title').text('Pilih Siswa "' + nama_siswa + '" Untuk Kelas');
        $(e.currentTarget).find('input[name="id_siswa"]').val(id_siswa);
        $(e.currentTarget).find('input[name="nama_siswa"]').val(nama_siswa);
        $(e.currentTarget).find('select[name="id_kelas"]').attr('onClick', 'choose_class(' + level_tingkat + ')').prop('selectedIndex', 0);
    });

    function choose_class(level_tingkat) {
        if (!loadedOptions) {
            var url = "<?php echo site_url('employee/employe/homeroomteacher/add_ajax_class/'); ?>" + level_tingkat;
            $('#pilih_kelas').load(url, function () {
                loadedOptions = true; //set it to true once request is done
            });
        }
        return false;
    }
</script>
<script>
    function act_delete_student(id, name, nis) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Siswa " + name + " (" + nis + ")?",
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
                    url: "<?php echo site_url("/employee/master/student/delete_student") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Siswa '" + name + "' (" + nis + ") telah terhapus.", "success");
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
                Swal.fire("Dibatalkan!", "Siswa " + name + " batal dihapus.", "error");
            }
        });
    }
</script>