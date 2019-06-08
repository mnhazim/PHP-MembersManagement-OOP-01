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
        <div class="card border-info mt-10">
          <div class="card-header">
            <h3>Detail Ahli</h3>
          </div>
          <div class="card-body">
              <div class="form-group">
                <label>Nama Penuh</label>
                <input class="form-control" value="<?php echo $rowahli['ahli_nama'] ?>" readonly>
              </div>
              <div class="form-group">
                <label>No Ic</label>
                <input class="form-control" value="<?php echo $rowahli['ahli_ic'] ?>" readonly>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" value="<?php echo $rowahli['ahli_email'] ?>" readonly>
              </div>
              <div class="form-group">
                <label>Tarikh</label>
                <input class="form-control" value="<?php echo $rowahli['ahli_tarikhdaftar'] ?>" readonly>
              </div>
              <a class="btn btn-danger float-right" href="kemaskini.php">Kemaskini Profil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</body>
</html>