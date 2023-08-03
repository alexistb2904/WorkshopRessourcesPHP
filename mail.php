<?php
$destinataire = "alexistb2904@gmail.com";
$sujet = "Sujet de l'e-mail";
$message = "Contenu de l'e-mail.";

// En-têtes de l'e-mail
$headers = "From: support@workshopressources.fr\r\n";
$headers .= "Reply-To: alexistb2904@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

// Envoi de l'e-mail
if (mail($destinataire, $sujet, $message, $headers)) {
    echo "L'e-mail a été envoyé avec succès.";
} else {
    echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
}
?>
