<?php
$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['departments']) && is_array($_POST['departments'])) {
        $departments = $_POST['departments'];
        foreach ($departments as $department) {
            $department = mysqli_real_escape_string($connection, $department);
            $query = "INSERT INTO selected_lookup_items (lookup_id, item_name) VALUES (1, '$department')";
            mysqli_query($connection, $query);
        }
    }

    if (isset($_POST['majors']) && is_array($_POST['majors'])) {
        $majors = $_POST['majors'];
        foreach ($majors as $major) {
            $major = mysqli_real_escape_string($connection, $major);
            $query = "INSERT INTO selected_lookup_items (lookup_id, item_name) VALUES (2, '$major')";
            mysqli_query($connection, $query);
        }
    }

    // Redirect to the success page
    header("Location: success_page.php");
}
?>
