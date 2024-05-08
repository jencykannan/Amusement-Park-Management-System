
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

    $result = $mysqli->query("SELECT email from lockers where locker_id = $lockerId");
    $row = $result->fetch_assoc();

    // Access the value of the column
    $e = $row['email'];
    echo $e;

    if($e==$user){
        $result2 = $mysqli->query("UPDATE lockers SET reserved = FALSE WHERE locker_id = $lockerId");

        $result1= $mysqli->query("UPDATE lockers SET email = '' WHERE locker_id = $lockerId");
        header('Location: db.php');
    }
   else {
    header('Location: db.php');
       
    } 
$mysqli->close();
?>

