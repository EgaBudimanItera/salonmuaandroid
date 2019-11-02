
<?php
include 'action/koneksi.php';
include 'action/function-tanggal.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
if ($_POST['rowid']) {
  $id = $_POST['rowid'];
  $query=mysqli_query($conn,"SELECT * from tbl_fpengeluaran where kd_fpeng='$id'");
  while($data=mysqli_fetch_assoc($query)){
 ?>

  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">kode</label>
          <div class="col-sm-10">
            <input type="text" id="pil_a" name="kd_soal"  readonly="" class="required form-control" value="<?php echo $data['kd_fpeng']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-10">
            <input type="text" id="pil_a" name="kd_soal"  readonly="" class="required form-control" value="<?php echo $data['tgl_fpeng'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Ket</label>
          <div class="col-sm-10">
            <input type="text" id="pil_a" name="kd_soal"  readonly="" class="required form-control" value="<?php echo $data['ket']?>">
          </div>
        </div>
          <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Jumlah</label>
          <div class="col-sm-10">
            <input type="text" id="jml" name="jml"  readonly="" class="required form-control" value="<?php echo "Rp. ".number_format($data['jumlah'],0,".",".");   ?>">
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="kd_soal" class="col-sm-2 control-label">Scan Form</label>
          <div class="col-sm-10">
            <img src="img/fpengeluaran/<?php echo $data['gambarf'] ?>" alt="">
          </div>
        </div>
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
