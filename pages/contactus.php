<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:/Airforce/signin/signin.php");
}
?>
<?php
require_once "../connection/config.php";
$show_success = false;
$show = false;
if (isset($_POST['sendMsg'])) {
  $id = $_SESSION["idses"];
  $email = $_SESSION["emailses"];
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  //
  $insertquery = "INSERT INTO `usercontact`(`id`, `Message`, `Email`) VALUES ('$id ','$message','$email')";
  $res = mysqli_query($conn, $insertquery);
  if ($res) {
    $show_success = true;
    $show = false;
    header('Refresh: 3; URL=http://localhost/AirForce/pages/welcome.php');
  } else {
    $show_success = false;
    $show = true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="command.css" />

  <title>Contact Us</title>
  <link rel="shortcut icon" type="image/jpg" href="../images/favicon.ico" />
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php include "./navbar.php" ?>
  <!--  -->
  <!--  -->
  <!--  -->
  <main class="container mt-2" id="ToTop">

    <?php
    if ($show == true) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <div class='alert alert-danger d-flex align-items-center justify-content-center border-0' role='alert'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
          </svg>
          <div>
            Message sending  failed. Please try again !
          </div>
        </div>
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    }

    ?>
    <?php
    if ($show_success == true) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <div class='alert alert-success d-flex align-items-center justify-content-center border-0' role='alert'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
        <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
        </svg>
          <div>
            Message Sent Successfully!!!
          </div>
          </div>
          <div class='d-flex align-items-center justify-content-center'>
            We will respond to your message as soon as possible.
          </div>
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    }

    ?>

  </main>
  <!--  -->
  <!--  -->
  <!--  -->
  <div class="container mt-3" id="content">
    <div class="bg-light p-5 rounded">
      <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">ID</label>
          <input type="number" class="form-control" id="inputID" value="<?php echo $_SESSION['idses']; ?>" disabled>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" value="<?php echo $_SESSION['emailses']; ?>" disabled>
        </div>

        <div class="input-group">
          <span class="input-group-text">Message</span>
          <textarea class="form-control" style="resize:none" name="message" autocomplete="off" spellcheck="false" aria-label="With textarea" rows="6" required></textarea>
        </div>

        <div class="col-12">
          <button type="submit" name="sendMsg" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <div class="container mt-4 text-center text-white">
    <div class="row">
      <div class="col p-2 bg-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
        </svg> <br> <br>
        <strong>Office Address</strong> <br>
        <p>President,Central Airmen Selection Board Brar Square,Delhi Cantt,New Delhi-110 010</p>
      </div>
      <div class="col p-2" style="background-color: hsl(48, 93%, 48%);">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
        </svg> <br> <br>
        <strong>Phone Number</strong> <br>
        <p>
          Landline 1:(011) 25699606 <br>
          Landline 2:(011) 25694209
        </p>
      </div>
      <div class="col p-2 bg-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
        </svg> <br> <br>
        <strong>Get In Touch With Us</strong>
        <p>
          <strong>casbiaf@cdac.in</strong> <br>
          www.airmenselection.cdac.in <br>
          www.careerindianairforce.cdac.in
        </p>
      </div>
    </div>
  </div>
  <hr>
  <?php include "./footer.php" ?>
</body>

</html>