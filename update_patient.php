<?php
$servername = "db";
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
$dob = $_POST['DateOfBirth'];
$gender = $_POST['Gender'];
$contactNumber = $_POST['ContactNumber'];
$results = $_POST['Results'];
$labtech = $_POST['LabTechnician'];

$sql = "UPDATE patients SET FirstName='$FirstName', LastName='$LastName', DateOfBirth='$DateOfBirth', Gender='$Gender', ContactNumber='$ContactNumber', Results='$Results', LabTechnician='$LabTechnician' WHERE PatientID=$PatientID";

if ($conn->query($sql) === TRUE) {
    echo "Patient record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
