

<?php
$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM programs";
$result = $conn->query($query);
$programsArray = [];
if ($result) {
  // Fetch the data and store it in the $programsArray
  while ($row = mysqli_fetch_assoc($result)) {
      $programsArray[] = $row;
  }
  
}
?><!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Integrated Digital Systems - IDS </title>

            
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-topic-listing.css" rel="stylesheet">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">   
        <link rel="stylesheet" href="team.css"> 

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-seo-dream.css">
<link rel="stylesheet" href="assets/css/animated.css">
<link rel="stylesheet" href="assets/css/owl.css">



        <style>
         
        /* Additional CSS styles for the program list section */
        .explore-section {
            background-color: #f5f5f5;
            padding: 40px 0;
        }
        
        .program-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .program-card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .program-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }
        
        .learn-more-link {
            color: #007bff;
            text-decoration: none;
            display: inline-block;
        }
        
        .learn-more-link i {
            margin-left: 5px;
        }
    
            
    .program-list p {
  color: rgb(78, 5, 73); 
  font-size: 16px; 
  line-height: 1.6;
  margin-bottom: 10px; 
}


    .program-card a {
  color: rgb(128, 0, 115); 
  text-decoration: none;
  font-weight: bold;
  position: relative; 
  transition: color 0.3s; 
  size: 50px;
}

.program-card a:hover {
  color: rgb(100, 0, 87); }


.program-card a::before {
  content: ''; 
  position: absolute; 
  bottom: -2px; 
  left: 0; 
  width: 100%; 
  height: 2px; 
  background-color: rgb(119, 0, 128); 
  visibility: hidden;
  transform: scaleX(0); 
  transition: visibility 0s, transform 0.3s ease-in-out; 
}
.learn-more-link {
    font-size: 18px;
}


.program-card {
    text-align: center;
}

