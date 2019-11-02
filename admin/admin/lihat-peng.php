
<?php
include 'action/koneksi.php';
include 'action/function-tanggal.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
if ($_POST['rowid']) {
  $id = $_POST['rowid'];
  $query=mysqli_query($conn,"SELECT tbl_kas.*,tbl_akun.* from tbl_kas inner join tbl_akun on tbl_kas.kd_akun=tbl_akun.kd_akun
    where  kd_kas='$id' order by tgl_kas DESC");
  while($data=mysqli_fetch_assoc($query)){
    $sttapp=$data['ketapp'];
    $ket_kas=$data['ket_kas'];
    $reff=$data['reff'];
 ?>
 <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">Detail <?php echo $data['ket_kas']; ?> Kas</h4>
 </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">kode</label>
          <div class="col-sm-10">
            <input type="text" id="pil_a" name="kd_soal"  readonly="" class="required form-control" value="<?php echo $data['kd_kas']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-10">
            <input type="text" id="pil_a" name="kd_soal"  readonly="" class="required form-control" value="<?php echo $data['tgl_kas'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Akun</label>
          <div class="col-sm-10">
            <input type="text" id="pil_a" name="kd_soal"  readonly="" class="required form-control" value="<?php echo $data['nm_akun'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Jumlah</label>
          <div class="col-sm-10">
            <input type="text" id="pil_a" name="kd_soal"  readonly="" class="required form-control" value="Rp. <?php echo number_format($data['jml_kas'],0,".",".")?>">
          </div>
        </div>
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Ket</label>
          <div class="col-sm-10">
            <input type="text" id="pil_a" name="kd_soal"  readonly="" class="required form-control" value="<?php echo $data['prihal']?>">
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <?php if ($ket_kas=="pengeluaran") {?>
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Bill</label>
          <div class="col-sm-10">
            <img src="img/scan/<?php echo $data['bill'] ?>" alt="">
          </div>
        </div>
      <?php }else{
        $qreff= mysqli_query($conn,"SELECT * from tbl_dtl_reservasi where kd_dtl='$reff'");
        $dreff=mysqli_fetch_assoc($qreff);
        $kd=$dreff['kd_res'];
        ?>
        <iframe src="bukti-penerimaan.php?id=<?php echo $kd; ?>" width="100%" height="400"></iframe>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
    <?php
    if (!empty($_SESSION['username']) && $_SESSION['jabatan']=='Pimpinan') {
      if ($sttapp=="N") {
    ?>
        <a href='action/Validasi-Kas.php?id=<?php echo $data['kd_kas'] ?>' class="delete btn  btn-danger btn-xs">Validasi</a>
  <?php } }?>
  </div>

<?php }
} ?>
