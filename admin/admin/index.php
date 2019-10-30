<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
include 'action/koneksi.php';
include 'action/function-tanggal.php';
if (!EMPTY($_SESSION['username']) && $_SESSION['password']) {
  $cek_user=$_SESSION['username'];
  $cek_password=$_SESSION['password'];

  $qadmin=mysqli_query($conn,"select * from tbl_user where username='$cek_user' and password='$cek_password' and level='admin'");
  $user = mysqli_fetch_assoc($qadmin);
}
else {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin Salon Mua</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Material Design Icon -->
	<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">
  <!-- Date Picker css -->
  <link rel="stylesheet" href="assets/plugin/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css" />
  <!-- <link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css" /> -->

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
  <script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
  	tinymce.init({
  	selector: 'textarea',
  	height: 150,
  	menubar: false,
  	plugins: [
  		'advlist autolink lists link image charmap print preview anchor textcolor',
  		'searchreplace visualblocks code fullscreen',
  		'insertdatetime media table contextmenu paste code help'
  	],
  	toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  	content_css: [
  		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
  		'//www.tinymce.com/css/codepen.min.css']
  	});
  </script>
	<!-- Data Tables -->
	<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
  <script>

      function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
      }
  </script>

</head>
<body>
<?php require_once 'header.php'; ?>
<div id="wrapper">
	<div class="main-content">
		<?php
    include 'notif.php';
		  if(!empty($_GET['page'])){
		    $page=$_GET['page'].".php";
		      if(file_exists($page)){
		          include("$page");
		      }else{
		          include("404.html");
		      }
		  }else{
		    include("home.php");
		  }
		?>

		<footer class="footer">
			<ul class="list-inline">
				<li><?php date('Y') ?> © Admin Salon MUA.</li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
<!-- Modal -->
<?php include 'modal.php'; ?>
<!-- Placed at the end of the document so the pages load faster -->
<!-- javascript -->
<script src="assets/scripts/jquery.min.js"></script>
<script>
        setInterval(function(){
            $.ajax({
            type: 'POST',
            url: "cek-harga.php",

          });
        }, 10000);
</script>
<script>
        setInterval(function(){
            $.ajax({
            type: 'POST',
            url: "cek-kamar.php",

          });
        }, 10000);
</script>
<script>
        setInterval(function(){
            $.ajax({
            type: 'POST',
            url: "cek-ruangan.php",

          });
        }, 10000);
</script>

<script src="assets/scripts/modernizr.min.js"></script>
<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap Datepicker js -->
<!-- Date picker.js -->
<!-- <script src="assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script> -->
<script src="assets/plugin/datepicker/js/moment-with-locales.min.js"></script>
<script type="text/javascript" src="assets/plugin/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="assets/plugin/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/plugin/nprogress/nprogress.js"></script>
<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="assets/plugin/waves/waves.min.js"></script>
<!-- Form Wizard -->
<script src="assets/plugin/form-wizard/prettify.js"></script>
<script src="assets/plugin/form-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/plugin/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/scripts/form.wizard.init.min.js"></script>
<!-- Validator -->
<script src="assets/plugin/validator/validator.min.js"></script>

<script type="text/javascript">
$(function () {
      $('#tgl-form').datetimepicker({
          format: 'YYYY-MM-DD H:s'
      });
  });
  $(function () {
        $('#tgl-formpeng').datetimepicker({
            format: 'YYYY-MM-DD H:s'
        });
    });
    $(function () {
          $('#tgl-formfpeng').datetimepicker({
              format: 'YYYY-MM-DD H:s'
          });
      });
    $(function () {
          $('#tgl-kaskecil').datetimepicker({
              format: 'YYYY-MM-DD H:s'
          });
      });
</script>
<!-- Data Tables -->
<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
<script src="assets/scripts/datatables.demo.min.js"></script>
<script src="assets/scripts/main.min.js"></script>

<script type="text/javascript">
		var htmlobjek;
		$(document).ready(function(){
		  //apabila terjadi event onchange terhadap object <select id=propinsi>
		  $("#cls_ruangan").change(function(){
        var ruangan = $("#cls_ruangan").val();
		    $.ajax({
		        url: "action/ambilkamar.php",
		        data: "ruangan="+ruangan,
		        cache: false,
		        success: function(msg){
		            //jika data sukses diambil dari server kita tampilkan
		            //di <select id=kota>
		            $("#kamar").html(msg);
		        }
		    });
		  });
		});
</script>
<script type="text/javascript">
		var htmlobjek;
		$(document).ready(function(){
		  //apabila terjadi event onchange terhadap object <select id=propinsi>
		  $("#kamar").change(function(){
        var ruangan = $("#cls_ruangan").val();
		    var tglci = $("#tgl-form").val();
        var kamar = $("#kamar").val();
        var jmlhari = $("#jml_hari").val();
		    $.ajax({
		        url: "action/cek-tanggal-booking.php",
		        data: "ruangan="+ruangan+"&tglci="+tglci+"&kamar="+kamar+"&jmlhari="+jmlhari,
		        cache: false,
		        success: function(msg){
		            //jika data sukses diambil dari server kita tampilkan
		            //di <select id=kota>
		            $("#p-kamar").html(msg);
                // $("#btn_save").html(msg);
		        }
		    });
		  });
		});
