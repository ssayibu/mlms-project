<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="add_patient.php">Add Patient</a>
        <a href="search_patient.php">Search Patient</a>
    </div>
    <div class="container">
        <h1>Add Patient</h1>
        <form action="save_patient.php" method="post">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <div class="gender">
                    <label>Gender:</label>
                    <select>    
                        <option>M</option>
                        <option>F</option>
                    </select>
            </div>

            <label for="contactNumber">Contact Number:</label>
            <input type="text" id="contactNumber" name="contactNumber" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>

            <input type="submit" value="Save Patient">
        </form>
    </div>
</body>
</html>
