<?php

$page = "booking";
$show = "booking";
$title = "Booking";

include "./config.php";

include 'header.php';

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
                <?php include 'admin_session.php' ?>
            </div>
        </header>

        <div class="container-fluid">

            <!-- Title -->
            <h1 class="h1 text-uppercase">
                View Bookings
            </h1>


            <div class="row">
                <div class="col">

                    <!-- Card -->
                    <div class="card border flex-fill w-100 shadow-lg" id="users">
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

                        $sql = "SELECT ap.appointment_id, ap.patient_name, ap.patient_email, ap.`Approve/Reject`, ap.patient_phone,
                        da.D_days, ti.Time, st.status, ap.Token_num, lov.drug_Name , hos.H_Name, ap.patient_id
                        FROM `appointment_table` ap 
                        INNER JOIN list_of_vaccines lov ON ap.vaccine_id = lov.drug_id 
                        INNER JOIN hospital hos ON ap.hospital_id = hos.H_id
                        INNER JOIN status st ON ap.status_id = st.status_id
                        INNER JOIN days da ON ap.days = da.D_id 
                        INNER JOIN time ti ON ap.appointment_time = ti.T_id
                        ORDER BY ap.appointment_id DESC 
                        LIMIT {$offset},{$limit}";

                        ?>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table align-middle table-edge table-hover text-center table-nowrap mb-0 text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
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

                                $fetch = mysqli_query($conn, $sql);

                                foreach ($fetch as $row) {

                                ?>

                                    <tbody class="list">
                                        <tr>
                                            <td><?php echo $row['appointment_id'] ?></td>
                                            <td><?php echo $row['patient_name'] ?></td>
                                            <td><?php echo $row['patient_email'] ?></td>
                                            <td><?php echo $row['drug_Name'] ?></td>
                                            <td><?php echo $row['H_Name'] ?></td>
                                            <td><?php echo $row['patient_phone'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['Approve/Reject'] == 1) {
                                                    if ($row['status'] == 'Vaccinated') {
                                                ?>
                                                        <a class="badge fs-6 bg-success text-white px-3 py-1 rounded-3"><?php echo $row['status'] ?></a>
                                                    <?php
                                                    } else if ($row['status'] == 'Booked') {
                                                    ?>
                                                        <a class="badge fs-6 bg-warning text-white px-3 py-1 rounded-3"><?php echo $row['status'] ?></a>
                                                    <?php
                                                    } else if ($row['status'] == 'In Process') {
                                                    ?>
                                                        <a class="badge fs-6 bg-info text-white px-3 py-1 rounded-3"><?php echo $row['status'] ?></a>
                                                    <?php
                                                    } else if ($row['status'] == 'Not Vaccinated') {
                                                    ?>
                                                        <a class="badge fs-6 bg-danger text-white px-3 py-1 rounded-3"><?php echo $row['status'] ?></a>
                                                <?php
                                                    }
                                                } else if ($row['Approve/Reject'] == 0) {
                                                    echo '<h6 class="text-light bg-danger d-inline px-3 py-1 rounded-3">Rejected</h6>';
                                                } else if ($row['Approve/Reject'] == 2) {
                                                    echo '<h6 class="text-light bg-dark d-inline px-3 py-1 rounded-3">Waiting for Approval</h6>';
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
                                ?>
                            </table>
                        </div> <!-- / .table-responsive -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-5 text-secondary small">
                                    <!-- Showing: <span class="list-pagination-page-first"></span> - <span class="list-pagination-page-last"></span> of <span class="list-pagination-pages"></span> -->
                                </div>

                                <!-- Pagination -->
                                <ul class="pagination list-pagination mb-0">
                                    <!-- pagination start -->
                                    <?php

                                    $sql1 = "SELECT * FROM `appointment_table`";

                                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");


                                    if (mysqli_num_rows($result1) > 0) {

                                        $total_records = mysqli_num_rows($result1);

                                        $total_page = ceil($total_records / $limit);

                                        // pagination limit
                                        $count = 4;
                                        $startPage = max(1, $page - $count);
                                        $endPage = min($total_page, $page + $count);
                                        // pagination limit end

                                        echo '<ul class="pagination justify-content-center">';

                                        if ($page > 1) {
                                            echo '<li class="page-item"><a class="page-link border-0 rounded me-2" href="admin_booking.php?page=' . ($page - 1) . '">Previous</a></li>';
                                        }

                                        for ($i = $startPage; $i <= $endPage; $i++) {
                                            if ($i == $page) {
                                                $active = "active";
                                            } else {
                                                $active = "";
                                            }
                                            echo '<li class="page-item ' . $active . '"><a class="page-link border-0 rounded px-4 me-2" href="admin_booking.php?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        if ($total_page > $page) {
                                            echo '<li class="page-item"><a class="page-link border-0 rounded me-2" href="admin_booking.php?page=' . ($page + 1) . '">Next</a></li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        echo '<h3 class="text-center h2">No Records Found</h3>';
                                    }

                                    ?>
                                    <!-- pagination end -->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container-fluid -->
    </main> <!-- / main -->
</body>

</html>