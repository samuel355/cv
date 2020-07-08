<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    if(isset($_POST['send_message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        //Load phpmailer
        require 'vendor/autoload.php';

        try {

            $mail = new PHPMailer(true);

            $header = 'ERMPlus.com Contact submissions';
            $fullcontent ="
                <h2> New Message From a Customer on erm-plus.com</h2>
                <h4> Full name : ".$name."</h4>
                <hp> Title : ".$subject."</hp>
                <h3>The content of the Message: </h3>
                <h4>".$message."</h4>
            ";
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'samueloseiboatenglistowell57@gmail.com';
            $mail->Password = '0264748772';
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom($email, $name);

            //Recipients
            $mail->addAddress('info@erm-plus.com', $header);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $fullcontent;
            $mail->AltBody = $fullcontent;

            $mail->send();
            if($mail->send()){
                echo " <div style='width: 25rem; text-align: center; border: 1px solid darkgrey; padding: 8px; margin-top: 20px; margin-left: 35%'>
                          <h4> ERM PLUS SUBMISSION</h4>
                         <div class='alert-success alert'> Thank you for your Message! <br> An agent will respond to you shortly</div>
                         <p>Exit to <a style='font-weight: bold; font-size: 20px' href='index.html'> Home Page</a></p>
                       </div>
                         ";
            }
            else{
                echo " <div style='width: 25rem; text-align: center; border: 1px solid darkgrey; padding-bottom: 8px; margin-top: 20px; margin-left: 35%;'>
                          <h4> ERM PLUS SUBMISSION</h4>
                         <div class='alert-success alert'> We are Sorry! <br> Please try again later</div>
                         <p>Exit to <a style='font-weight: bold; font-size: 20px' href='index.html'> Home Page</a></p>
                       </div>
                 ";
            }

        }
        catch (Exception $e) {
            $_SESSION['error'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            header ('location: contact.php');
        }

    }
    else {
        echo 'Fill out the form correctly';
        header('location: contact.php');
    }

?>