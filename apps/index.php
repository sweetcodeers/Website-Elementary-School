<?php
  include("path.php");
?>
    <!-- NAVBAR -->
    <?php include(BASE_URL . 'templates/navbar_home.php'); ?>

    <div class="jumbotron jumbotron-fluid" id="home" >
      <div class="container-fluid home-content">
        <h5 class="fw-bold">SMP NEGERI 2 KARANGANYAR</h5>
        <div class="dropdown-divider mb-4" style="height:2px;width: 15%;background-color: #ffcb12;"></div>
        <h1 class="display-2 fw-bolder">Selamat Datang</h1>
        <p class="lead">
          Tempat sebagai sarana komunikasi dan informasi tentang perkembangan sekolah ini.
        </p>
        <div class="d-flex justify-content-start">
          <a href="/smpn2karanganyar/berita.php" class="btn btn-warning me-3">Berita</a>
          <a href="/smpn2karanganyar/mata_pelajaran.php" class="btn btn-outline-warning">Mata Pelajaran</a>
        </div>
      </div>
    </div>

    <!-- Ekstrakurikuler -->
    <div class="container mt-5" id="myBody" style="margin-bottom: 100px;">
      <div class="title">
        <h5 class="text-end fw-bold fs-2 me-5">Ekstrakurikuler</h5>
        <div class="dropdown-divider mb-4 rounded-pill divider-page0" style="width: 10%;margin-right:8%;"></div>
      </div>

      <div class="card mb-3 mt-5 border-0" style="max-width: 100%;">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="img-fluid rounded-3 shadow" src="/smpn2karanganyar/media/image/eks_paskribra.jpg" alt=""  width="450" height="450">
          </div>
          <div class="col-md-8">
            <div class="card-body mt-0">
              <p class="card-text">Satuan pendidikan memiliki kewajiban untuk menyelenggarakan kegiatan ekstrakurikuler sebagai wahana memfasilitasi pengembangan bakat dan minat peserta didik. Oleh sebab itu, kegiatan ekstrakurikuler harus dikelola secara sistematis dan terpola agar bermuara pada pencapaian tujuan yang dimaksud. Agar dapat menyusun dan mengembangkan kegiatan ekstrakurikuler yang tersistem dan terpola sekolah perlu memahami cara dan tahapan diperlukan panduan yang dapat membimbingsatuan pendidikan dalam menyelenggarakannya.</p>
              <div class="d-flex justify-content-start mt-3">
                <a href="/smpn2karanganyar/ekstrakurikuler.php" class="btn btn-warning me-3">Lihat Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mata Pelajaran -->
    <div class="container-fluid p-5" style="background-color: #E0DFDE;">
      <div class="container mt-3" style="margin-bottom: 100px;">
        <div class="title">
          <h5 class="text-start fw-bold fs-2">Mata Pelajaran</h5>
          <div class="dropdown-divider rounded-pill divider-page1" style="width: 10%;margin-left: 5%;"></div>
        </div>
        <div class="row row-cols-1 col-md-12 g-4 mt-5">

          <?php
            $sql = "SELECT * FROM tb_mata_pelajaran ORDER BY id DESC LIMIT 3";
            $query = mysqli_query($dbconn, $sql);
            while($row = mysqli_fetch_assoc($query)) {
          ?>
            <div class="col-sm-4 me-0">
              <div class="card content_mapel rounded-3 h-100">
                <img src="data:image;base64,<?php echo base64_encode($row['gambar_cover']); ?>" class="card-img-top" alt="img">
                <div class="card-body">
                  <h5 class="card-title fs-6 fw-bold"><?php echo $row['nama']; ?></h5>
                  <p class="card-text">
                    <?php echo substr($row['konten'], 0, 50); ?>
                  </p>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
        <div class="d-grid gap-2 col-7 mx-auto mt-5">
          <a class="btn btn-warning pb-2 pt-2" href="<?php echo BASE; ?>mata_pelajaran.php">Lihat Selengkapnya</a>
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
              <h5 class="card-title fs-2 fw-bold mt-5 text-end me-5">Kontak Kami</h5>
              <div class="dropdown-divider mb-4 rounded-pill divider-page2" style="width: 10%;margin-right:5.5%;"></div>

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
                  <img class="card-img-top" src="/smpn2karanganyar/media/icons/envelope-check-fill.svg" alt="img" style="width: 80px;margin-left: 80px;">
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

    <!-- FOOTER -->
    <?php include(BASE_URL . "templates/footer.php"); ?>
