<?php

$page = "appointment";
$show = 'ap';
$title = "appointment";

session_start();

include "../admin/config.php";

include 'header.php';

if ($_SESSION["role"] == 2) {
    $title = "Patient";
} else if ($_SESSION["role"] == 3) {
    $title = "Hospital";
    header('location: login.php');
}

?>

<head>
    <title><?php echo "$title"; ?></title>
</head>

<?php
$alert1 = '<div class="alert alert-danger fixed-top text-center w-50 mt-2 mx-auto rounded-4" id="insert1" role="alert">Name or Email Already Exist!</div>';

?>

<body>

    <!-- THEME CONFIGURATION -->
    <script>
        let themeAttrs = document.documentElement.dataset;

        for (let attr in themeAttrs) {
            if (localStorage.getItem(attr) != null) {
                document.documentElement.dataset[attr] = localStorage.getItem(attr);

                if (theme === 'auto') {
                    document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

                    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                        e.matches ? document.documentElement.dataset.theme = 'dark' : document.documentElement.dataset.theme = 'light';
                    });
                }
            }
        }
    </script>
    <?php include './sidebar.php' ?>
    <!-- MAIN CONTENT -->
    <main>

        <!-- HEADER -->
        <header class="container-fluid d-flex py-6">

            <!-- Top buttons -->
            <div class="d-flex align-items-center ms-auto me-n1 me-lg-n2">

                <!-- Switcher -->
                <?php include 'themeswitcher.php' ?>

                <!-- Separator -->
                <div class="vr bg-gray-700 mx-2 mx-lg-3"></div>

                <!-- Dropdown -->
                <?php include 'public_session.php' ?>
            </div>
        </header>

        <main class="container bg-light-green">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 col-lg-10 px-lg-4 px-xl-8 d-flex flex-column py-5">
                    <div>
                        <!-- Title -->
                        <h1 class="mb-5 h2 text-uppercase display-5">
                            Book APPOINTMENTS
                        </h1>

                        <?php

                        $limit = 6;
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }
                        $offset = ($page - 1) * $limit;

                        $sql = "SELECT * FROM `hospital`
                        ORDER BY H_id DESC LIMIT {$offset},{$limit}";

                        ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Full Name
                                        </label>
                                        <!-- Input -->
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                    </div>
                                </div>
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
                                            Phone
                                        </label>
                                        <!-- Input -->
                                        <input type="tel" name="phone" class="form-control" maxlength="12" placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Hospital Name
                                        </label>

                                        <select name="hospital_name" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled> Select Hospital</option>
                                            <?php

                                            $sql1 = "SELECT * FROM `hospital`
                                            ORDER BY H_id DESC";

                                            $fetch = mysqli_query($conn, $sql1);

                                            foreach ($fetch as $row) {

                                            ?>
                                                <option value='<?php echo $row['H_id'] ?>'><?php echo $row['H_Name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Vaccine Name
                                        </label>


                                        <select name="vaccine_name" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled> Select Vaccine</option>
                                            <?php

                                            $sql1 = "SELECT * FROM `list_of_vaccines`
                                            WHERE `drug_Availability` = 'AVAILABLE'
                                            ORDER BY drug_id DESC";

                                            $fetch = mysqli_query($conn, $sql1);

                                            foreach ($fetch as $row) {

                                            ?>
                                                <option value='<?php echo $row['drug_id'] ?>'><?php echo $row['drug_Name'] ?> | <?php echo $row['drug_Type'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Select Day
                                        </label>
                                        <select name="Days" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled> Select Day</option>
                                            <?php

                                            $sql1 = "SELECT * FROM `Days`";

                                            $fetch = mysqli_query($conn, $sql1);

                                            foreach ($fetch as $row) {

                                            ?>
                                                <option value='<?php echo $row['D_id'] ?>'><?php echo $row['D_days'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Select Time
                                        </label>
                                        <select name="Time" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled> Select Time</option>
                                            <?php

                                            $sql1 = "SELECT * FROM `time`";

                                            $fetch = mysqli_query($conn, $sql1);

                                            foreach ($fetch as $row) {

                                            ?>
                                                <option value='<?php echo $row['T_id'] ?>'><?php echo $row['Time'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                <button type="submit" name="book" class="btn btn-primary mt-3">
                                    Book Now
                                </button>
                        </form>
                    </div> <!-- / .row -->
                    <?php
                    // check exists
                    if (isset($_POST['book'])) {

                        $email = $_POST['email'];
                        $name = $_POST['name'];

                        $e = "SELECT patient_email, patient_name FROM appointment_table WHERE patient_email = '$email' AND patient_name = '$name'";

                        $ee = mysqli_query($conn, $e);

                        if (mysqli_num_rows($ee) > 0) {
                            die($alert1);
                        }
                    }

                    if (isset($_POST['book'])) {

                        $patient_id = $_SESSION["uid"];
                        $patient_name = $_POST["name"];
                        $patient_email = $_POST["email"];
                        $patient_phone = $_POST["phone"];
                        $hospital = $_POST['hospital_name'];
                        $vaccine = $_POST['vaccine_name'];
                        $day = $_POST['Days'];
                        $time = $_POST['Time'];
                        $token = random_int(100, 1000);
                        $status = 3;
                        $apprej = 2;


                        $sql = "INSERT INTO `appointment_table`(`vaccine_id`, `patient_id`, `patient_name`, `patient_email`, `patient_phone`, `hospital_id`, `days`,
                        `appointment_time`, `status_id`, `Token_num`, `Approve/Reject`) 
                        VALUES ($vaccine,$patient_id,'$patient_name', '$patient_email', $patient_phone , $hospital, $day, $time, $status, $token, $apprej)";

                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo $alert;
                            echo '<script>window.location.replace("./view_appoinment.php");</script>';
                        }
                    }

                    ?>
                </div>
            </div>
            </div> <!-- / .row -->
        </main>
    </main> <!-- / main -->
</body>

</html>