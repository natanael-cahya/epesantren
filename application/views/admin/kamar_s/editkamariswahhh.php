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
                        <a href="#">Edit Data Kamar Santri (Ismah)</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Edit Data Kamar Santri (Ismah)
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <?php foreach ($kls as $key) : ?>
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
                                                <label for="foto">Kamar</label>
                                                <select name="kmare" class="form-control">

                                                    <?php foreach ($kmr as $a) { ?>
                                                    <option <?= $key->code_kamar == $a->code_kamar ? 'selected' : '' ?>
                                                        value="<?= $a->code_kamar ?>"><?= $a->rayon ?>
                                                        <?= $a->ruang_kamar ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="urii">

                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan
                                        Data</button>
                                    </form>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade nis" tabindex="-1" role="dialog" aria-labelledby="nis" aria-hidden="true" id="nis">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Kelas (ISWAH)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama Santri</th>
                                    <th>Nama Ayah</th>
                                    <td>Nama Ibu</td>

                                    <th>AKSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($esantri as $row) { ?>
                                <tr>
                                    <td><?= $row->nis ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->nama_ayah ?></td>
                                    <td><?= $row->nama_ibu ?></td>

                                    <td><a href='#' onclick="etangkapp('<?= $row->nis ?>');"><button
                                                class="btn btn-primary">PILIH</button></a></td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup </button>

                </div>
            </div>
        </div>
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


    function etangkapp(s) {
        document.getElementById('nama').value = data[s].nama;
        document.getElementById('nisee').value = s;

        $('#nis').modal('hide');
    }
    /////////////////////
    </script>