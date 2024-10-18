<?php
  session_start();
  // koneksi database
  include '../../path.php';
  if (isset($_POST['simpan'])) {
    // menangkap data yang di kirim dari form
    $id = mysqli_real_escape_string($dbconn, $_POST['id']);
    $judul = mysqli_real_escape_string($dbconn, $_POST['judul']);
    $konten  = mysqli_real_escape_string($dbconn, $_POST['konten']);
    $author = mysqli_real_escape_string($dbconn, $_POST['author']);
    $gambar = $_FILES['gambar_new']['tmp_name'];
    $data = addslashes(file_get_contents($gambar));

    if (getimagesize($_FILES['gambar_new']['tmp_name']) == false) {
      $sql = "UPDATE tb_berita SET
                  judul = '$judul',
                  konten = '$konten',
                  author = '$author'
              WHERE id = '$id'
              ";
      $result = mysqli_query($dbconn, $sql);
      if($result){
        $_SESSION['success'] = "Berita berhasil diperbarui silahkan cek <a href='/smpn2karanganyar/admin/berita/display.php?id=$id'>disini</a>";
        header("location: /smpn2karanganyar/admin/berita/manage.php");
        die();
      }
    }
    else
    {
      $sql = "UPDATE tb_berita SET
                  judul = '$judul',
                  konten = '$konten',
                  author = '$author',
                  gambar = '$data'
              WHERE id = '$id'
              ";
      $result = mysqli_query($dbconn, $sql);
      if($result){
        $_SESSION['success'] = "Berita berhasil diperbarui silahkan cek <a href='/smpn2karanganyar/admin/berita/display.php?id=$id'>disini</a>";
        header("location: /smpn2karanganyar/admin/berita/manage.php");
        die();
      }
    }


  }
