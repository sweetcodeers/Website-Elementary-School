<?php
  session_start();
  if (!isset($_SESSION['id'])){
      header("Location: ../login.php");
      die();
  }else {
    include '../path.php';
  }
?>
    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>
    <style type="text/css">
      /* GALERI */
      .galeri.zoom:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: transform 0.3s;
      }
      .galeri.modal-header {
        border-bottom: none;
      }
      .galeri.modal-title {
          color:#000;
      }
      .galeri.modal-footer{
        display:none;
      }
    </style>

    <div class="container" style="margin-bottom: 100px;">
        <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
          <div class="card-body p-4">
            <p class="card-title fs-3 fw-bold">
              <img src="/smpn2karanganyar/media/icons/dftr_gmbr.png" alt="" width="50px"> Galeri
            </p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
                <li class="breadcrumb-item">Media & Informasi</li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Galeri</li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="card border-0">
          <div class="card-body">
            <a class="btn btn-warning mb-4 me-2" href="<?php echo BASE; ?>admin/galeri/tambah.php">
              <img src="/smpn2karanganyar/media/icons/add_gmbr.png" alt="" width="20px">
              Gambar Baru
            </a>
            <a class="btn btn-warning mb-4" href="<?php echo BASE; ?>admin/galeri/manage.php">
              <img src="/smpn2karanganyar/media/icons/manage_news.png" alt="" width="20px">
              Manage Gambar
            </a>

            <!-- Galeri List -->
            <div class="row" data-masonry='{"percentPosition": true }'>
              <?php
                  $sql = "SELECT * FROM tb_galeri";
                  $query = mysqli_query($dbconn, $sql);
                  while($row = mysqli_fetch_array($query)){
               ?>
                <div class="col-sm-3 col-md-4">
                    <div class="card border-0">
                        <div class="card-body">
                          <a class="" data-bs-toggle="modal" data-bs-target="#display_gambar<?php echo $row['id']; ?>" data-bs-whatever="@mdo">
                            <img class="w-100 galeri zoom shadow-1-strong rounded mb-4" src="data:image;base64,<?php echo base64_encode($row['data']); ?>" alt="">
                          </a>
                          <div class="modal fade" id="display_gambar<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="max-width: 550px;">
                              <div class="modal-content border-0 bg-transparent">
                                <div class="modal-header border-0 mb-4">
                                  <button type="button" class="btn-close bg-light rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <a href="#">
                                  <img src="data:image;base64,<?php echo base64_encode($row['data']); ?>" alt="" width="550px" class="m-0 rounded-top">
                                </a>

                                <div class="modal-body bg-white p-0 rounded-bottom">

                                  <p class="text-muted mt-3 ms-2">
                                    <i class="bi bi-calendar"></i>
                                    <span class="ms-2">
                                      <?php
                                        echo tgl_indo($row['tanggal_dimasukkan'], true);
                                      ?>
                                    </span>
                                  </p>
                                  <p class="mt-1 ms-2">
                                    <span class="fw-bold me-2">Nama: </span>
                                    <?php
                                      echo $row['nama'];
                                    ?>
                                  </p>
                                  <p class="ms-2">
                                    <span class="fw-bold me-2">Tipe: </span>
                                    <?php
                                      echo $row['tipe'];
                                    ?>
                                  </p>

                                  <p class="ms-2">
                                    <span class="fw-bold me-2">Ukuran: </span>
                                    <?php
                                      $bytes = $row['ukuran'];
                                      $decimal_places = 1;
                                      echo number_format($bytes / 1024, $decimal_places);
                                    ?>
                                    KB
                                  </p>
                                </div>
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
    </div>




    <!-- Footer -->
    <?php require BASE_URL . '/templates/footer.php'; ?>
