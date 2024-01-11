
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
if (isset($_POST['update_status'])) {
    $workerId = $_POST['worker_id'];
    $newStatus = $_POST['new_status'];

    // Update data in workers table
    $updateQuery = "UPDATE workers SET status = '$newStatus' WHERE id = $workerId";

    if (mysqli_query($connection, $updateQuery)) {
        // Status updated successfully

        // Update the last_login column with the current date and time
        $currentDate = date("Y-m-d H:i:s");
        $updateLoginQuery = "UPDATE workers SET last_login = '$currentDate' WHERE id = $workerId";
        mysqli_query($connection, $updateLoginQuery);
    } else {
        echo "Error updating status: " . mysqli_error($connection);
    }
}

if (isset($_POST['delete_worker'])) {
    $deleteWorkerId = $_POST['delete_worker_id'];
    
    // Delete the worker from the database
    $deleteQuery = "DELETE FROM workers WHERE id = $deleteWorkerId";
    if (mysqli_query($connection, $deleteQuery)) {
        echo "Worker deleted successfully.";
    } else {
        echo "Error deleting worker: " . mysqli_error($conn);
    }
}

// Check if the form for adding new workers is submitted
if (isset($_POST['add_worker'])) {
    $newWorkerName = mysqli_real_escape_string($connection, $_POST['new_worker_name']);
    $newWorkerRole = mysqli_real_escape_string($connection, $_POST['new_worker_role']);
    $currentDate = date("Y-m-d H:i:s"); // Get the current date and time

    // Insert data into workers table
    $insertQuery = "INSERT INTO workers (name, role, status, joined_date, last_login)
                    VALUES ('$newWorkerName', '$newWorkerRole', 'enabled', '$currentDate', '$currentDate')";

    if (!mysqli_query($connection, $insertQuery)) {
        echo "Error inserting data: " . mysqli_error($connection);
    }
    
}

// Fetch workers data from database
$query = "SELECT * FROM workers";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Management</title>
    <style>
       table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f4f4f4;
        }

        .add-worker-form {
            /
            * Your existing styles for the form */
        }
     

    </style>
      <link rel="stylesheet" href="styles.css"> 
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-seo-dream.css">
<link rel="stylesheet" href="assets/css/animated.css">
<link rel="stylesheet" href="assets/css/owl.css">
</head>
<body>
    <header>
    <a href="logout.php">Logout</a>
    <br> <br>

    </header>
    <div class="container">5
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
           
            <a href="index.html" class="logo">
              <h4>IDS Admins <img src="assets/images/logo-icon.png" alt=""></h4>
            </a>
           
            <ul class="nav">
              <li class="scroll-to-section"><a href="adminshome.php" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="admins.php">Manage Employees</a></li>
              <li class="scroll-to-section"><a href="manageprog.php">Manage Programs</a></li>
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
  <br> <br> <br> <br>
   
        <table>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Last Login</th>
                <th>Joined Date</th>
                <th>Status</th>
            </tr>
            <?php
            // Display worker data in a table
            while ($row = mysqli_fetch_assoc($result)) {
                $workerId = $row['id'];
                $workerName = $row['name'];
                $workerRole = $row['role'];
                $workerStatus = $row['status'];
                $lastLogin = $row['last_login'];
                $joinedDate = $row['joined_date'];

                echo "<tr>";
                echo "<td>$workerName</td>";
                echo "<td>$workerRole</td>";
                echo "<td>$lastLogin</td>";
                echo "<td>$joinedDate</td>";
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='worker_id' value='$workerId'>";
                echo "<select name='new_status'>";
                echo "<option value='enabled' " . ($workerStatus === 'enabled' ? 'selected' : '') . ">Enabled</option>";
                echo "<option value='disabled' " . ($workerStatus === 'disabled' ? 'selected' : '') . ">Disabled</option>";
                echo "</select>";
                echo "<button type='submit' name='update_status'>Update Status</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='delete_worker_id' value='$workerId'>";
                echo "<button type='submit' name='delete_worker'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div class="add-worker-form">
            <form method='post' action=''>
                <label>New Worker Name:</label>
                <input type='text' name='new_worker_name' required><br>
                <label>New Worker Role:</label>
                <input type='text' name='new_worker_role' required><br>
                <button type='submit' name='add_worker'>Add New Worker</button>
            </form>
        </div>
    </div>
</body>
</html>
