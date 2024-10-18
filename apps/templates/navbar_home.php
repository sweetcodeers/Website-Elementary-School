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

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- styling -->
    <link rel="stylesheet" href="<?php echo BASE; ?>media/style/styles.css" />
    <style type="text/css">
      html{scroll-behavior: smooth;}
      body{
        font-family: 'Quicksand', sans-serif;
        font-size: 1.01rem;
      }
      /* NAVBAR */
      li a.dropdown-item:hover:visited{
        background: #383838;
        color: white;
      }
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
      .dropdown-item{
        color: black;
      }
      /* HOME */
      .home-content{
        padding-top: 200px;
        padding-left: 50px;
        color: white;
      }
      #home{
          background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.6)) , url('/smpn2karanganyar/media/image/home2.jpg');
          background-position: center top;
          background-size: auto;
          height: 70vh;
      }
      .divider-page0{
        height: 6px;
        border: none;
        background-color: #ffcb12;
        position: absolute;
        right: 0px;
      }
      .divider-page1{
        height: 6px;
        border: none;
        background-color: #ffcb12;
        position: absolute;
        left: 0px;
      }
      .divider-page2{
        position: absolute;
        right: 0px;
        height: 6px;
        border: none;
        background-color: #202728;
      }
      a.btn-mapel{
        background-color:#ECECEC;
        color: black;
      }
      a.btn-mapel:active{
        color: black;
        border: 3px solid #ECECEC;
      }
      .content_mapel{
        background-color: #F2F2F2;
        border: 0.5px solid lightgrey;
      }
      .content_mapel:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: box-shadow 0.2s;
      }
      #eks{
        border-radius: 3%;
      }
      #eks:hover{
        transform: scale(1.01);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: transform 0.4s;
      }
      /* MAPEL */
      .mapel:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: box-shadow 0.5s;
      }
      img.img-fluid{
        width: 340px;
        height: 240px;
        border-radius: 4px;
      }
      /* VISI & MISI */
      .divider-visimisi{
        /* border-top: 5px solid #FF4500; */
        height: 5px;
        border: none;
        background-color: darkorange;
      }
      /* BERITA */
      img.img-fluid{
        width: 340px;
        height: 240px;
        border-radius: 4px;
      }
      .berita-img {
          border-radius: 4px;
      }
      .berita-img:hover{
        transform: scale(1.01);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: transform 0.4s;
      }
      /* EKSKUL */
      .ekskul:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: box-shadow 0.2s;
      }
      img.img-fluid{
        width: 340px;
        height: 240px;
        border-radius: 4px;
      }

      /* GALERI */
      .zoom:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition: transform 0.3s;
      }
      .modal-header {
        border-bottom: none;
      }
      .modal-title {
          color:#000;
      }
      .modal-footer{
        display:none;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <nav class="navbar navbar-expand-lg border-0 navbar-light bg-white fixed-top" id="myNav">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo BASE; ?>#home">
            <a class="navbar-brand mb-2" href="<?php echo BASE; ?>#home">
              <img src="<?php echo BASE; ?>/media/icons//logo_sekolah.png" alt="" width="200px" class="ms-3">
            </a>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0" style="font-size: 1rem;">
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
                </a>

                <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>sejarah.php">Sejarah Singkat</a></li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li>
                    <a class="dropdown-item" href="<?php echo BASE; ?>daftar_guru.php">Guru & Karyawan</a>
                  </li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>struktur.php">Struktur Organisasi</a></li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>visi_misi.php">Visi dan Misi</a></li>
                </ul>
              </li>



              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Media & Informasi
                </a>
                <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>galeri.php">Galeri</a></li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>berita.php">Berita</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Akademik
                </a>
                <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>ekstrakurikuler.php">Ekstrakurikuler</a></li>
                  <li><hr class="dropdown-divider bg-dark"></li>
                  <li><a class="dropdown-item" href="<?php echo BASE; ?>mata_pelajaran.php">Mata Pelajaran</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-grid gap-2 d-md-flex justify-content-md-end mt-1">
              <a class="btn btn-dark me-1 ms-4  btn-sm rounded" href="<?php echo BASE; ?>login.php">Login</a>
              <a class="btn btn-warning me-2 btn-sm rounded" href="<?php echo BASE; ?>#contact">Contact</a>
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
