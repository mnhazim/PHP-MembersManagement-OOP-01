<?php
  include '../controller/control.php';
  $obj = new control();
  $conf = new config();
  $conn = $conf->open();
  include 'inc/secureadmin.php';

  $rsahli = $obj->index();
  $jumlah = 0;
?>
<!DOCTYPE html>
<html>
<?php include 'inc/head.php'; ?>
<body>

  <?php include 'inc/nav.php'; ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <h3>SISTEM PENDAFTARAN AHLI</h3>
      </div>
      <div class="col-md-12">
        <small class="float-right"><strong>Welcome: </strong><span class="text-primary"><?php echo $rowpengurussecure['pengurus_nama']; ?></span></small>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 mx-auto">
        <div class="card mt-10">
          <div class="card-header">
            <div class="float-right">
              <a class="btn btn-success" href="tambah.php">Tambah</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Tarikh Daftar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                <?php
                $bil = 1;
                if (mysqli_num_rows($rsahli) > 0) {
                  foreach ($rsahli as $ahli) { 
                    $jumlah = $bil; ?>
                    <tr>
                      <th width="3%"><?php echo $bil++ ?></th>
                      <td><?php echo $ahli['ahli_nama']; ?></td>
                      <td><?php echo $ahli['ahli_email']; ?></td>
                      <td width="12%"><?php echo $ahli['ahli_tarikhdaftar']; ?></td>
                      <td width="100%" class="float-right">
                        
                        <form action="../controller/control.php?mod=hapus" method="post" class="float-right">
                          <input type="hidden" name="idahli" value="<?php echo $ahli['ahli_id']; ?>">
                          <button onclick="return confirm('Anda Pasti hapus data ini ?')" type="submit" class="btn btn-danger mr-1">&times;</button>
                        </form>
                        <a class="btn btn-primary mr-1 float-right" href="kemaskini.php?idahli=<?php echo $ahli['ahli_id'] ?>">Kemaskini</a>
                        <a class="btn btn-info mr-1 float-right" href="lihat.php?idahli=<?php echo $ahli['ahli_id'] ?>">Lihat</a>
                      </td>
                    </tr>
                  <?php } 
                } else { ?>
                    <tr>
                      <td colspan="5">No Data Found</td>
                    </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="5">Jumlah Ahli: <?php echo $jumlah; ?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>