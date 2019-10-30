<!-- MODAL TAMBAH SALON-->
<div class="modal fade" id="tambahsalon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/salon-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Salon</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
			 <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Nama Salon</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="nama" required="" class="required form-control">
                </div>
              </div>
				<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="alamat" required="" class="required form-control">
                </div>
              </div>
				<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">No Telfon</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="no_telp" required="" class="required form-control">
                </div>
              </div>
			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                  <input type="file" id="#" name="foto" required="" class="required form-control" accept="image/*">
                </div>
              </div>

			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Pemilik</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="pemilik" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Latitude</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="lat" required="" class="required form-control">
                </div>
              </div>
			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Longitude</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="lng" required="" class="required form-control">
                </div>
              </div>
			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="username" id="#" name="username" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" id="#" name="password" required="" class="required form-control">
                </div>
              </div>


            </div>
          </div>

        </div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>

<!-- MODAL TAMBAH Pendaftaran-->
<div class="modal fade" id="tambahpendaftaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/pendaftaran-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Pendaftaran Pelanggan</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="nama" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="alamat" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">No Telfon</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="no_telp" required="" class="required form-control">
                </div>
              </div>
			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>

			
			
			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="username" id="#" name="username" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" id="#" name="password" required="" class="required form-control">
                </div>
              </div>



              </div>
            </div>
          </div>
       
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>
<!-- modal selesai -->

<!-- MODAL TAMBAH Kamar-->
<div class="modal fade" id="tambahpaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/paket-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Paket</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
							<?php
							include 'action/koneksi.php';
							$sql1=mysqli_query($conn,("SELECT kd_paket FROM tbl_paket order by kd_paket DESC"));
							$data1=mysqli_fetch_array($sql1);
							if(mysqli_num_rows($sql1)>0){
								$kodeawal=(int)substr($data1['kd_paket'],4,6);
								$jumlah=$kodeawal+1;
								$kode="PKT".sprintf("%03s",$jumlah);
							}else{
								$kode="PKT001";
							}
							 ?>
							<input name="kd_paket" type='hidden' class="form-control" value="<?php echo $kode ?>"/>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Nama Paket</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="nm_paket" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Harga Paket</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="harga_paket" required="" class="required form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>
<!-- modal selesai -->
<!-- MODAL TAMBAH Kamar-->
<div class="modal fade" id="tambahakun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/akun-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Akun</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
							<div class="form-group">
								<label for="nisn" class="col-sm-2 control-label">Kode Akun</label>
								<div class="col-sm-10">
									<input type="number" id="#" name="kd_akun" required="" class="required form-control">
								</div>
							</div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Nama Akun</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="nm_akun" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
								<label for="pakaian" class="col-sm-2 control-label">Jenis Akun</label>
								<div class="col-sm-9">
									<select name="jenis_akun" class="required form-control" id="pakaian" required="">
										<option></option>
										<option value="pengeluaran">Pengeluaran</option>
										<option value="penerimaan">Penerimaan</option>
									</select>
								</div>
							</div>
            </div>
          </div>
        </div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>
