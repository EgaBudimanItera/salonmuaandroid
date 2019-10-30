<?php
include 'action/koneksi.php';
$id = $_GET['id'];
  $query=mysqli_query($conn,"SELECT tbl_reservasi.*,tbl_tamu.* from tbl_reservasi inner join tbl_tamu on tbl_reservasi.kd_tamu=tbl_tamu.kd_tamu where kd_res='$id'");
  $data=mysqli_fetch_assoc($query)?>
<div class="row small-spacing">
  <div class="col-xs-12">
    <form data-toggle="validator" class="form-horizontal" id="commentForm" action="action/proses-cekout.php" method="post">
      <div class="invoice-box">
        <table>
          <tr class="top">
            <td colspan="2">
              <table>
                <tr>
                  <td class="title">
                    <a href="#" class="logo">Detail<span> Reservasi</span></a>
                  </td>

                  <td>
                    <!-- Invoice #: 123<br> -->
                    Cekin: <?php echo $data['tgl_masuk'] ?><br>
                    Cekout: <?php echo $data['tgl_keluar'] ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr class="information">
            <td colspan="2">
              <table>
                <tr>
                  <td>
                    <?php echo $data['kd_res'] ?><br>
                    <?php echo $data['nama'] ?><br>
                  </td>

                  <!-- <td>
                    Acme Corp.<br>
                    John Doe<br>
                    john@example.com
                  </td> -->
                </tr>
              </table>
            </td>
          </tr>

          <tr class="heading">
            <td>
              Detail Reservasi
            </td>

            <td>
              Harga
            </td>
          </tr>
          <?php
          include 'action/koneksi.php';

            $querykamar=mysqli_query($conn,"SELECT tbl_reservasi.*,tbl_res_kamar.*, tbl_kamar.* from tbl_res_kamar
              inner join tbl_reservasi on tbl_reservasi.kd_res=tbl_res_kamar.kd_res
              inner join tbl_kamar on tbl_kamar.kd_kamar=tbl_res_kamar.kd_kamar where tbl_res_kamar.kd_res='$id'");
              while ($datakamar=mysqli_fetch_assoc($querykamar)) {
            ?>
          <tr class="item">
            <td>
              Kamar <?php echo $datakamar['kd_kamar'] ?>
            </td>

            <td>
              Rp. <?php echo number_format($datakamar['subtot_kamar'],0,".",".") ?>
            </td>
          </tr>
          <?php } ?>

          <?php
          include 'action/koneksi.php';

            $querypaket=mysqli_query($conn,"SELECT tbl_reservasi.*,tbl_res_paket.*, tbl_paket.* from tbl_res_paket
              inner join tbl_reservasi on tbl_reservasi.kd_res=tbl_res_paket.kd_res
              inner join tbl_paket on tbl_paket.kd_paket=tbl_res_paket.kd_paket where tbl_res_paket.kd_res='$id'");
              while ($datapaket=mysqli_fetch_assoc($querypaket)) {
            ?>
          <tr class="item">
            <td>
              <?php echo $datapaket['ket_paket'] ?>
            </td>

            <td>
              Rp. <?php echo number_format($datapaket['subtot_pakt'],0,".",".") ?>
            </td>
          </tr>
          <?php } ?>
          <tr class="itemlast">
            <td>
              diskon
            </td>

            <td>
              <?php echo $data['disc']; ?> %
            </td>
          </tr>
          <tr class="total">
            <td></td>

            <td>
               Total: Rp. <?php echo number_format($data['tot_bayar'],0,".",".") ?>
            </td>
          </tr>

          <tr class="item">
            <td>

            </td>

            <td>

            </td>
          </tr>

          <tr class="heading">
            <td>
              Status Pembayaran
            </td>

            <td>
              <select name="stt_bayar" class="required form-control" id="cls_ruangan" required="">
                <option></option>

                <option value="L">Lunas</option>
                <option value="DP">DP</option>

              </select>
            </td>
          </tr>
          <tr class="item">
            <td>

            </td>

            <td>

            </td>
          </tr>
          <tr class="heading">
            <td>
              Jumlah Dibayarkan
            </td>

            <td>
              <input type="hidden" name="kd_res" class="required form-control" id="jml_bayar" required value="<?php echo $id; ?>">
              <input type="number" name="jml_bayar" class="required form-control" id="jml_bayar" required>
            </td>
          </tr>
        </table>
        <div class="text-right margin-top-20">
          <ul class="list-inline">
            <div class="form-group">
              <div class="col-sm-9">
                  <input type="hidden" name="kd_user" class="required form-control" id="jml_hari" value="<?php echo $user['kd_karyawan'] ?>">
              </div>
            </div>
            <!-- <li><button type="button" class="btn btn-default"><i class='fa fa-print'></i> Print</button></li> -->
            <li>
            <input type="submit" class="btn btn-primary" name="name" value="Proses"></li>
          </ul>
        </div>
      </div>
      <!-- /.invoice-box -->
    </form>

  </div>
  <!-- /.col-xs-12 -->
</div>
<!-- /.row small-spacing -->
