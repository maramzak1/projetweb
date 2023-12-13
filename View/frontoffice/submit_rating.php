
<?php
include "../../Controller/FolkloreC.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer la note soumise
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

    // Récupérer l'identifiant du folklore depuis le champ caché
    $folkloreId = isset($_POST['folklore_id']) ? $_POST['folklore_id'] : null;

    // Vérifier si la note est valide
    if ($rating !== null && is_numeric($rating) && $rating >= 1 && $rating <= 5 && $folkloreId !== null) {
        // Instancier la classe FolkloreC
        $folkloreController = new FolkloreC();

        // Appeler la fonction pour soumettre la notation
        $folkloreController->submitRating($folkloreId, $rating);

        // Mettez à jour la moyenne des notations
        $totalRating = $folkloreController->getFolkloreRating($folkloreId);

        // Renvoyer la réponse AJAX avec le nouveau totalRating
        echo json_encode(['success' => true, 'totalRating' => $totalRating]);
    } else {
        // Gérer l'erreur si la note ou l'identifiant du folklore est manquant ou invalide
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => 'Invalid rating or folklore ID.']);
    }
} else {
    // Gérer l'erreur si la requête n'est pas une requête POST
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}
?>

