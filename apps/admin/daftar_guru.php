<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../login.php");
      die();
  }else {
    include '../path.php';
  }
?>
    <!-- NAVBAR -->
    <?php include(BASE_URL . 'templates/admin/navbar.php'); ?>


    <!-- content -->
    <div class="container" style="margin-top: 50px;margin-bottom: 100px;">
      <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
        <div class="card-body p-4">
          <p class="card-title fs-3 fw-bold">
            <img class="me-2" src="<?php echo BASE; ?>media/icons/list_teacher.png" alt="" width="60px"> Daftar Guru
          </p>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
              <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Daftar Guru</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card rounded-3 p-3">
        <div class="card-body">
          <a href="../admin/guru/tambah_guru.php" class="btn btn-warning mb-4">
            <img src="<?php echo BASE; ?>media/icons/person-plus.svg" alt="" width="20px"> Guru Baru
          </a>
          <a href="<?php echo BASE; ?>admin/guru/manage.php" class="ms-2 btn btn-warning mb-4">
            <img src="<?php echo BASE; ?>media/icons/manage.png" alt="" width="18px"> Manage Guru
          </a>

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
              <tr class="text-center p-5 align-middle">
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">NIP</th>
                <th scope="col">Tugas Mengajar</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Pangkat/Gol</th>
                <th scope="col">Unit Kerja</th>
                <th scope="col">Kecamatan Unit Kerja</th>
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
                <td>
                  <?php
                    echo $d['nama'];
                  ?>
                </td>
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
                <td>
                  <?php
                    if( !empty($d['tugas_mengajar1']) or !empty($d['tugas_mengajar2']) or !empty($d['tugas_mengajar3']) ){
                      echo $d['tugas_mengajar1']. "<br />";
                      echo $d['tugas_mengajar2']. "<br />";
                      echo $d['tugas_mengajar3'];
                    }else{
                      echo "<p class='text-center'>
                        -
                      </p>";
                    }
                  ?>
                </td>
                <td><?php echo $d['jabatan']; ?></td>
                <td>
                  <?php
                    if( !empty($d['pangkat']) ){
                      echo $d['pangkat'];
                    }else{
                      echo "<p class='text-center'>
                        -
                      </p>";
                    }
                  ?>
                </td>
                <td><?php echo $d['unit_kerja']; ?></td>
                <td><?php echo $d['kec_unit_kerja']; ?></td>
              </tr>

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
                      <a class="btn btn-danger" href="<?php echo BASE; ?>admin/guru/hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
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

    <!-- FOOTER -->
    <?php include(BASE_URL . 'templates/footer.php'); ?>
