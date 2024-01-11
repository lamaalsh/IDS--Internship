<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .success-icon {
            font-size: 48px;
            color: #44c767;
        }
        .back-to-home {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #44c767;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .back-to-home:hover {
            background-color: #36883a;
        }
    </style>
</head>
<body>
    <div class="success-icon">
        <i class="fas fa-check-circle"></i>
    </div>
    <h1>Form Submitted Successfully</h1>
    <p>Your form has been submitted successfully.</p>
    <a href="index.php" class="back-to-home">
        <i class="fas fa-home"></i> Back to Home
    </a>
</body>
</html>
