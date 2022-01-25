<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Santri</title>
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/template/css/bootstrap.min.css">
</head>
<style>
body {
    margin: 0;
    padding: 0;
}

@page {
    size: landscape;
}
</style>

<body onload="window.print()">
    <br>
    <center style="font-size:24pt;">DATA SANTRI/WATI PP.AL-MASHDUQIAH</center><br><br>
    <table border="0" align="center" class="table table-striped">
        <thead>
            <tr style="background-color:gray;text-align:center;vertical-align:baseline;">
                <th>No</th>
                <th>Nama Santri</th>
                <th>Tempat Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>kamar</th>
                <th>Orang Tua</th>
                <th>Pekerjaan Ortu</th>
                <th>Gaji Ortu</th>
            </tr>
        </thead>
        <?php $n = 1;
        foreach ($san as $key) { ?>
        <tr style="text-align:justify">
            <td><?= $n++; ?></td>
            <td><?= $key->nama ?></td>
            <td><?= $key->tempat_lahir . ' <br> ' . date("d-m-Y", strtotime($key->tgl_lahir)) ?></td>
            <td><?= $key->jk ?></td>
            <td><?= $key->alamat ?></td>
            <td><?= $key->nama_kelas . ' - ' . $key->no_kls . ' (' . $key->kelass . ')' ?></td>
            <td><?= $key->rayon . ' - ' . $key->ruang_kamar ?></td>
            <td><?= $key->nama_ayah . ' & ' . $key->nama_ibu ?></td>
            <td><?= $key->pekerjaan_ayah . ' & ' . $key->pekerjaan_ibu ?></td>
            <td>&plusmn;<?= $key->penghasilan_ayah + $key->penghasilan_ibu ?></td>
        </tr>

        <?php } ?>
    </table>
</body>

</html>
<script src="<?= base_url('assets') ?>/template/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/bootstrap.min.js"></script>