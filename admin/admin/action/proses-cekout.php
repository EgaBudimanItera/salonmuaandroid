<?php
include "koneksi.php";
// error_reporting(0);
// ini_set('display_errors', '0');
$kd_user=$_POST['kd_user'];
$kd_res=$_POST['kd_res'];
$ket=$_POST['stt_bayar'];
$jml_bayar=$_POST['jml_bayar'];

  $updateres= mysqli_query($conn, "UPDATE tbl_reservasi SET keterangan='$ket', jml_dp='$jml_bayar' WHERE kd_res='$kd_res' ") or die(mysqli_error());
  if ($updateres) {
    $updatedtl= mysqli_query($conn, "UPDATE tbl_dtl_reservasi SET  jml_bayar='$jml_bayar',status_dtl='A' WHERE kd_res='$kd_res' ") or die(mysqli_error());
    if ($updatedtl) {
      $queryres=mysqli_query($conn, "SELECT tbl_reservasi.*, tbl_dtl_reservasi.* from tbl_reservasi
        inner join tbl_dtl_reservasi on tbl_reservasi.kd_res=tbl_dtl_reservasi.kd_res WHERE tbl_reservasi.kd_res='$kd_res' ") or die(mysqli_error());
      $data=mysqli_fetch_array($queryres);
      $reff=$data['kd_dtl'];
      $tgl=$data['tgl_booking'];
      $ambltgl = substr($tgl,0,10);
      $exp= explode('-',$ambltgl);
      $extgl=$exp[2];
      $bulan  = $exp[1];
      $tahun  = $exp[0];
      if ($ket=="DP") {
        $prihal=$ket." ".$data['desk'];
      }else {
        $prihal=$data['desk'];
      }
      $kd               = "1".$extgl.$bulan;
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

      $inskas= mysqli_query($conn,"INSERT INTO tbl_kas values('$kd_kas','$prihal','$jml_bayar','penerimaan','tunai','$tgl','$bulan','$tahun','$reff','N','-','2','$kd_user')") or die(mysqli_error());
      if ($inskas) {
        // echo "oke coy";
        header("location:../?page=cek-resi&id=$kd_res");
      }
      else {
        echo "gagal kas";
      }
    }


  }
  else {
    echo "duh gagal";
  }
?>
