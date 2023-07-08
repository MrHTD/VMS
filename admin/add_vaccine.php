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

<body class="bg-light-green">

    <main class="container" id="login">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 py-6">

                <?php
                $alert1 = '<div class="alert alert-danger fixed-top text-center w-75 mt-2 mx-auto rounded-4" id="insert1" role="alert">Vaccine Already Exist!</div>';
                ?>
                <!-- Title -->
                <h1 class="mb-2 text-center text-uppercase">
                    Add Vaccine
                </h1>

                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    Vaccine name
                                </label>

                                <!-- Input -->
                                <input type="text" name="vname" class="form-control" placeholder="Vaccine Name" required>
                            </div>
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    Vaccine Type
                                </label>

                                <!-- Input -->
                                <input type="text" name="vtype" class="form-control" placeholder="Vaccine Type" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <!-- Label -->
                                <label class="form-label">
                                    Availability
                                </label>
                                <select name="availab" class="form-select" aria-label="Default select example">
                                    <option selected disabled> Select Availability</option>
                                    <option value='AVAILABLE'>Available</option>
                                    <option value='UNAVAILABLE'>UnAvailable</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row align-items-center text-center">
                        <div class="col-12">
                            <!-- Button -->
                            <button type="submit" name="add_vac" class="btn w-100 btn-primary mt-6 mb-2">Add Vaccine</button>
                        </div>
                    </div> <!-- / .row -->
                </form>
            </div>
        </div>
        <?php

        // check exists
        if (isset($_POST['add_vac'])) {

            include "config.php";

            $v_name = $_POST['vname'];

            $e = "SELECT drug_Name FROM list_of_vaccines WHERE drug_Name = '$v_name'";

            $ee = mysqli_query($conn, $e);

            if (mysqli_num_rows($ee) > 0) {
                die($alert1);
            }
        }

        ?>

        <?php

        if (isset($_POST['add_vac'])) {
            include "./config.php";

            $v_name = $_POST['vname'];
            $v_type = $_POST['vtype'];
            $v_avail = $_POST['availab'];

            $sql = "INSERT INTO list_of_vaccines(`drug_Name`, `drug_Type`, `drug_Availability`) VALUES ('$v_name','$v_type','$v_avail')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>window.location.replace("./admin_vaccine.php");</script>';
            }
        }

        ?>
        </div>

</body>

<!-- Theme JS -->
<script src="assets/js/theme.bundle.js"></script>