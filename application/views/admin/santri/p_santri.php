<!DOCTYPE html>
<html>
<head>
	<title>Report Santri/Wati</title>
</head>
<body>
	<?php foreach($santri as $key): ?>
<div style="text-align: center;font-size:20pt;background-color: ;width: 100%; height: 30px;">
DATA SANTRI/WATI PP. AL-MASHDUQIAH
</div>
<div style="background-color: green;width: 25%;border:solid 3px #000; height: 220px;margin-left:auto;margin-right: auto;margin-top: 50px">
<img src="<?= base_url('upload_img/foto_santri/'); echo $key->foto ?>" width="100%" height="100%">
</div>
<div style="background-color: ;width: 100%; height: auto;margin-top:25px; padding-bottom: 10px;padding-top: 10px;font-size: 13pt;">
<table border="0" align="center" cellspacing="15" width="100%">
		<tr>
			<td>NIS Santri</td><td>:</td><td><?= $key->nis ?></td>
		</tr>
		<tr>
			<td>Nama Santri</td><td>:</td><td><?= $key->nama ?></td>
		</tr>
		<tr>
			<td>Nama Orang Tua</td><td>:</td><td><?= $key->nama_ayah ?> & <?= $key->nama_ibu ?></td>
		</tr>
		<tr>
			<td>Penghasilan Orang Tua</td>
			<td>:</td><?php $hl=$key->penghasilan_ayah+$key->penghasilan_ibu; ?>
			<td>&plusmn; Rp.<?= number_format("$hl",0,",",".") ?></td>
		</tr>
		<tr>
			<td>Pekerjaan Ayah</td>
			<td>:</td>
			<td><?= $key->pekerjaan_ayah ?></td>
		</tr>
		<tr>
			<td>Pekerjaan Ibu</td><td>:</td><td><?= $key->pekerjaan_ibu ?></td>
		</tr>
		<tr>
			<td>No Hp Ayah</td><td>:</td><td><?= $key->no_hp_ayah ?></td>
		</tr>
		<tr>
			<td>No Hp Ibu</td><td>:</td><td><?= $key->no_hp_ibu ?></td>
		</tr>
		<tr>
			<td>Alamat</td><td>:</td><td><?= $key->alamat ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td><td>:</td><td><?= $key->jk ?></td>
		</tr>
		<tr>
			<td>Tempat Tanggal Lahir</td><td>:</td><td><?= $key->tempat_lahir ?> , <?php echo date("d-m-Y", strtotime($key->tgl_lahir)); ?></td>
		</tr>
		<tr>
			<td>Kamar</td><td>:</td><td><?= $key->ruang_kamar ?></td>
		</tr>
		<tr>
			<td>Ruang Kelas</td><td>:</td><td><?= $key->nama_kelas ?></td>
		</tr>
		<tr>
			<td>Kelas</td><td>:</td><td> <?= $key->kelass.' ('.$key->no_kls.')' ?></td>
		</tr>
		<tr>
			<td>Keterangan</td><td>:</td><td><?= $key->keterangan ?></td>
		</tr>
	
		
	</table>
<?php endforeach; ?>

</div>

</body>
</html>