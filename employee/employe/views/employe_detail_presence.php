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

                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header mt-2" style="justify-content: center">
                                    <div class="card-title text-center">                                
                                        <h2 class="card-label font-size-h3 font-weight-bolder">
                                            Detail Kehadiran Pegawai "<?php echo strtoupper(strtolower($present[0]->nama_lengkap)); ?>" - <?php echo $present[0]->nip; ?>
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $date = $present[0]->tgl_asli;
                                            $nameOfDay = date('l', strtotime($date));
                                            ?>
                                            <span class="text-warning pt-2 font-size-sm font-weight-bold d-block">Berikut detail kehadiran pada Hari/Tanggal "<?php echo hariIndo(strtolower($nameOfDay)); ?> - <?php echo $present[0]->tgl_post; ?>", TA: <?php echo $present[0]->tahun_ajaran; ?></span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">                                    
                                    <div class="row border-bottom text-center">
                                        <div class="col-lg-6 ">
                                            <div class="row mt-2">
                                                <div class="col-lg-12">
                                                    <h2 class="text-center text-warning font-weight-bolder mb-5 mt-5">
                                                        ABSENSI MASUK
                                                    </h2>
                                                </div>
                                                <div class="col-lg-12 text-center col-12  mb-5 ">    
                                                    <?php if ($present[0]->status_absensi_masuk == 0) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-primary text-center">BELUM ABSEN</p>
                                                    <?php } elseif ($present[0]->status_absensi_masuk == 1) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-success text-center">HADIR</p>
                                                    <?php } elseif ($present[0]->status_absensi_masuk == 2) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-warning text-center">IZIN</p>
                                                        <?php if ($present[0]->keterangan_masuk != "" || $present[0]->keterangan_masuk != NULL) { ?>
                                                            "<p class="font-weight-bold mb-1 text-danger text-center"> "<?php echo $present[0]->keterangan_masuk; ?>"</p>"
                                                        <?php } ?>
                                                    <?php } elseif ($present[0]->status_absensi_masuk == 3) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-danger text-center">ALPHA</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-12 col-6">
                                                    <div class="form-group">
                                                        <label>Waktu Masuk</label>
                                                        <input type="text" name="jam_masuk" disabled="" value="<?php echo $present[0]->jam_masuk; ?>" class="form-control  form-control-lg"  placeholder="00:00"/>
                                                    </div>
                                                </div> 
                                                <div class="col-lg-12 col-6">
                                                    <div class="form-group">
                                                        <label>Menit Telat</label>
                                                        <input type="text" name="jam_masuk_telat" disabled="" value="<?php echo $present[0]->jam_masuk_telat; ?>" class="form-control  form-control-lg"  placeholder="0"/>
                                                    </div>
                                                </div> 
                                                <div class="col-lg-12 col-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Lokasi Absen Masuk</label>
                                                        <iframe 
                                                            width="95%"
                                                            height="300"
                                                            frameborder="0" 
                                                            scrolling="no" 
                                                            marginheight="0" 
                                                            marginwidth="0" 
                                                            src = "https://maps.google.com/maps?q=<?php echo ($present[0]->lat_masuk); ?>,<?php echo ($present[0]->longt_masuk); ?>&hl=es;z=14&amp;output=embed">                                                                   
                                                        </iframe>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12 text-center">                                        
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label class="font-weight-bolder font-size-h6">Bukti Masuk</label> <a href="#" type="button" class="bt btn-xs font-weight-bold ml-2" data-toggle="modal" data-target="#modal_bukti_masuk" > <span class="label label-md font-weight-boldest label-primary label-inline">Lihat</span></a>
                                                            <input type="file" class="dropify_masuk" name="foto_surat" disabled="" data-default-file="<?php echo site_url($present[0]->foto_absensi_masuk); ?>" data-max-file-size="5M" data-height="120" data-allowed-file-extensions="png jpg jpeg" />
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>       
                                        <div class="col-lg-6 ">
                                            <div class="row mt-2">
                                                <div class="col-lg-12">
                                                    <h2 class="text-center text-warning font-weight-bolder mb-5 mt-5">
                                                        ABSENSI PULANG
                                                    </h2>
                                                </div>
                                                <div class="col-lg-12 text-center col-12  mb-5 ">    

                                                    <?php if ($present[0]->status_absensi_pulang == 0) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-primary text-center">BELUM ABSEN</p>
                                                    <?php } elseif ($present[0]->status_absensi_pulang == 1) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-success text-center">HADIR</p>
                                                    <?php } elseif ($present[0]->status_absensi_pulang == 2) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-warning text-center">IZIN</p>
                                                        <?php if ($present[0]->keterangan_pulang != "" || $present[0]->keterangan_pulang != NULL) { ?>
                                                            "<p class="font-weight-bold mb-1 text-danger text-center"> "<?php echo $present[0]->keterangan_pulang; ?>"</p>"
                                                        <?php } ?>
                                                    <?php } elseif ($present[0]->status_absensi_pulang == 3) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-danger text-center">ALPHA</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-12 col-6">
                                                    <div class="form-group">
                                                        <label>Waktu Pulang</label>
                                                        <input type="text" name="jam_pulang" disabled="" value="<?php echo $present[0]->jam_pulang; ?>" class="form-control  form-control-lg"  placeholder="00:00"/>
                                                    </div>
                                                </div> 
                                                <div class="col-lg-12 col-6">
                                                    <div class="form-group">
                                                        <label>Menit Telat</label>
                                                        <input type="text" name="jam_pulang_telat" disabled="" value="<?php echo $present[0]->jam_pulang_telat; ?>" class="form-control  form-control-lg"  placeholder="0"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Lokasi Absen Pulang</label>
                                                        <iframe 
                                                            width="95%"
                                                            height="300"
                                                            frameborder="0" 
                                                            scrolling="no" 
                                                            marginheight="0" 
                                                            marginwidth="0" 
                                                            src = "https://maps.google.com/maps?q=<?php echo ($present[0]->lat_pulang); ?>,<?php echo ($present[0]->longt_pulang); ?>&hl=es;z=14&amp;output=embed">                                                                   
                                                        </iframe>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12 text-center">                                        
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label class="font-weight-bolder font-size-h6">Bukti Pulang</label> <a href="#" type="button" class="bt btn-xs font-weight-bold ml-2" data-toggle="modal" data-target="#modal_bukti_pulang" > <span class="label label-md font-weight-boldest label-primary label-inline">Lihat</span></a>
                                                            <input type="file" class="dropify_pulang" name="foto_surat" disabled="" data-default-file="<?php echo site_url($present[0]->foto_absensi_pulang); ?>" data-max-file-size="5M" data-height="120" data-allowed-file-extensions="png jpg jpeg" />
                                                        </div>
                                                    </div>
                                                </div>                                        
                                            </div>
                                        </div>     
                                    </div>     
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
<div class="modal fade" id="modal_bukti_masuk" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Bukti Absensi Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <img alt="Pic" class="col-12" src="<?php echo base_url() . $present[0]->foto_absensi_masuk; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_bukti_pulang" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Bukti Absensi Pulang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <img alt="Pic" class="col-12" src="<?php echo base_url() . $present[0]->foto_absensi_pulang; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/ktdatatable/base/html-table-employe-presence-all.js">
</script>
<script>
    $('.dropify_masuk').dropify({
        messages: {
            'default': 'Klik atau Geser file Anda disini',
            'replace': 'Klik atau Geser file Anda untuk mengganti',
            'remove': 'Hapus',
            'error': 'Ooops, terjadi kesalahan.'
        }
    });
    $('.dropify_pulang').dropify({
        messages: {
            'default': 'Klik atau Geser file Anda disini',
            'replace': 'Klik atau Geser file Anda untuk mengganti',
            'remove': 'Hapus',
            'error': 'Ooops, terjadi kesalahan.'
        }
    });
</script>
