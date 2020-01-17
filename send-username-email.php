<?php
    include ('h-dbconnection.php');
    $email = trim($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $result = mysqli_query($conn, "SELECT username FROM participant WHERE email = '$email'");
    $record = mysqli_fetch_assoc($result);
    $un = $record['username'];

    use PHPMailer\PHPMailer\PHPMailer;

    require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
    require("vendor/phpmailer/phpmailer/src/SMTP.php");
    require("vendor/phpmailer/phpmailer/src/Exception.php");

    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    //workaround for no SSL certificates
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
    $mail->addAddress($email, $un);
    $mail->Subject  = 'ROFL: Here is Your Username';
    $mail->Body     = "<h1>You've lost your Username</h1> 
                        <bold>Don't worry. <br> We found it and it's:   </bold> $un <br>";

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "An Email with your username has been sent";
    }
?>