.program-card a:hover::before {
  visibility: visible;
  transform: scaleX(1);
}


    .aa {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
        margin:10px
    }
    .aa:hover {
        color: #0f0;
    }


            .filters {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 10px;
                margin-bottom: 20px;
            }
    
            .filters label {
                font-weight: bold;
                margin-right: 5px;
            }
    
            .filters select {
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
    
            .filters select::-ms-expand {
                display: none;
            }
            
            .filters select:hover {
                border-color: #666;
            }
    
            .filters select:focus {
                outline: none;
                border-color: #333;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            }
    
        
        </style>
    </head>
    
    <body id="top">

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <i >   <img src="../templatemo_590_topic_listing/images/topics/IDS.png" style="height: 75px; width: 75px;"></i>
                     
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="reg2.php" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="../templatemo_590_topic_listing/index.html">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#services">Program List Page</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="aa" href="#features">Internship Program</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Meet Our Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="contact.html">Contact Us</a>
                            </li>
                            

                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="reg2.php" class="navbar-icon bi-person smoothscroll"></a>
                        </div>
                    </div>
                </div>
            </nav>
            

            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                        <?php
                   
                        if (isset($_SESSION['username'])) {
                            echo '<h1 class="text-white text-center">Welcome, ' . $_SESSION['username'] . '!</h1>';
                        } else {
                           
                        }
                        ?>
                            <h1 class="text-white text-center">New Online Internship Program </h1>

                            <h6 class="text-center">Long Before you sit down to puth the pen</h6>
                            <h6 class="text-center">need to make sure you breathe</h6>
                            <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                              

                    </div>
                </div>
            </section>


            <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">

                       

                        <div class="col-lg-6 col-12">
                            <div class="custom-block custom-block-overlay">
                                <div class="d-flex flex-column h-100">
                                    <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-overlay-text d-flex">
                                        <div>
                                            <h5 class="text-white mb-2">About Us</h5>

                                            <p class="text-white">Integrated Digital Systems (IDS) is a software solutions provider delivering full cycle software development services and products since 1991.
                                                With a team of more than a hundred professionals, IDS excels in providing turnkey solutions in Information Technology to a diversified range of industries, on an international scale.
                                                Today, IDS positions itself as a key regional player in software development in the MENA region.</p>

                                            <a href="Learn.html" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">25</span>
                                    </div>
<br><br><br><br><br>
                                    <div class="social-share d-flex">
                                        

                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>

                                        <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                                    </div>

                                    <div class="section-overlay"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


           


            <div id="services" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6>Program List Page</h6>
                        <h2>Discover What We Do &amp; <span>Offer</span> To Our <em>Clients</em></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
    <div class="row">
       <?php
    // Loop through the programsArray and display program cards
    foreach ($programsArray as $row) {
        echo '
        <div class="col-lg-4">
            <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon">
                            <img src="assets/images/service-icon-01.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="right-content">
                            <h4><i class="fas fa-code"></i>' . $row['title'] . '</h4>
                            <p>' . $row['description'] . '</p>';
                            echo '<a class="learn-more-link" href="' . $row['link'] . '">Learn More</a>';
        echo '
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
?>

    </div>
</div></div>
      
        <div id="features" class="features section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="features-content">
            <div class="row">
              <div class="col-lg-3">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="first-number number">
                    <h6>01</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>Purpose and Learning Experience: </h4>
                  <div class="line-dec"></div>
                  <p>Internship programs are intended to bridge the gap between classroom learning and professional work.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                  <div class="second-number number">
                    <h6>02</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>Learning Objectives:</h4>
                  <div class="line-dec"></div>
                  <p> Internship programs typically have specific learning objectives that outline the skills and knowledge participants are expected to gain.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                  <div class="third-number number">
                    <h6>03</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>Responsibilities</h4>
                  <div class="line-dec"></div>
                  <p>Interns may be assigned a variety of tasks, including assisting with projects, conducting research, attending meetings, shadowing employees, and contributing to team efforts.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item second-feature last-features-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                  <div class="fourth-number number">
                    <h6>04</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>Intern IDs</h4>
                  <div class="line-dec"></div>
                  <p>Each intern participating in the program is assigned a unique intern ID. This ID serves as a reference for tracking an intern's details, progress, and performance throughout their internship.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="skills-content">
        
          </div>
        </div>
      </div>
    </div>
  </div>



            <section class="team-section" id="section_3"><h1>Meet Our Team </h1>
            <div class="container">
            <div class="team-members">
                <div class="team-member">
                    
                    <img src="../templatemo_590_topic_listing/images/lama.jpeg" alt="Team Member 1">
                    <h3>Lama Al Sheikh</h3>
                    <p>CEO & Co-Founder</p>
                </div>
                <div class="team-member">
                    <img src="../templatemo_590_topic_listing/images/ibra.jpeg" alt="Team Member 2">
                    <h3>Ibrahim Kotob</h3>
                    <p>Developer</p>
                </div>
                <div class="team-member">
                    <img src="../templatemo_590_topic_listing/images/jane.jpeg" alt="Team Member 1">
                    <h3>Jana AL Hafi</h3>
                    <p>Lead Designer</p>
                </div>
                <div class="team-member">
                    <img src="../templatemo_590_topic_listing/images/fatom.jpeg" alt="Team Member 2">
                    <h3>Fatima Itani</h3>
                    <p>Support</p>
                </div>
            </div></div>
        </section>


        

    

     
        </main>

<footer class="site-footer section-padding">
            <div class="container">
                <div class="row">

                

                    <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                     

                        <p class="text-white d-flex mb-1">
                            <a href="tel: 305-240-9671" class="site-footer-link">
                                305-240-9671
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <a href="mailto:info@company.com" class="site-footer-link">
                                ids@company.com
                            </a>
                        </p>
                    </div>

            
                  
                        
                    </div>
                    
       
                        &copy; 2023 IDS Academy. All rights reserved.
                   

                </div>
            </div>
        </footer>


  
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
