<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

if (!function_exists('sendEmail')) {
    function sendEmail($mailConfig) {
        // PHPMailer initialization
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 1; // Enable debug output for debugging
            $mail->isSMTP(); // Send using SMTP
            $mail->Host = env('MAIL_HOST'); // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = env('MAIL_USERNAME'); // SMTP username
            $mail->Password = env('MAIL_PASSWORD'); // SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION'); // Enable TLS encryption
            $mail->Port = env('MAIL_PORT'); // TCP port to connect to

            // Recipients
            $mail->setFrom($mailConfig['mail_from_email'], $mailConfig['mail_from_name']);
            $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $mailConfig['mail_subject'];
            $mail->Body = $mailConfig['mail_body'];

            $mail->send();
            Log::info('Email sent successfully to ' . $mailConfig['mail_recipient_email']);
            return true;
        } catch (Exception $e) {
            Log::error('Email error: ' . $e->getMessage());
            return false;
        }
    }
}
