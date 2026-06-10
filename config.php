<?php   
// Database connection
$servername = "localhost";
$username = "root";  // Default username
$password = "";      // Default XAMPP password 
$database = "loginform"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>