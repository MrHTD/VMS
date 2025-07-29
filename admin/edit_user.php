<?php

$title = "Edit User";

$user_id = $_GET['uid'];

if (isset($_POST['upd_user'])) {

    include "config.php";

    if (empty($_FILES['new_img']['name'])) {
        $file_name = $_POST['old_img'];
    } else {
        $errors = array();

        $file_name = $_FILES['new_img']['name'];
        $file_tmp = $_FILES['new_img']['tmp_name'];

        $target = "../assets/admin_images/" . $file_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));
    $role = mysqli_real_escape_string($conn, $_POST['urole']);

    $sql1 = "UPDATE `user` SET `Full_Name`='$fullname',`Username`='$username',`U_Email`='$email', `U_Password` ='$password', `Role`= $role, `user_img`='$file_name' WHERE U_id={$user_id}";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        header("Location: {$hostname}/admin/logout.php");
    } else {
        echo "Query Failed";
    }
}

?>

<head>
    <title><?php echo "$title"; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/theme.bundle.css" id="stylesheetLTR" />
    <link rel="icon" href="../assets/favicon/favicon.ico" />
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

                include "config.php";

                $sql = "SELECT * FROM `user`
                WHERE U_id={$user_id}";

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
                                        <input type="text" name="fullname" class="form-control" value="<?php echo $row['Full_Name'] ?>" placeholder="Your fullname" required>
                                    </div>
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            User name
                                        </label>

                                        <!-- Input -->
                                        <input type="text" name="username" class="form-control" value="<?php echo $row['Username'] ?>" placeholder="Your username" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Email
                                        </label>

                                        <!-- Input -->
                                        <input type="email" name="email" class="form-control" value="<?php echo $row['U_Email'] ?>" placeholder="Your email address" required>
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
                                            <input type="password" name="password" class="form-control" autocomplete="off" value="<?php echo base64_decode($row['U_Password']) ?>" data-toggle-password-input placeholder="Your password" required>

                                            <button type="button" class="input-group-text px-4 text-secondary link-primary" data-toggle-password></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Profile pic
                                        </label>

                                        <!-- Input -->
                                        <img src="../assets/admin_images/<?php echo $row['user_img'] ?>" class="img-fluid rounded">
                                        <input type="file" name="new_img" class="form-control">
                                        <input type="hidden" name="old_img" value="<?php echo $row['user_img'] ?>">
                                    </div>
                                    <div class="mb-4">
                                        <select name="urole" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled> Select Role</option>
                                            <?php

                                            if ($row['Role'] == '1') {
                                                echo "<option value='1' selected>Admin</option>";
                                            }
                                            //     echo "<option value='Hospital'>Hospital</option>";
                                            // // } else {
                                            // //     echo "<option value='Hospital' selected>Hospital</option>";
                                            // //     echo "<option value='Admin'>Admin</option>";
                                            // // }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- / .row -->

                            <div class="row align-items-center text-center">
                                <div class="col-12">
                                    <!-- Button -->
                                    <button type="submit" name="upd_user" class="btn w-100 btn-primary mt-6 mb-2">Update User</button>
                                </div>
                            </div> <!-- / .row -->
                        </form>

                <?php
                    }
                }

                ?>
            </div>
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