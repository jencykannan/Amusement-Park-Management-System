<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amusement Park Rides</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        .category-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }

            .category-title {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Amusement Park Rides</h2>

        <?php
        // Sample connection code
        $mysqli =mysqli_connect("localhost", "root", "", "park");

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Query to retrieve ride data
        $result = $mysqli->query("SELECT * FROM rides");

        // Display ride data in the table
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Ride ID</th>";
        echo "<th>Ride Name</th>";
        echo "<th>Ride Type</th>";
        echo "<th>Duration</th>";
        echo "<th>Location</th>";
        echo "<th>Age Restriction</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['r_id']}</td>";
            echo "<td>{$row['R_name']}</td>";
            echo "<td>{$row['R_type']}</td>";
            echo "<td>{$row['duration']} minutes</td>";
            echo "<td>{$row['R_loc']}</td>";
            echo "<td>{$row['age_restriction']} years</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        // Display specific columns for kids, family, and adult rides
        echo "<div class='category-title'>Kids Rides</div>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Ride ID</th>";
        echo "<th>Ride Name</th>";
        echo "<th>Duration</th>";
        echo "<th>Location</th>";
        echo "<th>Age Restriction</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        $resultKids = $mysqli->query("SELECT * FROM rides WHERE age_restriction < 20 AND R_type NOT IN ('Thrill', 'Dark')");
        while ($row = $resultKids->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['r_id']}</td>";
            echo "<td>{$row['R_name']}</td>";
            echo "<td>{$row['duration']} minutes</td>";
            echo "<td>{$row['R_loc']}</td>";
            echo "<td>{$row['age_restriction']} years</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        echo "<div class='category-title'>Family Rides</div>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Ride ID</th>";
        echo "<th>Ride Name</th>";
        echo "<th>Duration</th>";
        echo "<th>Location</th>";
        echo "<th>Age Restriction</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        $resultFamily = $mysqli->query("SELECT * FROM rides WHERE R_type = 'Family'");
        while ($row = $resultFamily->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['r_id']}</td>";
            echo "<td>{$row['R_name']}</td>";
            echo "<td>{$row['duration']} minutes</td>";
            echo "<td>{$row['R_loc']}</td>";
            echo "<td>{$row['age_restriction']} years</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        echo "<div class='category-title'>Adult Rides</div>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Ride ID</th>";
        echo "<th>Ride Name</th>";
        echo "<th>Duration</th>";
        echo "<th>Location</th>";
        echo "<th>Age Restriction</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        $resultAdult = $mysqli->query("SELECT * FROM rides WHERE age_restriction >= 20 AND R_type IN ('Thrill', 'Dark')");
        while ($row = $resultAdult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['r_id']}</td>";
            echo "<td>{$row['R_name']}</td>";
            echo "<td>{$row['duration']} minutes</td>";
            echo "<td>{$row['R_loc']}</td>";
            echo "<td>{$row['age_restriction']} years</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        // Close connection
        $mysqli->close();
        ?>

    </div>

</body>
</html>