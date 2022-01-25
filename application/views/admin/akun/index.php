<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Akun</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-users-cog"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Extra</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Account</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Akun </h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalpm">
                                    <!-- data toogle dan modal hapus huruf z dblkang -->
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
                                                <th>Nama Akun</th>
                                                <th>Username</th>
                                                <th>Akses</th>
                                                <th>Gender</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $hh = 1;
											foreach ($akun as $key) :
												$ik = $key->level; ?>

                                            <tr>
                                                <td><?= $hh++; ?></td>
                                                <td><?= $key->nama ?></td>
                                                <td><?= $key->username ?></td>

                                                <td><?php if ($ik == 1) {
															echo "Administrator";
														} else if ($ik == 2) {
															echo "Staff Pengasuhan";
														} else if ($ik == 3) {
															echo "Staff Pengajaran";
														} else if ($ik == 4) {
															echo "Organtri";
														} else {
															echo "Poskestren";
														} ?></td>
                                                <td><?php if ($key->gender == 'L') {
															echo "Ismah";
														} else {
															echo "Iswah";
														} ?></td>
                                                <td>
                                                    <div class="row">

                                                        <a class="btn btn-primary btn-sm text-white" data-toggle="modal"
                                                            data-target="#modaled<?= $key->code_auth ?>"><i
                                                                class="fa fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger btn-sm text-white ml-1"><i
                                                                class="fa fa-trash"></i> Hapus</a>

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
    <div class="modal fade" id="modalpm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah AKun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="f1" method="post" action="<?= base_url('admin/crud_akun/tb_akun'); ?>">

                        <div class="row">
                            <div class="col">
                                <label for="namaaa">Nama Akun</label>
                                <input type="text" name="nama" required="" minlength="5"
                                    placeholder="input nama akun (min 5 Huruf)" class="form-control">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="user">Username</label>
                                <input type="text" required="" minlength="5" name="user" class="form-control"
                                    placeholder="input Username (min 5 Huruf)">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="pw">Password</label>
                                <input type="password" name="pw" class="form-control" value="" minlength="6"
                                    placeholder="Password min 6 huruf" required="">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="lvl">Tingakatan AKun</label>
                                <select name="lvl" class="form-control" required="">
                                    <option>-- Pilih Tingkatan --</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Staff Pengasuhan</option>
                                    <option value="3">Staff Pengajaran</option>
                                    <option value="4">Organisasi Santri</option>
                                    <option value="5">Poskestren</option>
                                </select>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
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

    <?php foreach ($akun as $key) : ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="modaled<?= $key->code_auth ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit AKun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="f1" method="post" action="<?= base_url('admin/crud_akun/tb_akun'); ?>">

                        <div class="row">
                            <div class="col">
                                <label for="namaaa">Nama Akun</label>
                                <input type="text" name="namae" value="<?= $key->nama ?>" required="" minlength="5"
                                    placeholder="input nama akun (min 5 Huruf)" class="form-control">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="user">Username</label>
                                <input type="text" required="" value="<?= $key->username ?>" readonly minlength="5"
                                    name="" class="form-control" placeholder="input Username (min 5 Huruf)">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="pw">Password</label>
                                <input type="password" name="pwe" class="form-control" value="" minlength="6"
                                    placeholder="Isi kolom ini jika ingin reset password(Min 6 huruf)" required="">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="lvl">Tingakatan AKun</label>
                                <select name="lvl" class="form-control" required>
                                    <option value="<?= $key->level ?>">-Jangan diubah bila tak ingin di ganti-</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Staff Pengasuhan</option>
                                    <option value="3">Staff Pengajaran</option>
                                    <option value="4">Organisasi Santri</option>
                                    <option value="5">Poskestren</option>
                                </select>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="<?= $key->gender ?>">-Jangan Diubah bila tak ingin Diganti-</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
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
    <?php endforeach; ?>