<?php

//EMAIL REG VERIFICATION//

include ('../db-con.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = 1;                 
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'its.tcd.system@gmail.com';               // SMTP username
        $mail->Password   = 'bsoxiqrulynnqugg';                      // SMTP password
        $mail->SMTPSecure = "tls";                                   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->Sender=('its.tcd.system@gmail.com');
        $mail->setFrom('Tech.Career.Days.2021@gmail.com', 'Tech Career Days System', FALSE);
        $mail->addAddress($email);     // Add a recipient
        //$mail->addReplyTo('its.tcd.system@gmail.com', 'TCD');

        $url = "https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/verify?vkey=$vkey";

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Tech Career Days Verify Email';
        $mail->Body    = "<!doctype html>
        <html lang='en'>
        <head>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <!--meta name='viewport' content='width=device-width,initial-scale=1'-->

            <style>
            @font-face {
                font-family: 'Bebas Neue';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/bebasneue/v2/JTUSjIg69CK48gW7PXoo9Wdhyzbi.woff2) format('woff2');
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /*@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');*/
            /*font-family: 'Bebas Neue', cursive;
            Titles*/
            </style>
        </head>
            <body>
                <div class='main' style='color: white;
                background-color: #15243C;
                text-align: center;
                padding: 5% 0; margin: 0% 5-40%';>
        <h1 style='font-family: 'Bebas Neue', cursive;font-size:30px;font-weight:bold;line-height:20px;text-align:center;color:white;'>Email Verification</h1>
        <br><br>
        <span class='text1' style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:16px;font-weight:400;line-height:24px;text-align:center;color:white;'><p>Click <a class='link' style='color: white; text-decoration: underline;' href='$url'>here</a> to verify your email or press the button below.</p></span>
        <br><br>
        <span style='border-color: #4368a3;
        border-radius: 5px;
        color:#4368a3;
        background-color: white;
        font-weight: bold;
        '>
        <a style='padding: 15px; font-size: 20px; border: 5px solid #4368a3; border-radius: 10%; background-color: #4368a3; color: white; font-weight: bold; text-decoration: none;' href='$url'>Verify Account</a></span>
        <br><br><br><br>
        <span class='text2' style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:16px;font-weight:400;line-height:24px;text-align:center;color:#637381;'><p></p><p><h5 style='color:white;'>Link didn't work? Copy the link below into your web browser:</h5><h5 style='color:red; font-size: 14px;'>$url</h5></p></span>
        <span style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:12px;font-weight:400;line-height:16px;text-align:center;color:#FFF;'>Best regards,<br>&#8211;Tech Career Days Team&#8211;</span><br><br>
        <div>
            <img src='https://techcareerdays.com/images/logo/LOGO%20standard.png' style='height:25px; width:auto;padding-right:10px'>
            <img src='https://techcareerdays.com/images/logo/itsociety_white.png' style='height:25px; width:auto;'>
        </div>
        <span style='font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:12px;font-weight:400;line-height:16px;text-align:center;color:#FFF;'>Tech Career Days 2021, presented by IT Society MMU Cyberjaya</span>
        </div>
            </body>
        </html>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<script>document.getElementById("error").innerHTML = "Verification email has been sent.<br><br>"</script>';
        /*echo '<div class="container">
                            <div class="alert alert-success words" role="alert">
                            Verification email has been sent.
                            </div>
                        </div>';*/
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    exit();


?>












