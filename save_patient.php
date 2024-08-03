<?php
$servername = "localhost";
$username = "labtech";
$password = "buaE41oSbktcPiA9uuTc";
$dbname = "medical_lab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$PatientID = $_POST['PatientID'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$DateOfBirth = $_POST['DateOfBirth'];
$Gender = $_POST['Gender'];
$ContactNumber = $_POST['ContactNumber'];
$Results = $_POST['Results'];
$LabTechnician = $_POST['LabTechnician'];

$sql = "INSERT INTO patients (PatientID, FirstName, LastName, DateOfBirth, Gender, ContactNumber, Results, LabTechnician)
VALUES ('$PatientID', '$FirstName', '$LastName', '$DateOfBirth', '$Gender', '$ContactNumber', '$Results', '$LabTechnician')";

if ($conn->query($sql) === TRUE) {
    echo "New patient record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
