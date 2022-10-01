<?php
session_start();
?>
<?php
require_once "../connection/config.php";
$show_email = false;
$show = false;
if (isset($_POST['register'])) {
  $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
  $emailid = mysqli_real_escape_string($conn, $_POST['emailId']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $city = mysqli_real_escape_string($conn, $_POST['City']);
  $state = mysqli_real_escape_string($conn, $_POST['State']);
  $password = mysqli_real_escape_string($conn, $_POST['Password']);
  // 
  $password_encrypted = password_hash($password, PASSWORD_BCRYPT);
  // 
  $email_query = "SELECT * FROM `userregisdata` WHERE email='$emailid'";
  $duplicate_email = mysqli_query($conn, $email_query);
  $query_mail_present = mysqli_num_rows($duplicate_email);
  // 
  if ($query_mail_present > 0) {
    $show_email = true;
  } else {
    $insertquery = "INSERT INTO `userregisdata`(`firstName`, `lastName`, `email`, `gender`, `city`, `state`, `password`) VALUES ('$firstname','$lastname','$emailid','$gender','$city','$state','$password_encrypted')";
    $res = mysqli_query($conn, $insertquery);
    if ($res) {
      header("Location:/Airforce/signin/signin.php");
    } else {
      $show = false;
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

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <title>Sign Up</title>
  <link rel="shortcut icon" type="image/jpg" href="../images/favicon.ico" />
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <br />
  <div class="container">
    <div class="row justify-content-center">
      <!--  -->
      <!--  -->

      <?php
      if ($show_email == true) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <div class='alert alert-warning d-flex align-items-center justify-content-center border-0' role='alert'>
          <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
          </svg>
          <div>
            Email Already Exists !
          </div>
        </div>
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
      }

      ?>
      <?php
      if ($show == true) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <div class='alert alert-danger d-flex align-items-center justify-content-center border-0' role='alert'>
          <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
          </svg>
          <div>
            User Registration Failed. Please try again !
          </div>
        </div>
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
      }

      ?>

      <!--  -->
      <div class="col-md-6">
        <div class="card m-2">
          <header class="d-flex card-header flex-row justify-content-between">
            <h4 class="card-title mt-2">Sign up</h4>
            <a href="/Airforce/signin/signin.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
          </header>
          <article class="card-body">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
              <div class="form-row">
                <div class="col form-group">
                  <label>First name </label>
                  <input type="text" name="firstName" class="form-control" placeholder="Enter Your FirstName" spellcheck="false" required autocomplete="off" />
                </div>
                <br />
                <!-- form-group end.// -->
                <div class="col form-group">
                  <label>Last name</label>
                  <input type="text" name="lastName" class="form-control" placeholder="Enter Your LastName" spellcheck="false" required autocomplete="off" />
                </div>
                <br />
                <!-- form-group end.// -->
              </div>
              <!-- form-row end.// -->
              <div class="form-group">
                <label>Email address</label>
                <input type="email" name="emailId" class="form-control" placeholder="Enter Your EmailID" spellcheck="false" required autocomplete="off" />
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <br />
              <!-- form-group end.// -->
              <div class="form-group">
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="Male" />
                  <span class="form-check-label"> Male </span>
                </label>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="Female" />
                  <span class="form-check-label"> Female</span>
                </label>
              </div>
              <br />
              <!-- form-group end.// -->
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>City</label>
                  <input type="text" name="City" spellcheck="false" class="form-control" placeholder="City Name" autocomplete="off" />
                </div>
                <br />
                <!-- form-group end.// -->
                <div class="form-group col-md-6">
                  <!-- <label>State</label> -->
                  <label for="exampleDataList" class="form-label">State</label>
                  <input class="form-control" name="State" spellcheck="false" list="datalistOptions" id="exampleDataList" placeholder="Select State" />
<!--                   <datalist id="datalistOptions">
                    <option value="Maharashtra"></option>
                    <option value="Telengana"></option>
                    <option value="Karnataka"></option>
                    <option value="Kerela"></option>
                    <option value="Nagaland"></option>
                    <option value="Mizoram"></option>
                    <option value="Madhya Pradesh"></option>
                    <option value="Arunachal Pradesh"></option>
                    <option value="Bihar"></option>
                    <option value="Goa"></option>
                    <option value="West Bengal"></option>
                    <option value="Chhattisgarh"></option>
                    <option value="Gujarat"></option>
                    <option value="Uttar Pradesh"></option>
                    <option value="Himachal Pradesh"></option>
                    <option value="Jharkhand"></option>
                    <option value="Manipur"></option>
                    <option value="Rajasthan"></option>
                    <option value="Andra Pradesh"></option>
                    <option value="Orrissa"></option>
                    <option value="Assam"></option>
                    <option value="New Delhi"></option>
                    <option value="Haryana"></option>
                    <option value="Punjab"></option>
                    <option value="Jammu And Kashmir"></option>
                    <option value="Meghalaya"></option>
                    <option value="Sikkim"></option>
                    <option value="Tamil Nadu"></option>
                    <option value="Tripura"></option>
                  </datalist> -->
                </div>
                <br />
                <!-- form-group end.// -->
              </div>
              <!-- form-row.// -->
              <div class="form-group">
                <label>Create password</label>
                <input name="Password" placeholder="Create Password" class="form-control" type="password" required spellcheck="false" autocomplete="off" />
              </div>
              <br />
              <!-- form-group end.// -->
              <div class="form-group">
                <button type="submit" name="register" class="btn btn-primary btn-block">
                  Register
                </button>
              </div>
              <!-- form-group// -->
            </form>
          </article>
          <!-- card-body end .// -->
        </div>
        <!-- card.// -->
      </div>
      <!-- col.//-->
    </div>
    <!-- row.//-->
  </div>
</body>

</html>

<!--  -->
<!--  -->
<!--  -->
