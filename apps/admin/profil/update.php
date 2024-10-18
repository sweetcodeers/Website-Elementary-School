<?php
  session_start();
  include '../../path.php';

  if(isset($_POST['simpan'])){
    $user_id = $_SESSION['id'];

    $username = mysqli_real_escape_string($dbconn, $_POST['username']);
    $nama = mysqli_real_escape_string($dbconn, $_POST['nama']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $jenis_kelamin = mysqli_real_escape_string($dbconn, $_POST['jenis_kelamin']);
    $tanggal_lahir = mysqli_real_escape_string($dbconn, $_POST['tanggal_lahir']);
    $no_telepon = mysqli_real_escape_string($dbconn, $_POST['no_telepon']);
    $alamat = mysqli_real_escape_string($dbconn, $_POST['alamat']);

    $gambar = $_FILES['gambar']['tmp_name'];
    $data = addslashes(file_get_contents($gambar));

    if (empty($_FILES['gambar']['tmp_name']))
    {
      $sql = "UPDATE tb_users SET
                       username = '$username',
                       nama = '$nama',
                       email = '$email',
                       jenis_kelamin = '$jenis_kelamin',
                       tanggal_lahir = '$tanggal_lahir',
                       no_telepon = '$no_telepon',
                       alamat = '$alamat'
                  WHERE id = '$user_id'";

      $result = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
      if ($result) {
        $_SESSION['success'] = "Profil user berhasil diperbarui!";
        header('location: /smpn2karanganyar/admin/profil.php');
        die();
      }else {
        $_SESSION['error'] = "Profil user gagal diperbarui!";
        header('location: /smpn2karanganyar/admin/profil/edit.php');
        die();
      }
    }
    else
    {
      $sql = "UPDATE tb_users SET
                       username = '$username',
                       nama = '$nama',
                       email = '$email',
                       jenis_kelamin = '$jenis_kelamin',
                       tanggal_lahir = '$tanggal_lahir',
                       no_telepon = '$no_telepon',
                       alamat = '$alamat',
                       foto_profil = '$data'
                  WHERE id = '$user_id'";

      $result = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
      if ($result) {
        $_SESSION['success'] = "Profil user berhasil diperbarui!";
        header('location: /smpn2karanganyar/admin/profil.php');
        die();
      }else {
        $_SESSION['error'] = "Profil user gagal diperbarui!";
        header('location: /smpn2karanganyar/admin/profil/edit.php');
        die();
      }
    }

  }


?>
