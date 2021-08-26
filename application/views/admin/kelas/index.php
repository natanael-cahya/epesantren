<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Dashboard</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="fas fa-school"></i>
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
						<a href="#">Data Kelas Ismah</a>

					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Data Kelas Ismah</h4>

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
												<th>Lembaga</th>
												<th>Marhalah</th>
												<th>Gedung Kelas</th>
												<th>No Gedung</th>
												<th>Kelas</th>
												<th>Wali Kelas</th>
												<th>Asisten</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											<?php $p = 1;
											foreach ($kls as $key) : ?>

												<tr>
													<td><?= $p++; ?></td>
													<td><?= $key->lembagaa ?></td>
													<td><?= $key->marhalah ?></td>
													<td><?= $key->nama_kelas ?></td>
													<td><?= $key->no_kls ?></td>
													<td><?= $key->kelass ?></td>
													<td><?= $key->wali_kelas ?></td>
													<td><?= $key->asisten ?></td>
													<td style="width:10%;">
														<div class="row">

															<a class="btn btn-primary btn-xs text-white" data-toggle="modal" data-target="#modaled<?= $key->code_kelas ?>"><i class="fa fa-edit"></i></a>
															<a class="btn btn-danger btn-xs text-white ml-1" href="<?= base_url('admin/crud_kelas/h_kelas/');
																													echo $key->code_kelas . '/' . $this->uri->segment(3) ?>"><i class="fa fa-trash"></i></a>

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
					<h5 class="modal-title" id="exampleModalLabel">Form Data Kelas Ismah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="f1z" method="post" action="<?= base_url('admin/crud_kelas/tb_kelas'); ?>">

						<div class="row">

							<div class="col">
								<label for="foto">Lembaga</label>
								<select name="lembaga" id="lembaga" class="form-control lembaga" required>
									<option value="0">-PILIH LEMBAGA-</option>
									<?php foreach ($lembaga as $row) : ?>
										<option value="<?= $row->id_lembaga; ?>"><?= $row->lembagaa; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col">
								<label for="foto">Marhalah</label>
								<select name="marhalah" id="marhalah" class="marhalah form-control" required>
									<option value="0">-PILIH MARHALAH-</option>
								</select>
							</div>

						</div>
						<br>
						<div class="row">


							<div class="col">
								<label for="foto">Gedung Kelas</label>
								<select name="rk" class="form-control" required>
									<option value="AT-Taubah">AT-Taubah</option>
									<option value="AL-Ikhlas">AL-Ikhlas</option>
									<option value="AR-Rahman">AR-Rahman</option>
									<option value="AL-Kautsar Selatan atas">AL-Kautsar Selatan atas</option>
									<option value="AL-Kautsar Selatan bawah">AL-Kautsar Selatan bawah</option>
									<option value="AN-Nur">AN-Nur</option>
									<option value="Perdana">Perdana</option>
									<option value="AN-Nisa`">AN-Nisa'</option>
									<option value="AL-Kautsar Utara atas">AL-Kautsar Utara atas</option>
									<option value="ÀL-Kautsar Utara bawah Khodijah">ÀL-Kautsar Utara bawah Khodijah</option>

								</select>

							</div>
							<div class="col">
							<label for="foto">No Gedung Kelas</label>
							<select class="form-control" name="nk">
								<option style="color: green;"><b>= Lantai Bawah =</b></option>
								<?php for($i=1;$i<=15;$i++){ ?>
								<option value="<?php if($i<10) {echo "00".$i; }else{echo "0".$i;} ?>"><?php if($i<10) {echo "00".$i; }else{echo "0".$i;} ?></option>
								<?php } ?>
								<option style="color: green;"><b>= Lantai Atas =</b></option>
								<?php for($i=101;$i<=115;$i++){ ?>
								<option value="<?= $i ?>"><?= $i ?></option>
								<?php } ?>
							</select>
							</div>			

							<div class="col">
								<label for="foto">Kelas</label>
								<select name="kls" required class="kls form-control" required>
									<option>-PILIH KELAS-</option>
									<option style="color: green;"><b>(SMP / Wustha)</b></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option style="color: green;"><b>(MA / `Ulya`)</b></option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>

								</select>
							</div>
							<div class="col">
								<label for="foto">Kelas</label>
								<select name="kls_a" class="form-control" required>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>

								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="foto">Wali Kelas</label>
								<a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR" onClick='javascript:window.open("twalikelaslaki","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
									<input type="text" class="form-control" name="wk" id="wk" placeholder="Nama Wali kelas" required>
								</a>
							</div>
							<div class="col">
								<label for="foto">Asisten</label>
								<a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR" onClick='javascript:window.open("tasistenlaki","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
									<input type="text" class="form-control" name="as" id="as" placeholder="Nama Asisten" required>
								</a>
								<input type="hidden" name="g" value="L">
								<input type="hidden" value="<?= $this->uri->segment(3); ?>" name="uri">
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


	<?php foreach ($kls as $key) : ?>
		<!-- Modal edit -->
		<div class="modal fade" id="modaled<?= $key->code_kelas ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h5 class="modal-title" id="exampleModalLabel">Form Data Kelas Ismah</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<form name="f1z" method="post" action="<?= base_url('admin/crud_kelas/ed_kelas'); ?>">

							<div class="row">

								<div class="col">
									<label for="foto">Lembaga</label>
									<select name="lembagae" id="lembaga" class=" lembaga form-control" required>
										<option value="<?= $key->id_lembaga ?>">-Jangan diubah bila tak ingin dirubah-</option>
										<?php foreach ($lembaga as $row) : ?>
											<option value="<?= $row->id_lembaga; ?>"><?= $row->lembaga; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col">
									<label for="foto">Marhalah</label>
									<select name="marhalahe" id="marhalah" class="marhalah form-control" required>
										<option value="<?= $key->marhalah ?>">-Jangan diubah bila tak ingin dirubah-</option>
									</select>
								</div>

							</div>
							<br>
							<div class="row">


								<div class="col">
									<label for="foto">Gedung Kelas</label>
									<select name="rke" class="form-control" required>
										<option value="<?= $key->nama_kelas ?>">-Jangan diubah bila tak ingin dirubah-</option>
										<option value="AT-Taubah">AT-Taubah</option>
										<option value="AL-Ikhlas">AL-Ikhlas</option>
										<option value="AR-Rahman">AR-Rahman</option>
										<option value="AL-Kautsar Selatan atas">AL-Kautsar Selatan atas</option>
										<option value="AL-Kautsar Selatan bawah">AL-Kautsar Selatan bawah</option>
										<option value="AN-Nur">AN-Nur</option>
										<option value="Perdana">Perdana</option>
										<option value="AN-Nisa`">AN-Nisa'</option>
										<option value="AL-Kautsar Utara atas">AL-Kautsar Utara atas</option>
										<option value="ÀL-Kautsar Utara bawah Khodijah">ÀL-Kautsar Utara bawah Khodijah</option>

									</select>

								</div>

								<div class="col">
							<label for="foto">No Gedung Kelas</label>
							<select class="form-control" name="nk">
								<option style="color: green;"><b>= Lantai Bawah =</b></option>
								<?php for($i=1;$i<=15;$i++){ ?>
								<option value="<?php if($i<10) {echo "00".$i; }else{echo "0".$i;} ?>"><?php if($i<10) {echo "00".$i; }else{echo "0".$i;} ?></option>
								<?php } ?>
								<option style="color: green;"><b>= Lantai Atas =</b></option>
								<?php for($i=101;$i<=115;$i++){ ?>
								<option value="<?= $i ?>"><?= $i ?></option>
								<?php } ?>
							</select>
							</div>	


								<div class="col">
									<label for="foto">Kelas</label>
									<input name="kelase" type="text" value="<?= $key->kelass ?>" class="form-control">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col">
									<label for="foto">Wali Kelas</label>
									<a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR" onClick='javascript:window.open("ewalikelaslaki","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
										<input type="text" class="form-control" value="<?= $key->wali_kelas ?>" name="wke" id="wke" placeholder="Nama Wali kelas" required>
									</a>
								</div>
								<div class="col">
									<label for="foto">Asisten</label>
									<a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR" onClick='javascript:window.open("easistenlaki","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
										<input type="text" class="form-control" value="<?= $key->asisten ?>" name="ase" id="ase" placeholder="Nama Asisten" required>
									</a>
									<input type="hidden" name="ge" value="L">
									<input type="hidden" value="<?= $this->uri->segment(3); ?>" name="urie">
									<input type="hidden" name="par" value="<?= $key->code_kelas ?>">
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

	<?php endforeach;  ?>