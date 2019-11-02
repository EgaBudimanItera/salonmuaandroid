
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
          if ($_GET['id']) {
            $id = $_GET['id'];
            $query=mysqli_query($conn,"SELECT * from tbl_salon where id_salon= '$id' ");
            while($data=mysqli_fetch_assoc($query)){
           ?>
           <form method="POST" action="action/salon-edit.php" enctype="multipart/form-data">
           <div class="modal-body">

           <input name="id" class="form-control" type="hidden" id="id" value="<?php echo $data['id_salon']; ?>">
                 <div class="form-group row">
                     <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">
                     Nama Salon</label>
                     <div class="col-sm-10">
                         <input name="nama" class="form-control" type="text" id="id" value="<?php echo $data['nama']; ?>">
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">
                     Alamat </label>
                     <div class="col-sm-10">
                     <input type="text" id="#" value="<?php echo $data['alamat']; ?>" name="alamat" required="" class="required form-control">
             
                     </div>
                 </div>


                 <div class="form-group row" >
                <label for="nisn" class="col-sm-2 control-label">No Telfon</label>
                <div class="col-sm-10">
                  <input type="number" id="#" name="no_telp" required="" value="<?php echo $data['no_telp']; ?>" class="required form-control">
                </div>
              </div>
			  <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input value="<?php echo $data['email']; ?>" type="text" id="#" name="email" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                  <input value="<?php echo $data['foto']; ?>" type="file" id="#" name="foto" class="required form-control" accept="image/*">
                </div>
              </div>

			  <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Pemilik</label>
                <div class="col-sm-10">
                  <input value="<?php echo $data['pemilik']; ?>" type="text" id="#" name="pemilik" required="" class="required form-control">
                </div>
              </div>

			  <div class="form-group row ">
                <label for="nisn" class="col-sm-2 control-label">Latitude</label>
                <div class="col-sm-10">
                  <input value="<?php echo $data['lat']; ?>" type="text" id="#" name="lat" required="" class="required form-control">
                </div>
              </div>
			  <div class="form-group row">
                <label for="nisn" class="col-sm-2 control-label">Longitude</label>
                <div class="col-sm-10">
                  <input type="text" id="#" value="<?php echo $data['lng']; ?>" name="lng" required="" class="required form-control">
                </div>
              </div>

             <?php $query=mysqli_query($conn,"SELECT * from tbl_user where id_admin= '$id' ");
            while($data=mysqli_fetch_assoc($query)){ ?>

                 <div class="form-group row">
                     <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">
                     Username</label>
                     <div class="col-sm-10">
                         <input name="username" class="form-control" type="text" id="id" readonly value="<?php echo $data['username']; ?>">
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">
                     Password</label>
                     <div class="col-sm-10">
                         <input name="password" class="form-control" type="password" id="id"  value="<?php echo $data['password']; ?>">
                     </div>
                 </div>
            <?php } ?>
                
            
           </div>
           <div class="modal-footer">
                <a href="?page=data-salon"  class="btn btn-default waves-effect "> Batal</a>
               <button type="submit" class="btn btn-primary waves-effect waves-light ">Edit</button>
           </div>
           </form>
                <?php }
              } ?>
        </div>
        <!-- /.box-content -->
      </div>

    </div>
