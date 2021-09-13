<?php
session_start();
if (!isset($_SESSION['emailId'])) {
    header("Location:/Airforce/signin/signin.php");
}
?>

<?php
include "../connection/config.php";
if (isset($_GET['nexID'])) {
    $_SESSION['idResSess'] = $_GET['nexID'];
}
$id = null;
if (isset($_SESSION['idResSess'])) {
    $id = $_SESSION['idResSess'];
}
$resolveQuery = "UPDATE `usercontact` SET `Resolved`= 1 WHERE `nexID`='$id'";
$res = mysqli_query($conn, $resolveQuery);
unset($_SESSION["idResSess"]);

if ($res) {
    header("Location:/Airforce/admin/pending.php");
} else {
?>
    <script>
        alert("Failed to Resolve Issue");
    </script>
<?php
}

?>