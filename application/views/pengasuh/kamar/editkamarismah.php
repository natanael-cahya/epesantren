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
                        <a href="#">Edit Data Kamar (Ismah)</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Edit Data Kamar (Ismah)
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <?php foreach ($kmr as $key) : ?>
                                    <form name="f1z" method="post"
                                        action="<?= base_url('pengasuhan/crud_kamar/ed_kamar'); ?>">
                                        <?php $u = $this->uri->segment(3) ?>
                                        <div class="row">
                                            <input type="hidden" name="urie" value="<?= $u ?>">
                                            <input type="hidden" name="ge" value="L">
                                            <input type="hidden" name="uide" value="<?= $key->code_kamar ?>">
                                            <div class="col">
                                                <label for="foto">Wali Kamar</label>
                                                <a href="#walikamar" data-toggle="modal" data-target="#walikamar">
                                                    <input type="text" name="wke" id="wke"
                                                        value="<?= $key->wali_kamar ?>" class="form-control"
                                                        placeholder="Input Wali kamar" required>
                                                </a>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">

                                            <div class="col">
                                                <label for="foto">Rayon</label>
                                                <select name="rayone" class="form-control" required>

                                                    <option <?= $key->rayon == 'AL-Ikhlas' ? 'selected' : '' ?>
                                                        value="AL-Ikhlas">
                                                        AL-Ikhlas
                                                    </option>
                                                    <option <?= $key->rayon == 'AT-Taubah' ? 'selected' : '' ?>
                                                        value="AT-Taubah">AT-Taubah</option>
                                                    <option <?= $key->rayon == 'AL-Kautsar Selatan' ? 'selected' : '' ?>
                                                        value="AL-Kautsar Selatan">AL-Kautsar Selatan</option>
                                                    <option <?= $key->rayon == 'AL-Kautsar Utara' ? 'selected' : '' ?>
                                                        value="AL-Kautsar Utara">AL-Kautsar Utara</option>
                                                    <option <?= $key->rayon == 'AN-Nur' ? 'selected' : '' ?>
                                                        value="AN-Nur">AN-Nur</option>
                                                    <option <?= $key->rayon == 'AN-Nissa' . "'" ? 'selected' : '' ?>
                                                        value="AN-Nissa'">AN-Nissa'</option>
                                                </select>

                                            </div>
                                            <div class="col">
                                                <label for="foto">No Kamar</label>
                                                <select name="rke" class="form-control" required>

                                                    <?php for ($i = 1; $i <= 15; $i++) { ?>
                                                    <option <?= $key->ruang_kamar == $i ? 'selected' : '' ?>
                                                        value="<?= $i ?>"><?= $i ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>

                                        </div>
                                        <br>

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

    <div class="modal fade walikamar" tabindex="-1" role="dialog" aria-labelledby="walikamar" aria-hidden="true"
        id="walikamar">
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

                                    <td><a href='#' onclick="etangkapp('<?= $row->nama_pengajar ?>');"><button
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
        foreach ($tguru as $row) {
            $m = $row->nama_pengajar;
            $array .= "data['" . $row->nama_pengajar . "'] = {code_pengajar : '" . $row->code_pengajar . "'};\n";
        }

        ?>
    <?php echo $array; ?>


    function etangkapp(s) {

        document.getElementById('wke').value = s;
        $('#walikamar').modal('hide');
    }
    </script>