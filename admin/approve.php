<?php

include 'config.php';

if (isset($_GET['aid'])) {
    mysqli_query($conn, "UPDATE `appointment_table` SET `Approve/Reject` = 1 WHERE appointment_id ='$_GET[aid]'");
    header("Location: admin_request.php");
} else {
    mysqli_query($conn, "UPDATE `appointment_table` SET `Approve/Reject` = 0 WHERE appointment_id ='$_GET[rid]'");
    header("Location: admin_request.php");
}
