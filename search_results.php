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

$patientId = $_GET['patientid'];

$sql = "SELECT * FROM patients WHERE PatientID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $patientId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Patient ID: " . $row["PatientID"] . "<br>";
        echo "First Name: " . $row["FirstName"] . "<br>";
        echo "Last Name: " . $row["LastName"] . "<br>";
        echo "Date of Birth: " . $row["DateOfBirth"] . "<br>";
        echo "Gender: " . $row["Gender"] . "<br>";
        echo "Contact Number: " . $row["ContactNumber"] . "<br>";
        echo "Results: " . $row["Results"] . "<br>";
        echo "Lab Technician: " . $row["LabTechnician"] . "<br>";
    }
} else {
    echo "No patient found with the given ID.";
}

$stmt->close();
$conn->close();
?>
