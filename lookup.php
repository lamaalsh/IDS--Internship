<?php
$dbhost = "127.0.0.1";
$dbname = "lama";
$dbuser = "root";
$dbpass = "1234";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}


$lookupTypesQuery = "SELECT * FROM lookups";
$lookupTypesResult = mysqli_query($connection, $lookupTypesQuery);

if (!$lookupTypesResult) {
    die('Query failed: ' . mysqli_error($connection));
}
$parentItemsQuery = "SELECT lookup_item_id, name FROM lookup_items";
$parentItemsResult = mysqli_query($connection, $parentItemsQuery);

if (!$parentItemsResult) {
    die('Query failed: ' . mysqli_error($connection));
}

if (isset($_POST['submit'])) {
    $selectedLookupType = $_POST['lookup_type'];
    $itemName = $_POST['item_name'];
    $itemCode = $_POST['item_code'];
    $selectedParent = $_POST['parent_id'];
    $itemPriority = $_POST['priority'];

    $insertQuery = "INSERT INTO lookup_items (lookup_id, name, code, parent_id, priority)
                    VALUES ('$selectedLookupType', '$itemName', '$itemCode', '$selectedParent', '$itemPriority')";

    if (!mysqli_query($connection, $insertQuery)) {
        echo "Error inserting data into lookup_items: " . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Lookup Management</title>
    <style>  .return-to-home {
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
}</style>
    <script>
function showSuccessMessage(message) {
    const successMessage = document.getElementById('success-message');
    successMessage.textContent = message;
    successMessage.classList.remove('hidden');
}

function validateForm() {
    var departmentDropdown = document.getElementById("department");
    var majorDropdown = document.getElementById("major");
    var universityDropdown = document.getElementById("item1");

    if (departmentDropdown.value === "" && majorDropdown.value === "" && universityDropdown.value === "") {
        alert("Please select at least one item.");
        return false;
    }

    

    return true;
}
</script>


</head>
<body>
    <header>
        <h1>Lookup Management</h1>
        
<a href="index.php" class="back-to-home">Back to Home</a>

    </header>
    <main>
    
    <section id="select-lookup-items">
    <h2>Select Lookup Items</h2>
    <form method="post" action="process_selection.php" onsubmit="return validateForm();">
        <label for="department">Select Department:</label>
        <select name="department" id="department">
            <option value="">Select a Department</option>
            <?php
            // Assuming you have a database connection
            $query = "SELECT * FROM lookup_items WHERE lookup_id = 1";
            $result = mysqli_query($connection, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                }
            }
            ?>
        </select>

        <label for="major">Select Major:</label>
        <select name="major" id="major">
            <option value="">Select a Major</option>
            <?php
            // Assuming you have a database connection
            $query = "SELECT * FROM lookup_items WHERE lookup_id = 2";
            $result = mysqli_query($connection, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                }
            }
            ?>
        </select>
        <label for="item1">Select University:</label>
        <select name="item1" id="item1">
            <option value="">Select a University</option>
            <?php
    
            $query = "SELECT * FROM lookup_items WHERE lookup_id = 3";
            $result = mysqli_query($connection, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                }
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Submit" onclick="showSuccessMessage();">
        <div class="return-to-home">
        <a href="index.php">Return to Home</a>
    </div>
    </form>
</section>


    </main>
    <footer>
        <p>&copy; 2023 Lookup Management. All rights reserved.</p>
    </footer>
    <img src="../templatemo_590_topic_listing/images/int.png" alt="Your Image" class="footer-image">
</body>
</html>
