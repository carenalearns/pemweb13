<?php
include('koneksi.php');
$korona = mysqli_query($koneksi,"select * from tb_corona");
while($row = mysqli_fetch_array($korona)){
	$negara[] = $row['negara'];
	$kasus[] = $row['total_sembuh'];
}
?>
<!doctype html>
<html>

<head>
	<title>Grafik Doughnut</title>
	<script type="text/javascript" src="Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="c.css">
	<style type="text/css">
		h2 {text-align: center;}
		body { width: 1000px; margin: 0 auto; }
	</style>
</head>
<h3><table align="center">
	<tr><td> <div class="leftlinks"> <a href="gdo_tk.php"> <b> Total Kasus </b></a> </div> </td>
		<td> <div class="leftlinks"> <a href="gdo_kb.php"> <b> Kasus Baru </b> </a> </div> </td>
		<td> <div class="leftlinks"> <a href="gdo_tm.php"> <b> Total Kematian </b> </a> </div> </td>
		<td> <div class="leftlinks"> <a href="gdo_mb.php"> <b> Kematian Baru </b> </a> </div> </td>
		<td> <div class="leftlinks"> <a href="gdo_ts.php"> <b> Total Sembuh </b> </a> </div> </td>
		<td> <div class="leftlinks"> <a href="gdo_ka.php"> <b> Kasus Aktif </b> </a> </div> </td>
	</tr>
	</table></h3>
<h2>GRAFIK TOTAL SEMBUH COVID-19</h2>
<body>
	<div id="canvas-holder" style="width:100%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($kasus); ?>,
					backgroundColor: [
					'rgba(148, 0, 211, 0.2)',
					'rgba(139,69, 19, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 160, 122, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 69, 0, 0.2)',
					'rgba(0, 255, 0, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 0, 0, 0.2)'
					],
					borderColor: [
					'rgba(148, 0, 211, 1)',
					'rgba(139,69, 19, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 160, 122, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 69, 0, 1)',
					'rgba(0, 255, 0, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 0, 0, 1)'
					],
					label: 'Presentase'
				}],
				labels: <?php echo json_encode($negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>
