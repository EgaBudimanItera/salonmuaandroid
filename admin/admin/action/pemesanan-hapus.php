<?php
include "koneksi.php";
error_reporting(0);
ini_set('display_errors', '0');

 $id = $_GET['id'];
$sql3 = "DELETE FROM tbl_order WHERE id_order = '$id'";
$hasil = mysqli_query($conn, $sql3);

    if($hasil){
        //echo "sukses";
      header("location:../?page=data-pemesanan&pembatalan=sukses");
    }
    else{
        //echo "gagal";
      header("location:../?page=data-pemesanan&pembatalan=gagal");
    }
 ?>
