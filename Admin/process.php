<?php

include "conn.php";
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM admin_login WHERE email='$email' AND password='$pass'");

    $num_check = mysqli_num_rows($check);

    if ($num_check <= 0) {
        ?>
        <script>
            alert("Wrong email and Password");
            window.location.href = "../admin_login.html";
        </script>
        <?php
    } else {
        $_SESSION['email'] = $email;
        ?>
        <script>
            alert("Login Successfully");
            window.location.href = "../Admin/index.php";
        </script>
        <?php
    }

}

?>