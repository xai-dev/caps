<?php

include "conn.php";

session_start();

// Booked

if (isset($_POST['book'])) {
    $des = $_POST['des'];
    $cost = $_POST['cost'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $people = $_POST['people'];
    $transpo = $_POST['transpo'];
    $yes = $_POST['yesCheckboxValue'];
    $no = $_POST['noCheckboxValue'];

    $value = (int) $cost;
    $total = $value * $people;


    if (empty($_SESSION)) {
        ?>
        <script>
            alert("Log In First!!");
            window.location.href = "login.html"
        </script>

        <?php

    }

    if (!empty($_SESSION)) {
        if (!empty($no)) {

            $insert = mysqli_query($conn, "INSERT INTO booked VALUES ('0', '$des', '$total', '$email', '$date', '$people', '$transpo', '$no')");

            ?>
            <script>
                alert("Ordered Successfully!");
                window.location.href = "index.html";
            </script>

            <?php


        } else if (!empty($yes)) {


            $insert = mysqli_query($conn, "INSERT INTO booked VALUES ('0', '$des', '$total', '$email', '$date', '$people', '$transpo','$yes' )");

            ?>
                <script>
                    alert("Ordered Successfully!");
                    window.location.href = "hotel.html";
                </script>

            <?php
        }
    } else {
        ?>
        <script>
            alert("Not Book!");
            window.location.href = "booked.php";
        </script>

        <?php
    }



}


// Hotel Booking

if (isset($_POST['book-hotel'])) {
    $hotel = $_POST['hotel'];
    $loc = $_POST['loc'];
    $cost = $_POST['cost'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $people = $_POST['people'];

    $value = (int) $cost;
    $total = $value * $people;

    $insert = mysqli_query($conn, "INSERT INTO hotel VALUES ('0', '$hotel', '$loc', '$total', '$email', '$date', '$people')");

    if (empty($_SESSION)) {
        ?>
        <script>
            alert("Log In First!!");
            window.location.href = "login.html"
        </script>

        <?php

    }

    if ($insert == true) {

        ?>
        <script>
            alert("Booked Hotel Successfully!");
            window.location.href = "hotel.html";
        </script>

        <?php

    } else {
        ?>
        <script>
            alert("Was not Successfully Booked!");
            window.location.href = "hotel.html";
        </script>

        <?php
    }

}




// Sign In

if (isset($_POST['signin'])) {
    $fn = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $check = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    $check_email = mysqli_num_rows($check);

    if ($check_email == true) {
        ?>
        <script>
            alert("Email in use!");
            window.location.href = "signup.html";
        </script>
        <?php
    } else {
        $insert = mysqli_query($conn, "INSERT INTO user VALUES ('0', '$fn', '$email', '$pass') ");
        ?>
        <script>
            alert("Sign In Successfully!");
            window.location.href = "login.html";
        </script>
        <?php
    }
}


// Log In

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$pass'");

    $num_check = mysqli_num_rows($check);

    if ($num_check <= 0) {
        ?>
        <script>
            alert("Wrong email and Password");
            window.location.href = "login.html";
        </script>
        <?php
    } else {
        $_SESSION['email'] = $email;
        ?>
        <script>
            alert("Login Successfully");
            window.location.href = "index.html";
        </script>
        <?php
    }

}



// Profile

$defaultName = "Default";

if (!empty($_SESSION)) {

    $e = $_SESSION['email'];

    $getdetails = mysqli_query($conn, "SELECT * FROM user WHERE email = '$e'");
    while ($row = mysqli_fetch_object($getdetails)) {
        $defaultName = $row->fullname;
    }

}


//Update

$Name = "";
$email = "";
$pass = "";

if (!empty($_SESSION)) {
    $e = $_SESSION['email'];

    $getdetails = mysqli_query($conn, "SELECT * FROM user WHERE email = '$e'");
    while ($row = mysqli_fetch_object($getdetails)) {
        $Name = $row->fullname;
        $email = $row->email;
        $pass = $row->password;

    }

}

if (isset($_POST['update'])) {
    $e = $_SESSION['email'];

    $Uname = $_POST['Uname'];
    $Uemail = $_POST['Uemail'];
    $Upass = $_POST['Upassword'];

    $update = mysqli_query($conn, "UPDATE user SET fullname='$Uname', email='$Uemail', password='$Upass' WHERE email='$e'");

    if ($update == true) {

        $e = $Uemail;

        $_SESSION['email'] = $Uemail;

        ?>
        <script>
            alert("Updated Successfully!");
            window.location.href = "profile.php";
        </script>

        <?php
    } else {
        ?>
        <script>
            alert("Not Update!");
            window.location.href = "update.php";
        </script>

        <?php
    }
}


// For add to cart 

    if(!isset($_SESSION['email'])){
        ?>
        <script>
            alert("Log In First!");
            window.location.href="login.html"
        </script>
        <?php
    }

    if(isset($_POST['addcart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $image = $_POST['product_image'];

        echo($product_name);
        echo($product_price);
        echo ($image);

        $query = mysqli_query(mysql: $conn, query: "INSERT INTO cart (name, price, email, date, image) VALUES
        ('$product_name', '$product_price', '$email', NOW(), '$image')");

        if($query){
            echo "<script> alert('Product Added to Cart!');
            window.location.href = 'cart.php';
            </script>";
        }else{
            echo "<script> alert('Failed to add product to cart!');
            window.location.href = 'index.html';
            </script>";
        }
    }
?>