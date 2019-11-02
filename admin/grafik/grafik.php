<!DOCTYPE html>
<html>
<head>
	
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>




	<?php 
	include 'koneksi.php';
	
	@$id_toko = $_GET['id_toko'];
	?>

	<div style="width: 100%;height:100%;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Januari", "Februari", "Maret", "April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jan = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 1 and id_toko = '$id_toko' ");
					echo mysqli_num_rows($jan);
					?>, 
					<?php 
					$feb = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 2 and id_toko = '$id_toko' ");
			
					echo mysqli_num_rows($feb);
					?>, 
					<?php 
					$mar = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 3 and id_toko = '$id_toko' ");
					echo mysqli_num_rows($mar);
					?>, 
					<?php 
						$april = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 4 and id_toko = '$id_toko' ");
						echo mysqli_num_rows($april);
					?>,
					<?php 
						$mei = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 5 and id_toko = '$id_toko' ");
						echo mysqli_num_rows($mei);
					?>,
					<?php 
						$juni = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 6 and id_toko = '$id_toko' ");
						echo mysqli_num_rows($juni);
					?>,
					<?php 
						$juli = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 7 and id_toko = '$id_toko' ");
						echo mysqli_num_rows($juli);
					?>,
					<?php 
						$agus = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 8 and id_toko = '$id_toko' ");
						echo mysqli_num_rows($agus);
					?>,
					<?php 
						$september = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 9  and id_toko = '$id_toko' ");
						echo mysqli_num_rows($september);
					?>,
					<?php 
						$okt = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 10 and id_toko = '$id_toko' ");
						echo mysqli_num_rows($okt);
					?>,
					<?php 
						$nov = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 11 and id_toko = '$id_toko' ");
						echo mysqli_num_rows($nov);
					?>,
					<?php 
						$des = mysqli_query($koneksi,"SELECT * from tbl_service where MONTH(STR_TO_DATE(tanggal,'%d-%m-%Y')) = 12 and id_toko = '$id_toko' ");
						echo mysqli_num_rows($des);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
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