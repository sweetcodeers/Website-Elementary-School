<?php
  session_start();
  include '../../path.php';
  if (isset($_POST['simpan'])) {
    // Panggil $_SESSION login
    $user_id = $_SESSION['id'];

    // tangkap data yg dipost
    $pass_konfirm = mysqli_real_escape_string($dbconn, $_POST['pass_konfirm']);
    $pass_baru = mysqli_real_escape_string($dbconn, $_POST['pass_baru']);

    // validate password
    $validate = "#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";

    // check new password & confirm password
    if (empty($pass_baru) && empty($pass_konfirm)) {
      $_SESSION['default'] = "Anda tidak memperbarui password";
      header('Location: /smpn2karanganyar/admin/profil/ubah_pass.php');
      die();
    }elseif ($pass_baru !== $pass_konfirm) {
      $_SESSION['error'] = "Kedua password (password baru & password konfirmasi) harus sama!";
      header('Location: /smpn2karanganyar/admin/profil/ubah_pass.php');
      die();
    }elseif(!preg_match($validate, $pass_baru)){
      $_SESSION['error'] = "Password harus memiliki panjang min. 8 karakter dan harus berisi setidaknya satu angka, satu huruf besar, satu huruf kecil, dan satu karakter khusus.";
      header('Location: /smpn2karanganyar/admin/profil/ubah_pass.php');
      die();
    }
    else{
      // encryption
      $encry_baru = md5($pass_baru);
      $encry_konfirm = md5($pass_konfirm);

      $sql = "UPDATE tb_users SET
                        password='$encry_baru'
                    WHERE id='$user_id'";
      $result = mysqli_query($dbconn, $sql);
      if ($result) {
        $_SESSION['success'] = "Password baru anda berhasil diperbarui!";
        // Redirect to the login page:
        header('Location: /smpn2karanganyar/logout.php');
        die();
      }
    }
  }
