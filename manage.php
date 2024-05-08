<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Visitor Details</h1>

    <?php
    // Connect to MySQL

    $conn = mysqli_connect("localhost","root","","park");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve visitors
    $sql = "SELECT name,phone,email,loyalty_pts FROM visitor";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Loyalty points</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" .$row["loyalty_pts"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No visitors found.";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>