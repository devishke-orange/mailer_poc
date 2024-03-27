<?php

require '../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$mail = new \PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();

$mail->Host = $_ENV['GMAIL_SMTP'];
$mail->Port = $_ENV['GMAIL_PORT'];

$mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = $_ENV['USERNAME'];
$mail->Password = $_ENV['APP_PASSWORD'];

$mail->setFrom('from@example.com', 'First Last');
$mail->addAddress($_ENV['SEND_TO'], 'First Last');
$mail->Subject = "PHPMailer SMTP Test";
$mail->Body = 'Test Body';

if (!$mail->send()) {
    echo $mail->ErrorInfo;
} else {
    echo "Mail Sent";
}
