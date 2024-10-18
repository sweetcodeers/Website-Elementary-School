<?php
  session_start();
  include 'path.php';
?>
    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/navbar.php'; ?>


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
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>">Home</a></li>
                <li class="breadcrumb-item ">
                  Media & Informasi
                </li>
                <li class="breadcrumb-item">
                  <a href="<?php echo BASE; ?>berita.php">Berita</a>
                </li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Detail Berita</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row g-0">
          <div class="card col-md-8 p-3">
            <div class="card-body">
                <div class="col-md-12">
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
            </div>
          </div>
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
                    <a class="text-decoration-none text-dark" href="/smpn2karanganyar/berita_detail.php?id=<?php echo $d['id']; ?>">
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
    <?php } ?>

    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
