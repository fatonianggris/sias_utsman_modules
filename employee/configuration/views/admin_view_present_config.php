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
					<h5 class="text-dark font-weight-bold my-1 mr-5">Pengaturan</h5>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Konfigurasi Absen</a>
						</li>
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page Heading-->
			</div>
			<!--end::Info-->
			<!--begin::Toolbar-->
			<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
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
			<!--end::Notice-->
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Card-->
					<div class="card card-custom" id="kt_form">
						<div class="card-header">
							<h3 class="card-title">
								Edit Konfigurasi Absensi
							</h3>
						</div>
						<!--begin::Form-->
						<div class="row text-center">
							<div class="col-lg-8 text-center mt-3">
								<label class="font-weight-bolder font-size-h3">Atur Area Absensi</label>
								<div id="map-canvas" style="border: 2px solid rgb(83, 188, 157); margin-left: 25px;"></div>
								<textarea id="info" style="display: none;"></textarea>
								<button id="saveLocation" class="btn btn-primary" style="margin-top: 20px;margin-bottom: 20px">Save Area</button>
							</div>
							<div class="col-lg-4 text-center  mt-3">
								<label class="font-weight-bolder font-size-h3">Generate QR Code</label>
								<div class="symbol symbol-50 symbol-lg-300">
									<?php if ($present[0]->foto_qrcode) { ?>
										<img src="<?php echo base_url($present[0]->foto_qrcode); ?>" alt="image">
									<?php } else { ?>
										<img src="<?php echo base_url('assets/employee/dist/assets/media/users/blank.png'); ?>" alt="image">
									<?php } ?>
								</div>
								<label class="font-weight-bold text-center ">Nama QR Code</label>
								<div class="row ">
									<textarea class="form-control mr-15 ml-15" id="nama_qr" rows="1"><?php echo $present[0]->qrcode; ?></textarea>
								</div>
								<label class="font-weight-bold text-center mt-2">Keterangan</label>
								<div class="row ">
									<textarea class="form-control mr-15 ml-15" id="keterangan_qr" rows="3"><?php echo $present[0]->keterangan_qrcode; ?></textarea>
								</div>
								<button id="generate-qrcode" class="btn btn-primary" style="margin-top: 35px; margin-bottom: 20px">Generate QR</button>
								<a href="<?php echo site_url('employee/report/export/print_qr_code'); ?>" class="btn btn-warning" style="margin-top: 35px; margin-bottom: 20px; margin-left:20px;"><i class="fas fa-print"></i>Print QR</a>
							</div>
						</div>
						<form class="form" novalidate="novalidate" action="<?php echo site_url('employee/configuration/settings/update_present'); ?>" enctype="multipart/form-data" method="post" id="kt_add_presemt_conf_form">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="card-body">

								<div class="row">
									<div class="col-lg-3 col-6">
										<!--begin::Engage Widget 2-->
										<div class="card card-custom mb-7">
											<div class="card-body d-flex p-0">
												<div class="flex-grow-1 bg-success p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 140px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/home/Earth.svg);">
													<h4 class="text-inverse-danger font-weight-bolder">Aktifkan Absen Lokasi</h4>
													<p class="text-white my-2">Silahkan Aktifkan Area Absensi Lokasi Pegawai</p>
													<?php if ($present[0]->status_absensi_lokasi == 1) { ?>
														<input data-switch="true" class="update_loc_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
													<?php } else { ?>
														<input data-switch="true" class="update_loc_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
									<!--end::Engage Widget 2-->
									<!--end::Card-->
									<div class="col-lg-3 col-6">
										<!--begin::Engage Widget 2-->
										<div class="card card-custom mb-7">
											<div class="card-body d-flex p-0">
												<div class="flex-grow-1 bg-primary p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 140px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%;background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/files/Pictures1.svg);">
													<h4 class="text-inverse-danger font-weight-bolder">Aktifkan Absen Selfie</h4>
													<p class="text-inverse-danger my-2">Silahkan Aktifkan Absensi Lokasi Pegawai</p>
													<?php if ($present[0]->status_absensi_selfie == 1) { ?>
														<input data-switch="true" class="update_self_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
													<?php } else { ?>
														<input data-switch="true" class="update_self_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
									<!--end::Engage Widget 2-->
									<!--end::Card-->
									<div class="col-lg-3 col-6">
										<!--begin::Engage Widget 2-->
										<div class="card card-custom mb-7">
											<div class="card-body d-flex p-0">
												<div class="flex-grow-1 bg-warning p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 140px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%;background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/home/Clock.svg);">
													<h4 class="text-inverse-danger font-weight-bolder">Aktifkan Absen Kalender</h4>
													<p class="text-inverse-danger my-2">Silahkan Aktifkan Absensi Kalender Pegawai</p>
													<?php if ($present[0]->status_absensi_calendar == 1) { ?>
														<input data-switch="true" class="update_cal_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
													<?php } else { ?>
														<input data-switch="true" class="update_cal_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
									<!--end::Engage Widget 2-->
									<!--end::Card-->
									<div class="col-lg-3 col-6">
										<!--begin::Engage Widget 2-->
										<div class="card card-custom mb-7">
											<div class="card-body d-flex p-0">
												<div class="flex-grow-1 bg-info p-5 card-rounded flex-grow-1 bgi-no-repeat" style="height: 140px; background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%;background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/svg/icons/Code/Spy.svg);">
													<h4 class="text-inverse-danger font-weight-bolder">Aktifkan Absen QR Code</h4>
													<p class="text-inverse-danger my-2">Silahkan Aktifkan Absensi QR Code Pegawai</p>
													<?php if ($present[0]->status_absensi_qrcode == 1) { ?>
														<input data-switch="true" class="update_qr_switch" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
													<?php } else { ?>
														<input data-switch="true" class="update_qr_switch" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
									<!--end::Engage Widget 2-->
								</div>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label>Jam Masuk Pegawai</label>
											<input type="text" name="start_absen" id="kt_timepicker_start" readonly value="<?php echo $present[0]->start_absen ?>" class="form-control  form-control-lg" placeholder="Isikan Jam Masuk" />
											<span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Jam Masuk Pegawai</span>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Jam Pulang Pegawai</label>
											<input type="text" name="end_absen" id="kt_timepicker_end" readonly value="<?php echo $present[0]->end_absen ?>" class="form-control  form-control-lg" placeholder="Isikan Nomor Jam Pulang" />
											<span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Jam Pulang Pegawai</span>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Waktu Toleransi</label>
											<input type="text" name="toleransi_absen" id="kt_timepicker_tolerance" readonly value="<?php echo $present[0]->toleransi_absen ?>" class="form-control  form-control-lg" placeholder="Isikan Waktu Toleransi" />
											<span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Waktu Toleransi Masuk & Pulang</span>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label>Google Api Key</label>
											<textarea class="form-control" placeholder="Isikan Google Api Key" name="google_api_key" rows="2"><?php echo $present[0]->google_api_key; ?></textarea>
											<span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Google Api Key Map</span>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>MD5 Location</label>
											<textarea class="form-control form-control-solid" placeholder="" readonly="" name="md5" rows="2"><?php echo $present[0]->md5; ?></textarea>
											<span class="form-text text-dark"><b class="text-danger">*AUTO GENERATE, </b> MD5 Location</span>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Calendarific Api Key</label>
											<textarea class="form-control" placeholder="Isikan Calendarific Api Key" name="calendarific_api_key" rows="2"><?php echo $present[0]->calendarific_api_key; ?></textarea>
											<span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>Isikan Calendarific Api Key</span>
										</div>
									</div>
								</div>

							</div>
							<div class="card-footer">
								<button id="kt_login_signin_submit" class="btn btn-success font-weight-bold  py-4 col-lg-1 col-12">Simpan</button>
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
	<input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</div>
<!--end::Content-->
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-present-conf.js">
</script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,drawing&ext=.js&key=">
</script>
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/widgets/location.js">
</script>
<script>
	var csrfName = $('.txt_csrfname').attr('name');
	var csrfHash = $('.txt_csrfname').val(); // CSRF hash

	$('#generate-qrcode').click(function() {
		var qr_name = $("#nama_qr").val();
		var qr_ket = $("#keterangan_qr").val();

		if (qr_name) {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin GENERATE QR Code baru?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#1BC5BD",
				confirmButtonText: "Ya, Generate!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/generate_qrcode") ?>",
						data: {
							qr: qr_name,
							ket: qr_ket,
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Berhasil!", "GENERATE QR Baru telah diupdate!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro1.bootstrapSwitch('state', false);
					Swal.fire("Dibatalkan!", "GENERATE QR Code dibatalkan.", "error");
				}
			});
		} else {
			Swal.fire("Opsss!", "Isikan Nama QR terlebih dahulu.", "error");
		}
	});
</script>
<script>
	var csrfName = $('.txt_csrfname').attr('name');
	var csrfHash = $('.txt_csrfname').val(); // CSRF hash

	var pro1 = $(".update_loc_switch").bootstrapSwitch();
	pro1.on("switchChange.bootstrapSwitch", function(event, state) {
		if (state == true) {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin MENGAKTIFKAN Absensi Lokasi Sekarang?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#1BC5BD",
				confirmButtonText: "Ya, Aktifkan!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/change_status_loc_present") ?>",
						data: {
							id: '<?php echo paramEncrypt(1); ?>',
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Diaktifkan!", "Absensi Lokasi telah diaktifkan!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro1.bootstrapSwitch('state', false);
					Swal.fire("Dibatalkan!", "Absensi Lokasi batal diaktifkan.", "error");
				}
			});
		} else {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin NONAKTIFKAN Absensi Lokasi Sekarang?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ya, Non Aktifkan!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/change_status_loc_present") ?>",
						data: {
							id: '<?php echo paramEncrypt(0); ?>',
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Dinonaktifkan!", "Absensi Lokasi telah dinonaktifkan!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro1.bootstrapSwitch('state', true);
					Swal.fire("Dibatalkan!", "Absensi Lokasi batal dinonaktifkan.", "error");
				}
			});
		}
	});
