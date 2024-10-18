<?php
  session_start();
  // koneksi database
  include '../../path.php';

  if (isset($_POST['simpan'])) {
    // print_r($_FILES);
    // die();
    if (getimagesize($_FILES['image']['tmp_name']) == false) {
      $_SESSION['default'] = "Anda tidak memperbarui gambar.";
      header("location: /smpn2karanganyar/admin/galeri/manage.php");
      die();
    }else{
      // declare
      $g = $_FILES['image']['tmp_name'];
      $nama  = $_FILES['image']['name'];
      $tipe   = $_FILES['image']['type'];
      $ukuran = $_FILES['image']['size'];
      $data = addslashes(file_get_contents($g));
      $id = $_GET['id'];

      if($ukuran < 5000000){
        $sql = "UPDATE tb_galeri SET
                    nama = '$nama',
                    tipe = '$tipe',
                    ukuran = '$ukuran',
                    data = '$data'
                WHERE id = '$id'
                ";
        $query = mysqli_query($dbconn, $sql);

        if($query){
          $_SESSION['success'] = "Anda berhasil memperbarui gambar! Silahkan cek <a href='/smpn2karanganyar/admin/galeri.php'>disini</a>!";
          header("location: /smpn2karanganyar/admin/galeri/manage.php");
          die();
        }
      }else{
        $_SESSION['error'] = "Ukuran gambar maks. 5 MB!";
        header("location: /smpn2karanganyar/admin/galeri/manage.php");
        die();
      }
    }
  }




?>
