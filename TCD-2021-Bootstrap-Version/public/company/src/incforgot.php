<?php

//EMAIL REG VERIFICATION//


include ('../../db-con.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

function clean($value){

    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);

    return $value;
}

if(isset($_POST["submit"])) {

    $emailTo = clean($_POST['email']);
    $vkey = uniqid(true);

    $sql = "INSERT INTO companyrstpwd(email, vkey) VALUES(? , ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('ss', $emailTo, $vkey);
    $stmt->execute();

    //$query = mysqli_query($connect, $sql);

}

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
        $mail->setFrom('its.tcd.system@gmail.com', 'Tech Career Days System', FALSE);
        $mail->addAddress($emailTo);     // Add a recipient
        $mail->addReplyTo('its.tcd.system@gmail.com', 'TCD');

        $url = "http://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetpwd?key=$vkey";

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Tech Career Days Reset Password';
        $mail->Body    = "<div class='main' style='
                            color: white;
                            background-color: #15243C;
                            text-align: center;
                            padding-top: 30px; 
                            padding-bottom: 15px; 
                            padding-left: 10px; 
                            padding-right: 10px;
                            border-radius: 8px;
                            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.13);
                            '>

                    <h1 style='color: white;'>Reset Password</h1>

                    <hr>

                    <span style='color:white;'><p>Click <a class='link' style='color: white; text-decoration: underline;' href='$url'>here</a> to verify your email or press the button below.</p></span>
                    <br><br>
                    <span style='border-color: #4368a3;
                    border-radius: 5px;
                    color:#4368a3;
                    background-color: white;
                    font-weight: bold;
                    '>
                    <a style='padding: 10px; font-size: 1.5em; border: 5px solid #4368a3; background-color: #4368a3; color: white; font-weight: bold; text-decoration: none;' href='$url'>Verify Email</a></span>
                    <br><br><br><br>
                    <span class='text2' style='color:white;'><p></p><p><h5 style='color:white;'>Link didn't work? Copy the link below into your web browser:</h5><h5 style='color:red;'>$url</h5></p></span>
                    <span style='text-align:left;'>Best regards,<br>&#8211;Tech Career Days Team&#8211;</span><br><br>
                    <span>Tech Career Days 2021, organized by IT Society MMU Cyberjaya</span>
                    </div>";

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
        header("Location: https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/login?login=emailSuccess");

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/login?login=emailFailed");

    }

    exit();


?>