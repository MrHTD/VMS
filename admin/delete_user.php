<?php

include "config.php";

$delete = mysqli_query($conn, "DELETE FROM `user` WHERE U_id='" . $_GET['uid'] . "' ");

if ($delete) {
  header('Refresh: 0; URL=admin_user.php');
} else {
  echo '<script>
  swal({
    title: "Data Delete Failed",
    icon: "error",
  }).then(function() {
    
  });
  </script>';
}

?>