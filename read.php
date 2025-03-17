<?php
// Database connection configuration
$host = 'sql100.infinityfree.com';
$dbname = 'if0_38413377_abc3';
$username = 'if0_38413377';
$password = 'CfJvyeu7qZdeuts';

try {
    // Create a database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query all data in the timetable table
    $stmt = $conn->query("SELECT * FROM timetable");
    $timetableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Timetable</h1>
    <?php if (!empty($timetableData)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Day</th>
                    <th>Teacher</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($timetableData as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['subject']); ?></td>
                        <td><?php echo htmlspecialchars($row['day']); ?></td>
                        <td><?php echo htmlspecialchars($row['teacher']); ?></td>
                        <td><?php echo htmlspecialchars($row['time']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data found in the timetable.</p>
    <?php endif; ?>
</body>
</html>