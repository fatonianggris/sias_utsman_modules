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
							<!--begin::Notice-->
							<?php $user = $this->session->userdata('sias-employee'); ?>
							<!--end::Notice-->
							<!--begin::Notice-->
							<?php echo $this->session->flashdata('flash_message'); ?>
							<!--end::Notice-->
							<!--begin::Card-->
							<div class="card card-custom">
								<div class="card-body">
									<!--begin: Search Form-->
									<div class="mb-2">
										<div class="row align-items-center">
											<div class="col-lg-11">
												<form class="mb-5">
													<div class="row mb-6">
														<div class="col-lg-3 mb-lg-0 mb-6">
															<label>Status Masuk:</label>
															<select class="form-control datatable-input" data-col-index="2">
																<option value="">Status Masuk</option>
																<option value="1">Hadir</option>
																<option value="2">Izin</option>
																<option value="3">Alpha</option>
																<option value="">Semua</option>
															</select>
														</div>
														<div class="col-lg-3 mb-lg-0 mb-6">
															<label>Status Pulang:</label>
															<select class="form-control datatable-input" data-col-index="5">
																<option value="">Status Pulang</option>
																<option value="1">Hadir</option>
																<option value="2">Izin</option>
																<option value="3">Alpha</option>
																<option value="">Semua</option>
															</select>
														</div>
														<div class="col-lg-4 mb-lg-0 mb-6">
															<label>Tanggal Absen:</label>
															<div class="input-daterange input-group" id="kt_datepicker_table">
																<input type="text" class="form-control datatable-input" name="start" placeholder="From" data-col-index="8" />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-ellipsis-h"></i>
																	</span>
																</div>
																<input type="text" class="form-control datatable-input" name="end" placeholder="To" data-col-index="8" />
															</div>
														</div>
														<div class="col-lg-2 mb-lg-0 mb-6">
															<label>Tahun Ajaran:</label>
															<select class="form-control datatable-input" data-col-index="9">
																<option value="">Tahun Ajaran</option>
																<?php
																if (!empty($schoolyear)) {
																	foreach ($schoolyear as $key => $value_sch) {
																?>
																		<option value="<?php echo $value_sch->tahun_awal . '-' . $value_sch->tahun_akhir; ?>"><?php echo strtoupper($value_sch->tahun_awal . '-' . $value_sch->tahun_akhir); ?></option>
																<?php
																	}
																}
																?>
																<option value="">SEMUA</option>
															</select>
														</div>
													</div>
													<div class="row mt-5">
														<div class="col-lg-11">
															<button class="btn btn-success btn-success--icon" id="kt_search">
																<span>
																	<i class="la la-search"></i>
																	<span>Search</span>
																</span></button>&#160;&#160;
															<button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
																<span>
																	<i class="la la-close"></i>
																	<span>Reset</span>
																</span>
															</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-lg-1 mt-20 text-right">
												<div class="btn-group">
													<button class="btn btn-primary font-weight-bold btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Aksi
													</button>
													<div class="dropdown-menu">
														<form class="form" id="frm-excel" action="<?php echo site_url('employee/report/export/export_present_day_csv'); ?>" method="POST">
															<input type="text" id="id_check_excel" class="form-control" value="" name="data_check" style="display:none">
															<button class="dropdown-item text-primary" role="button" type="submit"><i class="flaticon2-file-1 text-primary"></i> Export csv</button>
														</form>

													</div>
												</div>
											</div>
										</div>
									</div>
									<!--end::Search Form-->
									<!--begin: Datatable-->
									<table class="table table-separate table-hover table-light-primary table-checkable" id="kt_datatable_present">
										<thead>
											<tr>
												<th class="text-center"></th>
												<th>Nama Pegawai</th>
												<th>Status Masuk</th>
												<th>Waktu Masuk</th>
												<th>Telat Masuk</th>
												<th>Waktu Pulang</th>
												<th>Status Pulang</th>
												<th>Telat Pulang</th>
												<th>Tanggal</th>
												<th>Tahun Ajaran</th>
											</tr>
										</thead>
									</table>
									<!--end: Datatable-->
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

<script src="<?php echo base_url(); ?>assets/employee/dist/assets/js/pages/crud/datatables/search-options/advanced-search-present-day.js"></script>
