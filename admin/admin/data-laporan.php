
    <div class="row row-inline-block small-spacing">
      <div class="col-xs-12">
        <div class="box-content">
          <h4 class="box-title">Edit Data Salon</h4>
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
      
           ?>
           <form method="POST" action="../cetak-admin.php" enctype="multipart/form-data">
           <div class="modal-body">

              
                 <div class="form-group row">
                     <label for="example-text-input"  class="col-xs-2 col-form-label form-control-label">
                     Dari Tanggal</label>
                     <div class="col-sm-10">
                         <input name="dari" required="" class="form-control" type="date" >
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">
                     Sampai Tanggal</label>
                     <div class="col-sm-10">
                         <input name="sampai" required="" class="form-control" type="date" >
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">
                     Pilih Salon</label>
                     <div class="col-sm-10">

                 <select name="id_salon" class="required form-control" required="">
								
										<?php
										include 'action/koneksi.php';
				            $no=0;
				              $querypeng=mysqli_query($conn,"SELECT * from tbl_salon order by id_salon DESC");

				            while($datapeng=mysqli_fetch_assoc($querypeng)){
				            ?>
										<option value="<?php echo $datapeng['id_salon'] ?>"><?php echo $datapeng['nama'] ?></option>
									<?php } ?>
									</select>
                  </div>
                 </div>
                
            
           </div>
           <div class="modal-footer">
              
               <button type="submit" class="btn btn-primary waves-effect waves-light ">Cetak Laporan</button>
           </div>
           </form>
             
        </div>
        <!-- /.box-content -->
      </div>

    </div>
