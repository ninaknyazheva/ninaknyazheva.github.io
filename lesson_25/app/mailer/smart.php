<?php 

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$phone = $_POST['user_phone'];
$website = $_POST['user_website'];
$message = $_POST['user_message'];


require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'garden.warden@yandex.ru';                 // Наш логин
$mail->Password = 'vww_V/N9r,vD_Ky';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('garden.warden@yandex.ru', 'Garden Warden Bot');   // От кого письмо 
$mail->addAddress('ninel.knyazheva@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Отправлена новая заявка';
$mail->Body    = '
	Пользователь оставил свои данные: <br> 
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . ' <br>
	Почта: ' . $email . ' <br>
	Сайт: ' . $website . ' <br>
	Сообщение: ' . $message . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo "Сообщение не отправлено";
    echo "Mailer Error:".$mail->ErrorInfo;
} else {
    header('Location: ../thanks.html');
}

?>