<?php
  session_start();
  if (!isset($_SESSION['id'])) {
    header("location: ../login.php");
    die();
  }else{
    include '../../path.php';
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM tb_users WHERE id = '$user_id'";
    $query = mysqli_query($dbconn, $sql);
    while ($row = mysqli_fetch_array($query))
    {
  }
?>
    <!-- NAVBAR -->
    <?php require BASE_URL . "templates/admin/navbar.php"; ?>


    <!-- content -->
    <div class="container mt-5" style="margin-bottom: 100px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body p-4">
          <p class="card-title fs-3 fw-bold">
            <i class="bi bi-lock-fill"></i> Ubah Password
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
              <li class="breadcrumb-item">
                <a href="<?php echo BASE; ?>admin/profil.php">Profil User</a>
              </li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Ubah password</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card rounded-3 p-4 row col-md-10 mx-auto">
        <div class="card-body">
          <form class="row g-0" action="<?php echo BASE; ?>admin/profil/simpan_pass.php" method="POST">
            <?php if (isset($_SESSION['default'])) { ?>
              <p class="alert alert-warning" role="alert">
                <?php echo $_SESSION['default']; ?>
              </p>
              <?php unset($_SESSION['default']); ?>
            <?php } ?>

            <?php if (isset($_SESSION['error'])) { ?>
              <p class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; ?>
              </p>
              <?php unset($_SESSION['error']); ?>
            <?php } ?>

            <div class="col-md-12 mb-4 mt-4">
              <label for="pass_baru" class="form-label">Password Baru</label>
              <input type="password" class="form-control" id="pass_baru" name="pass_baru">
            </div>
            <div class="col-md-12 mb-4 mt-4">
              <label for="pass_konfirm" class="form-label">Password Konfirmasi</label>
              <input type="password" class="form-control" id="pass_konfirm" name="pass_konfirm">
            </div>
            <div class="col-md-6 mt-3 d-grid gap-2 d-md-flex justify-content-md-start">
              <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Simpan</button>
            </div>
            <div class="col-md-6 mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
              <a class="btn btn-danger" href="<?php echo BASE; ?>admin/profil.php">Batal</a>
            </div>
          </form>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <?php require BASE_URL . "templates/footer.php"; ?>
