function addStudent() {
  var name = document.getElementById("name").value;
  var mobile = document.getElementById("mobile").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var newStudent = JSON.parse(xhr.responseText);
      console.log(newStudent);
      var table = document.querySelector(".container-table table");

      // Create a new row in the table with the details of the newly added student
      var newRow = table.insertRow(-1);
      var nameCell = newRow.insertCell(0);
      var mobileCell = newRow.insertCell(1);

      // Set content and IDs for the new cells
      nameCell.textContent = newStudent.name;
      mobileCell.textContent = newStudent.mobile;
      nameCell.id = "name_" + newStudent.id; // Assign ID
      mobileCell.id = "mobile_" + newStudent.id; // Assign ID

      // add action buttons
      var actionCell = newRow.insertCell(2);
      var editButton = document.createElement("button");
      editButton.textContent = "Edit";
      editButton.style.color = "white";
      editButton.style.backgroundColor = "#4CAF50";
      editButton.style.width = "25%";
      editButton.style.padding = "10px 16px";
      editButton.style.margin = "8px 0";
      editButton.addEventListener("click", function () {
        editStudent(newStudent.id, nameCell.id, mobileCell.id); // Pass cell IDs
      });
      var deleteButton = document.createElement("button");
      deleteButton.textContent = "Delete";
      deleteButton.style.color = "white";
      deleteButton.style.backgroundColor = "#f44336";
      deleteButton.style.width = "25%";
      deleteButton.style.padding = "10px 16px";
      deleteButton.style.margin = "8px 0";
      deleteButton.addEventListener("click", function () {
        deleteStudent(newStudent.id);
      });
      actionCell.appendChild(editButton);
      actionCell.appendChild(deleteButton);

      actionCell.style.display = "flex";
      actionCell.style.flexDirection = "row";
      actionCell.style.alignItems = "center";
      actionCell.style.justifyContent = "flex-end";
      actionCell.style.padding = "5px";
      actionCell.style.gap = "10px";
      actionCell.style.width = "auto";

      // Clear the input fields
      document.getElementById("name").value = "";
      document.getElementById("mobile").value = "";

      // No need to call editStudent here
    }
  };
  xhr.open("POST", "add_students.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(
    "name=" + encodeURIComponent(name) + "&mobile=" + encodeURIComponent(mobile)
  );
}
