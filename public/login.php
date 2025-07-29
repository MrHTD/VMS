<?php

$title = 'Login';

include "../config.php";

session_start();

// on login screen, redirect to dashboard if already logged in
if (isset($_SESSION['pemail'])) {
  header('location: index.php');
  exit();
}

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/theme.bundle.css" id="stylesheetLTR" />
  <link rel="icon" href="../assets/favicon/favicon.ico" />
  <title><?php echo "$title"; ?></title>
</head>

<body class="bg-light-green">
  <!-- MAIN CONTENT -->
  <main class="container" id="login">
    <div class="row align-items-center justify-content-center vh-100">
      <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 py-6">

        <!-- Title -->
        <h1 class="mb-2 text-center">
          Sign In
        </h1>

        <!-- Subtitle -->
        <p class="text-secondary text-center">
          Enter your email address and password to access Dashboard
        </p>

        <!-- Form -->
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="row">
            <div class="col-12">
              <div class="mb-4">

                <!-- Label -->
                <label class="form-label">
                  Email Address
                </label>

                <!-- Input -->
                <input type="email" name="email" class="form-control" placeholder="Your email address">
              </div>
            </div>

            <div class="col-12">
              <!-- Password -->
              <div class="mb-4">

                <div class="row">
                  <div class="col">

                    <!-- Label -->
                    <label class="form-label">
                      Password
                    </label>
                  </div>
                </div> <!-- / .row -->

                <!-- Input -->
                <div class="input-group input-group-merge">
                  <input type="password" name="password" class="form-control" autocomplete="off" data-toggle-password-input placeholder="Your password">

                  <button type="button" class="input-group-text px-4 text-secondary link-primary" data-toggle-password></button>
                </div>
              </div>
            </div>
          </div> <!-- / .row -->

          <div class="form-check">

            <!-- Input -->
            <input type="checkbox" class="form-check-input" id="remember">

            <!-- Label -->
            <label class="form-check-label" for="remember">
              Remember me
            </label>
          </div>

          <div class="row align-items-center text-center">
            <div class="col-12">
              <!-- Button -->
              <button type="submit" name="login" class="btn w-100 btn-primary mt- mb-2">Sign in</button>
            </div>
          </div> <!-- / .row -->
        </form>
        <div class="mt-auto">

          <!-- Link -->
          <small class="mb-0 text-muted">
            Already Not registered? <a href="../index.php" class="fw-semibold">Register</a>
          </small>
          <br>
          <!-- Link -->
          <small class="mb-0 text-muted">
            Are You Admin? <a href="../admin/index.php" class="fw-semibold">Login</a>
          </small>
        </div>
      </div>
      <?php

      if (isset($_POST['login'])) {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = base64_encode($_POST['password']);

        // patient login
        $sql = "SELECT * FROM patient_table WHERE patient_email_address = '{$email}' AND patient_password = '{$password}' AND `patient_role` = 2";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");

        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["uid"] = $row['patient_id'];
            $_SESSION["pemail"] = $row['patient_email_address'];
            $_SESSION["name"] = $row['patient_full_name'];
            $_SESSION["role"] = $row['patient_role'];

            header("Location: {$hostname}/public/index.php");
          }
        } else {
          // hospital login
          $sql = "SELECT * FROM hospital WHERE H_Email = '{$email}' AND H_Password = '{$password}' AND `H_Role` = 3";

          $result = mysqli_query($conn, $sql) or die("Query Failed.");

          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
              $_SESSION["hid"] = $row['H_id'];
              $_SESSION["pemail"] = $row['H_Email'];
              $_SESSION["name"] = $row['H_Name'];
              $_SESSION["role"] = $row['H_Role'];

              header("Location: {$hostname}/public/index.php");
            }
          } else {
            echo '<div class="fixed-top text-center alert alert-danger rounded-4 w-50 mx-auto mt-2" role="alert">Username Or Password are not matched.</div>';
          }
        }
      }
      ?>
    </div> <!-- / .row -->
  </main> <!-- / main -->

  <script src="../assets/js/theme.bundle.js"></script>
</body>