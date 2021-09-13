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
                    <th scope="col">Resolved</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($res = mysqli_fetch_array($query)) {
                    if ($res['Resolved'] == 0) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $res['id'] ?></th>
                            <td><?php echo $res['Email'] ?></td>
                            <td><?php echo $res['Message'] ?></td>
                            <td><?php echo $res['nexID'] ?></td>
                            <td>
                                <a href="/AirForce/admin/issueResolve.php?nexID=<?php echo $res['nexID']; ?>" class="btn btn-outline-light" data-placement="top" data-toggle="tooltip" title="RESOLVED" role="button">
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z' />
                                        <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z' />
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
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>