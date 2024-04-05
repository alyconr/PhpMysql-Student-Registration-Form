<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <Link rel="stylesheet" href="styles.css" />
</head>

<body>
  <h2> SENA's Student Registration Form </h2>
  <img class="logo" src="logoSena.png" alt="Logo Sena">
  <form action="index.php" method="POST">


    <div class="container">
      <div class="imgcontainer">
        <img src="image.png" alt="Avatar" class="avatar">
      </div>
      <label for="name"><b>Student Name</b></label>
      <input type="text" placeholder="Enter Username" name="name" id="name" required>
      <br />
      <label for="mobile"><b>Mobile Number</b></label>
      <input type="text" placeholder="Enter mobile" name="mobile" id="mobile" required>
      <br />
      <button type="button" onclick="addStudent()">Add Student</button>
    </div>
  </form>
  <h2>Student Data</h2>
  <div class="container-table">
    <table>
      <tr>
        <th>Student Name</th>
        <th>Mobile</th>
        <th>Action</th>
      </tr>
      <?php include 'get_students.php'; ?>
    </table>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      include 'add_students.php';
    }
    ?>
  </div>
  <script type="text/javascript" src="deleteStudent.js">
  </script>

  <script type="text/javascript" src="addStudent.js">
  </script>

  <script type="text/javascript" src="editStudent.js">
  </script>

</body>

</html>