</script>
<script>
	var pro2 = $(".update_self_switch").bootstrapSwitch();
	pro2.on("switchChange.bootstrapSwitch", function(event, state) {
		if (state == true) {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin MENGAKTIFKAN Absensi Selfie Sekarang?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#1BC5BD",
				confirmButtonText: "Ya, Aktifkan!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/change_status_self_present") ?>",
						data: {
							id: '<?php echo paramEncrypt(1); ?>',
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Diaktifkan!", "Absensi Selfie telah diaktifkan!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro2.bootstrapSwitch('state', false);
					Swal.fire("Dibatalkan!", "Absensi Selfie batal diaktifkan.", "error");
				}
			});
		} else {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin NONAKTIFKAN Absensi Selfie Sekarang?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ya, Non Aktifkan!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/change_status_self_present") ?>",
						data: {
							id: '<?php echo paramEncrypt(0); ?>',
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Dinonaktifkan!", "Absensi Selfie telah dinonaktifkan!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro2.bootstrapSwitch('state', true);
					Swal.fire("Dibatalkan!", "Absensi Selfie batal dinonaktifkan.", "error");
				}
			});
		}
	});
</script>
<script>
	var pro3 = $(".update_cal_switch").bootstrapSwitch();
	pro3.on("switchChange.bootstrapSwitch", function(event, state) {
		if (state == true) {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin MENGAKTIFKAN Absensi Kalender Sekarang?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#1BC5BD",
				confirmButtonText: "Ya, Aktifkan!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/change_status_cal_present") ?>",
						data: {
							id: '<?php echo paramEncrypt(1); ?>',
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Diaktifkan!", "Absensi Kalender telah diaktifkan!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro3.bootstrapSwitch('state', false);
					Swal.fire("Dibatalkan!", "Absensi Kalender batal diaktifkan.", "error");
				}
			});
		} else {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin NONAKTIFKAN Absensi Kalender Sekarang?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ya, Non Aktifkan!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/change_status_cal_present") ?>",
						data: {
							id: '<?php echo paramEncrypt(0); ?>',
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Dinonaktifkan!", "Absensi Kalender telah dinonaktifkan!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro3.bootstrapSwitch('state', true);
					Swal.fire("Dibatalkan!", "Absensi Kalender batal dinonaktifkan.", "error");
				}
			});
		}
	});
