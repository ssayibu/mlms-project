<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        let PatientIDCounter = 1;  // Initialize the counter for patient IDs

        function generatePatientID() {
            const PatientIDInput = document.getElementById('PatientID');
            const prefix = "ML-PT/24/";
            const idNumber = String(PatientIDCounter).padStart(4, '0');  // Pad with leading zeros
            PatientIDInput.value = prefix + idNumber;
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            const FirstNameInput = document.getElementById('FirstName');
            FirstNameInput.addEventListener('input', generatePatientID);
        });
    </script>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="add_patient.php">Add Patient</a>
        <a href="search_patient.php">Search Patient</a>
    </div>
    <div class="container">
        <h1>PREGNANCY TEST</h1>
        <form action="save_patient.php" method="post">
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID" name="PatientID" readonly><br><br>

            <label for="FirstName">First Name:</label>
            <input type="text" id="FirstName" name="FirstName" required><br><br>

            <label for="LastName">Last Name:</label>
            <input type="text" id="LastName" name="LastName" required><br><br>

            <label for="DateOfBirth">Date of Birth:</label>
            <input type="date" id="DateOfBirth" name="DateOfBirth" required><br><br>

            <div class="Gender">
                Gender:
                <select id="Gender" name="Gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div><br><br>

            <label for="ContactNumber">Contact Number:</label>
            <input type="text" id="ContactNumber" name="ContactNumber" required><br><br>

            <label for="Results">Results:</label>
            <input type="text" id="Results" name="Results" required><br><br>

            <label for="LabTechnician">Lab Technician:</label>
            <textarea id="LabTechnician" name="LabTechnician" required></textarea><br><br>

            <input type="submit" value="Save Patient">
        </form>
    </div>
</body>
</html>
