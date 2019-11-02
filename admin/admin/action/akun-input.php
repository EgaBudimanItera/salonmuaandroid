<?php
include "koneksi.php";
// error_reporting(0);
// ini_set('display_errors', '0');
$kd=$_POST['kd_akun'];
$nm_akun=$_POST['nm_akun'];
$jenis=$_POST['jenis_akun'];
$sql= mysqli_query($conn,"SELECT * from tbl_akun where kd_akun='$kd'");
$r=mysqli_num_rows($sql);
if ($r==0) {
  $query="INSERT INTO tbl_akun values('$kd','$jenis','$nm_akun')";
  $sqlinsert=mysqli_query($conn, $query);
  if ($sqlinsert) {
      header("location:../?page=data-akun&simpan=sukses");
  }else {
      header("location:../?page=data-akun&simpan=gagal");
  }

}else {
  header("location:../?page=data-akun&simpan=unameada");
}

?>
