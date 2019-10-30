<?php
include "./koneksi.php";
// error_reporting(0);
// ini_set('display_errors', '0');
$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$pemilik = $_POST['pemilik'];
$lat = $_POST['lat'];
$long = $_POST['lng'];

  $nmfile=$_FILES['foto']['name'];
      $lokasi=$_FILES['foto']['tmp_name'];
      $tujuan="../../images";
      $tp=explode(".",$nmfile);

      $tipefile=$tp[1];
      if (!empty($nmfile)) {
        if($tipefile=="png" || $tipefile=="jpg"){
            
          $upload=move_uploaded_file($lokasi,$tujuan."/".$nmfile);
          if($upload){
          

            $id_user='';
            $max = mysqli_query($conn,"select count(nama)as jumlah from tbl_user ");
            while ($data = mysqli_fetch_assoc($max)) {
             $id_user=$data['jumlah'] + 4;
            
            }
            $query = mysqli_query($conn,"insert into tbl_user (id_admin,nama,no_telp,email,password,username,level) values ('$id_user',
            '$nama','$no_telp','$email','$password','$username','salon') ") or die (mysqli_error($con));
            $insert = mysqli_query($conn,"insert into tbl_salon (id_salon,nama,alamat,no_telp,email,foto,pemilik,lat,lng) values ('$id_user',
            '$nama','$alamat','$no_telp','$email','$nmfile','$pemilik','$lat','$long') ");
              
            if($insert){
              //   echo "error upload 2";
              header("location:../index.php?page=data-salon&simpan=sukses");
            }else{
              echo "error simpan";
            }
          }else{
            echo "error upload";
          }
        }else{
           /// echo "error upload4";
          header("location:../index.php?page=data-salon&simpan=error_file");
        }
      }
      else{
           echo "error uploadas";
      }
  



?>
