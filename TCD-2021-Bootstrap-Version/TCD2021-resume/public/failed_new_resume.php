<?php
session_start();
include("../db-con.php");
//ob_start();

//EMAIL REG VERIFICATION//

if(!isset($_SESSION['email'])){
    header("Location:login");
}

$email = $_SESSION["email"];

    //take from acc table = $row
    $result = mysqli_query($connect, "SELECT * from resume WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    //take from resume table = $rows
    $results = mysqli_query($connect, "SELECT * from acc WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($results);


//include ('../db-con.php');

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
        $mail->setFrom('its.tcd.system@gmail.com', 'Tech Career Days Resume', FALSE);
        $mail->addAddress('its.tcd.system@gmail.com');     // Add a recipient
        $mail->addReplyTo('its.tcd.system@gmail.com', 'No Reply (Tech Career Days)');

        //$url = "http://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/verify.php?vkey=$vkey";

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "[Tech Career Days] NEW RESUME SUBMIT FAIL ".$email;
        $mail->Body    = $email.' has failed to a new resume, <br><br> This is an automated email.<br><br>Thank you.';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        ?><a href="resume"><button type="submit">Back To Dashboard</button></a> <?php
        //echo '<script>document.getElementById("error").innerHTML = "Verification email has been sent.<br><br>"</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    exit();


?>











