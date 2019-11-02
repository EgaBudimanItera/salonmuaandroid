<?php
include "koneksi.php";
// error_reporting(0);
// ini_set('display_errors', '0');
$kd_user=$_POST['kd_user'];
$tgl=$_POST['tgl-fpengkas'];
$jumlah=$_POST['jumlah'];
$prihal=$_POST['prihal'];
$nmfile=$_FILES['gambar']['name'];
$lokasi=$_FILES['gambar']['tmp_name'];
$tujuan="../img/fpengeluaran";
$tp=explode(".",$nmfile);
$tipefile=$tp[1];
if (!empty($nmfile)) {
  if($tipefile=="png" || $tipefile=="jpg"){
    $upload=move_uploaded_file($lokasi,$tujuan."/".$nmfile);
    if($upload){
      $insert= mysqli_query($conn,"INSERT INTO tbl_fpengeluaran values('','$tgl','$prihal','$nmfile','$kd_user','$jumlah')") or die(mysqli_error());
      if($insert){
        header("location:../?page=Form-pengeluarankas&simpan=sukses");
      }else{
        echo "error simpan";
      }
    }else{
      echo "error upload";
    }
  }else{
    header("location:../?page=Form-pengeluarankas&simpan=error_file");
  }
}

?>
