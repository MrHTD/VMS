<?php

$page = "booking";
$show = 'booking';

include "../config.php";


session_start();

if (!isset($_SESSION['pemail'])) {
    header('location: login.php');
    exit();
}


if ($_SESSION["role"] == 2) {
    $title = "Patient";
    header('location: login.php');
} else if ($_SESSION["role"] == 3) {
    $title = "Hospital";
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/theme.bundle.css" id="stylesheetLTR" />
    <link rel="icon" href="../assets/favicon/favicon.ico" />
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

    <?php include './sidebar.php' ?>

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
            <h1 class="h2 display-4 text-uppercase">
                Bookings
            </h1>


            <div class="row">
                <div class="col">
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

                        $sql = "SELECT ap.patient_name,ap.`Approve/Reject`, ap.patient_email, ap.patient_phone, da.D_days, ti.Time, st.status, ap.Token_num, lov.drug_Name , hos.H_Name, ap.patient_id
                        FROM `appointment_table` ap 
                        INNER JOIN list_of_vaccines lov ON ap.vaccine_id = lov.drug_id 
                        INNER JOIN hospital hos ON ap.hospital_id = hos.H_id
                        INNER JOIN status st ON ap.status_id = st.status_id
                        INNER JOIN days da ON ap.days = da.D_id 
                        INNER JOIN time ti ON ap.appointment_time = ti.T_id
                        WHERE hospital_id = '" . $_SESSION["hid"] . "' LIMIT {$offset},{$limit}";

                        ?>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table align-middle table-edge table-hover table-nowrap mb-0 text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Vaccine Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Token</th>
                                    </tr>
                                </thead>
                                <?php

                                $fetch = mysqli_query($conn, $sql);

                                foreach ($fetch as $row) {

                                ?>

                                    <tbody class="list">
                                        <tr>
                                            <td><?php echo $row['patient_name'] ?></td>
                                            <td><?php echo $row['patient_email'] ?></td>
                                            <td><?php echo $row['drug_Name'] ?></td>
                                            <td><?php echo $row['patient_phone'] ?></td>
                                            <?php if ($row['Approve/Reject'] == 1) { ?>
                                                <td>
                                                    <?php
                                                    if ($row['status'] == 'Vaccinated') {
                                                    ?>
                                                        <a href="#" class="badge fs-6 bg-success text-white px-3 py-1 rounded-3"><?php echo $row['status'] ?></a>
                                                    <?php
                                                    } else if ($row['status'] == 'Booked') {
                                                    ?>
                                                        <a href="booked.php?sid=<?php echo $row['patient_id'] ?>&s=<?php echo $row['status'] ?>"
                                                        class="badge fs-6 bg-warning text-white px-3 py-1 rounded-3"><?php echo $row['status'] ?></a>
                                                    <?php
                                                    } else if ($row['status'] == 'In Process') {
                                                    ?>
                                                        <a href="process.php?sid=<?php echo $row['patient_id'] ?>&s=<?php echo $row['status'] ?>"
                                                        class="badge fs-6 bg-info text-white px-3 py-1 rounded-3"><?php echo $row['status'] ?></a>
                                                    <?php
                                                    } else if ($row['status'] == 'Not Vaccinated') {
                                                    ?>
                                                        <a href="cancel.php?sid=<?php echo $row['patient_id'] ?>&s=<?php echo $row['status'] ?>"
                                                        class="badge fs-6 bg-danger text-white px-3 py-1 rounded-3"><?php echo $row['status'] ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                if ($row['status'] == 'In Process') {
                                                ?>
                                                    <td><?php echo $row['D_days'] ?></td>
                                                    <td><?php echo $row['Time'] ?></td>
                                                    <td><?php echo $row['Token_num'] ?></td>
                                                <?php
                                                } else if ($row['status'] == 'Vaccinated') {
                                                    echo '<td><h6 class="text-light bg-success d-inline px-3 py-1 rounded-3">Completed</h6></td>';
                                                    echo '<td><h6 class="text-light bg-success d-inline px-3 py-1 rounded-3">Completed</h6></td>';
                                                    echo '<td><h6 class="text-light bg-success d-inline px-3 py-1 rounded-3">Completed</h6></td>';
                                                } else {
                                                    echo '<td><h6 class="text-light bg-info d-inline px-3 py-1 rounded-3">Pending</h6></td>';
                                                    echo '<td><h6 class="text-light bg-info d-inline px-3 py-1 rounded-3">Pending</h6></td>';
                                                    echo '<td><h6 class="text-light bg-info d-inline px-3 py-1 rounded-3">Pending</h6></td>';
                                                }
                                            } else if ($row['Approve/Reject'] == 2) {
                                                ?>
                                                <td>
                                                    <h6 class="text-light bg-dark d-inline px-3 py-1 rounded-3">Waiting for Approval</h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-light bg-dark d-inline px-3 py-1 rounded-3">Waiting for Approval</h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-light bg-dark d-inline px-3 py-1 rounded-3">Waiting for Approval</h6>
                                                </td>
                                            <?php
                                            } else if ($row['Approve/Reject'] == 0) {
                                            ?>
                                                <td>
                                                    <h6 class="text-light bg-danger d-inline px-3 py-1 rounded-3">Rejected</h6>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                        </div> <!-- / .table-responsive -->

                    </div>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container-fluid -->
    </main> <!-- / main -->
    <!-- Theme JS -->
    <script src="../assets/js/theme.bundle.js"></script>

</body>

</html>