<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data kamar Ismah</h4>
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
                        <a href="#">UMUM</a>
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

                            <!-- Menu kelassssssssss -->
                            <div class="d-flex align-items-center">
                                <a href="<?= base_url('admin/laporan/l_kamarS'); ?>/L" target="_blank"
                                    class="btn btn-warning btn-sm ml-auto">
                                    <i class="fa fa-print"></i>
                                    Print Data
                                </a>&nbsp;&nbsp;
                                <a href="<?= base_url('admin/laporan/export_kamar'); ?>/L" target="_blank"
                                    class="btn btn-info btn-sm ">
                                    <i class="fa fa-download"></i>
                                    Download Data
                                </a>
                            </div><br>
                            <div class="d-flex align-items-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;Filter : &nbsp;<select id="fil">
                                    <option value="">Semua Data</option>
                                    <?php foreach ($kmrr as $q) { ?>
                                    <option><?= $q->rayon . ' ' . $q->ruang_kamar ?></option>
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
                                                <th>Wali Kamar</th>
                                                <th>RAYON</th>
                                                <th>Ruang kamar</th>

                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $p = 1;
                                            foreach ($kmr as $key) : ?>

                                            <tr>
                                                <td><?= $p++; ?></td>
                                                <td><?= $key->nama ?></td>
                                                <td><?= $key->wali_kamar ?></td>
                                                <td><?= $key->rayon ?></td>
                                                <td><?= $key->rayon ?> <?= $key->ruang_kamar ?></td>

                                                <td>
                                                    <div class="row">

                                                        <a class="btn btn-primary btn-xs text-white ml-1"
                                                            href="<?= base_url('admin/admin/edit_kamar_ismah_umum/');
                                                                                                                    echo $key->nis . '/' . $this->uri->segment(4) ?>"><i
                                                                class="fa fa-edit"></i></a>


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