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
                        <a href="#">Data Extrakurikuler</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Data Extrakurikuler
                                </h3>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalkamar">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Extrakurikuler</th>
                                                <th>Nama Pembimbing</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $p = 1;
                                            foreach ($extra as $ex) :
                                            ?>


                                                <tr>
                                                    <td><?= $p++; ?></td>
                                                    <td><?= $ex->nama_extra ?></td>
                                                    <td><?= $ex->nama_pembimbing ?></td>
                                                    <td>
                                                        <div class="row">

                                                            <!-- <a class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#modaledit<?= $ex->code_extra ?>"><i class="fa fa-edit"></i> </a> -->
                                                            <a href="<?= base_url('admin/admin/edit_extra/');
                                                                        echo $ex->code_extra ?>" class="btn btn-primary btn-sm text-white ml-1"><i class="fa fa-edit"></i> </a>
                                                            <a href="<?= base_url('admin/crud_extra/h_extra/');
                                                                        echo $ex->code_extra ?>" class="btn btn-danger btn-sm text-white ml-1"><i class="fa fa-trash"></i> </a>

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

    <!-- Modal -->
    <div class="modal fade" id="modalkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Extrakurikuler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="f1z" method="post" action="<?= base_url('admin/crud_extra/tb_extra'); ?>">
                        <div class="row">
                            <div class="col">
                                <label for="foto">Nama Extrakurikuler</label>
                                <input type="text" class="form-control" name="ex" placeholder="Nama Extra" required>
                            </div>
                            <div class="col">
                                <label for="foto">Pembimbing Extra</label>
                                <a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR" onClick='javascript:window.open("tguru","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
                                    <input type="text" class="form-control" name="pe" id="pe" placeholder="Nama Pembimbing" required>
                                </a>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($extra as $ex) : ?>
        <!-- Modal Edit -->
        <div class="modal fade" id="modaledit<?= $ex->code_extra ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel">Form Data Extrakurikuler</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form name="f1zs" method="post" action="<?= base_url('admin/crud_extra/ed_extra/');
                                                                echo $ex->code_extra ?>">
                            <div class="row">
                                <div class="col">
                                    <label for="ss">Nama Extrakurikuler kkk</label>
                                    <input type="text" value="<?= $ex->nama_extra; ?>" class="form-control" name="exe" placeholder="" required>
                                </div>
                                <div class="col">
                                    <label for="ff">Pembimbing Extra sf</label>
                                    <a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR" onClick='javascript:window.open("eguru2","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
                                        <input type="text" value="<?= $ex->nama_pembimbing; ?>" class="form-control" id="pe" name="pe" required placeholder="Nama Pembimbing">
                                    </a>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Edit Data</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>