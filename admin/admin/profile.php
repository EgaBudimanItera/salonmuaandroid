<div class="row row-inline-block small-spacing">
  <div class="col-xs-12">
    <div class="box-content">
      <div class="col-md-6">
        <table class="table table-condensed" >
          <tr>
            <td style="width:40%">Nama</td>
            <td style="width:10%">:</td>
            <td style="width:40%"><?php echo $user['nama']; ?></td>
          </tr>
          <tr>
            <td style="width:40%">Username</td>
            <td style="width:10%">:</td>
            <td style="width:40%"><?php echo $user['username']; ?></td>
          </tr>
          <tr>
            <td style="width:40%">Email</td>
            <td style="width:10%">:</td>
            <td style="width:40%"><?php echo $user['email']; ?></td>
          </tr>
        </table>
        <hr>
        <a class="btn btn-sm btn-primary" href="?page=profile&id=<?php echo $user['id']; ?>">Ubah Password</a>
      </div>
      <?php
      if (isset($_GET['id'])) {
       ?>
      <div class="col-md-6">
        <form class="" action="action/ubah-pw.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
          <label for="nisn" class="col-sm-4 control-label">password lama</label>
          <div class="col-sm-8">
            <input type="password" id="#" name="pw_lama" required="" class="required form-control">
          </div>
        </div>
        <br>
        <div class="form-group"  >
          <label for="nisn" class="col-sm-4 control-label" style='margin-top:10px;'>password Baru</label>
          <div class="col-sm-8">
            <input type="password" id="#" name="pw_baru" required="" class="required form-control" style='margin-top:10px;'>
          </div>
        </div>
        <br>
        <div class="row">
          <br>
          <input style='float:right; margin-top:20px;' class="btn btn-primary" type="submit" name="Simpan" value="Simpan">
        </div>
        </form>
      </div>
      <?php } ?>
    </div>
    <!-- /.box-content -->
  </div>

</div>
