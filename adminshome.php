
<?php
// Database connection
$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admins Page</title>
  
      <link rel="stylesheet" href="styles.css"> 
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-seo-dream.css">
<link rel="stylesheet" href="assets/css/animated.css">
<link rel="stylesheet" href="assets/css/owl.css">
</head>
<body>
 
    <div class="container">
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h4>IDS Admins <img src="assets/images/logo-icon.png" alt=""></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="adminshome.php" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="admins.php">Manage Employees</a></li>
              <li class="scroll-to-section"><a href="manageprog.php"> Manage Programs</a></li>
              <li class="scroll-to-section"><a href="manage_applicants.php">Manage Applicants</a></li>
            
              <li class="scroll-to-section"><a href="logout.php"> Logout</a></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
       
          </nav>
        </div>
      </div>
    </div>
  </header>

 

    



  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-4 col-sm-4">
                    <div class="info-stat">
                   
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="info-stat">
                    
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="info-stat">
                    
                    </div>
                  </div>
                  <div class="col-lg-12">
                  <h2>Welcome to the Admin Panel</h2>
                  <p>This is the home page of the admin panel. You can navigate to different sections using the menu above.</p>
                  </div>

                  
                  <div class="col-lg-12">
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/banner-right-image.png" >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <footer>
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
