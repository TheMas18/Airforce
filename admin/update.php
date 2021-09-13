<?php
session_start();
if (!isset($_SESSION['emailId'])) {
    header("Location:/Airforce/signin/signin.php");
}
?>
<?php
include "../connection/config.php";
$show = false;
$show_success = false;
$arr_data = null;
//
$ids = null;
if (isset($_GET['id'])) {
    $ids = $_GET['id'];
    $_SESSION['idsession'] = $_GET['id'];
}
$showquery = "SELECT * FROM `userregisdata` WHERE id='$ids'";
$show_data = mysqli_query($conn, $showquery);
$arr_data = mysqli_fetch_array($show_data);
if (isset($_POST['submit'])) {
    $idUpdate = null;
    if (isset($_SESSION['idsession'])) {
        $idUpdate = $_SESSION['idsession'];
    }
    $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $city = mysqli_real_escape_string($conn, $_POST['City']);
    $state = mysqli_real_escape_string($conn, $_POST['State']);
    //  
    $updatequery = "UPDATE `userregisdata` SET `id`='$idUpdate',`firstName`='$firstname',`lastName`='$lastname',`gender`='$gender',`city`='$city',`state`='$state' WHERE id='$idUpdate'";
    //
    $res = mysqli_query($conn, $updatequery);
    unset($_SESSION["idsession"]);
    if ($res) {
        $show_success = true;
        $show = false;
        header('Refresh: 1; URL=/AirForce/admin/adminPanel.php');
    } else {
        $show = true;
        $show_success = false;
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
    <link rel="stylesheet" href="./adminPanel.css" />

    <title>AirForce</title>
  <link rel="shortcut icon" type="image/jpg" href="../images/favicon.ico" />

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <?php include "./navbar.php" ?>
    <div class="container">
        <div class="row justify-content-center">
            <!--  -->
            <!--  -->
            <?php
            if ($show == true) {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <div class='alert alert-danger d-flex align-items-center justify-content-center border-0' role='alert'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
          </svg>
          <div>
            User Update Failed. Please try again !
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
          &nbsp;
            User Update Successfully !
          </div>
        </div>
        <button type='button' class='btn-close shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            }

            ?>
            <!--  -->
            <div class="col-md-6">
                <div class="card m-2">
                    <span class="badge bg-secondary">
                        <?php if (isset($arr_data)) {
                            echo $arr_data['id'];
                        } else {
                            echo '';
                        }; ?>
                    </span>
                    <article class="card-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name </label>
                                    <input type="text" name="firstName" class="form-control" placeholder="Enter Your FirstName" spellcheck="false" required autocomplete="off" value="<?php if (isset($arr_data)) {echo $arr_data['firstName'];} else {echo '';}; ?>" />
                                </div>
                                <br />
                                <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" name="lastName" class="form-control" placeholder="Enter Your LastName" value="<?php if (isset($arr_data)) {echo $arr_data['lastName'];} else {echo '';}; ?>" spellcheck="false" required autocomplete="off" />
                                </div>
                                <br />
                                <!-- form-group end.// -->
                            </div>
                            <!-- form-row end.// -->
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
                                    <input type="text" name="City" spellcheck="false" class="form-control" placeholder="City Name" autocomplete="off" value="<?php if (isset($arr_data)) {echo $arr_data['city'];} else {echo '';}; ?>">
                                </div>
                                <br />
                                <!-- form-group end.// -->
                                <div class="form-group col-md-6">
                                    <!-- <label>State</label> -->
                                    <label for="exampleDataList" class="form-label">State</label>
                                    <input class="form-control" name="State" spellcheck="false" list="datalistOptions" id="exampleDataList" placeholder="Select State" value="<?php if (isset($arr_data)) {echo $arr_data['state'];} else {echo '';}; ?>" />
                                    <datalist id="datalistOptions">
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
                                    </datalist>
                                </div>
                                <br />
                                <!-- form-group end.// -->
                            </div>

                            <br />
                            <!-- form-group end.// -->
                            <div class="form-group">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">
                                    Update
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