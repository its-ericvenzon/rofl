<?php
    use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\SMTP;
    //use PHPMailer\PHPMailer\Exception;

    $em = trim($_POST['em']);
	$msg = trim($_POST['msg']);

        //send confirmation email with phpmailer
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
        $mail->addAddress($em);
        $mail->Subject  = 'Respond to Concerns';
        $mail->Body     = "<h1>We thank you for you contacting us</h1> 
                        <strong>Message:</strong> $msg";

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Respond has been sent";
        }
?>