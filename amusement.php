<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url('https://wallpaperaccess.com/full/1093356.jpg');
             background-size:cover;
  background-repeat:no-repeat;
        }
   div{

  width: 400px;
  border: 2px solid rgba(255,255,255,2);
  padding: 50px;
  margin: 20px;
  border-radius:20px;
  background: transparent; 
  backdrop-filter: blur(60px);
}

.text{
    width:100%;
    height:70px;
    outline:none;
    border:2px solid rgba(255,255,255,.6);
    border-radius:40px;
    margin-top:20px;
    background: transparent; 
    font-size:16px;
    color:#fff;
    padding:20px 45px 20px 20px;
    backdrop-filter: blur(40px);
    

}
.input-box input::placeholder{
    color:#fff;
}
.input-box textarea::placeholder{
    color:#fff;
}
.textarea{
    width :100%;
    height:100px;
    outline:none;
    border:2px solid rgba(255,255,255,.6);
    border-radius:40px;
    margin-top:20px;
    background: transparent; 
    font-size:16px;
    color:#fff;
    padding:20px 45px 20px 20px;
    backdrop-filter: blur(40px);
}
.button{
    width:40%;
    height:45px;
    border-radius:20px;
    margin-top:50px;
    cursor:pointer;
    font-size:16px;
    font-weight:600;
    border:none;
    outline:none;
    box-shadow:0 0 10px rgba(0,0,0,.1);
    color:#333;
}


</style>
</head>
<body>
    <center>
    <form method="get">
    <div class="input-box">
        <h1 style="color:#fff">Enter Details:</h1>
        
    <input type="text" class="text" name="name" placeholder="Name"><br>
    <input type="text" class="text" name="dob" placeholder="DOB:" onfocus="(this.type='date')" onblur="(this.type='text')"><br>
    <textarea class="textarea" name="address" rows="5" cols="50" placeholder="Address"></textarea><br>
    <input type="email" class="text" name="email" placeholder="Email"><br>
    <input type="number" class="text" name="number" placeholder="Phone number"><br>
    <input type="number" class="text" name="height" placeholder="Height(in cm)" max="250" min="90"><br>
    <input type="text" class="text" name="pickdate" placeholder="Date of visit"  onfocus="(this.type='date')" onblur="(this.type='text')"><br>
    <input type="submit" class="button" value="Add person" name="submit">
    <input type="reset" class="button" value="Reset" name="reset">
    </div>
    </form>
    </center>

<?php
if(isset($_GET['submit']))
{
     $name=$_GET['name'];
     $date=$_GET['dob'];
     $address=$_GET['address'];
     $email=$_GET['email'];
     $phone_number=$_GET['number'];
     $height=$_GET['height'];
     $visit=$_GET['pickdate'];
     $conn=mysqli_connect("localhost","root","","amuse");
     if ($conn -> connect_error)
     {
        die("Connection failed:".$conn->connect_error);
     }
     $insert_sql="INSERT INTO details(name,dob,address,email,phone_number,height,visitdate) VALUES ('$name','$date','$address','$email','$phone_number','$height','$visit')";
     mysqli_query($conn,$insert_sql);
     mysqli_close($conn);
}
     


?>



</body>
</html>