</script>
<script>
    jQuery(document).ready(function($){
        $('.delete').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
                    title: 'Hapus Data?',
                    text: 'Yakin Ingin Hapus Data?',
                    type: "warning",
                    html: true,
                    confirmButtonColor: '#d9534f',
                    confirmButtonText: 'Ya',

                    cancelButtonText: 'Tidak',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    closeOnConfirm: false,
                    closeOnCancel: false
                    },
                function(isConfirm) {
                  if (isConfirm) {
                    window.location.href = getLink
                  } else {
                    swal("Cancelled", ":)", "error");
                  }
                });
            return false;
        });
        $('.pembatalan').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
                    title: 'Pembatalan?',
                    text: 'Yakin Ingin Membatalkan Pesanan ?',
                    type: "warning",
                    html: true,
                    confirmButtonColor: '#d9534f',
                    confirmButtonText: 'Ya',

                    cancelButtonText: 'Tidak',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    closeOnConfirm: false,
                    closeOnCancel: false
                    },
                function(isConfirm) {
                  if (isConfirm) {
                    window.location.href = getLink
                  } else {
                    swal("Cancelled", ":)", "error");
                  }
                });
            return false;
        });
        $('.pelunasan').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
                    title: 'Pelunasan Pembayaran?',
                    text: 'Yakin Ingin melakukan Pelunasan ini?',
                    type: "warning",
                    html: true,
                    confirmButtonColor: '#d9534f',
                    confirmButtonText: 'Ya',

                    cancelButtonText: 'Tidak',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    closeOnConfirm: false,
                    closeOnCancel: false
                    },
                function(isConfirm) {
                  if (isConfirm) {
                    window.location.href = getLink
                  } else {
                    swal("Cancelled", ":)", "error");
                  }
                });
            return false;
        });
        $('.logout').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
                    title: 'logout?',
                    text: 'Yakin Ingin keluar dari sistem?',
                    type: "warning",
                    html: true,
                    confirmButtonColor: '#d9534f',
                    confirmButtonText: 'Ya',

                    cancelButtonText: 'Tidak',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    closeOnConfirm: false,
                    closeOnCancel: false
                    },
                function(isConfirm) {
                  if (isConfirm) {
                    window.location.href = getLink
                  } else {
                    swal("Cancelled", ":)", "error");
                  }
                });
            return false;
        });

    });
</script>

<script type="text/javascript">
		$(document).ready(function(){
				$('#lihatpeng').on('show.bs.modal', function (e) {
						var rowid = $(e.relatedTarget).data('id');
						//menggunakan fungsi ajax untuk pengambilan data
						$.ajax({
								type : 'post',
								url : 'lihat-peng.php',
								data :  'rowid='+ rowid,
								success : function(data){
								$('.Detail-pengeluaran').html(data);//menampilkan data ke dalam modal
								}
						});
				 });
         $('#lihatfpeng').on('show.bs.modal', function (e) {
 						var rowid = $(e.relatedTarget).data('id');
 						//menggunakan fungsi ajax untuk pengambilan data
 						$.ajax({
 								type : 'post',
 								url : 'lihat-fpeng.php',
 								data :  'rowid='+ rowid,
 								success : function(data){
 								$('.Detail-fpengeluaran').html(data);//menampilkan data ke dalam modal
 								}
 						});
 				 });
         $('#editjenis').on('show.bs.modal', function (e) {
 						var rowid = $(e.relatedTarget).data('id');
 						//menggunakan fungsi ajax untuk pengambilan data
 						$.ajax({
 								type : 'post',
 								url : 'jenis-edit.php',
 								data :  'rowid='+ rowid,
 								success : function(data){
 								$('.edit-jenis').html(data);//menampilkan data ke dalam modal
 								}
 						});
 				 });
         $('#editsingkatan').on('show.bs.modal', function (e) {
 						var rowid = $(e.relatedTarget).data('id');
 						//menggunakan fungsi ajax untuk pengambilan data
 						$.ajax({
 								type : 'post',
 								url : 'singkatan-edit.php',
 								data :  'rowid='+ rowid,
 								success : function(data){
 								$('.edit-singkatan').html(data);//menampilkan data ke dalam modal
 								}
 						});
 				 });
         $('#editobat').on('show.bs.modal', function (e) {
 						var rowid = $(e.relatedTarget).data('id');
 						//menggunakan fungsi ajax untuk pengambilan data
 						$.ajax({
 								type : 'post',
 								url : 'obat-edit.php',
 								data :  'rowid='+ rowid,
 								success : function(data){
 								$('.edit-obat').html(data);//menampilkan data ke dalam modal
 								}
 						});
 				 });
		});
</script>
</html>
