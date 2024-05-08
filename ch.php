<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Amusement Park</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 800px;
            margin: auto;
        }

        h2 {
            color: #4caf50;
        }

        p {
            color: #333;
            line-height: 1.5;
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
            color: #333;
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
        <h2>Welcome to ABC Amusement Park</h2>

        <p>
            ABC Amusement Park takes pride in its numerous amazing rides. From family and kid-friendly rides to high-energy and thrill-inducing adventure rides, there is something for all age groups to enjoy. Those looking for easy-going relaxing rides will have a great and contented time enjoying the family rides. And those looking for ultimate daring feats and adrenaline-rushing experiences, the mid and high-thrill rides do not disappoint!
        </p>

        <h2>Amusement Park Rides</h2>

        <?php
        // Sample connection code
        $mysqli =mysqli_connect("localhost", "root", "", "park");
       
        echo "<div class='category-title'>Adult Rides</div>";
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

        $resultAdult = $mysqli->query("SELECT * FROM rides WHERE age_restriction >= 20 AND R_type IN ('Thrill', 'Dark')");
        while ($row = $resultAdult->fetch_assoc()) {
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



        // Close connection
        $mysqli->close();
        ?>

    </div>


</body>
</html>