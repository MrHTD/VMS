<?php

$title = "Edit Vaccine";

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
                <!-- Title -->
                <h1 class="mb-2">
                    Edit Vaccine Details
                </h1>

                <!-- Subtitle -->
                <p class="text-secondary">
                    You Can Edit Your Vaccine Details Here:
                </p>
                <?php

                $drug_id = $_GET['vid'];

                $sql = "SELECT * FROM `list_of_vaccines`
                WHERE drug_id = {$drug_id}";

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
                                            Vaccine Name
                                        </label>

                                        <!-- Input -->
                                        <input type="text" name="vname" class="form-control" value="<?php echo $row['drug_Name'] ?>" placeholder="Hospital Name" required>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Vaccine Type
                                        </label>

                                        <!-- Input -->
                                        <input type="text" name="vtype" class="form-control" value="<?php echo $row['drug_Type'] ?>" placeholder="Hospital Email Address" required>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">

                                        <!-- Label -->
                                        <label class="form-label">
                                            Select Availaibility
                                        </label>

                                        <!-- Input -->
                                        <select name="avail" class="form-select" aria-label="Default select example">
                                            <option selected disabled> Select Availability</option>
                                            <?php

                                            if ($row['drug_Availability'] == 'AVAILABLE') {
                                                echo "<option value='AVAILABLE' selected>AVAILABLE</option>
                                        <option value='UNAVAILABLE'>UNAVAILABLE</option>";
                                            } else {
                                                echo "<option value='AVAILABLE'>AVAILABLE</option>
                                        <option value='UNAVAILABLE' selected>UNAVAILABLE</option>";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <div class="col-12">

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

                $vname = $_POST['vname'];
                $vtype = $_POST['vtype'];
                $avail = $_POST['avail'];

                $sql = "UPDATE list_of_vaccines SET `drug_Name`='$vname',`drug_Type`='$vtype',`drug_Availability`='$avail'
                WHERE drug_id = {$drug_id}";

                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<script>window.location.replace("./admin_vaccine.php");</script>';
                }
            }
            ?>

        </div>
        </div> <!-- / .row -->
    </main> <!-- / main -->
    <!-- Theme JS -->
    <script src="./../assets/js/theme.bundle.js"></script>
</body>