<?php

$page = "areport";
$show = 'ap';

include "../admin/config.php";

session_start();

if (!isset($_SESSION['pemail'])) {
    header('location: login.php');
    exit();
}


if ($_SESSION["role"] == 2) {
    $title = "View Appointment";
} else {
    header('location: login.php');
}
include_once "header.php";

?>

<head>
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
                APPOINTMENTS
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

                        $sql = "SELECT ap.patient_name, ap.patient_email, ap.patient_phone, da.D_days, ti.Time, st.status, ap.Token_num, lov.drug_Name ,`Approve/Reject`, hos.H_Name, ap.patient_id
                        FROM `appointment_table` ap 
                        INNER JOIN list_of_vaccines lov ON ap.vaccine_id = lov.drug_id 
                        INNER JOIN hospital hos ON ap.hospital_id = hos.H_id
                        INNER JOIN status st ON ap.status_id = st.status_id
                        INNER JOIN days da ON ap.days = da.D_id 
                        INNER JOIN time ti ON ap.appointment_time = ti.T_id
                        WHERE patient_id = '" . $_SESSION["uid"] . "' LIMIT {$offset},{$limit}";

                        ?>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table align-middle table-edge table-hover table-nowrap mb-0 text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Vaccine Name</th>
                                        <th>Hospital Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Token</th>
                                    </tr>
                                </thead>
                                <?php

                                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                ?>

                                        <tbody class="list">
                                            <tr>
                                                <td><?php echo $row['patient_name'] ?></td>
                                                <td><?php echo $row['patient_email'] ?></td>
                                                <td><?php echo $row['drug_Name'] ?></td>
                                                <td><?php echo $row['H_Name'] ?></td>
                                                <td><?php echo $row['patient_phone'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['Approve/Reject'] == 1 OR $row['Approve/Reject'] == 2) {
                                                        if ($row['status'] == 'Vaccinated') {
                                                            echo '<h6 class="text-light bg-success d-inline px-3 py-1 rounded-3">Completed</h6>';
                                                        } else if ($row['status'] == 'In Process') {
                                                            echo '<h6 class="text-light bg-warning d-inline px-3 py-1 rounded-3">In Process</h6>';
                                                        } else if ($row['status'] == 'Booked') {
                                                            echo '<h6 class="text-light bg-warning d-inline px-3 py-1 rounded-3">Booked</h6>';
                                                        } else if ($row['status'] == 'Not Vaccinated') {
                                                            echo '<h6 class="text-light bg-danger d-inline px-3 py-1 rounded-3">Cancel</h6>';
                                                        }
                                                    }else if($row['Approve/Reject'] == 0){
                                                        echo '<h6 class="text-light bg-danger d-inline px-3 py-1 rounded-3">Rejected</h6>';
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
                                                    echo '<td></td>';
                                                    echo '<td></td>';
                                                    echo '<td></td>';
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    <?php
                                    }
                                } else {
                                    ?>

                                    <tbody class="list">
                                        <tr>
                                            <td colspan="10">
                                                <h1 class="h1">No Appointments Found.</h1>
                                            </td>
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
</body>

</html>