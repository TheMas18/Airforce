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
                    <th scope="col">Approve</th>
                    <th scope="col">Reject</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($res = mysqli_fetch_array($query)) {
                    if ($res['Application'] == "Pending") {
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
                            <td>
                                <a href="/AirForce/admin/approve.php?id=<?php echo $res['id']; ?>" class="btn btn-outline-light" data-placement="top" data-toggle="tooltip" title="APPROVE" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="/AirForce/admin/reject.php?id=<?php echo $res['id']; ?>" class="btn btn-outline-light" data-placement="top" data-toggle="tooltip" title="REJECT" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
    <style>
        .bi-check-lg {
            color: hsl(123, 100%, 50%);
        }
        .bi-x-lg {
            color: hsl(0, 100%, 50%);

        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>