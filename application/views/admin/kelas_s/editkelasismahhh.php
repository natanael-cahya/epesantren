<?php foreach ($kls as $key) : ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-futbol"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Master</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Data Kelas Santri (Ismah)</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Edit Data Kelas Santri (UMUM)
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="container">

                                    <form name="f1" method="post" enctype="multipart/form-data"
                                        action="<?= base_url('admin/crud_kelas/ed_kls'); ?>">
                                        <div class="row">
                                            <div class="col">
                                                <label for="nis">NIS</label>
                                                <a href="#nis" data-toggle="modal" data-target="#nis">
                                                    <input type="text" onchange="ambilnise(this.value)" name="nise"
                                                        value="<?= $key->nis ?>" class="form-control" id="nisee"
                                                        placeholder="NIS">
                                                </a>

                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="nama">Nama</label>
                                                <input type="text" readonly name="" class="form-control"
                                                    value="<?= $key->nama ?>" id="nama" placeholder="Nama">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="alamat">Kelas</label>
                                                <select name="klse" class="form-control">
                                                    <?php foreach ($klz as $ka) { ?>
                                                    <option value="<?= $ka->code_kelas ?>">
                                                        <?php echo $ka->nama_kelas . ' - No: ' . $ka->no_kls . ' - [' . $ka->kelass . ']';
                                                                if ($ka->gender == 'L') {
                                                                    echo " - (ISMAH)";
                                                                } else {
                                                                    echo " - (ISWAH)";
                                                                }  ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="urie" value="<?= $this->uri->segment(3) ?>">
                                            </div>

                                        </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan
                                        Data</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
    <script>
    <?php

        $array = "var data = new Array();\n";
        foreach ($esantri as $row) {
            $m = $row->nis;
            $array .= "data['" . $row->nis . "'] = {nama : '" . $row->nama . "'};\n";
        }

        ?>
    <?php echo $array; ?>


    function etangkapp(s) {
        document.getElementById('nama').value = data[s].nama;
        document.getElementById('nisee').value = s;

        $('#nis').modal('hide');
    }
    /////////////////////
    </script>