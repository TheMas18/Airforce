<?php
session_start();
if (!isset($_SESSION['emailId'])) {
    header("Location:/Airforce/signin/signin.php");
}
?>

<?php
include "../connection/config.php";
if (isset($_GET['id'])) {
    $_SESSION['idResSess'] = $_GET['id'];
}
$id = null;
if (isset($_SESSION['idResSess'])) {
    $id = $_SESSION['idResSess'];
}
$Application="Rejected";
$approveQuery = "UPDATE `applicationusers` SET `Application`='$Application' WHERE `id`='$id'";
$res = mysqli_query($conn, $approveQuery);
unset($_SESSION["idResSess"]);

if ($res) {
    header("Location:/Airforce/admin/pendingApp.php");
} else {
?>
    <script>
        alert("Failed to Resolve Issue");
    </script>
<?php
}

?>