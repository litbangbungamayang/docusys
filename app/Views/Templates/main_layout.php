<!--
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php //echo base_url('public/bootstrap/js/bootstrap.js')?>"></script>
<link rel="stylesheet" href="<?php //echo base_url('public/bootstrap/css/bootstrap.css')?>" type="text/css">
-->
<script src="public/jquery/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.js')?>"></script>
<link rel="stylesheet" href="<?php echo base_url('public/bootstrap/css/bootstrap.css')?>" type="text/css"/>

<!--------------------------------- TABLER ----------------------------->
<!-- CSS files Tabler -->
<link href="public/tabler/css/tabler.min.css" rel="stylesheet"/>
<link href="public/tabler/css/tabler-flags.min.css" rel="stylesheet"/>
<link href="public/tabler/css/tabler-payments.min.css" rel="stylesheet"/>
<link href="public/tabler/css/tabler-vendors.min.css" rel="stylesheet"/>
<link href="public/tabler/css/demo.min.css" rel="stylesheet"/>
<!-- Libs JS -->
<script src="public/tabler/libs/apexcharts/dist/apexcharts.min.js"></script>
<!-- Tabler Core -->
<script src="public/tabler/js/tabler.min.js"></script>
<!-- JQuery -->

<!------------------------------------------------------------->


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?echo $pageTitle;?></title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="public/assets/favicon.ico"/>
</head>

