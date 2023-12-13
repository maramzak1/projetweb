<?php
if (isset($_POST['reserve_ticket'])) {
    $to = "guezaasma85@gmail.com"; // Destination email
    $subject = "Ticket Reserved";
    
    // Get ticket details from the form
    $concert_name = $_POST['concert_name'];
    $ticket_price = $_POST['ticket_price'];

    // Create the email message
    $message = "Le visiteur a réservé un ticket pour le concert : $concert_name\nPrix du ticket : $ticket_price DT";

    $headers = "Content-Type: text/plain;charset=utf-8\r\n";
    $headers .= "From: asmagueza6@gmail.com\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email envoyé avec succès!";
    } else {
        echo "Erreur d'envoi de l'email.";
    }
}
?>