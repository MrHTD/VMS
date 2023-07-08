<?php

$title = "search";

include "config.php";

include "header.php";

include './sidebar.php';

?>

<head>
    <title><?php echo $title; ?></title>
</head>

<body>

    <?php
    // patient search
    if (isset($_GET['psearch'])) {
        $search = mysqli_real_escape_string($conn, $_GET['psearch']);
    ?>

        <!-- MAIN CONTENT -->
        <main>

            <div class="container-fluid">

                <div class="row">
                    <div class="col">

                        <!-- Card -->
                        <div class="card border-0 flex-fill w-100 mt-5 shadow-lg" id="users">
                            <div class="card-header border-0 card-header-space-between">

                                <!-- Title -->
                                <h2 class="card-header-title h1 text-uppercase">
                                    <b>Search: <?php echo $search; ?></b>
                                </h2>

                            </div>
                            <?php

                            $sql = "SELECT * FROM `patient_table`
                            WHERE patient_email_address LIKE '%{$search}%' OR patient_full_name LIKE '%{$search}%' OR patient_father_name LIKE '%{$search}%' OR patient_gender LIKE '{$search}%'
                            OR patient_address LIKE '%{$search}%' OR patient_phone_no LIKE '%{$search}%' ORDER BY patient_id DESC";

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

                                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                                            <tbody class="list">
                                                <tr>
                                                    <td><?php echo $row['patient_full_name'] ?></td>
                                                    <td><?php echo $row['patient_father_name'] ?></td>
                                                    <td><?php echo $row['patient_email_address'] ?></td>
                                                    <td><?php echo $row['patient_date_of_birth'] ?></td>
                                                    <td><?php echo $row['patient_gender'] ?></td>
                                                    <td class="text-wrap"><?php echo $row['patient_address'] ?></td>
                                                    <td><?php echo $row['patient_phone_no'] ?></td>
                                                    <td><?php echo $row['patient_added_on'] ?></td>
                                                </tr>
                                            </tbody>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td colspan="10">
                                                    <h1>No Records Found</h1>
                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <?php
                                        // user search
                                    }
                                } else if (isset($_GET['asearch'])) {
                                    $search = mysqli_real_escape_string($conn, $_GET['asearch']);
    ?>
    <!-- MAIN CONTENT -->
    <main>

        <div class="container-fluid">

            <div class="row">
                <div class="col">

                    <!-- Card -->
                    <div class="card border-0 flex-fill w-100 mt-5 shadow-lg" id="users">
                        <div class="card-header border-0 card-header-space-between">

                            <!-- Title -->
                            <h2 class="card-header-title h1 text-uppercase">
                                <b>Search: <?php echo $search; ?></b>
                            </h2>

                        </div>
                        <?php

                                    $sql = "SELECT u.U_id , u.Full_Name, u.Username , u.U_Email , u.U_Password , u.user_img, u.User_Status, r.Role
                            FROM `user` u INNER JOIN `u_role` r ON u.Role = r.id 
                            WHERE u.Full_Name LIKE '%{$search}%' OR u.Username LIKE '%{$search}%' OR u.U_Email LIKE '%{$search}%' OR u.Role LIKE '%{$search}%'
                            ORDER BY U_id DESC";

                        ?>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table align-middle table-edge text-center table-hover table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th colspan="2">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php

                                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tbody class="list">
                                            <tr>
                                                <td><?php echo $row['Full_Name'] ?></td>
                                                <td><?php echo $row['Username'] ?></td>
                                                <td><?php echo $row['U_Email'] ?></td>
                                                <td><?php echo $row['Role'] ?></td>
                                                <td><?php echo $row['User_Status'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['User_Status'] == 0) {
                                                    ?>
                                                        <a href="active.php?uid=<?php echo $row['U_id'] ?>" class="btn btn-sm btn-success rounded-3">Active</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="deactive.php?uid=<?php echo $row['U_id'] ?>" class="btn btn-sm btn-danger rounded-3">Deactive</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="edit_user.php?uid=<?php echo $row['U_id'] ?>" class="btn btn-light rounded-3">Edit</a>
                                                    <a href="delete_user.php?uid=<?php echo $row['U_id'] ?>" class="btn btn-light rounded-3">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="10">
                                                <h1 class="h1">No Records Found.</h1>
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                            <?php


                            ?>
                        </div> <!-- / .table-responsive -->
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container-fluid -->
    </main> <!-- / main -->
<?php
                                    }
                                } else
                                    // hospitalsearch
                                    if (isset($_GET['hsearch'])) {
                                        $search = mysqli_real_escape_string($conn, $_GET['hsearch']);
?>

<!-- MAIN CONTENT -->
<main>

    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <!-- Card -->
                <div class="card border-0 flex-fill w-100 mt-5 shadow-lg" id="users">
                    <div class="card-header border-0 card-header-space-between">

                        <!-- Title -->
                        <h2 class="card-header-title h1 text-uppercase">
                            <b>Search: <?php echo $search; ?></b>
                        </h2>

                    </div>
                    <?php

                                        $sql = "SELECT * FROM `hospital`
                        WHERE H_Name LIKE '%{$search}%' OR H_Address LIKE '%{$search}%' OR H_Tel LIKE '%{$search}%'
                        ORDER BY H_id DESC";

                    ?>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-middle table-edge text-center table-hover table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Hospital Name</th>
                                    <th>Hospital Address</th>
                                    <th>Hospital Tel</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php

                                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tbody class="list">
                                        <tr>
                                            <td><?php echo $row['H_Name'] ?></td>
                                            <td><?php echo $row['H_Address'] ?></td>
                                            <td><?php echo $row['H_Tel'] ?></td>
                                            <td>
                                                <a href="edit_hospital.php?hid=<?php echo $row['H_id'] ?>" class="btn btn-light rounded-3">Edit</a>
                                                <a href="delete_hospital.php?hid=<?php echo $row['H_id'] ?>" class="btn btn-light rounded-3">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                            }
                                        } else {
                                ?>
                                <tbody>
                                    <tr>
                                        <td colspan="10">
                                            <h1 class="h1">No Records Found.</h1>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                        <?php


                        ?>
                    </div> <!-- / .table-responsive -->
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container-fluid -->
</main> <!-- / main -->

<?php
                                        }
                                    } else if (isset($_GET['vaccsearch'])) {
                                        $search = mysqli_real_escape_string($conn, $_GET['vaccsearch']);
?>

<!-- MAIN CONTENT -->
<main>

    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <!-- Card -->
                <div class="card border-0 flex-fill w-100 mt-5 shadow-lg" id="users">
                    <div class="card-header border-0 card-header-space-between">

                        <!-- Title -->
                        <h2 class="card-header-title h1 text-uppercase">
                            <b>Search: <?php echo $search; ?></b>
                        </h2>

                    </div>
                    <?php

                                        $sql = "SELECT * FROM `list_of_vaccines`
                        WHERE drug_Name LIKE '%{$search}%' OR drug_Type LIKE '%{$search}%' OR drug_Availability LIKE '%{$search}%'
                        ORDER BY drug_id DESC";

                    ?>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-middle table-edge text-center table-hover table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Availability</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php

                                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tbody class="list">
                                        <tr>
                                            <td><?php echo $row['drug_Name'] ?></td>
                                            <td><?php echo $row['drug_Type'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['drug_Availability'] == 'AVAILABLE') {
                                                    echo '<h6 class="text-light bg-success d-inline px-3 py-1 rounded-3">AVAILABLE</h6>';
                                                } else {
                                                    echo '<h6 class="text-light bg-danger d-inline px-3 py-1 rounded-3">UNAVAILABLE</h6>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="edit_vaccine.php?vid=<?php echo $row['drug_id'] ?>" class="btn btn-light rounded-3">Edit</a>
                                                <a href="delete_vaccine.php?vid=<?php echo $row['drug_id'] ?>" class="btn btn-light rounded-3">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                            }
                                        } else {
                                ?>
                                <tbody>
                                    <tr>
                                        <td colspan="10">
                                            <h1 class="h1">No Records Found.</h1>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                <?php
                                        }
                                    }
                ?>
                    </div> <!-- / .table-responsive -->
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container-fluid -->
</main> <!-- / main -->

</body>