<?php

include "check.php";

include "../config.php";

include "./cdn.php";

$delete = mysqli_query($conn, "DELETE FROM `patient_table` WHERE patient_id='" . $_GET['pid'] . "' ");

if ($delete) {
    echo '
    <script>
    swal({
        title: "Data Deleted",
        icon: "success",
    }).then(function() {
        window.location = "admin_patient.php";
    });
    </script>';
} else {
    echo
    '<script>
    swal({
        title: "Data Deleted",
        icon: "alert",
    }).then(function() {
        window.location = "admin_patient.php";
    });
    </script>';
}
