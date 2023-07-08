<div class="dropdown">
    <a href="" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,10">
        <div class="avatar avatar-circle avatar-sm avatar-online border border-cus rounded-circle">
            <img src="./assets/admin_images/<?php echo $_SESSION["img"]; ?>" alt="..." class="avatar-img" width="40" height="40">
        </div>
    </a>

    <div class="dropdown-menu">
        <div class="dropdown-item-text">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-sm avatar-circle border border-cus rounded-circle">
                    <img src="./assets/admin_images/<?php echo $_SESSION["img"]; ?>" alt="..." class="avatar-img" width="40" height="40">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h4 class="mb-0"><?php echo $_SESSION["username"]; ?></h4>
                </div>
            </div>
        </div>

        <hr class="dropdown-divider">

        <a class="dropdown-item" href="./edit_user.php?uid=<?php echo $_SESSION['uid'] ?>">Settings</a>

        <hr class="dropdown-divider">

        <a class="dropdown-item" href="./logout.php">Sign out</a>
    </div>
</div>