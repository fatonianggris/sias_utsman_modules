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
                            <a href="" class="text-muted">Detail Penilaian Pegawai</a>
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
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom" style="height: 150px;">
                        <!--begin::Body-->
                        <div class="card-body pt-5">                          
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h6 text-dark-75 text-hover-primary">
                                        <?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?>
                                        <?php if ($questionnaire[0]->tipe_penilaian == 1) { ?>
                                            <span class="label label-sm label-light-primary label-inline font-weight-bolder ml-1">
                                                FORMATIF
                                            </span>
                                        <?php } else if ($questionnaire[0]->tipe_penilaian == 2) { ?>
                                            <span class="label label-sm label-light-success label-inline font-weight-bolder ml-1">
                                                SUMATIF
                                            </span>
                                        <?php } else if ($questionnaire[0]->tipe_penilaian == 3) { ?>
                                            <span class="label label-sm label-light-warning label-inline font-weight-bolder ml-1">
                                                KEMAJUAN
                                            </span>
                                        <?php } ?>
                                    </a>
                                    <div class="text-warning font-size-xs mt-1 font-weight-bold">
                                        <?php echo (($questionnaire[0]->deskripsi_kuisioner)); ?>
                                    </div>

                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class=" col-xl-4">
                    <div class="row">
                        <div class="col-xl-6 col-6" >
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000"/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">
                                        <?php echo $total_question[0]->total_pertanyaan; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Total Pertanyaan</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                        <div class="col-xl-6 col-6">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom bg-primary gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-white font-weight-bolder font-size-h2 mt-3">
                                        <?php echo $total_question[0]->total_penilaian_done; ?>/ <?php echo $total_question[0]->total_penilaian; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Kuisioner Ternilai</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                    </div>

                </div>
                <div class=" col-xl-4">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center">
                            <div>
                                <h4 class="text-dark-75 font-weight-bolder line-height-lg mt-2">Keterangan
                                </h4>
                                <p class="text-dark-75 font-size-sm font-weight-normal">
                                    <?php
                                    $words = explode(" ", $questionnaire[0]->keterangan);
                                    $limit_word = implode(" ", array_splice($words, 0, 11));
                                    ?>
                                    <?php echo ucfirst(strtolower($limit_word)); ?>
                                </p>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-7">
                                        <span class="font-weight-bold font-size-sm  mr-4">Mulai</span>
                                        <span class="label label-sm label-light-success label-inline font-weight-bolder"><?php echo TanggalIndo(($questionnaire[0]->tgl_mulai)); ?></span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-bold font-size-sm mr-4">Berakhir</span>
                                        <span class="label label-sm label-light-danger label-inline font-weight-bolder"><?php echo TanggalIndo(($questionnaire[0]->tgl_berakhir)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 13--> 
                </div>
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
                                                    <select class="form-control" id="kt_datatable_search_personal">
                                                        <option value="">Status Personal</option>
                                                        <option value="0">Belum Diisi</option>
                                                        <option value="1">Sudah Diisi</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_sejawat">
                                                        <option value="">Status Sejawat</option>
                                                        <option value="0">Belum Diisi</option>
                                                        <option value="1">Sudah Diisi</option>
                                                        <option value="">Semua</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mt-5">                     
                                            <div class="col-md-2 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" id="kt_datatable_search_atasan">
                                                        <option value="">Status Atasan</option>
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
                                            <div class="dropdown-menu">                                               
                                                <a href="#" data-toggle="modal" data-target="#modal_list_question"  class="dropdown-item text-primary">
                                                    <i class="fas fa-eye text-primary"></i> List Soal
                                                </a>                                              

                                            </div>
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
                                        <th title="Jabatan">Jabatan</th>
                                        <th title="Nama Penilai">Nama Penilai</th>
                                        <th title="Level">Level</th>
                                        <th title="Pegawai">Pegawai</th>
                                        <th title="Personal">Personal</th>
                                        <th title="Sejawat">Sejawat</th>
                                        <th title="Atasan">Atasan</th>
                                        <th title="Aksi">Aksi</th>                                           
                                    </tr>
                                </thead>
                                <tbody>
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
                                                            <div class="text-dark-75 font-weight-bolder mb-0"><?php echo ucwords($value->nama_lengkap); ?></div>
                                                            <a href="#" class="text-muted font-weight-bold font-size-xs text-hover-primary"><?php echo $value->nip; ?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo ucwords(strtolower($value->hasil_nama_jabatan)); ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->nama_penilai == NULL || $value->nama_penilai == "") { ?>
                                                        <?php if ($user[0]->level_jabatan == 0 && $value->id_jabatan == 1 || $value->id_jabatan == 6 || $value->id_jabatan == 11) { ?>
                                                            <b class="text-dark-75">Admin</b>
                                                        <?php } else { ?>
                                                            <b class="text-danger">BELUM DIPILIH</b>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <b><?php echo ucwords(strtolower($value->nama_penilai)); ?></b>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->level_tingkat; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->jenis_pegawai; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->status_penilaian_personal; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->status_penilaian_sejawat; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->status_penilaian_atasan; ?>
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
                                                                    <a href="<?php echo site_url('employee/employe/report/detail_result_questionnaire_all/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($value->id_pegawai_asli)) ?>" class="navi-link" >
                                                                        <span class="navi-icon"><i class="fas fa-eye text-primary"></i></span>
                                                                        <span class="navi-text text-primary">Lihat Hasil</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="<?php echo site_url('employee/report/export/print_eval_employe/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($value->id_pegawai_asli)) ?>" class="navi-link" >
                                                                        <span class="navi-icon"><i class="fas fa-file text-warning"></i></span>
                                                                        <span class="navi-text text-warning">Rapor Nilai.pdf</span>
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
</div>

<div class="modal fade" id="modal_list_question" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">                                
                <div class="timeline timeline-3">
                    <div class="timeline-items">
                        <?php
                        if (!empty($question)) {
                            foreach ($question as $key => $value) {
                                ?> 
                                <div class="timeline-item">
                                    <div class="timeline-media">
                                        <i class="flaticon2-talk text-primary"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="">        
                                                <?php if ($value->tipe_pertanyaan == 1) { ?>
                                                    <span class="label label-light-info font-weight-bolder label-inline">Pendagogik</span>

                                                <?php } else if ($value->tipe_pertanyaan == 2) { ?>
                                                    <span class="label label-light-primary font-weight-bolder label-inline">Kepribadian</span>

                                                <?php } else if ($value->tipe_pertanyaan == 3) { ?>
                                                    <span class="label label-light-success font-weight-bolder label-inline">Sosial</span>

                                                <?php } else if ($value->tipe_pertanyaan == 4) { ?>
                                                    <span class="label label-light-warning font-weight-bolder label-inline">Profesional</span>

                                                <?php } else if ($value->tipe_pertanyaan == 5) { ?>
                                                    <span class="label label-light-danger font-weight-bolder label-inline">Spiritual & Karakter</span>

                                                <?php } ?>
                                            </div>
                                        </div>
                                        <p class="p-0">
                                            <?php echo ucwords(strtolower($value->isi_pertanyaan)); ?>
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="mr-2">
                                                <a href="#" class="text-warning text-hover-primary font-weight-bold">
                                                    <li class="fas fa-comment-alt"></li> Keterangan
                                                </a>
                                                <p class="p-0">
                                                    <?php echo ucfirst(strtolower($value->deskripsi_pertanyaan)); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }  //ngatur nomor urut
                        }
                        ?>          
                    </div>
                </div>
            </div>
            <div class="modal-footer">              
                <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-question-employe.js">
</script>
