<html>

<head>
    <!-- meta refresh yang merefresh halaman ini tiap 10 detik untuk periksa waktu -->
    <title>Alarm Santri/Santriwati</title>
</head>
<link rel="stylesheet" href="<?= base_url('assets'); ?>/template/css/bootstrap.min.css">

<link rel="icon" href="<?= base_url('assets/img'); ?>/alarm.png">
<?php $dat = ("H:i"); ?>
<script>
window.setInterval("waktu()", 1000);

function waktu() {
    var waktu = new Date();

    var jam = document.getElementById("jam").innerHTML = waktu.getHours();
    var mn = document.getElementById("menit").innerHTML = waktu.getMinutes();
    var det = document.getElementById("detik").innerHTML = waktu.getSeconds();

    var al = document.getElementById("alarm").value;
    var jams = document.getElementById("jams").value;
    var dtk = document.getElementById("dtk").value;
    var re = document.getElementById("re").value;

    if (mn == al && jam == jams && det == dtk) {
        ala();
    } else
    if (jam == jams && mn == al && det == re) {
        location.reload();
    } else
    if (jam == 00 && mn == 00 && det == 00) {
        location.reload();
    }
}

function ala() {
    var jd = window.open('pop', 'My Window', 'height= 200 px,width =300 px,');
    setTimeout(function() {
        jd.close();
    }, 180000);
}
</script>
<!--   style="background-image: url('https://almashduqiah.com/wp-content/uploads/2020/02/cropped-logo-pondok-web-1.png');background-repeat: no-repeat,no-repeat;background-position: center;background-size:98% auto;" -->

<body class="bg-dark">

    <div style="position:absolute;background-color:;width:300px;height:auto;margin-top:-160px;">
        <table border="2" width="90%" align="center" class="text-white text-center">
            <tr>
                <th colspan="4" class="p-2">Data Alarm Hari ini <br><?= date("d - m - Y") ?></th>
            </tr>
            <tr>
                <th colspan="4" class="p-3">
                    <a class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#modaltb">Tambah
                        Alarm</a>
                    <a class="btn btn-info float-right btn-sm" data-toggle="modal" data-target="#modalv">Data Alarm</a>
                </th>
            </tr>
            <?php foreach ($alarm as $keys) { ?>
            <tr>

                <td class="p-2">Jam</td>
                <td>:</td>
                <td><?= $keys->jam ?> : <?= $keys->menit ?></td>
                <td><a class="btn btn-warning btn-sm" href="<?= base_url('admin/crud_alarm/h_alarm/');
																echo $keys->code_ja ?>">Hapus </button></td>
            </tr>
            <?php }  ?>
        </table>
    </div>
    <?php
	date_default_timezone_set('Asia/Jakarta');
	$time = date('H:i');

	//silahkan set/ganti WAKTU ALARM berbunyi:
	?>
    <div class="col-5 ml-auto mr-auto" style="opacity:0.9;background-color:;">
        <table border="0" align="center" style="margin-top: 170px;">
            <tr>
                <td colspan="5" class="text-white" style="text-align: center;font-size: 20pt;font-weight: bolder;">Waktu
                    :<br> </td>
            </tr>
            <tr style="text-align: center;">
                <td>
                    <div id="jam" class="bg-white text-center col-12 p-4 h1 font-weight-bold rounded"></div>
                </td>
                <td style="font-weight: bold;font-size: 20pt;" class="text-white">:</td>
                <td>
                    <div id="menit" class="bg-white text-center col-12 p-4 h1 font-weight-bold  rounded"></div>
                </td>
                <td style="font-weight: bold;font-size: 20pt;" class="text-white">:</td>
                <td>
                    <div id="detik" class="bg-white text-center col-12 p-4 h1 font-weight-bold  rounded"></div>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    &nbsp;
                </td>
            </tr>
        </table>

        <table align="center" border="0" class="col-7 ">
            <tr>
                <br><br>
                <td colspan="5" class="text-white h5" style="text-align: center;font-weight: bolder;">ALARM
                    SELANJUTNYA<br><br></td>
            </tr>


            <?php foreach ($alarm2 as $key) {
			?>
            <tr class="text-white">
                <td class="">
                    <div class="float-right">&nbsp;&nbsp;</div>
                    <input class="form-control bg-dark text-white float-right"
                        style="border:;width:35%;font-size:30px;height:50px;" type="text" name="" id="jams"
                        value="<?= $key->jam ?>" readonly>
                </td>

                <td class="">
                    <div class="float-left h3">: &nbsp;</div>
                    <input class="form-control bg-dark text-white float-left"
                        style="border:;width:35%;font-size:30px;height:50px;" type="text" name="" id="alarm"
                        value="<?= $key->menit ?>" readonly>
                </td>
                <input type="hidden" name="" id="re" value="2"><br>
                <input class="float-right" type="hidden" name="" id="dtk" value="00">

    </div>
    </tr>

    <tr>
        <td colspan="2" class="text-center h4 text-white"><br>Jenis Kegiatan Berikutnya
            :<br><b><u><?= $key->keterangan ?></u></b></td>
    </tr>
    <?php } ?>

    </table>

    </div>
    <div
        style="width:100%;bottom:0;position:fixed;background-color:yellow;height:40px;font-size:25px;font-weight:bolder;">
        <marquee>PENGUMUMAN PENGUMUMAN GENG OKE</marquee>
    </div>
