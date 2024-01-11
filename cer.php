<?php
$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $applicantID = $_POST["applicant_id"];
    $programID = $_POST["program_id"];
    $completionDate = $_POST["completion_date"];

   

    // Database connection and insertion
    $stmt = $conn->prepare("INSERT INTO certificates (applicant_id, program_id, completion_date) VALUES (?, ?, ?)");
    $stmt->bind_param("iiss", $applicantID, $programID, $completionDate, $certificatePath);

    if ($stmt->execute()) {
        echo "Application submitted successfully!";
    } else {
        echo "Error submitting application: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Certificate</title>
    <!-- Add your CSS and other stylesheets here -->
</head>

<body>
    <header>
        <h1>Apply for Certificate</h1>
    </header>

    <main>
        <form action="process_certificate.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="applicant_id">Applicant ID:</label>
                <input type="text" id="applicant_id" name="applicant_id" required>
            </div>
            <div>
                <label for="program_id">Program ID:</label>
                <input type="text" id="program_id" name="program_id" required>
            </div>
            <div>
                <label for="completion_date">Completion Date:</label>
                <input type="date" id="completion_date" name="completion_date" required>
            </div>
         
            <div>
                <button type="submit">Submit Application</button>
            </div>
        </form>
    </main>

    <!-- Add your footer and other content here -->
</body>

</html>
