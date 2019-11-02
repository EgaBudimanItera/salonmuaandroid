<?php
include "koneksi.php";
error_reporting(0);
ini_set('display_errors', '0');

$id = $_GET['id'];
$sql = "UPDATE tbl_kas set ketapp='Y' WHERE kd_kas = '$id'";
$hasil = mysqli_query($conn, $sql);
    if($hasil){
        //echo "sukses";
      header("location:../?page=validasi-kas&edit=sukses");
    }
    else{
        //echo "gagal";
      header("location:../?page=validasi-kas&edit=gagal");
    }
 ?>
