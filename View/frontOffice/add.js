function validateForm() {
            // Récupère la valeur des champs de saisie
            var Titre = document.getElementById("Titre").value;
            var Description = document.getElementById("description").value;

            // Vérifie que le champ "Titre" est rempli
            if (Titre === "") {
                // Affiche un message d'erreur
                alert("Veuillez saisir le sujet de la réclamation.");
                // Renvoie false pour empêcher l'envoi du formulaire
                return false;
            }

            // Vérifie que le champ "Description" est rempli
            if (Description === "") {
                // Affiche un message d'erreur
                alert("Veuillez saisir le contenu.");
                // Renvoie false pour empêcher l'envoi du formulaire
                return false;
            }

            // Si toutes les vérifications sont passées, renvoie true
            return true;
        }