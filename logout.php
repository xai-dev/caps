<?php

    include "process.php";

    if(empty($_SESSION)){
        ?>
        <script>
            alert("You Can't Log Out, You must Log in first!");
            window.location.href="login.html";
        </script>

        <?php
    }else{
        session_destroy();  

    }
    
?>

<script>
    alert("Log Out Successfully!");
    window.location.href="login.html";
</script>