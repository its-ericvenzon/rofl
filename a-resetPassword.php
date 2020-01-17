<?php
require_once ('functions.php');
if (isset($_GET['email']) && isset($_GET['token'])){
    include('h-dbconnection.php');
    $email = mysqli_real_escape_string($conn, $_GET['email']);
	$token = mysqli_real_escape_string($conn, $_GET['token']);
    $sql = mysqli_query($conn, "SELECT adusername FROM admin WHERE ademail = '$email' AND token = '$token' AND token<>'' AND tokenExpire > NOW()");

    if ($sql->num_rows > 0){
        $record = mysqli_fetch_assoc($sql);
        $un = $record['adusername'];
        echo "
            <html>
            <header>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>ROFLab Password Reset</title>
                <link rel='stylesheet' href='assets/bootstrap/css/bootstrap.min.css'>
                <link rel='stylesheet' href='assets/css/loginform.css'>
                <link rel='stylesheet' href='assets/css/styles.css'>
                <script src='assets/js/jquery.min.js'></script>
                <script>
                    var check = function(){
                        if ((document.getElementById('pwd').value.length == 0) && (document.getElementById('cpwd').value.length == 0)) {
                            document.getElementById('match').innerHTML = '<br>';
                        } else if (document.getElementById('pwd').value == document.getElementById('cpwd').value) {
                            document.getElementById('match').style.color = 'green';
                            document.getElementById('match').innerHTML = 'Passwords Match';
                        } else {
                            document.getElementById('match').style.color = 'red';
                            document.getElementById('match').innerHTML = 'Passwords Do No Match';
                            error = 'Passwords Mismatch';
                        }
                    }
                </script>
                
                <script>
                    $(document).ready(function() {
                        //using $.ajax() function
                            $('#resetbutton').click(function () {
                                //get variables from registration form
                                var pwd = document.getElementById('pwd').value;
                                var cpwd = document.getElementById('cpwd').value;
                                var un = document.getElementById('username').innerHTML;
                                if (pwd != cpwd) {
                                    alert('Passwords do not match.');
                                    return false;
                                }
                                $.ajax({
                                    url: 'a-setPassword.php',
                                    type: 'post',
                                    data: {
                                        un:un,
                                        pwd: pwd,
                                        cpwd: cpwd
                                    },
                                    success: function() {
                                        alert('Password Set!');
                                        window.location = 'a-login.html';
                                    }
                                });
                                return false;
                            });
                    });
                </script>
            </header>";
        echo"<body>
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h4 class='modal-title'>Reset Your Password</h4></div>
                    <div class='modal-body'>
                        <p>You have requested to reset the password for: <span id='username'>";

        echo $un;
        echo "</span></p>
                        <form id='resetpwd'>
                            <div class='form-group'>
                                <input class='form-control' type='password' placeholder='New Password' onkeyup='check()' style='margin-bottom:10px;height:42px;' id='pwd' required>
                                <input class='form-control' type='password' placeholder='Retype New Password' onkeyup='check()' style='height:42px;' id='cpwd' required>
                            </div>
                        </form>
                        <span id='match'><br></span>
                    </div>
                    <div class='modal-footer'><button class='btn btn-primary' type='button' style='margin-top:0px;' id='resetbutton'>Reset My Password</button></div>
                </div>
            </div>
            </body>
            </html>
        ";
    }else{
        header('Location: a-login.html');
    }
}else{
    header('Location: a-login.html');
    exit();
}