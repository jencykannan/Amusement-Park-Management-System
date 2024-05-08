<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('ba.jpg');
    background-size: cover;
}

.container {
    display: flex;
    justify-content: space-around;
    width: 50%;
}

.form-container {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 45%;
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 90%;
    padding: 8px;
    margin-bottom: 16px;
}

button {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="staffid">Staff id:</label>
                <input type="text" id="staffid" name="staffid" required>
                <label for="email">Email id:</label>
                <input type="email" id="email" name="email" required>
<label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</body>
<?php

// Create connection
$conn =mysqli_connect("localhost","root","","park");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['login'])){


// Get username and password from the form
$user = $_POST['username'];
$staff=$_POST['staffid'];
$email=$_POST['email'];
$pass = $_POST['password'];

// Query to check if the user exists in the database
$sql = "SELECT * FROM staff WHERE staff_name='$user' AND staff_id='$staff' AND email='$email' AND s_password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authenticated, redirect or perform desired action
    header("Location:http://localhost/db%20project/manage.php");
} else {
    // Invalid credentials, handle accordingly
    echo '<script>alert("Check it once!");</script>';
}

$conn->close();
}
?>
</html>
