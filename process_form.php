<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "gym"; // Replace with your MySQL database name

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  // Get form data
  $name = $_POST['name'];
  $age  = $_POST['age'];
  $gender = $_POST['gender'];
  $phone = $_POST['number'];
  $email = $_POST['email'];
  $locality = $_POST['locality'];

  // Insert data into database
  $stmt = $conn->prepare("insert into registration(name,age,gender,phone,email,locality)
    value(?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sisiss", $name, $age, $gender, $phone, $email, $locality);
  $stmt->execute();
  echo "registration successful...";
  $stmt->close();


  // Close connection
  $conn->close();
}
?>