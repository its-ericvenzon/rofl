<?php
    include ('h-dbconnection.php');
    use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\SMTP;
    //use PHPMailer\PHPMailer\Exception;

    $em = trim($_POST['em']);
	$em = mysqli_real_escape_string($conn,$em);
    $often = trim($_POST['often']);
	$often = mysqli_real_escape_string($conn,$often);
    $date = trim($_POST['day']);
	$date = mysqli_real_escape_string($conn,$date);
    $time = trim($_POST['time']);
	$time = mysqli_real_escape_string($conn,$time);


    //echo $un . $em . $pwd . $age . $country . $edu . $gd;

    $sql = "INSERT into notification(notificationEmail, hoID, dayID, timeID) 
                VALUES ('$em', (SELECT hoID FROM howoften WHERE hoName = '$often'), 
                (SELECT dayID FROM notiday WHERE dayName = '$date'), (SELECT timeID FROM notitime WHERE timeName = '$time'))";
				
    $conn->query($sql);
    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        //echo "Error: Please contact an Admin via the 'Contact Us' form."
        die();
    }else{
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
        $mail->addAddress($em, "Stephen");
        $mail->Subject  = 'ROFL Notification Confirmation';
        $mail->Body     = "<h1>Notification Date!</h1> 
                        <strong>How often:</strong> $often <br>
                        <strong>Date:</strong> $date <br>
                        <strong>Time:</strong> $time <br>";

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Confirmation Email has has been sent";
        }
    }
    $conn->close();
?>