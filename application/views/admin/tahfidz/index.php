<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data Tahfizh Santri</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="fas fa-gavel"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">General</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Data Tahfizh Santri</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
						<div class="d-flex align-items-center">
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalpp">
									<i class="fa fa-plus"></i>
									Tambah Data
								</button>
							</div>
							<br>
							<div class="d-flex align-items-center">
								<a target="_blank" href="<?= base_url('admin/laporan/l_tf'); ?>" class="btn btn-warning btn-sm ml-auto">
									<i class="fa fa-print"></i>
									Print Data
								</a>&nbsp;
								<a target="_blank" href="<?= base_url('admin/laporan/export_Apel'); ?>" class="btn btn-info btn-sm ">
									<i class="fa fa-download"></i>
									Download Data
								</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="basic-datatables" class="display table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Santri</th>
												<th>Status</th>
												<th>Ayat</th>
												<th>Surat</th>
												<th>Juz</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $n = 1;
											foreach ($pp as $l) : ?>

												<tr>
													<td><?= $n++; ?></td>
													<td><?= $l->nama ?></td>
													<td><?= $l->status_tahfidz ?></td>
													<td><?= $l->ayat ?> Ayat</td>
													<td> <?= $l->surat ?> Surat</td>
													<td><?= $l->juz ?> Juz</td>

													<td style="width:10%;">
														<div class="row">
															<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalsantriz<?= $l->code_tahfidz ?>"><i class="fa fa-edit"></i></button>
															<a href="<?= base_url('admin/tahfidz/delete/');
																		echo $l->code_tahfidz  ?>" class="btn btn-danger btn-sm text-white ml-1"><i class="fa fa-trash"></i> </a>
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
				





	<!-- Modal Edit -->
	<?php foreach ($pp as $l) { ?>
		<div class="modal fade" id="modalsantriz<?= $l->code_tahfidz ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data Santri/Wati</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
							<form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('admin/tahfidz/edit'); ?>">
								<div class="row">
									<div class="col">
										<label for="nis">NIS</label>
										<a href="javascript:void(0);" NAME="NIS" title="Klik Untuk Cari NIS" onClick='javascript:window.open("ep","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
											<input type="text" name="nise" onchange="ambilnise(this.value)" value="<?= $l->nis ?>" class="form-control" id="nisee" placeholder="NIS">
										</a>

									</div>
								</div>
								<div class="row">
									<div class="col">
										<label for="nama">Nama</label>
										<input type="text" name="" class="form-control" value="<?= $l->nama ?>" readonly id="nama" placeholder="Nama">
									</div>
								</div>
								<br>
								<div class="row">

									<div class="col">
										<label for="foto">Status</label>
										<select class="form-control" name="state">
											<option>- Pilih Status -</option>
											<option <?= $l->status_tahfidz == 'TAHSIN' ? 'selected' :'' ?>>TAHSIN</option>
											<option <?= $l->status_tahfidz == 'I`DAD' ? 'selected' :'' ?>>I`DAD</option>
											<option <?= $l->status_tahfidz == 'TAHFIZH' ? 'selected' :'' ?>>TAHFIZH</option>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col">
										<label for="alamat">Ayat</label>
										<input type="text" name="ayate" value="<?= $l->ayat ?>" class="form-control" id="alamat" placeholder="Alamat">
										
									</div>
									<div class="col">
										<label for="alamat">Surat</label>
										<input type="text" name="surate" value="<?= $l->surat ?>" class="form-control" id="alamat" placeholder="Alamat">
										
									</div>
									<div class="col">
										<label for="alamat">Juz</label>
										<input type="text" name="juze" value="<?= $l->juz ?>" class="form-control" id="alamat" placeholder="Alamat">
										
										<input type="hidden" name="idx" value="<?= $l->code_tahfidz ?>">
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
	<?php } ?>


	<!-- Modal -->
	<div class="modal fade" id="modalpp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title" id="exampleModalLabel">Form Data Pelanggaran Bahasa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="f1" method="post" action="<?= base_url('admin/tahfidz/tb_data'); ?>">

						<div class="row">
							<div class="col">
								<label for="foto">Nama Santri</label>

								<a href="javascript:void(0);" style="cursor: pointer;" NAME="SANTRI" title="Klik Untuk Cari SANTRI" onClick='javascript:window.open("admin/t_santri_konsulat","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
									<input type="text" name="ns" onchange="ambilniskon(this.value)" class="form-control" id="ns" placeholder="Klik untuk pilih santri">
								</a>
								<input type="hidden" name="nis" id="nis" class="form-control">
							</div>

						</div><br>
						<div class="row">
							<div class="col">
								<label for="foto">Status</label>
								<select class="form-control" name="stat">
									<option>- Pilih Status -</option>
									<option>TAHSIN</option>
									<option>I`DAD</option>
									<option>TAHFIZH</option>
								</select>

							</div>

						</div><br>
						<div class="row">	
							<div class="col">
								<label for="foto">Ayat</label>
								<input type="number" name="ayat" class="form-control" placeholder="Input Ayat">
							</div>
							<div class="col">
								<label>Surat</label>
								<input type="number" name="surat" class="form-control" placeholder="Input Surat">
							</div>
							<div class="col">
								<label>Juz</label>
								<input type="number" name="juz" class="form-control" placeholder="Input Juz">
							</div>
						</div><br>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
					</form>
				</div>
			</div>
	</div>
	</div>





	<script>
		<?php

		$array = "var data = new Array();\n";
		foreach ($tsantrikonsulat as $row) {
			$m = $row->nama;
			$array .= "data['" . $row->nama . "'] = {ns :'" . $row->nama . "',nis :'" . $row->nis  . "'};\n";
		}

		echo $array; ?>

		function ambilniskon(nama) {


			document.getElementById('nis').value = data[nama].nis;
			document.getElementById('nise').value = data[nama].nis;


		};
	</script>