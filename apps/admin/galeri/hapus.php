<?php
  include '../../path.php';
  // tangkap id melalui url
  $id = $_GET['id'];
  // hapus data dari database
  $sql = "DELETE FROM tb_galeri WHERE id='$id'";
  $result = mysqli_query($dbconn, $sql);
  if ($result) {
    session_start();
    $_SESSION['success'] = "Gambar di galeri berhasil dihapus!";
    header('location: /smpn2karanganyar/admin/galeri/manage.php');
  }
?>
