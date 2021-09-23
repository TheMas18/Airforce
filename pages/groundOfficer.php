<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:/Airforce/signin/signin.php");
}
?>
<?php
$show_success = false;
$show_glasses = false;
$show_failure = false;
$show_application = false;
$show_identity = false;
$show_application_failure = false;
include "../connection/config.php";
//
if (isset($_POST['checkEligibility'])) {
  // 
  $emailid = $_SESSION['emailses'];
  // 
  $height = mysqli_real_escape_string($conn, $_POST['height']);
  $weight = mysqli_real_escape_string($conn, $_POST['weight']);
  // 
  $ssc = mysqli_real_escape_string($conn, $_POST['ssc']);
  $sscOut = mysqli_real_escape_string($conn, $_POST['sscOUT']);
  // 
  $hsc = mysqli_real_escape_string($conn, $_POST['hsc']);
  $hscOut = mysqli_real_escape_string($conn, $_POST['hscOUT']);
  //
  $hscEng = mysqli_real_escape_string($conn, $_POST['hscEng']);
  $hscEngOut = mysqli_real_escape_string($conn, $_POST['hscEngOUT']);
  // 
  $hscPhy = mysqli_real_escape_string($conn, $_POST['hscPhy']);
  $hscPhyOut = mysqli_real_escape_string($conn, $_POST['hscPhyOUT']);
  // 
  // 
  $city = $_SESSION['cityses'];
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  //
  if (!isset($_POST['glasses']) && !isset($_POST['glassesPOWER'])) {
    $show_glasses = true;
  } else {
    if ($ssc <= $sscOut && $hsc <= $hscOut && $hscEng <= $hscEngOut && $hscPhy <= $hscPhyOut) {
      function get_percentage($total, $number)
      {
        if ($total > 0) {
          return round(($number * 100) / $total, 2);
        } else {
          return 0;
        }
      }
      $sscPerc = get_percentage($sscOut, $ssc);
      $hscPerc = get_percentage($hscOut, $hsc);
      $hscEngPerc = get_percentage($hscEngOut, $hscEng);
      $hscPhyPerc = get_percentage($hscPhyOut, $hscPhy);
      $glasses = mysqli_real_escape_string($conn, $_POST['glasses']);
      $glassesPOWER = mysqli_real_escape_string($conn, $_POST['glassesPOWER']);
      if (($glasses == 1 && $glassesPOWER == 1) || ($glasses == 0 && $glassesPOWER == 0)) {
        if (($sscPerc >= 60 && $sscPerc <= 100) && ($hscPerc >= 60 && $hscPerc <= 100) && ($hscEngPerc >= 60 && $hscEngPerc <= 100) && ($hscPhyPerc >= 60 && $hscPhyPerc <= 100)) {
          if ($height >= 173 && ($weight >= 60 && $weight <= 90)) {
            if ($age >= 19 && $age <= 23) {
              $show_success = true;
            } else {
              $show_failure = true;
            }
          } else {
            $show_failure = true;
          }
        } else {
          $show_failure = true;
        }
      } else {
        $show_failure = true;
      }
    } else {
      $show_glasses = false;
    }
  }
}
// 
// 
if (isset($_POST['submitEligibility'])) {
  // 
  $emailid = $_SESSION['emailses'];
  // 
  $height = mysqli_real_escape_string($conn, $_POST['height']);
  $weight = mysqli_real_escape_string($conn, $_POST['weight']);
  // 
  $ssc = mysqli_real_escape_string($conn, $_POST['ssc']);
  $sscOut = mysqli_real_escape_string($conn, $_POST['sscOUT']);
  // 
  $hsc = mysqli_real_escape_string($conn, $_POST['hsc']);
  $hscOut = mysqli_real_escape_string($conn, $_POST['hscOUT']);
  //
  $hscEng = mysqli_real_escape_string($conn, $_POST['hscEng']);
  $hscEngOut = mysqli_real_escape_string($conn, $_POST['hscEngOUT']);
  // 
  $hscPhy = mysqli_real_escape_string($conn, $_POST['hscPhy']);
  $hscPhyOut = mysqli_real_escape_string($conn, $_POST['hscPhyOUT']);
  // 
  $graduation = 0;
  // 
  $city = $_SESSION['cityses'];
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  //
  if (!isset($_POST['glasses']) && !isset($_POST['glassesPOWER'])) {
    $show_glasses = true;
  } else {
    if ($ssc <= $sscOut && $hsc <= $hscOut && $hscEng <= $hscEngOut && $hscPhy <= $hscPhyOut) {
      function get_percentage($total, $number)
      {
        if ($total > 0) {
          return round(($number * 100) / $total, 2);
        } else {
          return 0;
        }
      }
      $sscPerc = get_percentage($sscOut, $ssc);
      $hscPerc = get_percentage($hscOut, $hsc);
      $hscEngPerc = get_percentage($hscEngOut, $hscEng);
      $hscPhyPerc = get_percentage($hscPhyOut, $hscPhy);
      $glasses = mysqli_real_escape_string($conn, $_POST['glasses']);
      $glassesPOWER = mysqli_real_escape_string($conn, $_POST['glassesPOWER']);
      if (($glasses == 1 && $glassesPOWER == 1) || ($glasses == 0 && $glassesPOWER == 0)) {
        if (($sscPerc >= 60 && $sscPerc <= 100) && ($hscPerc >= 60 && $hscPerc <= 100) && ($hscEngPerc >= 60 && $hscEngPerc <= 100) && ($hscPhyPerc >= 60 && $hscPhyPerc <= 100)) {
          if ($height >= 173 && ($weight >= 60 && $weight <= 90)) {
            if ($age >= 19 && $age <= 23) {
              $show_application = true;
              $candidateID = $_SESSION['idses'];
              $Application = "Pending";
              $JobDesc = "Ground Officer";
              // 
              $identity_query = "SELECT * FROM `applicationusers` WHERE candidateID='$candidateID'";
              $duplicate_identity = mysqli_query($conn, $identity_query);
              $query_identity_present = mysqli_num_rows($duplicate_identity);
              $job_query = "SELECT * FROM `applicationusers` WHERE Application='$Application'";
              $result = mysqli_query($conn, $job_query);
              $matchFound = mysqli_num_rows($result) > 0 ? 'yes' : 'no';
              //  
              $resArr = mysqli_fetch_array($duplicate_identity);
              // 
              if ($query_identity_present > 0 && $matchFound === "yes") {
                $show_identity = true;
                $show_application = false;
              } else {
                $insertquery = "INSERT INTO `applicationusers`( `candidateID`, `email`, `height`, `weight`, `ssc`, `hsc`, `hscENG`, `hscPHY`, `Grad`, `Glasses`, `Application`,`JobDesc`) VALUES ('$candidateID','$emailid','$height','$weight','$sscPerc','$hscPerc','$hscEngPerc','$hscPhyPerc','$graduation','$glasses','$Application','$JobDesc')";
                $res = mysqli_query($conn, $insertquery);
                if ($res) {
                  $show_application = true;
                } else {
                  $show_application_failure = true;
                }
              }
            } else {
              $show_failure = true;
            }
          } else {
            $show_failure = true;
          }
        } else {
          $show_failure = true;
        }
      } else {
        $show_failure = true;
      }
    } else {
      $show_glasses = false;
    }
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

  <title>Ground Commando
  </title>
  <link rel="shortcut icon" type="image/jpg" href="../images/favicon.ico" />

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php include "./navbar.php" ?>
  <!--  -->
  <!--  -->
  <!--  -->
  <script>
    function myFunction(destination) {
      var elmnt = document.getElementById(destination);
      elmnt.scrollIntoView();
    }
  </script>
  <main class="container mt-2" id="ToTop">

    <div class="bg-light p-5 rounded">
      <h1>Ground Officer</h1>
      <p class="lead">
      <h3> As an officer in the Ground Duty (Technical) Branch, you propel and manage your team to ensure that the Indian Air Force remains airworthy. You would be in charge of some of the most sophisticated equipment in the world by joining one of the sub branches based on your qualification.
      </h3>
      </p>
      <a class="btn btn-lg btn-primary" onclick='myFunction("content")' role="button">Check Eligibility »</a>
    </div>
  </main>
  <div class="container mt-2">
    <?php
    if ($show_success == true) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <div class='alert alert-success d-flex align-items-center justify-content-center border-0' role='alert'>
      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
      <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
      <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
      </svg>
        <div>
        &nbsp;
        <strong>Congratulations!!!</strong> You are eligible.
        </div>
        </div>
        <div class='alert alert-success d-flex align-items-center justify-content-center border-0' role='alert'>
        Click On <strong>&nbsp;Apply Now&nbsp;</strong> Button to apply for this post!!!
        </div>
      <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>
    <?php
    if ($show_application == true) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <div class='alert alert-success d-flex align-items-center justify-content-center border-0' role='alert'>
      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
      <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
      <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
      </svg>
        <div>
        &nbsp;
        <strong>Application Submitted Successfully</strong>
        </div>
        </div>
        <div class='alert alert-success d-flex align-items-center justify-content-center border-0' role='alert'>
        Your Application is now <strong>&nbsp;Under Scrutiny</strong>.&nbsp;You will be contacted as your application get <strong>&nbsp;Verified</strong>.
        </div>
      <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>
    <?php
    if ($show_glasses == true) {
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <div class='alert alert-warning d-flex align-items-center justify-content-center border-0' role='alert'>
      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
      <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
      </svg>
      <div>
      &nbsp;
      <strong>Please Fill The Form With Required Correct Information</strong>
      </div>
      </div>
      <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>
    <?php
    if ($show_application_failure == true) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <div class='alert alert-danger d-flex align-items-center justify-content-center border-0' role='alert'>
      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
      <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/>
      </svg>
      <div>
      &nbsp;
      <strong>Application Submission Failed</strong>
      </div>
      </div>
      <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>
    <?php
    if ($show_failure == true) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <div class='alert alert-danger d-flex align-items-center justify-content-center border-0' role='alert'>
      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
      <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/>
      </svg>
      <div>
      &nbsp;
      <strong>SORRY</strong> you are not eligible.
        </div>
        </div>
        <div class='alert alert-danger d-flex align-items-center justify-content-center border-0' role='alert'>
        You can check out other <strong>&nbsp;DEPARTMENT POSTS&nbsp;</strong> and check your eligibility.
        </div>
      <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }

    ?>
    <?php
    if ($show_identity == true) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <div class='alert alert-danger d-flex align-items-center justify-content-center border-0' role='alert'>
      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
      <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/>
      </svg>
      <div>
      &nbsp;
      <strong>SORRY</strong> you are not eligible.
        </div>
        </div>
        <div class='alert alert-danger d-flex align-items-center justify-content-center border-0' role='alert'>
        It looks like you already applied to a<strong>&nbsp;DEPARTMENT POST&nbsp;</strong>
        </div>
      <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }

    ?>
  </div>

  <!--  -->
  <!--  -->
  <!--  -->
  <div class="container mt-3">
    <div class="bg-light p-5 rounded">
      <h1> GROUND DUTY (NON-TECHNICAL)BRANCHES</h1><br>
      <h5>(For Graduates/Post Graduates)</h5><br>
      <h5>Managing human and material resources, the Ground Duty (Non-technical) Branch is the mechanism that steers the Indian Air Force.
      </h5><br>
      <h4>GENERAL ELIGIBILITY CRITERIA For Ground Duty (Non-technical) Branches</h4><br>
      <ul type="circle">
        <li style="margin: 40px; margin-top:-10px;">Age - 20 to 26 Years for Graduates and Post Graduates (at the time of commencement of course).</li>
        <li style="margin: 40px; margin-top:-10px;">Marital Status - Candidates below the age of 25 years must be Unmarried.</li>
        <li style="margin: 40px; margin-top:-10px;"> Nationality - Indian.</li>
        <li style="margin: 40px; margin-top:-10px;"> Gender - Both men and women.</li>
      </ul>
      <h5>As a Graduate/Post Graduate you can join as an officer in any of the following Ground Duty (Non-technical) Branches.
      </h5>


      <h1> ADMINISTRATION BRANCH</h1>
      <ul type="disc">

        <li>Permanent Commission (for Men)/Short Service Commission (for Men & Women)</li>
        <li> Responsible for the efficient management of both human and material resources. Some of the officers of the Administration Branch are selected and trained to carry out the following duties also:
        </li>
        <ul type="circle">
          <li>Air Traffic Controller – Involves maintaining an orderly flow of traffic and airspace management.</li>
          <li>Fighter Controller – Performs the job of directing Fighter Aircraft and Weapon Systems against enemy in various Air Operations while ensuring Air Defence of the nation using Radar Networks.
          </li>
        </ul>
      </ul>
    </div>
  </div>


  <div class="container mt-3" id="content">
    <div class="bg-light p-5 rounded">
      <form class="row g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label"><strong>Email</strong></label>
          <input type="email" class="form-control" name="mail" id="inputEmail" value="<?php echo $_SESSION['emailses']; ?>" disabled>
        </div>
        <div class="col-12">
          <strong for="Qualification" class="form-label">Physical Fitness Requirements</strong> <br>
          <small for="inputHeight" class="form-label">Height</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="height" id="inputHeight" placeholder="Input Height(in cms)">
        </div>
        <div class="col-12">
          <small for="inputWeight" class="form-label">Weight</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="weight" id="inputWeight" placeholder="Input Weight(in kgs)">
        </div>
        <hr>
        <div class="col-md-6">
          <strong for="Qualification" class="form-label">Qualifications</strong> <br>
          <small for="inputSsc" class="form-label">SSC GRADES</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="ssc" id="inputSsc" placeholder="Input Marks Obtained">
        </div>
        <div class="col-md-6">
          <br>
          <small for="inputSscOUT" class="form-label">Out OF (SSC)</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="sscOUT" id="inputSscOUT" placeholder="Input Total Marks">
        </div>
        <div class="col-md-6">
          <small for="inputHsc" class="form-label">HSC GRADES</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="hsc" id="inputHsc" placeholder="Input Marks Obtained">
        </div>
        <div class="col-md-6">
          <small for="inputHscOUT" class="form-label">Out OF (HSC)</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="hscOUT" id="inputHscOUT" placeholder="Input Total Marks">
        </div>
        <hr>
        <div class="col-md-4">
          <label for="inputHscEng" class="form-label"><strong>HSC Qualifications</strong></label> <br>
          <small for="inputHscEng" class="form-label">English HSC GRADES</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="hscEng" id="inputHscEng" placeholder="Input Marks Obtained">
        </div>
        <div class="col-md-4">
          <br>
          <small for="inputHscEngOUT" class="form-label">Out OF</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="hscEngOUT" id="inputHscEngOUT" placeholder="Input Total Marks">
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <small for="inputHscPhy" class="form-label">Physics HSC GRADES</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="hscPhy" id="inputHscPhy" placeholder="Input Marks Obtained">
        </div>
        <div class="col-md-4">
          <small for="inputHscPhyOUT" class="form-label">Out OF</small>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="hscPhyOUT" id="inputHscPhyOUT" placeholder="Input Total Marks">
        </div>
        <hr>
        <div class="col-md-6">
          <label for="inputCity" class="form-label"><strong>City</strong></label>
          <input type="text" class="form-control" name="city" id="inputCity" value="<?php echo $_SESSION['cityses']; ?>" disabled>
        </div>
        <div class="col-md-2">
          <label for="inputAge" class="form-label"><strong>Age</strong></label>
          <input type="text" class="form-control" spellcheck="false" required autocomplete="off" name="age" id="inputAge" placeholder="Age">
        </div>
        <div class="form-group">
          <label><strong>Do you have Spectacles?</strong></label> <br>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="glasses" value="1" />
            <span class="form-check-label"> Yes </span>
          </label>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="glasses" value="0" />
            <span class="form-check-label"> No </span>
          </label>
        </div>
        <div class="form-group">
          <label><strong>Do you have Medical Certificate issued by trusted Physician?</strong></label> <br>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="glassesPOWER" value="1" />
            <span class="form-check-label"> Yes </span>
          </label>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="glassesPOWER" value="0" />
            <span class="form-check-label"> No </span>
          </label>
        </div>
        <hr>
        <div class="col-6">
          <button type="submit" name="checkEligibility" class="btn btn-outline-primary btn-lg btn-block">Check Eligibility</button>
        </div>
        <div class="col-md-6">
          <button type="submit" name="submitEligibility" class="btn btn-outline-success btn-lg btn-block">Apply Now</button>
        </div>
      </form>
    </div>
  </div>
  <hr>
  <div class="container d-flex justify-content-center mt-2">
    <a class="btn btn-lg btn-warning" onclick='myFunction("ToTop")' role="button">Go Back Top ▲</a>
  </div>

  <hr />
  <?php include "./footer.php" ?>
</body>

</html>