<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical_lab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$address = $_POST['address'];

$sql = "INSERT INTO patients (FirstName, LastName, DateOfBirth, Gender, ContactNumber, Email, Address)
VALUES ('$firstName', '$lastName', '$dob', '$gender', '$contactNumber', '$email', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "New patient record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
