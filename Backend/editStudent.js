function updateStudent(id, newName, newMobile, nameCellId, mobileCellId) {
  // Send AJAX request to edit_student.php to update the database
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        // Successfully updated, parse and render updated data
        var updatedStudent = JSON.parse(xhr.responseText);
        var nameCell = document.getElementById(nameCellId);
        var mobileCell = document.getElementById(mobileCellId);
        nameCell.textContent = updatedStudent.name;
        mobileCell.textContent = updatedStudent.mobile;
      } else {
        // Error handling
        console.error("Error updating student record: " + xhr.statusText);
      }
    }
  };
  xhr.open("POST", "edit_student.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("id=" + id + "&name=" + newName + "&mobile=" + newMobile);
}

function editStudent(id, nameCellId, mobileCellId) {
  // Retrieve DOM elements corresponding to the provided IDs
  var nameCell = document.getElementById(nameCellId);
  var mobileCell = document.getElementById(mobileCellId);

  // Debugging: Check if elements exist
  console.log("Name Cell:", nameCell);
  console.log("Mobile Cell:", mobileCell);

  if (!nameCell || !mobileCell) {
    console.error("Name cell or mobile cell not found.");
    return;
  }

  // Create input fields for inline editing
  var newNameInput = document.createElement("input");
  var newMobileInput = document.createElement("input");

  // Set input field values to current cell values
  newNameInput.value = nameCell.textContent;
  newMobileInput.value = mobileCell.textContent;

  // Replace cell content with input fields
  nameCell.innerHTML = "";
  mobileCell.innerHTML = "";
  nameCell.appendChild(newNameInput);
  mobileCell.appendChild(newMobileInput);

  // Add event listener to input fields to handle editing
  newNameInput.addEventListener("blur", function () {
    updateStudent(
      id,
      newNameInput.value,
      newMobileInput.value,
      nameCellId,
      mobileCellId
    );
  });

  newMobileInput.addEventListener("blur", function () {
    updateStudent(
      id,
      newNameInput.value,
      newMobileInput.value,
      nameCellId,
      mobileCellId
    );
  });
}
