

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Dashboard</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
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
						<a href="#">Data Santri</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Santri/Wati PP. AL-MASHDUQIAH </h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalsantri">
									<i class="fa fa-plus"></i>
									Tambah Data
								</button>
							</div>
							<br>
							<div class="d-flex align-items-center">
							<a target="_blank" href="<?= base_url('admin/laporan/l_dsantri'); ?>" class="btn btn-warning btn-sm ml-auto" target="_blank">
									<i class="fa fa-print"></i>
									Print Data
								</a>&nbsp;|&nbsp;
								<a target="_blank" href="<?= base_url('admin/laporan/export_santrii'); ?>" class="btn btn-info btn-sm">
									<i class="fa fa-download"></i>
									Download Data
								</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="basic-datatables" class="display table table-striped table-hover">
										<thead>
											<tr>
												<th>NIS</th>
												<th>Foto</th>
												<th>Nama Santri</th>
												<th>nama Orang Tua</th>
												<th>Status</th>

												<th style="width:150px;">#</th>

											</tr>
										</thead>
										<tbody>
											<?php foreach ($santri as $key) { ?>

												<tr <?= $key->status == 'Alumni' ? "style='background-color:red;color:white;'": "" ?>>
													<td><?= $key->nis ?></td>
													<td>
														<a class="image-popup-vertical-fit" href="<?= base_url('upload_img/foto_santri/') ?><?= $key->foto ?>">
															<img src="<?= base_url('upload_img/foto_santri/') ?><?= $key->foto ?>" width="85px" height="100px">
														</a>
													</td>
													<td><?= $key->nama ?></td>
													<td><?= $key->nama_ayah ?> & <?= $key->nama_ibu ?></td>
													<td><?= $key->status ?> </td>
													

													<td>
														<a class="btn btn-primary btn-xs text-white" data-toggle="modal" data-target="#modaldetail<?= $key->nis ?>"><i class="fa fa-eye"></i> </a>
														<a class="btn btn-info btn-xs text-white" data-toggle="modal" data-target="#modaldetailz<?= $key->nis ?>"><i class="fa fa-pencil-alt"> </i> </a>
														<a href="<?= base_url('admin/crud_dsantri/h_santri/'); echo $key->nis.'/'.$key->id_ortu ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
													</td>

												</tr>

											<?php } ?>
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
	

	<?php foreach ($santri as $key) { ?>
		<!-- Modal Detail-->
		<div class="modal fade" id="modaldetail<?= $key->nis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h5 class="modal-title" id="exampleModalLabel">Detail Data Santri</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" >
		
						<div class="table-responsive">
						
							<table width="100%" border="0" style="font-size:14px">
								<?php //foreach ($santri as $key) { ?>
									<tr>
										<td rowspan="17">
											<center>
												<img src="<?= base_url('upload_img/foto_santri/') ?><?= $key->foto ?>" style="border-radius: 5px; width: 280px; height: 350px;">
											</center>
										</td>
									</tr>

									<tr>
										<td width="150">NIS </td>
										<td width="10">:</td>
										<td><?= $key->nis ?></td>

									</tr>
									<tr>
										<td>Nama Santri</td>
										<td>:</td>
										<td><b><?= $key->nama ?></b></td>

									</tr>
									<tr>
										<td>Nama Orang Tua</td>
										<td>:</td>
										<td><?= $key->nama_ayah ?> & <?= $key->nama_ibu ?></td>
									</tr>
									<tr>
										<td>Pekerjaan Ayah</td>
										<td>:</td>
										<td><?= $key->pekerjaan_ayah ?></td>
									</tr>
									<tr>
										<td>Pekerjaan Ibu</td>
										<td>:</td>
										<td><?= $key->pekerjaan_ibu ?></td>
									</tr>
									<tr>
										<td>Penghasilan Orang tua</td>
										<td>:</td>
										<?php $hl = $key->penghasilan_ayah + $key->penghasilan_ibu; ?>
										<td>&plusmn; Rp.<?= number_format("$hl", 0, ",", ".") ?></td>
									</tr>
									<tr>
										<td>No HP Ayah</td>
										<td>:</td>
										<td><?= $key->no_hp_ayah ?></td>
									</tr>
									<tr>
										<td>No HP Ibu</td>
										<td>:</td>
										<td><?= $key->no_hp_ibu ?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td><?= $key->alamat ?></td>

									</tr>
									<tr>
										<td>Jenis Kelamin</td>
										<td>:</td>
										<td><?= $key->jk ?></td>

									</tr>
									<tr>
										<td>TTL</td>
										<td>:</td>
										<td><?= $key->tempat_lahir ?> , <?php echo date("d-m-Y", strtotime($key->tgl_lahir)); ?></td>

									</tr>
									<tr>
										<td>Kamar <br> Extrakurikuler</td>
										<td>:<br>:</td>
										<td><?= $key->rayon ?> <?= $key->ruang_kamar ?> <br>
											<?php 
											foreach($se as $s){ 
												echo $s->nis == $key->nis ? "  ".$s->nama_extra : '';
												//$key->jk == 'laki-laki' ? "selected": "" 
											 }
											?></td>
											
									</tr>
									<tr>
										<td>Ruang Kelas<br>Kelas</td>
										<td>:<br>:</td>
										<td><?= $key->nama_kelas ?> <br> <?= $key->kelass ?></td>

									</tr>
									<tr>
										<td>No Gedung Kelas</td>
										<td>:</td>
										<td><?= $key->no_kls ?></td>
									</tr>
									<tr>
										<td>Keterangan</td>
										<td>:</td>
										<td><?= $key->keterangan ?></td>

									</tr>
									<tr>
										<td><b>Status</b></td>
										<td>:</td>
										<td><strong><?= $key->status ?></strong></td>

									</tr>


							</table>
							<table id="basic-datatables" border="1" class="display table table-striped table-hover">
								<thead>



								</thead>



							</table>
						</div>
					</div>
					<div class="modal-footer">
						<a href="<?= base_url('admin/crud_dsantri/export/');
									echo $key->nis ?>" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Print Data </a>

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalsantriz<?= $key->nis ?>">Edit</button>
					<?php //} ?>
					</div>
				</div>
			</div>
		</div>
		
		<!-- end modal detail -->
	<?php } ?>

	<?php foreach ($santri as $key) { ?>
		<!-- Modal Detail-->
		<div class="modal fade" id="modaldetailz<?= $key->nis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h5 class="modal-title" id="exampleModalLabel">Detail Data Santri</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="post" action="<?= base_url('admin/crud_dsantri/upd_stats') ?>">
					<div class="modal-body">
				
						<div class="table-responsive">
							<table width="100%" border="0" style="font-size:14px">
								<?php //foreach ($santri as $key) { ?>
									<tr>
										<td rowspan="7">
											<center>
												<img src="<?= base_url('upload_img/foto_santri/') ?><?= $key->foto ?>" style="border-radius: 5px; width: 280px; height: 350px;">
											</center>
										</td>
									</tr>

									<tr>
										<td width="150">NIS </td>
										<td width="10">:</td>
										<td><?= $key->nis ?></td>
										<input type="hidden" value="<?= $key->nis ?>" name="pr">

									</tr>
									<tr>
										<td>Nama Santri</td>
										<td>:</td>
										<td><b><?= $key->nama ?></b></td>

									</tr>
									<tr>
										<td>Jenis Kelamin</td>
										<td>:</td>
										<td><b><?= $key->jk ?></b></td>

									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td><b><?= $key->alamat ?></b></td>

									</tr>
									
									
									<tr>
										<td>Status</td>
										<td>:</td>
										<td>
											<select class="form-control" name="status" id="stat" onchange="abi()">
												<option> - Pilih Status - </option>
											<option <?= $key->status == 'Santri aktif' ? "selected": "" ?> value="Santri aktif">Santri Aktif</option>
											<option <?= $key->status == 'Abituren' ? "selected": "" ?> value="Abituren">Abituren</option>
											<option <?= $key->status == 'LULUS' ? "selected": "" ?> value="LULUS">LULUS</option>
											<option <?= $key->status == 'Pengabdian' ? "selected": "" ?> value="Pengabdian">Pengabdian</option>
											<option <?= $key->status == 'Alumni' ? "selected": "" ?> value="Alumni">Alumni</option>
											</select>
											
										</td>
									</tr>
									<tr>
										<td>Tempat Tugas</td>
										<td>:</td>
										<td>
										<input type="text" name="tmpt" id="respon" class="form-control" value="<?= $key->tempat_abituren ?>">
											*Note: Jika bukan Abituren , Biarkan Kosong
										</td>
									</tr>
									<!-- Hidden TextField -->
									<input type="hidden" name="namaa" value="<?= $key->nama ?>">
									<input type="hidden" name="alamata" value="<?= $key->alamat ?>">
									<input type="hidden" name="jka" value="<?= $key->jk ?>">
									<input type="hidden" name="tempat_lahira" value="<?= $key->tempat_lahir ?>">
									<input type="hidden" name="tgl_lahira" value="<?= $key->tgl_lahir ?>">
									<input type="hidden" name="id_ortua" value="<?= $key->id_ortu ?>">
									<input type="hidden" name="fotoa" value="<?= $key->foto ?>">
									<input type="hidden" name="statusa" value="<?= $key->status ?>">

							</table>
						
						</div>
					</div>
						
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Ubah Status</button>
					</div>

					</form>	
				</div>
			</div>
		</div>
		
		<!-- end modal detail -->
	<?php } ?>

	<!-- Modal Edit -->
	<?php foreach ($santri as $key) { ?>
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
						<?php //foreach ($santri as $k) { ?>
							<form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('admin/crud_dsantri/up_santri'); ?>">
								<div class="row">
									<div class="col">
										<label for="nis">NIS</label>
										
											<input type="text" name="nise" readonly onchange="ambilnise(this.value)" value="<?= $key->nis ?>" class="form-control" id="nise" placeholder="NIS">

									</div>
								</div>
								<div class="row">
									<div class="col">
										<label for="nama">Nama</label>
										<input type="text" required name="namae" class="form-control" value="<?= $key->nama ?>" id="nama" placeholder="Nama">
									</div>
								</div>
								<br>
								<div class="row">

									<div class="col">
										<label for="foto">Jenis Kelamin</label>
										<select name="jke" class="form-control" required>
											<option <?= $key->jk == 'laki-laki' ? "selected": "" ?> value="laki-laki">Laki - Laki</option>
											<option <?= $key->jk == 'Perempuan' ? "selected": "" ?> value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col">
										<label for="alamate">alamat</label>
										<input type="text" required name="alamate" value="<?= $key->alamat ?>" class="form-control" id="alamat" placeholder="Alamat">

									</div>
								</div>
								<br>
								<div class="row">
									<div class="col">
										<label for="alamat">Tempat</label>
										<input type="text" required name="tempate" value="<?= $key->tempat_lahir ?>" class="form-control" placeholder="Tempat lahir">
									</div>
									<div class="col">
										<label for="alamat">Tanggal Lahir</label>
										<input type="text" required name="tgl_lahire" value="<?= $key->tgl_lahir ?>" class="form-control datepicker" placeholder="Tanggal">
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col">
										<label for="foto">Kamar</label>
										<select name="kamare" class="form-control">
											<?php foreach ($kmar as $ka) : ?>
												<option <?= $ka->code_kamar == $key->code_kamar ? "selected" :"" ?> value="<?= $ka->code_kamar ?>"><?= $ka->rayon ?> <?= $ka->ruang_kamar ?></option>
											<?php endforeach ?>
										</select>
									</div>
								
									<div class="col">
										<label for="kelas">Kelas</label>
										<select name="kelase" class="form-control">
											
											<?php foreach ($kls as $ka) : ?>
											
												<option <?= $ka->code_kelas == $key->kelas ? "selected" :"" ?> value="<?= $ka->code_kelas ?>"><?php echo $ka->nama_kelas .' - No: '.$ka->no_kls.' - ['.$ka->kelass.']'; if($ka->gender == 'L'){echo" - (ISMAH)";}else{echo" - (USWAH)";}  ?></option>
											<?php endforeach ?>
										</select>

									</div>

								</div>
								<br>
								
								<div class="row">
									<div class="col">
										<label for="keterangan">keterangan</label>
										<input type="text" name="keterangane" value="<?= $key->keterangan ?>" class="form-control" id="keterangan" placeholder="Keterangan">

									</div>
								</div>
								<br>
								
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
						</form>
					<?php //} ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>


	<!-- Modal Tb data-->
	<div class="modal fade" id="modalsantri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title" id="exampleModalLabel">Form Data Santri</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('admin/crud_dsantri/tb_santri'); ?>">
						<div class="row">
							<div class="col">
								<label for="nis">Kode Ortu</label>
								<a href="javascript:void(0);" NAME="NIS" title="Klik Untuk Cari NIS" onClick='javascript:window.open("tsantri","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
									<input type="text" name="id_ortu" onchange="ambilnis(this.value)" class="form-control" id="ns" placeholder="Klik Untuk Pilih Orang Tua">
								</a>
								<input type="hidden" id="id_details" name="id_details">
							</div>
						</div>
						<br>
						<div class="row">
						<div class="col">
								<label for="nama">NIS</label>
								<input type="text" name="nis" required class="form-control" id="n" placeholder="NIS">
							</div>
							<div class="col">
								<label for="nama">Nama</label>
								<input type="text" name="nama" required class="form-control" id="nama" placeholder="Nama">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="foto">Foto</label>
								<input type="file" name="berkas" class="form-control" id="foto">

							</div>
							<div class="col">
								<label for="foto">Jenis Kelamin</label>
								<select name="jk" class="form-control">
									<option value="laki-laki">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="alamat">alamat</label>
								<input type="text" name="alamat" required class="form-control" id="alamat" placeholder="Alamat">

							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="alamat">Tempat</label>
								<input type="text" name="tempat" required class="form-control" placeholder="Tempat lahir">
							</div>
							<div class="col">
								<label for="alamat">Tanggal Lahir</label>
								<input type="text" name="tgl_lahir" required autocomplete="off" class="form-control datepicker" placeholder="Tanggal">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="foto">Kamar</label>
								<select name="kamar" class="form-control">
									<?php foreach ($kmar as $ka) : ?>
										<option value="<?= $ka->code_kamar ?>"><?= $ka->rayon ?> <?= $ka->ruang_kamar ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col">
								<label for="kelas">Kelas</label>
								<select name="kelas" class="form-control">
									<?php foreach ($kls as $ka) : ?>
										<option value="<?= $ka->code_kelas ?>"><?= $ka->nama_kelas .' - '. $ka->no_kls .' - '. $ka->kelass ?><?= $ka->gender == 'L' ? ' (ISMAH)' : ' (ISWAH)' ?></option>
									<?php endforeach ?>
								</select>

							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="foto">Nama Ayah</label>
								
								<input type="text" class="form-control" name="" readonly id="nama_ayah">
							</div>
							<div class="col">
								<label for="foto">Nama Ibu</label>
								<input type="text" class="form-control" name="nama_ayah" id="nama_ibu" readonly>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="pekerjaan">Pekerjaan</label>
								<input type="text" class="form-control" id="pekerjaan_ayah" readonly>

							</div>
							<div class="col">
								<label for="nope">No Hp Ortu</label>
								<input type="text" class="form-control" id="no_hp_ayah" readonly>

							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="gaji">Gaji Orang Tua</label>
								<input type="text" name="gaji" readonly class="form-control" id="penghasilan_ayah" placeholder="Gaji">

							</div>
							<div class="col">
								<label for="keterangan">keterangan</label>
								<input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">

							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<label for="zz">Status</label>
								<select class="form-control" name="stat">
									<option value="">-Pilih Status-</option>
									<option>Abituren</option>
									<option>Santri aktif</option>	
								</select>

							</div>
							<div class="col">
								<label for="awe">Tempat Tugas</label>
							<input type="text" name="tmpt" id="respon" class="form-control" value="-">
											*Note: Jika bukan Abituren , Biarkan Kosong
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

	function abi(){
		var st = document.getElementById("stat").value;
		var x = document.getElementById("respon");
		console.log(st);
			if (st == "Abituren"){
   				x.style.display = "block";	
			}else{
				x.style.display = "none";
			}
	}
											
	//function abi(){
	//	var st = document.getElementById("stat").value;
	//	var x = document.getElementById("resp");
		
	//	if (st == "Abituren"){
   	//		 x.style.display = "block";	
	//	}else{
	//		x.style.display = "none";
	//	}
	//}

	function tess(){
	var a1 = document.getElementById("sl1").value;
	var a2 = document.getElementById("sl2").value;
	var a3 = document.getElementById("sl3").value;
	
	if(a1 == a2 || a1 == a3 || a2 == a3){
		alert("Extra 1 dan lainnya Harus berbeda!!");
        a2 = ""
        
	}
}
</script>
<script type="text/javascript">


	<?php

$array = "var data = new Array();\n";
foreach ($esantri as $row) {
	$m = $row->id_ortu;
	$array .= "data['" . $row->id_ortu . "'] = {nama :'" . $row->nama . "'};\n";
}
		echo $array; ?>

		function ambilnise(nise) {
			document.getElementById('nama').value = data[nis].nama;


		};
		<?php

		$array = "var data = new Array();\n";
		foreach ($tsantri as $row) {
			$m = $row->id_ortu;
			$array .= "data['" . $row->id_ortu . "'] = {nama_ayah :'" . $row->nama_ayah  . "' , nama_ibu:'" .  $row->nama_ibu . "' , pekerjaan_ayah:'" .  $row->pekerjaan_ayah . "' , penghasilan_ayah:'" .  $row->penghasilan_ayah + $row->penghasilan_ibu . "' , no_hp_ayah:'" .  $row->no_hp_ayah . "'};\n";
		}

		echo $array; ?>

		function ambilnis(ns) {
			//document.getElementById('id_details').value = data[id_ortu].id_details;
			document.getElementById('nama_ayah').value = data[id_ortu].nama_ayah;
			document.getElementById('nama_ibu').value = data[id_ortu].nama_ibu;
			document.getElementById('pekerjaan_ayah').value = data[id_ortu].pekerjaan_ayah;
			document.getElementById('penghasilan_ayah').value = data[id_ortu].penghasilan_ayah;
			document.getElementById('no_hp_ayah').value = data[id_ortu].no_hp_ayah;


		}

	</script>