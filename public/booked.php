<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ./404.php');
    exit;
}

include '../admin/config.php';

if (isset($_GET['s']) == 'Booked') {
    mysqli_query($conn, "UPDATE `appointment_table` SET `status_id`= 2 WHERE patient_id = '$_GET[sid]' ");
    header("Location: bookings.php");
}
