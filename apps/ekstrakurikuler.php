<?php
  include('path.php');

  $batas = 6;
  $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $previous = $halaman - 1;
  $next = $halaman + 1;

  $mulai = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

  $eks = "SELECT * FROM tb_ekstrakurikuler LIMIT $mulai, $batas";
  $result1 = mysqli_query($dbconn, $eks);
  $result2 = mysqli_query($dbconn, "SELECT * FROM tb_ekstrakurikuler");
  $jumlah_data = mysqli_num_rows($result2);
  $total_halaman = ceil($jumlah_data/$batas);

?>
    <!-- NAVBAR -->
    <?php include(BASE_URL . 'templates/navbar.php'); ?>
    <!-- content -->
    <div class="container" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body">
          <p class="card-title fs-2 fw-bold">Ekstrakurikuler</p>
          <p class="card-text">Kegiatan ini bertujuan untuk mendapatkan tambahan pengetahuan, keterampilan dan wawasan serta membantu membentuk karakter peserta didik sesuai dengan minat dan bakat masing - masing murid</p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>">Home</a></li>
              <li class="breadcrumb-item active">Akademik</li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Ekstrakurikuler</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto">

        <?php
            while ($row = mysqli_fetch_assoc($result1))
            {
        ?>
        <div class="col">
          <div class="card h-100 ekskul">
            <img src="data:image;base64,<?php echo base64_encode($row['gambar_cover']); ?>" class="card-img-top p-3" alt="img">
            <div class="card-body">
              <h5 class="card-title fs-4 fw-bold"><?php echo $row['nama']; ?></h5>
              <p class="card-text"><?php echo $row['deskripsi']; ?></p>
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

    <!-- Footer -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
