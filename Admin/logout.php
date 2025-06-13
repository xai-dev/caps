<?php
    session_start(); 
    include "../Admin/process.php";
    if(empty($_SESSION['email'])){
        echo "<script>
                alert('You Can\\'t Log Out, You must Log in first!');
                window.location.href = '../Admin/admin_login.html';
              </script>";
    } else {
        session_destroy();
        echo "<script>
                alert('Log Out Successfully!');
                window.location.href = '../Admin/admin_login.html';
              </script>";
    }
?>
