<?php
  session_start();
  // koneksi database
  include '../../path.php';
  if(isset($_POST['simpan'])) {
    // menangkap data yang di kirim dari form
    $id = mysqli_real_escape_string($dbconn, $_POST['id']);
    $nama = mysqli_real_escape_string($dbconn, $_POST['nama']);
    $nip  = mysqli_real_escape_string($dbconn, $_POST['nip']);
    $mengajar1 = mysqli_real_escape_string($dbconn, $_POST['mengajar1']);
    $mengajar2 = mysqli_real_escape_string($dbconn, $_POST['mengajar2']);
    $mengajar3 = mysqli_real_escape_string($dbconn, $_POST['mengajar3']);
    $jabatan  = mysqli_real_escape_string($dbconn, $_POST['jabatan']);
    $pangkat = mysqli_real_escape_string($dbconn, $_POST['pangkat']);
    $unit_kerja  = mysqli_real_escape_string($dbconn, $_POST['unit_kerja']);
    $kec_unit = mysqli_real_escape_string($dbconn, $_POST['kec_unit']);

    if (!empty($mengajar1) || !empty($mengajar2) || !empty($mengajar3)) {
      //  Update data ke database
      $sql = "UPDATE tb_karyawan SET
                  nama = '$nama',
                  nip = '$nip',
                  tugas_mengajar1 = '$mengajar1',
                  tugas_mengajar2 = '$mengajar2',
                  tugas_mengajar3 = '$mengajar3',
                  jabatan = '$jabatan',
                  pangkat = '$pangkat',
                  unit_kerja = '$unit_kerja',
                  kec_unit_kerja = '$kec_unit'
              WHERE id = '$id'
              ";
      $result = mysqli_query($dbconn, $sql);
      if($result){
        session_start();
        $_SESSION['success'] = "Profil guru berhasil di update!";
        header("location: /smpn2karanganyar/admin/guru/display.php?id=$id");
      }else {
        echo mysqli_error($dbconn);
        die();
      }
    }
  }
  // else {
  //   die(mysqli_error($dbconn));
  // }




?>
