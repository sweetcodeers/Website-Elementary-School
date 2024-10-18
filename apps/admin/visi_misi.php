<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location: ../login.php");
    die();
}else{
  include '../path.php';
}
?>

    <!-- Navbar -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>

    <!-- content -->
    <div class="container-fluid">
      <div class="container" style="margin-bottom: 100px;margin-top: 50px;">
        <div class="card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
          <div class="card-body">
            <p class="card-title fs-2 fw-bold">Visi dan Misi</p>
            <p class="card-text">Visi dan misi merupakan elemen yang sangat penting dalam sekolah, dimana visi dan misi digunakan agar dalam operasionalnya bergerak pada track yang diamanatkan oleh para stakeholder dan berharap mencapai kondisi yang diinginkan dimasa yang akan datang sebagai sebuah perwujudan dari tujuan.</p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE; ?>admin/">Home</a></li>
                <li class="breadcrumb-item active">Profil</li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Visi dan Misi</li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="card mb-3 p-4">
          <div class="row g-0">
            <!-- Visi Sekolah -->
            <div class="col-md-4 mb-4">
              <img src="<?php echo BASE; ?>media/image/visi.jpg" class="img-fluid rounded-start" alt="visi image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title fw-bold fs-3">Visi Sekolah</h5>
                <!-- horizontal line/hr -->
                <div class="dropdown-divider mb-4 rounded-pill divider-visimisi" style="width: 15%;"></div>
                <p class="card-text mb-5">Terwujudnya Generasi, berakhlak mulia, kreatif, berbudaya, dan berprestasi</p>
              </div>
            </div>
            <!-- Misi Sekolah -->
            <div class="col-md-7">
              <div class="card-body">
                <h5 class="card-title fw-bold fs-3">Misi Sekolah</h5>
                <!-- horizontal line/hr -->
                <div class="dropdown-divider mb-4 rounded-pill divider-visimisi" style="width: 20%;"></div>
                <ul class="mb-5">
                  <li>Menanamkan karakter religius melalui pembiasaan.</li>
                  <li>Menanamkan perilaku jujur, dan anti korupsi.</li>
                  <li>Mengoptimalkan perilaku dan bimbingan konseling.</li>
                  <li>Meningkatkan profesionalisme guru melalui pendidikan formal, pembinaan dan sertifikasi guru.</li>
                  <li>Menanamkan jiwva kewirausahaan dan ekonomi kreatif</li>
                  <li>Mengembangkan kerja sama pendidikan dan
                  kepramukaan secara global.
                  </li>
                  <li>Mengembbangkan budaya daerah sebagal aset
                  budaya yang adi luhung.
                  </li>
                  <li>Mengembbangkan potensi siswa dalam bidang
                  akademik dan nonakademik.
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-5">
              <img src="<?php echo BASE; ?>media/image/misi.jpg" class="img-fluid rounded-start" alt="misi image">
            </div>
            <!-- Tujuan Sekolah -->
            <div class="col-md-5">
              <img src="<?php echo BASE; ?>media/image/tujuan.jpg" class="img-fluid rounded-start" alt="tujuan image">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <h5 class="card-title fw-bold fs-3" >Tujuan Sekolah</h5>
                <!-- horizontal line/hr -->
                <div class="dropdown-divider mb-4 rounded-pill divider-visimisi" style="width: 25%;"></div>
                <ul>
                  <li>
                    Terbentuknya budaya karakter religi, disiplin anti korupsi,
                    meraih standar ketuntasan belajar 85 % dan kriteria
                    ketuntasan Minimal 2,66.
                  </li>
                  <li>
                    Meraih Prestasi akademik maupun non akademik Minimal
                    tingkat kecamatan.
                  </li>
                  <li>
                    Menuju sekolah yang bertaraf nasional, mencintai budaya daerah sendiri, pemanfaatan IT dan multi media, menumbuhkan kembanggakan jiva kewirausahaan dan
                    ekonomi kreatif.
                  </li>
                  <li>
                    Terbentuknya budaya muto pada setiap unsur sekolah
                    dalam mencapai Visi dan Misi.
                  </li>
                  <li>
                    Terciptanya lingkungan hidup yang sesuai dengan 7 K
                    (keamanan, ketertiban, kebersihan, keindahan kekeluargaan
                    kenyamanan dan kerindangan).
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php require BASE_URL . 'templates/footer.php'; ?>
