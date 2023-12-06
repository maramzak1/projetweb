<?php
$to="guezaasma85@gmail.com";//ili youselou
$subject="ticket sold";
$message="le visiteur a commande son ticket";
$headers ="Content-Type: text /plain;charset=utf-8\r\n";
$headers .="From:asmagueza6@gmail.com\r\n";//ili yabeth
if (mail($to, $subject, $message, $headers)) {
    echo '<script>
            alert("Votre ticket est réservé !");
            window.location.href = "test_mail.php"; // Redirige vers la page test_mail.php après la réservation
         </script>';
} else {
    echo '<script>alert("Erreur d\'envoi!");</script>';
}
?>
