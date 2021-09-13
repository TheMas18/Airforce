<?php
session_start();
if (!isset($_SESSION['emailId'])) {
    header("Location:/Airforce/signin/signin.php");
}
?>
<?php
include "../connection/config.php";
$data_search = "SELECT * FROM `applicationusers`";
$query = mysqli_query($conn, $data_search);
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
    <link rel="stylesheet" href="./adminPanel.css" />
    <title>Admin Panel</title>
  <link rel="shortcut icon" type="image/jpg" href="../images/favicon.ico" />

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php include "./navbar.php" ?>
    <div class="container mt-5">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Job</th>
                    <th scope="col">Height(CMs)</th>
                    <th scope="col">Weight(KGs)</th>
                    <th scope="col">SSC(%)</th>
                    <th scope="col">HSC(%)</th>
                    <th scope="col">Glasses</th>
                    <th scope="col">Grad(%)</th>
                    <th scope="col">Application</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($res = mysqli_fetch_array($query)) {
                    if ($res['Application'] == "Approved") {
                ?>
                        <tr>
                            <th scope="row"><?php echo $res['candidateID'] ?></th>
                            <td><?php echo $res['email'] ?></td>
                            <td><?php echo $res['JobDesc'] ?></td>
                            <td><?php echo $res['height'] ?></td>
                            <td><?php echo $res['weight'] ?></td>
                            <td><?php echo $res['ssc'] ?></td>
                            <td><?php echo $res['hsc'] ?></td>
                            <td><?php if ($res['Glasses'] == 1) {
                                    echo "YES";
                                } else {
                                    echo "NO";
                                } ?></td>
                            <td><?php echo $res['Grad'] ?></td>
                            <td class="table-success">APPROVED</td>
                        </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>