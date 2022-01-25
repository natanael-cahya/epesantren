<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-graduation-cap"></i>
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
                        <a href="#">Kenaikan Kelas Santri/Wati</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col">
                    <!-- kelas -->
                    <div class="d-flex align-items-center" style="overflow:auto;">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalnaek1"><i
                                class="fa fa-users"></i> Naik/Pindah Kelas Santri/Wati</button>

                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Semua Santri/Wati </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama Santri</th>
                                                <th>Ruang kelas</th>
                                                <th>No Ruang</th>
                                                <th>kelas</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($santri as $key) { ?>

                                            <tr>
                                                <td><?= $key->nis ?></td>
                                                <td><?= $key->nama ?></td>
                                                <td><?= $key->nama_kelas ?></td>
                                                <td><?= $key->no_kls ?></td>
                                                <td><?= $key->kelass ?></td>


                                            </tr>

                                            <?php } ?>
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


    <!-- Modal naek1 -->
    <div class="modal fade" id="modalnaek1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-users"></i> <b>Kenaikan / Pindah
                            Kelas Santri/Wati</b> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col text-center font-weight-bold">Pilih santri/wati dari Kelas </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col">
                            <select class="form-control" name="kelass" onchange="caridatasantri()">
                                <option> - Pilih Kelas - </option>
                                <?php foreach ($klz as $k) { ?>
                                <option value="<?= $k->code_kelas ?>">
                                    <?php echo $k->nama_kelas . ' - [' .  $k->kelass . '] - ';
										if ($k->gender == 'L') {
											echo "ISMAH";
										} else {
											echo "ISWAH";
										} ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>



                    </div>
                    <br><br>
                    <form name="f11" method="post" action="<?= base_url('pengajar/pengajar/upd_kelas'); ?>">
                        <span class="tmpl"></span>

                        <div class="row">
                            <div class="col text-center font-weight-bold">Opsi Pindah/Naik Kelas</div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <select class="form-control" name="opsi_s" required>
                                    <option> - Pilih Kelas - </option>
                                    <option value="Alumni">Alumni</option>
                                    <?php foreach ($klz as $br) { ?>
                                    <option value="<?= $br->code_kelas ?>">
                                        <?php echo $br->nama_kelas . ' - [' .  $br->kelass . '] - ';
											if ($br->gender == 'L') {
												echo "ISMAH";
											} else {
												echo "ISWAH";
											} ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary col-12"><i class="fas fa-save"></i> Simpan Data</button>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup
                    </button>

                    </form>
                    <? php // } 
					?>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
    function caridatasantri() {
        kelass = $('[name="kelass"]');
        //jkz = $('[name="jkz"]')
        $.ajax({
            type: 'POST',
            data: "cari=" + 1 + "&kelass=" + kelass.val(), //+"&jkz="+jkz.val()
            url: '<?= base_url(); ?>admin/admin/ajaxnaek',
            cache: false,
            success: function(data) {
                $('.tmpl').html(data);
            }
        });
        return false;
    }

    function sudah() {
        niss = $('[name="p_nis"]');
        if (niss == "") {
            alert("Mohon pilih salah 1 Santri/Wati")
        }
        $.ajax({
            type: 'POST',
            data: "cari=" + 1 + "&kelass=" + kelass.val(), //+"&jkz="+jkz.val()
            url: '<?= base_url(); ?>admin/admin/ajaxnaek',
            cache: false,
            success: function(data) {
                $('.tmpl').html(data);
            }
        });
        return false;
    }
    </script>