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
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom" style="height: 150px;">
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h4 text-dark-75 text-hover-primary mt-2">
                                        <?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?><br>
                                        <?php if (@$result_eval[0]->hasil_nilai_personal >= 1) { ?>
                                            <span class="label label-md label-light-success label-inline font-weight-bolder mr-2">SUDAH DINILAI</span>
                                        <?php } else { ?>
                                            <span class="label label-md label-light-danger label-inline font-weight-bolder mr-2">BELUM DINILAI</span>
                                        <?php } ?>
                                    </a>
                                    <div class="text-warning font-size-sm mt-2 font-weight-bold">
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
                        <div class="col-xl-12 col-6">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-success gutter-b" style="height: 150px">
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
                                    <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3">
                                        <?php echo $total_question; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Total Pertanyaan</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                </div>
                <!--begin::Content-->
                <div class=" col-xl-2">
                    <div class="row">
                        <div class="col-xl-12 col-6">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-danger gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="7" y="4" width="10" height="4" />
                                                <path d="M7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,20 C19,21.1045695 18.1045695,22 17,22 L7,22 C5.8954305,22 5,21.1045695 5,20 L5,4 C5,2.8954305 5.8954305,2 7,2 Z M8,12 C8.55228475,12 9,11.5522847 9,11 C9,10.4477153 8.55228475,10 8,10 C7.44771525,10 7,10.4477153 7,11 C7,11.5522847 7.44771525,12 8,12 Z M8,16 C8.55228475,16 9,15.5522847 9,15 C9,14.4477153 8.55228475,14 8,14 C7.44771525,14 7,14.4477153 7,15 C7,15.5522847 7.44771525,16 8,16 Z M12,12 C12.5522847,12 13,11.5522847 13,11 C13,10.4477153 12.5522847,10 12,10 C11.4477153,10 11,10.4477153 11,11 C11,11.5522847 11.4477153,12 12,12 Z M12,16 C12.5522847,16 13,15.5522847 13,15 C13,14.4477153 12.5522847,14 12,14 C11.4477153,14 11,14.4477153 11,15 C11,15.5522847 11.4477153,16 12,16 Z M16,12 C16.5522847,12 17,11.5522847 17,11 C17,10.4477153 16.5522847,10 16,10 C15.4477153,10 15,10.4477153 15,11 C15,11.5522847 15.4477153,12 16,12 Z M16,16 C16.5522847,16 17,15.5522847 17,15 C17,14.4477153 16.5522847,14 16,14 C15.4477153,14 15,14.4477153 15,15 C15,15.5522847 15.4477153,16 16,16 Z M16,20 C16.5522847,20 17,19.5522847 17,19 C17,18.4477153 16.5522847,18 16,18 C15.4477153,18 15,18.4477153 15,19 C15,19.5522847 15.4477153,20 16,20 Z M8,18 C7.44771525,18 7,18.4477153 7,19 C7,19.5522847 7.44771525,20 8,20 L12,20 C12.5522847,20 13,19.5522847 13,19 C13,18.4477153 12.5522847,18 12,18 L8,18 Z M7,4 L7,8 L17,8 L17,4 L7,4 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="javascript:generate_evaluation_pdf('<?php echo paramEncrypt($questionnaire[0]->id_kuisioner); ?>', '<?php echo paramEncrypt($id_penilai[0]->id_pegawai); ?>', '<?php echo paramEncrypt($id_dinilai[0]->id_pegawai); ?>')" class="btn btn-light btn-sm text-danger font-weight-bold ml-2">Cetak .PDF</a>
                                    <div class="text-inverse-success font-weight-bolder font-size-h2 mt-3 blink-hard">
                                        <?php echo $result_eval[0]->jumlah_nilai_personal; ?>
                                    </div>
                                    <a href="#" class="text-white font-weight-bold font-size-md mt-1">Total Penilaian</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <!--begin::Tiles Widget 13-->
                    <div class="card card-custom bgi-no-repeat gutter-b"
                        style="height: 150px; background-color: #FFFFFF; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto;">
                        <!--begin::Body-->
                        <div class="card-body align-items-center">
                            <div>
                                <div class="d-flex justify-content-center">
                                    <p class="text-dark-75 font-weight-bolder font-size-h4">Tipe Pertanyaan
                                    </p>
                                </div>
                                <div class="d-flex flex-wrap justify-content-center">
                                    <?php
                                    if (!empty($question_type)) {
                                        foreach ($question_type as $key => $value) {
                                    ?>
                                            <a href="#"
                                                class="label font-weight-bold label-default label-md label-inline mr-2 mt-1"
                                                data-toggle="" aria-haspopup="true" aria-expanded="false">
                                                <?php echo strtoupper($value->nama_tipe_pertanyaan); ?>
                                            </a>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 13-->
                </div>
                <div class="col-xl-12 text-center">
                    <?php echo $this->session->flashdata('flash_message'); ?>
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact py-3" id="kt_form">
                        <div class="card-header card-title pt-2" style="justify-content: center">
                            <h2 class="card-label font-size-h2 text-center font-weight-bolder">HASIL PENILAIAN KUISIONER PERSONAL/DIRI
                                <span class="text-primary pt-2 font-size-h6 font-weight-bolder d-block"><b class="text-dark-75"></b> "<?php echo strtoupper(strtolower($id_dinilai[0]->nama_lengkap)); ?>"-(<?php echo (($id_dinilai[0]->nip)); ?>)</span>
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
                                    <?php
                                    $no = 1;
                                    if (!empty($question_type)) {
                                        foreach ($question_type as $key => $value_type) {
                                    ?>
                                            <div class="alert alert-warning font-size-h6 font-weight-bolder text-left pl-10" role="alert">
                                                <?php echo strtoupper($value_type->nama_tipe_pertanyaan); ?>
                                            </div>
                                            <?php
                                            if (!empty($question)) {
                                                foreach ($question as $key => $value) {
                                                    if ($value->tipe_pertanyaan == $value_type->id_tipe_pertanyaan) {
                                            ?>
                                                        <div class="form-group row fv-plugins-icon-container ">
                                                            <div class="col-lg-1 text-right">
                                                                <label class="font-weight-bolder font-size-h3"><?php echo $no . "."; ?></label>
                                                            </div>
                                                            <div class="col-lg-9 text-left">
                                                                <span class="form-text text-danger form-control-lg"><?php echo $value->deskripsi_pertanyaan; ?></span>
                                                                <textarea name="isi[]" class="form-control form-control-md font-weight-bold form-control-solid" style="resize: none;" rows="3" readonly=""><?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?></textarea>
                                                            </div>
                                                            <div class="col-lg-2 text-center">
                                                                <input type="text" name="jawaban[]" class="form-control form-control-lg font-weight-bold  form-control-solid" placeholder="Isikan Nilai" value="<?php echo $value->isi_jawaban; ?>" readonly>

                                                            </div>
                                                        </div>
                                            <?php
                                                        $no++;
                                                    }
                                                }
                                            } ?>
                                    <?php
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <!--end::Form-->
                    </div>
                    <!--end::Entry-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
</div>
<script>
    var NILAI_MAX = <?php echo $questionnaire[0]->nilai_penilaian_max; ?>
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-eval-questionnaire.js">
</script>
<script>
    function generate_evaluation_pdf(id_kuisioner, id_penilai, id_dinilai) {

        //alert(rows_selected.join(","));
        KTApp.blockPage({
            overlayColor: '#FFA800',
            state: 'warning',
            size: 'lg',
            opacity: 0.1,
            message: 'Silahkan Tunggu...'
        });

        $.ajax({
            type: "POST",
            url: `${HOST_URL}employee/employe/report/print_data_pdf_evaluation_personal`,
            data: {
                id_kuisioner: id_kuisioner,
                id_penilai: id_penilai,
                id_dinilai: id_dinilai,
            },
            xhrFields: {
                responseType: 'blob' // to avoid binary data being mangled on charset conversion
            },
            success: function(blob, data, xhr) {
                KTApp.unblockPage();
                // check for a filename
                try {
                    var filename = "";
                    var disposition = xhr.getResponseHeader('Content-Disposition');
                    if (disposition && disposition.indexOf('attachment') !== -1) {
                        var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                        var matches = filenameRegex.exec(disposition);
                        if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                    }

                    if (typeof window.navigator.msSaveBlob !== 'undefined') {
                        // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                        window.navigator.msSaveBlob(blob, filename);
                    } else {
                        var URL = window.URL || window.webkitURL;
                        var downloadUrl = URL.createObjectURL(blob);

                        if (filename) {
                            // use HTML5 a[download] attribute to specify filename
                            var a = document.createElement("a");
                            // safari doesn't support this yet
                            if (typeof a.download === 'undefined') {
                                window.open(downloadUrl, '_blank');
                            } else {
                                a.href = downloadUrl;
                                a.download = filename;
                                document.body.appendChild(a);
                                a.click();
                                document.body.removeChild(a); // Cle
                            }
                        } else {
                            window.open(downloadUrl, '_blank');
                        }
                    }

                    Swal.fire({
                        html: "Berhasil!, Laporan berhasil dicetak, Silahkan cek ulang.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Oke!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-success"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                } catch {

                    Swal.fire({
                        html: "Mohon Maaf, Data Penilaian Belum Selesai. Silahkan cek ulang.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Oke!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-success"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            }
        });
    };
</script>