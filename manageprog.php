<?php
// Database connection
$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
if (isset($_POST['edit_program'])) {
    $editProgramTitle = mysqli_real_escape_string($connection, $_POST['edit_program_title']);
    $newTitle = mysqli_real_escape_string($connection, $_POST['new_title']);
    $newDescription = mysqli_real_escape_string($connection, $_POST['new_description']);
    $newLink = mysqli_real_escape_string($connection, $_POST['new_link']);



    $newProgramstd = mysqli_real_escape_string($connection, $_POST['new_start_date']);
    $newProgramedt = mysqli_real_escape_string($connection, $_POST['new_end_date']);
    $newProgramcap = mysqli_real_escape_string($connection, $_POST['new_max_capacity']);



    $updateQuery = "UPDATE programs 
    SET title = '$newTitle', 
        description = '$newDescription', 
        link = '$newLink', 
        start_date = '$newProgramstdt', 
        end_date = '$newProgramedt', 
        max_capacity = '$newProgramcap' 
    WHERE title = '$editProgramTitle'";
if (mysqli_query($connection, $updateQuery)) {
        echo "Program updated successfully.";
        // Refresh the page to reflect changes
        header("Location: manageprog.php");
        exit();
    } else {
        echo "Error updating program: " . mysqli_error($connection);
    }
    
}

// Check if the form for adding new programs is submitted
if (isset($_POST['add_program'])) {
    $newProgramTitle = mysqli_real_escape_string($connection, $_POST['new_program_title']);
    $newProgramDescription = mysqli_real_escape_string($connection, $_POST['new_program_description']);
    $newProgramLink = mysqli_real_escape_string($connection, $_POST['new_program_link']);


    $newProgramstd = mysqli_real_escape_string($connection, $_POST['new_program_start_date']);
    $newProgramedt = mysqli_real_escape_string($connection, $_POST['new_program_end_date']);
    $newProgramcap = mysqli_real_escape_string($connection, $_POST['new_program_max_capacity']);

    // Insert data into programs table
    $insertQuery = "INSERT INTO programs (title, description, link, start_date, end_date, max_capacity) 
    VALUES ('$newProgramTitle', '$newProgramDescription', '$newProgramLink', '$newProgramstd', '$newProgramedt', '$newProgramcap')";


    if (!mysqli_query($connection, $insertQuery)) {
        echo "Error inserting data: " . mysqli_error($connection);
    }
}

// Fetch programs data from database
$query = "SELECT * FROM programs";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Programs</title>
    <link rel="stylesheet" href="styles.css"> 
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <style>
     

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f4f4f4;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        .add-program-form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], textarea, input[type="url"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        li{
            color: white;
        }
    </style>
<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-seo-dream.css">
<link rel="stylesheet" href="assets/css/animated.css">
<link rel="stylesheet" href="assets/css/owl.css">
   
</head>
<body>
<div class="container">
<header class="header-area header-sticky wow slideInDown" >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="adminshome.html" class="logo">
              <h4>IDS Admins <img src="assets/images/logo-icon.png" alt=""></h4>
            </a>
           
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
  <br>  <br>
  <br>
  <br>
  <br>

<section class="manage-programs-section">
    

            <h2>Manage Programs</h2>
            <table>
                <tr>
                    <th>Program Title</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Max Capacity</th>
                    <th>Actions</th>
                </tr>
                <?php
                ob_start(); 
                // Display program data in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    $programId = $row['program_id'];
                    $programTitle = $row['title'];
                    $programDescription = $row['description'];
                    $programLink = $row['link'];
                    $programstdt = $row['start_date'];
                    $programenddt = $row['end_date'];
                    $programcap = $row['max_capacity'];
                    echo "<tr>";
                    echo "<td>$programTitle</td>";
                    echo "<td>$programDescription</td>";
                    echo "<td>$programLink</td>";
                    echo "<td>$programstdt</td>";
                    echo "<td>$programenddt</td>";
                    echo "<td>$programcap</td>";
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='edit_program_title' value='$programTitle'>";
                    echo "<input type='text' name='new_title' placeholder='New Title' required><br>";
                    echo "<textarea name='new_description' placeholder='New Description' required></textarea><br>";
                    echo "<input type='text' name='new_link' placeholder='New Link' required><br>";

                    echo "<input type='date' name='new_start_date' placeholder='New start date' required><br>";
                    echo "<input type='date' name='new_end_date' placeholder='New End Date' required><br>";
                    echo "<input type='number' name='new_max_capacity' placeholder='New Link' required><br>";




                    echo "<button type='submit' name='edit_program'>Edit</button>";



                    echo "</form>";

                    // Delete form
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='delete_program_title' value='$programTitle'>";
                    echo "<button type='submit' name='delete_program'>Delete</button>";
                    echo "</form>";
                    
                    echo "</td>";
                    echo "</tr>";
                    

                }// Handle edit program
// Handle edit program



                
                // Handle delete program
                if (isset($_POST['delete_program'])) {
                    $deleteProgramTitle = $_POST['delete_program_title'];
                    $deleteQuery = "DELETE FROM programs WHERE title = '$deleteProgramTitle'";
                    if (mysqli_query($connection, $deleteQuery)) {
                        echo "Program deleted successfully.";
                
                        header("Location: manageprog.php");
                        exit();
                    } else {
                        echo "Error deleting program: " . mysqli_error($connection);
                    }
                }
               
             
                ?>
                
            </table>

<!-- ... Existing code ... -->
<div class="add-program-form">
    <h3>Add New Program</h3>
    <form method="post" action="">
        <label>Program Title:</label>
        <input type="text" name="new_program_title" required>
        <label>Description:</label>
        <textarea name="new_program_description" required></textarea>
        <label>Link:</label>
        <input type="text" name="new_program_link" required>

        <label>Start Date:</label>
        <input type="date" name="new_program_start_date" required>
        <label>End Date:</label>
        <input type="date" name="new_program_end_date" required>
        <label>Maximum Capacity:</label>
        <input type="number" name="new_program_max_capacity" required>
        <button type="submit" name="add_program">Add Program</button>
    </form>
</div>

        </div>
        </div>
    </section>
    </div>
</body>
</html>









