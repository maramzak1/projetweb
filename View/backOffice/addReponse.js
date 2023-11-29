function validateForm() {
  // Get the values of the form fields
  var reponse = document.getElementById("reponse").value;
  var idReclamation = document.getElementById("idReclamation").value;

  // Check if the "Reponse" field is empty
  if (reponse === "") {
    alert("Veuillez saisir la reponse.");
    return false;
  }

  // Check if the "idReclamation" field is an integer
  if (isNaN(idReclamation)) {
    alert("L'id de la réclamation doit être un entier .");
    return false;
  }

  // If all validations pass, return true
  return true;
}