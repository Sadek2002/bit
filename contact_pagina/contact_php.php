<?php

$message_sent= false;
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $phonenumber = $_POST['number'];
    $email = $_POST['mail'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {

        $to = "bitprojectgroep1@gmail.com,$email";

        $message_sent = mail($to, $subject, $message, 'From: ' . $email);

        if ($message_sent) {
            header('emailhasbeensent.php');
        } else {
            exit("Niet verzonden, probeer het opnieuw.");
        }

    } else {

        echo $invalid_class_name = "form-invalid";
    }

}
