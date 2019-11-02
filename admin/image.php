<?php 
$server = "localhost";
$username = "smar8971_salon";
$password = "salon1234567890";
$database = "smar8971_salon";
$con = mysqli_connect($server, $username, $password) ;
mysqli_select_db($con, $database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysqli_error($con));
mysqli_set_charset($con,"utf8");

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$status = array();

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
$sta=$_POST["id"];
$status['deskripsi']='upload berhasil';
$nama=$_FILES["fileToUpload"]["name"];
$query2 = mysqli_query($con,"insert into tbl_salon (foto,pemilik) values ('$nama','$sta') ");

} else {
$status['kode']=0;
$status['deskripsi']='upload TIDAK berhasil';
}
echo json_encode($status);

?>