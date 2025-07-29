<?php

$title = "Edit Hospital";

include './config.php';

include_once 'header.php';

?>

<head>
    <title><?php echo "$title"; ?></title>
</head>

<body class="bg-light-green">
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
                        Edit Hospital Details
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-secondary">
                        You Can Edit Your Details Here:
                    </p>
                    <?php

                    $hos_id = $_GET['hid'];

                    $sql = "SELECT * FROM `hospital`
                    WHERE H_id = {$hos_id}";

                    $fetch = mysqli_query($conn, $sql) or die("Query Failed");

                    if (mysqli_num_rows($fetch)) {
                        while ($row = mysqli_fetch_assoc($fetch)) {
                    ?>

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
                                            <input type="text" name="fullname" class="form-control" value="<?php echo $row['H_Name'] ?>" placeholder="Hospital Name" required>
                                        </div>
                                    </div>
                                </div> <!-- / .row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">

                                            <!-- Label -->
                                            <label class="form-label">
                                                Email
                                            </label>

                                            <!-- Input -->
                                            <input type="email" name="email" class="form-control" value="<?php echo $row['H_Email'] ?>" placeholder="Hospital Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-4">

                                            <!-- Label -->
                                            <label class="form-label">
                                                Password
                                            </label>

                                            <!-- Input -->
                                            <div class="input-group input-group-merge">
                                                <input type="password" name="password" class="form-control" value="<?php echo base64_decode($row['H_Password']) ?>" autocomplete="off" data-toggle-password-input placeholder="Hospital password" required>

                                                <button type="button" class="input-group-text px-4 text-secondary link-primary" data-toggle-password></button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- / .row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">

                                            <!-- Label -->
                                            <label class="form-label">
                                                Address
                                            </label>

                                            <!-- Input -->
                                            <input type="text" name="address" class="form-control" value="<?php echo $row['H_Address'] ?>" placeholder="Hospital Address" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-4">

                                            <!-- Label -->
                                            <label class="form-label">
                                                Phone
                                            </label>

                                            <!-- Input -->
                                            <input type="number" name="phone" class="form-control" value="<?php echo $row['H_Tel'] ?>" placeholder="Hospital Phone Number" required>
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
                                    <button type="submit" name="update" class="btn btn-primary mt-3">
                                        Update
                                    </button>
                            </form>
                    <?php
                        }
                    }

                    ?>
                </div>

                <?php
                // check update
                // if (isset($_POST['update'])) {

                //     $email1 = mysqli_real_escape_string($conn, $_POST['email']);

                //     $e = "SELECT H_Email FROM hospital WHERE H_Email = $email1";
                //     $e .= "UPDATE hospital SET H_Email = $email1 WHERE H_Email = $hos_id";

                //     $ee = mysqli_query($conn, $e);

                //     if (mysqli_num_rows($ee) > 0) {
                //         die($alert1);
                //     }
                // }

                if (isset($_POST['update'])) {

                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));
                    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $phone = $_POST['phone'];
                    // $h_role = 3;

                    $sql = "UPDATE hospital SET `H_Name`='$fullname',`H_Email`='$email',`H_Password`='$password',
                    `H_Address`='$address',`H_Tel`=$phone WHERE H_id = {$hos_id}";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<script>window.location.replace("./admin_hospital.php");</script>';
                    }
                }
                ?>

            </div>
        </div> <!-- / .row -->
    </main> <!-- / main -->
    <!-- Theme JS -->
    <script src="./../assets/js/theme.bundle.js"></script>
</body>