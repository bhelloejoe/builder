<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "house_services";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'];
$email = $_POST['email'];
$service = $_POST['service'];
$date = $_POST['date'];

// Insert into database
$sql = "INSERT INTO bookings (name, email, service, preferred_date) VALUES ('$name', '$email', '$service', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
