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
                        <a href="#">Edit Data Kelas (Ismah)</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Edit Data Kelas (Ismah)
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <?php foreach ($kls as $key) : ?>
                                        <!-- fuction Edit -->
                                        <form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('pengajar/crud_kelas/ed_kls'); ?>">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nis">NIS</label>
                                                    <a href="#nis" data-toggle="modal" data-target="#nis">
                                                        <input type="text" name="nise" onchange="ambilnise(this.value)" value="<?= $key->nis ?>" class="form-control" id="nisee" placeholder="NIS">
                                                    </a>

                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" readonly name="" class="form-control" value="<?= $key->nama ?>" id="nama" placeholder="Nama">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="alamat">Kelas</label>
                                                    <select name="klse" class="form-control">
                                                        <?php foreach ($klas as $o) { ?>
                                                            <option value="<?= $o->code_kelas ?>"><?= $o->nama_kelas ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <input type="hidden" name="urie" value="<?= $this->uri->segment(3) ?>">
                                                </div>

                                            </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
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
                                    <th>Nama Santri/Wati</th>
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

                                        <td><a href='#' onclick="etangkapq('<?= $row->nis ?>');"><button class="btn btn-primary">PILIH</button></a></td>
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

        $array2 = "var dataa = new Array();\n";
        foreach ($esantri as $rows) {
            $p = $rows->nis;
            $array2 .= "dataa['" . $rows->nis . "'] = {nama : '" . $rows->nama . "'};\n";
        }

        ?>
        <?php echo $array2; ?>


        function etangkapq(o) {

            document.getElementById('nama').value = dataa[o].nama;
            // document.getElementById('alamat').value = dataa[o].alamat;
            document.getElementById('nisee').value = o;
            $('#nis').modal('hide');
        }
    </script>

    <div class="modal fade walikelas" tabindex="-1" role="dialog" aria-labelledby="walikelas" aria-hidden="true" id="walikelas">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Kelas (ISMAH)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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

                                        <td><a href='#' onclick="etangkapp('<?= $row->nama_pengajar ?>');"><button class="btn btn-primary">PILIH</button></a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup
                    </button>

                </div>
            </div>
        </div>
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


        function etangkapp(s) {

            document.getElementById('wke').value = s;
            $('#walikelas').modal('hide');
        }
    </script>


    <div class="modal fade asisten" tabindex="-1" role="dialog" aria-labelledby="asisten" aria-hidden="true" id="asisten">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Kelas (ISMAH)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup
                    </button>

                </div>
            </div>
        </div>
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

            document.getElementById('ase').value = s;
            $('#asisten').modal('hide');
        }
    </script>