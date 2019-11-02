<?php
//notif
  if(!empty($_GET['login'])){
    $v = $_GET['login'];
    $y = "sukses";
    $n = "gagal";
    if($v==$y){
      echo "
      <script type='text/javascript'>
        setTimeout(function () {
        swal({
                   title: 'Sukses',
                   text:  'Login Berhasil',
                   type: 'success',
                   timer: 1500,
                   showConfirmButton: false
               });
        },15);
        window.setTimeout(function(){
      } ,2500);
        </script>
      ";
    }
    else if($v==$n){
      echo

      '  <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> Periksa Userame dan Password.
              </div>';
    }
  }else {
  }
  if(!empty($_GET['simpan'])){
    $v = $_GET['simpan'];
    $y = "sukses";
    $n = "gagal";
    if($v==$y){
      echo '<div class="alert alert-success alert-dismissible" role="alert">
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  						<strong>Sukses!</strong> Data Berhasil disimpan.
  					</div>'
      ;
    }
    else if($v==$n){
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  						<strong>Gagal!</strong> Data Gagal disimpan.
  					</div>'
      ;
    }
  }else {
  }
  if(!empty($_GET['edit'])){
    $v = $_GET['edit'];
    $y = "sukses";
    $n = "gagal";
    if($v==$y){
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Sukses!</strong> Data Berhasil Diubah.
            </div>'
      ;
    }
    else if($v==$n){
      echo '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal!</strong> Data Gagal Diubah.
            </div>'
      ;
    }
  }else {
  }
  if(!empty($_GET['hapus'])){
    $v = $_GET['hapus'];
    $y = "sukses";
    $n = "gagal";
    if($v==$y){
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Sukses!</strong> Data Berhasil Dihapus.
            </div>'
      ;
    }
    else if($v==$n){
      echo '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal!</strong> Data Gagal DIhapus.
            </div>'
      ;
    }
  }else {
  }
  
   if(!empty($_GET['pembatalan'])){
    $v = $_GET['pembatalan'];
    $y = "sukses";
    $n = "gagal";
    if($v==$y){
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Sukses!</strong> Pesanan Berhasil DI Batalkan.
            </div>'
      ;
    }
    else if($v==$n){
      echo '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal!</strong> Pesanan Gagal Di Batalkan.
            </div>'
      ;
    }
  }else {
  }
  
  if(!empty($_GET['cek'])){
    $simpan = $_GET['cek'];
    $n = "gagal";
    if($simpan==$n){
      echo "
      <script type='text/javascript'>
        setTimeout(function () {
        swal({
                   title: 'Gagal',
                   text:  'Periksa NISN Anda',
                   type: 'error',
                   timer: 1500,
                   showConfirmButton: false
               });
        },15);
        window.setTimeout(function(){
        //window.location.replace('?page=cek-cetak');
      } ,1500);
        </script>
      ";
    }
  }else {
  }
?>
