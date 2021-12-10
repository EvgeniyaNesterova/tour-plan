<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name_booking = $_POST['name_booking'];
$phone_booking = $_POST['phone_booking'];
$message_booking = $_POST['message_booking'];
$email_booking = $_POST['email_booking'];
$email_newsletter = $_POST['email_newsletter'];
$name_footer = $_POST['name_footer'];
$phone_footer = $_POST['phone_footer'];
$message_footer = $_POST['message_footer'];



// Формирование самого письма
$title_booking = "Booking request Best Tour Plan";
$title_newsletter = "Subscription to Newsletters from Best Tour Plan";
$title_footer = "New message";
$body_booking = "
<h4>Sent from: evgeniya.nesterova0804@gmail.com </h3>
<h4>Web-site: Best Tour Plan</h3>
<h2>Booking request</h2>
<b>Имя:</b> $name_booking<br>
<b>Почта:</b> $email_booking<br><br>
<b>Телефон:</b> $phone_booking<br><br>
<b>Сообщение:</b><br>$message_booking
";
$body_newsletter = "
<h4>Sent from: evgeniya.nesterova0804@gmail.com </h3>
<h4>Web-site: Best Tour Plan</h3>
<h2>I would like to subscribe to Newsletters from Best Tour Plan</h2>
<b>Почта:</b> $email_newsletter<br><br>
";
$body_footer = "
<h4>Sent from: evgeniya.nesterova0804@gmail.com </h3>
<h4>Web-site: Best Tour Plan</h3>
<h2>New message</h2>
<b>Имя:</b> $name_footer<br>
<b>Телефон:</b> $phone_footer<br><br>
<b>Сообщение:</b><br>$message_footer
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'evgeniya.nesterova0804@gmail.com'; // Логин на почте
    $mail->Password   = 'pvfekopofmqyvvau'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('evgeniya.nesterova0804@gmail.com', 'Евгения Нестерова'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('jane1990@mail.ru');  

    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;
    // if (isset($name)) {
    //     $mail->Body = $body;
    //     $mail->Subject = $title;}
    // else {
    //     $mail->Body = $body_newsletter;
    //     $mail->Subject = $title_newsletter;}
    
    if(isset($_POST['name_booking'], $_POST['email_booking'], $_POST['phone_booking'], $_POST['message_booking'])) {
        $mail->Subject = $title_booking;
        $mail->Body = $body_booking;
    }
    if(isset($_POST['email_newsletter'])) {
        $mail->Subject = $title_newsletter;
        $mail->Body = $body_newsletter;
    }
    if(isset($_POST['name_footer'], $_POST['phone_footer'], $_POST['message_footer'])) {
        $mail->Subject = $title_footer;
        $mail->Body = $body_footer;
    }

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
// echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
header('Location: thankyou.html');