function validateForm() {
  // Get the values of the form fields
  var reponse = document.getElementById("reponse").value;

  // Check if the "Reponse" field is empty
  if (reponse === "") {
    alert("Veuillez saisir la reponse.");
    return false;
  }

  

  // If all validations pass, return true
  return true;
}