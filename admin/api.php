<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_salon_rn";
$con = mysqli_connect($server, $username, $password) ;
mysqli_select_db($con, $database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysqli_error($con));
mysqli_set_charset($con,"utf8");

@$operasi = $_GET['operasi'];

switch    ($operasi) {



    case "login":

    @$username = $_GET['username'];
    @$password = $_GET['password'];
    $query_tampil = mysqli_query($con,"select * from tbl_user where username='$username' and password='$password' ") or die (mysqli_error($con));
    $data_array = array();
    while ($data = mysqli_fetch_assoc($query_tampil)) {
    $data_array[]=$data;
    }
    echo json_encode($data_array);

    break;

    case "input_jasa_salon":

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$status = array();

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $foto = $_FILES["fileToUpload"]["name"];
    $jasa = $_POST['jasa'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];
    $id_salon = $_POST['id_salon'];


    $query = mysqli_query($con,"insert into tbl_jenis_jasa (jasa,id_salon,harga,foto_jenis,keterangan) values ('$jasa','$id_salon','$harga','$foto','$keterangan') ") or die (mysqli_error($con));

    if ($query) {
    echo "Proses Selesasi";
    }
    else {
    echo mysqli_error($con);
    }

}
else {
    $status['kode']=0;
    $status['deskripsi']='upload TIDAK berhasil';
    }
    echo json_encode($status);

          break;


   case "ubah_jasa_salon":

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$status = array();


    $jasa = $_POST['jasa'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];
    $id_jenis = $_POST['id_jenis'];

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

     $foto = $_FILES["fileToUpload"]["name"];

    $query = mysqli_query($con,"UPDATE tbl_jenis_jasa SET jasa='$jasa',harga='$harga',foto_jenis='$foto',keterangan='$keterangan' WHERE id_jenis='$id_jenis' ") or die (mysqli_error($con));

    if ($query) {
    echo "Proses Selesasi";
    }
    else {
    echo mysqli_error($con);
    }

}
else {
     $query = mysqli_query($con,"UPDATE tbl_jenis_jasa SET jasa='$jasa',harga='$harga',keterangan='$keterangan' WHERE id_jenis='$id_jenis' ") or die (mysqli_error($con));
    $status['kode']=0;

    }
    echo json_encode($status);

          break;


          case "register_pelanggan":

          $target_dir = "images/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

          $status = array();

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

          $foto = $_FILES["fileToUpload"]["name"];
          $nama = $_POST['nama'];
          $no_telp = $_POST['no_telp'];
          $email = $_POST['email'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $alamat = $_POST['alamat'];

          $id_user='';
          $max = mysqli_query($con,"select count(nama)as jumlah from tbl_user ");
          while ($data = mysqli_fetch_assoc($max)) {
          $id_user=$data['jumlah'] + 4;
          }
          $query = mysqli_query($con,"insert into tbl_user (id_admin,nama,no_telp,email,password,username,level) values ('$id_user',
          '$nama','$no_telp','$email','$password','$username','pelanggan') ") or die (mysqli_error($con));
          $query2 = mysqli_query($con,"insert into tbl_pendaftaran (id_pendaftar,nama,alamat,no_telp,email,foto) values ('$id_user',
          '$nama','$alamat','$no_telp','$email','$foto') ");
          if ($query) {
          echo "Proses Selesasi";
          }
          else {
          echo mysqli_error($con);
          }

          }
          else {
          $status['kode']=0;
          $status['deskripsi']='upload TIDAK berhasil';
          }
          echo json_encode($status);

          break;

    case "register_salon":

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$status = array();

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $foto = $_FILES["fileToUpload"]["name"];
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $kategori = $_POST['kategori'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $pemilik = $_POST['pemilik'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $id_user='';
    $max = mysqli_query($con,"select count(nama)as jumlah from tbl_user ");
    while ($data = mysqli_fetch_assoc($max)) {
    $id_user=$data['jumlah'] + 4;
    }
    $query = mysqli_query($con,"insert into tbl_user (id_admin,nama,no_telp,email,password,username,level) values ('$id_user',
    '$nama','$no_telp','$email','$password','$username','salon') ") or die (mysqli_error($con));
    $query2 = mysqli_query($con,"insert into tbl_salon (id_salon,nama,alamat,no_telp,email,foto,pemilik,lat,lng,kategori) values ('$id_user',
    '$nama','$alamat','$no_telp','$email','$foto','$pemilik','$lat','$long','$kategori') ");

    mysqli_query($con,"insert into tbl_galeri (id_salon,foto_galeri,id_pelanggan,status_galeri) values ('$id_user',
   '$foto','0','foto salon') ");

    if ($query) {
    echo "Proses Selesasi";
    }
    else {
    echo mysqli_error($con);
    }

}
else {
    $status['kode']=0;
    $status['deskripsi']='upload TIDAK berhasil';
    }
    echo json_encode($status);

    break;

    case "ubah_profil_salon":

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$status = array();
$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$id_salon = $_POST['id_salon'];

$password = $_POST['password'];
$alamat = $_POST['alamat'];

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $foto = $_FILES["fileToUpload"]["name"];
 
 
    $query = mysqli_query($con,"UPDATE tbl_user SET nama='$nama', no_telp='$no_telp', password='$password' WHERE id_admin='$id_salon' ") or die (mysqli_error($con));

    $query2 = mysqli_query($con,"UPDATE tbl_salon SET nama='$nama', no_telp='$no_telp',  alamat='$alamat', foto='$foto' WHERE id_salon='$id_salon' ");


    if ($query) {
    echo "Proses Selesasi";
    }
    else {
    echo mysqli_error($con);
    }

}
else {
 
    $query = mysqli_query($con,"UPDATE tbl_user SET nama='$nama', no_telp='$no_telp', password='$password' WHERE id_admin='$id_salon' ") or die (mysqli_error($con));

    $query2 = mysqli_query($con,"UPDATE tbl_salon SET nama='$nama', no_telp='$no_telp',  alamat='$alamat' WHERE id_salon='$id_salon' ");


    if ($query) {
    echo "Proses Selesasi";
    }
    else {
    echo mysqli_error($con);
    }

    }
    echo json_encode($status);

    break;


