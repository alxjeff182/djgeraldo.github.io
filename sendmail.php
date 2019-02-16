<?php
if(isset($_POST['submit'])){
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 3;                              

$mail->isSMTP();                                     
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'alexsanderjeffry5@gmail.com';   
$mail->Password = 'valerialicia';                        
$mail->SMTPSecure = 'tls';                        
$mail->Port = 587;                                 

$mail->setFrom($_POST['email'], $_POST['first_name'].' '.$_POST['last_name']);
$mail->addAddress('alexsanderjeffry5@gmail.com', 'Jeffry Alexsander');    

$mail->Subject = 'DJGERALDO.COM';
$mail->Body    = '
<body style="font-family: Arial, Helvetica, sans-serif;">

<header style="background-color: #50b7c7;
  padding: 5px;
  text-align: center;
  font-size: 35px;
  color: white;">
  <h5>A New Message From '.$_POST['first_name'].' '.$_POST['last_name'].'</h5> 
</header>

<section style="  display: -webkit-flex;display: flex;">

  <article style="  
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;">
    <h1>'.$_POST['email'].'</h1>
    <p style="word-wrap: break-word;">'.$_POST['message'].'</p>
  </article>
</section>

<footer style="  background-color: #50b7c7;
  padding: 10px;
  text-align: center;
  color: white;">
  <p>DJGeraldo.com</p>
</footer>

</body>
';

if(!$mail->send()) {
    echo "<script>
    alert('Message could not be sent');
    window.location.href='javascript:history.back()';
    </script>";
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<script>
    alert('Thankyou, your message has been sent');
    window.location.href='javascript:history.back()';
    </script>";
}
}