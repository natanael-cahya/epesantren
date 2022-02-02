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
                                    <input type="text" value="<?= $ex->nama_pembimbing; ?>" class="form-control" id="pedit" name="pe" required placeholder="Nama Pembimbing">
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