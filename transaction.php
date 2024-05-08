<!DOCTYPE html>
<html lang="en">
  <?php
  session_start()
  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            display: flex;
            height: 100vh;
            background-image: url('b.jpg');
    background-size: cover;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
        }

        /* Styles for the popup content */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #slider-container {
            width: 25vw; /* Set to 25% of the viewport width */
            height: 50vh; /* Set to 50% of the viewport height */
            overflow: hidden;
        }

        #image-slider {
            display: block;
            animation: scrollImages 10s linear infinite;
        }

        .slider-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes scrollImages {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-100%);
            }
        }

        #content {
            flex: 1;
            overflow-y: auto;
        }
        label {
  display: inline-block;
  width: 120px;
  font-weight:bold;
}

button {
  padding: 5px 10px;
  background-color: deeppink;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: red;
}
    </style>
</head>
<body>
 

<div id="slider-container">
    <div id="image-slider">
        <img class="slider-image" src="imag1.jpg" alt="Image 1">
        <img class="slider-image" src="imag2.jpg" alt="Image 2">
        <img class="slider-image" src="imag3.jpg" alt="Image 3">
        <!-- Add more images as needed -->
    </div>
</div>
<form method="POST">
<div id="content"><center>
    <h1 style="color:forestgreen;">Amusement Park Transaction</h1>
    
  <div>
    <label for="ticketType">Ticket Type:</label>
    <h3>Adult(above 20): <input type="number" id="adult" name="adult" min="0" value="0"></h3>
    <h3>Child (below 20): <input type="number" id="child" name="child" min="0" value="0"></h3> 
  </div>

  <div>
    <label for="quantity">Quantity:</label>
    
  </div>



  <div id="total">
  
    <h3>Adult: <span id="adult1" name="adult1">0 =>₹0.00</span></h3>
    <h3>Child: <span id="child1" name="child1">0 =>₹0.00</span></h3>
    <h3>Total: <span id="totalAmount" name="totalAmount">0 =>₹0.00</span></h3>
  </div>
  <div>
    <button type="submit" name="log">Pay now!</button>
</center>
   
</div>
</div>
<div class="overlay" id="overlay" onclick="hidePopup()"></div>
<div class="popup" id="popup">
    <h2>Your ticket has been generated!</h2>
    <p></p>
    <button onclick="hidePopup()">Close</button>

</div>
</form>
  <script>

    document.getElementById("adult").addEventListener("input",function(){

      const adult = parseInt(document.getElementById('adult').value);
  const child = parseInt(document.getElementById('child').value);
  const total = adult+child;

  // Calculate price based on ticket type
  

  const totalAmount = (500 * adult)+(400 * child);
  document.getElementById('adult1').textContent = adult+"=>₹"+(500*adult).toFixed(2);
document.getElementById('child1').textContent = child+"=>₹"+(400*child).toFixed(2);
document.getElementById('totalAmount').textContent = total+"=>₹"+totalAmount.toFixed(2);}
    );
    document.getElementById("child").addEventListener("input",function(){

const adult = parseInt(document.getElementById('adult').value);
const child = parseInt(document.getElementById('child').value);
const total = adult+child;

  // Calculate price based on ticket type
  

  const totalAmount = (500 * adult)+(400 * child);
  document.getElementById('adult1').textContent = adult+"=>₹"+(500*adult).toFixed(2);
document.getElementById('child1').textContent = child+"=>₹"+(400*child).toFixed(2);
document.getElementById('totalAmount').textContent = total+"=>₹"+totalAmount.toFixed(2);}
    );
    function showPopup() {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
    }

    // Function to hide the popup
    function hidePopup() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup').style.display = 'none';
        window.open("lockerandfoodcourt.html");
    }    
</script>
<?php
$useremail=$_SESSION['em'];
$con=mysqli_connect("localhost","root","","park");
if(isset($_POST["log"]))
{
$a=$_POST['adult'];
$b=$_POST['child'];
$c=(500*$a)+(400*$b);
if($c==0){
  echo"<script>alert('Please fill the form')</script>";
}
else{
$insert_sql="insert into transaction(adult,child,total,email)  VALUES('$a','$b','$c','$useremail')";
mysqli_query($con,$insert_sql);
echo"<script>showPopup()</script>";
}
}
?>

</body>
</html>
