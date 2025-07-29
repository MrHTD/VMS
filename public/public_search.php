<?php

session_start();

$title = "search";

include "../config.php";


include './sidebar.php';


include_once "header.php";

?>

<head>
    <title><?php echo $title; ?></title>
</head>

<?php
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
                            <h2 class="card-header-title h3 text-uppercase">
                                <b>Search: <?php echo $search; ?></b>
                            </h2>

                        </div>
                        <?php

                        $limit = 6;
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }
                        $offset = ($page - 1) * $limit;

                        $sql = "SELECT * FROM `hospital`
                            WHERE H_Name LIKE '%{$search}%' OR H_Address LIKE '%{$search}%' OR H_Email LIKE '%{$search}%' OR H_Tel LIKE '%{$search}%'
                            ORDER BY H_id DESC";

                        ?>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table align-middle table-edge table-hover table-nowrap mb-0 text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Hospital Name</th>
                                        <th>Hospital Email</th>
                                        <th>Hospital Address</th>
                                        <th>Hospital Tel</th>
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
                                                <td><?php echo $row['H_Email'] ?></td>
                                                <td><?php echo $row['H_Address'] ?></td>
                                                <td><?php echo $row['H_Tel'] ?></td>
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
                            }
?>