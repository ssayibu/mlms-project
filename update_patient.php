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

$patientID = $_POST['patientID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$address = $_POST['address'];

$sql = "UPDATE patients SET FirstName='$firstName', LastName='$lastName', DateOfBirth='$dob', Gender='$gender', ContactNumber='$contactNumber', Email='$email', Address='$address' WHERE PatientID=$patientID";

if ($conn->query($sql) === TRUE) {
    echo "Patient record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
