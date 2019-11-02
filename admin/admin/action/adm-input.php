<?php
include "koneksi.php";
// error_reporting(0);
// ini_set('display_errors', '0');
$kd=$_POST['kd'];
$nm=$_POST['nama'];
$mail=$_POST['email'];
$uname=$_POST['username'];
$pass=md5($_POST['pass']);
$jabatan=$_POST['jabatan'];
$sql= mysqli_query($conn,"SELECT * from tbl_admin where username='$uname'");
$r=mysqli_num_rows($sql);
if ($r==0) {
  $query="INSERT INTO tbl_admin values('$kd','$uname','$pass','$nm','$mail','$jabatan','Y')";
  $sqlinsert=mysqli_query($conn, $query);
  if ($sqlinsert) {
      header("location:../?page=data-admin&simpan=sukses");
  }else {
      header("location:../?page=data-admin&simpan=gagal");
  }

}else {
  header("location:../?page=data-admin&simpan=unameada");
}

?>
