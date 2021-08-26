<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-success-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>

						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						<h5 class="text-white op-7 mb-2"> E-PESANTREN | AL - MASHDUQIAH <?= date('Y') ?></h5>
					</div>
					<div class="col-auto text-white text-right ml-auto btn btn-warning"><i class="fa fa-clock"></i>  <b class="hari"></b><b class="text-white" id="jam"></b> : <b class="text-white" id="menit"></b> : <b class="text-white" id="detik"></b></div>
					<!--<h2 class="col-8 text-right text-white pb-4 fw-bold"><b class="btn btn-danger text-white" id="jam"></b> : <b class="btn btn-warning text-white" id="menit"></b> : <b class="btn btn-primary text-white" id="detik"></b></h2>-->
				</div>

			</div>
		</div>
		<div class="page-inner mt-1  col-10 ml-auto mr-auto">

		</div>

		<div class="card col-10 ml-auto mr-auto">
  <div class="card-header bg-danger text-white"><h4>Info Akun</h4></div>
  <div class="card-body">
    <h5 class="card-title">Hello , Anda Login Sebagai</h5>
    <a class="btn btn-danger text-white"><h4><strong><?php if($admin['level'] == 3){echo"Staff Pengajar";} ?></strong></h4></a>
    <p></p>
    <p>Member sejak : <b><?php echo date("d-m-Y", strtotime($admin['tgl_join'])); ?></b></p>
    
  </div>
</div>
	</div>

	<script type="text/javascript">
		    window.setInterval("waktu()", 1000);
    function waktu() {
        var waktu = new Date();
        
        
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();

         
    }
	</script>