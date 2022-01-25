<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-user-tie"></i>
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
                        <a href="#">Data Orang Tua</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Orang Tua </h4>

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
                                                <th>Nama Ayah</th>
                                                <th>Nama Ibu</th>
                                                <th>No HP Ayah</th>
                                                <th>No HP Ibu</th>
                                                <th>Penghasilan Keluarga</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $p = 1;
											foreach ($ortu as $kiy) : $hs = $kiy->penghasilan_ayah + $kiy->penghasilan_ibu; ?>

                                            <tr>
                                                <td><?= $p++; ?></td>
                                                <td><?= $kiy->nama_ayah ?></td>
                                                <td><?= $kiy->nama_ibu ?></td>
                                                <td><?= $kiy->no_hp_ayah ?></td>
                                                <td><?= $kiy->no_hp_ibu ?></td>
                                                <td>&plusmn; Rp.<?= number_format("$hs", 0, ",", ".") ?></td>
                                                <td>
                                                    <div class="row">

                                                        <a class="btn btn-primary btn-sm text-white" data-toggle="modal"
                                                            data-target="#modaled<?= $kiy->id_ortu ?>"><i
                                                                class="fa fa-edit"></i></a>
                                                        <a class="btn btn-danger btn-sm text-white ml-1" href="<?= base_url('admin/crud_ortu/h_ortu/');
																													echo $kiy->id_ortu ?>"><i class="fa fa-trash"></i> </a>

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
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Orang Tua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="f1" method="post" action="<?= base_url('admin/crud_ortu/tb_ortu'); ?>">

                        <div class="row">
                            <div class="col">
                                <label for="foto">Nama Ayah</label>
                                <input type="text" name="ayah" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="foto">Nama Ibu</label>
                                <input type="text" name="ibu" class="form-control" required>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Agama Ayah</label>
                                <select class="form-control" name="agama_a">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>


                            </div>
                            <div class="col">
                                <label for="foto">Agama Ibu</label>
                                <select class="form-control" name="agama_i">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Tempat Lahir Ayah</label>
                                <input type="text" name="tempat_a" class="form-control">
                            </div>
                            <div class="col">
                                <label for="foto">Tanggal Lahir Ayah</label>
                                <input type="text" class="form-control datepicker" name="tgl_a">
                            </div>
                            <div class="col">
                                <label for="foto">Tempat Lahir Ibu</label>
                                <input type="text" name="tempat_i" class="form-control">
                            </div>
                            <div class="col">
                                <label for="foto">Tanggal Lahir Ibu</label>
                                <input type="text" class="form-control datepicker" name="tgl_i">

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="foto">Pendidikan Terakhir Ayah</label>
                                <input type="text" name="pendidikan_a" class="form-control">

                            </div>
                            <div class="col">
                                <label for="foto">Pendidikan Terakhir Ibu</label>
                                <input type="text" name="pendidikan_i" class="form-control">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Pekerjaan Ayah</label>
                                <input type="text" name="perkerjaan_a" class="form-control">

                            </div>
                            <div class="col">
                                <label for="foto">Pekerjaan Ibu</label>
                                <input type="text" name="perkerjaan_i" class="form-control">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Penghasilan Ayah / Bulan</label>
                                <input type="text" name="penghasilan_a" class="form-control">

                            </div>
                            <div class="col">
                                <label for="foto">Penghasilan Ibu / Bulan</label>
                                <input type="text" name="penghasilan_i" class="form-control">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">No HP Ayah</label>
                                <input type="text" name="no_a" class="form-control">

                            </div>
                            <div class="col">
                                <label for="foto">No HP Ibu</label>
                                <input type="text" name="no_i" class="form-control">

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

    <?php $p = 1;
	foreach ($ortu as $kiy) : ?>
    <!-- Modal edit -->
    <div class="modal fade" id="modaled<?= $kiy->id_ortu ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Orang Tua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="f1" method="post" action="<?= base_url('admin/crud_ortu/ed_ortu'); ?>">

                        <div class="row">
                            <div class="col">
                                <label for="foto">Nama Ayah</label>
                                <input type="text" name="ayahe" value="<?= $kiy->nama_ayah ?>" class="form-control"
                                    required>
                            </div>
                            <div class="col">
                                <label for="foto">Nama Ibu</label>
                                <input type="text" name="ibue" value="<?= $kiy->nama_ibu ?>" class="form-control"
                                    required>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Agama Ayah</label>
                                <select class="form-control" name="agama_ae">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>


                            </div>
                            <div class="col">
                                <label for="foto">Agama Ibu</label>
                                <select class="form-control" name="agama_ie">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Tempat Lahir Ayah</label>
                                <input type="text" name="ttl_a" class="form-control" value="<?= $kiy->tetala_ayah ?>">
                            </div>

                            <div class="col">
                                <label for="foto">Tempat Lahir Ibu</label>
                                <input type="text" name="ttl_i" class="form-control" value="<?= $kiy->tetala_ibu ?>">
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="foto">Pendidikan Terakhir Ayah</label>
                                <input type="text" name="pendidikan_ae" class="form-control"
                                    value="<?= $kiy->pend_terakhir_ayah ?>">

                            </div>
                            <div class="col">
                                <label for="foto">Pendidikan Terakhir Ibu</label>
                                <input type="text" name="pendidikan_ie" class="form-control"
                                    value="<?= $kiy->pend_akhir_ibu ?>">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Pekerjaan Ayah</label>
                                <input type="text" name="perkerjaan_ae" class="form-control"
                                    value="<?= $kiy->pekerjaan_ayah ?>">

                            </div>
                            <div class="col">
                                <label for="foto">Pekerjaan Ibu</label>
                                <input type="text" name="perkerjaan_ie" class="form-control"
                                    value="<?= $kiy->pekerjaan_ibu ?>">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">Penghasilan Ayah / Bulan</label>
                                <input type="text" name="penghasilan_ae" class="form-control"
                                    value="<?= $kiy->penghasilan_ayah ?>">

                            </div>
                            <div class="col">
                                <label for="foto">Penghasilan Ibu / Bulan</label>
                                <input type="text" name="penghasilan_ie" class="form-control"
                                    value="<?= $kiy->penghasilan_ibu ?>">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="foto">No HP Ayah</label>
                                <input type="text" name="no_ae" class="form-control" value="<?= $kiy->no_hp_ayah ?>">

                            </div>
                            <div class="col">
                                <label for="foto">No HP Ibu</label>
                                <input type="text" name="no_ie" class="form-control" value="<?= $kiy->no_hp_ibu ?>">
                                <input type="hidden" name="idd" value="<?= $kiy->id_ortu ?>">
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

    <?php endforeach; ?>