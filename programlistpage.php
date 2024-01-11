
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
?>
<!doctype html>
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
 
        <style>
            
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
                    <a class="navbar-brand" href="index.php">
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
                                <a class="nav-link click-scroll" href="../templatemo_590_topic_listing/index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Program List Page</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Internship Program</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">Learning Hub</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">Meet Our Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5">Contact Us</a>
                            </li>
                            

                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="reg2.php" class="navbar-icon bi-person smoothscroll"></a>
                        </div>
                    </div>
                </div>
            </nav>
            




            <section class="explore-section section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-4">Program List Page</h2>
                </div>
            </div>
        </div>

        <div class="program-list">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="program-card">
                    <h2><?php echo $row['title']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                    <a class="learn-more-link" href="program_details.php?program_id=<?php echo $row['program_id']; ?>">Learn More</a>
                </div>
            <?php } ?>
        </div>
    </section>
                
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