</script>
<script>
	var pro4 = $(".update_qr_switch").bootstrapSwitch();
	pro4.on("switchChange.bootstrapSwitch", function(event, state) {
		if (state == true) {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin MENGAKTIFKAN Absensi QR Code Sekarang?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#1BC5BD",
				confirmButtonText: "Ya, Aktifkan!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/change_status_qr_present") ?>",
						data: {
							id: '<?php echo paramEncrypt(1); ?>',
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Diaktifkan!", "Absensi QR Code telah diaktifkan!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro4.bootstrapSwitch('state', false);
					Swal.fire("Dibatalkan!", "Absensi QR Code batal diaktifkan.", "error");
				}
			});
		} else {
			Swal.fire({
				title: "Peringatan!",
				text: "Apakah anda yakin ingin NONAKTIFKAN Absensi QR Code Sekarang?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ya, Non Aktifkan!",
				cancelButtonText: "Tidak, batal!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						type: "post",
						url: "<?php echo site_url("employee/configuration/settings/change_status_qr_present") ?>",
						data: {
							id: '<?php echo paramEncrypt(0); ?>',
							[csrfName]: csrfHash
						},
						dataType: 'html',
						success: function(result) {
							Swal.fire("Dinonaktifkan!", "Absensi QR Code telah dinonaktifkan!.", "success");
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(result) {
							console.log(result);
							Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
						}
					});
				} else {
					pro4.bootstrapSwitch('state', true);
					Swal.fire("Dibatalkan!", "Absensi QR Code batal dinonaktifkan.", "error");
				}
			});
		}
	});
</script>
