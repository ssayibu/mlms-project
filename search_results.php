<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="add_patient.php">Add Patient</a>
        <a href="search_patient.php">Search Patient</a>
    </div>
    <div class="container">
        <h1>Search Results</h1>
        <?php
        $servername = "db";
        $username = "labtech";
        $password = "buaE41oSbktcPiA9uuTc";
        $dbname = "medical_lab";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the patient ID from the form submission
        $patientID = $_POST['patientID'];

        // Prepare and execute the SQL query
        $sql = "SELECT * FROM patients WHERE PatientID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $patientID);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display the result
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<form action='update_patient.php' method='post'>";
                echo "<label for='firstName'>First Name:</label>";
                echo "<input type='text' id='firstName' name='firstName' value='" . htmlspecialchars($row['FirstName']) . "' required><br><br>";

                echo "<label for='lastName'>Last Name:</label>";
                echo "<input type='text' id='lastName' name='lastName' value='" . htmlspecialchars($row['LastName']) . "' required><br><br>";

                echo "<label for='dob'>Date of Birth:</label>";
                echo "<input type='date' id='dob' name='dob' value='" . htmlspecialchars($row['DateOfBirth']) . "' required><br><br>";

                echo "<label for='gender'>Gender:</label>";
                echo "<input type='text' id='gender' name='gender' value='" . htmlspecialchars($row['Gender']) . "' required><br><br>";

                echo "<label for='contactNumber'>Contact Number:</label>";
                echo "<input type='text' id='contactNumber' name='contactNumber' value='" . htmlspecialchars($row['ContactNumber']) . "' required><br><br>";

                echo "<label for='results'>Results:</label>";
                echo "<input type='text' id='results' name='results' value='" . htmlspecialchars($row['Results']) . "' required><br><br>";

                echo "<label for='labtech'>Lab Technician:</label>";
                echo "<textarea id='labtech' name='labtech' required>" . htmlspecialchars($row['LabTechnician']) . "</textarea><br><br>";

                echo "<input type='hidden' name='patientID' value='" . htmlspecialchars($row['PatientID']) . "'>";
                echo "<input type='submit' value='Update'>";
                echo "</form>";
            }
        } else {
            echo "No records found for Patient ID: " . htmlspecialchars($patientID);
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
