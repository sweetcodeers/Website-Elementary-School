<?php
  include '../../konfigurasi/connect.php';
  // if (!isset($_SESSION['username'])){
  //     echo "PERMISSION DENIED!!";
  //     die();
  // }else{
  //
  // }

  // tangkap id melalui url
  $id = $_GET['id'];
  // echo $id;
  // die();
  // hapus data dari database
  $sql = "DELETE FROM tb_karyawan WHERE id='$id'";
  $result = mysqli_query($dbconn, $sql);
  if ($result) {
    session_start();
    $_SESSION['success'] = "Data guru berhasil dihapus!";
    header('location: /smpn2karanganyar/admin/daftar_guru.php');
  }
?>
