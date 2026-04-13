<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

function sendPendingEmail($toEmail, $userName, $program, $date, $time) {
    try {
        $basePath = realpath(__DIR__ . '/../');
        $dotenv = Dotenv::createImmutable($basePath);
        $dotenv->load();

        // EERST DIT: Maak het object aan
        $mail = new PHPMailer(true);

        // DAN PAS DE INSTELLINGEN:
        $mail->isSMTP();
        $mail->Host       = 'smtp.resend.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'resend';
        $mail->Password   = $_ENV['RESEND_API_KEY'];
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        
        $mail->Timeout    = 7; // Wacht maar 7 seconden, daarna een foutmelding geven
        // Optioneel voor debuggen (alleen aanzetten als het nog niet werkt)
        // $mail->SMTPDebug = 2; 

        $mail->setFrom('onboarding@resend.dev', 'Mark Cox Training');
        $mail->addAddress($toEmail); 

        $mail->isHTML(true);
        $mail->Subject = 'Bevestiging: Je aanvraag voor ' . $program;
        
        $formattedDate = date('d-m-Y', strtotime($date));
        $mail->Body = "Je boeking voor $program op $formattedDate is ontvangen.";

        return $mail->send();
    } catch (Exception $e) {
        // Echo de fout zodat we het zien in de browser
        echo "Mailer Error: " . $e->getMessage();
        return false;
    }
}

// Zorg dat er GEEN code buiten de functie staat die $mail gebruikt!