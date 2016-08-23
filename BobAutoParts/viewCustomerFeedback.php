<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 16/8/4
 * Time: 上午9:13
 */
$name= $_POST["name"];
$email= $_POST["email"];
$feedback= $_POST["feedback"];

$fromaddress= "From: webserver@example.com";
$toaddress= "515192471@qq.com";
$subject= "Customer Feedback";

$content= "Customer name: ".$name."\n"."Customer email: ".$email."\n"."Customer feedbaack: ".$feedback."\n";

mail($toaddress,$subject,$content,$fromaddress);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Feedback</title>
</head>
<body>
<h1>Feedback submited!</h1>
<h4>Your feedback has been sent!</h4>
<p>Your feedback is follow:</p>
<?php
echo nl2br($content);
?>
</body>
</html>
