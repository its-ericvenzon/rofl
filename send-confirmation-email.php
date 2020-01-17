<?php

    $un = trim($_POST['un']);
    $em = trim($_POST['em']);
    $age = trim($_POST['age']);
    $country = trim($_POST['country']);
    $edu = trim($_POST['education']);
    $gender = trim($_POST['gender']);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
    require("vendor/phpmailer/phpmailer/src/SMTP.php");
    require("vendor/phpmailer/phpmailer/src/Exception.php");

    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    //workaround for no SSL certificates MUST FIX LATER
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    //$mail->Host = gethostbyname('smtp.gmail.com'); //IPv4
    $mail->Host = "smtp.gmail.com"; //IPv6
    $mail->Port = 465; //587 for TLS or 465 for ssl
    $mail->IsHTML(true);

    $mail->Username = 'absolutions31@gmail.com';
    $mail->Password = 'lethbridge';
    $mail->setFrom('absolutions31@gmail.com', 'AB-Solutions'); //insert noreply@email.com here
    $mail->addAddress($em, $un);
    $mail->Subject  = 'ROFL New User Confirmation';
    $mail->Body     = "<h1>Thank you for signing up!</h1> 
                        <bold>Username:</bold> $un <br>
                        <bold>Age:</bold> $age <br>
                        <bold>Country:</bold> $country <br>
                        <bold>Education:</bold> $edu <br>
                        <bold>Gender:</bold> $gender <br>";


    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Confirmation Email has has been sent";
    }
?>