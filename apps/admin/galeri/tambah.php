<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: ../../login.php");
      die();
  }else{
    include '../../path.php';
    if (isset($_POST['submit'])) {
      // print_r($_FILES);
      // die();
      if (getimagesize($_FILES['image']['tmp_name']) == false) {
        $_SESSION['default'] = "Anda tidak sedang menambahkan gambar baru!";
        header("location: /smpn2karanganyar/admin/galeri/tambah.php");
        die();
      }else{
        // declare
        $gambar = $_FILES['image']['tmp_name'];
        $nama   = $_FILES['image']['name'];
        $tipe   = $_FILES['image']['type'];
        $ukuran = $_FILES['image']['size'];
        // $data = base64_encode(file_get_contents(addslashes($gambar)));
        $data = addslashes(file_get_contents($gambar));
        $author = mysqli_real_escape_string($dbconn, $_POST['author']);

        $sql = "INSERT INTO tb_galeri(
                            nama,
                            tipe,
                            ukuran,
                            data,
                            author
                          )VALUES(
                            '$nama',
                            '$tipe',
                            '$ukuran',
                            '$data',
                            '$author'
                          )";

        // echo $sql;
        // die();
        $query = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
        if($query){
          $_SESSION['success'] = "Anda berhasil menambahkan gambar baru di Galeri! Silahkan cek <a href='/smpn2karanganyar/admin/galeri.php'>disini</a>!";
          header("location: /smpn2karanganyar/admin/galeri/manage.php");
          die();
        }else{
          $_SESSION['error'] = "Anda gagal menambahkan gambar baru di Galeri!";
          header("location: /smpn2karanganyar/admin/galeri/manage.php");
          die();
        }
      }
    }
  }



?>
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
    <link rel="stylesheet" href="/smpn2karanganyar/media/style/styles.css" />
    <style type="text/css">
      #input{
        padding-left: 150px;
        padding-right: 150px;
        padding-bottom: 160px;
        padding-top: 120px;
        height: 200px;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <!-- NAVBAR -->
    <?php require BASE_URL . 'templates/admin/navbar.php'; ?>

    <!-- content -->
    <div class="container" style="margin-bottom: 100px;margin-top: 50px;">
      <div class="row d-flex justify-content-center mt-100">
        <div class="col-md-12 card rounded-3 border-0 mb-5" style="width: 100%;background-color: #F2F2F2;">
          <div class="card-body">
            <p class="card-title fs-3 fw-bold">
              <img src="/smpn2karanganyar/media/icons/add_gmbr.png" alt="" width="50px"> Tambah Gambar Baru
            </p>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE ?>admin/welcome.php">Home</a></li>
                <li class="breadcrumb-item active">Media & Informasi</li>
                <li class="breadcrumb-item active">
                  <a href="<?php echo BASE; ?>admin/galeri.php">Daftar Gambar</a>
                </li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Tambah Gambar</li>
              </ol>
            </nav>
          </div>
        </div>


        <div class="col-md-10 card">
            <div class="card-block p-4">
              <form action="../galeri/tambah.php" method="POST"  enctype="multipart/form-data" class="row g-0">
                <?php
                  if(isset($_SESSION['default'])){
                ?>
                  <p class="alert alert-warning" role="alert">
                    <?php echo $_SESSION['default']; ?>
                  </p>
                  <?php unset($_SESSION['default']); ?>
                <?php } ?>

                <?php
                  if(isset($_SESSION['error'])){
                ?>
                  <p class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error']; ?>
                  </p>
                  <?php unset($_SESSION['error']); ?>
                <?php } ?>
                <div class="col-md-12 mb-3">
                  <input type="hidden" class="form-control" name="author" id="author" rows="5" value="<?php echo $_SESSION['username']; ?>">
                </div>
                <div class="col-md-12">
                  <p class="card-text text-muted">*upload gambar harus berekstensi .jpeg atau .jpg!</p>
                  <input id="input" class="form-control" type="file" id="image" name="image">
                </div>
                <div class="col-md-6 mt-4">
                  <button class="btn btn-primary rounded-pill" type="submit" name="submit" id="submit">Submit</button>
                </div>
                <div class="col-md-6 mt-4 d-md-flex justify-content-md-end">
                  <a class="btn btn-danger rounded-pill" href="<?php echo BASE; ?>admin/galeri/manage.php">Batal</a>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
