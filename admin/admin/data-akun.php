<div class="row row-inline-block small-spacing">
  <div class="col-xs-12">
    <div class="box-content">
      <h4 class="box-title">Akun</h4>
      <div class="dropdown js__drop_down">

				<?php
if (!empty($_SESSION['username']) && $_SESSION['jabatan']=='resepsionis') {
		 ?>
        <button type="button" data-remodal-target="eremodal" class="btn btn-xs btn-primary btn-bordered" data-toggle="modal" data-target="#tambahakun"><i class="ico ico-left fa fa-plus"></i> Tambah Data</button>
<?php } ?>
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
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>Kd_akun</th>
            <th>Jenis Akun</th>
            <th>Nama Akun</th>
            <th>--</th>
          </tr>
        </thead>

        <tbody>
            <?php
            include 'action/koneksi.php';
            $no=0;
              $query=mysqli_query($conn,"SELECT * from tbl_akun order by kd_akun DESC");

            while($data=mysqli_fetch_assoc($query)){
            ?>
          <tr>
            <td><?php echo $data['kd_akun'] ?></td>

            <td><?php echo $data['jenis'] ?></td>
            <td><?php echo $data['nm_akun'] ?></td>
            <td>
            <a href='action/akun-hapus.php?id=<?php echo $data['kd_akun'] ?>' class="delete btn btn-circle  btn-danger btn-xs" ><i class="ico fa fa-trash"></i></a>
            </td>
          </tr><?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-content -->
  </div>

</div>
