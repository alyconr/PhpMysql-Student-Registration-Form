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

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["name"]) && isset($_POST["mobile"])) {
    $name = $_POST["name"];
    $phone = $_POST["mobile"];

    // Perform INSERT query to add student to the 'student' table
    $sql = "INSERT INTO student (name, mobile) VALUES ('$name', '$phone')";
    if ($conn->query($sql) === TRUE) {
        // Retrieve the details of the newly added student
        $newStudentSql = "SELECT id, name, mobile FROM student WHERE id = LAST_INSERT_ID()";
        $result = $conn->query($newStudentSql);
        if ($result && $result->num_rows > 0) {
            $newStudent = $result->fetch_assoc();

            // Return JSON response with the details of the newly added student
            header('Content-Type: application/json');
            echo json_encode($newStudent);
        } else {
            echo json_encode(array("error" => "Failed to fetch newly added student."));
        }
    } else {
        echo json_encode(array("error" => "Failed to add student to the database."));
    }
} else {
    echo json_encode(array("error" => "Form data is missing."));
}

// Close the connection
$conn->close();
?>
