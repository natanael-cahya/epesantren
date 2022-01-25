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
body {
    margin: 0;
    padding: 0;
}
</style>

<body onload="window.print()">
    <br>
    <center style="font-size:24pt;">DATA KELAS SANTRI/WATI</center><br><br>
    <table border="0" align="center" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Kelas</th>
                <th>Wali Kelas</th>
                <th>Gedung Kelas</th>
                <th>Lembaga</th>
                <th>Marhalah</th>
                <th>Asisten</th>
            </tr>
        </thead>
        <tbody>
            <?php $p = 1;
            foreach ($km as $key) : ?>

            <tr>
                <td><?= $p++; ?></td>
                <td><?= $key->nama ?></td>
                <td><?= $key->kelass ?></td>
                <td><?= $key->wali_kelas ?></td>
                <td><?= $key->nama_kelas ?></td>
                <td><?= $key->lembagaa ?></td>
                <td><?= $key->marhalah ?></td>
                <td><?= $key->asisten ?></td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<script src="<?= base_url('assets') ?>/template/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/bootstrap.min.js"></script>