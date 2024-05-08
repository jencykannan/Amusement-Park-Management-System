<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("https://wallpapercrafter.com/th8001/598791-sunset-beach-ferris-wheel-UK-pier-Blackpool-birds.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-size: 20px;
        }

        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }



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

        @media screen and (max-width: 480px) {
            .sidenav {
                width: 100%;
                text-align: center;
                padding-top: 20px;
            }

            .sidenav a {
                padding: 8px;
                display: inline-block;
            }


        }
    </style>
</head>
<body>

<div class="sidenav">
    <a href="main.php">Home</a>
    <a href="index.php">Admin</a>
    <a href="rides.html">Gallery</a>
    <a href="lockerandfoodcourt.html">Services</a>
    <a href="sample.php">Rides</a>
</div>
<div class="signup-container">
    <h2>Sign Up</h2>
    <form class="signup-form" method="post">
Enter name:
        <input type="text" name="na">
Enter phno:
        <input type="text" name="no">
Enter email:
        <input type="email"  name="em">
Enter password:
        <input type="password"  name="pass">
        <button type="submit" name="signup">Sign Up</button>
Have account?<a href="login.php">Login</a>
    </form>
</div>
<?php
error_reporting(E_ALL & ~E_WARNING);
if (isset($_POST["signup"])){
$con=mysqli_connect("localhost","root","","park");
    $nam=$_POST['na'];
$no=$_POST['no'];
    $em=$_POST['em'];
    $pass=$_POST['pass'];
    echo $nam;
    $select="select email,password from visitor where email='$em' or  password='$pass'";
    $res=mysqli_query($con,$select);
    $fetch=mysqli_fetch_assoc($res);
    
if ($fetch)
{
    echo"<script>alert('check your email and password... already exist!!')</script>";
}

else{
    $insert="insert into visitor values('$nam','$no','$em','$pass','')";
    mysqli_query($con,$insert);
    echo "Record inserted";
    mysqli_close($con);
header("Location:login.php");

}}

?>
</body>
</html>
