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
                        <a href="#">UMUM</a>
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
                                <h4 class="card-title">Data Extrakurikuler Santri</h4>
                            </div>
                            <br>
                            <div class="d-flex align-items-center">
                                <a href="<?= base_url('admin/laporan/l_extraS'); ?>" class="btn btn-warning btn-sm ml-auto">
                                    <i class="fa fa-print"></i>
                                    Print Data
                                </a>&nbsp;
                                <a href="<?= base_url('admin/laporan/export_extra'); ?>" class="btn btn-info btn-sm ">
                                    <i class="fa fa-download"></i>
                                    Download Data
                                </a>'
                            </div><br>
                            <div class="d-flex align-items-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;Filter : &nbsp;<select id="fil">
                                    <option value="">Semua Data</option>
                                    <?php foreach ($ext as $q) { ?>
                                        <option><?= $q->nama_extra ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Santri/Wati</th>
                                                <th>Nama Extrakurikuler</th>
                                                <th>Nama Pembimbing</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $p = 1;
                                            foreach ($Aextra as $ex) :
                                            ?>


                                                <tr>
                                                    <td><?= $p++; ?></td>
                                                    <td><?= $ex->nama ?></td>
                                                    <td><?= $ex->nama_extra ?></td>
                                                    <td><?= $ex->nama_pembimbing ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <a class="btn btn-primary btn-xs text-white ml-1" href="<?= base_url('pengasuhan/pengasuhan/edit_extra_umum/');
                                                                                                                    echo $ex->id_detaile . '/' . $this->uri->segment(4) ?>"><i class="fa fa-edit"></i></a>
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
    <?php foreach ($Aextra as $ex) { ?>
        <div class="modal fade" id="modalsantriz<?= $ex->id_detaile ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Santri/Wati</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('pengasuh/crud_extra/ed_ext'); ?>">
                            <input type="hidden" value="<?= $ex->id_detaile ?>" name="dt">
                            <div class="row">
                                <div class="col">
                                    <label for="nis">NIS</label>
                                    <a href="javascript:void(0);" NAME="NIS" title="Klik Untuk Cari NIS" onClick='javascript:window.open("eexstra","Ratting",
						"width=950,height=570,toolbar=1,status=1,");'>
                                        <input type="text" name="nise" onchange="ambilnise(this.value)" value="<?= $ex->nis ?>" class="form-control" id="nisee" placeholder="NIS">
                                    </a>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="nama">Nama</label>

                                    <input type="text" name="nama" readonly class="form-control" value="<?= $ex->nama ?>" id="nama" placeholder="Nama">
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
                            <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">

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
    <?php } ?>