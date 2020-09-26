<?php
    $errorAlert = false;
    $successAlert = false;

    if(isset($_POST['submitUser'])) {
        session_start();
        include("_connection.php");
        include("_userDataValid.php");

        $forgetEmail= test_input($_POST['forgetEmail']);

        $rndno = rand(100000,999999);
    
                

        include('smtp/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->port = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "*************";
        $mail->Password = "*************";
        $mail->setFrom("***************");
        $mail->addAddress($forgetEmail);
        $mail->addBCC('************');
        $mail->isHTML(true);
        $mail->Subject = "OTP for FriendBook forget password verification";
        $mail->Body = "<h1>OTP: ".$rndno."</h1><br><b>Hi $forgetEmail,</b> This OTP is sent by FriendBook for forget password verification.<br><br>Do not share your OTP with anyone.";
        $mail->SMTPOptions = array("ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            "allow_self_signed"=>false,
        ));

        $mail->send();

        $_SESSION['otp'] = $rndno;
        $_SESSION['forgetEmail'] = $forgetEmail;
        

        $successAlert = "OTP sent to your email address.";
        header("location:_verify_forget_otp.php?successAlert=".$successAlert."");
    }
?> 