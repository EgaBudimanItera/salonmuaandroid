<?php

include "koneksi.php";
$kode=$_POST['id'];
$pw=md5($_POST['pw_baru']);
echo $pwlama=md5($_POST['pw_lama']);
$sql= mysqli_query($conn,"SELECT * from tbl_admin where id='$kode'");
$r=mysqli_fetch_assoc($sql);
 $lama=$r['password'];

if ($pwlama==$lama) {
  $update = mysqli_query($conn, "UPDATE tbl_admin SET password='$pw' WHERE id='$kode' ") or die(mysqli_error());
	if($update){

    session_start();
    session_destroy();
    header("location:../login.php?edit=pwsukses");
	}else{
		header("location:../?page=profile&edit=gagal");
	}
}else {
  header("location:../?page=profile&edit=pwlama");
}

 ?>
