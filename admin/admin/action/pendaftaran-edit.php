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
$id = $_POST['id'];



          
            $query = mysqli_query($conn,"UPDATE tbl_user SET nama='$nama', no_telp = '$no_telp' , email = '$email', password='$password' WHERE id_admin = '$id' ") or die (mysqli_error($conn));

            $insert = mysqli_query($conn,"update tbl_pendaftaran set nama='$nama', alamat='$alamat',no_telp= '$no_telp', email='$email' where id_pendaftar= '$id' ");


            if($insert){
              header("location:../?page=data-pendaftaran&edit=sukses");
            }else{
              echo "error simpan";
            }
  



?>
