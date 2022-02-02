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
                        <a href="#">Edit Data Extrakurikuler</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Edit Data Extrakurikuler
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <?php foreach ($extra2 as $ex) : ?>
                                    <!-- Modal Edit -->


                                    <form name="f1zs" method="post" action="<?= base_url('admin/crud_extra/ed_extra/');
                                                                                echo $ex->code_extra ?>">
                                        <div class="row">
                                            <div class="col">
                                                <label for="ss">Nama Extrakurikuler</label>
                                                <input type="text" value="<?= $ex->nama_extra; ?>" class="form-control"
                                                    name="exe" placeholder="" required>
                                            </div>
                                            <div class="col">
                                                <label for="ff">Pembimbing Extra </label>
                                                <a href="#bannerformmodal" data-toggle="modal"
                                                    data-target="#bannerformmodal">
                                                    <input type="text" value="<?= $ex->nama_pembimbing; ?>"
                                                        class="form-control" id="pee" name="pee" required
                                                        placeholder="Nama Pembimbing">
                                                </a>
                                            </div>
                                        </div>
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Edit
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


<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true"
    id="bannerformmodal">
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

                                <td><a href='#' onclick="etangkap('<?= $row->nama_pengajar ?>');"><button
                                            class="btn btn-primary">PILIH</button></a></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup
                </button>

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


function etangkap(s) {

    document.getElementById('pee').value = s;
    $('#bannerformmodal').modal('hide');
}
</script>