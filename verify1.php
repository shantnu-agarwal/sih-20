<?php
include ('php/session.php');
include ('php/config.php');

$phone="{$_POST['phone']}";
$pass="{$_POST['password']}";
$ar=$mysqli->query("SELECT * from users WHERE phone_no = '$phone' && pswd='$pass'");
if($ar->num_rows) {
    $_SESSION['phone']=$phone;
    $_SESSION['if']=$id;
    header('location:index.php');
}
else {
   $message = "Incorrect Phone number or Password";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>