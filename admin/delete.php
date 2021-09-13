<?php
include "../connection/config.php";
$id = $_GET['id'];
$deleteQuery = "DELETE FROM `userregisdata` WHERE id='$id'";
$res = mysqli_query($conn, $deleteQuery);
if ($res) {
    header("Location:/Airforce/admin/adminPanel.php");
} else {
?>
    <script>
        alert("Failed to Delete");
    </script>
<?php
}

?>