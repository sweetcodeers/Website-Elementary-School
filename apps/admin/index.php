<?php
  session_start();
  if (!isset($_SESSION['id'])){
      header("Location: ../login.php");
      die();
  }else{
    include '../path.php';
    $user_id = $_SESSION['id'];
  }
?>

      <!-- Navbar -->
      <div class="header">
        <?php include(BASE_URL . 'templates/admin/navbar_home.php'); ?>
      </div>

      <div class="jumbotron jumbotron-fluid" id="home">
        <div class="container-fluid home-content">
          <h5 class="fw-bold">SMP NEGERI 2 KARANGANYAR</h5>
          <?php
            $sql = "SELECT * FROM tb_users WHERE id = '$user_id'";
            $query = mysqli_query($dbconn, $sql);
            while ($row = mysqli_fetch_array($query))
            {
          ?>
          <div class="dropdown-divider mb-4" style="height:2px;width: 15%;background-color: #ffcb12;"></div>
          <h1 class="display-4 fw-bolder">Hai, <?php echo $row['username']; ?>!</h1>
        <?php } ?>
          <p class="lead">
            website ini dibangun guna sebagai sarana komunikasi dan informasi tentang perkembangan sekolah ini.
          </p>
          <div class="d-flex justify-content-start">
            <a href="<?php echo BASE ?>admin/berita.php" class="btn btn-warning me-3">Berita</a>
            <a href="<?php echo BASE ?>admin/mata_pelajaran.php" class="btn btn-outline-warning">Mata Pelajaran</a>
          </div>
        </div>
      </div>

      <!-- Counts -->
      <div class="container counts" style="margin-bottom: 100px;">
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-5">
          <!-- TOTAL GURU & KARYAWAN -->
          <?php
            $sql = "SELECT * from tb_karyawan";
            if ($result = mysqli_query($dbconn, $sql)) {
                // Return the number of rows in result set
                $rowcount = mysqli_num_rows( $result );


          ?>
            <div class="col">
              <div class="card mb-3 shadow" style="width: 15rem;">
                <div class="row g-0">
                  <div class="col-md-4 mt-3">
                    <img src="<?php echo BASE; ?>media/icons/peoples.png" class="img-fluid rounded m-2" alt="img" width="60px">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h2 class="card-title fw-bold display-5 text-end">
                        <?php echo $rowcount; ?>
                      </h2>
                      <p class="card-text little-text text-muted text-end mb-3">
                        Guru & Karyawan
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

          <!-- TOTAL MAPEL -->
          <?php
            $sql2 = "SELECT * from tb_mata_pelajaran";
            if ($result2 = mysqli_query($dbconn, $sql2)) {
                // Return the number of rows in result set
                $rowcount2 = mysqli_num_rows( $result2 );
          ?>
            <div class="col">
              <div class="card mb-3 shadow" style="width: 15rem;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="<?php echo BASE; ?>media/icons/mapel.png" class="img-fluid rounded m-3 " alt="img" width="70px" height="10px">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h2 class="card-title fw-bold display-5 text-end">
                        <?php echo $rowcount2; ?>
                      </h2>
                      <p class="card-text little-text text-muted text-end mb-3">
                        Mata Pelajaran
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

          <!-- TOTAL EKSTRAKURIKULER -->
          <?php
            $sql3 = "SELECT * from tb_ekstrakurikuler";
            if ($result3 = mysqli_query($dbconn, $sql3)) {
                // Return the number of rows in result set
                $rowcount3 = mysqli_num_rows( $result3 );
          ?>
            <div class="col">
              <div class="card mb-3 shadow" style="width: 15rem;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="<?php echo BASE; ?>media/icons/ekskul.png" class="img-fluid rounded m-3 " alt="img" width="70px">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h2 class="card-title fw-bold display-5 text-end">
                        <?php echo $rowcount3; ?>
                      </h2>
                      <p class="card-text little-text text-muted ms-2 text-end mb-3">
                        Ekstrakurikuler
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

          <!-- TOTAL Galeri -->
          <?php
            $sql4 = "SELECT * from tb_galeri";
            if ($result4 = mysqli_query($dbconn, $sql4)) {
                // Return the number of rows in result set
                $rowcount4 = mysqli_num_rows( $result4 );
          ?>
            <div class="col">
              <div class="card mb-3 shadow" style="width: 15rem;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="<?php echo BASE; ?>media/icons/galery.png" class="img-fluid rounded m-3 " alt="img" width="70px">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h2 class="card-title fw-bold display-5 text-end">
                        <?php echo $rowcount4; ?>
                      </h2>
                      <p class="card-text little-text text-muted ms-2 text-end mb-3">
                        Galery
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="container" style="margin-bottom: 100px;">
        <div class="card shadow p-3">
          <div class="card-body">
            <h3 class="fw-bold fs-3">Berita Terkini</h3>
            <div class="dropdown-divider"></div>

            <div class="header mt-3">
              <a href="<?php echo BASE ?>admin/berita/tambah.php" class="btn btn-warning mb-4">
                <img src="<?php echo BASE ?>media/icons/add_news.png" alt="" width="20px"> Berita Baru
              </a>
            </div>

            <table class="table table-bordered table-striped mt-3">
              <thead>
                <tr class="text-center p-2">
                  <th scope="col">No</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Author</th>
                  <th scope="col">Tanggal Pembuatan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
              		$no = 1;
                  $sql = "SELECT * FROM tb_berita ORDER BY id DESC LIMIT 5";
              		$data = mysqli_query($dbconn, $sql);
              		while($d = mysqli_fetch_array($data))
                  {
              	?>
                <tr scope='row'>
                  <td class="text-center"><?php echo $no++; ?>.</td>
                  <td><?php echo $d['judul']; ?></td>
                  <td class="text-center text-primary">
                    <?php echo $d['author']; ?>
                  </td>
                  <td class="text-center">
                    <?php
                      echo tgl_indo($d['tanggal_pembuatan'], true);
                    ?>
                  </td>
                  <td class="text-center">
                    <a class="btn btn-info btn-sm ms-2" href="<?php echo BASE; ?>admin/berita/edit.php?id=<?php echo $d['id']; ?>"><i class="bi bi-pencil"></i></a>
                    <a class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>

                <!-- Modal Tombol Hapus -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Berita</h5>
                        <button type="button" class="btn-close btn-light rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin ingin menghapus konten berita ini? Setelah dihapus, anda tidak dapat membatalkan tindakan ini!
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" href="<?php echo BASE ?>admin/berita/hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                      </div>
                    </div>
                  </div>
                </div>

              	<?php } ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <!-- Contact -->
      <div class="container-fluid" id="contact" style="background-color: #FAB23D;">
        <div class="card border-0" style="max-width: 100%;background: none;">
          <div class="row g-0">
            <div class="col-md-4 mt-5">
              <img src="/smpn2karanganyar/media/image/message_icon.png" class="img-fluid rounded-start" alt="img" style="width: 300px;margin-bottom: 50px;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title fs-2 fw-bold mt-5 text-start">Kontak Kami</h5>
                <div class="dropdown-divider mb-4 rounded-pill divider-page-contact" style="width: 10%;margin-right:5.5%;"></div>

                <div class="card-group" style="margin-top: 60px;">
                  <!-- address -->
                  <div class="card border-0" style="background: none;">
                    <img src="/smpn2karanganyar/media/icons/geo-alt-fill.svg" class="card-img-top" alt="img" style="width: 50px;margin-left: 70px;">
                    <div class="card-body">
                      <p class="card-text">
                        <small>Jl. Gendingan-Karanganyar Kab. Ngawi, Prov. Jawa Timur</small>
                      </p>
                    </div>
                  </div>
                  <div class="card border-0" style="background: none;">
                    <img class="card-img-top" src="/smpn2karanganyar/media/icons/telephone-forward-fill.svg" alt="img" style="width: 50px;margin-left: 60px;">
                    <div class="card-body" style="margin-left: 10px;">
                      <p class="card-text ms-4">
                        <small>(0351) 7708061</small>
                      </p>
                    </div>
                  </div>
                  <div class="card border-0 me-2" style="background: none;">
                    <img class="card-img-top" src="/smpn2karanganyar/media/icons/envelope-check-fill.svg" alt="img" style="width: 50px;margin-left: 80px;">
                    <div class="card-body">
                      <p class="card-text">
                        <small>smpnduakaranganyar@gmail.com</small>
                      </p>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <?php include(BASE_URL . 'templates/footer.php'); ?>
