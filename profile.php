<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        #container {
            width: 80%;
            background-color: #3498db;
            color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        h1 {
            margin-top: 0;
            color: #ffffff;
        }

        p {
            margin: 8px 0;
            color: #ecf0f1;
        }
        a {
    /* Your existing link styles */
    margin-top: 20px;
    display: inline-block;
    background-color: #e74c3c;
    color: #ffffff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
}

a:hover {
    background-color: #c0392b;
}

    </style>
</head>
<body>
    <div id="container">
        <?php
    
        // Check if the user is logged in
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }
    
        $dbhost = "127.0.0.1";
        $dbname = "lama";
        $dbuser = "root";
        $dbpass = "1234";
        
        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        
        if (!$connection) {
            die('Database connection failed: ' . mysqli_connect_error());
        }
    
        // Fetch user profile data
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM registration WHERE id = $user_id";
        $result = $connection->query($sql); // Corrected this line
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h1>Welcome, <?php echo $row['FirstName'] . " " . $row['LastName']; ?></h1>
            <p>Username: <?php echo $row['username']; ?></p>
            <p>Email: <?php echo $row['Email']; ?></p>
            <p>Address: <?php echo $row['Address']; ?></p>
            <p>Education: <?php echo $row['Education']; ?></p>
            <p>Graduation Date: <?php echo $row['GraduationDate']; ?></p>
            <p>Experience: <?php echo $row['Experience']; ?></p>
            <p>Skills: <?php echo $row['Skills']; ?></p>
        
            <?php
        } else {
            echo "User profile not found.";
        }
    
        $connection->close(); // Corrected this line
        ?>
           <a href="index2.php">Return to Home</a>
        
    </div>
</body>
</html>



</html>
