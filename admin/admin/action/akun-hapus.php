<?php
include "koneksi.php";
error_reporting(0);
ini_set('display_errors', '0');

$id = $_GET['id'];
$sql = "DELETE FROM tbl_akun WHERE kd_akun = '$id'";
$hasil = mysqli_query($conn, $sql);
    if($hasil){
        //echo "sukses";
      header("location:../?page=data-akun&hapus=sukses");
    }
    else{
        //echo "gagal";
      header("location:../?page=data-akun&hapus=gagal");
    }
 ?>
