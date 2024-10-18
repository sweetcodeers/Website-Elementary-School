<?php
  session_start();
  include 'path.php';
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username   = mysqli_real_escape_string($dbconn, $_POST['username']);
    $pass       = mysqli_real_escape_string($dbconn, $_POST['password']);

    // encryption password
    // $password   = md5($pass);

    $sql = "SELECT * FROM tb_users
                WHERE username='$username' AND password='$pass'";

    $result = mysqli_query($dbconn, $sql);
    $count = mysqli_num_rows($result);

    // If result matched $username and $password, table row must be 1 row
    if($count > 0) {
      $row = mysqli_fetch_assoc($result);
      // check the code
      // print_r($row['role']);
      // die();
      $_SESSION['ROLE'] = $row['role_id'];
      $_SESSION['IS_LOGIN'] = 'Yes';
      $_SESSION['username'] = $row['username'];
      $_SESSION['id'] = $row['id'];
      if ($row['role_id'] == 1) {
        header("location: /smpn2karanganyar/admin/index.php");
        die();
      }else {
        header("location: login.php?error=Your are not Admin User");
        die();
      }
    }else {
      header("location: login.php?error=Your Username or Password is invalid");
      die();
    }
  }

?>
<!-- NAVBAR -->
<?php include(BASE_URL . 'templates/navbar.php'); ?>
    <div class="jumbotron jumbotron-fluid" style="margin-top: 100px;height: 70vh;">
      <div class="container rounded-3 mx-auto p-5" style="width: 500px;margin-bottom: 100px;padding-top: 100px;background-color:#DBDBDB;">
        <div class="d-flex justify-content-center">
          <img class="card-img-top" src="/smpn2karanganyar/media/icons/person.png" style="width: 100px;" alt="">
        </div>
        <div class="form p-2">
          <p class="fw-bold fs-4 text-center text-muted">ADMIN LOGIN</p>
          <form method="POST" action="login.php">
            <?php
              if(isset($_SESSION['success'])){
            ?>
              <p class="alert alert-success" role="alert">
                <?php echo $_SESSION['success']; ?>
              </p>
              <?php unset($_SESSION['success']); ?>
            <?php } ?>

            <?php if(isset($_GET['error'])){ ?>
              <p class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
              </p>
            <?php } ?>

            <div class="mb-3">
              <input type="text" class="form-control rounded-pill" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="d-grid gap-2">
              <button name="submit" type="submit" class="btn btn-warning rounded-pill">Submit</button>
            </div>

          </form>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <?php require BASE_URL . 'templates/footer.php'; ?>
