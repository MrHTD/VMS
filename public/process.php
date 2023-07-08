<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ./404.php');
    exit;
}

include '../admin/config.php';

if (isset($_GET['s']) == 'Process') {
    mysqli_query($conn, "UPDATE `appointment_table` SET `status_id`= 1 WHERE patient_id = '$_GET[sid]' ");
    header("Location: bookings.php");
}
