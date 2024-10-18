<?php
  session_start();
  if (!isset($_SESSION['id'])){
    header("Location: ../login.php");
    die();
  }else{
    include '../../path.php';
    $user_id = $_SESSION['id'];
  }
?>
    <!-- NAVBAR -->
    <?php require BASE_URL . "templates/admin/navbar.php"; ?>

    <!-- content -->
    <div class="container mt-5" style="margin-bottom: 100px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body p-4">
          <p class="card-title fs-3 fw-bold">
            <i class="bi bi-pencil-square"></i> Edit Profil
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
              <li class="breadcrumb-item">
                <a href="<?php echo BASE; ?>admin/profil.php">Profil User</a>
              </li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Edit Profil</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card rounded-3 p-4">
        <div class="card-body">
          <div class="row g-0">
            <?php
                $sql = "SELECT * FROM tb_users WHERE id = '$user_id'";
                $query = mysqli_query($dbconn, $sql);
                while ($row = mysqli_fetch_array($query))
                {
             ?>
              <div class="col-md-3">
                <img src="data:image;base64,<?php echo base64_encode($row['foto_profil']); ?>" class="img-fluid rounded-circle mx-auto" alt="profile" width="200px">
              </div>
              <div class="col-md-9">
                <form class="row g-0" action="/smpn2karanganyar/admin/profil/update.php" method="POST" enctype="multipart/form-data">
                  <?php
                    if(isset($_SESSION['error'])){
                  ?>
                    <p class="alert alert-danger" role="alert">
                      <?php echo $_SESSION['error']; ?>
                    </p>
                    <?php unset($_SESSION['error']); ?>
                  <?php } ?>

                  <div class="col-md-6 mb-4 mt-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control d-inline-block h-50 border-0 border-bottom" id="username" name="username" value="<?php echo $row['username']; ?>">
                  </div>
                  <div class="col-md-6 mb-4 mt-4">
                    <label for="nama_lengkap" class="form-label ms-4">Nama Lengkap</label>
                    <input type="text" class="form-control ms-4 d-inline-block h-50 border-0 border-bottom" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control d-inline-block h-50 border-0 border-bottom" id="email" name="email" value="<?php echo $row['email']; ?>">
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="tanggal_lahir" class="form-label ms-4">Tanggal Lahir</label>
                    <input type="date" class="form-control ms-4 d-inline-block h-50 border-0 border-bottom" min="1997-01-01" max="2030-12-31" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select d-inline-block h-50 border-0 border-bottom" id="jenis_kelamin" name="jenis_kelamin" aria-label="Default select example">
                      <option selected><?php echo $row['jenis_kelamin']; ?></option>
                      <option value="Wanita">Wanita</option>
                      <option value="Laki - laki">Laki - laki</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="no_telepon" class="form-label ms-4">No. Telepon</label>
                    <input type="number" class="form-control ms-4 d-inline-block h-50 border-0 border-bottom" id="no_telepon" name="no_telepon" value="<?php echo $row['no_telepon']; ?>">
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control d-inline-block h-50 border-0 border-bottom" id="alamat" name="alamat"><?php echo $row['alamat']; ?></textarea>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="gambar" class="form-label ms-4">Ganti Foto Profil</label>
                    <input class="form-control ms-4 mb-2 mt-2" type="file" id="gambar" name="gambar">
                    <small class="text-muted ms-4">*upload gambar harus berekstensi .jpeg atau .jpg!</small>
                  </div>
                  <div class="col-md-6 mt-3 d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Simpan</button>
                  </div>
                  <div class="col-md-6 mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-danger" href="<?php echo BASE; ?>admin/profil.php">Batal</a>
                  </div>
                </form>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>


    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
