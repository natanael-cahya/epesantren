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
                        <a href="#">Edit Data Esktra</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Edit Data Esktra
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <?php foreach ($Aextra as $ex) : ?>
                                        <form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('admin/crud_kelas/ed_kls'); ?>">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nis">NIS</label>

                                                    <input type="text" name="nise" readonly value="<?= $ex->nis ?>" class="form-control" placeholder="NIS">


                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" readonly name="" class="form-control" value="<?= $ex->nama ?>" id="nama" placeholder="Nama">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="foto">Extra</label>
                                                    <select name="exe" class="form-control">
                                                        <option>-Pilih Extra-</option>
                                                        <?php foreach ($ext as $t) { ?>
                                                            <option <?= $t->code_extra == $ex->code_extra ? "selected" : "" ?> value="<?= $t->code_extra ?>"><?= $t->nama_extra ?></option>
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

                                        <td><a href='#' onclick="etangkapp('<?= $row->nis ?>');"><button class="btn btn-primary">PILIH</button></a></td>
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