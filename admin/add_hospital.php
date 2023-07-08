<?php

$title = "Add Vaccine";

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/theme.bundle.css" id="stylesheetLTR" />
    <link rel="icon" href="assets/favicon/favicon.ico" />
    <title><?php echo "$title"; ?></title>
</head>

<body class="d-flex align-items-center bg-light-green">
    <!-- MAIN CONTENT -->
    <main class="container">
        <?php
        $alert1 = '<div class="alert alert-danger fixed-top text-center w-75 mt-2 mx-auto rounded-4" id="insert1" role="alert">Email Already Exist!</div>';
        ?>
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-md-7 col-lg-6 px-lg-4 px-xl-8 d-flex flex-column vh-95 py-6">
                <?php
                $alert = '<div class="alert alert-success text-center alert-dismissible fixed-top fade show w-50 mx-auto rounded-4" id="insert" role="alert">Data Inserted!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                ?>
                <!-- Brand -->
                <a class="navbar-brand mb-auto">
                    <!-- <img src="https://d33wubrfki0l68.cloudfront.net/ba6b91b7d508187d153e48318c22d0773a9cedfc/36afa/assets/images/logo.svg" class="navbar-brand-img logo-light logo-large" alt="..." width="125" height="25"> -->
                    <!-- <img src="https://d33wubrfki0l68.cloudfront.net/55307694d1a6b107d2d87c838a1aaede85cd3d84/66f18/assets/images/logo-dark.svg" class="navbar-brand-img logo-dark logo-large" alt="..." width="125" height="25"> -->
                </a>

                <div>
                    <!-- Title -->
                    <h1 class="mb-2">
                        Add Hospital
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-secondary">
                        Don't have an account? Create your account, it takes less than a minute
                    </p>

                    <!-- Form -->
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Hospital Name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="fullname" class="form-control" placeholder="Hospital Name" required>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Email
                                    </label>

                                    <!-- Input -->
                                    <input type="email" name="email" class="form-control" placeholder="Hospital Email Address" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Password
                                    </label>

                                    <!-- Input -->
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" class="form-control" autocomplete="off" data-toggle-password-input placeholder="Hospital password" required>

                                        <button type="button" class="input-group-text px-4 text-secondary link-primary" data-toggle-password></button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Address
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="address" class="form-control" placeholder="Hospital Address" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <!-- Input -->
                                    <input type="number" name="phone" class="form-control" maxlength="11" placeholder="Hospital Phone Number" required>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                        <div class="col-12">

                            <div class="form-check">

                                <!-- Input -->
                                <input type="checkbox" class="form-check-input" id="agree">

                                <!-- Label -->
                                <label class="form-check-label" for="agree">
                                    I agree with <a href="">Terms & Conditions</a> and have understood <a href="">Privacy Policy</a>
                                </label>
                            </div>

                            <!-- Button -->
                            <button type="submit" name="signup" class="btn btn-primary mt-3">
                            Add Hospital
                            </button>
                    </form>
                </div>


                <?php
                // check exists
                if (isset($_POST['signup'])) {

                    include "config.php";

                    $email = $_POST['email'];

                    $e = "SELECT H_Email FROM hospital WHERE H_Email = '$email'";

                    $ee = mysqli_query($conn, $e);

                    if (mysqli_num_rows($ee) > 0) {
                        die($alert1);
                    }
                }

                if (isset($_POST['signup'])) {

                    include "config.php";

                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));
                    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $phone = $_POST['phone'];
                    // $h_role = 3;

                    $sql = "INSERT INTO `hospital`(`H_Name`, `H_Email`, `H_Password`, `H_Address`, `H_Tel`)
                    VALUES ('$fullname','$email','$password', '$address', $phone)";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<script>window.location.replace("./admin_hospital.php");</script>';
                    }
                }
                ?>

            </div>
        </div> <!-- / .row -->
    </main> <!-- / main -->

    <script src="assets/js/theme.bundle.js"></script>
</body>

</html>