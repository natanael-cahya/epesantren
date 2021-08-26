<br><br><br><br><br><br><br>
<div class="table-responsive">
    <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Kode Ortu</th>

                <th>Nama Ayah</th>
                <td>Nama Ibu</td>

                <th>AKSI</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tsantri2 as $row) { ?>
                <tr>
                    <td><?= $row->id_ortu ?></td>
                    <td><?= $row->nama_ayah ?></td>
                    <td><?= $row->nama_ibu ?></td>

                    <td><a href='#' onclick="tangkap('<?= $row->id_ortu ?>');"><button class="btn btn-primary">PILIH</button></a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<script>
    <?php

    $array = "var data = new Array();\n";
    foreach ($tsantri2 as $row) {
        $m = $row->id_ortu;
        $array .= "data['" . $row->id_ortu . "'] = {nama_ayah:'" . $row->nama_ayah . "',nama_ibu:'" . $row->nama_ibu . "',pekerjaan_ayah:'" . $row->pekerjaan_ayah . "',penghasilan_ayah:'" . $row->penghasilan_ayah . "' ,no_hp_ayah:'" . $row->no_hp_ayah . "'};\n";
    }

    ?>
    <?php echo $array; ?>


    function tangkap(s) {
        //opener.document.getElementById('id_details').value = data[s].id_details;
        opener.document.getElementById('nama_ayah').value = data[s].nama_ayah;
        opener.document.getElementById('nama_ibu').value = data[s].nama_ibu;
        opener.document.getElementById('pekerjaan_ayah').value = data[s].pekerjaan_ayah;
        opener.document.getElementById('no_hp_ayah').value = data[s].no_hp_ayah;
        opener.document.getElementById('penghasilan_ayah').value = data[s].penghasilan_ayah;
        opener.document.getElementById('ns').value = s;

        self.close();
    }
</script>