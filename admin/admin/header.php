
<div class="main-menu" style="background-color:#a8eee7; color:#fff">
	<header class="header">
		<a href="?page=home" class="logo"><i class="ico mdi mdi-home-outline"></i>ADMIN MUA</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="assets/images/iconuser.png" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="?page=profile"><?php echo $user['nama'] ?></a></h5>
			<h5 class="position"><?php echo $user['username'] ?></h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="?page=profile"><i class="fa fa-user"></i> Profile</a></div>
					<!-- <div class="control-item"><a href="#"><i class="fa fa-gear"></i> Settings</a></div> -->
					<div class="control-item"><a href="action/proses-logout.php"><i class="fa fa-sign-out"></i> Log out</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect" href="index.php"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Beranda</span></a>
				</li>
				<?php
if (!empty($_SESSION['username'])) {
		 ?>
				
				<li>
					<a class="waves-effect" href="?page=data-salon"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Data Salon</span></a>
				</li>

				<li>
					<a class="waves-effect" href="?page=data-pendaftaran"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Data Pelanggan</span></a>
				</li>
				
				<!-- <li>
					<a class="waves-effect" href="?page=data-pemesanan"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Pemesanan</span></a>
				</li> -->
				<li>
					<a class="waves-effect" href="?page=data-laporan"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Laporan</span></a>
				</li>

				<!--<li>-->
				<!--	<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-circle"></i><span>Data Admin</span><span class="menu-arrow fa fa-angle-down"></span></a>-->
				<!--	<ul class="sub-menu js__content">-->
				<!--		<li><a href="?page=Profile">Profile</a></li>-->
				<!--	</ul>-->
					<!-- /.sub-menu js__content -->
				<!--</li>-->
<?php } ?>
				<!-- <li>
					<a class="waves-effect" href="?page=data-paket"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Detai</span></a>
				</li>
				<li>
					<a class="waves-effect" href="?page=data-paket"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Pelunasan</span></a>
				</li> -->

				<!-- <li>
					<a class="waves-effect" href="?page=data-singkatan"><i class="menu-icon mdi mdi-book-open"></i><span>Data Singkatan</span></a>
				</li>
        <li>
					<a class="waves-effect" href="?page=data-obat"><i class="menu-icon mdi mdi-collage"></i><span>Data Obat</span></a>
				</li> -->

			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">ADMIN - SALON MUA</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">

		<a href="action/proses-logout.php" class="logout ico-item mdi mdi-logout "></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->
