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
    <center style="font-size:24pt;">DATA KONSULAT SANTRI/WATI</center><br><br>
    <table border="1" align="center" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Pembimbing</th>
                <th>Ketua Konsulat</th>

            </tr>
        </thead>
        <?php $n = 1;
        foreach ($kon as $key) { ?>
        <tr style="text-align:center">
            <td><?= $n++; ?></td>
            <td><?= $key->nama ?></td>
            <td><?= $key->pembimbing ?></td>
            <td><?= $key->ketua_konsulat ?></td>

        </tr>
        <?php } ?>
    </table>
</body>

</html>
<script src="<?= base_url('assets') ?>/template/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/bootstrap.min.js"></script>