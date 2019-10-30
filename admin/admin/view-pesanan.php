
    <div class="row row-inline-block small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title">Data Pesanan</h4>
          <div class="dropdown js__drop_down">
            <!-- <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button">tambah </a>
            <ul class="sub-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else there</a></li>
              <li class="split"></li>
              <li><a href="#">Separated link</a></li>
            </ul> -->
            <!-- /.sub-menu -->
          </div>
          <!-- /.dropdown js__dropdown -->

          <?php
          include 'action/koneksi.php';
          if ($_GET['id']) {
            $id = $_GET['id'];
            $query=mysqli_query($conn,"SELECT b.foto_jenis,b.jasa,a.*, d.*, c.`nama` as nama_salon, c.`alamat` as alamat_salon,c.no_telp as no_telpsalon, c.email as email_salon, c.foto as foto_salon FROM tbl_order AS a
INNER JOIN tbl_jenis_jasa AS b ON a.`id_jenis_jasa` = b.`id_jenis`
INNER JOIN `tbl_salon` AS c ON b.`id_salon` = c.`id_salon`
INNER JOIN tbl_pendaftaran AS d ON a.`id_pendaftar` =  d.`id_pendaftar`  where id_order= '$id' ");
            while($data=mysqli_fetch_assoc($query)){
           ?>
           <form method="POST" enctype="multipart/form-data">
           <div class="modal-body">

           <input name="id" class="form-control" type="hidden" id="id" value="<?php echo $data['id_order']; ?>">
                 <div class="form-group row">
                     <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">
                     Nama Salon</label>
                     <div class="col-sm-10">
                    <input name="nama" readonly class="form-control" type="text" id="id" value="<?php echo $data['nama_salon']; ?>">
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">
                     Alamat Salon </label>
                     <div class="col-sm-10">
                     <input type="text" readonly id="#" value="<?php echo $data['alamat_salon']; ?>" name="alamat" required="" class="required form-control">
             
                     </div>
                 </div>


                 <div class="form-group row" >
                <label for="nisn" class="col-sm-2 control-label">No Telfon Salon</label>
                <div class="col-sm-10">
                  <input readonly type="number" id="#" name="no_telp" required="" value="<?php echo $data['no_telpsalon']; ?>" class="required form-control">
                </div>
              </div>
			  <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Email Salon</label>
                <div class="col-sm-10">
                  <input readonly value="<?php echo $data['email_salon']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Foto Salon</label>
                <div class="col-sm-10">
                ><img width="80px;" height="80px;" src="../images/<?php echo $data['foto_salon']; ?>" />
                </div>
              </div>

			 <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Tanggal Order</label>
                <div class="col-sm-10">
                  <input readonly value="<?php echo $data['tanggal']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>
                
                 <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Jam Order</label>
                <div class="col-sm-10">
                  <input readonly value="<?php echo $data['jam']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>
                
			  <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Jasa</label>
                <div class="col-sm-10">
                  <input readonly value="<?php echo $data['jasa']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>
              
                <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Foto Jasa</label>
                <div class="col-sm-10">
                ><img width="80px;" height="80px;" src="../images/<?php echo $data['foto_jenis']; ?>" />
                </div>
              </div>
              
			 <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Total Harga</label>
                <div class="col-sm-10">
                  <input readonly value="Rp. <?php echo number_format($data['harga']) ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>

              
			 <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Satus</label>
                <div class="col-sm-10">
                  <input readonly value="<?php echo $data['status']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>
              
             <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Nama Pemesan</label>
                <div class="col-sm-10">
                  <input readonly value="<?php echo $data['nama']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>
              
              <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Alamat Pemesan</label>
                <div class="col-sm-10">
                  <input readonly value="<?php echo $data['alamat']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>
              
                 <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">No Telfon Pemesan</label>
                <div class="col-sm-10">
                  <input readonly value="<?php echo $data['no_telp']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>
                
            
           </div>
           <div class="modal-footer">
                <a href="?page=data-pemesanan"  class="btn btn-primary waves-effect waves-light "> Kembali</a>
           
           </div>
           </form>
                <?php }
              } ?>
        </div>
        <!-- /.box-content -->
      </div>

    </div>