</body>

<script src="<?= base_url('assets') ?>/template/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/bootstrap.min.js"></script>
<!-- DATEPICKER -->
<script src="<?= base_url('assets') ?>/template/js/bootstrap-datepicker.js"></script>
<script>
$(function() {
    $(".calendar").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
});
</script>

<script>
var countBox = 1;
var boxName = 0;

function addInput() {
    var boxName = "textBox" + countBox;

    $("#responce").append("" +

        "<br>" +
        "<div class='row'>" +
        "<div class='col'>" +
        "	<label for='ttg'>Tanggal</label>" +
        "<input type='date' class='form-control' name='tgl[]' style='cursor:pointer;'>" +
        "</div>" +
        "<div class='col'>" +
        "<label for='foto'>Jam</label>" +
        "<select name='jam[]' class='form-control'>" +
        "<?php for ($v = 1; $v <= 24; $v++) { ?>" +
        "<option><?= $v ?></option>" +
        "<?php } ?>" +
        "</select>" +
        "</div>" +
        "<div class='col'>" +
        "<label for='foto'>Menit</label>" +
        "<select class='form-control' name='menit[]'>	" +
        "<?php for ($v = 1; $v <= 60; $v++) { ?>" +
        "<option><?= $v ?></option>" +
        "<?php } ?>" +
        "</select>" +
        "</div>"



    );
    // document.getElementById('responce').appendChild(newContent2);

    // document.getElementById('responce').innerHTML += '';
}

function minInput() {
    // var boxName = "textBox" + countBox;
    document.getElementById('responce').lastChild.remove();
    // countBox += 1;
}
</script>

</html>

<!-- Modal tb-->
<div class="modal fade" id="modaltb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alarm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form name="f2" method="post" action="<?= base_url('admin/crud_alarm/xls_import'); ?>"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label>Pilih File Excel :</label>
                            <input type="file" name="upload_file" class="form-control" required>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup
                </button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal view aLL -->
<div class="modal fade" id="modalv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alarm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center bg-info text-white">
                                    <h4>Data Semua Alarm</h4>
                                </th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Delete</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php
							$no = 1;
							foreach ($all as $key) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key->tanggal ?></td>
                                <td><?= $key->jam . ' - ' . $key->menit ?></td>
                                <td><a class="btn btn-danger btn-sm" href="<?= base_url('admin/crud_alarm/h_alarm/');
																				echo $key->code_ja ?>">X</a></td>
                            </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup
                </button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $(".datepicke").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
});
$(document).ready(function() {
    $('#basic-datatables').DataTable({});
    $('#basic-datatables2').DataTable({});

});
</script>