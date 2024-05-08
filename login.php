<!DOCTYPE html>
<html>

<head>
<style>
    .signup-container {
        width: 300px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .signup-container h2 {
        text-align: center;
        color: #333;
    }

    .signup-form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .signup-form input {
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .signup-form button {
        width: 50%;
        margin-top: 20px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #434343;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .signup-form button:hover {
        background-color: #333;
    }
</style>
</head>
<body style="background-image: url('l.jpg');background-size: cover;">
<div class="signup-container">
    <h2>LOGIN</h2>
    <form class="signup-form" method="post">
        Enter email:
        <input type="email" name="em" required>
        Enter password:
        <input type="password" name="pass" required>
        <button type="submit" name="log">LOGIN</button>
    </form>
</div>

<?php
session_start();
error_reporting(E_ALL & ~E_WARNING);
$con=mysqli_connect("localhost","root","","park");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST["log"])) {
    $e = mysqli_real_escape_string($con, $_POST["em"]);
    $p = mysqli_real_escape_string($con, $_POST["pass"]);

    $select = "SELECT * FROM visitor WHERE email='$e' AND password='$p'";
    $query = mysqli_query($con, $select);

    if ($query) {
        $count = mysqli_num_rows($query);

        if ($count > 0) {
            $fetch = mysqli_fetch_assoc($query);

            if ($fetch['email'] == $e && $fetch['password'] == $p) {
              
                $_SESSION['em']=$e;
                
                header("Location: slide.php");
                exit(); // Make sure to exit after redirecting
            } else {
                echo "<script>alert('Login failed')</script>";
            }
        } else {
            echo "<script>alert('User not found')</script>";
        }

        mysqli_free_result($query);
    } else {
        echo "<script>alert('Query error: " . mysqli_error($con) . "')</script>";
    }

    mysqli_close($con);
}
?>
</body>
</html>
