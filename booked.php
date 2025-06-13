<?php

include "process.php";

$tour = $_GET['tour'];
$price = $_GET['price'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>W-ART</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">W-ART<span>Dungog Sang Iloilo</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
        <li class="nav-item active"><a href="about.html" class="nav-link">About</a></li>
        <li class="nav-item"><a href="destination.html" class="nav-link">Products</a></li>
        <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
         <li class="nav-item"><a href="userpayment.php" class="nav-link">Review Order</a></li>
         <li class="nav-item"><a href="cart.php" class="nav-link">Cart</a></li>
         <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/download (5).jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                  class="fa fa-chevron-right"></i></a></span> <span>Order <i class="fa fa-chevron-right"></i></span>
          </p>
          <h1 class="mb-0 bread">Add To Cart</h1>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section contact-section ftco-no-pt">
    <div class="container">
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form action="process.php" class="bg-light p-5 contact-form" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="des" placeholder="Product"
                value="<?php echo $tour; ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="cost" placeholder="Price "
                value="<?php echo $price; ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Your Email" value="<?php

              if (!empty($_SESSION)) {
                echo $_SESSION['email'];
              }

              ?>" required>
            </div>
            <div class="form-group">
              <input type="date" class="form-control" name="date" placeholder="Date" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="people" placeholder="Quantity" required>
            </div>

            <div class="form-group">
              <select name="transpo" value="" id="" class="form-control" required>
                <option value="" disabled="" selected="">Select Mode of Payment</option>
                <option value="Gcash">Gcash</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Cash On Delivery">Cash On Delivery</option>
              </select>
            </div>

            <div class="form-group">
              <input type="hidden" name="yesCheckboxValue" id="yesCheckboxValue">
              <input type="hidden" name="noCheckboxValue" id="noCheckboxValue">

              <label for="" style="color: black;">Extra Fee for Enhanced Order Safety</label>
              <label for="yesCheckbox" style="color: black; margin-left: 10px;">Yes</label>
              <input type="checkbox" id="yesCheckbox" name="yesCheckbox" onclick="toggleCheckbox('yesCheckbox')">

              <label for="noCheckbox" style="color: black; margin-left: 10px;">No</label>
              <input type="checkbox" id="noCheckbox" name="noCheckbox" onclick="toggleCheckbox('noCheckbox')">

              <script>
                function toggleCheckbox(checkboxId) {
                  console.log(checkboxId);
                  var otherCheckboxId = checkboxId === 'yesCheckbox' ? 'noCheckbox' : 'yesCheckbox';
                  var checkbox = document.getElementById(checkboxId);
                  var otherCheckbox = document.getElementById(otherCheckboxId);
                  if (checkbox.checked) {
                    otherCheckbox.disabled = true;
                    console.log(checkbox.checked)
                  } else {
                    otherCheckbox.disabled = false;
                    console.log(checkbox.checked)
                  }
                  if (checkboxId == "yesCheckbox") {
                    document.getElementById(checkboxId + "Value").value = "Yes";
                  } else if (checkboxId == "noCheckbox") {
                    document.getElementById(checkboxId + "Value").value = "No";

                  }

                  // Set the value of the clicked checkbox to the corresponding hidden input field
                  // var value = checkbox.checked ? "Yes" : "No";
                  // document.getElementById(checkboxId + "Value").value = value;

                  // // Clear the value of the other checkbox
                  // document.getElementById(otherCheckboxId + "Value").value = "";
                }
              </script>

            </div>

            <div class="form-group">
              <input type="submit" name="book" value="Order" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        </div>

        <div class="col-md-6 d-flex">
          <div id="backgroundDiv"
            style="background-image: url(<?php echo isset($_GET['image']) ? $_GET['image'] : 'images/banig.jpg'; ?>); background-size: cover; background-repeat: no-repeat; width: 100%;">
          </div>
        </div>
      </div>

      <br>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <a href="userpayment.php" class="btn btn-primary py-3 px-5">View Order</a>
          </div>
        </div>

      </div>
  </section>

  <section class="ftco-intro ftco-section ftco-no-pt">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 text-center">
          <div class="img" style="background-image: url(images/bg_2.jpg);">
            <div class="overlay"></div>
            <h2>We Are Pinas Explore</h2>
            <p>We can manage your dream building A small river named Duden flows by their place</p>
            <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Ask For A Quote</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md pt-5">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <h2 class="ftco-heading-2">About</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
              <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5 border-left">
          <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Infromation</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
              <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
              <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
              <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
              <li><a href="#" class="py-2 d-block">Call Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5 border-left">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <h2 class="ftco-heading-2">Experience</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Adventure</a></li>
              <li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
              <li><a href="#" class="py-2 d-block">Beach</a></li>
              <li><a href="#" class="py-2 d-block">Nature</a></li>
              <li><a href="#" class="py-2 d-block">Camping</a></li>
              <li><a href="#" class="py-2 d-block">Party</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5 border-left">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map-marker"></span><span class="text">Iloilo Philippines</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+639 1816 22346</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                      class="text">pinasexplore@gmail.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>
            Copyright &copy;
            <script>document.write(new Date().getFullYear());</script> All rights reserved by I-Tech
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>