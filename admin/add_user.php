<?php

$title = "Add User";

$alert = '<div class="alert alert-success fixed-top text-center w-75 mt-2 mx-auto rounded-4" id="insert" role="alert">Data Inserted!</div>';
$alert1 = '<div class="alert alert-danger fixed-top text-center w-75 mt-2 mx-auto rounded-4" id="insert1" role="alert">Username or Email Already Exist!</div>';


if (isset($_POST["add_user"])) {

    include "config.php";

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);

    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $Password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));

    $role = mysqli_real_escape_string($conn, $_POST['urole']);

    if (empty($_FILES['fileToUpload'])) {
    } else {
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];

        $target = "../assets/admin_images/" . $file_name;
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $sql = "SELECT * FROM user WHERE Username = '{$username}' OR U_Email = '{$email}'";

    $result = mysqli_query($conn, $sql) or die("Query Failed.");

    if (mysqli_num_rows($result) > 0) {
        echo "$alert1";
    } else {

        $sql1 = "INSERT INTO `user`(`Full_Name`, `Username`, `U_Email`, `U_Password`, `Role`, `user_img`) 
        VALUES ('$fullname', '$username', '$email','$Password', '$role', '$file_name')";
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            echo $alert;
            header('location: admin_user.php');
        } else {
            echo 'Query Failed.';
        }
    }
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

    <main class="container" id="login">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 py-6">

                <!-- Title -->
                <h1 class="mb-2 text-center text-uppercase">
                    Add User
                </h1>

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
                                <input type="text" name="fullname" class="form-control" placeholder="Your fullname" required>
                            </div>
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    User name
                                </label>

                                <!-- Input -->
                                <input type="text" name="username" class="form-control" placeholder="Your username" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    Email
                                </label>

                                <!-- Input -->
                                <input type="email" name="email" class="form-control" placeholder="Your email address" required>
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
                                    <input type="password" name="password" class="form-control" autocomplete="off" data-toggle-password-input placeholder="Your password" required>

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
                                <input type="file" class="form-control" name="fileToUpload" required>
                            </div>
                            <div class="mb-4">
                                <select name="urole" class="form-select" aria-label="Default select example" required>
                                    <option selected disabled> Select Role</option>
                                    <option class='my-5 mx-5' value='1'>Admin</option>
                                    <!-- <option class='my-5 mx-5' value=''>Hospital</option> -->
                                </select>
                            </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row align-items-center text-center">
                        <div class="col-12">
                            <!-- Button -->
                            <button type="submit" name="add_user" class="btn w-100 btn-primary mt-6 mb-2">Add User</button>
                        </div>
                    </div> <!-- / .row -->
                </form>
            </div>
        </div>
        </div>

</body>

<!-- Theme JS -->
<script src="../assets/js/theme.bundle.js"></script>

<script>
    function showpass() {
        var x = document.getElementById("show");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<script>
    $('#insert').delay(1000).hide(0);
    setTimeout(function() {
        $('#insert1').fadeOut('fast');
    }, 30000)
</script>