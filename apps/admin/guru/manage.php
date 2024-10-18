<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../login.php");
      die();
  }else {
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
            <i class="bi bi-person-square"></i> Manage Guru
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/daftar_guru.php">Daftar Guru</a></li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Manage Guru</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card rounded-3 p-3">
        <div class="card-body">
          <a href="/smpn2karanganyar/admin/guru/tambah_guru.php" class="btn btn-warning mb-4">
            <img src="/smpn2karanganyar/media/icons/person-plus.svg" alt="" width="20px"> Guru Baru
          </a>

          <?php
            if(isset($_SESSION['success'])){
          ?>
            <p class="alert alert-success" role="alert">
              <?php echo $_SESSION['success']; ?>
            </p>
            <?php unset($_SESSION['success']); ?>
          <?php } ?>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr class="text-center p-2">
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">NIP</th>
                <th scope="col">Tanggal dimasukkan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
            		$no = 1;
            		$data = mysqli_query($dbconn,"SELECT * FROM tb_karyawan");
            		while($d = mysqli_fetch_array($data)){
            	?>
              <tr scope='row'>
                <td class="text-center"><?php echo $no++; ?>.</td>
                <td><?php echo $d['nama']; ?></td>
                <td>
                  <?php
                    if( !empty($d['nip']) ){
                      echo $d['nip'];
                    }else{
                      echo "<p class='text-center'>
                        -
                      </p>";
                    }
                  ?>
                </td>
                <td class="text-center">
                  <?php
                    echo tgl_indo($d['tanggal_dimasukkan'], true);
                  ?>
                </td>
                <td class="text-center">
                  <a class="btn btn-info btn-sm ms-2" href="/smpn2karanganyar/admin/guru/display.php?id=<?php echo $d['id']; ?>"><i class="bi bi-search"></i></a>
                  <a class="btn btn-success btn-sm ms-2" href="/smpn2karanganyar/admin/guru/edit.php?id=<?php echo $d['id']; ?>"><i class="bi bi-pencil"></i></a>
                  <a class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $d['id']; ?>"><i class="bi bi-trash"></i></a>
                </td>
              </tr>

              <!-- Modal Tombol Hapus -->
              <div class="modal fade" id="exampleModal<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data Guru</h5>
                      <button type="button" class="btn-close btn-light rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Apakah anda yakin ingin menghapus data guru ini? Setelah dihapus, anda tidak dapat membatalkan tindakan ini!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                      <a class="btn btn-danger" href="/smpn2karanganyar/admin/guru/hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            	<?php } ?>
            </tbody>
          </table>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <a class="btn btn-secondary" href="<?php echo BASE; ?>admin/daftar_guru.php">
              <i class="bi bi-arrow-left-circle-fill"></i>
              Kembali
            </a>
          </div>


        </div>

      </div>
    </div>

    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