case "insert_galery":

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $status = array();

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $foto = $_FILES["fileToUpload"]["name"];
    $id_salon = $_POST['id_salon'];
    $id_user = $_POST['id_user'];


    $query = mysqli_query($con,"insert into tbl_galeri (id_salon,foto_galeri,id_pelanggan,status_galeri) values ('$id_salon',
   '$foto','$id_user','foto salon') ");

    if ($query) {
    echo "Proses Selesasi";
    }
    else {
    echo mysqli_error($con);
    }

  }
else {
    $status['kode']=0;
    $status['deskripsi']='upload TIDAK berhasil';
    }
    echo json_encode($status);

  break;

  case "edit_galery_salon":

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $status = array();

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $foto = $_FILES["fileToUpload"]["name"];
    $id_galery = $_POST['id_galery'];
   

    $query = mysqli_query($con,"update tbl_galeri set foto_galeri='$foto' where id_galeri='$id_galery' ");

    if ($query) {
    echo "Proses Selesasi";
    }
    else {
    echo mysqli_error($con);
    }

  }
else {
    $status['kode']=0;
    $status['deskripsi']='upload TIDAK berhasil';
    }
    echo json_encode($status);

  break;


case "salon":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"SELECT a.*, b.`jumlah_rating` FROM tbl_salon AS a
left JOIN tbl_rating AS b ON a.`id_salon`=b.`id_salon` where a.nama like '%$data%' GROUP BY a.id_salon ORDER BY b.jumlah_rating DESC ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_rating":
@$data = $_GET['data'];
@$kategori = $_GET['kategori'];
$query_tampil = mysqli_query($con,"SELECT a.*, b.`jumlah_rating` FROM tbl_salon AS a
left JOIN tbl_rating AS b ON a.`id_salon`=b.`id_salon` where a.nama like '%$data%' AND kategori = '$kategori' GROUP BY a.id_salon ORDER BY b.jumlah_rating DESC ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_detail_rating":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"select * from tbl_rating as a
inner join tbl_pendaftaran as b on a.`id_pendaftaran`=b.`id_pendaftar`
where a.`id_salon` = '$data' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_jenis_jasa":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"select * from tbl_jenis_jasa as a
inner join tbl_salon as b on a.`id_salon`=b.`id_salon` where jasa like '%$data%' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_jenis_jasasalon":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"select * from tbl_jenis_jasa as a
inner join tbl_salon as b on a.`id_salon`=b.`id_salon` where a.id_salon='$data' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "detail_salon":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"SELECT * FROM tbl_salon WHERE id_salon = '$data' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "detail_salonuser":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"SELECT a.*, b.password FROM tbl_salon AS a INNER JOIN tbl_user AS b ON a.id_salon=b.id_admin WHERE a.id_salon = '$data' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;


case "get_galery":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"SELECT a.* FROM tbl_galeri AS a
INNER JOIN tbl_salon AS b ON a.`id_salon`=b.`id_salon` WHERE a.id_salon='$data' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "batalkan_pesanan":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"delete from tbl_order WHERE id_order = '$data' ") or die (mysqli_error($con));

