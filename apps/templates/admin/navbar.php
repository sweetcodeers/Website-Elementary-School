<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMP NEGERI 2 KARANGANYAR</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Basic&display=swap" rel="stylesheet">

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


      <style type="text/css">
        body{
          font-family: 'Quicksand', sans-serif;
          font-size: 1.01rem;
        }
        /* NAVBAR */
        .navbar .nav-link{
          font-size: 1.0rem;
        }
        .dropdown-menu{
          background: rgba(255, 255, 255, 0.627);
        }
        .dropdown-item{
          font-size: 0.9rem;
        }
        .dropdown-item:hover{
          background: rgba(0, 0, 0, 0.627);
          font-weight: bold;
          transition: all 0.3s;
        }
        .btn{
          font-size: 0.9rem;
        }

        li a.dropdown-item:hover:visited{
          background: #383838;
          color: white;
        }

        /* HOME */
        .home-content{
          padding-top: 150px;
          padding-left: 50px;
          padding-bottom: 50px;
          color: white;
        }
        .jumbotron {
            background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.7)) , url('/smpn2karanganyar/media/image/home2.jpg');
            background-position: center top;
            background-size: auto;
            height: 60vh;
        }
        .counts{
          margin-top: -150px;
        }
        .little-text{
          font-size: 0.9rem;
        }
        /* VISI & MISI */
        .divider-visimisi{
          /* border-top: 5px solid #FF4500; */
          height: 5px;
          border: none;
          background-color: darkorange;
        }
        /* MAPEL */
        .mapel_page:hover{
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          transition: box-shadow 0.5s;
        }
        img.img-mapel{
          width: 340px;
          height: 240px;
          border-radius: 4px;
        }
        /* EKSKUL */
        .ekskul:hover{
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          transition: box-shadow 0.2s;
        }
        .ekskul img.img-fluid{
          width: 340px;
          height: 240px;
          border-radius: 4px;
        }

      </style>
  </head>
  <body>
    <div class="header" style="margin-bottom: 100px;">
      <nav class="navbar navbar-expand-lg border-0 navbar-light bg-white fixed-top" id="myNav">
        <div class="container-fluid">
          <a class="navbar-brand mb-2" href="<?php echo BASE; ?>admin/#home">
            <img src="<?php echo BASE; ?>/media/icons/logo_sekolah.png" alt="" width="200px" class="ms-3">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
                </a>

                <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="dropdown-item" href="<?php echo BASE; ?>admin/sejarah.php">Sejarah Singkat</a>
                  </li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li>
                    <a class="dropdown-item" href="<?php echo BASE; ?>admin/daftar_guru.php">Guru & Karyawan</a>
                  </li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>admin/struktur.php">Struktur Organisasi</a></li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>admin/visi_misi.php">Visi dan Misi</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Media & Informasi
                </a>
                <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>admin/galeri.php">Galeri</a></li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>admin/berita.php">Berita</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Akademik
                </a>
                <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>admin/ekstrakurikuler.php">Ekstrakurikuler</a></li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>admin/mata_pelajaran.php">Mata Pelajaran</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-grid gap-2 d-md-flex justify-content-md-end mt-0">
              <?php
                  $user_id = $_SESSION['id'];
                  $sql = "SELECT * FROM tb_users WHERE id = '$user_id'";
                  $query = mysqli_query($dbconn, $sql);
                  while ($row = mysqli_fetch_array($query))
                  {
               ?>
               <a class="text-decoration-none text-dark ms-4 fw-bold" href="<?php echo BASE; ?>admin/profil.php">
                 <img src="<?php echo BASE; ?>media/icons/person-circle.svg" alt="" class="mb-1 me-0">
                 <?php echo $row['username']; ?>
               </a>
              <?php } ?>

              <a class="text-decoration-none text-dark ms-1 me-2" href="<?php echo BASE; ?>logout.php" tite="logout">
                <i class="bi bi-box-arrow-in-right me-1"></i>Logout</a>
            </form>
          </div>
        </div>
      </nav>
    </div>
    <script type="text/javascript">
      var myNav = document.getElementById("myNav");

        window.onscroll = function() {
          "use strict";
          if (document.body.scrollTop >= 100 || document.documentElement.scrollTop >= 100) {
            myNav.classList.add("shadow");
          } else {
            myNav.classList.remove("shadow");
          }
        }
    </script>
