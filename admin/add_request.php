<?php

$title = "Add Request";

include 'cdn.php';

?>

<head>
    <title><?php echo "$title"; ?></title>
</head>

<body>

    <div class="container my-3 shadow-lg rounded-4 col-lg-6 col-md-8 col-sm-10 col-12">
        <?php
        $alert = '<div class="alert alert-success fixed-top text-center w-75 mt-2 mx-auto rounded-4" id="insert" role="alert">Data Inserted!</div>';
        $alert1 = '<div class="alert alert-danger fixed-top text-center w-75 mt-2 mx-auto rounded-4" id="insert1" role="alert">Vaccine Already Exist!</div>';
        ?>
        <div class="bg-light rounded-4 shadow-lg p-4 position-absolute top-50 start-50 translate-middle col-lg-6 col-md-8 col-sm-12 col-12">
            <div class="text-center mt-3">
                <a href="admin_user.php" class="float-start text-decoration-none">
                    <svg version="1.1" id="Capa_1" fill="#00c4cb" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30.001px" viewBox="0 0 30 30.001" style="enable-background:new 0 0 46.032 46.033;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M5.56 12.077l5.836 -5.865c-0.159 -0.48 -0.52 -0.879 -1.004 -1.077c-0.658 -0.272 -1.419 -0.121 -1.923 0.385L0.682 13.347c-0.91 0.914 -0.91 2.392 0 3.306l7.787 7.827c0.502 0.505 1.265 0.658 1.923 0.386c0.484 -0.2 0.844 -0.598 1.004 -1.077l-5.837 -5.865C3.956 16.311 3.957 13.688 5.56 12.077z" />
                                <path d="M29.962 20.62c-0.91 -3.882 -3.761 -9.291 -12.321 -10.434v-3.423c0 -0.714 -0.433 -1.357 -1.092 -1.629c-0.218 -0.09 -0.447 -0.134 -0.673 -0.134c-0.459 0 -0.911 0.18 -1.249 0.519L6.837 13.347c-0.91 0.914 -0.91 2.391 -0.001 3.306l7.788 7.827c0.337 0.34 0.79 0.519 1.251 0.519c0.226 0 0.454 -0.043 0.672 -0.134c0.66 -0.272 1.092 -0.915 1.092 -1.629V19.923c2.929 0.003 7.145 0.388 10.143 2.257c0.235 0.147 0.502 0.219 0.766 0.219c0.298 0 0.593 -0.091 0.845 -0.271C29.872 21.786 30.096 21.191 29.962 20.62z" />
                            </g>
                        </g>
                    </svg>
                </a>
                <h2 class="text-color text-uppercase fw-bold">Add Vaccine</h2>
            </div>
            <!-- Form Start -->
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="p-4">
                <div class="form-floating rounded-4 shadow-cus my-4">
                    <input type="text" name="vname" class="form-control rounded-4" placeholder="Enter Vaccine Name" required>
                    <label for="floatingInput">Enter Vaccine Name</label>
                </div>
                <div class="form-floating rounded-4 shadow-cus my-5">
                    <input type="text" name="vtype" class="form-control rounded-4" placeholder="Enter vaccine Type" pattern="[A-Za-z]+[0-9]+{4,8}" title="Usernames must be 10 characters or Less" required>
                    <label for="floatingInput">Enter Vaccine Name</label>
                </div>
                <div class="form-group rounded-4 shadow-cus my-5">
                    <select name="availab" class="form-select rounded-4 py-3" aria-label="Default select example">
                        <option selected disabled> Select Availability</option>
                        <option class='my-5 mx-5' value='AVAILABLE'>Available</option>
                        <option class='my-5 mx-5' value='UNAVAILABLE'>UNAvailable</option>
                    </select>
                </div>
                <div class="mt-5 text-end">
                    <input type="submit" name="add_vac" class="btn btn-register rounded-4 py-3" value="Add Vaccine" />
                </div>
            </form>
        </div>

        <?php

        // check exists
        if (isset($_POST['add_vac'])) {

            include "../config.php";

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
            include "../config.php";

            $v_name = $_POST['vname'];
            $v_type = $_POST['vtype'];
            $v_avail = $_POST['availab'];

            $sql = "INSERT INTO list_of_vaccines(`drug_Name`, `drug_Type`, `drug_Availability`) VALUES ('$v_name','$v_type','$v_avail')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo $alert;
                header('location: admin_vaccine.php');
            }
        }

        ?>
    </div>
    </div>

</body>

<script>
    $('#insert').delay(1000).hide(0);
    setTimeout(function() {
        $('#insert1').fadeOut('fast');
    }, 30000)
</script>