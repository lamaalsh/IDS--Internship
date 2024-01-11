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

// Fetch employees with the "instructor" role
$workerQuery = "SELECT * FROM workers WHERE role = 'instructor'";
$workerResult = mysqli_query($connection, $workerQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Instructors to Programs</title>
    <!-- Add your CSS links and styles here -->
</head>
<body>
    <h2>Assign Instructors to Programs</h2>
    
    <!-- Display Form to Assign Instructors to Programs -->
    <form method="post" action="">
        <label>Select Instructor:</label>
        <select name="instructor_id">
            <?php
            // Fetch instructors from the workers table with role "instructor"
            while ($instructorRow = mysqli_fetch_assoc($instructorResult)) {
                echo "<option value='{$instructorRow['id']}'>{$instructorRow['name']}</option>";
            }
            ?>
        </select>
        
        <label>Select Program:</label>
        <select name="program_id">
            <?php
            // Fetch programs from the programs table
            while ($programRow = mysqli_fetch_assoc($programResult)) {
                echo "<option value='{$programRow['program_id']}'>{$programRow['program_title']}</option>";
            }
            ?>
        </select>
        
        <button type="submit" name="assign_program">Assign Program</button>
    </form>
    
    <?php
    // Handle Form Submission to Assign Program to Instructor
    if (isset($_POST['assign_program'])) {
        $instructorId = mysqli_real_escape_string($connection, $_POST['instructor_id']);
        $programId = mysqli_real_escape_string($connection, $_POST['program_id']);
        
        // Insert a new record into the instructor_programs table
        $insertQuery = "INSERT INTO instructor_programs (instructor_id, program_id) VALUES ('$instructorId', '$programId')";
        if (mysqli_query($connection, $insertQuery)) {
            echo "Instructor assigned to program successfully.";
        } else {
            echo "Error assigning instructor to program: " . mysqli_error($connection);
        }
    }
    ?>
</body>
</html>

