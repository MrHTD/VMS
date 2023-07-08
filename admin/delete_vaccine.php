<?php 

include "check.php";

include "../config.php";

$delete = mysqli_query($conn,"DELETE FROM `list_of_vaccines` WHERE drug_id='". $_GET['vid']."' ");

if ($delete) {
  header('Refresh: 0; URL=admin_vaccine.php');
} else {
  echo '
  <script>
  swal({
      title: "Data Delete Failed",
      icon: "error",
  }).then(function() {
      
  });
  </script>';
}
