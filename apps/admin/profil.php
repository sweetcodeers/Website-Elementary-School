<?php
  session_start();
  if (!isset($_SESSION['username'])){
    header("Location: ../login.php");
    die();
  }else {
    include '../path.php';
  }
?>
    <!-- NAVBAR -->
    <?php require BASE_URL . "templates/admin/navbar.php"; ?>

    <!-- content -->
    <div class="container" style="margin-bottom: 100px;margin-top: 100px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body p-4">
          <p class="card-title fs-3 fw-bold">
            <img class="mb-2" src="/smpn2karanganyar/media/icons/person-circle.svg" alt="" width="30px"> Profil User
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/smpn2karanganyar/admin/">Home</a></li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Profil User</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card rounded-3 p-4">
        <div class="card-body">
          <div class="row g-0">
            <?php
                $user_id = $_SESSION['id'];
                $sql = "SELECT * FROM tb_users WHERE id = '$user_id'";
                $query = mysqli_query($dbconn, $sql);
                while ($row = mysqli_fetch_array($query))
                {
             ?>
              <div class="col-md-3">
                <img src="data:image;base64,<?php echo base64_encode($row['foto_profil']); ?>" class="img-fluid rounded-circle mx-auto" alt="profile" width="200px">
              </div>
              <div class="col-md-9 pe-3">
                <form class="row g-0" action="<?php echo BASE; ?>admin/profil.php" method="POST">
                  <?php
                    if(isset($_SESSION['success'])){
                  ?>
                    <p class="alert alert-success" role="alert">
                      <?php echo $_SESSION['success']; ?>
                    </p>
                    <?php unset($_SESSION['success']); ?>
                  <?php } ?>

                  <div class="col-md-6 mb-4 mt-4">
                    <label for="username" class="form-label">Username</label>
                    <p class="form-control d-inline-block h-50 border-0 border-bottom" id="username" name="username"><?php echo $row['username']; ?></p>
                  </div>
                  <div class="col-md-6 mb-4 mt-4">
                    <label for="nama" class="form-label ms-4">Nama Lengkap</label>
                    <p class="form-control ms-4 d-inline-block h-50 border-0 border-bottom" id="nama" name="nama"><?php echo $row['nama']; ?></p>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="email" class="form-label">Email</label>
                    <p class="form-control d-inline-block h-50 border-0 border-bottom" id="email" name="email"><?php echo $row['email']; ?></p>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="tanggal_lahir" class="form-label ms-4">Tanggal Lahir</label>
                    <p class="form-control d-inline-block ms-4 h-50 border-0 border-bottom" id="tanggal_lahir" name="tanggal_lahir">
                      <?php
                        echo tgl_indo($row['tanggal_lahir'], true); ?>
                      </p>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <p class="form-control d-inline-block h-50 border-0 border-bottom" id="jenis_kelamin" name="jenis_kelamin"><?php echo $row['jenis_kelamin']; ?></p>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="no_telepon" class="form-label ms-4">No. Telepon</label>
                    <p class="form-control ms-4 d-inline-block h-50 border-0 border-bottom" id="no_telepon" name="no_telepon"><?php echo $row['no_telepon']; ?></p>
                  </div>
                  <div class="col-md-12 mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <p class="form-control d-inline-block h-60 border-0 border-bottom" id="alamat" name="alamat"><?php echo $row['alamat']; ?></p>
                  </div>

                  <div class="col-md-6 mt-3 d-grid gap-2 d-md-flex justify-content-md-start">
                    <a class="btn btn-success" href="<?php echo BASE; ?>admin/profil/edit.php/<?php echo $row['id']; ?>">Edit Profil</a>
                  </div>
                  <div class="col-md-6 mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary" href="<?php echo BASE; ?>admin/profil/ubah_pass.php">Ubah Password</a>
                  </div>
                </form>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <?php require BASE_URL . "templates/footer.php"; ?>
