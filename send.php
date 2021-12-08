<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];

// Формирование самого письма
$title = "Booking request Best Tour Plan";
$title_newsletter = "Subscription to Newsletters from Best Tour Plan";
$body = "
<h4>Sent from: evgeniya.nesterova0804@gmail.com </h3>
<h4>Web-site: Best Tour Plan</h3>
<h2>Booking request</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Телефон:</b> $phone<br><br>
<b>Сообщение:</b><br>$message
";
$body_newsletter = "
<h4>Sent from: evgeniya.nesterova0804@gmail.com </h3>
<h4>Web-site: Best Tour Plan</h3>
<h2>I would like to subscribe to Newsletters from Best Tour Plan</h2>
<b>Почта:</b> $email<br><br>
";
$body_footer = "
<h4>Sent from: evgeniya.nesterova0804@gmail.com </h3>
<h4>Web-site: Best Tour Plan</h3>
<h2>New message</h2>
<b>Имя:</b> $name<br>
<b>Телефон:</b> $phone<br><br>
<b>Сообщение:</b><br>$message
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
    
    if(isset($name, $email, $phone, $message)) {
        $mail->Body = $body;
    }
    if(isset($name, $phone, $message)) {
        $mail->Body = $body_footer;
    }
    if(isset($email)) {
        $mail->Body = $body_newsletter;
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