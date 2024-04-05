<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student data</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    // Database connection parameters
    $servername = "mysql_container"; // Update this with your MySQL container hostname or IP
    $username = "alyconr";
    $password = "alyconrpassword";
    $dbname = "school";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, 3306);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform SELECT query to fetch data from the 'student' table
    $sql = "SELECT id, name, mobile FROM student";
    $result = $conn->query($sql);

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td class='td' id='name_" . $row["id"] . "'>" . $row["name"] . "</td>
                <td class='td' id='mobile_" . $row["id"] . "'>" . $row["mobile"] . "</td>
                <td class='td'>
                    <div class='action-buttons'>
                        <button class='edit-btn' onclick='editStudent(" . $row["id"] . ", \"name_" . $row["id"] . "\", \"mobile_" . $row["id"] . "\")'>Edit</button>
                        <button class='delete-btn' onclick='deleteStudent(" . $row["id"] . ")'>Delete</button>
                    </div>
                </td>
              </tr>";
    }

    // Close the connection
    $conn->close();
    ?>


</body>

</html>