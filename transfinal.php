<!DOCTYPE html>
<html lang="en">
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
}

button {
  padding: 5px 10px;
  background-color: #4CAF50;
  color: white;
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

<div id="slider-container">
    <div id="image-slider">
        <img class="slider-image" src="fooof1.jpg" alt="Image 1">
        <img class="slider-image" src="dosa1.jpg" alt="Image 2">
        <img class="slider-image" src="image3.jpg" alt="Image 3">
        <!-- Add more images as needed -->
    </div>
</div>

<div id="content">
    <h1>Amusement Park Transaction</h1>
  <div>
    <label for="ticketType">Ticket Type:</label>
    <h3>Adult( above 130 cm): <input type="number" id="adult" min="0" value="0"></h3>
    <h3>Child ( below 130 cm): <input type="number" id="child" min="0" value="0"></h3> 
  </div>

  <div>
    <label for="quantity">Quantity:</label>
    
  </div>



  <div id="total">
    <h3>Adult: <span id="adult1">0 =>₹0.00</span></h3>
    <h3>Child: <span id="child1">0 =>₹0.00</span></h3>
    <h3>Total: <span id="totalAmount">0 =>₹0.00</span></h3>
  </div>
  <div>
    <button type="button" onclick="window.location.href='http://localhost/db%20project/payment.php';">Pay now!</button>
</div>
</div>
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

</script>

</body>
</html>
