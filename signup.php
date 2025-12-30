<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "social_db");
if($conn->connect_error){ die("Connection failed"); }

// Get POST data
$platform = $_POST['platform'] ?? '';
$fullname = $_POST['fullname'] ?? '';
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Simple backend validation
if($platform == "" || $email == "" || $password == "") {
    die("Please fill all required fields");
}

if(!preg_match("/^[A-Za-z ]+$/", $fullname)){
    die("Name must contain only letters");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Invalid email format");
}

if(strlen($password) < 5){
    die("Password must be at least 5 characters");
}
// Insert into database
$stmt = $conn->prepare("INSERT INTO users (platform, fullname, username, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $platform, $fullname, $username, $email, $password);

if($stmt->execute()) echo "$platform signup successful!";
else echo "Error: ".$stmt->error;

$stmt->close();
$conn->close();
?>
