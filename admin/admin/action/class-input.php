<?php
include "koneksi.php";
// error_reporting(0);
// ini_set('display_errors', '0');
$kd=$_POST['kd_class'];
$class=$_POST['nm_class'];
$harga=$_POST['harga'];

  $query="INSERT INTO tbl_class values('$kd','$class','$harga')";
  $sqlinsert=mysqli_query($conn, $query);
  if ($sqlinsert) {
      header("location:../?page=data-class&simpan=sukses");
  }else {
      header("location:../?page=data-class&simpan=gagal");
  }


?>
