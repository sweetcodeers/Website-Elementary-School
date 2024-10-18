<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../../login.php");
      die();
  }else{
    // koneksi database
    include '../../path.php';
    if (isset($_POST['tambah'])) {
      // menangkap data yang di kirim dari form
      $judul = mysqli_real_escape_string($dbconn, $_POST['judul']);
      $konten  = mysqli_real_escape_string($dbconn, $_POST['konten']);
      $author = mysqli_real_escape_string($dbconn, $_POST['author']);
      $gambar = $_FILES['gambar']['tmp_name'];
      $data = addslashes(file_get_contents($gambar));

      if (getimagesize($_FILES['gambar']['tmp_name']) == false) {
        $_SESSION['error'] = "Anda gagal menambahkan berita baru, tolong tambahkan gambar untuk cover berita!";
        header("location: /smpn2karanganyar/admin/berita/tambah.php");
        die();
      }else{
        // Masukan data ke database
        $sql = "INSERT INTO tb_berita (
                        judul,
                        konten,
                        author,
                        gambar_cover
                    )VALUES(
                        '$judul',
                        '$konten',
                        '$author',
                        '$data'
                    )";
        $result = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
        if($result){
          $_SESSION['success'] = "Berita baru berhasil ditambahkan! Silahkan periksa daftar berita <a href='/smpn2karanganyar/admin/berita.php'>disini</a>";
        }
        // else {
        //   die(mysqli_error($dbconn));
        // }
      }

    }
  }



?>
  <!-- NAVBAR -->
  <?php require BASE_URL . 'templates/admin/navbar.php'; ?>


    <!-- content -->
    <div class="container" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body">
          <p class="card-title fs-3 fw-bold">
            <img src="<?php echo BASE; ?>media/icons/add_news.png" alt="" width="50px"> Tambah Berita
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/welcome.php">Home</a></li>
              <li class="breadcrumb-item active">Media & Informasi</li>
              <li class="breadcrumb-item active">
                <a href="<?php echo BASE; ?>admin/berita.php">Daftar Berita</a>
              </li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Tambah Berita</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card p-3">
        <div class="card-body">
          <form class="row" action="<?php echo BASE; ?>admin/berita/tambah.php" method="POST" enctype="multipart/form-data">
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

            <div class="col-md-12 mb-4">
              <label for="judul" class="form-label fw-bold">Judul</label>
              <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan judul konten berita . . ." required>
            </div>
            <div class="col-md-12 mb-3">
              <label for="konten" class="form-label fw-bold">Konten</label>
              <textarea class="form-control" name="konten" id="konten" rows="5" placeholder="Masukkan konten berita . . ." required></textarea>
            </div>
            <div class="col-md-12 mb-3">
              <label for="gambar" class="form-label fw-bold">Cover berita</label>
              <input type="file" class="form-control" id="gambar" name="gambar">
              <p class="card-text text-muted">*upload gambar harus berekstensi .jpeg atau .jpg!</p>
            </div>
            <div class="col-md-12 mb-3">
              <label for="author" class="form-label fw-bold">Author</label>
              <p class="form-control text-primary" rows="5"><?php echo $_SESSION['username']; ?></p>
              <input type="hidden" class="form-control" name="author" id="author" rows="5" value="<?php echo $_SESSION['username']; ?>">
            </div>
            <div class="col-md-6 mt-4">
              <button type="submit" class="btn btn-primary rounded-pill" name="tambah" id="tambah"><i class="bi bi-plus-circle-fill"></i>  Tambah</button>
            </div>

            <div class="col-md-6 mt-4 d-md-flex justify-content-md-end">
              <a href="<?php echo BASE; ?>admin/berita/manage.php" class="btn btn-danger rounded-pill">
                <i class="bi bi-arrow-left-circle-fill"></i> Batal
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
