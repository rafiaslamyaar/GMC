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

        // De professionele HTML Body
        $mail->Body = "
            <div style='background-color: #f4f4f4; padding: 40px 0; font-family: Arial, sans-serif;'>
                <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);'>
                    
                    <div style='background-color: #1a1a1a; padding: 20px; text-align: center;'>
                        <h1 style='color: #e8580a; margin: 0; font-size: 24px; text-transform: uppercase; letter-spacing: 2px;'>
                            Mark Cox Training
                        </h1>
                    </div>

                    <div style='padding: 30px; color: #333333;'>
                        <h2 style='color: #1a1a1a; margin-top: 0;'>Aanvraag Ontvangen</h2>
                        <p>Beste <strong>$userName</strong>,</p>
                        <p>Bedankt voor je interesse in Mark Cox Training. We hebben je aanvraag voor een trainingssessie succesvol ontvangen.</p>
                        
                        <div style='background-color: #f9f9f9; border-left: 4px solid #e8580a; padding: 15px; margin: 20px 0;'>
                            <p style='margin: 5px 0;'><strong>Programma:</strong> $program</p>
                            <p style='margin: 5px 0;'><strong>Datum:</strong> $formattedDate</p>
                            <p style='margin: 5px 0;'><strong>Tijdstip:</strong> $time uur</p>
                        </div>

                        <p>Mark zal je aanvraag persoonlijk beoordelen. Je ontvangt binnen 24 uur een definitieve bevestiging of een voorstel voor een ander tijdstip indien nodig.</p>
                        
                        <p>Heb je in de tussentijd vragen? Beantwoord dan gerust deze e-mail.</p>
                    </div>

                    <div style='background-color: #f4f4f4; padding: 20px; text-align: center; color: #777777; font-size: 12px;'>
                        <p style='margin: 0;'>&copy; " . date('Y') . " Mark Cox Training. Alle rechten voorbehouden.</p>
                        <p style='margin: 5px 0;'>Locatie: ROC Midden Nederland</p>
                    </div>
                </div>
            </div>
        ";

        return $mail->send();
    } catch (Exception $e) {
        // Echo de fout zodat we het zien in de browser
        echo "Mailer Error: " . $e->getMessage();
        return false;
    }
}

// Zorg dat er GEEN code buiten de functie staat die $mail gebruikt!