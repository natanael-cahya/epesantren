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

                                        <form name="f1z" method="post" action="<?= base_url('admin/crud_kelas/ed_kelas'); ?>">

                                            <div class="row">

                                                <div class="col">
                                                    <label for="foto">Lembaga</label>
                                                    <select name="lembagae" id="lembaga" class=" lembaga form-control" required>

                                                        <?php foreach ($lembaga as $row) : ?>
                                                            <option <?= $key->lembaga == $row->lembagaa ? 'selected' : '' ?> value="<?= $row->id_lembaga; ?>">
                                                                <?= $row->lembagaa; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label for="foto">Marhalah</label>
                                                    <select name="marhalahe" id="marhalah" class="marhalah form-control" required>
                                                        <option <?= $key->marhalah == 'SMP' ? 'selected' : '' ?>>SMP
                                                        </option>
                                                        <option <?= $key->marhalah == 'MA' ? 'selected' : '' ?>>MA</option>
                                                        <option <?= $key->marhalah == 'Wustha' ? 'selected' : '' ?>>Wustha
                                                        </option <?= $key->marhalah == "'" . 'Ulya' ? 'selected' : '' ?>>
                                                        'Ulya</option>


                                                    </select>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">


                                                <div class="col">
                                                    <label for="foto">Gedung Kelas</label>
                                                    <select name="rke" class="form-control" required>

                                                        <option <?= $key->nama_kelas == 'AT-Taubah' ? 'selected' : '' ?> value="AT-Taubah">
                                                            AT-Taubah</option>
                                                        <option <?= $key->nama_kelas == 'AL-Ikhlas' ? 'selected' : '' ?> value="AL-Ikhlas">AL-Ikhlas</option>
                                                        <option <?= $key->nama_kelas == 'AR-Rahman' ? 'selected' : '' ?> val <?= $key->nama_kelas == 'AT-Taubah' ? 'selected' : '' ?>ue="AR-Rahman">
                                                            AR-Rahman</option>
                                                        <option <?= $key->nama_kelas == 'AL-Kautsar Selatan atas' ? 'selected' : '' ?> value="AL-Kautsar Selatan atas">AL-Kautsar Selatan atas
                                                        </option>
                                                        <option <?= $key->nama_kelas == 'AL-Kautsar Selatan bawah' ? 'selected' : '' ?> value="AL-Kautsar Selatan bawah">AL-Kautsar Selatan bawah
                                                        </option>
                                                        <option <?= $key->nama_kelas == 'AN-Nur' ? 'selected' : '' ?> value="AN-Nur">AN-Nur</option>
                                                        <option <?= $key->nama_kelas == 'Perdana' ? 'selected' : '' ?> value="Perdana">Perdana</option>
                                                        <option <?= $key->nama_kelas == 'AN-Nisa' . "'" ? 'selected' : '' ?> value="AN-Nisa`">AN-Nisa'</option>
                                                        <option <?= $key->nama_kelas == 'AL-Kautsar Utara atas' ? 'selected' : '' ?> value="AL-Kautsar Utara atas">AL-Kautsar Utara atas</option>
                                                        <option <?= $key->nama_kelas == 'AL-Kautsar Utara bawah Khodijah' ? 'selected' : '' ?> value="ÀL-Kautsar Utara bawah Khodijah">ÀL-Kautsar Utara
                                                            bawah Khodijah</option>

                                                    </select>

                                                </div>

                                                <div class="col">
                                                    <label for="foto">No Gedung Kelas</label>
                                                    <select class="form-control" name="nk">
                                                        <option value="<?= $key->no_kls ?>">-Jangan diubah bila tak ingin
                                                            dirubah-</option>
                                                        <option style="color: green;"><b>= Lantai Bawah =</b></option>
                                                        <?php for ($i = 1; $i <= 15; $i++) { ?>
                                                            <option value="<?php if ($i < 10) {
                                                                                echo "00" . $i;
                                                                            } else {
                                                                                echo "0" . $i;
                                                                            } ?>"><?php if ($i < 10) {
                                                                                        echo "00" . $i;
                                                                                    } else {
                                                                                        echo "0" . $i;
                                                                                    } ?></option>
                                                        <?php } ?>
                                                        <option style="color: green;"><b>= Lantai Atas =</b></option>
                                                        <?php for ($i = 101; $i <= 115; $i++) { ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <div class="col">
                                                    <label for="foto">Kelas</label>

                                                    <select name="kelase" class="form-control">
                                                        <option <?= $key->kelass == '1B' ? 'selected' : '' ?>>1B</option>
                                                        <option <?= $key->kelass == '1C' ? 'selected' : '' ?>>1C</option>
                                                        <option <?= $key->kelass == '1D' ? 'selected' : '' ?>>1D</option>
                                                        <option <?= $key->kelass == '2B' ? 'selected' : '' ?>>2B</option>
                                                        <option <?= $key->kelass == '2C' ? 'selected' : '' ?>>2C</option>
                                                        <option <?= $key->kelass == '2D' ? 'selected' : '' ?>>2D</option>
                                                        <option <?= $key->kelass == '3B' ? 'selected' : '' ?>>3B</option>
                                                        <option <?= $key->kelass == '3C' ? 'selected' : '' ?>>3C</option>
                                                        <option <?= $key->kelass == '3D' ? 'selected' : '' ?>>3D</option>
                                                        <option <?= $key->kelass == '4B' ? 'selected' : '' ?>>4B</option>
                                                        <option <?= $key->kelass == '4C' ? 'selected' : '' ?>>4C</option>
                                                        <option <?= $key->kelass == '4D' ? 'selected' : '' ?>>4D</option>
                                                        <option <?= $key->kelass == '5B' ? 'selected' : '' ?>>5B</option>
                                                        <option <?= $key->kelass == '5C' ? 'selected' : '' ?>>5C</option>
                                                        <option <?= $key->kelass == '5D' ? 'selected' : '' ?>>5D</option>
                                                        <option <?= $key->kelass == '6B' ? 'selected' : '' ?>>6B</option>
                                                        <option <?= $key->kelass == '6C' ? 'selected' : '' ?>>6C</option>
                                                        <option <?= $key->kelass == '6D' ? 'selected' : '' ?>>6D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="foto">Wali Kelas</label>
                                                    <a href="#walikelas" data-toggle="modal" data-target="#walikelas">
                                                        <input type="text" class="form-control" value="<?= $key->wali_kelas ?>" name="wke" id="wke" placeholder="Nama Wali kelas" required>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <label for="foto">Asisten</label>
                                                    <a href="#asisten" data-toggle="modal" data-target="#asisten">
                                                        <input type="text" class="form-control" value="<?= $key->asisten ?>" name="ase" id="ase" placeholder="Nama Asisten" required>
                                                    </a>
                                                    <input type="hidden" name="ge" value="L">
                                                    <input type="hidden" value="<?= $this->uri->segment(3); ?>" name="urie">
                                                    <input type="hidden" name="par" value="<?= $key->code_kelas ?>">
                                                </div>
                                            </div>
                                </div>
                                <br>
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