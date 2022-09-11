<html lang="en">
<!--begin::Head-->

<head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $title; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="<?php echo base_url(); ?>" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Custom Styles(used by this page)-->
	<link href="<?php echo base_url(); ?>assets/present/dist/assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/present/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<link href="<?php echo base_url(); ?>assets/present/dist/assets/css/pages/fonts/dropify.css" rel="stylesheet" type="text/css" />
	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/present/dist/assets/media/logos/favicon.ico" />
	<link href="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css" />
	<style>
		.table thead th {
			vertical-align: top;
			border-bottom: 2px solid #EBEDF3;
		}

		#map-canvas {
			height: 200px;
		}

		.no-browser-support {
			display: none;
		}

		.visible {
			display: block;
		}

		.blink-hard {
			animation: blinker 1s step-end infinite;
		}

		@keyframes blinker {
			50% {
				opacity: 0;
			}
		}
	</style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
			<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/present/dist/assets/media/bg/bg-3.jpg');">
				<div class="login-form text-center p-7 position-relative overflow-hidden">
					<!--begin::Login Header-->
					<div class="d-flex flex-center mb-3">
						<div class="text-center">
							<h3 class="font-mobile display-4 text-success font-weight-boldest">ABSEN HADIR PEGAWAI</h3>
						</div>
					</div>
					<div class="row flex-center mb-5">
						<div class="col-6 float-left">
							<a href="<?php echo site_url('present/dashboard'); ?>" type="button" class="btn btn-danger button-load float-left font-weight-bold">
								<li class="fa fa-home "></li> Menu
							</a>
						</div>
						<div class="col-6 float-right">
							<a onclick="window.history.back();" class="btn btn-light-warning button-load font-weight-bold float-right"><i class="fa fa-backward"></i>Kembali</a>
						</div>
					</div>
					<div class="row flex-center ">
						<!--begin::Stats Widget 6-->
						<div class="card card-custom card-stretch bg-warning-o-50 mb-5">
							<!--begin::Body-->
							<div class="card-body d-flex align-items-center py-0 mt-2">
								<div class="d-flex flex-column flex-grow-1 py-1 py-lg-5">
									<?php
									$user = $this->session->userdata('sias-present');
									$word = explode(" ", strip_tags($user[0]->nama_lengkap));
									$limit_word = implode(" ", array_splice($word, 0, 2));
									?>
									<a href="#" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary"><b class="text-danger">Hi, <?php echo strtoupper(strtolower($limit_word)); ?>!</b></a>
									<span class=" text-dark-75 font-size-md">
										Berikut merupakan formulir kehadiran Anda, Silahkan Absen.
									</span>
								</div>
								<img src="<?php echo base_url(); ?>assets/present/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
							</div>
							<!--end::Body-->
						</div>
					</div>
					<!--begin::Login Sign in form-->
					<div class="login-signin">
						<div class="row" id="kt_form">
							<!--begin::Card-->
							<div class="card card-custom">
								<div class="card-header mt-2" style="justify-content: center">
									<div class="card-title text-center">
										<h2 class="card-label font-size-h2 font-weight-bolder">
											<?php
											date_default_timezone_set('Asia/Jakarta');

											function minutes($time = '')
											{
												$time = explode(':', $time);
												return ($time[0] * 60) + ($time[1]) + ($time[2] / 60);
											}

											$curr_time = strtotime(date('H:i:s'));
											$time_in = strtotime($present_config[0]->start_absen);
											$time_out = strtotime($present_config[0]->end_absen);

											$interval_in = ($curr_time - $time_in);
											$diff_in = round($interval_in / 60);

											$interval_out = ($curr_time - $time_out);
											$diff_out = round($interval_out / 60);

											$date = date("Y-m-d");
											$nameOfDay = date('l', strtotime($date));
											?>
											<?php if (new DateTime() < new DateTime("12:00:00")) { ?>
												<?php if ($present_now[0]->status_absensi_masuk == 0) { ?>
													Form Absensi Masuk "<?php echo hariIndo(strtolower($nameOfDay)); ?>, <?php echo date("d/m/Y"); ?>"
												<?php } ?>
												<?php if ($diff_in > minutes($present_config[0]->toleransi_absen)) { ?>
													<div class="text-danger font-weight-bold font-size-sm blink-hard mt-2">"Anda Telat <?php echo $diff_in; ?> Menit"</div>
												<?php } ?>
											<?php } else { ?>
												<?php if ($present_now[0]->status_absensi_pulang == 0) { ?>
													Form Absensi Pulang "<?php echo hariIndo(strtolower($nameOfDay)); ?>, <?php echo date("d/m/Y"); ?>"
												<?php } ?>
												<?php if ($diff_out > minutes($present_config[0]->toleransi_absen)) { ?>
													<div class="text-danger font-weight-bold font-size-sm blink-hard mt-2">"Anda Telat <?php echo $diff_out; ?> Menit"</div>
												<?php } ?>
											<?php } ?>
										</h2>
									</div>
								</div>
								<!--begin::Form-->
								<input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<?php if (new DateTime() < new DateTime("12:00:00")) { ?>
									<?php if ($present_now[0]->status_absensi_masuk == 0) { ?>
										<input type="hidden" id="status_absensi" value="absensi_masuk">
										<!-- <form class="form" novalidate="novalidate" action="<?php echo site_url('present/history/present/post_present_in'); ?>" enctype="multipart/form-data" method="post" id="kt_present_form"> -->
										<?php if ($diff_in > minutes($present_config[0]->toleransi_absen)) { ?>
											<input type="hidden" id="jam_telat" value="<?php echo $diff_in; ?>">
										<?php } else { ?>
											<input type="hidden" id="jam_telat" value="0">
										<?php } ?>
									<?php } ?>
								<?php } else { ?>
									<?php if ($present_now[0]->status_absensi_pulang == 0) { ?>
										<input type="hidden" id="status_absensi" value="absensi_pulang">
										<!-- <form class="form" novalidate="novalidate" action="<?php echo site_url('present/history/present/post_present_out'); ?>" enctype="multipart/form-data" method="post" id="kt_present_form"> -->
										<?php if ($diff_out > minutes($present_config[0]->toleransi_absen)) { ?>
											<input type="hidden" id="jam_telat" value="<?php echo $diff_out; ?>">
										<?php } else { ?>
											<input type="hidden" id="jam_telat" value="0">
										<?php } ?>
									<?php } ?>
								<?php } ?>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="row ">
												<div class="col-lg-12 col-12 ">
													<h1 class="text-center text-warning font-weight-boldest mb-1">
														STATUS ABSENSI
													</h1>
												</div>
												<div class="col-lg-12 text-center col-12 mb-2">
													<p class="font-weight-boldest display-3 mb-1 text-success text-center">HADIR</p>
												</div>
												<div class="col-lg-12 col-6">
													<div class="form-group">
														<label>Jam Absen</label>
														<p class="font-weight-boldest text-dark display-4">
															<?php
															if (new DateTime() < new DateTime("12:00:00")) {
																echo $present_config[0]->start_absen;
															} else {
																echo $present_config[0]->end_absen;
															}
															?>
														</p>
													</div>
												</div>
												<div class="col-lg-12 col-6">
													<div class="form-group">
														<label>Waktu Sekarang</label>
														<p class="font-weight-boldest text-danger display-4 " id="timestamp"></p>
													</div>
												</div>
												<div class="col-lg-12 col-12">
													<div class="form-group">
														<div id="qr-reader" style="width: auto; height: auto;"></div>
														<span class="form-text text-dark"><b class="text-danger">*WAJIB SCAN, </b>"Pastikan Anda Menggunakan QR Code Sekolah Utsman"</span>
													</div>
													<p class="text-danger font-weight-normal font-size-sm text-center"></p>
												</div>
												<?php if ($present_config[0]->status_absensi_selfie == 1) { ?>
													<div class="col-lg-12 col-12 text-center">
														<div class="form-group">
															<label class="font-weight-bolder font-size-h6">Bukti Absen</label>
															<input type="file" id="file_bukti" class="dropify_masuk" name="foto_bukti" data-max-file-size="5M" data-height="150" data-allowed-file-extensions="png jpg jpeg" />
															<span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>Ambil/Unggah Foto Selfi Anda</span>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<!--end::Form-->
							</div>
							<!--end::Card-->
						</div>
					</div>

				</div>
				<!--end::Login Sign in form-->
			</div>
		</div>
	</div>
	<!--end::Login-->
	<div class="whatsapp_chat_support wcs_fixed_right" id="example_1">
		<div class="wcs_button_label">
			Butuh bantuan?
		</div>
		<div class="wcs_button wcs_button_circle">
			<span class="fa fa-phone"></span>
		</div>

		<div class="wcs_popup">
			<div class="wcs_popup_close">
				<span class="far fa-times-circle mt-2"></span>
			</div>
			<div class="wcs_popup_header">
				<strong>Butuh bantuan? Kontak Kami </strong>
				<br>
				<div class="wcs_popup_header_description">Pilih salah satu <b>Admin SIAP</b> dibawah ini</div>
			</div>
			<div class="wcs_popup_person_container">
				<?php if ($contact[0]->no_handphone != "" or $contact[0]->no_handphone != NULL) { ?>
					<div class="wcs_popup_person" data-number="<?php echo "62" . substr($contact[0]->no_handphone, 1); ?>" data-default-msg="Assslamualaikum, permisi mau bertanya?">
						<div class="wcs_popup_person_img"><img src="<?php echo base_url() . $page[0]->logo_website; ?>" alt=""></div>
						<div class="wcs_popup_person_content">
							<div class="wcs_popup_person_name">Admin SIAP</div>
							<div class="wcs_popup_person_description">Petugas SIAP</div>
							<div class="wcs_popup_person_status">Sedang Online</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!--end::Main-->
	<script>
		var HOST_URL = "<?php echo base_url(); ?>";
	</script>
	<script>
		var status_selfie = "<?php echo $present_config[0]->status_absensi_selfie; ?>";
	</script>
	<script>
		var status_location = "<?php echo $present_config[0]->status_absensi_lokasi; ?>";
	</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
		var KTAppSettings = {
			"breakpoints": {
				"sm": 576,
				"md": 768,
				"lg": 992,
				"xl": 1200,
				"xxl": 1200
			},
			"colors": {
				"theme": {
					"base": {
						"white": "#ffffff",
						"primary": "#6993FF",
						"secondary": "#E5EAEE",
						"success": "#1BC5BD",
						"info": "#8950FC",
						"warning": "#FFA800",
						"danger": "#F64E60",
						"light": "#F3F6F9",
						"dark": "#212121"
					},
					"light": {
						"white": "#ffffff",
						"primary": "#E1E9FF",
						"secondary": "#ECF0F3",
						"success": "#C9F7F5",
						"info": "#EEE5FF",
						"warning": "#FFF4DE",
						"danger": "#FFE2E5",
						"light": "#F3F6F9",
						"dark": "#D6D6E0"
					},
					"inverse": {
						"white": "#ffffff",
						"primary": "#ffffff",
						"secondary": "#212121",
						"success": "#ffffff",
						"info": "#ffffff",
						"warning": "#ffffff",
						"danger": "#ffffff",
						"light": "#464E5F",
						"dark": "#ffffff"
					}
				},
				"gray": {
					"gray-100": "#F3F6F9",
					"gray-200": "#ECF0F3",
					"gray-300": "#E5EAEE",
					"gray-400": "#D6D6E0",
					"gray-500": "#B5B5C3",
					"gray-600": "#80808F",
					"gray-700": "#464E5F",
					"gray-800": "#1B283F",
					"gray-900": "#212121"
				}
			},
			"font-family": "Poppins"
		};
	</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/present/dist/assets/js/scripts.bundle.js"></script>
	<!--end::Global Theme Bundle-->
	<!--end::Page Scripts-->
	<script src="<?php echo base_url(); ?>assets/present/dist/assets/js/dropify.js"></script>
	<script src="<?php echo base_url(); ?>assets/present/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
	<script src="<?php echo base_url(); ?>assets/present/dist/assets/js/pages/custom/login/do-present.js"></script>
	<script src="<?php echo base_url(); ?>assets/present/dist/assets/js/pages/html5-qrcode.min.js"></script>
	<script>
		function sendDataPresent() {
			navigator.permissions.query({
				name: 'geolocation'
			}).then((result) => {
				if (result.state === 'granted') {
					getLocation()
				} else if (result.state === 'prompt') {
					getLocation()
				} else {
					getLocation()
				}
				// Don't do anything if the permission was denied.
			});
		}

		function getLocation() {

			var jam_absen = document.getElementById('jam_telat').value;
			var status_absensi = document.getElementById('status_absensi').value;

			var status_file = "<?php echo $present_config[0]->status_absensi_selfie; ?>"

			KTApp.blockPage({
				overlayColor: '#FFA800',
				state: 'warning',
				size: 'lg',
				opacity: 0.2,
				message: 'Silahkan Tunggu...'
			});

			if (!navigator.geolocation) {
				Swal.fire("Opps!", "Broswer Anda tidak Mendukung Geolocation.", "error");
			} else {
				navigator.geolocation.getCurrentPosition(function(position) {
					var file_bukti;

					if (status_file === 1) {
						file_bukti = $('#file_bukti')[0].files;
					} else {
						file_bukti = null;
					}

					var csrfName = $('.txt_csrfname').attr('name');
					var csrfHash = $('.txt_csrfname').val(); // CSRF hash
					// Get the coordinates of the current possition.
					var lat = position.coords.latitude;
					var lng = position.coords.longitude;
					// Sending coordinates
					if (status_absensi === "absensi_pulang") {
						$.ajax({
							type: "post",
							url: "<?php echo site_url("present/history/present/post_present_out") ?>",
							data: {
								lat: lat.toFixed(6),
								longt: lng.toFixed(6),
								foto_bukti: file_bukti,
								jam_telat: jam_absen,
								[csrfName]: csrfHash
							},
							dataType: 'html',
							success: function(result) {
								setTimeout(function() {
									KTApp.unblockPage();
									$(location).attr('href', '<?php echo site_url("present/dashboard") ?>');
								}, 3000);
							},
							error: function(result) {
								console.log(result);
								Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
							}
						});
					} else if (status_absensi === "absensi_masuk") {
						$.ajax({
							type: "post",
							url: "<?php echo site_url("present/history/present/post_present_in") ?>",
							data: {
								lat: lat.toFixed(6),
								longt: lng.toFixed(6),
								foto_bukti: file_bukti,
								jam_telat: jam_absen,
								[csrfName]: csrfHash
							},
							dataType: 'html',
							success: function(result) {
								setTimeout(function() {
									KTApp.unblockPage();
									$(location).attr('href', '<?php echo site_url("present/dashboard") ?>');
								}, 3000);
							},
							error: function(result) {
								console.log(result);
								Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
							}
						});
					}

				});
			}
		}
	</script>
	<script>
		function docReady(fn) {
			// see if DOM is already available
			if (document.readyState === "complete" || document.readyState === "interactive") {
				// call on next available tick
				setTimeout(fn, 1);
			} else {
				document.addEventListener("DOMContentLoaded", fn);
			}
		}

		docReady(function() {
			var lastResult;
			var qrcode_name = "<?php echo $present_config[0]->qrcode; ?>";

			function onScanSuccess(decodedText, decodedResult) {

				if (qrcode_name !== decodedText) {
					Swal.fire("Opps!", "QR Code yang Anda Scan tidak teridentifikasi, Pastikan QR Code berasal dari Instansi/Admin.", "error");
					if (html5QrcodeScanner.getState() !== Html5QrcodeScannerState.NOT_STARTED) {
						html5QrcodeScanner.pause();
					}
					setTimeout(function() {
						html5QrcodeScanner.resume();
					}, 5000);
				} else {
					sendDataPresent();
					if (html5QrcodeScanner.getState() !== Html5QrcodeScannerState.NOT_STARTED) {
						html5QrcodeScanner.pause();
					}
					setTimeout(function() {
						html5QrcodeScanner.resume();
					}, 5000);
				}

			}

			var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", {
				fps: 10,
				qrbox: 200,
			});
			html5QrcodeScanner.render(onScanSuccess);
		});
	</script>
	<script>
		$('.button-load').click(function() {
			KTApp.blockPage({
				overlayColor: '#FFA800',
				state: 'warning',
				size: 'lg',
				opacity: 0.2,
				message: 'Silahkan Tunggu...'
			});
		});
	</script>
	<script>
		$('#example_1').whatsappChatSupport();
	</script>
	<script>
		$('.dropify_masuk').dropify({
			messages: {
				'default': 'Klik atau Geser untuk upload foto Anda disini',
				'replace': 'Klik atau Geser untuk upload foto Anda disinii',
				'remove': 'Hapus',
				'error': 'Ooops, terjadi kesalahan.'
			}
		});
	</script>
	<script>
		$(document).ready(function() {
			setInterval(timestamp, 1000);
		});

		function timestamp() {
			$.ajax({
				url: '<?php echo site_url('present/history/present/timer_clock') ?>',
				success: function(data) {
					$('#timestamp').html(data);
				},
			});
		}
	</script>

</body>
<!--end::Body-->

</html>
