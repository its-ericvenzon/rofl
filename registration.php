<?php
    include ('h-dbconnection.php');
    use PHPMailer\PHPMailer\PHPMailer;

    $un = mysqli_real_escape_string($conn, trim($_POST['un']));
    $em = mysqli_real_escape_string($conn, trim($_POST['em']));
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    $age = mysqli_real_escape_string($conn, trim($_POST['age']));
    $country = mysqli_real_escape_string($conn, trim($_POST['country']));
    $edu = mysqli_real_escape_string($conn, trim($_POST['education']));
    $gender = mysqli_real_escape_string($conn, trim($_POST['gender']));


    $options = ['cost' => 10];
    $password = password_hash($pwd, PASSWORD_DEFAULT, $options);

    $sql = "INSERT into participant(username, passhash, email, countryID, ageID, eduID, genderID, active, dateStarted) 
                VALUES ('$un', '$password', '$em', (SELECT countryID FROM country WHERE country = '$country'), 
                (SELECT ageID FROM age WHERE ageRange = '$age'), (SELECT eduID FROM education WHERE education = '$edu'), 
                (SELECT genderID FROM gender WHERE gender = '$gender'), 1, now())";
    $conn->query($sql);
    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
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
        $mail->addAddress($em, $un);
        $mail->Subject  = 'ROFL New User Confirmation';
        $mail->Body     = "<h1>Thank you for signing up!</h1>
                        <br> 
                        <strong>Username:</strong> $un <br>
                        <strong>Age:</strong> $age <br>
                        <strong>Country:</strong> $country <br>
                        <strong>Education:</strong> $edu <br>
                        <strong>Gender:</strong> $gender <br>
                        <br>
                        What are you waiting for? Come on in for a laugh! 
                        (Insert Website Link Here)";

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Confirmation Email has has been sent";
        }
    }
    $conn->close();
?>