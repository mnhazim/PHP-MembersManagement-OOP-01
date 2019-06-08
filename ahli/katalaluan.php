<?php
  include '../controller/controlahli.php';
  $obj = new controlahli();
  $conf = new config();
  $conn = $conf->open();
  include 'inc/secureahli.php';
  $rsahliupdate = $obj->getahli($ahliid);
  $rowahli = mysqli_fetch_array($rsahliupdate);
?>
<!DOCTYPE html>
<html>
<?php include 'inc/head.php'; ?>
<body>

  <?php include 'inc/nav.php'; ?>

  <div class="container mt-5">
    <?php include 'inc/title.php'; ?>
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card border-danger mt-10">
          <div class="card-header">
            <h3>Tukar Kata Laluan</h3>
          </div>
          <div class="card-body">
            <form method="post" action="../controller/controlahli.php?mod=kemaskinikatalaluan">
      			  <div class="form-group">
      			    <label>Nama Penuh</label>
      			    <input type="text" class="form-control" placeholder="" required value="<?php echo $rowahli['ahli_nama'] ?>" readonly>
      			  </div>
      			  <div class="form-group">
      			    <label>Kata laluan baru</label>
      			    <input name="katalaluan" type="password" class="form-control" required autocomplete="off">
      			  </div>
              <input type="hidden" name="idahli" value="<?php echo $rowahli['ahli_id'] ?>">
              <a class="btn btn-primary float-left" href="index.php">Back</a>
              <button type="submit" class="btn btn-success float-right">Tukar</button>
      			</form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</body>
</html>