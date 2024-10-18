<?php
  include('path.php');
?>
    <!-- NAVBAR -->
    <?php include(BASE_URL . 'templates/navbar.php'); ?>
    <!-- content -->
    <div class="container-fluid" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="container">
        <div class="card rounded-3 border-0 mb-5" style="background-color: #F2F2F2;">
          <div class="card-body">
            <p class="card-title fs-2 fw-bold">Daftar Guru dan Karyawan Sekolah</p>
            <p class="card-text"> Berikut daftar guru dan karyawan disekolah kami ...</p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>">Home</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page">Profil</li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Daftar Guru & Karyawan</li>
              </ol>
            </nav>
          </div>
        </div>

        <table id="example" class="table table-bordered table-striped">
          <thead class="text-center">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
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
              <td class="text-center"><?php echo $no++; ?></td>
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
          <?php } ?>
          </tbody>

        </table>
      </div>
    </div>

    <!-- FOOTER -->
    <?php include(BASE_URL . 'templates/footer.php'); ?>
