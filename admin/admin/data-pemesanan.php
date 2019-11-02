<div class="row row-inline-block small-spacing">
  <div class="col-xs-12">
    <div class="box-content">
      <h4 class="box-title">Data Pemesanan</h4>
      <div class="dropdown js__drop_down">
        <!-- <a class="btn btn-xs btn-primary btn-bordered"  href="?page=laporan-kaskecil"><i class="ico ico-left fa fa-print"></i> Cetak Laporan</a>
        <button type="button" data-remodal-target="eremodal" class="btn btn-xs btn-primary btn-bordered" data-toggle="modal" data-target="#tambahkkecil"><i class="ico ico-left fa fa-plus"></i> Tambah Data</button> -->
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
      <div class="table-responsive">
      <table id="example" class="table table-striped table-bordered display" >
        <thead>
          <tr>
            <th width='220px'>Nama Pemesan</th>
            <th>Alamat</th>
            <th>Tanggal Pesan</th>
            <th>Jumlah Harga</th>
            <th>Jasa</th>
            <th width="420px">Nama Salon</th>
            <th  width="420px">Alamat Salon</th>
            <th>Batalkan Pemesanan</th>
            <th>View Pemesanan</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include 'action/koneksi.php';

          $query=mysqli_query($conn,"SELECT b.jasa,a.*, d.*, c.`nama` as nama_salon, c.`alamat` as alamat_salon FROM tbl_order AS a
INNER JOIN tbl_jenis_jasa AS b ON a.`id_jenis_jasa` = b.`id_jenis`
INNER JOIN `tbl_salon` AS c ON b.`id_salon` = c.`id_salon`
INNER JOIN tbl_pendaftaran AS d ON a.`id_pendaftar` =  d.`id_pendaftar` order by c.`id_salon` ");

          while($data=mysqli_fetch_assoc($query)){
            //  $dp=$data['jml_dp'];
            //  $totbayar=$data['tot_bayar'];
            //  $kurang= $totbayar-$dp;
          ?>
          <tr>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['alamat'] ?></td>
            <td><?php echo $data['tanggal'] ?></td>
            <td><?php echo number_format($data['jml_harga']) ?></td>
            <td><?php echo $data['jasa'] ?></td>
            <td><?php echo $data['nama_salon'] ?></td>
            <td><?php echo $data['alamat_salon'] ?></td>
             <td align='center'>
              <!-- <a href='#' class="btn btn-circle  btn-primary btn-xs" id='custId' data-toggle="tooltip" data-placement="top" title="lihat!"><i class="ico fa fa-eye"></i></a> -->
              <a href='action/pemesanan-hapus.php?id=<?php echo $data['id_order'] ?>' class="pembatalan btn btn-circle  btn-danger btn-xs"><i class="ico fa fa-close"></i></a>
         
            </td>
          <td align='center'>
            <a href='?page=view-pesanan&id=<?php echo $data['id_order'] ?>' class=" btn btn-circle  btn-success btn-xs"><i class="ico fa fa-eye"></i></a>
            </Td>
            
            </tr><?php } ?>
        </tbody>
      </table>
      </div>
    </div>
    <!-- /.box-content -->
  </div>

</div>
