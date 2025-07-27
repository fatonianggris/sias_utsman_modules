<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Acara</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Jadwal Acara Siswa</a>
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
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                <div class="alert-icon">
                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <div class="alert-text">FullCalendar, the most popular full-sized JavaScript Calendar v4 Plugin. For more info please visit
                    <a class="font-weight-bold" href="https://fullcalendar.io/docs/v4" target="_blank">FullCalendar v4 Documentation</a>.
                    <br>
                        <span class="label label-danger label-inline font-weight-bold">FullCalendar v5 integration is coming soon</span></div>
            </div>
            <!--end::Notice-->
            <!--begin::Example-->
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Basic Calendar
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn btn-light-primary font-weight-bold"  data-toggle="modal" data-target="#modal_add_agenda">
                            <i class="ki ki-plus "></i> Tambah Acara
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="kt_calendar_student"></div>
                </div>
            </div>
            <!--end::Card-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<div class="modal fade" id="modal_add_agenda" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Agenda/Acara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" id="kt_form_agenda">
                <div class="modal-body">

                    <div class="row mt-2">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Judul Acara</label>
                                <input type="text" name="judul_acara" class="form-control form-control-solid form-control-lg " placeholder="Isikan Nama Acara">
                                    <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Nama Acara</span>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Tanggal Acara</label>
                                <div class="input-daterange input-group" id="kt_datepicker_5">
                                    <input type="text" class="form-control" name="mulai" placeholder="Tanggal Awal" readonly=""/>
                                    <div class="input-group-append">
                                        <span class="input-group-text font-weight-bold">sampai</span>
                                    </div>
                                    <input type="text" class="form-control" name="akhir" placeholder="Tanggal Akhir" readonly=""/>
                                </div>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Isikan Tanggal Acara</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">                       
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label>Ditujukan ke-</label>
                                <select name="tujuan" class="form-control form-control-solid form-control-lg">
                                    <option value="">Pilih Tujuan</option>
                                    <option value="1">Siswa</option>                                   
                                    <option value="2">Pegawai</option>
                                </select>
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIPILIH, </b>pilih Tujauan</span>

                            </div>
                        </div>
                        <div class="col-xl-9">
                            <label>Link/URL Tujuan</label>
                            <input type="text" name="url" class="form-control form-control-solid form-control-lg " placeholder="Isikan Link/URL">
                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Link/URL jika ada</span>
                        </div>
                    </div>
                    <div class="row">                       
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Deskripsi/Keterangan</label>
                                <textarea name="keterangan" id="kt-ckeditor-1"></textarea>
                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Deskripsi Acara jika ada</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success font-weight-bold mr-2" >Simpan</button>
                    <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-agenda.js"></script>