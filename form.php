<?php
    // EDIT THE FOLLOWING TWO LINES:
    $email_to = "alexistb2904@gmail.com";
    $email_subject = "Nouveaux messages de votre site";

    function problem($error)
    {
        echo "Désolé mais il semble avoir un soucis avec le formulaire que vous avez soumis. ";
        echo "Les erreurs sont les suivantes.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if ( !isset($_POST['Name']) || !isset($_POST['Message'])) {
        problem('Désolé mais il semble avoir un soucis avec le formulaire que vous avez soumis.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'Cette adresse ne semble pas être valide.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'Ce nom ne semble pas valide.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'Le message ne semble pas valide.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Détail du formulaire ci-dessous.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo "Test"
?>