<!-- modal selesai -->
<!-- MODAL TAMBAH Penerimaan-->
<div class="modal fade" id="tambahpenerimaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/penerimaan-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Penerimaan Kas</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
							<div class="form-group">
								<label for="pakaian" class="col-sm-2 control-label"> Akun</label>
								<div class="col-sm-9">
									<select name="kd_akun" class="required form-control" id="pakaian" required="">
										<option></option>
										<?php
										include 'action/koneksi.php';
				            $no=0;
				              $querypene=mysqli_query($conn,"SELECT * from tbl_akun where jenis='penerimaan' order by kd_akun DESC");

				            while($datapene=mysqli_fetch_assoc($querypene)){
				            ?>
										<option value="<?php echo $datapene['kd_akun'] ?>"><?php echo $datapene['nm_akun'] ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-9">
										<input type="hidden" name="kd_user" class="required form-control" id="jml_hari" value="<?php echo $user['kd_karyawan'] ?>">
								</div>
							</div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Prihal</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="prihal" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="text" id='tgl-form' name="tgl-penekas" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="jml_kas" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
								<label for="pakaian" class="col-sm-2 control-label">Status</label>
								<div class="col-sm-9">
									<select name="status" class="required form-control" id="pakaian" required="">
										<option></option>
										<option value="tunai">Tunai</option>
										<option value="non-tunai">Non-Tunai</option>
									</select>
								</div>
							</div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Scan Bill/Bukti</label>
                <div class="col-sm-10">
                  <input type="file" id="#" name="gambar" class="required form-control" accept="image/*">
                </div>
              </div>
            </div>
          </div>
        </div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>
<!-- modal selesai -->

<!-- MODAL TAMBAH Penerimaan-->
<div class="modal fade" id="tambahpengeluaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/pengeluaran-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Pengeluaran Kas</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
							<div class="form-group">
								<label for="pakaian" class="col-sm-2 control-label"> Akun</label>
								<div class="col-sm-9">
									<select name="kd_akun" class="required form-control" id="pakaian" required="">
										<option></option>
										<?php
										include 'action/koneksi.php';
				            $no=0;
				              $querypeng=mysqli_query($conn,"SELECT * from tbl_akun where jenis='pengeluaran' order by kd_akun DESC");

				            while($datapeng=mysqli_fetch_assoc($querypeng)){
				            ?>
										<option value="<?php echo $datapeng['kd_akun'] ?>"><?php echo $datapeng['nm_akun'] ?></option>
									<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-9">
										<input type="hidden" name="kd_user" class="required form-control" id="jml_hari" value="<?php echo $user['kd_karyawan'] ?>">
								</div>
							</div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Prihal</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="prihal" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="text" id='tgl-formpeng' name="tgl-pengkas" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="jml_kas" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
								<label for="pakaian" class="col-sm-2 control-label">Status</label>
								<div class="col-sm-9">
									<select name="status" class="required form-control" id="pakaian" required="">
										<option></option>
										<option value="tunai">Tunai</option>
										<option value="non-tunai">Non-Tunai</option>
									</select>
								</div>
							</div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Scan Bill/Bukti</label>
                <div class="col-sm-10">
                  <input type="file" id="#" name="gambar" class="required form-control" accept="image/*">
                </div>
              </div>
						</div>
          </div>
        </div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>
<div class="modal  fade" id="lihatpeng" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="Detail-pengeluaran">

			</div>
		</div>
	</div>
</div>

<!-- modal selesai -->
<!-- MODAL TAMBAH Penerimaan-->
<div class="modal fade" id="tambahfpengeluaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/fpengeluaran-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Form Pengeluaran Kas</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-9">
										<input type="hidden" name="kd_user" class="required form-control" id="jml_hari" value="<?php echo $user['kd_karyawan'] ?>">
								</div>
							</div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="text" id='tgl-formfpeng' name="tgl-fpengkas" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="prihal" required="" class="required form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="jumlah" required="" class="required form-control">
                </div>
              </div>

							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Scan Form</label>
                <div class="col-sm-10">
                  <input type="file" id="#" name="gambar" class="required form-control" accept="image/*">
                </div>
              </div>
						</div>
          </div>
        </div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>
<div class="modal  fade" id="lihatfpeng" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    <h4 class="modal-title" id="myModalLabel">Detail Form Pengeluaran Kas</h4>
		  </div>
			<div class="Detail-fpengeluaran">

			</div>
		</div>
	</div>
</div>

<!-- modal selesai -->
<!-- MODAL TAMBAH kas kecil-->
<div class="modal fade" id="tambahkkecil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/kaskecil-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Kas Kecil</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
							<div class="form-group">
								<label for="pakaian" class="col-sm-2 control-label">Status</label>
								<div class="col-sm-9">
									<select name="ket" class="required form-control" id="pakaian" required="">
										<option></option>
										<option value="pengeluaran">Pengeluaran</option>
										<option value="pengisian">pengisian</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-9">
										<input type="hidden" name="kd_user" class="required form-control" id="jml_hari" value="<?php echo $user['kd_karyawan'] ?>">
								</div>
							</div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Rincian</label>
                <div class="col-sm-10">
                  <input type="text" id="#" name="rincian" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="text" id='tgl-kaskecil' name="tgl-kaskecil" required="" class="required form-control">
                </div>
              </div>
							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Debit</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="debit" required="" class="required form-control">
                </div>
              </div>

							<div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">Kredit</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="kredit" required="" class="required form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>
<!-- modal selesai -->
<!-- MODAL TAMBAH ADMIN-->
<div class="modal fade" id="tambahadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
      <form class="form-horizontal" action="action/adm-input.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="myModalLabel">Tambah Data Admin</h4>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
							<div class="form-group">
								<label for="id" class="col-sm-2 control-label">NIP</label>
								<div class="col-sm-9">
									<input type="text" id="id" name="kd" required="" class="required form-control">
								</div>
							</div>
								<div class="form-group">
								  <label for="id" class="col-sm-2 control-label">Nama</label>
								  <div class="col-sm-9">
								    <input type="text" id="id" name="nama" required="" class="required form-control">
								  </div>
								</div>
								<div class="form-group">
									<label for="pakaian" class="col-sm-2 control-label">Jabatan</label>
									<div class="col-sm-9">
										<select name="jabatan" class="required form-control" id="pakaian" required="">
											<option></option>
											<option value="admin">Admin</option>
											<option value="resepsionis">Resepsionis</option>
											<option value="Pimpinan">Pimpinan</option>
										</select>
									</div>
								</div>
								<div class="form-group">
								  <label for="id" class="col-sm-2 control-label">Email</label>
								  <div class="col-sm-9">
								    <input type="email" id="id" name="email" required="" class="required form-control">
								  </div>
								</div>
								<div class="form-group">
								  <label for="id" class="col-sm-2 control-label">Username</label>
								  <div class="col-sm-9">
								    <input type="text" id="id" name="username" required="" class="required form-control">
								  </div>
								</div>
								<div class="form-group">
								  <label for="id" class="col-sm-2 control-label">Password</label>
								  <div class="col-sm-9">
								    <input type="password" id="id" name="pass" required="" class="required form-control">
								  </div>
								</div>
							</div>
						</div>
					</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary btn-sm">Save</button>
  			</div>
      </form>
		</div>
	</div>
</div>
