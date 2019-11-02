<?php
  $dbhost = 'localhost';
  $dbuser = 'root';     // ini berlaku di xampp
  $dbpass = '';         // ini berlaku di xampp
  $dbname = 'db_salon_rn'; //nama databae

  // melakukan koneksi ke database
  $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

  // cek koneksi yang kita lakukan berhasil atau tidak
  if ($conn->connect_error) {
     // jika terjadi error, matikan proses dengan die() atau exit();
     die('Maaf koneksi gagal: '. $conn->connect_error);
  }else{
  }
?>
