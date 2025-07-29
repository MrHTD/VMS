<?php

$title = "Edit User";

session_start();

$user_id = $_SESSION["uid"];

include_once 'header.php';

?>

<head>
    <title><?php echo "$title"; ?></title>
</head>

<body class="bg-light-green">

    <main class="container" id="login">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 py-6">

                <!-- Title -->
                <h1 class="mb-2 text-center text-uppercase">
                    Edit User
                </h1>
                <?php

                include "../admin/config.php";

                $sql = "SELECT * FROM `patient_table`
                WHERE patient_id={$user_id}";

                $fetch = mysqli_query($conn, $sql) or die("Query Failed");

                if (mysqli_num_rows($fetch)) {
                    while ($row = mysqli_fetch_assoc($fetch)) {
                ?>

                        <!-- Form -->
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Full name
                                        </label>

                                        <!-- Input -->
                                        <input type="text" name="fullname" class="form-control" value="<?php echo $row['patient_full_name'] ?>" placeholder="Your fullname" required>
                                    </div>
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Father name
                                        </label>

                                        <!-- Input -->
                                        <input type="text" name="fname" class="form-control" value="<?php echo $row['patient_father_name'] ?>" placeholder="Your username" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Email
                                        </label>

                                        <!-- Input -->
                                        <input type="email" name="email" class="form-control" value="<?php echo $row['patient_email_address'] ?>" placeholder="Your email address" required>
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
                                <div class="col-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Date of Birth
                                        </label>

                                        <!-- Input -->
                                        <input type="date" name="dob" class="form-control" value="<?php echo $row['patient_date_of_birth'] ?>" placeholder="Your fullname" required>
                                    </div>
                                    <div class="mb-4">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Gender
                                        </label>
                                        <select name="gender" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled> Select Role</option>
                                            <?php

                                            if ($row['patient_gender'] == 'Male') {
                                                echo "<option value='Male' selected>Male</option>";
                                                echo "<option value='Female'>Female</option>";
                                            } else {
                                                echo "<option value='Female' selected>Female</option>";
                                                echo "<option value='Male'>Male</option>";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Address
                                        </label>

                                        <!-- Input -->
                                        <input type="text" name="address" class="form-control" value="<?php echo $row['patient_address'] ?>" placeholder="Your email address" required>
                                    </div>
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Phone
                                        </label>

                                        <!-- Input -->
                                        <input type="number" name="phone" class="form-control" value="<?php echo $row['patient_phone_no'] ?>" placeholder="Your email address" required>
                                    </div>
                                </div>
                            </div> <!-- / .row -->

                            <div class="row align-items-center text-center">
                                <div class="col-12">
                                    <!-- Button -->
                                    <button type="submit" name="upd_user" class="btn w-100 btn-primary mt-6 mb-2">Update</button>
                                </div>
                            </div> <!-- / .row -->
                        </form>

                <?php
                    }
                }

                ?>
            </div>
            <?php if (isset($_POST['upd_user'])) {

                include "../config.php";

                $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));
                $role = mysqli_real_escape_string($conn, $_POST['gender']);

                $sql1 = "UPDATE `patient_table` SET `Full_Name`='$fullname',`Username`='$username',`U_Email`='$email', `U_Password` ='$password', `Role`= $role WHERE patient_id={$user_id}";
                $result1 = mysqli_query($conn, $sql1);
                if ($result1) {
                    header("Location: {$hostname}/admin/admin_user.php");
                } else {
                    echo "Query Failed";
                }
            } ?>
        </div>
        </div>

</body>

<!-- Theme JS -->
<script src="../assets/js/theme.bundle.js"></script>

<script>
    $('#insert').delay(1000).hide(0);
    setTimeout(function() {
        $('#insert1').fadeOut('fast');
    }, 30000)
</script>