<?php
include "koneksi.php";
error_reporting(0);
ini_set('display_errors', '0');

$id = $_GET['id'];
$sql = "DELETE FROM tbl_kas WHERE kd_kas = '$id'";
$hasil = mysqli_query($conn, $sql);
    if($hasil){
        //echo "sukses";
      header("location:../?page=data-pengeluaran&hapus=sukses");
    }
    else{
        //echo "gagal";
      header("location:../?page=data-pengeluaran&hapus=gagal");
    }
 ?>
