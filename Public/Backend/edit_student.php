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

// Check if form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'], $_POST['name'], $_POST['mobile'])) {
    // Escape user input to prevent SQL injection
    $student_id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $mobile = $conn->real_escape_string($_POST['mobile']);

    // SQL to update student record
    $sql = "UPDATE student SET name = '$name', mobile = '$mobile' WHERE id = '$student_id'";

    if ($conn->query($sql) === TRUE) {
        // Return the updated student data as JSON
        $updatedStudent = [
            'id' => $student_id,
            'name' => $name,
            'mobile' => $mobile
        ];
        echo json_encode($updatedStudent);
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Student ID or updated data not provided.";
}

// Close the connection
$conn->close();
