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

$sql = "SELECT * FROM patients WHERE PatientID = $patientID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form action='update_patient.php' method='post'>";
        echo "<label for='firstName'>First Name:</label>";
        echo "<input type='text' id='firstName' name='firstName' value='" . $row['FirstName'] . "' required><br><br>";

        echo "<label for='lastName'>Last Name:</label>";
        echo "<input type='text' id='lastName' name='lastName' value='" . $row['LastName'] . "' required><br><br>";

        echo "<label for='dob'>Date of Birth:</label>";
        echo "<input type='date' id='dob' name='dob' value='" . $row['DateOfBirth'] . "' required><br><br>";

        echo "<label for='gender'>Gender:</label>";
        echo "<input type='text' id='gender' name='gender' value='" . $row['Gender'] . "' required><br><br>";

        echo "<label for='contactNumber'>Contact Number:</label>";
        echo "<input type='text' id='contactNumber' name='contactNumber' value='" . $row['ContactNumber'] . "' required><br><br>";

        echo "<label for='email'>Email:</label>";
        echo "<input type='email' id='email' name='email' value='" . $row['Email'] . "' required><br><br>";

        echo "<label for='address'>Address:</label>";
        echo "<textarea id='address' name='address' required>" . $row['Address'] . "</textarea><br><br>";

        echo "<input type='hidden' name='patientID' value='" . $row['PatientID'] . "'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    }
} else {
    echo "No records found";
}

$conn->close();
?>
