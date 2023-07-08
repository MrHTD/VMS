<?php

$title = "Edit";

include '../admin/config.php';

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../admin/assets/css/theme.bundle.css" id="stylesheetLTR" />
    <link rel="icon" href="../admin/assets/favicon/favicon.ico" />
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
                        Edit User Details
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-secondary">
                        You Can Edit Your Details Here:
                    </p>
                    <?php

                    $patient_id = $_GET['uid'];

                    $sql = "SELECT * FROM `patient_table`
                    WHERE patient_id = {$patient_id}";

                    $fetch = mysqli_query($conn, $sql) or die("Query Failed");

                    if (mysqli_num_rows($fetch)) {
                        while ($row = mysqli_fetch_assoc($fetch)) {
                    ?>

                            <!-- Form -->
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-4">

                                            <!-- Label -->
                                            <label class="form-label">
                                                Full Name
                                            </label>

                                            <!-- Input -->
                                            <input type="text" name="fullname" class="form-control" value="<?php echo $row['patient_full_name'] ?>" placeholder="Hospital Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">

                                            <!-- Label -->
                                            <label class="form-label">
                                                Father Name
                                            </label>

                                            <!-- Input -->
                                            <input type="text" name="email" class="form-control" value="<?php echo $row['patient_father_name'] ?>" placeholder="Hospital Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-4">

                                            <!-- Label -->
                                            <label class="form-label">
                                                Email
                                            </label>

                                            <!-- Input -->
                                            <input type="email" name="email" class="form-control" value="<?php echo $row['patient_email_address'] ?>" placeholder="Hospital Email Address" required>
                                        </div>
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
                                                <input type="password" name="password" class="form-control" autocomplete="off" value="<?php echo base64_decode($row['patient_password']) ?>" data-toggle-password-input placeholder="Your password" required>

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
                                            <input type="text" name="address" class="form-control" value="<?php echo $row['patient_address'] ?>" placeholder="Hospital Address" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-4">

                                            <!-- Label -->
                                            <label class="form-label">
                                                Phone
                                            </label>

                                            <!-- Input -->
                                            <input type="number" name="phone" class="form-control" value="<?php echo $row['patient_phone_no'] ?>" placeholder="Hospital Phone Number" required>
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

                if (isset($_POST['update'])) {

                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));
                    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $phone = $_POST['phone'];
                    // $h_role = 3;

                    $sql = "UPDATE patient_table SET `patient_full_name`='$fullname',`patient_father_name`='$fullname',`patient_email_address`='$email',`patient_password`='$password',
                    `patient_address`='$address',`patient_phone_no`=$phone WHERE patient_id = {$patient_id}";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<script>window.location.replace("./index.php");</script>';
                    }
                }
                ?>

            </div>
        </div> <!-- / .row -->
    </main> <!-- / main -->
</body>

<!-- Theme JS -->
<script src="../admin/assets/js/theme.bundle.js"></script>

<script>
    $('#insert').delay(1000).hide(0);
    setTimeout(function() {
        $('#insert1').fadeOut('fast');
    }, 30000)
</script>