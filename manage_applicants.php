<?php
$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$query = "SELECT * FROM interns";
$result = mysqli_query($connection, $query);
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
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
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

 <br><br><br><br><br><br>
  <h2>View Applicants</h2>
    <table id="customers">
        <tr>
            <th>Applicant Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Program </th>
        </tr>
        <?php
        // Display applicant data in a table
        while ($row = mysqli_fetch_assoc($result)) {
            $applicantId = $row['intern_id'];
            $applicantName = $row['first_name'];
            $applicantLName = $row['last_name'];
            $applicantEmail = $row['email'];
            $applicantPhone = $row['mobile_number'];
            $applicantProgram= $row['program'];
            echo "<tr>";
            echo "<td>$applicantName         </td>";
            echo "<td>$applicantEmail        </td>";
            echo "<td>$applicantPhone       </td>";
            echo "<td> $applicantProgram</td>";
            echo "</tr>";
        }
        ?>
    </table>
    



 
    <footer>
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>








