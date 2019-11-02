<?php
include "koneksi.php";
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
$id = $_POST['id'];
$password = $_POST['password'];

  $nmfile=$_FILES['foto']['name'];
      $lokasi=$_FILES['foto']['tmp_name'];
      $tujuan="../../images";
      $tp=explode(".",$nmfile);

      $tipefile=$tp[1];
      if (!empty($nmfile)) {
        if($tipefile=="png" || $tipefile=="jpg"){
          $upload=move_uploaded_file($lokasi,$tujuan."/".$nmfile);
          if($upload){

            $query = mysqli_query($conn,"UPDATE tbl_user SET nama='$nama', no_telp = '$no_telp' , email = '$email', password='$password' WHERE id_admin = '$id' ") or die (mysqli_error($con));

            $insert = mysqli_query($conn,"UPDATE tbl_salon SET nama='$nama', alamat='$alamat', no_telp='$no_telp', email= '$email', foto='$nmfile', pemilik='$pemilik', lat= '$lat', lng='$long' WHERE id_salon = '$id' ");


            if($insert){
              header("location:../?page=data-salon&rdit=sukses");
            }else{
              echo "error EDit";
            }
          }else{
            echo "error upload";
          }
        }else{
          header("location:../?page=data-salon&edit=error_file");
        }
      }
      else{
        $query = mysqli_query($conn,"UPDATE tbl_user SET nama='$nama', no_telp = '$no_telp' , email = '$email', password='$password' WHERE id_admin = '$id' ") or die (mysqli_error($con));

        $insert = mysqli_query($conn,"UPDATE tbl_salon SET nama='$nama', alamat='$alamat', no_telp='$no_telp', email= '$email', pemilik='$pemilik', lat= '$lat', lng='$long' WHERE id_salon = '$id' ");


        if($insert){
          header("location:../?page=data-salon&edit=sukses");
        }else{
          echo "error simpan";
        }
      }
  



?>
