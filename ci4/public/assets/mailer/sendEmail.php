<?php /*
use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        try {
            //configuraciones smtp
            //sos gay
            /*
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth= true;
            $mail->Username = "cargut13prueb13@gmail.com";
            $mail->Password = "cc12cc12";
            $mail->Port= 465;
            $mail->SMTPSecure = "ssl";
            $mail->isSMTP();
            $mail->Host = "localhost";
            $mail->Port = 25;
            $mail->SMTPSecure = "tls";
            $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
            //configuraciones del email
            $mail->isHTML(true);
            $mail->setFrom($email, $name);
            $mail->addAddress("contacto@proyecto3.tk");
            $mail->Subject = ("$email ($subject)");
            $mail->Body = $body;
            //Mirar para abajo, nunca se ejecuta, pero el ejemplo lo pone, además, es una cagada de ejemplo
            echo $mail->ErrorInfo;
            if ($mail->send()) {
                $status = "success";
                $response = "Email enviado!";
            } else {
                $status = "failed";
                $response = "Algo salio mal: <br>" . $mail->ErrorInfo;
            }
            exit(json_encode(array("status" => $status, "response" => $response)));
        } catch (Exception $e) {
            echo "paso algo malo {$mail->ErrorInfo}";
        }
    } */