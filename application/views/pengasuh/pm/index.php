<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Pelanggaran KMI</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-gavel"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">General</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"></a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalpp">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                            <br>
                            <div class="d-flex align-items-center">
                                <a target="_blank" href="<?= base_url('admin/laporan/l_pel'); ?>" class="btn btn-warning btn-xs m">
                                    <i class="fa fa-print"></i>
                                    Print All Data
                                </a>&nbsp;
                                <a target="_blank" href="<?= base_url('admin/laporan/l_pel'); ?>" class="btn btn-info btn-xs ">
                                    <i class="fa fa-download"></i>
                                    Download All Data
                                </a>&nbsp;
                                <a target="_blank" href="<?= base_url('admin/laporan/l_pel/kmi'); ?>" class="btn btn-warning btn-xs ml-auto">
                                    <i class="fa fa-print"></i>
                                    Print Data
                                </a>&nbsp;
                                <a target="_blank" href="<?= base_url('admin/laporan/export_Apel/kmi'); ?>" class="btn btn-info btn-xs ">
                                    <i class="fa fa-download"></i>
                                    Download Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Santri</th>
                                                <th>Pelanggaran</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Sanksi</th>
                                                <th>Tingkatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $n = 1;
                                            foreach ($pp as $l) : ?>

                                                <tr>
                                                    <td><?= $n++; ?></td>
                                                    <td><?= $l->nama ?></td>
                                                    <td><?= $l->pelanggaran ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($l->tgl)); ?></td>
                                                    <td> <?= $l->waktu ?></td>
                                                    <td><?= $l->sanksi ?></td>
                                                    <td><?= $l->tingkat ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <a class="btn btn-primary btn-xs text-white ml-1" href="<?= base_url('pengasuhan/pengasuhan/edit_pm/');
                                                                                                                    echo $l->code_pelanggaran . '/' . $this->uri->segment(4) ?>"><i class="fa fa-edit"></i></a>
                                                            <a href="<?= base_url('pengasuhan/crud_pelanggaran/h_pel/');
                                                                        echo $l->code_pelanggaran . "/pm" ?>" class="btn btn-danger btn-sm text-white ml-1"><i class="fa fa-trash"></i></a>
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
    <?php foreach ($pp as $k) { ?>
        <div class="modal fade" id="modalsantriz<?= $k->nis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Santri/Wati</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <? php // foreach ($pp as $k) { 
                        ?>
                        <form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('pengasuhan/crud_pelanggaran/ed_pel'); ?>">
                            <div class="row">
                                <div class="col">
                                    <label for="nis">NIS</label>
                                    <a href="javascript:void(0);" NAME="NIS" title="Klik Untuk Cari NIS" onClick='javascript:window.open("ep","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
                                        <input type="text" name="nise" onchange="ambilnise(this.value)" value="<?= $k->nis ?>" class="form-control" id="nisee" placeholder="NIS">
                                    </a>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="" class="form-control" required value="<?= $k->nama ?>" readonly id="nama" placeholder="Nama">
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col">
                                    <label for="foto">Pelanggaran</label>
                                    <input type="text" name="plg" class="form-control" value="<?= $k->pelanggaran ?>" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="alamat">Sanksi</label>
                                    <input type="text" name="sanks" required value="<?= $k->sanksi ?>" class="form-control" id="alamat" placeholder="Alamat">
                                    <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
                                    <input type="hidden" name="idx" value="<?= $k->code_pelanggaran ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="alamat">Tingkat Pelanggaran</label>
                                    <select class="form-control" name="tingkat">
                                        <option <?= $k->tingkat == 'Ringan' ? 'selected' : '' ?>>Ringan</option>
                                        <option <?= $k->tingkat == 'Sedang' ? 'selected' : '' ?>>Sedang</option>
                                        <option <?= $k->tingkat == 'Berat' ? 'selected' : '' ?>>Berat</option>
                                        <option <?= $k->tingkat == 'Sangat Berat' ? 'selected' : '' ?>>Sangat Berat</option>
                                    </select>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                            Tutup </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                        </form>
                        <? php // } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <!-- Modal -->
    <div class="modal fade" id="modalpp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Pelanggaran Bahasa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="f1" method="post" action="<?= base_url('pengasuhan/crud_pelanggaran/tb_pel'); ?>">

                        <div class="row">
                            <div class="col">
                                <label for="foto">Nama Santri</label>

                                <a href="javascript:void(0);" style="cursor: pointer;" NAME="SANTRI" title="Klik Untuk Cari SANTRI" onClick='javascript:window.open("t_santri_konsulat","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="ns" onchange="ambilniskon(this.value)" class="form-control" id="ns" placeholder="Klik untuk pilih santri">
                                </a>
                                <input type="hidden" name="nis" id="nis" class="form-control">
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Pelanggaran</label>
                                <input type="text" name="pelanggaran" class="form-control" required placeholder="Input pelanggaran yang dilakukan santri">

                            </div>

                        </div><br>
                        <div class="row">

                            <div class="col">
                                <label for="foto">Hari</label>
                                <?php $t = date("l"); ?>

                                <input type="text" name="hari" class="form-control" value="<?php
                                                                                            if ($t == 'Monday') {
                                                                                                echo "Senin";
                                                                                            } else
									if ($t == 'Tuesday') {
                                                                                                echo "Selasa";
                                                                                            } else
									if ($t == 'Wednesday') {
                                                                                                echo "Rabu";
                                                                                            } else
									if ($t == 'Thursday') {
                                                                                                echo "Kamis";
                                                                                            } else
									if ($t == 'Friday') {
                                                                                                echo "Jum'at";
                                                                                            } else
									if ($t == 'Saturday') {
                                                                                                echo "Sabtu";
                                                                                            } else
									if ($t == 'Sunday') {
                                                                                                echo "Minggu";
                                                                                            }

                                                                                            ?>" readonly>

                            </div>
                            <div class="col">
                                <label for="foto">Tanggal</label>
                                <input type="text" value="<?= date('Y-m-d') ?>" name="tgl" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label for="foto">Jam</label>
                                <input type="text" value="<?= date('H:i:s') ?>" name="jam" class="form-control" readonly>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Sanksi</label>
                                <input type="text" name="sanksi" class="form-control" placeholder="Input Sanksi" required>
                                <input type="hidden" class="form-control" name="sort" value="kmi">
                                <input type="hidden" class="form-control" name="uri" value="<?= $this->uri->segment(3); ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="alamat">Tingkat Pelanggaran</label>
                                <select class="form-control" name="tingkat">
                                    <option>Ringan</option>
                                    <option>Sedang</option>
                                    <option>Berat</option>
                                    <option>Sangat Berat</option>
                                </select>
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup </button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalpr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Pemilihan Data yang Akan di Print</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="f2" method="post" action="">
                        <div class="row">
                            <div class="col">
                                <label for="foto">Pilih Pelanggaran Yang akan Di cetak</label>
                                <select class="form-control" name="pel">
                                    <option value="kmi">Pelanggaran KMI</option>
                                    <option value="pengasuhan">Pelanggaran Pengasuhan</option>
                                    <option value="bahasa">Pelanggaran Bahasa</option>
                                    <option value="peribadatan">Pelanggaran Peribadatan</option>
                                </select>

                            </div>

                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup </button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php

        $array = "var data = new Array();\n";
        foreach ($tsantrikonsulat as $row) {
            $m = $row->nama;
            $array .= "data['" . $row->nama . "'] = {ns :'" . $row->nama . "',nis :'" . $row->nis  . "'};\n";
        }

        echo $array; ?>

        function ambilniskon(nama) {


            document.getElementById('nis').value = data[nama].nis;


        };
    </script>