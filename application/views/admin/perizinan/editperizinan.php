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
                        <a href="#">Edit Data Perizinan</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Edit Data Perizinan
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <?php foreach ($pp as $l) : ?>

                                    <form name="f1" method="post" enctype="multipart/form-data"
                                        action="<?= base_url('admin/perizinan/edit'); ?>">
                                        <div class="row">
                                            <div class="col">
                                                <label for="nis">NIS</label>
                                                <a href="#nis" data-toggle="modal" data-target="#nis">
                                                    <input type="text" name="nise" onchange="ambilnise(this.value)"
                                                        value="<?= $l->nis_perizinan ?>" class="form-control" id="nisee"
                                                        placeholder="NIS">
                                                </a>

                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="" class="form-control" value="<?= $l->nama ?>"
                                                    readonly id="nama" placeholder="Nama">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">

                                            <div class="col">
                                                <label for="foto">Status Perizinan</label>
                                                <select class="form-control" name="stats">
                                                    <option>- Pilih Status -</option>
                                                    <option <?= $l->status_perizinan == 'Sakit' ? 'selected' : '' ?>>
                                                        Sakit</option>
                                                    <option <?= $l->status_perizinan == 'Pulang' ? 'selected' : '' ?>>
                                                        Pulang</option>
                                                    <option
                                                        <?= $l->status_perizinan == 'Keluar Pondok' ? 'selected' : '' ?>>
                                                        Keluar
                                                        Pondok</option>
                                                    <option <?= $l->status_perizinan == 'Pakaian' ? 'selected' : '' ?>>
                                                        Pakaian
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="alamat">Tanggal Mulai</label>
                                                <input type="text" name="" value="<?= $l->tgl_mulai ?>" readonly
                                                    class="form-control" id="alamat" placeholder="Alamat">

                                                <input type="hidden" name="idx" value="<?= $l->code_perizinan ?>">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="alamat">Tanggal Selesai</label>
                                                <input type="text" name="tgl_selesai" value="<?= $l->tgl_selesai ?>"
                                                    class="form-control" id="alamat" placeholder="Alamat">
                                                * Note:Format Harus sama!(Thn-bln-Tgl[spasi]jam:menit:detik)

                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="alamat">Keterangan</label>
                                                <textarea class="form-control"
                                                    name="ket"><?= $l->keterangan_izin ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="alamat">Verifikasi</label>
                                                <select name="acc" class=" form-control">
                                                    <option <?= $l->verif == 1 ? 'selected' : '' ?> value="1">Acc
                                                    </option>
                                                    <option <?= $l->verif == 0 ? 'selected' : '' ?> value="0">Menunggu
                                                        Persetujuan
                                                    </option>
                                                </select>

                                            </div>
                                        </div>


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

                                    <td><a href='#' onclick="etangkapq('<?= $row->nis ?>');"><button
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

        $array2 = "var dataa = new Array();\n";
        foreach ($esantri as $rows) {
            $p = $rows->nis;
            $array2 .= "dataa['" . $rows->nis . "'] = {nama : '" . $rows->nama . "',alamat : '" . $rows->alamat . "'};\n";
        }

        ?>
    <?php echo $array2; ?>


    function etangkapq(o) {

        document.getElementById('nama').value = dataa[o].nama;
        document.getElementById('nisee').value = o;
        $('#nis').modal('hide');
    }
    </script>



    <div class="modal fade ket" tabindex="-1" role="dialog" aria-labelledby="ket" aria-hidden="true" id="ket">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Extrakurikuler</h5>
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

                                    <td><a href='#' onclick="etangkappp('<?= $row->nama_pengajar ?>');"><button
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


    function etangkappp(s) {

        document.getElementById('wk').value = s;
        $('#ket').modal('hide');
    }
    </script>