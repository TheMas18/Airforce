<?php
session_start();
if (!isset($_SESSION['emailId'])) {
  header("Location:/Airforce/signin/signin.php");
}
?>
<?php
include "../connection/config.php";
$data_search = "SELECT * FROM `usercontact`";
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
                    <th scope="col">id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">nexID</th>
                    <th scope="col">ISSUE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($res = mysqli_fetch_array($query)) {
                    if ($res['Resolved'] == 1) {
                ?>
                        <tr class="table-info">
                            <th scope="row"><?php echo $res['id'] ?></th>
                            <td><?php echo $res['Email'] ?></td>
                            <td><?php echo $res['Message'] ?></td>
                            <td><?php echo $res['nexID'] ?></td>
                            <td class="table-success">
                                RESOLVED
                            </td>
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