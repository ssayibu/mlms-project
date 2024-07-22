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

$PatientID = $_POST['patientID'];
$FirstName = $_POST['firstName'];
$LastName = $_POST['lastName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$contactNumber = $_POST['contactNumber'];
$results = $_POST['results'];
$labtech = $_POST['labTech'];

$sql = "UPDATE patients SET firstName='$FirstName', firstName='$LastName', dob='$DateOfBirth', gender='$Gender', contactNumber='$ContactNumber', results='$Results', labTech='$LabTechnician' WHERE patientID=$patientID";

if ($conn->query($sql) === TRUE) {
    echo "Patient record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
