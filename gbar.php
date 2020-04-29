<?php
include('koneksi.php');
$korona = mysqli_query($koneksi,"select * from tb_corona");
while($row = mysqli_fetch_array($korona)){
	$negara[] = $row['negara'];
	$kasus[] = $row['total_kasus'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Bar</title>
	<script type="text/javascript" src="Chart.js"></script>
	<style type="text/css">
		h2 {text-align: center;}
		body { width: 1000px; margin: 0 auto; }
	</style>
</head>
<h2>GRAFIK TOTAL KASUS COVID-19</h2>
<body>
	<div style="width: 1000px; height: 1000px">
		<canvas id="myChart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($negara); ?>,
				datasets: [{
					label: 'Total Kasus',
					data: <?php echo json_encode($kasus); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>