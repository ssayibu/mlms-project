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

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $PatientID = $_POST['PatientID'];

        $sql = "SELECT * FROM patients WHERE PatientID = $PatientID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<form action='update_patient.php' method='post'>";
                echo "<label for='FirstName'>First Name:</label>";
                echo "<input type='text' id='FirstName' name='FirstName' value='" . $row['FirstName'] . "' required><br><br>";

                echo "<label for='LastName'>Last Name:</label>";
                echo "<input type='text' id='LastName' name='LastName' value='" . $row['LastName'] . "' required><br><br>";

                echo "<label for='DateOfBirth'>Date of Birth:</label>";
                echo "<input type='date' id='DateOfBirth' name='DateOfBirth' value='" . $row['DateOfBirth'] . "' required><br><br>";

                echo "<label for='Gender'>Gender:</label>";
                echo "<input type='text' id='Gender' name='Gender' value='" . $row['Gender'] . "' required><br><br>";

                echo "<label for='ContactNumber'>Contact Number:</label>";
                echo "<input type='text' id='ContactNumber' name='ContactNumber' value='" . $row['ContactNumber'] . "' required><br><br>";

                echo "<label for='Results'>Results:</label>";
                echo "<input type='text' id='Results' name='Results' value='" . $row['Results'] . "' required><br><br>";

                echo "<label for='LabTechnician'>Lab Technician:</label>";
                echo "<textarea id='LabTechnician' name='LabTechnician' required>" . $row['LabTechnician'] . "</textarea><br><br>";

                echo "<input type='hidden' name='PatientID' value='" . $row['PatientID'] . "'>";
                echo "<input type='submit' value='Update'>";
                echo "</form>";
            }
        } else {
            echo "No records found";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
