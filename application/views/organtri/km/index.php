<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data Pelanggaran Keamanan</h4>
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
						<a href="#">Data Pelanggaran Keamanan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<button class="btn btn-primary btn-round mr-auto" data-toggle="modal" data-target="#modalpp">
									<i class="fa fa-plus"></i>
									Tambah Data
								</button>

							
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="basic-datatables" class="display table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Santri</th>
												<th>Pelanggaran</th>
												<th>Tanggal</th>
												<th>Waktu</th>
												<th>Sanksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $n = 1;
											foreach ($pp as $l) : ?>

												<tr>
													<td><?= $n++; ?></td>
													<td><?= $l->nama ?></td>
													<td><?= $l->pelanggaran ?></td>
													<td><?php echo date("d-m-Y", strtotime($l->tgl)); ?></td>
													<td> <?= $l->waktu ?></td>
													<td><?= $l->sanksi ?></td>
													
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
	<?php foreach ($pp as $key) { ?>
		<div class="modal fade" id="modalsantriz<?= $key->nis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data Santri/Wati</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?php foreach ($pp as $k) { ?>
							<form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('organtri/crud_pelanggaran/ed_pel'); ?>">
								<div class="row">
									<div class="col">
										<label for="nis">NIS</label>
										<a href="javascript:void(0);" NAME="NIS" title="Klik Untuk Cari NIS" onClick='javascript:window.open("ep","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
											<input type="text" name="nise" onchange="ambilnise(this.value)" value="<?= $k->nis ?>" class="form-control" id="nisee" placeholder="NIS">
										</a>

									</div>
								</div>
								<div class="row">
									<div class="col">
										<label for="nama">Nama</label>
										<input type="text" name="" class="form-control" value="<?= $k->nama ?>" readonly id="nama" placeholder="Nama">
									</div>
								</div>
								<br>
								<div class="row">

									<div class="col">
										<label for="foto">Pelanggaran</label>
										<input type="text" name="plg" class="form-control" value="<?= $k->pelanggaran ?>">
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col">
										<label for="alamat">Sanksi</label>
										<input type="text" name="sanks" value="<?= $k->sanksi ?>" class="form-control" id="alamat" placeholder="Alamat">
										<input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
										<input type="hidden" name="idx" value="<?= $k->code_pelanggaran ?>">
									</div>
								</div>
								<br>
								
							
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
						</form>
					<?php } ?>
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
					<h5 class="modal-title" id="exampleModalLabel">Form Data Pelanggaran Keamanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="f1" method="post" action="<?= base_url('admin/crud_pelanggaran/tb_pel'); ?>">

						<div class="row">
							<div class="col">
								<label for="foto">Nama Santri</label>

								<a href="javascript:void(0);" style="cursor: pointer;" NAME="SANTRI" title="Klik Untuk Cari SANTRI" onClick='javascript:window.open("t_santri_konsulat","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
									<input type="text" name="ns" onchange="ambilniskon(this.value)" class="form-control" id="ns" placeholder="Klik untuk pilih santri">
								</a>
								<input type="hidden" name="nis" id="nis" class="form-control">
							</div>

						</div><br>
						<div class="row">
							<div class="col">
								<label for="foto">Pelanggaran</label>
								<input type="text" name="pelanggaran" class="form-control" required placeholder="Input pelanggaran yang dilakukan santri">

							</div>

						</div><br>
						<div class="row">

							<div class="col">
								<label for="foto">Hari</label>
								<?php $t = date("l"); ?>

								<input type="text" name="hari" class="form-control" value="<?php
																							if ($t == 'Monday') {
																								echo "Senin";
																							} else
									if ($t == 'Tuesday') {
																								echo "Selasa";
																							} else
									if ($t == 'Wednesday') {
																								echo "Rabu";
																							} else
									if ($t == 'Thursday') {
																								echo "Kamis";
																							} else
									if ($t == 'Friday') {
																								echo "Jum'at";
																							} else
									if ($t == 'Saturday') {
																								echo "Sabtu";
																							} else
									if ($t == 'Sunday') {
																								echo "Minggu";
																							}

																							?>" readonly>

							</div>
							<div class="col">
								<label for="foto">Tanggal</label>
								<input type="text" value="<?= date('Y-m-d') ?>" name="tgl" class="form-control" readonly>
							</div>
							<div class="col">
								<label for="foto">Jam</label>
								<input type="text" value="<?= date('H:i:s') ?>" name="jam" class="form-control" readonly>
							</div>
						</div><br>
						<div class="row">
							<div class="col">
								<label for="foto">Sanksi</label>
								<input type="text" name="sanksi" class="form-control" placeholder="Input Sanksi" required>
								<input type="hidden" class="form-control" name="sort" value="keamanan">
								<input type="hidden" class="form-control" name="uri" value="<?= $this->uri->segment(3); ?>">
							</div>
						</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalpr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title" id="exampleModalLabel">Pemilihan Data yang Akan di Print</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="f2" method="post" action="">
						<div class="row">
							<div class="col">
								<label for="foto">Pilih Pelanggaran Yang akan Di cetak</label>
								<select class="form-control" name="pel">
									<option value="kmi">Pelanggaran KMI</option>
									<option value="pengasuhan">Pelanggaran Pengasuhan</option>
									<option value="bahasa">Pelanggaran Bahasa</option>
									<option value="peribadatan">Pelanggaran Peribadatan</option>
								</select>

							</div>

						</div>


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


		};
	</script>