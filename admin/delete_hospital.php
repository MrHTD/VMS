<?php

include "config.php";

$delete = mysqli_query($conn, "DELETE FROM `hospital` WHERE H_id='" . $_GET['hid'] . "' ");

if ($delete) {
  header('Refresh: 0; URL=admin_hospital.php');
} else {
  echo '<script>
  swal({
    title: "Data Delete Failed",
    icon: "error",
  }).then(function() {
    
  });
  </script>';
}