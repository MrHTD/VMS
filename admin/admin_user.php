<?php

$page = "user";
$show = 'user';
$title = "User";

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

            <!-- Search -->
            <form class="d-none d-md-inline-block me-auto" action="admin_search.php">
                <div class="input-group input-group-merge">

                    <!-- Input -->
                    <input type="text" class="form-control bg-light-green border-light-green w-250px" name="asearch" placeholder="Search..." aria-label="Search for any term">

                    <!-- Button -->
                    <span class="input-group-text bg-light-green border-light-green p-0">

                        <!-- Button -->
                        <button class="btn btn-primary rounded-2 w-30px h-30px p-0 mx-1" type="button" aria-label="Search button">
                            <svg viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.750 9.812 A9.063 9.063 0 1 0 18.876 9.812 A9.063 9.063 0 1 0 0.750 9.812 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(-3.056 4.62) rotate(-23.025)" />
                                <path d="M16.221 16.22L23.25 23.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                            </svg>
                        </button>
                    </span>
                </div>
            </form>

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
            <h1 class="h2 text-uppercase">
                User Details
            </h1>


            <div class="row">
                <div class="col">

                    <!-- Card -->
                    <div class="card border-0 flex-fill w-100 shadow-lg" id="users">
                        <div class="card-header border-0 card-header-space-between">

                            <!-- Title -->
                            <h2 class="card-header-title h4 text-uppercase">
                                Users
                            </h2>
                            <a href="./add_user.php" class="btn btn-light text-uppercase">
                                Add User
                            </a>

                        </div>

                        <?php

                        $limit = 5;
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }
                        $offset = ($page - 1) * $limit;

                        $sql = "SELECT u.U_id , u.Full_Name, u.Username , u.U_Email , u.U_Password , u.user_img, u.User_Status, r.Role
                        FROM `user` u INNER JOIN `u_role` r ON u.Role = r.id
                        ORDER BY U_id DESC LIMIT {$offset},{$limit}";

                        ?>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table align-middle table-edge text-center table-hover table-nowrap mb-0">
                                <?php

                                $fetch = mysqli_query($conn, $sql);

                                foreach ($fetch as $row) {

                                ?>
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th colspan="2"></th>
                                            <?php
                                            if ($row['User_Status'] !== $row['U_id']) {
                                            ?>
                                                <th>Action</th>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>

                                    <tbody class="list">
                                        <tr>
                                            <td><?php echo $row['Full_Name'] ?></td>
                                            <td><?php echo $row['Username'] ?></td>
                                            <td><?php echo $row['U_Email'] ?></td>
                                            <td><?php echo $row['Role'] ?></td>
                                            <td><?php if ($row['User_Status'] == 0) {
                                                    echo 'Deactive';
                                                } else {
                                                    echo 'Active';
                                                } ?>
                                            </td>
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
                                                <?php
                                                if ($row['User_Status'] !== $row['U_id']) {
                                                ?>
                                                    <a href="delete_user.php?uid=<?php echo $row['U_id'] ?>" class="btn btn-light rounded-3">Delete</a>
                                                <?php
                                                }
                                                ?>
                                            </td>
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

                                    $sql1 = "SELECT * FROM `user`";

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
                                            echo '<li class="page-item"><a class="page-link border-0 rounded me-2" href="admin_user.php?page=' . ($page - 1) . '">Previous</a></li>';
                                        }

                                        for ($i = $startPage; $i <= $endPage; $i++) {
                                            if ($i == $page) {
                                                $active = "active";
                                            } else {
                                                $active = "";
                                            }
                                            echo '<li class="page-item ' . $active . '"><a class="page-link border-0 rounded px-4 me-2" href="admin_user.php?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        if ($total_page > $page) {
                                            echo '<li class="page-item"><a class="page-link border-0 rounded me-2" href="admin_user.php?page=' . ($page + 1) . '">Next</a></li>';
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