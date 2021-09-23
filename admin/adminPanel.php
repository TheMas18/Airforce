<?php
session_start();
if (!isset($_SESSION['emailId'])) {
    header("Location:/Airforce/signin/signin.php");
}
?>
<?php
include "../connection/config.php";
$data_search = "SELECT * FROM `userregisdata`";
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
    <div class="navarea sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="AdminNavbar">
                    <a class="navbar-brand" href="/Airforce/admin/adminPanel.php">
                    <img src="https://m.media-amazon.com/images/I/71BQbgfeqlL._SY355_.jpg" alt="" width="80" height="80" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse AdminLogAreaDiv " id="navbarSupportedContent">
                    <div class="navRight AdminLogArea">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ISSUES
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/Airforce/admin/pending.php">Pending</a></li>
                                    <li><a class="dropdown-item" href="/Airforce/admin/resolved.php">Resolved</a></li>
                                    <li><a class="dropdown-item" href="/Airforce/admin/pendingApp.php">Pending Applications</a></li>
                                    <li><a class="dropdown-item" href="/Airforce/admin/approvedApp.php">Approved Applications</a></li>
                                    <li><a class="dropdown-item" href="/Airforce/admin/rejectedApp.php">Rejected Applications</a></li>
                                </ul>
                            </li>
                        </ul>
                        <a class="btn logOutBtn" href="/Airforce/signout/logout.php" role="button">LOG OUT</a>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Emblem_of_India.svg/1200px-Emblem_of_India.svg.png" alt="" width="50" height="70" />
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($res = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $res['id'] ?></th>
                        <td><?php echo $res['firstName'] ?></td>
                        <td><?php echo $res['lastName'] ?></td>
                        <td><?php echo $res['email'] ?></td>
                        <td><?php echo $res['gender'] ?></td>
                        <td><?php echo $res['city'] ?></td>
                        <td><?php echo $res['state'] ?></td>
                        <td>
                            <a href="/Airforce/admin/update.php?id=<?php echo $res['id']; ?>" class="btn btn-outline-light" data-placement="top" data-toggle="tooltip" title="UPDATE" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>

                            </a>
                        </td>
                        <td>
                            <a href="/Airforce/admin/delete.php?id=<?php echo $res['id']; ?>" class="btn btn-outline-light" data-placement="top" data-toggle="tooltip" title="DELETE" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </a>
                            </button>

                        </td>
                    </tr>
                <?php
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