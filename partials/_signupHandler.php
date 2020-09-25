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
    
                // $to = $email;

                // $subject = "OTP for FriendBook account verification";

                // $txt = "OTP: ".$rndno."\n\nThis OTP is sent by FriendBook for account verification.\nDo not share your OTP with anyone.";

                // $headers = "From: FriendBook otp@FriendBook.com";

                // mail($to,$subject,$txt,$headers);

                include('smtp/PHPMailerAutoload.php');
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->port = 587;
                $mail->SMTPSecure = "tls";
                $mail->SMTPAuth = true;
                $mail->Username = "friendbookhelp@gmail.com";
                $mail->Password = "9761Abc@25";
                $mail->setFrom("friendbookhelp@gmail.com");
                $mail->addAddress($email);
                $mail->addBCC('asmitsirohi9761@gmail.com');
                $mail->isHTML(true);
                $mail->Subject = "OTP for FriendBook account verification";
                $mail->Body = "<h1>OTP: ".$rndno."</h1><br><b>Hi $fname,</b> This OTP is sent by FriendBook for account verification.<br><br>Do not share your OTP with anyone.";
                $mail->SMTPOptions = array("ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                    "allow_self_signed"=>false,
                ));

                $mail->send();
                // if($mail->send()) {
                //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                //             <strong>Success: </strong> Certificate is sent to your email address.
                //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                //             <span aria-hidden="true">&times;</span>
                //             </button>
                //         </div>';
                // } else {
                //     echo $mail->ErrorInfo;
                //     echo $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                // }

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