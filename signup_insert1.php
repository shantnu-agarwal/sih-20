<?php
include ('php/session.php');
include ('php/config.php');

$first="{$_POST['first-name']}";
$last="{$_POST['last-name']}";
$phone="{$_POST['phone']}";
$aadhaar="{$_POST['aadhaar']}";
$pass="{$_POST['password']}";

$ar=$mysqli->query("SELECT * from users WHERE aadhaar = '$aadhaar'");
if($ar->num_rows) {
    $message = "User Already exists.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
else {
    $iq=$mysqli->prepare("INSERT INTO users (fname, lname,phone_no,aadhaar,pswd) VALUES(?,?,?,?,?)");
    $iq->bind_param('sssss', $first, $last, $phone, $aadhaar, $pass);
    $iq->execute();
    header('location:login.php');
}
?>
