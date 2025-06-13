<?php
    include "conn.php";
    session_start();

    if(!empty($_SESSION)){
        $e = $_SESSION['email'];

        $delete = mysqli_query($conn, "DELETE FROM user WHERE email='$e'");

        if($delete == true){
            session_destroy();

            ?>
            <script>
                alert("Deleted Account and Log Out Successfully!");
                window.location.href="login.html";
            </script>

            <?php
        }

    }else{
        ?>
        <script>
            alert("No Account deleted!");
            alert("You must Log in!");
            window.location.href="login.html";
        </script>

        <?php
    }
?>