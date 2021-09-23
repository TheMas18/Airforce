<?php
session_start();
ob_start();
?>
<?php
include "../connection/config.php";
$show_email = false;
$show_pass = false;
if (isset($_POST['login'])) {
  $emailId = mysqli_real_escape_string($conn, $_POST['emailId']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  if ($emailId == "admin@mail.com" && $password == "admin@123") {
    if (isset($_POST['remember'])) {
      setcookie('admincookie', $emailId, time() + 600);
      setcookie('passwordcookie', $password, time() + 600);
      $_SESSION["emailId"] = $emailId;
      header("Location:/Airforce/admin/adminPanel.php");
    } else {
      setcookie('admincookie', $emailId, time() + 600);
      $_SESSION["emailId"] = $emailId;
      header("Location:/Airforce/admin/adminPanel.php");
    }
    // 
  } else {
    // 
    $email_search = "SELECT * FROM `userregisdata` WHERE email='$emailId'";
    $query = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($query);
    if ($email_count) {
      $show_email = false;
      $pass_search = mysqli_fetch_assoc($query);
      $db_pass = $pass_search['password'];
      $_SESSION["username"] = $pass_search['firstName'];
      $_SESSION["idses"] = $pass_search['id'];
      $_SESSION["emailses"] = $pass_search['email'];
      $_SESSION["cityses"] = $pass_search['city'];
      $pass_decode = password_verify($password, $db_pass);
      if ($pass_decode == false) {
        $show_pass = true;
      } else {
        $show_pass = false;
        if (isset($_POST['remember'])) {
          setcookie('emailcookie', $emailId, time() + 600);
          setcookie('passwordcookie', $password, time() + 600);
          header("Location:/Airforce/pages/welcome.php");
        } else {
          header("Location:/Airforce/pages/welcome.php");
        }
      }
    } else {
      $show_email = true;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="signin.css" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <title>Sign In</title>
  <link rel="shortcut icon" type="image/jpg" href="../images/favicon.ico" />
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div class="container mainArea">
    <?php
    if ($show_email == true) {
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <div class='alert alert-warning d-flex align-items-center justify-content-center border-0' role='alert'>
          <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
          </svg>
          <div>
            Incorrect Credentials !
          </div>
        </div>
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    }

    ?>
    <?php
    if ($show_pass == true) {
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <div class='alert alert-warning d-flex align-items-center justify-content-center border-0' role='alert'>
          <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
          </svg>
          <div>
            Incorrect Credentials !
          </div>
        </div>
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    }

    ?>
    <main class="form-signin siginArea">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
      <img src="https://m.media-amazon.com/images/I/71BQbgfeqlL._SY355_.jpg" alt="" width="80" height="80"  class="mt-2" />
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form-floating inputHere">
          <input required type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="emailId" spellcheck="false" autocomplete="off" value="<?php if (isset($_COOKIE['emailcookie'])) {echo $_COOKIE['emailcookie'];} ?>" />
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating inputHere">
          <input required type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" spellcheck="false" autocomplete="off" value="<?php if (isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'];} ?>" />
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" name="remember" value="remember-me" /> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">
          Sign In
        </button>
        <a class="w-100 btn btn-lg btn-warning" href="/Airforce/signup/signup.php" role="button">Sign Up</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
    </main>
  </div>
</body>

</html>