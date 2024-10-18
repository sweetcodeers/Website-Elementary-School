<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../../login.php");
      die();
  }else {
    include '../../path.php';

    if (isset($_POST['tambah'])) {
      // menangkap data yang di kirim dari form
      $nama = mysqli_real_escape_string($dbconn, $_POST['nama']);
      $nip  = mysqli_real_escape_string($dbconn, $_POST['nip']);
      $mengajar1 = mysqli_real_escape_string($dbconn, $_POST['mengajar1']);
      $mengajar2 = mysqli_real_escape_string($dbconn, $_POST['mengajar2']);
      $mengajar3 = mysqli_real_escape_string($dbconn, $_POST['mengajar3']);
      $jabatan  = mysqli_real_escape_string($dbconn, $_POST['jabatan']);
      $pangkat = mysqli_real_escape_string($dbconn, $_POST['pangkat']);
      $unit_kerja  = mysqli_real_escape_string($dbconn, $_POST['unit_kerja']);
      $kec_unit = mysqli_real_escape_string($dbconn, $_POST['kec_unit']);

      if (!empty($mengajar1) || !empty($mengajar2) || !empty($mengajar3) ) {
        // Masukan data ke database
        $sql = "INSERT INTO tb_karyawan (
                        nama,
                        nip,
                        tugas_mengajar1,
                        tugas_mengajar2,
                        tugas_mengajar3,
                        jabatan,
                        pangkat,
                        unit_kerja,
                        kec_unit_kerja
                    )VALUES(
                        '$nama',
                        '$nip',
                        '$mengajar1',
                        '$mengajar2',
                        '$mengajar3',
                        '$jabatan',
                        '$pangkat',
                        '$unit_kerja',
                        '$kec_unit'
                    )";
        $result = mysqli_query($dbconn, $sql);
        if($result){
          $_SESSION['success'] = "Guru Berhasil ditambahkan! Silahkan periksa daftar guru <a href='/smpn2karanganyar/admin/daftar_guru.php'>disini</a>";
        }else {
          die(mysqli_error($dbconn));
        }
      }
    }
  }



?>
    <!-- NAVBAR -->
    <?php include(BASE_URL . 'templates/admin/navbar.php'); ?>


    <!-- content -->
    <div class="container" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="row d-flex justify-content-center">
        <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
          <div class="card-body">
            <p class="card-title fs-3 fw-bold">
              <img class="me-2" src="<?php echo BASE; ?>media/icons/person-plus.svg" alt="" width="40px"> Tambah Guru
            </p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
                <li class="breadcrumb-item active">Profil</li>
                <li class="breadcrumb-item active">
                  <a href="<?php echo BASE; ?>admin/daftar_guru.php">Daftar Guru</a></li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Tambah Guru</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="card col-md-10">
          <div class="card-block p-4">
            <form class="row g-3" action="tambah_guru.php" method="POST">
              <?php
                if(isset($_SESSION['success'])){
              ?>
                <p class="alert alert-success" role="alert">
                  <?php echo $_SESSION['success']; ?>
                </p>
                <?php unset($_SESSION['success']); ?>
              <?php } ?>

              <div class="col-md-6">
                <label for=" requirednama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
              <div class="col-md-6">
                <label for="nip" class="form-label">NIP</label>
                <input type="number" class="form-control" id="nip" name="nip" placeholder="892364349">
              </div>
              <div class="col-md-6">
                <label for="mengajar1" class="form-label">Tugas Mengajar 1</label>
                <input type="text" class="form-control" id="mengajar1" name="mengajar1" required>
              </div>
              <div class="col-md-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
              </div>
              <div class="col-md-6">
                <label for="mengajar2" class="form-label">Tugas Mengajar 2</label>
                <input type="text" class="form-control" id="mengajar2" name="mengajar2">
              </div>
              <div class="col-md-6">
                <label for="pangkat" class="form-label">Pangkat</label>
                <input type="text" class="form-control" id="pangkat" name="pangkat">
              </div>
              <div class="col-md-6">
                <label for="mengajar3" class="form-label">Tugas Mengajar 3</label>
                <input type="text" class="form-control" id="mengajar3" name="mengajar3">
              </div>
              <div class="col-md-6">
                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" required>
              </div>
              <div class="col-md-12">
                <label for="kec_unit" class="form-label">Kecamatan Unit Kerja</label>
                <input type="text" class="form-control" id="kec_unit" name="kec_unit" required>
              </div>
              <div class="col-md-6 mt-4">
                <button type="submit" class="btn btn-primary rounded-pill" name="tambah" id="tambah"><i class="bi bi-plus-circle-fill"></i>  Tambah</button>
              </div>

              <div class="col-md-6 mt-4 d-md-flex justify-content-md-end">
                <a href="<?php echo BASE; ?>admin/guru/manage.php" class="btn btn-danger rounded-pill">
                  <i class="bi bi-arrow-left-circle-fill"></i> Batal
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <?php include(BASE_URL . 'templates/footer.php'); ?>
