<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../../login.php");
      die();
  } else{
    include '../../path.php';
  }
?>

    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>


    <!-- content -->
    <div class="container-fluid" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="container">
        <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
          <div class="card-body">
            <p class="card-title fs-3 fw-bold">
              <i class="bi bi-person-lines-fill"></i> Profil Guru
            </p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
                <li class="breadcrumb-item active">Profil</li>
                <li class="breadcrumb-item active">
                  <a href="<?php echo BASE; ?>admin/daftar_guru.php">Daftar Guru</a>
                </li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Profil Guru</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="card p-3 col-md-10 mx-auto">
          <div class="card-body">

            <?php
              $id = $_GET['id'];
              $data = mysqli_query($dbconn,"SELECT * FROM tb_karyawan WHERE id = '$id'");
              while($d = mysqli_fetch_array($data)){
            ?>
            <form class="row g-3" action="update.php" method="POST">
              <?php
                if(isset($_SESSION['success'])){
              ?>
                <p class="alert alert-success" role="alert">
                  <?php echo $_SESSION['success']; ?>
                </p>
                <?php unset($_SESSION['success']); ?>
              <?php } ?>

              <div class="col-md-6">
                <input type="hidden" name="id" id="id" value="<?php echo $d['id']; ?>">
                <p for="nama" class="form-label fw-bold">Nama Lengkap</p>
                <p class="form-control"><?php echo $d['nama']; ?> </p>
              </div>
              <div class="col-md-6">
                <p for="nip" class="form-label fw-bold">NIP</p>
                <p class="form-control">
                  <?php
                    if( !empty($d['nip']) ){
                      echo $d['nip'];
                    }else{
                      echo "&ensp;&ensp;&ensp;";
                    }
                  ?>
                </p>
              </div>
              <div class="col-md-6">
                <p for="mengajar" class="form-label fw-bold">Tugas Mengajar</p>
                <p class="form-control">
                  <?php
                    if( !empty($d['tugas_mengajar1']) or !empty($d['tugas_mengajar2']) or !empty($d['tugas_mengajar3']) ){
                      echo $d['tugas_mengajar1']. "<br />";
                      echo $d['tugas_mengajar2']. "<br />";
                      echo $d['tugas_mengajar3'];
                    }else{
                      echo "&ensp;&ensp;&ensp;";
                    }
                  ?>
                </p>
              </div>
              <div class="col-md-6">
                <p for="jabatan" class="form-label fw-bold">Jabatan</p>
                <p class="form-control"><?php echo $d['jabatan']; ?> </p>
              </div>
              <div class="col-md-6">
                <p for="jabatan" class="form-label fw-bold">Pangkat</p>
                <p class="form-control">
                  <?php
                    if( !empty($d['pangkat']) ){
                      echo $d['pangkat'];
                    }else{
                      echo "&ensp;&ensp;&ensp;";
                    }
                  ?>
                </p>
              </div>
              <div class="col-md-6">
                <p for="jabatan" class="form-label fw-bold">Unit Kerja</p>
                <p class="form-control"><?php echo $d['unit_kerja']; ?> </p>
              </div>
              <div class="col-md-12">
                <p for="jabatan" class="form-label fw-bold">Kecamatan Unit Kerja</p>
                <p class="form-control"><?php echo $d['kec_unit_kerja']; ?> </p>
              </div>
              <div class="col-md-4 mt-4">
                <a href="<?php echo BASE; ?>admin/guru/edit.php?id=<?php echo $d['id']; ?>" class="btn btn-primary rounded-pill p-2" name="simpan" id="simpan">
                  <i class="bi bi-pencil-square"></i> Edit Profil
                </a>
              </div>

              <div class="col-md-4 mt-4 d-md-flex justify-content-md-center">
                <a class="btn btn-danger rounded-pill p-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i> Hapus Profil</a>
              </div>

              <div class="col-md-4 mt-4 d-md-flex justify-content-md-end">
                <a href="<?php echo BASE; ?>admin/guru/manage.php" class="btn btn-success rounded-pill p-2">
                  <i class="bi bi-arrow-left-circle-fill"></i> Batal
                </a>
              </div>

              <!-- Modal Tombol Hapus -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <a class="btn btn-danger" href="<?php echo BASE_URL ?>admin/guru/hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
