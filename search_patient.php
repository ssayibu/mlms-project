<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patient</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="add_patient.php">Add Patient</a>
        <a href="search_patient.php">Search Patient</a>
    </div>
    <div class="container">
        <h1>Search Patient</h1>
        <form action="search_results.php" method="post">
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID" name="PatientID" required><br><br>
            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>
