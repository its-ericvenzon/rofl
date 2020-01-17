<?php
    include ('h-dbconnection.php');
    require_once "functions.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $un = mysqli_real_escape_string($conn, $_POST['un']);

    $sql = $conn->query("SELECT userID FROM participant WHERE email='$email' AND username='$un'");


    if ($sql->num_rows > 0) {
        $token = generateToken();

        $conn->query("UPDATE participant SET token='$token', 
                          tokenExpire=DATE_ADD(NOW(), INTERVAL 10 MINUTE)
                          WHERE email='$email'");

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
        $mail->setFrom('absolutions31@gmail.com', 'AB-Solutions');
        $mail->addAddress($email, $un);
        $mail->Subject = 'ROFL: Password Reset Link';
        $mail->Body = "<h1>You've lost your Password</h1> 
                            <bold>Don't worry. <br> You can get a new one here: </bold> 
                            <a href='localhost/ABSolutions/resetPassword.php?email=$email&token=$token'>
                                localhost/ABSolutions/resetPassword.php?email=$email&token=$token
                            </a><br><br>
                            <bold>LINK EXPIRES IN 10 MINUTES</bold>";

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "A password reset link has been sent to your email";
        }
    }else{
        echo "Uh-oh! No username and email combination found!";
    }
