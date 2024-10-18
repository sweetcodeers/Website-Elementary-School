<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../../login.php");
      die();
  }else {
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
              <img class="me-2" src="<?php echo BASE; ?>media/icons/edit_user.png" alt="" width="40px"> Edit Profil Guru
            </p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
                <li class="breadcrumb-item active">Profil</li>
                <li class="breadcrumb-item active">
                  <a href="<?php echo BASE; ?>admin/daftar_guru.php">Daftar Guru</a>
                </li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Edit Guru</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="card p-4 col-md-10 mx-auto">
          <div class="card-body">

            <?php
              $id = $_GET['id'];
              $data = mysqli_query($dbconn,"SELECT * FROM tb_karyawan WHERE id = '$id'");
              while($d = mysqli_fetch_array($data)){
            ?>
            <form class="row g-3" action="<?php echo BASE; ?>admin/guru/update.php" method="POST">
              <?php
                if(isset($_SESSION['success'])){
              ?>
                <p class="alert alert-success" role="alert">
                  <?php echo $_SESSION['success']; ?>
                </p>
                <?php unset($_SESSION['success']); ?>
              <?php } ?>

              <div class="col-md-5">
                <input type="hidden" name="id" id="id" value="<?php echo $d['id']; ?>">
                <label for="nama" class="form-label">Nama Lengkap <span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d['nama']; ?>">
              </div>
              <div class="col-md-5 ms-5">
                <label for="nip" class="form-label">NIP <span class="text-danger fs-6">*</span></label>
                <input type="number" class="form-control" id="nip" name="nip" value="<?php
                  if( !empty($d['nip']) ){
                    echo $d['nip'];
                  }else{
                    echo "&ensp;&ensp;&ensp;";
                  }; ?>">
              </div>
              <div class="col-md-5 mt-4">
                <label for="mengajar1" class="form-label">Tugas Mengajar 1 <span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="mengajar1" name="mengajar1" value="<?php
                if( !empty($d['tugas_mengajar1']) ){
                  echo $d['tugas_mengajar1'];
                }else{
                  echo "&ensp;&ensp;&ensp;";
                }; ?>">
              </div>
              <div class="col-md-5 ms-5 mt-4">
                <label for="jabatan" class="form-label">Jabatan <span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $d['jabatan']; ?>">
              </div>
              <div class="col-md-5 mt-4">
                <label for="mengajar2" class="form-label">Tugas Mengajar 2 <span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="mengajar2" name="mengajar2" value="<?php
                if( !empty($d['tugas_mengajar2']) ){
                  echo $d['tugas_mengajar2'];
                }else{
                  echo "&ensp;&ensp;&ensp;";
                }; ?>">
              </div>
              <div class="col-md-5 mt-4 ms-5">
                <label for="pangkat" class="form-label">Pangkat <span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php
                  if (!empty($d['pangkat'])) {
                    echo $d['pangkat'];
                  }else {
                    echo "&ensp;&ensp;&ensp;";
                  }
                 ?>">
              </div>
              <div class="col-md-5 mt-4">
                <label for="mengajar2" class="form-label">Tugas Mengajar 2 <span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="mengajar2" name="mengajar2" value="<?php
                if( !empty($d['tugas_mengajar2']) ){
                  echo $d['tugas_mengajar2'];
                }else{
                  echo "&ensp;&ensp;&ensp;";
                }; ?>">
              </div>
              <div class="col-md-5 mt-4 ms-5">
                <label for="unit_kerja" class="form-label">Unit Kerja <span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="<?php echo $d['unit_kerja']; ?>">
              </div>
              <div class="col-md-11 mt-4">
                <label for="kec_unit" class="form-label">Kecamatan Unit Kerja <span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="kec_unit" name="kec_unit" value="<?php echo $d['kec_unit_kerja']; ?>">
              </div>
              <div class="col-md-6 mt-4">
                <button type="submit" class="btn btn-primary rounded-pill" name="simpan" id="simpan">
                  <i class="bi bi-save"></i> Simpan
                </button>
              </div>

              <div class="col-md-6 mt-4 d-md-flex justify-content-md-end">
                <a href="<?php echo BASE; ?>admin/guru/manage.php" class="btn btn-danger rounded-pill">
                  <i class="bi bi-arrow-left-circle-fill"></i> Batal
                </a>
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
