<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ./404.php');
    exit;
}

include '../config.php';

if (isset($_GET['s']) == 'Completed') {
    mysqli_query($conn, "UPDATE `appointment_table` SET `status_id`= 4 WHERE patient_id = '$_GET[sid]' ");
    header("Location: bookings.php");
}