<body class="antialiased" onLoad="defaultLoad();">
	<div class="wrapper">
		<!-- side menu -->
		<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark hide" id="navbar-to-hide">
		  <div class="container-fluid">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <h1 class="navbar-brand navbar-brand-autodark">
		      <a href=".">
		        <img src="public/assets/logo-white.png" width="220" height="64" alt="Tabler" class="navbar-brand-image">
		      </a>
		    </h1>
				<h4>PT Buma Cima Nusantara</h4>
		    <div class="collapse navbar-collapse" id="navbar-menu">
		      <ul class="navbar-nav pt-lg-3">
		        <li class="nav-item">
		          <a class="nav-link" href="./index.php" >
		            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
		              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
		            </span>
		            <span class="nav-link-title">
		              Home
		            </span>
		          </a>
		        </li>
						<li class="nav-item" visibility: "hidden">
		          <a class="nav-link" href="./index.php" >
		            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
		              <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg> -->
									<!-- Download SVG icon from http://tabler-icons.io/i/chart-line -->
									<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
										<line x1="4" y1="19" x2="20" y2="19" />
										<polyline points="4 15 8 9 12 11 16 6 20 10" />
									</svg>
								</span>
		            <span class="nav-link-title">
		              Pencapaian
		            </span>
		          </a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</aside>
		<div class="page-wrapper">
			<div class="container-xl">
				<!-- Page title -->
				<div class="page-header d-print-none">
					<div class="row align-items-center">
						<div class="col">
							<h2 class="page-title">
								Monitoring Kinerja
							</h2>
							<div class="page-pretitle" id="tgl_giling"></div>
							<div class="page-pretitle" id="tgl_aktual"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="page-body">
				<div class="container-xl">
					<!-- Baris data utama -->
					<div class="row row-deck row-cards">
						<!-- Kolom Bungamayang -->
						<div class="col-lg-6">
							<div class="row row-cards">
								<!-- Panel grafik -->
								<div class="col-12">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Bungamayang</h3>
											<div id="hourly-buma" class="chart-lg"></div>
										</div>
									</div>
								</div>
								<!-- Panel tebu masuk -->
								<div class="col-sm-4">
									<div class="card">
										<div class="card-status-top bg-lime"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="tebu_masuk_hi_buma">0</div>
											<div class="text-muted mb-3">tebu masuk h.i. (ton)</div>
											<div class="h1 m-0" id="tebu_masuk_sd_buma">0</div>
											<div class="text-muted mb-3">tebu masuk s.d. (ton)</div>
										</div>
									</div>
								</div>
								<!-- Panel tebu digiling -->
								<div class="col-sm-4">
									<div class="card">
										<div class="card-status-top bg-lime"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="tebu_giling_hi_buma">0</div>
											<div class="text-muted mb-3">tebu digiling h.i. (ton)</div>
											<div class="h1 m-0" id="tebu_giling_sd_buma">0</div>
											<div class="text-muted mb-3">tebu digiling s.d. (ton)</div>
										</div>
									</div>
								</div>
								<!-- Panel sisa tebu -->
								<div class="col-sm-4">
									<div class="card">
										<div class="card-status-top bg-lime"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="stok_buma">0</div>
											<div class="text-muted mb-3">sisa tebu (ton)</div>
										</div>
									</div>
								</div>
								<!-- Panel hektar tertebang -->
								<div class="col-sm-6">
									<div class="card">
										<div class="card-status-top bg-lime"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="protas_hi_buma">0</div>
											<div class="text-muted mb-3">protas tebu TS (ton/ha)</div>
											<div class="h1 m-0" id="protas_sd_buma">0</div>
											<div class="text-muted mb-3">protas tebu TS s.d. (ton/ha)</div>
										</div>
									</div>
								</div>
								<!-- Panel produksi gula -->
								<div class="col-sm-6">
									<div class="card">
										<div class="card-status-top bg-lime"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="gula_hi_buma">0</div>
											<div class="text-muted mb-3">produksi gula (ton)</div>
											<div class="h1 m-0" id="gula_sd_buma">0</div>
											<div class="text-muted mb-3">produksi gula s.d. (ton)</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Kolom Cinta Manis -->
						<div class="col-lg-6">
							<div class="row row-cards">
								<!-- Panel grafik -->
								<div class="col-12">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Cinta Manis</h3>
											<div id="hourly-cima" class="chart-lg"></div>
										</div>
									</div>
								</div>
								<!-- Panel tebu masuk -->
								<div class="col-sm-4">
									<div class="card">
										<div class="card-status-top bg-danger"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="tebu_masuk_hi_cima">0</div>
											<div class="text-muted mb-3">tebu masuk h.i. (ton)</div>
											<div class="h1 m-0" id="tebu_masuk_sd_cima">0</div>
											<div class="text-muted mb-3">tebu masuk s.d. (ton)</div>
										</div>
									</div>
								</div>
								<!-- Panel tebu digiling -->
								<div class="col-sm-4">
									<div class="card">
										<div class="card-status-top bg-danger"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="tebu_giling_hi_cima">0</div>
											<div class="text-muted mb-3">tebu digiling h.i. (ton)</div>
											<div class="h1 m-0" id="tebu_giling_sd_cima">0</div>
											<div class="text-muted mb-3">tebu digiling s.d. (ton)</div>
										</div>
									</div>
								</div>
								<!-- Panel sisa tebu -->
								<div class="col-sm-4">
									<div class="card">
										<div class="card-status-top bg-danger"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="stok_cima">0</div>
											<div class="text-muted mb-3">sisa tebu (ton)</div>
										</div>
									</div>
								</div>
								<!-- Panel hektar tertebang -->
								<div class="col-sm-6">
									<div class="card">
										<div class="card-status-top bg-danger"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="protas_hi_cima">0</div>
											<div class="text-muted mb-3">protas tebu TS (ton/ha)</div>
											<div class="h1 m-0" id="protas_sd_cima">0</div>
											<div class="text-muted mb-3">protas tebu TS s.d. (ton/ha)</div>
										</div>
									</div>
								</div>
								<!-- Panel produksi gula -->
								<div class="col-sm-6">
									<div class="card">
										<div class="card-status-top bg-danger"></div>
										<div class="card-body p-2 text-center">
											<div class="h1 m-0" id="gula_hi_cima">0</div>
											<div class="text-muted mb-3">produksi gula (ton)</div>
											<div class="h1 m-0" id="gula_sd_cima">0</div>
											<div class="text-muted mb-3">produksi gula s.d. (ton)</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Data Konsolidasi -->
						<div class="col-lg-12">
							<div class="row row-cards">
								<div class="col-12">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">BCN</h3>
											<div id="hourly-bcn" class="chart-lg"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Panel tebu masuk -->
						<div class="col-sm-4">
							<div class="card">
								<div class="card-status-top bg-cyan"></div>
								<div class="card-body p-2 text-center">
									<div class="h1 m-0" id="tebu_masuk_hi_bcn">0</div>
									<div class="text-muted mb-3">tebu masuk h.i. (ton)</div>
									<div class="h1 m-0" id="tebu_masuk_sd_bcn">0</div>
									<div class="text-muted mb-3">tebu masuk s.d. (ton)</div>
								</div>
							</div>
						</div>
						<!-- Panel tebu giling -->
						<div class="col-sm-4">
							<div class="card">
								<div class="card-status-top bg-cyan"></div>
								<div class="card-body p-2 text-center">
									<div class="h1 m-0" id="tebu_giling_hi_bcn">0</div>
									<div class="text-muted mb-3">tebu digiling h.i. (ton)</div>
									<div class="h1 m-0" id="tebu_giling_sd_bcn">0</div>
									<div class="text-muted mb-3">tebu digiling s.d. (ton)</div>
								</div>
							</div>
						</div>
						<!-- Panel produksi gula -->
						<div class="col-sm-4">
							<div class="card">
								<div class="card-status-top bg-cyan"></div>
								<div class="card-body p-2 text-center">
									<div class="h1 m-0" id="gula_hi_bcn">0</div>
									<div class="text-muted mb-3">produksi gula (ton)</div>
									<div class="h1 m-0" id="gula_sd_bcn">0</div>
									<div class="text-muted mb-3">produksi gula s.d. (ton)</div>
								</div>
							</div>
						</div>
						<!-- Testing panel -->
						<div class="col-sm-4">

						</div>
					</div>
				</div>
		</div>
	</div>
	<!-- Libs JS -->
	<!--<script src="public/tabler/libs/apexcharts/dist/apexcharts.min.js"></script>-->
	<!-- Tabler Core -->
	<script src="public/tabler/js/tabler.min.js"></script>
	<script>
		window.js_base_url = "<? echo base_url(); ?>" + "/index.php/";
		const bulan = ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGT", "SEP", "OKT", "NOV", "DES"];

		var tgl_last_lhp_buma = new Date();
		var v_tgl_giling = new Date();
		var v_tgl_giling_kemarin = new Date();
		var tgl_giling = $("#tgl_giling");
		var tgl_aktual = $("#tgl_aktual");
		//----- CIMA --------
		var tgl_last_lhp_cima = new Date();
		var tebu_masuk_hi_cima = $("#tebu_masuk_hi_cima");
		var tebu_masuk_sd_cima = $("#tebu_masuk_sd_cima");
		var tebu_giling_hi_cima = $("#tebu_giling_hi_cima");
		var tebu_giling_sd_cima = $("#tebu_giling_sd_cima");
		var protas_sd_cima = $("#protas_sd_cima");
		var protas_hi_cima = $("#protas_hi_cima");
		var txt_gula_hi_cima = $("#gula_hi_cima");
		var txt_gula_sd_cima = $("#gula_sd_cima");
		var stok_cima = $("#stok_cima");
		var arr_data_dashboard_cima = [];
		var arr_data_lhp_cima = [];
		//-------------------

		//----- BUMA ---------
		var tgl_last_lhp_buma = new Date();
		var tebu_masuk_hi_buma = $("#tebu_masuk_hi_buma");
		var tebu_masuk_sd_buma = $("#tebu_masuk_sd_buma");
		var tebu_giling_hi_buma = $("#tebu_giling_hi_buma");
		var tebu_giling_sd_buma = $("#tebu_giling_sd_buma");
		var protas_sd_buma = $("#protas_sd_buma");
		var protas_hi_buma = $("#protas_hi_buma");
		var txt_gula_hi_buma = $("#gula_hi_buma");
		var txt_gula_sd_buma = $("#gula_sd_buma");
		var stok_buma = $("#stok_buma");
		var arr_data_dashboard_buma = [];
		var arr_data_lhp_buma = [];
		//--------------------

		//------ BCN ---------
		var tebu_masuk_hi_bcn = $("#tebu_masuk_hi_bcn");
		var tebu_masuk_sd_bcn = $("#tebu_masuk_sd_bcn");
		var tebu_giling_hi_bcn = $("#tebu_giling_hi_bcn");
		var tebu_giling_sd_bcn = $("#tebu_giling_sd_bcn");
		var protas_sd_bcn = $("#protas_sd_bcn");
		var protas_hi_bcn = $("#protas_hi_bcn");
		var txt_gula_hi_bcn = $("#gula_hi_bcn");
		var txt_gula_sd_bcn = $("#gula_sd_bcn");
		var stok_bcn = $("#stok_bcn");
		//--------------------

		var arr_tebu_masuk_cima = [];
		var arr_tebu_giling_cima = [];
		var arr_tebu_masuk_buma = [];
		var arr_tebu_giling_buma = [];
		var arr_tebu_masuk_bcn = [];
		var arr_tebu_giling_bcn = [];

		//---------- holder untuk target kinerja -------- //
		var arr_target_rkap_buma = [];
		var arr_target_rkap_cima = [];
		var arr_target_takmar_buma = [];
		var arr_target_takmar_cima = [];
		//-------------------------------------------------
		const formatOptions = {maximumFractionDigits: 2, minimumFractionDigits: 2};
		const formatting = new Intl.NumberFormat('id-UK', formatOptions);
		function defaultLoad(){
			refreshData();
			setInterval(function(){ refreshData() }, 5000);
		}
		function convertArrayToNumber(arrToConvert){
			if (Array.isArray(arrToConvert)){
				var arrResult = [];
				for (var i = 0; i < arrToConvert.length; i++){
					if (arrToConvert[i] !== null){
						arrResult[i] = parseFloat(parseFloat(arrToConvert[i]).toFixed(2));
					} else {
						arrResult[i] = null;
					}
				}
				return arrResult;
			} else {
				return null;
			}
		}
	</script>

	<script>
		// @formatter:off
		// HOURLY BUNGAMAYANG
		var grafik_options = {
			chart: {
				id: "hourly-buma-id",
				type: "area",
				fontFamily: 'inherit',
				height: 240,
				parentHeightOffset: 0,
				toolbar: {
					show: false,
				},
				animations: {
					enabled: false
				},
				stacked: false,
			},
			stroke: {
				width: 2
			},
			plotOptions: {
				bar: {
					columnWidth: '50%',
				}
			},
			dataLabels: {
				enabled: false,
			},
			fill: {
				opacity: 1,
			},
			series: [
				{
					name: "test1",
					data: []
				}
			],
			grid: {
				padding: {
					top: -20,
					right: 0,
					left: -4,
					bottom: -4
				},
				strokeDashArray: 4,
				xaxis: {
					lines: {
						show: true
					}
				},
			},
			xaxis: {
				labels: {
					padding: 0,
					style: {
						fontSize: '10px'
					}
				},
				tooltip: {
					enabled: false
				},
				axisBorder: {
					show: false,
				},
				type: 'string',
			},
			noData: {
				text: "Tidak ada data"
			},
			yaxis: {
				labels: {
					padding: 4,
					style: {
						fontSize: '10px'
					}
				},
			},
			labels: ['06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','00','01','02','03','04','05'],
			colors: ["#69c41f", "#206bc4", "#206bc4",''],
			legend: {
				show: true,
			}
		};

		var grafik_buma = new ApexCharts(document.querySelector("#hourly-buma"),
				grafik_options
			);
		grafik_buma.render();
		function update_buma(){
			var url = js_base_url + "C_Dashboard/getMonitoringIntegrasiPerPg?pg=buma";
			$.getJSON(url, function(response){
				arr_tebu_masuk_buma = convertArrayToNumber(response.tebu_masuk);
				arr_tebu_giling_buma = convertArrayToNumber(response.tebu_digiling);
				grafik_buma.updateSeries([
					{
						name:'Tebu Masuk',
						data: arr_tebu_masuk_buma
					},
					{
						name:'Tebu Digiling',
						data: arr_tebu_giling_buma
					}
				]);
			});
		}
	</script>
	<script>
		// @formatter:off
		// HOURLY CINTA MANIS
		var grafik_options = {
			chart: {
				id: "hourly-cima-id",
				type: "area",
				fontFamily: 'inherit',
				height: 240,
				parentHeightOffset: 0,
				toolbar: {
					show: false,
				},
				animations: {
					enabled: false
				},
				stacked: false,
				zoom: {
					enabled: false
				}
			},
			stroke: {
				width: 2
			},
			plotOptions: {
				bar: {
					columnWidth: '50%',
				}
			},
			dataLabels: {
				enabled: false,
			},
			fill: {
				opacity: 0.8,
			},
			series: [
				{
					name: "testcima1",
					data: []
				}
			],
			grid: {
				padding: {
					top: -20,
					right: 0,
					left: -4,
					bottom: -4
				},
				strokeDashArray: 4,
				xaxis: {
					lines: {
						show: true
					}
				},
			},
			markers: {
				size: 5,
				hover: {
					size: 8
				}
			},
			xaxis: {
				labels: {
					padding: 0,
					style: {
						fontSize: '10px'
					}
				},
				tooltip: {
					enabled: false
				},
				axisBorder: {
					show: false,
				},
				type: 'string',
			},
			noData: {
				text: "Tidak ada data"
			},
			yaxis: {
				labels: {
					padding: 4,
					style: {
						fontSize: '10px'
					}
				},
			},
			labels: ['06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','00','01','02','03','04','05'],
			colors: ["#69c41f", "#206bc4", "#206bc4",''],
			legend: {
				show: true,
			}
		};

		var grafik_cima = new ApexCharts(document.querySelector("#hourly-cima"),
				grafik_options
			);
		grafik_cima.render();

		function update_cima(){
			var url = js_base_url + "C_Dashboard/getMonitoringIntegrasiPerPg?pg=cima";
			$.getJSON(url, function(response){
				arr_tebu_giling_cima = convertArrayToNumber(response.tebu_digiling);
				arr_tebu_masuk_cima = convertArrayToNumber(response.tebu_masuk);
				grafik_cima.updateSeries([
					{
						name:'Tebu Masuk',
						data: arr_tebu_masuk_cima
					},
					{
						name:'Tebu Digiling',
						data: arr_tebu_giling_cima
					}
				]);
			});
			var url_2 = js_base_url + "C_Dashboard/getDataDashboard?pg=cima";
			$.getJSON(url_2, function(response){
				arr_data_dashboard_cima = response[0];
				var ton_masuk_sd = parseFloat(response[0].tebu_masuk);
				var ton_giling_sd = parseFloat(response[0].tebu_giling);
				var tebu_masuk_kemarin = parseFloat(response[0].tebu_masuk_kemarin);
				var tebu_masuk_sd_kemarin = parseFloat(response[0].tebu_masuk_sd_kemarin);
				var tebu_masuk_ts_kemarin = parseFloat(response[0].tebu_masuk_ts_kemarin);
				var tebu_masuk_ts_sd_kemarin = parseFloat(response[0].tebu_masuk_ts_sd_kemarin);
				var ha_tebang_kemarin = parseFloat(response[0].ha_tebang_kemarin);
				var ha_tebang_sd_kemarin = parseFloat(response[0].ha_tebang_sd_kemarin);
				var ha_tebang_ts_kemarin = parseFloat(response[0].ha_tebang_ts_kemarin);
				var ha_tebang_ts_sd_kemarin = parseFloat(response[0].ha_tebang_ts_sd_kemarin);
				//console.log(response[0]);
				tebu_masuk_sd_cima.text(formatting.format(parseFloat(response[0].tebu_masuk)));
				tebu_masuk_hi_cima.text(formatting.format(parseFloat(response[0].tebu_masuk_hi)));
				tebu_giling_hi_cima.text(formatting.format(parseFloat(response[0].tebu_giling_hi)));
				tebu_giling_sd_cima.text(formatting.format(parseFloat(response[0].tebu_giling)));
				protas_hi_cima.text(formatting.format(tebu_masuk_ts_kemarin/ha_tebang_ts_kemarin));
				protas_sd_cima.text(formatting.format(tebu_masuk_ts_sd_kemarin/ha_tebang_ts_sd_kemarin));
				stok_cima.text(formatting.format(ton_masuk_sd-ton_giling_sd));
				//console.log(response[0].tebu_giling_hi);
			})
			var url_3 = js_base_url + "C_Dashboard/getLastLhp?pg=cima";
			$.getJSON(url_3, function(response){
				tgl_last_lhp_cima = new Date(response[0].last_lhp);
				//console.log(tgl_last_lhp_cima);
			})
			var url_4 = js_base_url + "C_Dashboard/getDataLastLhp?pg=cima";
			$.getJSON(url_4, function(response){
				arr_data_lhp_cima = response[0];
				txt_gula_hi_cima.text(formatting.format(response[0].gula_produksi));
				txt_gula_sd_cima.text(formatting.format(response[0].gula_produksi_sd));
			})
		}
	</script>
	<script>
		// @formatter:off
		// HOURLY BCN
		var grafik_options = {
			chart: {
				id: "hourly-bcn-id",
				type: "area",
				fontFamily: 'inherit',
				height: 240,
				parentHeightOffset: 0,
				toolbar: {
					show: false,
				},
				animations: {
					enabled: false
				},
				stacked: false,
				zoom: {
					enabled: false
				}
			},
			stroke: {
				width: 2
			},
			plotOptions: {
				bar: {
					columnWidth: '50%',
				}
			},
			dataLabels: {
				enabled: false,
			},
			fill: {
				opacity: 0.8,
			},
			series: [
				{
					name: "testbcn",
					data: []
				}
			],
			grid: {
				padding: {
					top: -20,
					right: 0,
					left: -4,
					bottom: -4
				},
				strokeDashArray: 4,
				xaxis: {
					lines: {
						show: true
					}
				},
			},
			markers: {
				size: 5,
				hover: {
					size: 8
				}
			},
			xaxis: {
				labels: {
					padding: 0,
					style: {
						fontSize: '10px'
					}
				},
				tooltip: {
					enabled: false
				},
				axisBorder: {
					show: false,
				},
				type: 'string',
			},
			noData: {
				text: "Tidak ada data"
			},
			yaxis: {
				labels: {
					padding: 4,
					style: {
						fontSize: '10px'
					}
				},
			},
			labels: ['06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','00','01','02','03','04','05'],
			colors: ["#69c41f", "#206bc4", "#206bc4",''],
			legend: {
				show: true,
			}
		};

		var grafik_bcn = new ApexCharts(document.querySelector("#hourly-bcn"),
				grafik_options
			);
		grafik_bcn.render();
		function updateBcn(){
			for(var i=0; i<24; i++){
				var buma = 0;
				var cima = 0;
				if (arr_tebu_masuk_buma[i] !== null) {buma = arr_tebu_masuk_buma[i]};
				if (arr_tebu_masuk_cima[i] !== null) {cima = arr_tebu_masuk_cima[i]};
				arr_tebu_masuk_bcn[i] = buma + cima;
			}
			for (var i = 0; i < 24; i++){
				var buma = 0;
				var cima = 0;
				if (arr_tebu_giling_buma[i] !== null) {buma = arr_tebu_giling_buma[i]};
				if (arr_tebu_giling_cima[i] !== null) {cima = arr_tebu_giling_cima[i]};
				arr_tebu_giling_bcn[i] = buma + cima;
			}
			//----- TODO : TAMBAHKAN PARAMETER UNTUK BUMA -------
			var ton_masuk_sd = +arr_data_dashboard_cima.tebu_masuk;
			var ton_giling_sd = +arr_data_dashboard_cima.tebu_giling;
			var tebu_masuk_ts_kemarin = +arr_data_dashboard_cima.tebu_masuk_ts_kemarin;
			var tebu_masuk_ts_sd_kemarin = +arr_data_dashboard_cima.tebu_masuk_ts_sd_kemarin;
			tebu_masuk_hi_bcn.text(formatting.format(+arr_data_dashboard_cima.tebu_masuk_hi));
			tebu_giling_hi_bcn.text(formatting.format(+arr_data_dashboard_cima.tebu_giling_hi));
			tebu_masuk_sd_bcn.text(formatting.format(ton_masuk_sd));
			tebu_giling_sd_bcn.text(formatting.format(ton_giling_sd));
			txt_gula_hi_bcn.text(formatting.format(+arr_data_lhp_cima.gula_produksi));
			txt_gula_sd_bcn.text(formatting.format(+arr_data_lhp_cima.gula_produksi_sd));
			//------------------------------------------------------
			grafik_bcn.updateSeries([
				{
					name:'Tebu Masuk',
					data: arr_tebu_masuk_bcn
				},
				{
					name:'Tebu Digiling',
					data: arr_tebu_giling_cima
				}
			]);
			var url = js_base_url + "C_Dashboard/tesDb";
			$.getJSON(url, function(response){
				//console.log(response);
			})
		}
	</script>

	<script>
		function appendLeadingZeroes(n){
			if (n <= 9){
				return "0" + n;
			}
			return n;
		}

		function refreshData() {
			var date = new Date();
			var time = date.toLocaleTimeString();
			$.ajax({
				url: js_base_url + "C_Dashboard/getTglTimbang",
				type: "GET",
				dataType: "json"
			}).done(function(data){
				//var tgl = new Date(data);
				v_tgl_giling = new Date(data);
				var formatted_tgl_giling = appendLeadingZeroes(v_tgl_giling.getDate())
					+ "-" + bulan[v_tgl_giling.getMonth()] + "-" + v_tgl_giling.getFullYear();
				tgl_giling.text("Tanggal Giling : " + formatted_tgl_giling);
				var tgl_skr = new Date();
				var formatted_tgl_skr = appendLeadingZeroes(tgl_skr.getDate()) + "-" +
					bulan[tgl_skr.getMonth()] + "-" + tgl_skr.getFullYear() + " " +
					appendLeadingZeroes(tgl_skr.getHours()) + ":" + appendLeadingZeroes(tgl_skr.getMinutes()) + ":" +
					appendLeadingZeroes(tgl_skr.getSeconds());
				tgl_aktual.text("Last update : " + formatted_tgl_skr);
				v_tgl_giling_kemarin = new Date(v_tgl_giling.setDate(v_tgl_giling.getDate()-1));
			});
			$.ajax({
				url: js_base_url + "C_Dashboard/getDataDashboard"
			})
			update_cima();
			update_buma();
			updateBcn();
		}
	</script>
<?php echo view('Templates/footer');
