<?php
include "process.php";

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
  <link href="#" rel="stylesheet" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    ::-webkit-scrollbar {
      width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    body {
      margin: 0;
      padding: 0;
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/bg_1.jpg");
      background-size: cover;

    }

    #profilecontainer {
      width: 350px;
      height: 450px;
      background-color: white;
      border-radius: 8px;
      position: relative;
      top: 100px;
      left: 38%;
      box-shadow: 0 0 25px black;
    }

    #part1 {
      width: 350px;
      height: 300px;
      background-color: #3b579d;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }

    .hr {
      border: 1px solid black;
      margin-bottom: -7px;
    }

    #dropdown {
      width: 40px;
      height: 0;
      border: none;
      background-color: transparent;
      cursor: pointer;
      position: relative;
      top: -45px;
      left: 15px;
    }

    #person {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 5px solid white;
      position: relative;
      top: 15%;
      left: 36%;
      cursor: pointer;
    }

    #name {
      font-family: "Rubik", sans-serif;
      position: relative;
      top: 55px;
      text-align: center;
      font-size: 20px;
      color: white;
    }

    .skill {
      position: relative;
      top: 45px;
      left: 24.5%;
      color: gainsboro;
      background-color: transparent;
      border: none;
      font-family: "Rubik", sans-serif;
      font-size: 15px;
    }

    #graphic,
    #ui {
      border-left: 1px solid gray;
    }

    .fa-facebook,
    .fa-twitter,
    .fa-instagram {
      position: relative;
      top: 40px;
      left: 32%;
      color: #f1f3f5;
      margin-left: 15px;
    }

    .fa-facebook:hover {
      color: #49ee88;
    }

    .fa-twitter:hover {
      color: #2caae1;
    }

    .fa-instagram:hover {
      color: #c22660;
    }

    #follow {
      position: relative;
      top: 95px;
      height: 50px;
      width: 150px;
      left: -5%;
      font-size: 20px;
      font-family: "Rubik", sans-serif;
      background-color: white;
      box-shadow: 0 0 15px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      color: #ff9299;
    }

    #follow:hover {
      background-color: cadetblue;
      color: white;
      transition: 0.5s;
    }

    #txt1,
    #txt2,
    #txt3,
    #txt4,
    #txt5,
    #txt6 {
      font-family: "Rubik", sans-serif;
      font-size: 16px;
    }

    #txt1 {
      position: relative;
      top: 50px;
      left: 10%;
      color: gray;
    }

    #txt2 {
      position: relative;
      top: 45px;
      left: 16%;
    }

    #txt3 {
      position: relative;
      top: -30px;
      left: 37%;
      color: gray;
    }

    #txt4 {
      position: relative;
      top: -35px;
      left: 41%;
    }

    #txt5 {
      position: relative;
      top: -110px;
      left: 68%;
      color: gray;
    }

    #txt6 {
      position: relative;
      top: -115px;
      left: 74%;
    }

    #next {
      width: 280px;
      height: 450px;
      background-color: rgb(20, 20, 35);
      position: relative;
      top: -540px;
      left: 0%;
      border-top-left-radius: 8px;
      border-bottom-left-radius: 8px;
      display: none;
    }

    #cross2 {
      position: relative;
      top: -5px;
      left: 15px;
      color: white;
    }

    #cross2:hover {
      color: red;
      transition: 0.5s;
    }

    #person2 {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      border: 5px solid white;
      position: relative;
      top: 30px;
      left: 24.5%;
      cursor: pointer;
    }

    #name2,
    #phone {
      font-family: "Rubik", sans-serif;
      position: relative;
      top: 35px;
      text-align: center;
      font-size: 17px;
      color: gainsboro;
    }

    #phone {
      position: relative;
      top: 25px;
    }

    .fa-mobile-alt,
    #code {
      margin-right: 10px;
    }

    .button {
      width: 100%;
      height: 40px;
      margin-bottom: 10px;
      font-size: 20px;
      font-family: "Rubik", sans-serif;
      color: white;
      background-color: transparent;
      border: none;
    }

    .button:hover {
      color: cadetblue;
      background-color: rgb(20, 70, 35);
      font-size: 25px;
      transition: 0.3s;
      border-left: 6px solid darkred;
    }

    #project {
      margin-top: 35px;
    }

    @media only screen and (max-width: 830px) {
      #profilecontainer {
        position: relative;
        left: 20%;
      }
    }

    @media only screen and (max-width: 620px) {
      #profilecontainer {
        position: relative;
        left: 10%;
      }
    }

    @media only screen and (max-width: 530px) {
      #profilecontainer {
        position: relative;
        left: 4%;
      }
    }



    .content {
      flex: 1;
    }

    .bookings {
      position: fixed;
      top: 0;
      right: 0;
      height: 100%;
      /* Adjust width as needed */
      background-color: white;
      width: 400px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: -2px 0 4px rgba(0, 0, 0, 0.1);
      z-index: 2;
      overflow-y: auto;
      /* Add scrollbar if content exceeds height */
    }

    #part1 .bookings-link {
      text-decoration: none;
      color: black;
    }

    .hidden {
      display: none;
    }

    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: transparent;
      border: none;
      cursor: pointer;
    }

    #part1 .bookings-link i {
      position: relative;
      display: block;
      font-size: 24px;
      color: white;
      top: 20px;
      right: 20px;
      float: right;

    }

    #part1 .home i {
      position: absolute;
      display: flex;
      font-size: 24px;
      top: 20px;
      right: 20px;
      left: 25px;
      color: white;

    }

    .mess{
      border: 2px solid black;
      border-style: dashed;
      margin: 10px;
    }

    .mess .h3, .p{
      margin-left: 10px;
      margin-top: 10px;
      font-size: 23px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .mess .p{
      font-size: 15px;
    }
  </style>
</head>

<body className="snippet-body">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <body>
    <div id="container">
      <div id="profilecontainer">
        <div id="part1">
          <a href="index.html" class="home"><i class="fa-solid fa-house"></i></a>
          <a href="#" class="bookings-link"><i class="fa-regular fa-envelope"></i></a>

          <!----- Announcement ----->
          <div class="bookings hidden">
            <button class="close-btn">Close</button>
            <h2 style="border-bottom: 2px solid #3b579d; margin-bottom: 40px; color: blue; margin-top: 20px; text-align: center; padding-bottom: 20px;">Message</h2>
            <?php
            include "conn.php";
            $query = "SELECT * FROM announcements ORDER BY date DESC";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='mess'>";
                echo "<h3 class='h3'>{$row['message']}</h3>";
                echo "<p class='p'>Date: {$row['date']}</p>";
                echo "</div>";
              }
            } else {
              echo "No announcements available";
            }
            ?>
        </div>
        <img id="person" src="images/prof.jpg">
        <p id="name">
          <?php echo $defaultName; ?>
        </p>
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="update.php"><button id="follow" style="left: -6px;">EDIT</button></a>
      </div>
      <div id="part2">
        <p id="txt1">Execution</p>
        <a href="login.html" style="color: black; text-decoration: none;">
          <p style="cursor: pointer;" id="txt2">Log In</p>
        </a>
        <p id="txt3">Maneuver</p>
        <a href="logout.php" style="text-decoration: none; color: black;">
          <p style="cursor: pointer;" id="txt4">Log Out</p>
        </a>
        <p id="txt5">Procedure</p>
        <a href="delete.php" style="text-decoration: none; color: black;">
          <p onclick="" style="cursor: pointer;" id="txt6">Delete</p>
        </a>
      </div>
    </div>
    </div>
  </body>
  <script type="text/javascript"
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="#"></script>
  <script type="text/javascript" src="#"></script>
  <script type="text/javascript" src="#"></script>
  <script src="script.js"></script>
</body>

</html>