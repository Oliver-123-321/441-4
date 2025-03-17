<?php
header('Content-Type: application/json');

// Database connection configuration
$host = 'sql100.infinityfree.com';
$dbname = 'if0_38413377_abc3';
$username = 'if0_38413377';
$password = 'CfJvyeu7qZdeuts';

try {
    // Create a database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the JSON data in the POST request
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    // Insert data into the MySQL table
    $stmt = $conn->prepare("INSERT INTO timetable (subject, day, teacher, time) VALUES (:subject, :day, :teacher, :time)");

    foreach ($data as $row) {
        $stmt->execute([
            ':subject' => $row['subject'],
            ':day' => $row['day'],
            ':teacher' => $row['teacher'],
            ':time' => $row['time']
        ]);
    }

    echo json_encode(['success' => true, 'message' => 'Data saved successfully']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error saving data: ' . $e->getMessage()]);
}
?>