<div class="row row-inline-block small-spacing">
  <div class="col-xs-12">
    <div class="box-content">
      <h4 class="box-title">Data Pendaftaran Pelanggan</h4>
      <div class="dropdown js__drop_down">
        <?php
if (!empty($_SESSION['username']) ) {
     ?>
        <!--<button type="button" data-remodal-target="eremodal" class="btn btn-xs btn-primary btn-bordered" data-toggle="modal" data-target="#tambahpendaftaran"><i class="ico ico-left fa fa-plus"></i> Tambah Data</button>-->
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
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telfon</th>

            <th>Email</th>
            <th>--</th>
          </tr>
        </thead>

        <tbody>
            <?php
            include 'action/koneksi.php';
            $no=0;
            $query=mysqli_query($conn,"SELECT * from tbl_pendaftaran ");
              while($data=mysqli_fetch_assoc($query)){
                $no++;
               
            ?>
          <tr>
            <td><?php echo $data['nama'] ?></td>
            <!-- <td><?php echo tgl_indo($data['']) ?></td> -->
            <td><?php echo $data['alamat'] ?></td>
            <td><?php echo  $data['no_telp'] ?></td>
            <!-- <td>Rp. <?php echo number_format($data[''],0,".",".") ?></td> -->
           
            <td><?php echo  $data['email'] ?></td>
            <td>
              <!-- <a href='#' class="btn btn-circle  btn-primary btn-xs" id='custId' data-toggle="tooltip" data-placement="top" title="lihat!"><i class="ico fa fa-eye"></i></a> -->
              <a href='?page=data-pendaftaran-edit&id=<?php echo $data['id_pendaftar'] ?>' class="btn btn-circle  btn-success btn-xs"><i class="ico fa fa-pencil-square-o"></i></a>
              <a href='action/pendaftaran-hapus.php?id=<?php echo $data['id_pendaftar'] ?>' class="delete btn btn-circle  btn-danger btn-xs"><i class="ico fa fa-trash"></i></a>
            </td>
          </tr><?php } ?>
        </tbody>
      </table>
<br>
<b>KET : </b>
<br><b>
<a href='#' class="btn btn-circle  btn-success btn-xs"><i class="ico fa fa-pencil-square-o"></i></a> EDit |
 <a href='#' class="btn btn-circle  btn-danger btn-xs"><i class="ico fa fa-trash"></i></a> HAPUS |
</b>
    </div>
    <!-- /.box-content -->
  </div>
</div>
