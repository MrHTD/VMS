<?php

$title = "Patient Register";

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./admin/assets/css/theme.bundle.css" id="stylesheetLTR" />
    <link rel="icon" href="./admin/assets/favicon/favicon.ico" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title><?php echo "$title"; ?></title>
</head>

<body class="d-flex align-items-center bg-light-green">
    <!-- MAIN CONTENT -->
    <main class="container-fluid">
        <?php
        $alert1 = '<div class="alert alert-danger fixed-top text-center w-75 mt-2 mx-auto rounded-4" id="insert1" role="alert">Email Already Exist!</div>';
        ?>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7 col-lg-6 px-lg-4 px-xl-8 d-flex flex-column vh-100 py-6">
                <?php
                $alert = '<div class="alert alert-success text-center alert-dismissible float-top fade show w-50 mx-auto rounded-4" id="insert" role="alert">Data Inserted!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                ?>
                <!-- Brand -->
                <a class="navbar-brand mb-auto" href="">
                    <!-- <img src="https://d33wubrfki0l68.cloudfront.net/ba6b91b7d508187d153e48318c22d0773a9cedfc/36afa/assets/images/logo.svg" class="navbar-brand-img logo-light logo-large" alt="..." width="125" height="25"> -->
                    <img src="https://d33wubrfki0l68.cloudfront.net/55307694d1a6b107d2d87c838a1aaede85cd3d84/66f18/assets/images/logo-dark.svg" class="navbar-brand-img logo-dark logo-large" alt="..." width="125" height="25">
                </a>

                <div>
                    <!-- Title -->
                    <h1 class="mb-2">
                        Sign Up
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-secondary">
                        Don't have an account? Create your account, it takes less than a minute
                    </p>

                    <!-- Form -->
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Full name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="fullname" class="form-control" placeholder="full name" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Father Name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="fathername" class="form-control" placeholder="Father Name" required>
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
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
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
                                        <input type="password" name="password" class="form-control" autocomplete="off" data-toggle-password-input placeholder="Your password" required>

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
                                        date of Birth
                                    </label>

                                    <!-- Input -->
                                    <input type="date" name="dob" class="form-control" placeholder="Address" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Gender
                                    </label>

                                    <!-- Input -->
                                    <select id="inputState" name="gender" required class="form-select form-control py-3 px-4 rounded-4 shadow-cus ">
                                        <option disabled>Gender...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
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
                                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <!-- Input -->
                                    <input type="tel" name="phone" maxlength="11" class="form-control" placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div> <!-- / .row -->

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
                            Sign Up
                        </button>
                    </form>
                </div>

                <div class="mt-auto">

                    <!-- Link -->
                    <small class="mb-0 text-muted">
                        Already registered? <a href="./public/login.php" class="fw-semibold">Login</a>
                    </small>
                </div>

                <?php

                // check exists
                if (isset($_POST['signup'])) {

                    include "./config.php";

                    $email = $_POST['email'];

                    $e = "SELECT patient_email_address FROM patient_table WHERE patient_email_address = '$email'";

                    $ee = mysqli_query($conn, $e);

                    if (mysqli_num_rows($ee) > 0) {
                        die($alert1);
                    }
                }

                ?>

                <?php

                if (isset($_POST['signup'])) {
                    include "./config.php";

                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));
                    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                    $fathername = mysqli_real_escape_string($conn, $_POST['fathername']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $dob = $_POST['dob'];
                    $gender = $_POST['gender'];
                    $phone = $_POST['phone'];
                    $date = date("Y-m-d");
                    $p_role = 2;

                    $sql = "INSERT INTO `patient_table`(`patient_email_address`, `patient_password`, `patient_full_name`, `patient_father_name` ,
                    `patient_date_of_birth`, `patient_gender`, `patient_address`, `patient_phone_no`, `patient_added_on`, `patient_role`) 
                    VALUES ('$email','$password','$fullname', '$fathername', '$dob' , '$gender', '$address', $phone, '$date', $p_role)";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo $alert;
                        echo '<script>window.location.replace("./public/login.php");</script>';
                    }
                }

                ?>

            </div>

            <div class="col-md-5 col-lg-6 d-none d-lg-block">

                <!-- Image -->
                <div class="bg-size-cover bg-position-right bg-repeat-no-repeat overlay overlay-dark overlay-50 vh-100 me-n4" style="background-image: url(./admin/assets/covers/img1.jpg);"></div>
            </div>
        </div> <!-- / .row -->
    </main> <!-- / main -->

    <script src="./admin/assets/js/theme.bundle.js"></script>
</body>

</html>