<?php
include "koneksi.php";
error_reporting(0);
ini_set('display_errors', '0');

$id = $_GET['id'];

$query=mysqli_query($conn,"SELECT * from tbl_dtl_reservasi where kd_res='$id'");
 $data=mysqli_fetch_assoc($query);
 echo $reff=$data['kd_dtl'];

$sql = "DELETE FROM tbl_reservasi WHERE kd_res = '$id'";
$hasil = mysqli_query($conn, $sql);
    if($hasil){
      $sql2="DELETE FROM tbl_kas WHERE reff='$reff'";
        $hasil2 = mysqli_query($conn, $sql2);
        if ($hasil2) {
          header("location:../?page=data-pembatalan&hapus=sukses");
        }
        else {
          echo "gagal kas";
        }
    }
    else{
      echo "gagal";
      // header("location:../?page=data-admin&hapus=gagal");
    }
 ?>
