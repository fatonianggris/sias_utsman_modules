<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Profile</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Edit Profile</a>
                        </li>                       
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
                <a onclick="window.history.back();" class="btn btn-light-danger btn-sm font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-backward"></i>Kembali</a>           
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
            <!--end::Notice-->
            <div class="row">
                <div class="col-lg-12" id="kt_form" >
                    <!--begin::Card-->
                    <div class="card card-custom" >
                        <!--begin::Form-->
                        <form class="form" method="POST" action="<?php echo site_url('employee/settings/account/update_account_profile/' . paramEncrypt($profile[0]->id_pegawai)); ?>" enctype="multipart/form-data"  id="kt_form_profile">
                            <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                           
                            <input type="hidden" name="id_pegawai" value="<?php echo $profile[0]->id_pegawai; ?>">
                            <div class="card-body">                             
                                <div class="mb-0">
                                    <h3 class="font-size-h4 text-dark-75 font-weight-bold mb-10">Identitas Utama Anda:</h3>
                                    <div class="mb-0">
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-3 mb-3">
                                                <label>NIK Anda</label>
                                                <input type="text" name="nik" id="kt_maxlength_pegawai" value="<?php echo $profile[0]->nik; ?>"  maxlength="16" class="form-control form-control-lg form-control-solid" placeholder="Isikan NIK KTP Anda" >
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NIK KTP Anda</span>               
                                                <div class="fv-plugins-message-container"></div>
                                                <small id="info_nik" class="form-control-feedback"></small>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>NIP Anda</label>
                                                <input type="text" name="nip" readonly="" value="<?php echo $profile[0]->nip; ?>"  class="form-control form-control-lg form-control-solid" placeholder="Isikan NIP Anda" >
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan NIP Anda</span>                       
                                                <div class="fv-plugins-message-container"></div>
                                                <small id="info_nip" class="form-control-feedback"></small>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Nama Lengkap Anda</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="la la-user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nama_lengkap" value="<?php echo $profile[0]->nama_lengkap; ?>" class="form-control form-control-lg form-control-solid" placeholder="Isikan Nama Lengkap" >
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*WAJIB DIISI, </b>isikan Nama Lengkap Anda</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-3 mb-3">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" value="<?php echo $profile[0]->tempat_lahir; ?>" class="form-control form-control-lg form-control-solid" placeholder="Isikan Tempat Lahir" >
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
                                                    <input type="text" name="tanggal_lahir" value="<?php echo $profile[0]->tanggal_lahir; ?>"  class="form-control form-control-lg form-control-solid" placeholder="Isikan Tanggal Lahir" >
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Tanggal Lahir Pegawai</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Email</label>
                                                <input type="text" name="email" value="<?php echo $profile[0]->email; ?>"  class="form-control form-control-lg form-control-solid" placeholder="Isiakan Email" >
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Email Pegawai</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Jenis Kelamin</label>
                                                <select name="jenis_kelamin" class="form-control form-control-solid form-control-lg">
                                                    <option value="<?php echo $profile[0]->jenis_kelamin; ?>" selected="">
                                                        <?php
                                                        if ($profile[0]->jenis_kelamin == 1) {
                                                            echo 'Laki-Laki';
                                                        } else if ($profile[0]->jenis_kelamin == 2) {
                                                            echo 'Perempuan';
                                                        }
                                                        ?>
                                                    </option>
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
                                                    <option value="<?php echo $profile[0]->agama; ?>" selected="">
                                                        <?php
                                                        if ($profile[0]->agama == 1) {
                                                            echo 'Islam';
                                                        } else if ($profile[0]->agama == 2) {
                                                            echo 'Kristen';
                                                        } else if ($profile[0]->agama == 3) {
                                                            echo 'Hindu';
                                                        } else if ($profile[0]->agama == 4) {
                                                            echo 'Budha';
                                                        } else if ($profile[0]->agama == 5) {
                                                            echo 'Lainnya';
                                                        }
                                                        ?>
                                                    </option>
                                                    <option value="1">Islam</option> 
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
                                                    <option value="<?php echo $profile[0]->warga_negara; ?>" selected="">
                                                        <?php
                                                        if ($profile[0]->warga_negara == 1) {
                                                            echo 'WNI';
                                                        } else if ($profile[0]->warga_negara == 2) {
                                                            echo 'WNA';
                                                        }
                                                        ?>
                                                    </option>
                                                    <option value="1">WNI</option>
                                                    <option value="2">WNA</option>                                                    
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Warga Negara</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>                                           
                                            <div class="col-lg-3 mb-3">
                                                <label>Status Nikah</label>
                                                <select name="status_nikah" class="form-control form-control-solid form-control-lg">
                                                    <option value="<?php echo $profile[0]->status_nikah; ?>" selected="">
                                                        <?php
                                                        if ($profile[0]->status_nikah == 1) {
                                                            echo 'Belum Menikah';
                                                        } else if ($profile[0]->status_nikah == 2) {
                                                            echo 'Menikah';
                                                        } else if ($profile[0]->status_nikah == 3) {
                                                            echo 'Cerai';
                                                        } else {
                                                            echo 'Pilih Status Nikah';
                                                        }
                                                        ?>
                                                    </option>
                                                    <option value="1">Belum Menikah</option>
                                                    <option value="2">Menikah</option>  
                                                    <option value="3">Cerai</option> 
                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Status Nikah</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Pendidikan Terakhir</label>
                                                <select name="pendidikan" class="form-control form-control-solid form-control-lg">
                                                    <option value="<?php echo $profile[0]->pendidikan; ?>" selected="">
                                                        <?php
                                                        if ($profile[0]->pendidikan == 1) {
                                                            echo 'Tidak Sekolah';
                                                        } else if ($profile[0]->pendidikan == 2) {
                                                            echo 'SD';
                                                        } else if ($profile[0]->pendidikan == 3) {
                                                            echo 'SMP';
                                                        } else if ($profile[0]->pendidikan == 4) {
                                                            echo 'SMA';
                                                        } else if ($profile[0]->pendidikan == 5) {
                                                            echo 'D-I/D-II';
                                                        } else if ($profile[0]->pendidikan == 6) {
                                                            echo 'D-III';
                                                        } else if ($profile[0]->pendidikan == 7) {
                                                            echo 'D-IV/S1';
                                                        } else if ($profile[0]->pendidikan == 8) {
                                                            echo 'S2/S3';
                                                        } else {
                                                            echo 'Pilih Pendidikan Terakhir';
                                                        }
                                                        ?>
                                                    </option>
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
                                            <div class="col-xl-2 mb-3">
                                                <div class="form-group ">
                                                    <label >Jumlah Anak </label>
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input name="jumlah_anak" type="text" value="<?php echo $profile[0]->jumlah_anak; ?>"  class="form-control form-control-lg form-control-solid" placeholder="Isikan Jumlah Anak"/>
                                                    </div>
                                                    <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Jumlah Anak</span>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>      
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-3 mb-3">
                                                <label>Nomor Handphone</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text font-weight-bold">
                                                            (62)
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nomor_hp" value="<?php echo $profile[0]->nomor_hp; ?>"  id="kt_maxlength_nohp" class="form-control form-control-lg form-control-solid" maxlength="13"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nomor HP, tanpa 0 didepan</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Spesialisasi Lulusan</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="spesialisasi" value="<?php echo ucwords(strtolower($profile[0]->spesialisasi)); ?>" class="form-control form-control-lg form-control-solid" type="text" placeholder="Isikan Spesialisasi Lulusan"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Spesialisasi Lulusan, contoh: Teknik Informatika</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Program Keahlian</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="program_keahlian" value="<?php echo ucwords(strtolower($profile[0]->program_keahlian)); ?>" class="form-control form-control-lg form-control-solid" type="text" placeholder="Isikan Program Keahlian"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Program Keahlian</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-2 mb-3">
                                                <label>Jam Pelajaran</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text font-weight-bold">
                                                            <i class="la la-clock-o"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="jam_pelajaran" value="<?php echo $profile[0]->jam_pelajaran; ?>" class="form-control form-control-lg form-control-solid"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Jam Pelajaran jika ada</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">

                                            </div>
                                            <div class="col-lg-4">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="mb-0">
                                    <h3 class="font-size-h4 text-dark-75 font-weight-bold mb-10">Data Personal Anda:</h3>
                                    <div class="mb-0">
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-4">
                                                <label>Alamat Lengkap</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <textarea class="form-control" name="alamat_lengkap" rows="3"><?php echo $profile[0]->alamat_lengkap; ?></textarea>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Alamat Lengkap</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label>Provinsi </label>
                                                <select name="provinsi" id="provinsi" class="form-control form-control-lg form-control-solid select2">
                                                    <option value="<?php echo $profile[0]->provinsi; ?>" selected="">
                                                        <?php echo ucwords(strtolower($profile[0]->nama_provinsi)); ?>
                                                    </option>
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
                                            <div class="col-lg-4">
                                                <label>Kabupaten/Kota </label>
                                                <select name="kabupaten_kota" id="kabupaten_kota" class="form-control form-control-lg form-control-solid select2">

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kabupaten/Kota</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container ">
                                            <div class="col-lg-4 mb-3">
                                                <label>Kecamatan </label>
                                                <select name="kecamatan" id="kecamatan" class="form-control form-control-lg form-control-solid select2">

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kecamatan</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label >Kelurahan/Desa </label>
                                                <select name="kelurahan_desa" id="kelurahan_desa" class="form-control form-control-lg form-control-solid select2">

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Desa/kelurahan</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-2" mb-3>
                                                <label >RT </label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="rt" type="text" value="<?php echo $profile[0]->rt; ?>" class="form-control form-control-lg form-control-solid" id="kt_maxlength_rt" maxlength="3" placeholder="RT"  />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan RT</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label >RW </label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="rw" type="text" value="<?php echo $profile[0]->rw; ?>" class="form-control form-control-lg form-control-solid" id="kt_maxlength_rw" maxlength="3" placeholder="RW" />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan RW</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row fv-plugins-icon-container">
                                            <div class="col-lg-2 mb-3">
                                                <label>Kodepos</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="kodepos" type="text" value="<?php echo $profile[0]->kodepos; ?>" class="form-control form-control-lg form-control-solid" id="kt_maxlength_kodepos" maxlength="6" placeholder="Kodepos" />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kodepos</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <label>Nomor NPWP</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="npwp" value="<?php echo $profile[0]->npwp; ?>" class="form-control form-control-lg form-control-solid" type="text" placeholder="Isikan Nomor NPWP"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan nomor NPWP, contoh: 11.223.345.6-789003</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label>Nama Wajib Pajak</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="nama_wajib_pajak" value="<?php echo $profile[0]->nama_wajib_pajak; ?>" class="form-control form-control-lg form-control-solid"  type="text" placeholder="Isikan Nama Wajib Pajak" />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Nama Wajib Pajak</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Golongan</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="golongan" type="text" value="<?php echo $profile[0]->golongan; ?>"  class="form-control form-control-lg form-control-solid" placeholder="Gol."/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-dark">* TIDAK WAJIB DIISI, </b>isikan IVa, IIIb dst</span>
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
                                                <div class="image-input image-input-outline" id="kt_image" style="background-image: url(<?php echo base_url(); ?>/assets/employee/dist/assets/media/users/blank.png)">
                                                    <?php if ($profile[0]->foto_pegawai != NULL || $profile[0]->foto_pegawai != "") { ?>
                                                        <div class="image-input-wrapper" style="background-image: url(<?php echo base_url() . $profile[0]->foto_pegawai; ?> "></div>
                                                    <?php } else {?>  
                                                     <div class="image-input-wrapper"></div>
                                                    <?php } ?>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="foto_pegawai" accept=".png, .jpg, .jpeg" />       
                                                         <input type="hidden" name="profile_avatar_remove" />
                                                        <input type="hidden" name="img_foto_pegawai" value="<?php echo $profile[0]->foto_pegawai ?>" style="display:none" />
                                                        <input type="hidden" name="img_foto_pegawai_thumb" value="<?php echo $profile[0]->foto_pegawai_thumb; ?>" style="display:none" />
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

                                            <div class="col-lg-2 mb-3" >
                                                <label>Ubah password?</label>
                                                <div class="input-group">
                                                    <input data-switch="true" class="ubahpass" data-size="large" type="checkbox" data-on-text="Ya"  data-off-text="Tidak" />
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger"></b>*Aktifkan jika ingin mengubah password</span>
                                            </div>

                                            <div class="col-lg-3 mb-3">
                                                <label>Password</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="password" type="password"  class="form-control form-control-lg form-control-solid" placeholder="Isikan Password"/>
                                                </div>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Password</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Konfirmasi Password</label>
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input name="cf_password" type="password" class="form-control form-control-lg form-control-solid" placeholder="Isikan Konfirmasi Password"/>
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
<!--end::Content-->
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-profile.js">
</script>
<?php if($profile[0]->provinsi != "" || $profile[0]->provinsi != NULL){ ?>
<script>

    $(document).ready(function () {
        var id_prov = <?php echo $profile[0]->provinsi; ?>;
        var id_kab = <?php echo $profile[0]->kabupaten_kota; ?>;
        var id_kec = <?php echo $profile[0]->kecamatan; ?>;
        var id_des = <?php echo $profile[0]->kelurahan_desa; ?>;


        var url_kab = "<?php echo site_url('employee/master/employe/add_ajax_kab'); ?>/" + id_prov + "/" + id_kab;
        $('#kabupaten_kota').load(url_kab);
        var url_kec = "<?php echo site_url('employee/master/employe/add_ajax_kec'); ?>/" + id_prov + "/" + id_kab + "/" + id_kec;
        $('#kecamatan').load(url_kec);
        var url_des = "<?php echo site_url('employee/master/employe/add_ajax_des'); ?>/" + id_prov + "/" + id_kab + "/" + id_kec + "/" + id_des;
        $('#kelurahan_desa').load(url_des);


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
    });
</script>
<?php } else{ ?>
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
<?php } ?>
<script>var STAT_EMP = 1;</script>
