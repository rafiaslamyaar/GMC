<?php
/**
 * PHP Mailer Configuration
 * Sends booking confirmation emails using PHP mail() function
 */

// Email configuration - CHANGE THESE TO YOUR EMAIL SETTINGS
define('MAILER_FROM_EMAIL', 'rafiaslami191.com');
define('MAILER_FROM_NAME', 'Mark Cox Training');
define('MAILER_ADMIN_EMAIL', 'markcoxx12@gmail.com'); // Admin email to receive notifications

/**
 * Send booking pending confirmation email
 * @param string $email Customer email
 * @param string $name Customer name
 * @param string $program Program name
 * @param string $date Booking date
 * @param string $time Booking time
 * @return bool Success status
 */
function sendPendingEmail($email, $name, $program, $date, $time) {
    $subject = "Uw boekingsaanvraag is ontvangen - Mark Cox Training";
    
    $message = "
    <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; }
                .container { max-width: 600px; margin: 0 auto; background-color: #f9f9f9; padding: 20px; border-radius: 8px; }
                .header { background-color: #e8580a; color: white; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; }
                .content { background-color: #fff; padding: 20px; }
                .booking-details { background-color: #f5f5f5; padding: 15px; border-left: 4px solid #e8580a; margin: 20px 0; }
                .footer { color: #888; font-size: 12px; text-align: center; margin-top: 20px; }
                strong { color: #e8580a; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Boekingsaanvraag Ontvangen</h1>
                </div>
                <div class='content'>
                    <p>Hallo <strong>" . htmlspecialchars($name) . "</strong>,</p>
                    
                    <p>Bedankt voor uw boekingsaanvraag! Uw aanvraag is succesvol ontvangen en we zullen deze zo snel mogelijk beoordelen.</p>
                    
                    <div class='booking-details'>
                        <h3 style='margin-top: 0; color: #333;'>Uw boekingsgegevens:</h3>
                        <p><strong>Naam:</strong> " . htmlspecialchars($name) . "</p>
                        <p><strong>Program:</strong> " . htmlspecialchars($program) . "</p>
                        <p><strong>Datum:</strong> " . htmlspecialchars($date) . "</p>
                        <p><strong>Tijd:</strong> " . htmlspecialchars($time) . "</p>
                        <p><strong>Status:</strong> <span style='color: #ff9800;'>⏳ In afwachting</span></p>
                    </div>
                    
                    <p>U ontvangt zo snel mogelijk een bevestigingsmail wanneer uw boeking is goedgekeurd.</p>
                    
                    <p>Vragen? Neem gerust contact met ons op.</p>
                    
                    <p>Met vriendelijke groet,<br><strong>Mark Cox Training Team</strong></p>
                    
                    <div class='footer'>
                        <p>Dit is een automatisch gegenereerde e-mail. Beantwoord alstublieft niet direct op deze e-mail.</p>
                    </div>
                </div>
            </div>
        </body>
    </html>
    ";
    
    return sendEmail($email, $subject, $message);
}

/**
 * Send booking confirmed/accepted email
 * @param string $email Customer email
 * @param string $name Customer name
 * @param string $program Program name
 * @param string $date Booking date
 * @param string $time Booking time
 * @return bool Success status
 */
function sendConfirmedEmail($email, $name, $program, $date, $time) {
    $subject = "Uw boeking is geconfirmeerd! - Mark Cox Training";
    
    $message = "
    <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; }
                .container { max-width: 600px; margin: 0 auto; background-color: #f9f9f9; padding: 20px; border-radius: 8px; }
                .header { background-color: #e8580a; color: white; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; }
                .content { background-color: #fff; padding: 20px; }
                .booking-details { background-color: #f0f8f0; padding: 15px; border-left: 4px solid #4caf50; margin: 20px 0; }
                .footer { color: #888; font-size: 12px; text-align: center; margin-top: 20px; }
                strong { color: #e8580a; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>✓ Boeking Geconfirmeerd!</h1>
                </div>
                <div class='content'>
                    <p>Hallo <strong>" . htmlspecialchars($name) . "</strong>,</p>
                    
                    <p>Gefeliciteerd! Uw boeking is goedgekeurd en geconfirmeerd. Wij kijken ernaar uit u te zien!</p>
                    
                    <div class='booking-details'>
                        <h3 style='margin-top: 0; color: #333;'>Uw bevestigde boeking:</h3>
                        <p><strong>Naam:</strong> " . htmlspecialchars($name) . "</p>
                        <p><strong>Program:</strong> " . htmlspecialchars($program) . "</p>
                        <p><strong>Datum:</strong> " . htmlspecialchars($date) . "</p>
                        <p><strong>Tijd:</strong> " . htmlspecialchars($time) . "</p>
                        <p><strong>Status:</strong> <span style='color: #4caf50;'>✓ Geconfirmeerd</span></p>
                    </div>
                    
                    <p><strong>Belangrijk:</strong> Gelieve op tijd te verschijnen. Als u niet kunt komen, laat ons alstublieft van tevoren weten.</p>
                    
                    <p>Vragen of opmerkingen? Neem contact met ons op!</p>
                    
                    <p>Tot ziens!<br><strong>Mark Cox Training Team</strong></p>
                    
                    <div class='footer'>
                        <p>Dit is een automatisch gegenereerde e-mail. Beantwoord alstublieft niet direct op deze e-mail.</p>
                    </div>
                </div>
            </div>
        </body>
    </html>
    ";
    
    return sendEmail($email, $subject, $message);
}

/**
 * Generic email sending function
 * @param string $to Recipient email
 * @param string $subject Email subject
 * @param string $message Email body (HTML)
 * @return bool Success status
 */
function sendEmail($to, $subject, $message) {
    // Prepare headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: " . MAILER_FROM_NAME . " <" . MAILER_FROM_EMAIL . ">" . "\r\n";
    
    // Send email
    $result = mail($to, $subject, $message, $headers);
    
    // Log the email send attempt
    logEmail($to, $subject, $result);
    
    return $result;
}

/**
 * Log email sending activity
 * @param string $to Recipient email
 * @param string $subject Email subject
 * @param bool $success Whether email was sent
 */
function logEmail($to, $subject, $success) {
    $logDir = __DIR__ . '/../logs';
    $logFile = $logDir . '/email_log.txt';
    
    // Create logs directory if it doesn't exist
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $logEntry = sprintf(
        "[%s] TO: %s | SUBJECT: %s | STATUS: %s\n",
        date('Y-m-d H:i:s'),
        $to,
        $subject,
        $success ? 'SUCCESS' : 'FAILED'
    );
    
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}
