<div class="row row-inline-block small-spacing">
  <div class="col-xs-12">
    <div class="box-content">
      <h4 class="box-title">Data Class Kamar</h4>
      <div class="dropdown js__drop_down">
        <button type="button" data-remodal-target="eremodal" class="btn btn-xs btn-primary btn-bordered" data-toggle="modal" data-target="#tambahclass"><i class="ico ico-left fa fa-plus"></i> Tambah Data</button>
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
            <th>Class</th>
            <th>Harga</th>
            <th>--</th>
          </tr>
        </thead>

        <tbody>
            <?php
            include 'action/koneksi.php';
            $query=mysqli_query($conn,"select * from tbl_class order by kd_class ASC");
            while($data=mysqli_fetch_assoc($query)){
            ?>
          <tr>
            <td><?php echo $data['nm_class'] ?></td>

            <td>Rp. <?php echo number_format($data['harga'],0,".",".") ?></td>
            <td>
              <!-- <a href='#' class="btn btn-circle  btn-primary btn-xs" id='custId' data-toggle="tooltip" data-placement="top" title="lihat!"><i class="ico fa fa-eye"></i></a> -->
              <!-- <a href='?page=data-kamar-edit&id=<?php echo $data['kd_class'] ?>' class="btn btn-circle  btn-success btn-xs"><i class="ico fa fa-pencil-square-o"></i></a> -->
              <a href='#editclass' class="btn btn-circle  btn-success btn-xs" id='custId' data-toggle='modal' data-id="<?php echo $data['kd_class'] ?>"><i class="ico fa fa-pencil-square-o"></i></a>
              <a href='action/class-hapus.php?id=<?php echo $data['kd_class'] ?>' class="delete btn btn-circle  btn-danger btn-xs"><i class="ico fa fa-trash"></i></a>
            </td>
          </tr><?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-content -->
  </div>

</div>
