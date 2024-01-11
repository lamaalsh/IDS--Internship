<?php
include('auth.php');

$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape and sanitize user inputs
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $mobile_number = mysqli_real_escape_string($connection, $_POST['mobile_number']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $position = mysqli_real_escape_string($connection, $_POST['position']);
    $expected_salary = mysqli_real_escape_string($connection, $_POST['expected_salary']);
    $start_date = mysqli_real_escape_string($connection, $_POST['start_date']);
    $website = mysqli_real_escape_string($connection, $_POST['website']);
    $experience = mysqli_real_escape_string($connection, $_POST['experience']);
    $program_title = mysqli_real_escape_string($connection, $_POST['program']);

    // Get program_id from programs table based on program_title
    $program_query = "SELECT title FROM programs WHERE title = '$program_title'";
    $program_result = mysqli_query($connection, $program_query);

    if ($program_result && mysqli_num_rows($program_result) > 0) {
        $program_row = mysqli_fetch_assoc($program_result);
        $program_id = $program_row['title'];

        // Insert data into interns table
        $insertQuery = "INSERT INTO interns (first_name, last_name, email, mobile_number, age, city, position, expected_salary, start_date, website, experience, program)
                        VALUES ('$first_name', '$last_name', '$email', '$mobile_number', '$age', '$city', '$position', '$expected_salary', '$start_date', '$website', '$experience', '$program_title')";

        if (!mysqli_query($connection, $insertQuery)) {
            echo "Error inserting data: " . mysqli_error($connection);
        } else {
            echo "Application submitted successfully!";
        }
    } else {
        echo "Error fetching program information: " . mysqli_error($connection);
    }
}
?>

<!-- Rest of your HTML and form -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Include your main stylesheet here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Intern Application</title>
    <style>
        /* Additional CSS styles for the form section */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        
        .apply-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 600px;
        }
        
        .apply-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            display: flex;
            align-items: center;
        }
        
        .apply-form label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            color: #555;
        }
        
        .apply-form input,
        .apply-form textarea,
        .apply-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .apply-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Icons for labels */
        .apply-form label i {
            margin-right: 5px;
        }
        .return-to-home {
    text-align: center;
    padding: 20px;
    background-color: #00b300; /* Green color */
}

.return-to-home a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 18px;
}

.return-to-home a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <section class="apply-section section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                <h2><i class="fas fa-pencil-alt"></i> Program Application Form</h2>
                </div>
            </div>
        </div>
        <div class="apply-form">
            <h2>Program Application Form</h2>
            <form action="success_page.php" method="post" enctype="multipart/form-data">
    <label for="first_name"><i class="fas fa-user"></i> First Name:</label>
    <input type="text" id="first_name" name="first_name" required>
    
    <label for="last_name"><i class="fas fa-user"></i> Last Name:</label>
    <input type="text" id="last_name" name="last_name" required>
    
         
    <label for="email"><i class="fas fa-envelope"></i> Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="mobile_number"><i class="fas fa-phone"></i> Mobile Number:</label>
    <input type="tel" id="mobile_number" name="mobile_number" required>
    
    <label for="age"><i class="fas fa-calendar-alt"></i> Age:</label>
    <input type="number" id="age" name="age" required>
    <label for="city"><i class="fas fa-map-marker-alt"></i> City:</label>
    <input type="text" id="city" name="city" required>
    
    <label for="position">Position:</label>
    <input type="text" id="position" name="position" required>
    
    <label for="expected_salary">Expected Salary:</label>
    <input type="number" step="any" id="expected_salary" name="expected_salary" required>
    
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required>
    
    <label for="website">Website:</label>
    <input type="url" id="website" name="website" required>
    
    <label for="experience">Experience:</label>
    <textarea id="experience" name="experience" rows="4" required></textarea>
    
    <label for="program"><i class="fas fa-graduation-cap"></i> Program:</label>
<select id="program" name="program" required>
    <option value="">Select a Program</option>
    <?php
    $query = "SELECT title FROM programs";
    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $programTitle = $row['title'];
            echo "<option value=\"$programTitle\">$programTitle</option>";
        }
    } else {
        echo "Error fetching programs: " . mysqli_error($connection);
    }
    ?>
</select>

    
   
    
    <button type="submit">Submit Application</button>   <div class="return-to-home">
        <a href="index2.php">Return to Home</a>
    </div>
</form>

        </div>
    </section>
  
</body>
</html>
