<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fa fa-building"></i>
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
                        <a href="#">Data Kamar Santri Ismah</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Kamar Ismah</h4>

                            <div class="d-flex align-items-center">


                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalkamar">
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

                                                <th>Wali Kamar</th>
                                                <th>Ruang kamar</th>
                                                <th>RAYON</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $p = 1;
											foreach ($kmr as $key) : ?>

                                            <tr>
                                                <td><?= $p++; ?></td>
                                                <td><?= $key->wali_kamar ?></td>
                                                <td><?= $key->rayon ?> <?= $key->ruang_kamar ?></td>
                                                <td><?= $key->rayon ?></td>
                                                <td>
                                                    <div class="row">

                                                        <a class="btn btn-primary btn-sm text-white ml-1" href="<?= base_url('pengasuhan/pengasuhan/edit_kamar_ismah/');
																													echo $key->code_kamar ?>"><i class="fa fa-edit"></i> </a>

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
    <div class="modal fade" id="modalkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="f1z" method="post" action="<?= base_url('pengasuhan/crud_kamar/tb_kamar'); ?>">
                        <?php $u = $this->uri->segment(3) ?>
                        <div class="row">
                            <input type="hidden" name="uri" value="<?= $u ?>">
                            <input type="hidden" name="g" value="L">
                            <div class="col">
                                <label for="foto">Wali Kamar</label>
                                <a href="javascript:void(0);" NAME="PENGAJAR" title="Klik Untuk Cari NAMA PENGAJAR"
                                    onClick='javascript:window.open("tkamarlaki","Ratting",
						"width=750,height=570,toolbar=1,status=1,");'>
                                    <input type="text" name="wk" id="wk" class="form-control"
                                        placeholder="Input Wali kamar" required>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col">
                                <label for="foto">Rayon</label>
                                <select name="rayon" class="form-control" required>
                                    <option value="AT-Ikhlas">AL-Ikhlas</option>
                                    <option value="AT-Taubah">AT-Taubah</option>
                                    <option value="AL-Kautsar Selatan">AL-Kautsar Selatan</option>
                                    <option value="AL-Kautsar Utara">AL-Kautsar Utara</option>
                                    <option value="AN-Nur">AN-Nur</option>
                                    <option value="AN-Nissa'">AN-Nissa'</option>
                                </select>

                            </div>
                            <div class="col">
                                <label for="foto">No Kamar</label>
                                <select name="rk" class="form-control" required>
                                    <?php for ($i = 1; $i <= 15; $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                        </div>
                        <br>

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