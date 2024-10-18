<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location: ../login.php");
    die();
}else {
  include '../path.php';
}
 ?>
    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>

    <div class="container-fluid" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="container">
        <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
          <div class="card-body">
            <p class="card-title fs-2 fw-bold">Struktur Sekolah</p>
            <p class="card-text"> Berikut struktur organisasi disekolah kami ...</p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
                <li class="breadcrumb-item active">Profil</li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Struktur Sekolah</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <div class="row col-md-11 mx-auto">
        <a href="<?php echo BASE; ?>media/image/struktur_sekolah.svg">
          <img class="max-auto" style="width: 100%;" src="<?php echo BASE; ?>media/image/struktur_sekolah.svg" alt="">
        </a>
      </div>

    </div>

    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
