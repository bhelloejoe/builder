<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Please log in to book a service. <a href='login.html'>Login here</a>");
}

// Database credentials
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$dbname = "FixAndBuildHouse";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $service = $conn->real_escape_string($_POST['service']);
    $preferred_date = $conn->real_escape_string($_POST['date']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO bookings (user_id, name, email, phone, service, preferred_date, message)
            VALUES ('$user_id', '$name', '$email', '$phone', '$service', '$preferred_date', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
