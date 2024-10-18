<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../../login.php");
      die();
  }else{
    include '../../path.php';
  }
?>
    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>


    <!-- content -->
    <div class="container-fluid" style="margin-bottom: 100px;margin-top:50px;">
      <div class="container">
        <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
          <div class="card-body">
            <p class="card-title fs-3 fw-bold">
              <i class="bi bi-pencil-square"></i> Edit Berita
            </p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
                <li class="breadcrumb-item active">Media & Informasi</li>
                <li class="breadcrumb-item active">
                  <a href="<?php echo BASE; ?>admin/berita.php">Berita</a>
                </li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Edit Berita</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="card p-4 col-md-11 mx-auto">
          <div class="card-body">

            <?php
              $id = $_GET['id'];
              $data = mysqli_query($dbconn,"SELECT * FROM tb_berita WHERE id = '$id'");
              while($d = mysqli_fetch_array($data)){
            ?>
            <form class="row g-3" action="<?php echo BASE; ?>admin/berita/update.php" method="POST" enctype="multipart/form-data">
              <?php
                if(isset($_SESSION['success'])){
              ?>
                <p class="alert alert-success" role="alert">
                  <?php echo $_SESSION['success']; ?>
                </p>
                <?php unset($_SESSION['success']); ?>
              <?php } ?>

              <?php
                if(isset($_SESSION['error'])){
              ?>
                <p class="alert alert-danger" role="alert">
                  <?php echo $_SESSION['error']; ?>
                </p>
                <?php unset($_SESSION['error']); ?>
              <?php } ?>

              <div class="col-md-12">
                <label for="gambar" class="form-label fw-bold">Cover Berita</label>
                <input type="file" class="form-control" name="gambar_new">

                <small class="text-muted">*upload gambar harus berekstensi .jpeg atau .jpg!</small>
              </div>

              <div class="col-md-12">
                <input type="hidden" name="id" id="id" value="<?php echo $d['id']; ?>">
                <label for="judul" class="form-label fw-bold">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $d['judul']; ?>">
              </div>
              <div class="col-md-12 mb-3">
                <label for="konten" class="form-label fw-bold">Konten</label>
                <textarea class="form-control" name="konten" id="konten" rows="5"><?php echo $d['konten']; ?></textarea>
              </div>
              <div class="col-md-12 mt-4">
                <label for="author" class="form-label fw-bold">Author</label>
                <p class="form-control text-primary"><?php echo $d['author']; ?></p>
                <input type="hidden" class="form-control" id="author" name="author" value="<?php echo $d['author']; ?>">
              </div>
              <div class="col-md-6 mt-4">
                <button type="submit" class="btn btn-primary rounded-pill" name="simpan" id="simpan"><i class="bi bi-save"></i> Simpan</button>
              </div>

              <div class="col-md-6 mt-4 d-md-flex justify-content-md-end">
                <a href="<?php echo BASE; ?>admin/berita/manage.php" class="btn btn-danger rounded-pill">
                  <i class="bi bi-arrow-left-circle-fill"></i> Batal
                </a>
              </div>

              <?php } ?>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
      <?php require BASE_URL . 'templates/footer.php'; ?>
