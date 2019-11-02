
<div class="row row-inline-block small-spacing">
  <div class="col-xs-12">
    <div class="box-content">


      <h4 class="box-title">Laporan Kas Kecil</h4>

      <!-- <div class="dropdown js__drop_down">
        <button type="button" data-remodal-target="eremodal" class="btn btn-xs btn-primary btn-bordered" data-toggle="modal" data-target="#tambahjurusan"><i class="ico ico-left fa fa-plus"></i> Tambah Data</button>
        <a href="#" class="btn btn-xs btn-primary btn-bordered"><i class="ico ico-left fa fa-print"></i>Cetak </a>
        <ul class="sub-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else there</a></li>
          <li class="split"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div>-->
      <div class="row">
        <div class="col-md-12">
          <form role="form" action="?page=laporan-kaskecil" method="post">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kd_jurusan" class="col-sm-3 control-label">Tahun</label>
                <div class="col-sm-9">
                  <select name="tahun" class="required form-control" id="kd_jurusan" required="" placeholder="keterangan">
                    <option></option>
                    <?php
                    include 'action/koneksi.php';
                    $query=mysqli_query($conn,"SELECT thn_kaskecil from tbl_kas_kecil group by thn_kaskecil order by thn_kaskecil desc");
                    while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <option value="<?php echo $data['thn_kaskecil'] ?>"><?php echo $data['thn_kaskecil'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="kd_jurusan" class="col-sm-3 control-label">Bulan</label>
                <div class="col-sm-9">
                  <select name="bulan" class="required form-control" id="kd_jurusan" required="" placeholder="keterangan">
                    <option></option>
                    <option value="01">Januari</option>
      							<option value="02">Februari</option>
      							<option value="03">Maret</option>
      							<option value="04">April</option>
      							<option value="05">Mei</option>
      							<option value="06">Juni</option>
      							<option value="07">Juli</option>
      							<option value="08">Agustus</option>
      							<option value="09">September</option>
      							<option value="10">Oktober</option>
      							<option value="11">November</option>
      							<option value="12">Desember</option>
                  </select>
                </div>
              </div>
            </div>

            <button class="btn btn-sm btn-primary" type="submit" name="submit"> Cek</button>
          </form>
        </div>
      </div>
      <hr>
      <?php if (isset($_POST['bulan'])) {
          $bulan=$_POST['bulan'];
          $tahun=$_POST['tahun'];
          $querykaskecil=mysqli_query($conn,"SELECT * from tbl_kas_kecil where bln_kaskecil='$bulan' and thn_kaskecil='$tahun' order by tanggal asc");

        ?>
      <div class="row">
        <div class="col-md-9">
          <h4>Laporan kas bulan <?php echo $bulan?> / <?php echo $tahun?></h4>
        </div>
        <div class="col-md-3" >
          <a  href="javascript:void(0);" class="btn btn-xs btn-primary btn-bordered" style="float:right; margin-top:10px"
            onclick="window.open('cetak-kaskecil.php?bulan=<?php echo $bulan?>&tahun=<?php echo $tahun?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')"><i class="ico ico-left fa fa-print"></i>Cetak </a>
        </div>
      </div>
      <br><br>
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Rincian</th>
            <th>Debit</th>
            <th>Kredit</th>
          </tr>
        </thead>
        <tbody>
            <?php
            include 'action/koneksi.php';
            $no=0;
            foreach ($querykaskecil as $data){
                $ket=$data['ket_kaskecil'];
            ?>
            <tr>
              <td>
                <?php echo tgl_indo($data['tanggal']) ?>
              </td>
              <td>
                <?php echo $data['rincian'] ?>
                <br>
                <p style='margin-left:15px'>
                  <?php
                    if ($ket=="pengeluaran") {
                      echo "Kas Keci";
                    }
                    else {
                      echo "Kas (Bank)";
                    }
                   ?>
                </p>
              </td>
              <td>
                Rp. <?php echo number_format($data['debit'],0,".",".") ?>
              </td>
              <td>
                <br>
                Rp. <?php echo number_format($data['kredit'],0,".",".") ?>
              </td>
            </tr><?php } ?>
            <tr>
              <td colspan="3">

                Saldo Kas Kecil
              </td>
              <td>
                <?php
                include 'action/koneksi.php';
                $Qpengisian=mysqli_query($conn,"SELECT sum(debit) as total FROM `tbl_kas_kecil` WHERE ket_kaskecil='pengisian' and bln_kaskecil='$bulan' and thn_kaskecil='$tahun' order by tanggal asc");
                $Dpengisian=mysqli_fetch_assoc($Qpengisian);
                $pengisian=$Dpengisian['total'];
                $Qpengeluaran=mysqli_query($conn,"SELECT sum(debit) as total FROM `tbl_kas_kecil` WHERE ket_kaskecil='pengeluaran' and bln_kaskecil='$bulan' and thn_kaskecil='$tahun' order by tanggal asc");
                $Dpengeluaran=mysqli_fetch_assoc($Qpengeluaran);
                $pengeluaran=$Dpengeluaran['total'];
                echo "Rp. ".number_format($pengisian-$pengeluaran,0,".",".");
                 ?>
              </td>
            </tr>
        </tbody>
      </table>
      <?php } ?>
    </div>
    <!-- /.box-content -->
  </div>

</div>
