<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../login.php");
      die();
  }else{
    include '../path.php';

    $batas = 5;
    $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $previous = $halaman - 1;
    $next = $halaman + 1;

    $mulai = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

    $eks = "SELECT * FROM tb_berita ORDER BY id DESC LIMIT $mulai, $batas";
    $result1 = mysqli_query($dbconn, $eks);
    $result2 = mysqli_query($dbconn, "SELECT * FROM tb_berita");
    $jumlah_data = mysqli_num_rows($result2);
    $total_halaman = ceil($jumlah_data/$batas);


  }
?>

    <!-- NAVBAR -->
    <?php require BASE_URL . "templates/admin/navbar.php"; ?>


    <!-- content -->
    <div class="container" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body p-4">
          <p class="card-title fs-3 fw-bold">
            <img src="<?php echo BASE; ?>media/icons/news.png" alt="" width="50px"> Berita
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
              <li class="breadcrumb-item">Media & Informasi</li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Daftar Berita</li>
            </ol>
          </nav>

          <a href="<?php echo BASE; ?>admin/berita/tambah.php" class="btn btn-warning mb-4">
            <img src="<?php echo BASE; ?>media/icons/add_news.png" alt="" width="20px"> Berita Baru
          </a>

          <a href="<?php echo BASE; ?>admin/berita/manage.php" class="ms-2 btn btn-warning mb-4">
            <img src="<?php echo BASE; ?>media/icons/manage_news.png" alt="" width="20px"> Manage Berita
          </a>
        </div>
      </div>

      <div class="news">
        <?php
          while($row = mysqli_fetch_assoc($result1))
          {
        ?>
          <div class="card mb-5 shadow berita-card">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="data:image;base64,<?php echo base64_encode($row['gambar_cover']); ?>" class="img-fluid rounded-start" alt="image" style="width: 400px;height: 300px;">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-text mt-2" style="font-size: 14px;">
                    <span class="fw-bold">
                      <img src="<?php echo BASE; ?>media/icons/person-circle.svg" alt="" width="20px" class="mb-1">
                      <?php echo $row['author']; ?>
                    </span>
                    <small class="text-muted">
                      &bull;
                      <?php
                        echo tgl_indo($row['tanggal_pembuatan'], true);
                      ?>
                    </small>
                  </p>
                  <h5 class="card-title mt-3 fw-bold fs-5 "><?php echo $row['judul']; ?></h5>

                  <p class="card-text mt-3">
                    <?php
                      echo substr($row['konten'], 0, 300).". . .";
                     ?>
                  </p>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="<?php echo BASE; ?>admin/berita/display.php?id=<?php echo $row['id']; ?>" class="btn btn-primary mt-2 mb-1">
                      Baca selengkapnya
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Pagination -->
    <div class="container-fluid mx-auto mt-5" style="margin-bottom: 100px;">
      <nav aria-label="...">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php if($halaman <= 1) { echo 'disabled'; } ?> ">
  					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?> >« Previous</a>
				  </li>
          <?php for ($i=1; $i<= $total_halaman; $i++) { ?>
            <li class="page-item <?php if($halaman == $i) {echo 'active'; } ?>">
              <a class="page-link" href="?halaman=<?php echo $i; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php } ?>

          <li class="page-item <?php if($halaman >= $total_halaman) { echo 'disabled'; } ?> " >
  					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next »</a>
  				</li>
        </ul>
      </nav>
    </div>

    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
