<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>RentToday</title>
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
      <!-- CSS Stylesheets -->
      <link rel="stylesheet" href="Home/assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="Home/assets/css/Navigation-Clean.css">
      <link rel="stylesheet" href="Home/assets/css/styles.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="Home/css/styles.css">
      <!-- Font Awesome -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
      <!-- Bootstrap Scripts -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </head>
   <body>
      <!-- Nav Bar -->
      <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean">
         <div class="container">
            <span></span>
            <div style="width: 100;height: 80;">
               <img class="img-fluid" src="Home/assets/img/Untitled%20design.png" style="width: 80;height: 100;" width="80" height="60">
            </div>
            <a class="navbar-brand" href="#" style="font-size: 28px;">Rent
            <span style="color: var(--purple);font-size: 28px;">Today</span>
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
               <ul class="navbar-nav text-dark ml-auto">
                  <li class="nav-item" style="color: var(--light);"><a class="nav-link active text-dark" href="#" style="color: #6F42C1;background: white;">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="About/index.html">About Us</a></li>
                  <?php
                     if (isset($_COOKIE['owner_id'])){
                       if(isset($_COOKIE['prop_index'])) {
                         setcookie("prop_index", "", time() - 3600,'/');
                     }
                     setcookie("prop_index", "0", NULL ,'/');
                     ?>
                  <li class="nav-item">
                     <a class="nav-link" href="Owner Dashboard/owner_dashboard.php"><?php echo $_COOKIE['owner_id'] ?></a>
                  </li>
                  <?php
                     } elseif (isset($_COOKIE['tenant_id'])){
                     ?>
                  <li class="nav-item">
                     <a class="nav-link" href="Tenant/tenant_dashboard/tenant_dashboard.php"><?php echo $_COOKIE['tenant_id'] ?></a>
                  </li>
                  <?php
                     } else{
                     ?>
                  <li class="nav-item">
                     <a class="nav-link" href="Login/login.php">Login/Register</a>
                  </li>
                  <?php
                     }
                     ?>
               </ul>
            </div>
         </div>
      </nav>
      <br><br>
      <!-- Title -->
      <section class="colored-section" id="title">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <h1 class="big-heading">Find your perfect home, for free.</h1>
               </div>
               <div class="col-lg-6">
                  <img class="title-image" src="Home/images/iphone6.png" alt="iphone-mockup">
               </div>
            </div>
         </div>
      </section>
      <!-- Features -->
      <br><br><br><br>
      <h2 class="section-heading">Why RentToday?</h2>
      <section class="white-section" id="features">
         <div class="container-fluid">
            <div class="row">
               <div class="feature-box col-lg-4">
                  <i class="icon far fa-user fa-4x"></i>
                  <h3 class="feature-title">Avoid Brokers</h3>
                  <p>We directly connect you to verified owners to save brokerage</p>
               </div>
               <div class="feature-box col-lg-4">
                  <i class="icon fas fa-list fa-4x"></i>
                  <h3 class="feature-title">Free Listing</h3>
                  <p>Simple listing process.</p>
               </div>
               <div class="feature-box col-lg-4">
                  <i class="icon fas fa-home fa-4x"></i>
                  <h3 class="feature-title">Shortlist without Visit</h3>
                  <p>Extensive information makes it easy</p>
               </div>
            </div>
         </div>
      </section>
      <!--  </section>-->
      <!-- Testimonials -->
      <section id="testimonials">
         <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="3500" data-pause="hover">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <h2 class="testimonial-text">I have got a genuine and very quick response from the site.</h2>
                  <img class="testimonial-image" src="Home/images/boy-img.jpg" alt="boy-profile">
                  <em>Pebbles, New York</em>
               </div>
               <div class="carousel-item">
                  <h2 class="testimonial-text">I love this website!! I would recommend premium plan.</h2>
                  <img class="testimonial-image" src="Home/images/lady-img.jpg" alt="lady-profile">
                  <em>Beverly, Illinois</em>
               </div>
            </div>
         </div>
      </section>
      <!-- Features -->
      <br><br><br><br>
      <h2 class="section-heading">What else do we provide?</h2>
      <section class="white-section" id="features">
         <div class="container-fluid">
            <div class="row">
               <div class="feature-box col-lg-4">
                  <i class="icon fas fa-users fa-4x"></i>
                  <h3 class="feature-title">Find your Roommate</h3>
               </div>
               <div class="feature-box col-lg-4">
                  <i class="icon fas fa-filter fa-4x"></i>
                  <h3 class="feature-title">Customized Filters</h3>
               </div>
               <div class="feature-box col-lg-4">
                  <i class="icon fas fa-compass fa-4x"></i>
                  <h3 class="feature-title">Explore Nearby</h3>
               </div>
            </div>
         </div>
      </section>
      <!-- Call to Action -->
      <section class="colored-section" id="cta">
         <h3 class="big-heading">Ready? Let’s find you a property.</h3>
      </section>
      <!-- Footer -->
      <footer id="footer">
         <i class="social-icon fab fa-facebook-f"></i>
         <i class="social-icon fab fa-twitter"></i>
         <i class="social-icon fab fa-instagram"></i>
         <i class="social-icon fas fa-envelope"></i>
         <p>© Copyright 2021 RentToday</p>
      </footer>
      <script src="Home/assets/js/jquery.min.js"></script>
      <script src="Home/assets/bootstrap/js/bootstrap.min.js"></script>
   </body>
</html>