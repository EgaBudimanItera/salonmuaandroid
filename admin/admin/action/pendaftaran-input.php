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



            $id_user='';
            $max = mysqli_query($conn,"select count(nama)as jumlah from tbl_user ");
            while ($data = mysqli_fetch_assoc($max)) {
            $id_user=$data['jumlah'] + 3;
            }
            $query = mysqli_query($conn,"insert into tbl_user (id_admin,nama,no_telp,email,password,username,level) values ('$id_user',
            '$nama','$no_telp','$email','$password','$username','pelanggan') ") or die (mysqli_error($conn));
            $insert = mysqli_query($conn,"insert into tbl_pendaftaran (id_pendaftar,nama,alamat,no_telp,email,foto) values ('$id_user',
            '$nama','$alamat','$no_telp','$email','user.png') ");


            if($insert){
              header("location:../?page=data-pendaftaran&simpan=sukses");
            }else{
              echo "error simpan";
            }
  



?>
