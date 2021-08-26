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
        $array .= "data['" . $row->nis . "'] = {id_ortu : '" . $row->id_ortu . "',nama : '" . $row->nama . "',nama_ayah:'" . $row->nama_ayah . "',nama_ibu:'" . $row->nama_ibu . "',pekerjaan_ayah:'" . $row->pekerjaan_ayah . "',penghasilan_ayah:'" . $row->penghasilan_ayah . "' ,no_hp_ayah:'" . $row->no_hp_ayah . "'};\n";
    }

    ?>
    <?php echo $array; ?>


    function etangkap(s) {
        opener.document.getElementById('id_ortu').value = data[s].id_ortu;
        opener.document.getElementById('nama_ayah').value = data[s].nama_ayah;
        opener.document.getElementById('nama_ibu').value = data[s].nama_ibu;
        opener.document.getElementById('pekerjaan_ayah').value = data[s].pekerjaan_ayah;
        opener.document.getElementById('no_hp_ayah').value = data[s].no_hp_ayah;
        opener.document.getElementById('penghasilan_ayah').value = data[s].penghasilan_ayah;
        opener.document.getElementById('nama').value = data[s].nama;
        opener.document.getElementById('nise').value = s;

        self.close();
    }
</script>