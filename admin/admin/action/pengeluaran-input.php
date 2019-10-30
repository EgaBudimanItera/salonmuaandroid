<?php
include "koneksi.php";
// error_reporting(0);
// ini_set('display_errors', '0');
$prihal=$_POST['prihal'];
$jml=$_POST['jml_kas'];
$jenis="pengeluaran";
$status=$_POST['status'];
$reff="-";
$kd_user=$_POST['kd_user'];
$tgl=$_POST['tgl-pengkas'];
echo $ambltgl = substr($tgl,0,10);
$exp= explode('-',$ambltgl);
$extgl=$exp[2];
$bulan  = $exp[1];
$tahun  = $exp[0];
$kd     = "6".$extgl.$bulan;
$kd_akun = $_POST['kd_akun'];
//kodekas
$sqldtl=mysqli_query($conn,("SELECT kd_kas FROM tbl_kas where kd_kas like '$kd%' order by kd_kas DESC"));
$data1=mysqli_fetch_array($sqldtl);
  if(mysqli_num_rows($sqldtl)>0){
    $kodeawal=(int)substr($data1['kd_kas'],5,6);
    $jumlahkd=$kodeawal+1;
    $kd_kas=$kd.sprintf("%02s",$jumlahkd);
  }
  else{
    $kd_kas=$kd."01";
  }


    $nmfile=$_FILES['gambar']['name'];
    $lokasi=$_FILES['gambar']['tmp_name'];
    $tujuan="../img/scan";
    $tp=explode(".",$nmfile);
    $tipefile=$tp[1];
    if (!empty($nmfile)) {
      if($tipefile=="png" || $tipefile=="jpg"){
        $upload=move_uploaded_file($lokasi,$tujuan."/".$nmfile);
        if($upload){
          $insert= mysqli_query($conn,"INSERT INTO tbl_kas values('$kd_kas','$prihal','$jml','$jenis','$status','$tgl','$bulan','$tahun','$reff','N','$nmfile','$kd_akun','$kd_user')") or die(mysqli_error());
          if($insert){
            header("location:../?page=data-pengeluaran&simpan=sukses");
          }else{
            echo "error simpan";
          }
        }else{
          echo "error upload";
        }
      }else{
        header("location:../?page=data-pengeluaran&simpan=error_file");
      }
    }
    else {
    $insert=mysqli_query($conn,"INSERT INTO tbl_kas values('$kd_kas','$prihal','$jml','$jenis','$status','$tgl','$bulan','$tahun','$reff','N','-','$kd_akun','$kd_user')") or die(mysqli_error());
    if($insert){
      header("location:../?page=data-pengeluaran&simpan=sukses");
    }else{
      echo "error simpan";
    }
  }

?>
