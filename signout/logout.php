<?php
session_start();
if (isset($_COOKIE['admincookie'])) {
    unset($_COOKIE['admincookie']);
    setcookie('admincookie', $emailId, time() + 1);
}
session_destroy();
header("Location:/Airforce/signin/signin.php");
?>