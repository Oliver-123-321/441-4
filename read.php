<?php
// Database connection details
$host = 'sql100.infinityfree.com'; // Replace with your host
$dbname = 'if0_38413377_abc3';  // Replace with your database name
$username = 'if0_38413377';  // Replace with your MySQL username
$password = 'CfJvyeu7qZdeuts';      // Replace with your MySQL password
 
// Create a connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
 
// Fetch data from the student table
$sql = "SELECT * FROM timetable";
$stmt = $conn->prepare($sql);
$stmt->execute();
 
// Check if records exist
if ($stmt->rowCount() > 0) {
    echo "<h2>Oliver Timetable</h2>";
    echo "<table border='1'>";
    echo "<tr><th>id</th><th>subject</th><th>day</th><th>time</th><th>teacher</th></tr>";
 
    // Output data of each row
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['subject'] . "</td>";
        echo "<td>" . $row['day'] . "</td>";
        echo "<td>" . $row['teacher'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
 
// Close the connection
$conn = null;
?>