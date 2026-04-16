<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$autoloadPath = realpath(__DIR__ . '/../vendor/autoload.php');
if (!$autoloadPath) {
    throw new RuntimeException('Composer autoload file not found. Run composer install.');
}

require_once $autoloadPath;

/**
 * Maak een PHPMailer object met de juiste SMTP configuratie.
 */
function createMailer(): PHPMailer {
    $basePath = realpath(__DIR__ . '/../');
    if ($basePath) {
        try {
            Dotenv::createImmutable($basePath)->safeLoad();
        } catch (Exception $e) {
            // .env is optioneel; ga door als het niet gevonden wordt.
        }
    }

    $smtpHost = getenv('SMTP_HOST') ?: 'smtp.resend.com';
    $smtpUsername = getenv('SMTP_USERNAME') ?: getenv('SMTP_USER') ?: 'apikey';
    $smtpPassword = getenv('SMTP_PASSWORD') ?: getenv('RESEND_API_KEY') ?: '';
    $smtpPort = getenv('SMTP_PORT') ?: 587;
    $smtpFrom = getenv('SMTP_FROM') ?: 'noreply@yourdomain.com';
    $smtpFromName = getenv('SMTP_FROM_NAME') ?: 'Mark Cox Training';

    if (empty($smtpPassword)) {
        throw new Exception('Mailer configuration missing: SMTP_PASSWORD or RESEND_API_KEY is not set.');
    }

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = (int) $smtpPort;
    $mail->Timeout = 15;
    $mail->setFrom($smtpFrom, $smtpFromName);
    $mail->addReplyTo($smtpFrom, $smtpFromName);

    return $mail;
}

/**
 * Verstuurt de initiële aanvraagbevestiging naar de klant.
 */
function sendPendingEmail($toEmail, $userName, $program, $date, $time) {
    try {
        $mail = createMailer();
        $mail->addAddress($toEmail);
        $mail->isHTML(true);
        $mail->Subject = 'Aanvraag ontvangen: ' . $program;

        $formattedDate = date('d-m-Y', strtotime($date));
        $mail->Body = "
            <div style='background-color: #f4f4f4; padding: 40px 0; font-family: Arial, sans-serif;'>
                <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden;'>
                    <div style='background-color: #1a1a1a; padding: 20px; text-align: center;'>
                        <h1 style='color: #e8580a; margin: 0; font-size: 24px;'>Mark Cox Training</h1>
                    </div>
                    <div style='padding: 30px; color: #333333;'>
                        <h2>Bedankt voor je aanvraag</h2>
                        <p>Beste $userName, we hebben je boeking voor <strong>$program</strong> op $formattedDate om $time uur ontvangen.</p>
                        <p>Mark bekijkt je aanvraag zo snel mogelijk.</p>
                    </div>
                </div>
            </div>";

        return $mail->send();
    } catch (Exception $e) {
        error_log('Mailer Error: ' . $e->getMessage());
        return false;
    }
}
