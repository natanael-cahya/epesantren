<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-user"></i>
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
                        <a href="#">Data Konsulat</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Konsulat </h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalkonsulat">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>

                            </div><br>
                            <div class="d-flex align-items-center">
                                <a target="_blank" href="<?= base_url('admin/laporan/export_konsulat'); ?>"
                                    class="btn btn-info btn-sm ml-auto" title="Download File">
                                    <i class="fa fa-download"></i>
                                    Download Data
                                </a>&nbsp;
                                <a target="_blank" href="<?= base_url('admin/laporan/l_konsulat'); ?>"
                                    class="btn btn-warning btn-sm ">
                                    <i class="fa fa-print"></i>
                                    Print Data
                                </a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Santri</th>
                                                <th>Alamat</th>
                                                <th>Pembimbing</th>
                                                <th>Ketua Konsulat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $j = 1;
											foreach ($konsulat as $ko) : ?>

                                            <tr>
                                                <td><?= $j++; ?></td>
                                                <td><?= $ko->nama; ?></td>
                                                <td><?= $ko->alamat ?></td>
                                                <td><?= $ko->pembimbing ?></td>
                                                <td><?= $ko->ketua_konsulat ?></td>
                                                <td>
                                                    <div class="row">

                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#modalsantriz<?= $ko->code_konsulat ?>"
                                                            title="Edit Data"><i class="fa fa-edit"></i> </button>
                                                        <a class="btn btn-danger btn-sm text-white ml-1" href="<?= base_url('admin/crud_konsulat/h_kon/');
																													echo $ko->code_konsulat ?>" title="Hapus Data"><i class="fa fa-trash"></i> </a>

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
    <?php foreach ($konsulat as $ko) { ?>
    <div class="modal fade" id="modalsantriz<?= $ko->code_konsulat ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Konsulat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php //foreach ($konsulat as $ko) { 
						?>
                    <form name="f1" method="post" enctype="multipart/form-data"
                        action="<?= base_url('admin/crud_konsulat/ed_konsulat'); ?>">
                        <div class="row">
                            <div class="col">
                                <label for="nis">NIS</label>
                                <a href="javascript:void(0);" NAME="NIS" title="Klik Untuk Cari NIS" onClick='javascript:window.open("ekonsulat","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="nise" onchange="ambilnise(this.value)"
                                        value="<?= $ko->nis ?>" class="form-control" id="nisee" placeholder="NIS">
                                </a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nama">Nama</label>
                                <input type="text" name="" readonly class="form-control" value="<?= $ko->nama ?>"
                                    id="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="alamat">alamat</label>
                                <input type="text" name="" readonly value="<?= $ko->alamat ?>" class="form-control"
                                    id="alamat" placeholder="Alamat" required>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="alamat">Pembimbing</label>
                                <a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR"
                                    onClick='javascript:window.open("ekonsulate","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="pem" id="pem" value="<?= $ko->pembimbing ?>"
                                        class="form-control" placeholder="" required>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="alamat">Ketua Konsulat</label>
                                <a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR"
                                    onClick='javascript:window.open("eketuakonsulat","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="ket" id="ket" value="<?= $ko->ketua_konsulat ?>"
                                        class="form-control" placeholder="" required>
                                </a>
                                <input type="hidden" name="idh" value="<?= $ko->code_konsulat ?>">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup </button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                    </form>
                    <?php // } 
						?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Modal -->
    <div class="modal fade" id="modalkonsulat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Konsulat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="f1" method="post" action="<?= base_url('admin/crud_konsulat/tb_konsulat'); ?>">

                        <div class="row">
                            <div class="col">
                                <label for="foto">Nama Santri</label>

                                <a href="javascript:void(0);" NAME="SANTRI" title="Klik Untuk Cari SANTRI" onClick='javascript:window.open("t_santri_konsulat","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="ns" onchange="ambilniskon(this.value)" class="form-control"
                                        id="ns" placeholder="Klik disini untuk memilih Nama Santri"
                                        style="cursor:pointer;">
                                </a>
                            </div>

                            <input type="hidden" name="nis" id="nis" class="form-control">

                            <div class="col">
                                <label for="foto">Pembimbing</label>
                                <a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR"
                                    onClick='javascript:window.open("tkonsulat","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="pembimbing" id="pembimbing" class="form-control" required
                                        placeholder="klik disini untuk memilih pembimbing" style="cursor:pointer;">
                                </a>
                            </div>
                            <div class="col">
                                <label for="foto">Ketua Konsulat</label>
                                <a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR"
                                    onClick='javascript:window.open("tketuakonsulat","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="kk" id="kk" class="form-control" required
                                        placeholder="Klik disini untuk memilih Ketua" style="cursor:pointer;">
                                </a>
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