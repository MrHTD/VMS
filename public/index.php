<?php

include "../admin/config.php";

session_start();

if (isset($_SESSION['pemail'])) {
    header('location: login.php');
    exit();
}

if ($_SESSION["role"] == 2) {
    $title = "Patient";
    $page = "patient";
    $show = 'first';
} else if ($_SESSION["role"] == 3) {
    $title = "Hospital";
    $page = "hospital";
    $show = 'first';
}

include_once 'header.php';

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../admin/assets/css/theme.bundle.css" id="stylesheetLTR" />
    <link rel="icon" href="../admin/assets/favicon/favicon.ico" />
    <title><?php echo "$title"; ?></title>
</head>

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
    <?php include_once './sidebar.php' ?>

    <!-- MAIN CONTENT -->
    <main>

        <!-- HEADER -->
        <header class="container-fluid d-flex py-6 mb-4">

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

        <div class="container-fluid">

            <!-- Title -->
            <h1 class="display-4 text-uppercase">
                Dashboard
            </h1>


            <div class="row">
                <div class="col">

                    <?php if ($_SESSION["role"] == 2) { ?>
                        <!-- Card -->
                        <div class="card border-0 flex-fill w-100 shadow-lg" id="users">
                            <div class="card-header border-0 card-header-space-between">

                            </div>

                            <?php

                            $limit = 6;
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }
                            $offset = ($page - 1) * $limit;

                            $sql = "SELECT * FROM `patient_table` WHERE patient_id = '" . $_SESSION["uid"] . "'
                            ORDER BY patient_id DESC LIMIT {$offset},{$limit}";

                            ?>
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table align-middle table-edge table-hover table-nowrap mb-0 text-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Phone no</th>
                                            <th>Added on</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    $fetch = mysqli_query($conn, $sql);

                                    foreach ($fetch as $row) {

                                    ?>

                                        <tbody class="list">
                                            <tr>
                                                <td><?php echo $row['patient_full_name'] ?></td>
                                                <td><?php echo $row['patient_father_name'] ?></td>
                                                <td><?php echo $row['patient_email_address'] ?></td>
                                                <td><?php echo $row['patient_date_of_birth'] ?></td>
                                                <td><?php echo $row['patient_gender'] ?></td>
                                                <td><?php echo $row['patient_address'] ?></td>
                                                <td><?php echo $row['patient_phone_no'] ?></td>
                                                <td><?php echo $row['patient_added_on'] ?></td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div> <!-- / .table-responsive -->

                        </div>
                    <?php

                    } else if ($_SESSION["role"] == 3) {

                    ?>

                        <!-- Card -->
                        <div class="card border-0 flex-fill w-100 shadow-lg" id="users">
                            <div class="card-header border-0 card-header-space-between">

                            </div>

                            <?php

                            $limit = 6;
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }
                            $offset = ($page - 1) * $limit;

                            $sql = "SELECT * FROM `hospital` WHERE H_id = '" . $_SESSION["hid"] . "'
                            LIMIT {$offset},{$limit}";

                            ?>
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table align-middle table-edge table-hover table-nowrap mb-0 text-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Hospital Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    $fetch = mysqli_query($conn, $sql);

                                    foreach ($fetch as $row) {

                                    ?>

                                        <tbody class="list">
                                            <tr>
                                                <td><?php echo $row['H_Name'] ?></td>
                                                <td><?php echo $row['H_Email'] ?></td>
                                                <td><?php echo $row['H_Address'] ?></td>
                                                <td><?php echo $row['H_Tel'] ?></td>
                                                <td>
                                                    <a href="edit_public_hospital.php?hid=<?php echo $row['H_id'] ?>" class="btn btn-light rounded-3">Edit</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div> <!-- / .table-responsive -->

                        </div>

                    <?php
                    }

                    ?>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container-fluid -->
    </main> <!-- / main -->
</body>

</html>