<?php
include "koneksi.php";
error_reporting(0);
ini_set('display_errors', '0');

 $id = $_GET['id'];
$sql = "DELETE FROM tbl_salon WHERE id_salon = '$id'";
$sql3 = "DELETE FROM tbl_user WHERE id_admin = '$id'";
$hasil3 = mysqli_query($conn, $sql3);

$hasil = mysqli_query($conn, $sql);
    if($hasil){
        //echo "sukses";
      header("location:../?page=data-salon&hapus=sukses");
    }
    else{
        //echo "gagal";
      header("location:../?page=data-salon&hapus=gagal");
    }
 ?>
