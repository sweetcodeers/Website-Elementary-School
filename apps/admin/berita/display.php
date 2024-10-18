<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../../login.php");
      die();
  }else {
    include '../../path.php';
  }
?>
    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>


    <!-- content -->
    <?php
      $id = $_GET['id'];
      $result = mysqli_query($dbconn,"SELECT * FROM tb_berita WHERE id = '$id'");
      while($d = mysqli_fetch_array($result))
      {
    ?>
      <div class="container-fluid" style="margin-bottom: 100px;margin-top: 50px;">
        <div class="container">
          <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
            <div class="card-body">
              <h3 class="card-title fs-3 mt-2 mb-3 fw-bold"><?php echo $d['judul']; ?></h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
                  <li class="breadcrumb-item ">
                    Media & Informasi
                  </li>
                  <li class="breadcrumb-item">
                    <a href="<?php echo BASE; ?>admin/berita.php">Daftar Berita</a>
                  </li>
                  <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Detail Berita</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row g-0">
            <div class="card col-md-8">
              <div class="card-body">
                <form class="row g-0 p-3" action="<?php echo BASE; ?>admin/berita/update.php" method="POST">
                  <div class="col-md-12">
                    <?php
                      if(isset($_SESSION['success'])){
                    ?>
                      <p class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success']; ?>
                      </p>
                      <?php unset($_SESSION['success']); ?>
                    <?php } ?>

                    <input type="hidden" name="id" id="id" value="<?php echo $d['id']; ?>">
                    <p class="card-text">
                      <img src="/smpn2karanganyar/media/icons/person-circle.svg" alt="" width="22px" class="me-1">
                      <a class="text-decoration-none text-dark fw-bold" href="/smpn2karanganyar/admin/profil.php?id=<?php echo $_SESSION['id']; ?>">
                        <?php echo $d['author']; ?>
                      </a>
                      <small class="text-muted ms-1">
                        &bull;
                        <?php
                          echo tgl_indo($d['tanggal_pembuatan'], true);
                        ?>
                      </small>
                    </p>
                    <hr>

                    <img class="card-img-top rounded mx-auto d-block mb-5 mt-5" src="data:image;base64,<?php echo base64_encode($d['gambar_cover']); ?>" alt="">
                    <p><?php echo $d['konten']; ?></p>
                  </div>

                  <div class="col-md-4 mt-5 d-md-flex justify-content-md-start p-2">
                    <a class="btn btn-primary rounded-pill" href="<?php echo BASE; ?>admin/berita/edit.php?id=<?php echo $d['id']; ?>">
                      <i class="bi bi-pencil-square"></i> Edit Berita
                    </a>
                  </div>

                  <div class="col-md-4 mt-5 d-md-flex justify-content-md-center p-2">
                    <a class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $d['id']; ?>">
                      <i class="bi bi-trash"></i> Hapus Berita
                    </a>
                  </div>


                  <div class="col-md-4 mt-5 d-md-flex justify-content-md-end p-2">
                    <a href="<?php echo BASE; ?>admin/berita.php" class="btn btn-success rounded-pill">
                      <i class="bi bi-arrow-left-circle-fill"></i> Batal
                    </a>
                  </div>

                  <!-- Modal Tombol Hapus -->
                  <div class="modal fade" id="exampleModal<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Guru</h5>
                          <button type="button" class="btn-close btn-light rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah anda yakin ingin menghapus data guru ini? Setelah dihapus, anda tidak dapat membatalkan tindakan ini!
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                          <a class="btn btn-danger" href="<?php echo BASE; ?>admin/berita/hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          <?php } ?>

          <div class="col-md-4">
            <div class="card ms-5" style="width: 20rem;">
              <div class="card-header fs-5 text-center fw-bold">
                Berita saat ini
              </div>
              <ul class="list-group list-group-flush">
                <?php
                  $id = $_GET['id'];
                  $result = mysqli_query($dbconn,"SELECT * FROM tb_berita LIMIT 5");
                  while($d = mysqli_fetch_array($result))
                  {
                ?>
                  <li class="list-group-item">
                    <a class="text-decoration-none text-dark" href="/smpn2karanganyar/admin/berita/display.php?id=<?php echo $d['id']; ?>">
                      <?php echo $d['judul']; ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
