<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-success-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>

						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						<h5 class="text-white op-7 mb-2"> E-PESANTREN | AL - MASHDUQIAH <?= date('Y') ?></h5>
					</div>
					<div class="col-auto text-white text-right ml-auto btn btn-info"><i class="fa fa-clock"></i>  <b class="hari"></b><b class="text-white" id="jam"></b> : <b class="text-white" id="menit"></b> : <b class="text-white" id="detik"></b></div>
					<!--<h2 class="col-8 text-right text-white pb-4 fw-bold"><b class="btn btn-danger text-white" id="jam"></b> : <b class="btn btn-warning text-white" id="menit"></b> : <b class="btn btn-primary text-white" id="detik"></b></h2>-->
				</div>

			</div>
		</div>
		<div class="page-inner mt--5">

			<!-- Card With Icon States Background -->
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="flaticon-users"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Semua Data Santri</p>
										<h4 class="card-title"><?= count($santri); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-warning bubble-shadow-small">
										<i class="fas fa-users-cog"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Akun</p>
										<h4 class="card-title"><?= count($akun); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-danger bubble-shadow-small">
										<i class="fa fa-user-tie"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Orang Tua</p>
										<h4 class="card-title"><?= count($ortu); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-secondary bubble-shadow-small">
										<i class="fas fa-users"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Konsulat</p>
										<h4 class="card-title"><?= count($konsulat); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Row Card No Padding -->
			<!-- Card With Icon States Background -->
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-secondary bubble-shadow-small">
										<i class="fas fa-school"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Kelas</p>
										<h4 class="card-title"><?= count($kelas); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-info bubble-shadow-small">
										<i class="fa fa-building"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Kamar</p>
										<h4 class="card-title"><?= count($kmar); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-success bubble-shadow-small">
										<i class="fa fa-gavel"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Total Pelanggaran</p>
										<h4 class="card-title"><?= count($pp); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-warning bubble-shadow-small">
										<i class="fas fa-chalkboard-teacher"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Pengajar</p>
										<h4 class="card-title"><?= count($guru); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Row Card No Padding -->

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