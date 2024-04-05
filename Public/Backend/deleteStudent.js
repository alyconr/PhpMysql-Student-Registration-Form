function deleteStudent(id) {
  console.log("Delete student with ID: " + id);
  // Send AJAX request to delete_student.php passing the student ID
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Reload the page after deletion
      window.location.reload();
    }
  };
  xhr.open("GET", "delete_student.php?id=" + id, true);
  xhr.send();
}
