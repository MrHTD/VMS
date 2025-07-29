<div class="dropdown">
    <a href="" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,10">
        <?php if ($_SESSION["role"] == 3) { ?>
            <div class="avatar avatar-circle avatar-sm avatar-online border border-cus rounded-circle">
                <img src="../assets/admin_images/hospital.jpg" alt="..." class="avatar-img" width="40" height="40">
            </div>
        <?php } else {
        ?>
            <div class="avatar avatar-circle avatar-sm avatar-online border border-cus rounded-circle">
                <img src="../assets/admin_images/patient.png" alt="..." class="avatar-img" width="40" height="40">
            </div>
        <?php
        } ?>
    </a>

    <div class="dropdown-menu">
        <div class="dropdown-item-text">
            <div class="d-flex align-items-center">
                <?php if ($_SESSION["role"] == 3) { ?>
                    <div class="avatar avatar-sm avatar-circle border border-cus rounded-circle">
                        <img src="../assets/admin_images/hospital.jpg" alt="..." class="avatar-img" width="40" height="40">
                    </div>
                <?php } else { ?>
                    <div class="avatar avatar-sm avatar-circle border border-cus rounded-circle">
                        <img src="../assets/admin_images/patient.png" alt="..." class="avatar-img" width="40" height="40">
                    </div>
                <?php } ?>
                <div class="flex-grow-1 ms-3">
                    <h4 class="mb-0"><?php echo $_SESSION["name"]; ?></h4>
                </div>
            </div>
        </div>

        <hr class="dropdown-divider">

        <?php if ($_SESSION["role"] == 3) { ?>
            <a class="dropdown-item" href="edit_public_hospital.php?hid=<?php echo $_SESSION["hid"] ?>">Settings</a>
        <?php } else { ?>
            <a class="dropdown-item" href="edit_public_patient.php?uid=<?php echo $_SESSION["uid"] ?>">Settings</a>
        <?php } ?>

        <hr class="dropdown-divider">

        <a class="dropdown-item" href="./logout.php">Sign out</a>
    </div>
</div>