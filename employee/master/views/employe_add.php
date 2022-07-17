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
                            <a href="" class="text-muted">Tambah Pegawai</a>
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
            <?php echo $this->session->flashdata('flash_message'); ?>
            <?php $user = $this->session->userdata('sias-employee'); ?>
            <!--end::Notice-->
            <!--begin::Card-->
            <div class="row">
                <div class="col-lg-12" id="kt_form">
                    <div class="card card-custom example example-compact py-5">
                        <div class="card-header">
                            <h3 class="card-title font-size-h3">Formulir Tambah Pegawai</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="POST" action="<?php echo site_url('/employee/master/employe/post_employe'); ?>" enctype="multipart/form-data"  id="kt_form_pegawai">
                            <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="card-body">                             
                                <div class="mb-0">
                                    <h3 class="font-size-h4 text-dark-75 font-weight-bold mb-10">Identitas Pegawai:</h3>
                                    <div class="mb-0">
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-3 mb-3">
                                                <label>NIK Pegawai</label>
                                                <input type="text" name="nik" id="kt_maxlength_pegawai"   maxlength="16" class="form-control form-control-lg form-control-solid" placeholder="Isikan NIK KTP" >
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NIK KTP Pegawai</span>               
                                                <div class="fv-plugins-message-container"></div>
                                                <small id="info_nik" class="form-control-feedback"></small>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>NIP Pegawai</label>
                                                <input type="text" name="nip" class="form-control form-control-lg form-control-solid" placeholder="Isikan NIP Pegawai" >
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan NIP Pegawai</span>                       
                                                <div class="fv-plugins-message-container"></div>
                                                <small id="info_nip" class="form-control-feedback"></small>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <label>Nama Lengkap Pegawai</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="la la-user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nama_lengkap" class="form-control form-control-lg form-control-solid" placeholder="Isikan Nama Lengkap" >
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nama Lengkap Pegawai</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-3 mb-3">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control form-control-lg form-control-solid" placeholder="Isikan Tempat Lahir" >
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tempat Lahir Pegawai</span>                     
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Tanggal Lahir</label>
                                                <div class="input-group input-group-lg input-group-solid" id="kt_daterangepicker_5">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="tanggal_lahir" readonly="" class="form-control form-control-lg form-control-solid" placeholder="Isikan Tanggal Lahir" >
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tanggal Lahir Pegawai</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control form-control-lg form-control-solid" placeholder="Isiakan Email" >
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Email Pegawai</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Jenis Kelamin</label>
                                                <select name="jenis_kelamin" class="form-control form-control-solid form-control-lg">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki-laki</option>
                                                    <option value="2">Perempuan</option>                                                    
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Jenis Kelamin</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-2 mb-3">
                                                <label>Agama</label>
                                                <select name="agama" class="form-control form-control-solid form-control-lg">
                                                    <option value="">Pilih Agama</option>
                                                    <option value="1" selected="selected">Islam</option> 
                                                    <option value="2">Kristen</option> 
                                                    <option value="3">Hindu</option> 
                                                    <option value="4">Budha</option> 
                                                    <option value="5">Lainnya.</option>                                                  
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Agama Pegawai</span>                     
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-2 mb-3">
                                                <label>Warga Negara</label>
                                                <select name="warga_negara" class="form-control form-control-solid form-control-lg">
                                                    <option value="">Pilih Warga Negara</option>
                                                    <option value="1" selected="selected">WNI</option>
                                                    <option value="2">WNA</option>                                                    
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Warga Negara</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>                                           
                                            <div class="col-lg-3 mb-3">
                                                <label>Status Nikah</label>
                                                <select name="status_nikah" class="form-control form-control-solid form-control-lg">
                                                    <option value="">Pilih Status Nikah</option>
                                                    <option value="1">Belum Menikah</option>
                                                    <option value="2">Menikah</option>  
                                                    <option value="3">Cerai</option> 
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Status Nikah</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-2">

                                                <label >Jumlah Anak </label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="jumlah_anak" type="text" class="form-control form-control-lg form-control-solid" placeholder="Isikan Jumlah Anak"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Jumlah Anak</span>
                                                <div class="fv-plugins-message-container"></div>

                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Pendidikan Terakhir</label>
                                                <select name="pendidikan" class="form-control form-control-solid form-control-lg">
                                                    <option value="">Pilih Pendidikan</option>
                                                    <option value="1" >Tidak Sekolah</option>
                                                    <option value="2" >SD</option>
                                                    <option value="3" >SMP</option>
                                                    <option value="4" >SMA</option>
                                                    <option value="5" >D-I/D-II</option>
                                                    <option value="6" >D-III</option>
                                                    <option value="7" >D-IV/S1</option>
                                                    <option value="8" >S2/S3</option>
                                                </select>                                          
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Pendidikan Pegawai</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>

                                        </div>
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-3 mb-3">
                                                <label>Spesialisasi Lulusan</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="spesialisasi" class="form-control form-control-lg form-control-solid" type="text" placeholder="Isikan Spesialisasi Lulusan"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Spesialisasi Lulusan, contoh: Teknik Informatika</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Program Keahlian</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="program_keahlian" class="form-control form-control-lg form-control-solid" type="text" placeholder="Isikan Program Keahlian"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Program Keahlian</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Nomor Handphone</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text font-weight-bold">
                                                            (62)
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nomor_hp" id="kt_maxlength_nohp" class="form-control form-control-lg form-control-solid" maxlength="13"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nomor HP, tanpa 0 didepan</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Jam Pelajaran</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text font-weight-bold">
                                                            <i class="la la-clock-o"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="jam_pelajaran" value="0" class="form-control form-control-lg form-control-solid"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Jam Pelajaran jika ada</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-3 mb-3">
                                                <label>Jenis Pegawai</label>
                                                <select name="jenis_pegawai" class="form-control form-control-solid form-control-lg">
                                                    <option value="">Pilih Jenis Pegawai</option>
                                                    <option value="1" >Pegawai Tetap</option>
                                                    <option value="2" >Pegawai Tidak Tetap</option>
                                                    <option value="3" >Pegawai Honorer</option>                                                                                                              
                                                </select> 
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Jenis Pegawai</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Tahun Ajaran</label>
                                                <select name="th_ajaran" class="form-control form-control-solid form-control-lg">    
                                                    <option value="">Pilih Tahun Ajaran</option>
                                                    <?php
                                                    if (!empty($schoolyear)) {
                                                        foreach ($schoolyear as $key => $value_sch) {
                                                            ?>
                                                            <option value="<?php echo $value_sch->id_tahun_ajaran; ?>"><?php echo ucwords(strtolower($value_sch->nama_tahun_ajaran)); ?></option>                                     
                                                            <?php
                                                        }
                                                    }
                                                    ?>     
                                                </select> 
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Tahun Ajaran</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="mb-0">
                                    <h3 class="font-size-h4 text-dark-75 font-weight-bold mb-10">Data Personal Pegawai:</h3>
                                    <div class="mb-0">
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-4 mb-3">
                                                <label>Alamat Lengkap</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <textarea class="form-control" name="alamat_lengkap" rows="3"></textarea>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Alamat Lengkap</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label>Provinsi </label>
                                                <select name="provinsi" id="provinsi" class="form-control form-control-lg form-control-solid select2">
                                                    <option value="">Pilih Provinsi</option>
                                                    <?php
                                                    if (!empty($provinsi)) {
                                                        foreach ($provinsi as $key => $value_prov) {
                                                            ?>
                                                            <option value="<?php echo $value_prov->id; ?>"><?php echo ucwords(strtolower($value_prov->nama)); ?></option>                                     
                                                            <?php
                                                        }
                                                    }
                                                    ?>        
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Provinsi</span>
                                                <div class="fv-plugins-message-container"></div>

                                            </div>
                                            <div class="col-lg-4 ">
                                                <label>Kabupaten/Kota </label>
                                                <select name="kabupaten_kota" id="kabupaten_kota" class="form-control form-control-lg form-control-solid select2">
                                                    <option value="">Pilih Kabupaten/Kota</option>                                                       
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kabupaten/Kota</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-4">
                                                <label>Kecamatan </label>
                                                <select name="kecamatan" id="kecamatan" class="form-control form-control-lg form-control-solid select2">
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kecamatan</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label >Kelurahan/Desa </label>
                                                <select name="kelurahan_desa" id="kelurahan_desa" class="form-control form-control-lg form-control-solid select2">
                                                    <option value="">Pilih Kelurahan/Desa</option>
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Desa/kelurahan</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-2 mb-3">
                                                <label >RT </label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="rt" type="text" class="form-control form-control-lg form-control-solid" id="kt_maxlength_rt" maxlength="3" placeholder="RT"  />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan RT</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label >RW </label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="rw" type="text" class="form-control form-control-lg form-control-solid" id="kt_maxlength_rw" maxlength="3" placeholder="RW" />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan RW</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container">
                                            <div class="col-lg-2 mb-3">
                                                <label>Kodepos</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="kodepos" type="text"  class="form-control form-control-lg form-control-solid" id="kt_maxlength_kodepos" maxlength="6" placeholder="Kodepos" />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kodepos</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Nomor NPWP</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="npwp" class="form-control form-control-lg form-control-solid" type="text" placeholder="Isikan Nomor NPWP"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan nomor NPWP, contoh: 11.223.345.6-789003</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label>Nama Wajib Pajak</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="nama_wajib_pajak" class="form-control form-control-lg form-control-solid"  type="text" placeholder="Isikan Nama Wajib Pajak" />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Nama Wajib Pajak</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Tanggal Masuk</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="tanggal_masuk" id="kt_datepicker_1" class="form-control form-control-lg form-control-solid" placeholder="Isikan Tanggal Masuk" readonly="">
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tanggal Masuk</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="mb-3">
                                    <h3 class="font-size-h4 text-dark-75 font-weight-bold mb-10">Data Akun:</h3>
                                    <div class="mb-0">
                                        <div class="form-group row fv-plugins-icon-container">
                                            <div class="col-lg-1" ></div>

                                            <div class="col-lg-2 text-center mb-3">
                                                <div class="image-input image-input-empty image-input-outline" id="kt_image" style="background-image: url(<?php echo base_url(); ?>/assets/employee/dist/assets/media/users/blank.png)">
                                                    <div class="image-input-wrapper"></div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="foto_pegawai" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="profile_avatar_remove" />
                                                    </label>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>format file png,jpg,jpeg, kurang dari 3 Mb</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Level Tingkat</label>
                                                <select name="level_tingkat" id="tingkat" class="form-control form-control-solid form-control-lg">
                                                    <option value="">Pilih Level Tingkat</option>
                                                    <?php if ($user[0]->level_jabatan == 0) { ?>
                                                        <option value="1">KB/TK</option>                                                         
                                                        <option value="3">SD</option>
                                                        <option value="4">SMP</option>
                                                        <option value="5">SMA</option>                                                               
                                                        <option value="6">UMUM</option>  
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

                                                    <?php } ?>

                                                </select> 
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Level Tingkat</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Jabatan Pegawai</label>
                                                <select name="id_jabatan" id="jabatan" class="form-control form-control-solid form-control-lg">
                                                    <option value="">Pilih Jabatan</option>

                                                </select> 
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Jabatan Pegawai</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label>Golongan</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="golongan" type="text" class="form-control form-control-lg form-control-solid" placeholder="Gol."/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">* TIDAK WAJIB DIISI, </b>isikan IVa, IIIb dst</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-1" ></div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container">
                                            <div class="col-lg-2" ></div>
                                            <div class="col-lg-4 mb-3">
                                                <label>Password Baru</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="password" type="password"  class="form-control form-control-lg form-control-solid" placeholder="Isikan Password"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Password</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Konfirmasi Password Baru</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="cf_password" type="password"  class="form-control form-control-lg form-control-solid" placeholder="Isikan Konfirmasi Password"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Konfirmasi Password</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button id="kt_login_signin_submit" class="btn btn-success font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-emp.js">
</script>

<script>

    $(document).ready(function () {
        var id_prov;
        var id_kab;
        var id_kec;
        var id_pos;

        $("#provinsi").change(function () {
            id_prov = $(this).val();
            var url = "<?php echo site_url('employee/master/employe/add_ajax_kab'); ?>/" + id_prov;
            $('#kabupaten_kota').load(url);
            return false;
        });

        $("#kabupaten_kota").change(function () {
            id_kab = $(this).val();
            var url = "<?php echo site_url('employee/master/employe/add_ajax_kec'); ?>/" + id_prov + "/" + id_kab;
            $('#kecamatan').load(url);
            return false;
        });

        $("#kecamatan").change(function () {
            id_kec = $(this).val()
            var url = "<?php echo site_url('employee/master/employe/add_ajax_des'); ?>/" + id_prov + "/" + id_kab + "/" + id_kec;
            $('#kelurahan_desa').load(url);
            return false;
        });

        $("#tingkat").change(function () {
            id_pos = $(this).val();
            var url = "<?php echo site_url('employee/master/employe/add_ajax_position'); ?>/" + id_pos;
            $('#jabatan').load(url);
            return false;
        });
    });
</script>