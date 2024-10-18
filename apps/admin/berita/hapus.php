<?php
  include '../../path.php';
  // if (!isset($_SESSION['username'])){
  //     echo "PERMISSION DENIED!!";
  //     die();
  // }else{
  //
  // }

  // tangkap id melalui url
  $id = $_GET['id'];
  // hapus data dari database
  $sql = "DELETE FROM tb_berita WHERE id='$id'";
  $result = mysqli_query($dbconn, $sql);
  if ($result) {
    session_start();
    $_SESSION['success'] = "Berita telah berhasil dihapus!";
    header('location: /smpn2karanganyar/admin/berita/manage.php');
  }
?>
