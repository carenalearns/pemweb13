<?php
include('koneksi.php');
$korona = mysqli_query($koneksi,"select * from tb_corona order by kematian_baru desc");
while($row = mysqli_fetch_array($korona)){
	$negara[] = $row['negara'];
	$total_kasus[] = $row['kematian_baru'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Bar</title>
	<script type="text/javascript" src="Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="c.css">
	<style type="text/css">
		h2 {text-align: center;}
		body { width: 1000px; margin: 0 auto; }
	</style>
</head>
<h3><table align="center">
	<tr><td> <div class="leftlinks"> <a href="gbar_tk.php"> <b> Total Kasus </b></a> </div> </td>
		<td> <div class="leftlinks"> <a href="gbar_kb.php"> <b> Kasus Baru </b> </a> </div> </td>
		<td> <div class="leftlinks"> <a href="gbar_tm.php"> <b> Total Kematian </b> </a> </div> </td>
		<td> <div class="leftlinks"> <a href="gbar_mb.php"> <b> Kematian Baru </b> </a> </div> </td>
		<td> <div class="leftlinks"> <a href="gbar_ts.php"> <b> Total Sembuh </b> </a> </div> </td>
		<td> <div class="leftlinks"> <a href="gbar_ka.php"> <b> Kasus Aktif </b> </a> </div> </td>
	</tr>
	</table></h3>
<h2>GRAFIK KEMATIAN BARU COVID-19</h2>
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
					data: <?php echo json_encode($total_kasus); ?>,
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