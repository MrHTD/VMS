<?php

$title = 'Admin | Login';

include "config.php";

session_start();

// on login screen, redirect to dashboard if already logged in
if (isset($_SESSION['email']) AND ($_SESSION["user_role"] == 1)) {
    header('location:admin_patient.php');
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
                    Enter your email address and password to access admin panel
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
                            <button type="submit" name="login" class="btn w-100 btn-primary mt-6 mb-2">Sign in</button>
                        </div>
                    </div> <!-- / .row -->
                </form>
            </div>
            <?php

            if (isset($_POST['login'])) {

                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = base64_encode($_POST['password']);

                $sql = "SELECT * FROM user WHERE U_Email = '{$email}' AND U_Password = '{$password}' AND `Role` = 1 AND User_Status = 1";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION["uid"] = $row['U_id'];
                        $_SESSION["email"] = $row['U_Email'];
                        $_SESSION["user_role"] = $row['U_Role'];
                        $_SESSION["username"] = $row['Username'];
                        $_SESSION["img"] = $row['user_img'];

                        header("Location: {$hostname}/admin/admin_patient.php");
                    }
                } else {
                    echo '<div class="fixed-top text-center alert alert-danger w-50 mx-auto" role="alert">Username and Password are not matched.</div>';
                }
            }
            ?>
        </div> <!-- / .row -->
    </main> <!-- / main -->
    <script src="../assets/js/theme.bundle.js"></script>
</body>