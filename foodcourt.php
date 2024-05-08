<!DOCTYPE html>
<html lang="en">
  <?php
  session_start();
  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <style>
        .container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        #container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .food-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .food-image {
            width: 100%;
            max-width: 150px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .order-button {
            margin-top: 10px;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .ratings {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .star {
            color: #ffd700;
            margin-right: 3px;
        }
        .popup-container {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    /* Style for the overlay/background */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }

    /* Style for the close button */
    .close-btn {
      cursor: pointer;
      position: absolute;
      top: 10px;
      right: 10px;
    }
    </style>
</head>
<body>
  <form method="post">
<div class="popup-container" id="popupContainer">
    <span class="close-btn" onclick="closePopup()">&times;</span>
    <h2>Order Details</h2>
    <p id="content"></p>
    
    

  
  </div>

  <!-- Overlay/background -->
  <div class="overlay" id="overlay" onclick="closePopup()"></div>


<div id="container">
    <div class="food-item">
    <label class="container">
    <input id="food1" type="checkbox"><br>
    
    <span class="checkmark"></span>
    <img class="food-image" src="fooof1.jpg" alt="Food 1">
        <p>Burger</p><br>
        
    </label>
    <input type="number" id="num1" name="num1" hidden class="num" min=0 value=0>
        
        
    </div>

    <div class="food-item">
    <label class="container">
    <input type="checkbox" id="food2"><br>
    
    <span class="checkmark"></span>

    <img class="food-image" src="foood2.jpg" alt="Food 2">
        <p>Meals</p>
    </label>
    <input type="number" id="num2" name="num2" hidden class="num" min=0 value=0>
        
        
    </div>

    <div class="food-item">
    <label class="container">
    <input type="checkbox" id="food3"><br>
    <span class="checkmark"></span>
    <img class="food-image" src="foood3.jpg" alt="Food 3">
        <p>Chappati</p>
    </label>
    <input type="number" id="num3" name="num3" hidden class="num" min=0 value=0>
        
        
    </div>

    <div class="food-item">
    <label class="container">
    <input type="checkbox" id="food4"><br>
    <span class="checkmark" ></span>
    <img class="food-image" src="foood4.jpg" alt="Food 2">
        <p>Poori</p>
    </label>
    <input type="number" id="num4" name="num4" hidden class="num" min=0 value=0>
        
    
    </div>
    
    <div class="food-item">
    <label class="container">
    <input type="checkbox" id="food5"><br>
    <img class="food-image" src="foood5.jpg" alt="Food 2">
        <p>Barotta</p>
    <span class="checkmark"></span>
    </label>
    <input type="number" id="num5" name="num5" hidden class="num" min=0 value=0>
    </div>


    <div class="food-item">
    <label class="container">
    <input type="checkbox" id="food6"><br>
    <img class="food-image" src="foood6.jpg" alt="Food 2">
        <p>Fried rice</p>
    <span class="checkmark"></span>
    </label>
    <input type="number" id="num6" name="num6" hidden class="num" min=0 value=0>
        
        
        
    </div>

    <div class="food-item">
    <label class="container">
    <input type="checkbox" id="food7"><br>
    <span class="checkmark" ></span>
    <img class="food-image" src="foood7.jpg" alt="Food 2">
        <p>Rice</p>
    </label>
        
    <input type="number" id="num7" name="num7" hidden class="num" min=0 value=0>
        
    </div>

    <div class="food-item">
    <label class="container">
    <input type="checkbox" id="food8"><br>
        
    <span class="checkmark"></span>
    <img class="food-image" src="foood8.jpg" alt="Food 2">
        <p>Idli</p>
    </label>
        
    <input type="number" id="num8" name="num8" hidden class="num" min=0 value=0>
    
    </div>

    <div class="food-item">
    <label class="container">
    
    <input type="checkbox" id="food9"><br>
    
    <span class="checkmark"></span>

    <img class="food-image" src="dosa1.jpg" alt="Food 2">
        <p>Dosa</p>
    </label>
        
    <input type="number" id="num9" name="num9" hidden class="num" min=0 value=0>
        
    </div>

    <div class="food-item">
    <label class="container">
    
    <input type="checkbox" id="food10"><br>
    <span class="checkmark"></span>
     <img class="food-image" src="foood10.jpg" alt="Food 2">
        <p>Pizza</p>
        
        </label>
        <input type="number" id="num10" name="num10" hidden class="num" min=0 value=0>
        
    </div>

    

</div>
<div style="text-align:center;">
<button type="submit" class="order-button" id="order" name="order">Order Now</button>
<button type="submit" class="order-button" id="back" name="back" onclick="redirect()">Back</button>
</div>
</form>
</body>
        <script type="text/javascript">
  var cost = [];
  var num = [];
var food1 = document.getElementById("food1");
var food2 = document.getElementById("food2");
var food3 = document.getElementById("food3");
var food4 = document.getElementById("food4");
var food5 = document.getElementById("food5");
var food6 = document.getElementById("food6");
var food7 = document.getElementById("food7");
var food8 = document.getElementById("food8");
var food9 = document.getElementById("food9");
var food10 = document.getElementById("food10")

num[1]= document.getElementById("num1");
num[2]= document.getElementById("num2");
num[3]= document.getElementById("num3");
num[4]= document.getElementById("num4");
num[5]= document.getElementById("num5");
num[6]= document.getElementById("num6");
num[7]= document.getElementById("num7");
num[8]= document.getElementById("num8");
num[9]= document.getElementById("num9");
num[10]= document.getElementById("num10");




var qty=[];
var dish=["","Burger","Meals","Chappathi","Poori","Barotta","Fried rice","Tomato Rice","Idli","Dosa","Pizza"];


function openPopup(qty1,qty2,qty3,qty4,qty5,qty6,qty7,qty8,qty9,qty10) {
      // Show the popup container and overlay
qty[1] = qty1;
qty[2] = qty2;
qty[3] = qty3;
qty[4] = qty4;
qty[5] = qty5;
qty[6] = qty6;
qty[7] = qty7;
qty[8] = qty8;
qty[9] = qty9;
qty[10]= qty10;

cost[1]= qty[1] * 300;

cost[2]= qty[2] * 360;
cost[3]= qty[3] * 150;
cost[4]= qty[4] * 60;
cost[5]= qty[5] * 50;
cost[6]= qty[6] * 400;
cost[7]= qty[7] * 70;
cost[8]= qty[8] * 350;
cost[9]= qty[9] * 75;
cost[10]= qty[10] * 50;

for(var i = 1; i<=10; i++){
  if(cost[i]!=0){
    document.getElementById("content").innerHTML+="<br>"+dish[i]+":"+qty[i]+"=>"+cost[i];
  }
}
document.getElementById("popupContainer").style.display = "block";
      document.getElementById("overlay").style.display = "block";
    }
function closePopup() {
      // Hide the popup container and overlay
      document.getElementById("popupContainer").style.display = "none";
      document.getElementById("overlay").style.display = "none";
    }

    function processPayment() {
      // Add your payment processing logic here
      alert("Payment processed successfully!");
      // You may also close the popup after processing the payment
      closePopup();
    }
food1.addEventListener("change", function() {
  if (food1.checked) {
    num[1].removeAttribute("hidden");
    num[1].focus();
  } else {
    num[1].setAttribute("hidden", "true");
    num[1].value=0;
  }
});

food2.addEventListener("change", function() {
  if (food2.checked) {
    num[2].removeAttribute("hidden");
    num[2].focus();
  } else {
    num[2].setAttribute("hidden", "true");
    num[2].value=0;
  }
});
food3.addEventListener("change", function() {
  if (food3.checked) {
    num[3].removeAttribute("hidden");
    num[3].focus();
  } else {
    num[3].setAttribute("hidden", "true");
    num[3].value=0;
  }
});
food4.addEventListener("change", function() {
  if (food4.checked) {
    num[4].removeAttribute("hidden");
    num[4].focus();
  } else {
    num[4].setAttribute("hidden", "true");
    num[4].value=0;
  }
});
food5.addEventListener("change", function() {
  if (food5.checked) {
    num[5].removeAttribute("hidden");
    num[5].focus();
  } else {
    num[5].setAttribute("hidden", "true");
    num[5].value=0;
  }
});
food6.addEventListener("change", function() {
  if (food6.checked) {
    num[6].removeAttribute("hidden");
    num[6].focus();
  } else {
    num[6].setAttribute("hidden", "true");
    num[6].value=0;
  }
});

food7.addEventListener("change", function() {
  if (food7.checked) {
    num[7].removeAttribute("hidden");
    num[7].focus();
  } else {
    num[7].setAttribute("hidden", "true");
    num[7].value=0;
  }
});
food8.addEventListener("change", function() {
  if (food8.checked) {
    num[8].removeAttribute("hidden");
    num[8].focus();
  } else {
    num[8].setAttribute("hidden", "true");
    num[8].value=0;
  }
});
food9.addEventListener("change", function() {
  if (food9.checked) {
    num[9].removeAttribute("hidden");
    num[9].focus();
  } else {
    num[9].setAttribute("hidden", "true");
    num[9].value=0;
  }
});
food10.addEventListener("change", function() {
  if (food10.checked) {
    num[10].removeAttribute("hidden");
    num[10].focus();
  } else {
    num[10].setAttribute("hidden", "true");
    num[10].value=0;
  }
});


function redirect()
{
  window.open("lockerandfoodcourt.html");
}
</script>
<?php
$num = [];
$price =[];

if(isset($_POST['order'])){
  
  $useremail=$_SESSION['em'];
  $num[1] = $_POST['num1'];
  $num[2] = $_POST['num2'];
  $num[3] = $_POST['num3'];
  $num[4] = $_POST['num4'];
  
  $num[5] = $_POST['num5'];
  $num[6] = $_POST['num6'];
  
  $num[7] = $_POST['num7'];
  $num[8] = $_POST['num8'];
  
  $num[9] = $_POST['num9'];
  $num[10] = $_POST['num10'];
  echo"<script>openPopup($num[1],$num[2],$num[3],$num[4],$num[5],$num[6],$num[7],$num[8],$num[9],$num[10]);</script>";
  
  $price[1] = $num[1] * 300;
  $price[2] = $num[2] * 360;
  $price[3] = $num[3] * 150;
  $price[4] = $num[4] * 60;
  
  $price[5] = $num[5] * 50;
  $price[6] = $num[6] * 400;
  
  $price[7] = $num[7] * 70;
  $price[8] = $num[8] * 350;
  
  $price[9] = $num[9] * 75;
  $price[10] = $num[10] * 50;

  $total=$price[1]+$price[2]+$price[3]+$price[4]+$price[5]+$price[6]+$price[7]+$price[8]+$price[9]+$price[10];
  $conn = new mysqli("localhost", "root", "", "park");


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process each dish
for ($i = 1; $i <= 10; $i++) {
  if($price[$i]==0){

  }
  else{
    $insertSql = "insert INTO orders(email, dish_number, quantity, amount,total_amount) VALUES ('$useremail','$i','$num[$i]','$price[$i]','$total')";
    if ($conn->query($insertSql) !== TRUE) {
      echo "Error inserting record: " . $conn->error;
    }
    
    
  }
    
    
}
// Close the database connection
$conn->close();

}

?>






</html>
