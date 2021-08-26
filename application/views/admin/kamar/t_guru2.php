<br><br><br><br><br><br><br>
<div class="table-responsive">
    <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>


                <th>Kode Pengajar</th>
                <th>Nama Pengajar</th>


                <th>AKSI</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tguru as $row) { ?>
                <tr>
                    <td><?= $row->code_pengajar ?></td>
                    <td><?= $row->nama_pengajar ?></td>

                    <td><a href='#' onclick="etangkap('<?= $row->nama_pengajar ?>');"><button class="btn btn-primary">PILIH</button></a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<script>
    <?php

    $array = "var data = new Array();\n";
    foreach ($tguru as $row) {
        $m = $row->nama_pengajar;
        $array .= "data['" . $row->nama_pengajar . "'] = {code_pengajar : '" . $row->code_pengajar . "'};\n";
    }

    ?>
    <?php echo $array; ?>


    function etangkap(s) {

        opener.document.getElementById('wke').value = s;
        self.close();
    }
</script>