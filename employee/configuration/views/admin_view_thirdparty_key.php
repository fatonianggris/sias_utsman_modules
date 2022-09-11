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
							<a href="" class="text-muted">Konfigurasi Third Party</a>
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
								Edit Konfigurasi Third Party
							</h3>
						</div>
						<!--begin::Form-->
						<form class="form" novalidate="novalidate" action="<?php echo site_url('employee/configuration/settings/update_third_party'); ?>" enctype="multipart/form-data" method="post" id="kt_add_thridparty_form">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 text-center">
										<div class="form-group">
											<h5 class="text-center font-weight-bolder mb-5 text-danger">
												ONE SIGNAL PEGAWAI (notifikasi)
										</div>
									</div>
									<div class="col-lg-6 text-center">
										<div class="form-group">
											<h5 class="text-center font-weight-bolder mb-5 text-danger">
												ONE SIGNAL SISWA (notifikasi)
											</h5>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>One Signal App ID</label>
											<textarea class="form-control" placeholder="Isikan One Signal App ID" name="onesignal_app_id_emp" rows="4"><?php echo $thirdparty[0]->onesignal_app_id_emp; ?></textarea>
											<span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan One Signal App ID</span>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>One Signal App ID</label>
											<textarea class="form-control" placeholder="Isikan One Signal App ID" name="onesignal_app_id_stu" rows="4"><?php echo $thirdparty[0]->onesignal_app_id_stu; ?></textarea>
											<span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan One Signal App ID</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>One Signal App ID Safari</label>
											<textarea class="form-control" placeholder="Isikan One Signal App ID" name="onesignal_app_id_emp_safari" rows="4"><?php echo $thirdparty[0]->onesignal_app_id_emp_safari; ?></textarea>
											<span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan One Signal App ID</span>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>One Signal App ID Safari</label>
											<textarea class="form-control" placeholder="Isikan One Signal App ID" name="onesignal_app_id_stu_safari" rows="4"><?php echo $thirdparty[0]->onesignal_app_id_stu_safari; ?></textarea>
											<span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan One Signal App ID</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>One Signal Auth Key</label>
											<input type="text" name="onesignal_auth_emp" value="<?php echo $thirdparty[0]->onesignal_auth_emp ?>" class="form-control  form-control-lg" placeholder="Isikan One Signal Auth Key" />
											<span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan One Signal Auth Key</span>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>One Signal Auth Key</label>
											<input type="text" name="onesignal_auth_stu" value="<?php echo $thirdparty[0]->onesignal_auth_stu ?>" class="form-control  form-control-lg" placeholder="Isikan One Signal Auth Key" />
											<span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan One Signal Auth Key</span>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button id="kt_login_signin_submit" class="btn btn-success font-weight-bold py-4 col-lg-1 col-12">Simpan</button>
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
<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/forms/validation/form-controls-thridparty.js">
</script>
