<br><br><br><br><br><br><br>
<div class="table-responsive">
    <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>NIS</th>

                <th>Nama Santri</th>

                <th>AKSI</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tketuakonsulat as $row) { ?>
                <tr>
                    <td><?= $row->nis ?></td>
                    <td><?= $row->nama ?></td>

                    <td><a href='#' onclick="tangkapkonsulat('<?= $row->nama ?>');"><button class="btn btn-primary">PILIH</button></a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<script>
    <?php

    $array = "var data = new Array();\n";
    foreach ($tketuakonsulat as $row) {
        $m = $row->nama;
        $array .= "data['" . $row->nama . "'] = {ns : '" . $row->nama . "', nis : '" . $row->nis . "'};\n";
    }

    ?>
    <?php echo $array; ?>


    function tangkapkonsulat(s) {
        opener.document.getElementById('nis').value = data[s].nis;
        opener.document.getElementById('kk').value = s;

        self.close();
    }
</script>