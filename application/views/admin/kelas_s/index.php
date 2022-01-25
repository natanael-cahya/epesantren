<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Kelas Ismah</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-school"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">UMUM</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Kelas Ismah</a>

                    </li>
                </ul>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- Menu kelassssssssss -->
                            <div class="d-flex align-items-center">
                                <a href="<?= base_url('admin/laporan/l_kelass'); ?>/L" target="_blank"
                                    class="btn btn-warning btn-sm ml-auto">
                                    <i class="fa fa-print"></i>
                                    Print Data
                                </a>&nbsp;&nbsp;
                                <a href="<?= base_url('admin/laporan/export_kelas'); ?>/L" target="_blank"
                                    class="btn btn-info btn-sm ">
                                    <i class="fa fa-download"></i>
                                    Download Data
                                </a>
                            </div><br>
                            <div class="d-flex align-items-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;Filter : &nbsp;<select id="fil">
                                    <option value="">Semua Data</option>
                                    <?php foreach ($klas as $q) { ?>
                                    <option><?= $q->nama_kelas ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">

                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Santri</th>
                                                <th>Kelas</th>
                                                <th>Wali Kelas</th>
                                                <th>Gedung Kelas</th>
                                                <th>Lembaga</th>
                                                <th>Marhalah</th>
                                                <th>Asisten</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $p = 1;
                                            foreach ($kls as $key) : ?>

                                            <tr>
                                                <td><?= $p++; ?></td>
                                                <td><?= $key->nama ?></td>
                                                <td><?= $key->kelass ?></td>
                                                <td><?= $key->wali_kelas ?></td>
                                                <td><?= $key->nama_kelas ?></td>
                                                <td><?= $key->lembagaa ?></td>
                                                <td><?= $key->marhalah ?></td>
                                                <td><?= $key->asisten ?></td>
                                                <td>
                                                    <div class="row">

                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#modalsantriz<?= $key->nis ?>">Edit</button>


                                                    </div>
                                                </td>
                                            </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <?php foreach ($kls as $key) { ?>
    <div class="modal fade" id="modalsantriz<?= $key->nis ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas Santri/Wati</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <? php // foreach ($kls as $k) { 
                        ?>
                    <form name="f1" method="post" enctype="multipart/form-data"
                        action="<?= base_url('admin/crud_kelas/ed_kls'); ?>">
                        <div class="row">
                            <div class="col">
                                <label for="nis">NIS</label>
                                <a href="javascript:void(0);" NAME="NIS" title="Klik Untuk Cari NIS" onClick='javascript:window.open("ekelas","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="nise" onchange="ambilnise(this.value)"
                                        value="<?= $key->nis ?>" class="form-control" id="nisee" placeholder="NIS">
                                </a>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="nama">Nama</label>
                                <input type="text" readonly name="" class="form-control" value="<?= $key->nama ?>"
                                    id="nama" placeholder="Nama">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup
                    </button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                    </form>
                    <? php // } 
                        ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <script>
    <?php

        $array = "var data = new Array();\n";
        foreach ($esantri as $row) {
            $m = $row->nis;
            $array .= "data['" . $row->nis . "'] = {nama :'" . $row->nama . "'};\n";
        }

        echo $array; ?>

    function ambilnise(nise1) {
        document.getElementById('nama').value = data[nis].nama;


    };
    <?php

        $array = "var data = new Array();\n";
        foreach ($tsantri as $row) {
            $m = $row->nis;
            $array .= "data['" . $row->nis . "'] = {id_ortu :'" . $row->id_ortu . "',nama_ayah :'" . $row->nama_ayah  . "' , nama_ibu:'" .  $row->nama_ibu . "' , pekerjaan_ayah:'" .  $row->pekerjaan_ayah . "' , penghasilan_ayah:'" .  $row->penghasilan_ayah + $row->penghasilan_ibu . "' , no_hp_ayah:'" .  $row->no_hp_ayah . "'};\n";
        }

        echo $array; ?>

    function ambilnis(ns) {
        document.getElementById('id_ortu').value = data[nis].id_ortu;
        document.getElementById('nama_ayah').value = data[nis].nama_ayah;
        document.getElementById('nama_ibu').value = data[nis].nama_ibu;
        document.getElementById('pekerjaan_ayah').value = data[nis].pekerjaan_ayah;
        document.getElementById('penghasilan_ayah').value = data[nis].penghasilan_ayah;
        document.getElementById('no_hp_ayah').value = data[nis].no_hp_ayah;


    };
    </script>