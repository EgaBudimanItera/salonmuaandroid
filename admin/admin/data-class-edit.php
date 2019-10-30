
<?php
include 'action/koneksi.php';
if ($_POST['rowid']) {
  $id = $_POST['rowid'];
  $query=mysqli_query($conn,"select * from tbl_class where kd_class='$id'");
  while($data=mysqli_fetch_assoc($query)){
 ?>
<form class="form-horizontal" action="action/class-edit.php" method="post">
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="nisn" class="col-sm-2 control-label">Kode class</label>
          <div class="col-sm-10">
            <input type="text" id="#" name="kd_class" required="" readonly="" class="required form-control" value="<?php echo $data['kd_class'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="nisn" class="col-sm-2 control-label">Nama Class</label>
          <div class="col-sm-10">
            <input type="text" id="#" name="nm_class" required="" class="required form-control" value="<?php echo $data['nm_class'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="nisn" class="col-sm-2 control-label">Harga</label>
          <div class="col-sm-10">
            <input type="number" id="#" name="harga" required="" class="required form-control" value="<?php echo $data['harga'] ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
  </div>
</form>

<?php }
} ?>
