<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Dashboard</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="fas fa-chalkboard-teacher"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Master</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Data Kelas Pengajar</a>

					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3>Data Pengajar</h3>
							<div class="d-flex align-items-center">
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalkamar">
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
												<th>nama</th>
												<th>aksi</th>

											</tr>
										</thead>

										<tbody>
											<?php $p = 1;
											foreach ($guru as $key) : ?>
												<tr>
													<td><?= $p++; ?></td>
													<td><?= $key->nama_pengajar ?></td>
													

													<td>
														<div class="row">

															<a class="btn btn-primary btn-sm text-white"  data-toggle="modal" data-target="#modaled<?= $key->code_pengajar ?>"><i class="fa fa-edit"></i></a>
															<a class="btn btn-danger btn-sm text-white ml-1" href="<?= base_url('admin/crud_guru/h_guru/'); echo $key->code_pengajar ?>"><i class="fa fa-trash"></i></a>

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

	<!-- Modal -->
	<div class="modal fade" id="modalkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title" id="exampleModalLabel">Form Data Pengajar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="f1z" method="post" action="<?= base_url('admin/crud_guru/tb_guru'); ?>">

						<div class="row">

							<div class="col">
								<label for="foto">Nama Pengajar</label>
								<input type="text" name="p" class="form-control" placeholder="Input nama Pengajar" required>
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

<?php foreach($guru as $key){ ?>
		<!-- Modal edit -->
		<div class="modal fade" id="modaled<?= $key->code_pengajar ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title" id="exampleModalLabel">Form Data Pengajar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="f1z" method="post" action="<?= base_url('admin/crud_guru/ed_guru'); ?>">

						<div class="row">

							<div class="col">
								<label for="foto">Nama Pengajar</label>
								<input type="text" name="pe" class="form-control" value="<?= $key->nama_pengajar ?>" required>
								<input type="hidden" name="par" value="<?= $key->code_pengajar ?>">
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
	<?php } ?>