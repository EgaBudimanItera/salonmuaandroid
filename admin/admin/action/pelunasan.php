<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
// error_reporting(0);
// ini_set('display_errors', '0');

$id = $_GET['id'];
$kd_user-$_GET['user'];
$qdetail = mysqli_query($conn, ("SELECT tbl_reservasi.*,tbl_dtl_reservasi.* FROM tbl_reservasi
  inner join tbl_dtl_reservasi on tbl_dtl_reservasi.kd_res=tbl_reservasi.kd_res WHERE tbl_reservasi.kd_res= '$id'"));
$dtdtl=mysqli_fetch_assoc($qdetail);
$desk="Pelunasan ".$dtdtl['desk'];
$kdtl=$id.'2';
$dp=$dtdtl['jml_dp'];
$totbayar=$dtdtl['tot_bayar'];
$kurang= $totbayar-$dp;

$insdtl=mysqli_query($conn, ("INSERT INTO tbl_dtl_reservasi values('$kdtl','$id','$desk','$kurang','A')"));
if ($insdtl) {
  $tgl=date("Y-m-d H:i:s");
  $ambltgl = substr($tgl,0,10);
  $exp= explode('-',$ambltgl);
  $extgl=$exp[2];
  $bulan  = $exp[1];
  $tahun  = $exp[0];
  $kd     = "1".$extgl.$bulan;
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

    $inskas= mysqli_query($conn,"INSERT INTO tbl_kas values('$kd_kas','$desk','$kurang','penerimaan','tuani','$tgl','$bulan','$tahun','$kdtl','N','-','2','$kd_user')") or die(mysqli_error());
    if ($inskas) {
      // echo "oke coy";
      $updateres= mysqli_query($conn, "UPDATE tbl_reservasi SET keterangan='L', jml_dp='$totbayar' WHERE kd_res='$id' ") or die(mysqli_error());
      if ($updateres) {

        header("location:../?page=cek-resi&id=$id");
      }
      else {
        echo "gagal updt";
      }
    }
    else {
      echo "gagal kas";
    }
}
else {
  echo "gagal dtl";
}

 ?>
