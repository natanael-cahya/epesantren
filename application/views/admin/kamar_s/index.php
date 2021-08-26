<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data kamar Ismah</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="fa fa-building"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">UMUM</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Data Kamar Santri Ismah</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
						<!-- Menu kelassssssssss -->
			<div class="d-flex align-items-center">
			<button class="btn btn-info ">AT-Taubah</button>
			<button class="btn btn-danger ml-2">AL-Ikhlas</button>
			<button class="btn btn-secondary ml-2">AL-Kautsar Selatan</button>
			<button class="btn btn-dark ml-2">AL-Kautsar Utara</button>
			<button class="btn btn-warning ml-2">AN-Nur</button>
			<button class="btn btn-primary ml-2">AN-Nisa'</button>
			</div>

			<!-- Menu kelassssssssss -->
							<div class="d-flex align-items-center">
							<a href="<?= base_url('admin/laporan/l_kamarS'); ?>/L" target="_blank" class="btn btn-warning btn-sm ml-auto">
									<i class="fa fa-print"></i>
									Print Data
								</a>&nbsp;&nbsp;
								<a href="<?= base_url('admin/laporan/export_kamar'); ?>/L" target="_blank" class="btn btn-info btn-sm ">
									<i class="fa fa-download"></i>
									Download Data
								</a>
							</div><br>
							<div class="d-flex align-items-center">

							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="basic-datatables" class="display table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Santri</th>
												<th>Wali Kamar</th>
												<th>RAYON</th>
												<th>Ruang kamar</th>
												
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											<?php $p = 1;
											foreach ($kmr as $key) : ?>

												<tr>
													<td><?= $p++; ?></td>
													<td><?= $key->nama ?></td>
													<td><?= $key->wali_kamar ?></td>
													<td><?= $key->rayon ?></td>
													<td><?= $key->rayon ?> <?= $key->ruang_kamar ?></td>
													
													<td>
														<div class="row">

															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalsantriz<?= $key->nis ?>">Edit</button>
															

														</div>
													</td>
												</tr>

											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Edit -->
	<?php foreach ($kmr as $key) { ?>
		<div class="modal fade" id="modalsantriz<?= $key->nis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data Kamar Santri/Wati</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
							<form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('admin/crud_kamar/ed_kmr'); ?>">
								<div class="row">
									<div class="col">
										<label for="nis">NIS</label>
										<a href="javascript:void(0);" NAME="NIS" title="Klik Untuk Cari NIS" onClick='javascript:window.open("ekamar","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
											<input type="text" name="nise" onchange="ambilnise(this.value)" value="<?= $key->nis ?>" class="form-control" id="nisee" placeholder="NIS">
										</a>

									</div>
								</div>
								<div class="row">
									<div class="col">
										<label for="nama">Nama</label>
										<input type="text" name="" class="form-control" value="<?= $key->nama ?>" id="nama" placeholder="Nama">
									</div>
								</div>
								<br>
								<div class="row">

									<div class="col">
										<label for="foto">Kamar</label>
										<select name="kmare" class="form-control">
											<option value="<?= $key->code_kamar ?>">-Jangan di ubah jika tak ingin diganti-</option>
											<?php foreach($kmr as $a){ ?>
											<option value="<?= $a->code_kamar ?>"><?= $a->rayon ?> <?= $a->ruang_kamar ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<input type="hidden" value="<?= $this->uri->segment(3) ?>" name="urii">
								
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
						</form>
				
					</div>
				</div>
			</div>
		</div>
	<?php } ?>


	<!-- Modal -->
	<div class="modal fade" id="modalkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title" id="exampleModalLabel">Form Data Kamar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="f1z" method="post" action="<?= base_url('admin/crud_kamar/tb_kamar'); ?>">
						<?php $u = $this->uri->segment(3) ?>
						<div class="row">
							<input type="hidden" name="uri" value="<?= $u ?>">
							<input type="hidden" name="g" value="L">
							<div class="col">
								<label for="foto">Wali Kamar</label>
								<input type="text" name="wk" class="form-control" placeholder="Input Wali kamar">

							</div>
						</div>
						<br>
						<div class="row">

							<div class="col">
								<label for="foto">Rayon</label>
								<select name="rayon" class="form-control">
									<option value="AT-Ikhlas">AL-Ikhlas</option>
									<option value="AT-Taubah">AT-Taubah</option>
									<option value="AL-Kautsar Selatan">AL-Kautsar Selatan</option>
									<option value="AL-Kautsar Utara">AL-Kautsar Utara</option>
									<option value="AN-Nur">AN-Nur</option>
									<option value="AN-Nissa'">AN-Nissa'</option>
								</select>

							</div>
							<div class="col">
								<label for="foto">No Kamar</label>
								<select name="rk" class="form-control">
									<?php for ($i = 1; $i <= 15; $i++) { ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php } ?>
								</select>

							</div>

						</div>
						<br>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>