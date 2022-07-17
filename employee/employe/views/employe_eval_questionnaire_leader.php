<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Penilaian</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Atur Penilaian Pegawai</a>
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
                                        <?php if ($penilaian[0]->status_penilaian_atasan == 1) { ?>
                                            <span class="label label-sm label-light-success label-inline font-weight-bolder mr-2">TELAH DIISI</span>
                                        <?php } else { ?>
                                            <span class="label label-sm label-light-danger label-inline font-weight-bolder mr-2">BELUM DIISI</span>
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
                <div class=" col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-6" >
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

                    </div>

                </div>
                <div class=" col-xl-6">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center">
                            <div>
                                <h4 class="text-danger font-weight-bolder line-height-md mt-2">Keterangan Penilaian
                                </h4>
                                <p class="text-dark-75 font-size-sm font-weight-normal">
                                    <?php echo ucfirst(strtolower($questionnaire[0]->keterangan)); ?>
                                </p>

                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 13--> 
                </div>
                <div class="col-xl-12 text-center">
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact py-3" id="kt_form">
                        <div class="card-header card-title pt-2" style="justify-content: center">
                            <h2 class="card-label font-size-h2 text-center font-weight-bolder">KUISIONER PENILAIAN OLEH PIMPINAN
                                <span class="text-warning pt-2 font-size-h6 font-weight-bolder d-block"><b class="text-dark-75">PEGAWAI YANG DINILAI </b> "<?php echo strtoupper(strtolower($id_pegawai[0]->nama_lengkap)); ?>"-(<?php echo (($id_pegawai[0]->nip)); ?>)</span>
                                <div class="text-center mt-2">
                                    <div class="align-items-center font-size-sm">
                                        <span class="label label-sm label-light-success label-inline font-weight-bolder mr-2"><?php echo TanggalIndo(($questionnaire[0]->tgl_mulai)); ?></span>
                                        sampai
                                        <span class="label label-sm label-light-danger label-inline font-weight-bolder ml-2"><?php echo TanggalIndo(($questionnaire[0]->tgl_berakhir)); ?></span>
                                    </div>
                                </div>
                            </h2>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="POST" action="<?php echo site_url('employee/employe/report/post_eval_questionnaire_leader/' . paramEncrypt($questionnaire[0]->id_kuisioner) . "/" . paramEncrypt($id_pegawai[0]->id_pegawai)); ?>" enctype="multipart/form-data"  id="kt_form_eval_question">
                            <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="card-body">                             
                                <div class="mb-0">
                                    <div class="mb-0">
                                        <div class=" row fv-plugins-icon-container ">
                                            <div class="col-lg-1 text-right">
                                                <label class="font-weight-bolder font-size-h5 ">No.</label>
                                            </div>
                                            <div class="col-lg-9 text-center">
                                                <label class="font-weight-bolder font-size-h5 ">KOMPETENSI</label>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <label class="font-weight-bolder font-size-h5 ">NILAI</label>
                                            </div>
                                        </div>
                                        <div class="alert alert-warning font-size-h6 font-weight-bolder text-left pl-13" role="alert">
                                            A. PENDAGOGIK
                                        </div>
                                        <?php
                                        $no = 1;
                                        if (!empty($question)) {
                                            foreach ($question as $key => $value) {
                                                if ($value->tipe_pertanyaan == 1) {
                                                    ?> 
                                                    <div class="form-group row fv-plugins-icon-container ">
                                                        <div class="col-lg-1 text-right">
                                                            <label class="font-weight-bolder font-size-h3"><?php echo $no . "."; ?></label>
                                                        </div>
                                                        <div class="col-lg-9 text-center">
                                                            <textarea name="isi[]" class="form-control form-control-lg font-weight-bold" style="resize: none;" readonly=""><?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?></textarea>
                                                            <input type="hidden" class="hidden" name="soal[]" value="<?php echo $value->id_pertanyaan; ?>">
                                                        </div>
                                                        <div class="col-lg-2 text-center">
                                                            <input type="text" name="jawaban[]" class="form-control form-control-lg form-control-solid" placeholder="Isikan Nilai" >
                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>antara 1-40</span>
                                                        </div>
                                                    </div>   
                                                    <?php
                                                    $no++;
                                                }
                                            }  //ngatur nomor urut
                                        }
                                        ?>          
                                        <div class="alert alert-warning font-size-h6 font-weight-bolder text-left pl-13" role="alert">
                                            B. KEPRIBADIAN
                                        </div>
                                        <?php
                                        if (!empty($question)) {
                                            foreach ($question as $key => $value) {
                                                if ($value->tipe_pertanyaan == 2) {
                                                    ?> 
                                                    <div class="form-group row fv-plugins-icon-container ">
                                                        <div class="col-lg-1 text-right">
                                                            <label class="font-weight-bolder font-size-h3"><?php echo $no . "."; ?></label>
                                                        </div>
                                                        <div class="col-lg-9 text-center">
                                                            <textarea name="isi[]" class="form-control form-control-lg font-weight-bold" style="resize: none;" readonly=""><?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?></textarea>
                                                            <input type="hidden" class="hidden" name="soal[]" value="<?php echo $value->id_pertanyaan; ?>">
                                                        </div>
                                                        <div class="col-lg-2 text-center">
                                                            <input type="text" name="jawaban[]" class="form-control form-control-lg form-control-solid" placeholder="Isikan Nilai" >
                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>antara 1-40</span>
                                                        </div>
                                                    </div>   
                                                    <?php
                                                    $no++;
                                                }
                                            }  //ngatur nomor urut
                                        }
                                        ?>   
                                        <div class="alert alert-warning font-size-h6 font-weight-bolder text-left pl-13" role="alert">
                                            C. SOSIAL
                                        </div>
                                        <?php
                                        if (!empty($question)) {
                                            foreach ($question as $key => $value) {
                                                if ($value->tipe_pertanyaan == 3) {
                                                    ?> 
                                                    <div class="form-group row fv-plugins-icon-container ">
                                                        <div class="col-lg-1 text-right">
                                                            <label class="font-weight-bolder font-size-h3"><?php echo $no . "."; ?></label>
                                                        </div>
                                                        <div class="col-lg-9 text-center">
                                                            <textarea name="isi[]" class="form-control form-control-lg font-weight-bold" style="resize: none;" readonly=""><?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?></textarea>
                                                            <input type="hidden" class="hidden" name="soal[]" value="<?php echo $value->id_pertanyaan; ?>">
                                                        </div>
                                                        <div class="col-lg-2 text-center">
                                                            <input type="text" name="jawaban[]" class="form-control form-control-lg form-control-solid" placeholder="Isikan Nilai" >
                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>antara 1-40</span>
                                                        </div>
                                                    </div>   
                                                    <?php
                                                    $no++;
                                                }
                                            }  //ngatur nomor urut
                                        }
                                        ?>       
                                        <div class="alert alert-warning font-size-h6 font-weight-bolder text-left pl-13" role="alert">
                                            D. PROFESIONAL
                                        </div>
                                        <?php
                                        if (!empty($question)) {
                                            foreach ($question as $key => $value) {
                                                if ($value->tipe_pertanyaan == 4) {
                                                    ?> 
                                                    <div class="form-group row fv-plugins-icon-container ">
                                                        <div class="col-lg-1 text-right">
                                                            <label class="font-weight-bolder font-size-h3"><?php echo $no . "."; ?></label>
                                                        </div>
                                                        <div class="col-lg-9 text-center">
                                                            <textarea name="isi[]" class="form-control form-control-lg font-weight-bold" style="resize: none;" readonly=""><?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?></textarea>
                                                            <input type="hidden" class="hidden" name="soal[]" value="<?php echo $value->id_pertanyaan; ?>">
                                                        </div>
                                                        <div class="col-lg-2 text-center">
                                                            <input type="text" name="jawaban[]" class="form-control form-control-lg form-control-solid" placeholder="Isikan Nilai" >
                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>antara 1-40</span>
                                                        </div>
                                                    </div>   
                                                    <?php
                                                    $no++;
                                                }
                                            }  //ngatur nomor urut
                                        }
                                        ?>     
                                        <div class="alert alert-warning font-size-h6 font-weight-bolder text-left pl-13" role="alert">
                                            E. SPIRITUAL & KARAKTER
                                        </div>
                                        <?php
                                        if (!empty($question)) {
                                            foreach ($question as $key => $value) {
                                                if ($value->tipe_pertanyaan == 5) {
                                                    ?> 
                                                    <div class="form-group row fv-plugins-icon-container ">
                                                        <div class="col-lg-1 text-right">
                                                            <label class="font-weight-bolder font-size-h3"><?php echo $no . "."; ?></label>
                                                        </div>
                                                        <div class="col-lg-9 text-center">
                                                            <textarea name="isi[]" class="form-control form-control-lg font-weight-bold" style="resize: none;" readonly=""><?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?></textarea>
                                                            <input type="hidden" class="hidden" name="soal[]" value="<?php echo $value->id_pertanyaan; ?>">
                                                        </div>
                                                        <div class="col-lg-2 text-center">
                                                            <input type="text" name="jawaban[]" class="form-control form-control-lg form-control-solid" placeholder="Isikan Nilai" >
                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>antara 1-40</span>
                                                        </div>
                                                    </div>   
                                                    <?php
                                                    $no++;
                                                }
                                            }  //ngatur nomor urut
                                        }
                                        ?>       
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button id="kt_login_signin_submit" class="btn btn-success font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Entry-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-eval-questionnaire.js">
</script>