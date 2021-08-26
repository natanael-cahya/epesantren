<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/template/css/bootstrap.min.css">
</head>
<style>
body{
    margin :0;
    padding:0;
}
    </style>
<body onload="window.print()">
<br>
<center style="font-size:24pt;">DATA PELANGGARAN SANTRI/WATI</center><br><br>
<table border="0" align="center" class="table table-striped">
<thead>
    <tr style="background-color:;height:">
        <th>No</th>
        <th>Nama Santri</th>
        <th>Pelanggaran</th>
        <th>Hari & Tgl</th>
        <th>waktu Kejadian</th>
        <th>Sanksi</th>
        <th>Kategori Pelanggaran</th>
    </tr>
</thead>
    <?php $n = 1; foreach($pel as $key){ ?>
    <tr style="text-align:justify">
        <td><?= $n++; ?></td>
        <td><?= $key->nama ?></td>
        <td><?= $key->pelanggaran ?></td>
        <td><?= $key->hari . ' , ' . date("d-m-Y", strtotime($key->tgl)) ?></td>
        <td><?= $key->waktu ?></td>
        <td><?= $key->sanksi ?></td>
        <td><?= $key->sort ?></td>
    </tr>
   
    <?php } ?>
</table>
</body>
</html>
<script src="<?= base_url('assets') ?>/template/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/bootstrap.min.js"></script>