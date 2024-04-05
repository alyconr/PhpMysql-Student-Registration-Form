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

// Check if student ID is provided
if (isset($_GET['id'])) {
    // Escape user input to prevent SQL injection
    $student_id = $conn->real_escape_string($_GET['id']);

    // SQL to delete student record
    $sql = "DELETE FROM student WHERE id = '$student_id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to index.php
        header("Location: index.php");
        exit(); // Ensure script stops execution after redirect
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Student ID not provided.";
}

// Close the connection
$conn->close();
