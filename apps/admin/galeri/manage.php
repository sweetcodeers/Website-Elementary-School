<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../../login.php");
      die();
  }else{
    include '../../path.php';
  }

?>
    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>


    <!-- content -->
    <div class="container" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body p-4">
          <p class="card-title fs-3 fw-bold">
            <i class="bi bi-person-square"></i> Manage Gambar
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
              <li class="breadcrumb-item">Media & Informasi</li>
              <li class="breadcrumb-item">
                <a href="<?php echo BASE; ?>admin/galeri.php">Daftar Gambar</a>
              </li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Manage Gambar</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card rounded-3 p-3">
        <div class="card-body">
          <a href="<?php echo BASE; ?>admin/galeri/tambah.php" class="btn btn-warning mb-4 me-3">
            <img src="/smpn2karanganyar/media/icons/add_gmbr.png" alt="" width="20px"> Gambar Baru
          </a>

          <?php
            if(isset($_SESSION['default'])){
          ?>
            <p class="alert alert-warning" role="alert">
              <?php echo $_SESSION['default']; ?>
            </p>
            <?php unset($_SESSION['default']); ?>
          <?php } ?>

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

          <table id="example" class="table table-bordered table-striped">
            <thead>
              <tr class="text-center align-middle">
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Gambar</th>
                <th scope="col">Tanggal Dimasukkan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM tb_galeri";
                $query = mysqli_query($dbconn, $sql);
                $no = 1;
                while($row = mysqli_fetch_array($query))
                {
              ?>
                <tr>
                  <th class="text-center"><?php echo $no++; ?>.</th>
                  <td class="text-center">
                    <a class="" data-bs-toggle="modal" data-bs-target="#gambar<?php echo $row['id']; ?>" data-bs-whatever="@mdo">
                      <img class="shadow-1-strong rounded mb-4" src="data:image;base64,<?php echo base64_encode($row['data']); ?>" alt="" width="150px">
                    </a>
                    <div class="modal fade" id="gambar<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" style="max-width: 530px;">
                        <div class="modal-content border-0 bg-transparent">
                          <div class="modal-header border-0">
                            <button type="button" class="btn-close bg-light rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <img class="rounded" src="data:image;base64,<?php echo base64_encode($row['data']); ?>" alt="" width="500px">
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $row['nama']; ?></td>
                  <td class="text-center">
                    <?php
                      echo tgl_indo($row['tanggal_dimasukkan'], true);
                    ?>
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#edit_gambar<?php echo $row['id'] ?>">
                     <i class="bi bi-pencil"></i>
                    </button>
                    <!-- Modal Tombol Edit -->
                    <div class="modal fade" id="edit_gambar<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="edit_gambar_label" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="fs-4 fw-bold">
                              <img src="<?php echo BASE; ?>media/icons/edit_gmbr.png" alt="" width="25px">
                              Edit Gambar ini
                            </h5>
                          </div>
                          <div class="modal-body p-3">
                            <form action="../galeri/edit.php?id=<?php echo $row['id']; ?>" method="POST"  enctype="multipart/form-data" class="row g-0">
                              <div class="col-md-12 mt-3 mb-5">
                                <img class="mx-auto d-block rounded" src="data:image;base64,<?php echo base64_encode($row['data']); ?>" alt="image" width="300px">
                                <input class="form-control mt-4" type="file" id="image" name="image" class="mx-auto d-block">
                              </div>
                              <div class="col-md-6 mb-3 d-md-flex justify-content-md-start">
                                <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Simpan</button>
                              </div>
                              <div class="col-md-6 mb-3 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="button" class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $row['id'];?>">
                      <i class="bi bi-trash"></i>
                    </button>
                    <!-- Modal Tombol Hapus -->
                    <div class="modal fade" id="hapus<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="exampleModalLabel">
                              <img src="<?php echo BASE; ?>media/icons/delete.png" alt="" width="25px">
                              Hapus Gambar
                            </h5>
                            <button type="button" class="btn-close btn-light rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="text-start">Yakin Ingin dihapus?</p>

                            <div class="row mt-4 mb-3">
                              <div class="col-md-6 d-md-flex justify-content-md-start">
                                <a class="btn btn-sm btn-danger" href="/smpn2karanganyar/admin/galeri/hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                              </div>
                              <div class="col-md-6 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal">Batal</button>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php } ?>

            </tbody>
          </table>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <a class="btn btn-secondary" href="<?php echo BASE; ?>admin/galeri.php">
              <i class="bi bi-arrow-left-circle-fill"></i>
              Kembali
            </a>
          </div>

        </div>

      </div>
    </div>

    <!-- FOOTER -->
    <?php include BASE_URL . 'templates/footer.php'; ?>
