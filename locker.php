
    <?php
    session_start();
    $user = $_SESSION['em'];
// Sample connection code
$mysqli = mysqli_connect

("localhost", "root", "", "park");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get locker ID from the form submission
$lockerId = $_POST['locker_id'];


// Query to reserve the locker
$result = $mysqli->query("UPDATE lockers SET reserved = TRUE WHERE locker_id = $lockerId");
$result1= $mysqli->query("UPDATE lockers SET email = '$user' WHERE locker_id = $lockerId");

// Check if the update was successful
if ($result) {
    echo "Locker $lockerId reserved successfully!";
    header('Location: db.php');
} else {
    echo "Failed to reserve locker.";
}

// Close connection
$mysqli->close();
?>

