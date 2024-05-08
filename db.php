<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locker Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('k.jpg');
    background-size: cover;
        
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
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: purple;
            color: white;
        }

        .btn {
            background-color: mediumpurple;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        button {
            background-color: dodgerblue; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 16px; 
        }

        /* Hover effect */
        button:hover {
            background-color: darkblue; 
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Locker Reservation</h2>

        <table>
            <thead>
                <tr>
                    <th>Locker ID</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <button type="button" onclick="window.location.href='http://localhost/db%20project/main.php'">BACK!</button>
            <tbody>
                <?php
                // Sample connection code
                $mysqli =mysqli_connect("localhost", "root", "", "park");

                // Check connection
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                // Query to retrieve locker data
                $result = $mysqli->query("SELECT * FROM lockers");

                // Display locker data in the table
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['locker_id']}</td>";
                    echo "<td>" . ($row['reserved'] ? 'Reserved' : 'Unreserved') . "</td>";
                    if ($row['reserved']) {
                        // Display "Unreserve Locker" button
                        echo "<td>";
                        echo "<form method='post' action='process.php'>
                                <input type='hidden' name='locker_id' value='{$row['locker_id']}'>
                                <button class='btn' type='submit'>Unreserve Locker</button>
                              </form>";
                              echo "</td>";
                    } else {
                        echo "<td>";
                        // Display "Reserve Locker" button
                        echo "<form method='post' action='locker.php'>
                                <input type='hidden' name='locker_id' value='{$row['locker_id']}'>
                                <button class='btn' type='submit'>Reserve Locker</button>
                              </form>";
                              echo "</td>";
                    }                    
                    echo "</tr>";
                };
                
                
                // Close connection
                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>