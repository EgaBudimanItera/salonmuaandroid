<?php
include "koneksi.php";
$kd=$_POST['kd_class'];
$class=$_POST['nm_class'];
$harga=$_POST['harga'];

	$update = mysqli_query($conn, "UPDATE tbl_class SET nm_class='$class', harga='$harga' WHERE kd_class='$kd' ") or die(mysqli_error());
	if($update){
		header("location:../?page=data-class&edit=sukses");
	}else{
		header("location:../?page=data-class&edit=gagal");
	}

?>
