<?php

$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";


$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function input($data)
{
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
    $firstName = input($_POST["FirstName"]);
    $lastName = input($_POST["LastName"]);
    $username = input($_POST["username"]);
    $email = input($_POST["Email"]);
    $password = input($_POST["Password"]);
    $address = input($_POST["Address"]);
    $education = input($_POST["Education"]);
    $graduationDate = input($_POST["GraduationDate"]);
    $experience = input($_POST["Experience"]);
    $skills = implode(',', $_POST["Skills"]);


    $stmt = $conn->prepare("INSERT INTO Registration (FirstName, LastName, username, Email, Password, Address, Education, GraduationDate, Experience, Skills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


    if ($stmt) {
        $stmt->bind_param("ssssssssis", $firstName, $lastName, $username, $email, $password, $address, $education, $graduationDate, $experience, $skills);

        if ($stmt->execute()) {
          
            header("Location: reg2.php"); 
            exit();
        } else {
        
            echo "<p>Registration failed. Please try again.</p>";
        }

        $stmt->close();
    } else {
      
        echo "<p>Error: Statement preparation failed.</p>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="Registration.css">
</head>
<body>
<?php
if (isset($_SESSION['registration_error'])) {
    echo "<p class='error'>Error: " . $_SESSION['registration_error'] . "</p>";
    unset($_SESSION['registration_error']);
}
?>

<div class="container">
    <div class="screen">
    <div class="signin"> 
        <div class="screen__content">
            <form class="Reg" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="Reg_Field">
                    <h1>Registration Form</h1>
                    <div class="inputCont">
                        <label for="FirstName">First Name:</label>
                        <input class="input" type="text" name="FirstName" id="FirstName" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="LastName">Last Name:</label>
                        <input class="input" type="text" name="LastName" id="LastName" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="username">Username:</label>
                        <input class="input" type="text" name="username" id="username" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="Email">Email:</label>
                        <input class="input" type="email" name="Email" id="Email" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="Password">Password:</label>
                        <input class="input" type="password" name="Password" id="Password" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="ConfirmPassword">Confirm Password:</label>
                        <input class="input" type="password" name="ConfirmPassword" id="ConfirmPassword" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="Address">Address:</label>
                        <textarea class="input" name="Address" id="Address" rows="4" cols="30"></textarea><br>
                    </div>
                    <div class="inputCont">
                        <label for="Education">Education:</label>
                        <input class="input" type="text" name="Education" id="Education" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="GraduationDate">Graduation Date:</label>
                        <input class="input" type="date" name="GraduationDate" id="GraduationDate" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="Experience">Experience in years:</label>
                        <input class="input" type="number" name="Experience" id="Experience" required><br>
                    </div>
                    <div class="inputCont">
                        <label for="Skills">Skills:</label>
                        <select class="input" name="Skills[]" id="Skills" multiple required>
                            <option value="HTML">HTML</option>
                            <option value="CSS">CSS</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="PHP">PHP</option>
                            <option value="MySQL">MySQL</option>
                        </select>
                    </div>
                    <input class="Submit" type="submit" value="Register">
                </div>
            </form>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div></div>
</div>
</body>
</html>
