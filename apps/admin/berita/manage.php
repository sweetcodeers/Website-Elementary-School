<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../login.php");
      die();
  }else {
    include '../../path.php';
  }
?>
    <!-- Navbar -->
    <?php include(BASE_URL . 'templates/admin/navbar.php'); ?>

    <!-- content -->
    <div class="container" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body p-4">
          <p class="card-title fs-3 fw-bold">
            <img class="me-2" src="<?php echo BASE; ?>media/icons/manage_news.png" alt="img" width="50px"> Manage Berita
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
              <li class="breadcrumb-item">Media & Informasi</li>
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/berita.php">Daftar Berita</a></li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Manage Berita</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card rounded-3 p-3">
        <div class="card-body">
          <div class="header">
            <a href="<?php echo BASE; ?>admin/berita/tambah.php" class="btn btn-warning mb-4">
              <img src="<?php echo BASE; ?>media/icons/add_news.png" alt="" width="20px"> Berita Baru
            </a>
          </div>

          <?php
            if(isset($_SESSION['success'])){
          ?>
            <p class="alert alert-success" role="alert">
              <?php echo $_SESSION['success']; ?>
            </p>
            <?php unset($_SESSION['success']); ?>
          <?php } ?>

          <table id="example" class="table table-bordered table-striped mt-2">
            <thead>
              <tr class="text-center p-2 align-middle">
                <th scope="col">No</th>
                <th scope="col">Cover Berita</th>
                <th scope="col">Judul</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
            		$no = 1;
                $sql = "SELECT * FROM tb_berita";
            		$data = mysqli_query($dbconn,$sql);
            		while($d = mysqli_fetch_array($data)){
            	?>
              <tr scope='row'>
                <td class="text-center"><?php echo $no++; ?>.</td>
                <td class="text-center">
                  <a class="" data-bs-toggle="modal" data-bs-target="#gambar_berita<?php echo $d['id']; ?>" data-bs-whatever="@mdo">
                    <img class="rounded shadow-1-strong rounded mb-4 mx-auto" src="data:image;base64,<?php echo base64_encode($d['gambar_cover']); ?>" alt="" width="250px">
                  </a>
                  <div class="modal fade" id="gambar_berita<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="max-width: 530px;">
                      <div class="modal-content border-0 bg-transparent">
                        <div class="modal-header border-0">
                          <button type="button" class="btn-close bg-light rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <img class="rounded" src="data:image;base64,<?php echo base64_encode($d['gambar_cover']); ?>" alt="" width="500px">
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td><?php echo $d['judul']; ?></td>
                <td class="text-center text-primary">
                  <?php echo $d['author']; ?>
                </td>
                <td class="text-center">
                  <a class="btn btn-success btn-sm ms-2" href="../berita/edit.php?id=<?php echo $d['id']; ?>"><i class="bi bi-pencil"></i></a>
                  <a class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $d['id']; ?>"><i class="bi bi-trash"></i></a>
                </td>
              </tr>

              <!-- Modal Tombol Hapus -->
              <div class="modal fade" id="exampleModal<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <a class="btn btn-danger" href="<?php echo BASE; ?>admin/berita/hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>

            	<?php } ?>
            </tbody>
          </table>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <a class="btn btn-secondary" href="<?php echo BASE; ?>admin/berita.php">
              <i class="bi bi-arrow-left-circle-fill"></i>
              Kembali
            </a>
          </div>

        </div>

      </div>
    </div>

    <!-- FOOTER -->
    <?php include(BASE_URL . 'templates/footer.php'); ?>
