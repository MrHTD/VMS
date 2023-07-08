<?php

include 'config.php';

    mysqli_query($conn, "UPDATE `user` SET `User_Status`= 0 WHERE U_id='$_GET[uid]'");
    header("Location: admin_user.php");
    
?>