echo json_encode("sukses");

break;

case "konfirmasi_pesanan":
@$data = $_GET['data'];
@$nama = $_GET['nama'];
$query_tampil = mysqli_query($con,"UPDATE tbl_order SET status_pesanan='Pesanan Di Konfirmasi Salon', perias='$nama' WHERE `id_order`='$data' ") or die (mysqli_error($con));

echo json_encode("sukses");

break;



case "pemesanan_salon":
@$data = $_GET['data'];
@$status = $_GET['status'];
$query_tampil = mysqli_query($con,"SELECT a.*, d.* FROM tbl_order AS a
INNER JOIN tbl_jenis_jasa AS b ON a.`id_jenis_jasa` = b.`id_jenis`
INNER JOIN `tbl_salon` AS c ON b.`id_salon` = c.`id_salon`
INNER JOIN tbl_pendaftaran AS d ON a.`id_pendaftar` =  d.`id_pendaftar` WHERE c.`id_salon`= '$data' AND a.`status_pesanan` ='$status' AND  a.tanggal >= CURDATE() ORDER BY a.tanggal ASC
 ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}

$result = array();
foreach ($data_array as $element) {
    $result[$element['tanggal']][] = $element;
}
echo json_encode($result);

break;

case "Jenis_jasa_salon":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"SELECT * FROM tbl_jenis_jasa WHERE id_salon= '$data' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_detailsalon":
@$data = $_GET['data'];
@$jasa = $_GET['jasa'];
$query_tampil = mysqli_query($con,"SELECT * FROM tbl_jenis_jasa AS a
INNER JOIN tbl_salon AS b ON a.`id_salon`=b.`id_salon` WHERE a.id_salon='$data' AND a.`id_jenis` = '$jasa' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;


case "show_maps":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"SELECT * FROM tbl_salon  WHERE nama LIKE '%$data%' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_historipesanan":
@$data = $_GET['data'];
@$status = $_GET['status'];

$query_tampil = mysqli_query($con,"select * from tbl_order as a
inner join tbl_jenis_jasa as b on a.`id_jenis_jasa` = b.`id_jenis`
inner join tbl_salon as c on c.`id_salon` = b.`id_salon` where id_pendaftar = '$data' AND a.status_pesanan='$status' ORDER BY id_order DESC ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_detailhistoripesanan":
@$data = $_GET['data'];

$query_tampil = mysqli_query($con,"select * from tbl_order as a
inner join tbl_jenis_jasa as b on a.`id_jenis_jasa` = b.`id_jenis`
INNER JOIN tbl_pendaftaran AS c ON a.`id_pendaftar` =c.`id_pendaftar` where id_order = '$data' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_detailhistoripesananpelanggan":
@$data = $_GET['data'];

$query_tampil = mysqli_query($con,"select * from tbl_order as a
inner join tbl_jenis_jasa as b on a.`id_jenis_jasa` = b.`id_jenis`
inner join tbl_salon as c on c.`id_salon` = b.`id_salon` where id_order = '$data' ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "show_maps_terdekat":
@$data = $_GET['data'];
@$lat = $_GET['lat'];

@$lng = $_GET['lng'];

$query_tampil = mysqli_query($con,"SELECT *,(6371 * ACOS(SIN(RADIANS(lat)) * SIN(RADIANS($lat)) + COS(RADIANS(lng - $lng)) * COS(RADIANS(lat)) * COS(RADIANS($lat)))) AS jarak FROM tbl_salon  WHERE nama LIKE '%$data%'  HAVING jarak < 6371

 ORDER BY jarak ASC LIMIT 5 ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "input_order":
@$tanggal = $_GET['tanggal'];
@$id_jenisjasa = $_GET['id_jenisjasa'];
@$id_pendaftar = $_GET['id_pendaftar'];
@$harga = $_GET['harga'];
@$keterangan = $_GET['keterangan'];
$query_tampil = mysqli_query($con,"insert into tbl_order (tanggal,id_jenis_jasa,id_pendaftar,keterangan,harga) value
(DATE_FORMAT(STR_TO_DATE($tanggal, '%d-%m-%Y'), '%Y-%m-%d'),'$id_jenisjasa','$id_pendaftar','$keterangan','$harga') ") or die (mysqli_error($con));
echo "insert into tbl_order (tanggal,id_jenis_jasa,id_pendaftar,keterangan,harga) value
(DATE_FORMAT(STR_TO_DATE($tanggal, '%d-%m-%Y'), '%Y-%m-%d'),'$id_jenisjasa','$id_pendaftar','$keterangan','$harga')";
break;

case "input_pesanan":
@$tanggal = $_GET['tanggal'];
@$id_jenisjasa = $_GET['id_jenisjasa'];
@$id_pendaftar = $_GET['id_pendaftar'];
@$harga = $_GET['harga'];
@$jml_harga = $_GET['jml_harga'];
@$lat_user = $_GET['lat_user'];
@$lng_user = $_GET['lng_user'];
@$status = $_GET['status'];

@$biaya_transportasi = $_GET['biaya_transportasi'];
@$jam = $_GET['jam'];

$query_tampil = mysqli_query($con,"INSERT tbl_order (tanggal,id_jenis_jasa,id_pendaftar,harga,jml_harga,lat_user,lng_user,status,biaya_transportasi,jam) VALUES
(DATE_FORMAT(STR_TO_DATE('$tanggal', '%d-%m-%Y'), '%Y-%m-%d'),'$id_jenisjasa','$id_pendaftar','$harga','$jml_harga','$lat_user','$lng_user','$status','$biaya_transportasi','$jam') ") or die (mysqli_error($con));
break;

case "input_salon_terdekat":

@$id_salon = $_GET['id_salon'];
@$id_user = $_GET['id_user'];
@$distance_text = $_GET['distance_text'];
@$distance_value = $_GET['distance_value'];
@$duration_value = $_GET['duration_value'];
@$duation_text = $_GET['duation_text'];
//mysqli_query($con,"DELETE FROM tbl_salon_terdekat WHERE id_user_t=$id_user");

$query_tampil = mysqli_query($con,"insert into tbl_salon_terdekat (id_salon_t,id_user_t,distance_text,distance_value,duration_value,duation_text) value
('$id_salon','$id_user','$distance_text','$distance_value','$duration_value','$duation_text') ") or die (mysqli_error($con));

break;



case "input_rating":
@$id_salon = $_GET['id_salon'];
@$id_pendaftaran = $_GET['id_pendaftaran'];
@$rating = $_GET['rating'];
@$keterangan = $_GET['keterangan'];
$total_rating = "";
$query_jumlah = mysqli_query($con,"select sum(rating) as jumlah, count(id_salon) as total from tbl_rating where id_salon = '$id_salon' ");
while ($data = mysqli_fetch_assoc($query_jumlah)) {
$total = ($data['jumlah'] + $rating) / ($data['total'] + 1) ;

if($total == 0){
    $total_rating = $rating;
} else{
    $total_rating = $total;
}


$query_tampil = mysqli_query($con,"insert into tbl_rating (id_salon,id_pendaftaran,rating,keterangan,jumlah_rating) value
 ('$id_salon','$id_pendaftaran','$rating','$keterangan','$total_rating')")
 or die (mysqli_error($con));

 mysqli_query($con,"update tbl_rating set jumlah_rating='$total_rating' where id_salon='$id_salon' ")
 or die (mysqli_error($con));

}

break;

case "foto":
@$data = $_GET['data'];
$query_tampil = mysqli_query($con,"select nama_foto from tbl_foto where id_tanaman=$data ") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

default:
break;
}
?>
