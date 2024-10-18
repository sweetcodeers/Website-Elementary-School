<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../login.php");
      die();
  }else {
    include '../path.php';
    $batas = 3;
    $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $previous = $halaman - 1;
    $next = $halaman + 1;

    $mulai = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

    $eks = "SELECT * FROM tb_mata_pelajaran LIMIT $mulai, $batas";
    $result1 = mysqli_query($dbconn, $eks);
    $result2 = mysqli_query($dbconn, "SELECT * FROM tb_mata_pelajaran");
    $jumlah_data = mysqli_num_rows($result2);
    $total_halaman = ceil($jumlah_data/$batas);
  }

?>
    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>

    <!-- content -->
    <div class="container-fluid">
      <div class="container" style="margin-top: 50px;">
        <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
          <div class="card-body">
            <p class="card-title fs-2 fw-bold">Mata Pelajaran</p>
            <p class="card-text"> Berikut beberapa pelajaran yang akan diajarkan ke murid dari sekolah kami...</p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>/admin/">Home</a></li>
                <li class="breadcrumb-item active">Akademik</li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Mata Pelajaran</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <?php while($row = mysqli_fetch_assoc($result1)) { ?>
            <div class="col-12 col-md-11 mx-auto">
              <div class="col">
                <div class="card rounded-4 mb-3 mapel_page" style="width: 100%;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="data:image;base64,<?php echo base64_encode($row['gambar_cover']); ?>" class="img-fluid img-mapel rounded-3 p-3" alt="image">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title fw-bold fs-4"><?php echo $row['nama']; ?></h5>
                        <p class="card-text">
                          <small class="text-muted">
                            <i class="bi bi-person-circle"></i>
                            Guru Pengajar:
                            <?php
                              echo $row['guru_pengajar1'] .", ";
                              echo $row['guru_pengajar2'] .", ";
                              echo $row['guru_pengajar3'];
                             ?>
                          </small>
                        </p>
                        <p class="card-text">
                          <?php echo $row['konten']; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php } ?>
        </div>
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
