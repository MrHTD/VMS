<?php

$title = "Home";

?>

<head>
  <title><?php echo "$title"; ?></title>
  <!-- Favicon -->
  <link rel="icon" href="./admin/assets/favicon/favicon.ico" />
  <style>
    body::-webkit-scrollbar {
      width: 12px;
      /* width of the entire scrollbar */
    }

    body::-webkit-scrollbar-track {
      background: #00bac7;
      /* color of the tracking area */
    }

    body::-webkit-scrollbar-thumb {
      background-color: #1b687c;
      /* color of the scroll thumb */
      border-radius: 20px;
      /* roundness of the scroll thumb */
      border: 3px solid #1b687c;
      /* creates padding around scroll thumb */
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>

  <div class="bg-size-cover bg-position-center bg-repeat-no-repeat vh-100 position-relative me-n4"
  style="background-image: url(./admin/assets/covers/img1.jpg);"></div>
  <div class="position-absolute" style="top: 38%;left: 6%;">
    <div class="text-center text-dark text-uppercase">
      <h1 class="display-3" style="font-weight: 900;">Hurry! Get Vaccinated Today</h1>
      <p class="text-justify fw-bold fs-3">Vaccination is a simple, safe,<br>
      and effective way of protecting you against harmful diseases,<br> before you come into contact with them.</p>
      <a href="./public/index.php" class="btn btn-lg btn-dark fw-bold text-uppercase shadow-cus">Get Vaccinated</a>
    </div>
  </div>

</body>


