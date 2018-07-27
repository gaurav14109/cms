<?php session_start(); ?>


<?php
//we assign null values to cancel admin
 $_SESSION['username'] = null;
    $_SESSION['firstname'] =  null;
    $_SESSION['lastname'] =  null;
    $_SESSION['role'] = null;
header("location: ../index.php");

?>