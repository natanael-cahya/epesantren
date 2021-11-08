
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data perizinan Santri</h4>
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
						<a href="#">Data perizinan Santri</a>
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
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="basic-datatables" class="display table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Santri</th>
												<th>Status Izin</th>
												<th>tanggal izin</th>
                                                <th>Tanggal Selesai</th>
                                                <th>keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php $n = 1;
											foreach ($pp as $l) : ?>

												<tr>
													<td><?= $n++; ?></td>
													<td><?= $l->nama ?></td>
													<td><?= $l->status_perizinan ?></td>
													<td><?= date("d-m-Y",strtotime($l->tgl_mulai)) ?> </td>
                                                    <td><?= date("d-m-Y",strtotime($l->tgl_selesai)) ?></td>
                                                    <td><?= $l->keterangan_izin ?></td>
												
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

					<form name="f1" method="post" action="<?= base_url('organtri/perizinan/tb_data'); ?>">

						<div class="row">
							<div class="col">
								<label for="foto">Nama Santri</label>

								<a href="javascript:void(0);" style="cursor: pointer;" NAME="SANTRI" title="Klik Untuk Cari SANTRI" onClick='javascript:window.open("organtri/t_santri_konsulat","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
									<input type="text" name="ns" onchange="ambilniskon(this.value)" class="form-control" id="ns" placeholder="Klik untuk pilih santri">
								</a>
								<input type="hidden" name="nis" id="nis" class="form-control">
							</div>

						</div><br>
						<div class="row">
							<div class="col">
								<label for="foto">Status Perizinan</label>
								<select class="form-control" name="stat">
									<option>- Pilih Status -</option>
									<option>Sakit</option>
									<option>Pulang</option>
									<option>Keluar Pondok</option>
								</select>

							</div>

						</div><br>
						<div class="row">	
							<div class="col">
                            <label for="foto">Tanggal Mulai</label>
								<input type="text" name="tm" readonly class="form-control" value="<?= date('Y-m-d') ?>">
							</div>
							<div class="col">
                            <label for="foto">Sampai Tanggal</label>
								<input type="date" name="ts" class="form-control">
							</div>
                        </div>
                        <br>
                        <div class="row">  
                            <div class="col">
                                <label>Keterangan IZIN</label>
                            <textarea class="form-control" name="ket"></textarea>
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