<br><br><br><br><br><br><br>
<div class="table-responsive">
    <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>NIS</th>

                <th>Nama Ayah</th>
                <td>Nama Ibu</td>

                <th>AKSI</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($esantri as $row) { ?>
                <tr>
                    <td><?= $row->nis ?></td>
                    <td><?= $row->nama_ayah ?></td>
                    <td><?= $row->nama_ibu ?></td>

                    <td><a href='#' onclick="etangkap('<?= $row->nis ?>');"><button class="btn btn-primary">PILIH</button></a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<script>
    <?php

    $array = "var data = new Array();\n";
    foreach ($esantri as $row) {
        $m = $row->nis;
        $array .= "data['" . $row->nis . "'] = {nama : '" . $row->nama . "'};\n";
    }

    ?>
    <?php echo $array; ?>


    function etangkap(s) {

        opener.document.getElementById('nama').value = data[s].nama;
        opener.document.getElementById('nisee').value = s;
        self.close();
    }
</script>