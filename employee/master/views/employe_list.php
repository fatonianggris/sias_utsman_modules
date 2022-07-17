<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Pegawai</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Daftar Pegawai</a>
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
                                                        <option value="">Pilih Pegawai</option>
                                                        <option value="1">Tetap</option>
                                                        <option value="2">Tdk Tetap</option>
                                                        <option value="3">Honorer</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_position">
                                                        <option value="">Pilih Jabatan</option>
                                                        <?php
                                                        if (!empty($position)) {
                                                            foreach ($position as $key => $value_pos) {
                                                                ?>
                                                                <option value="<?php echo $value_pos->hasil_nama_jabatan; ?>"><?php echo strtoupper($value_pos->hasil_nama_jabatan); ?></option>                                     
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
                                                <a href="<?php echo site_url('employee/master/employe/add_employe'); ?>" class="dropdown-item text-success" >
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
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_employee">
                                <thead>
                                    <tr>
                                        <th title="#">#</th>
                                        <th title="Nama Pegawai">Nama Pegawai</th>
                                        <th title="NIP">NIP</th>                                          
                                        <th title="JK">JK</th>
                                        <th title="Jabatan">Jabatan</th>
                                        <th title="Level">Level</th>
                                        <th title="Pegawai">Pegawai</th>
                                        <th title="JP">JP</th>
                                        <th title="Masa Jabatan">Masa Jabatan</th>
                                        <th title="Nomor HP">Nomor HP</th>
                                        <th title="Aksi">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($employe)) {
                                        foreach ($employe as $key => $value) {
                                            ?> 
                                            <tr>
                                                <td><?php echo $value->id_pegawai; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40 symbol-light-info flex-shrink-0">
                                                            <span class="symbol-label font-size-h4 font-weight-bold"><?php echo substr($value->nama_lengkap, 0, 1); ?></span>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-dark-75 font-weight-bolder  mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                            <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->email; ?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $value->nip; ?></td>
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
                                                    <?php echo $value->jam_pelajaran; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $now = time(); // or your date as well
                                                    $newDate = date("Y-m-d", strtotime(str_replace('/', '-', $value->tanggal_masuk)));
                                                    $your_date = strtotime($newDate);
                                                    $datediff = $now - $your_date;

                                                    $masa_jabatan = round($datediff / (60 * 60 * 24));
                                                    ?>
                                                    <?php echo $masa_jabatan; ?> hari
                                                </td>
                                                <td>
                                                    0<?php echo $value->nomor_hp; ?>
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
                                                                    <a href="<?php echo site_url('/employee/master/employe/edit_employe/' . paramEncrypt($value->id_pegawai)); ?>" class="navi-link" >
                                                                        <span class="navi-icon"><i class="la la-edit text-success"></i></span>
                                                                        <span class="navi-text">Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="javascript:act_delete_employe('<?php echo paramEncrypt($value->id_pegawai); ?>', '<?php echo strtoupper($value->nama_lengkap); ?>', '<?php echo $value->nip; ?>')"  class="navi-link">
                                                                        <span class="navi-icon"><i class="la la-close text-danger"></i></span>
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
                            <!--end: Datatable-->
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
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-employe.js">
</script>
<script>
    function act_delete_employe(id, name, nip) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Pegawai " + name + " (" + nip + ")?",
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
                    url: "<?php echo site_url("/employee/master/employe/delete_employe") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Pegawai '" + name + "' (" + nip + ") telah terhapus.", "success");
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
                Swal.fire("Dibatalkan!", "Pegawai " + name + " batal dihapus.", "error");
            }
        });
    }
</script>