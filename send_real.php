<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require 'vendor/autoload.php';

// Load the secret key from your .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$mail = new PHPMailer(true);

try {
    // Connection Settings for Resend via SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.resend.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'resend';                // Always "resend"
    $mail->Password   = $_ENV['RESEND_API_KEY']; // Grabbed from .env
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Sender and Receiver
    // Note: Use 'onboarding@resend.dev' if you haven't verified a domain yet!
    $mail->setFrom('onboarding@resend.dev', 'My PHP Project');
    $mail->addAddress('585677@edu.rocmn.nl  '); // Put your real email here!

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'It works! Real email from PHP';
    $mail->Body    = '<h1>Success!</h1><p>This mail was sent using PHPMailer and Resend.</p>';

    $mail->send();
    echo 'Mail succesvol verstuurd! Check je echte inbox.';

} catch (Exception $e) {
    echo "Fout bij verzenden: {$mail->ErrorInfo}";
}