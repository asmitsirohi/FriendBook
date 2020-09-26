<?php
    $errorAlert = false;
    $successAlert = false;

    if(isset($_POST['submit'])) {
        session_start();
        include("_connection.php");
        include("_userDataValid.php");

        $rand_num = $_SESSION['code'];

        $fname = test_input($_POST['fname']);
        $lname = test_input($_POST['lname']);
        $username = test_input($_POST['username']);
        $email= test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $gender = test_input($_POST['gender']);
        $captcha = $_POST['captcha'];

        if($captcha == $rand_num) {
            $query_check = "SELECT * FROM users WHERE `username` = '$username' OR `email` = '$email'";
            $data_check = mysqli_query($conn,$query_check);
            $row_check = mysqli_num_rows($data_check);
    
            if($row_check > 0) {
                $errorAlert = "Username or email is already register. Try another!";
                header("location:FriendBook/index.php?errorAlert=".$errorAlert."");
            } else {
                $rndno = rand(100000,999999);
    
                include('smtp/PHPMailerAutoload.php');
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->port = 587;
                $mail->SMTPSecure = "tls";
                $mail->SMTPAuth = true;
                $mail->Username = "**************";
                $mail->Password = "**************";
                $mail->setFrom("*************");
                $mail->addAddress($email);
                $mail->addBCC('***************');
                $mail->isHTML(true);
                $mail->Subject = "OTP for FriendBook account verification";
                $mail->Body = "<h1>OTP: ".$rndno."</h1><br><b>Hi $fname,</b> This OTP is sent by FriendBook for account verification.<br><br>Do not share your OTP with anyone.";
                $mail->SMTPOptions = array("ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                    "allow_self_signed"=>false,
                ));

                $mail->send();

                $_SESSION['otp'] = $rndno;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['gender'] = $gender;
                $_SESSION['password'] = $password;

                $successAlert = "OTP sent to your email address.";
                header("location:_verify_otp.php?successAlert=".$successAlert."");

            }
        } else {
            $errorAlert = "Captcha doesn't match. Try again.";
            header("location:FriendBook/index.php?errorAlert=".$errorAlert."");
        }

    }
?> 