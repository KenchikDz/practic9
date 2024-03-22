<?php 
session_start();
require('bd.php');

// if(isset($_POST['nameU'], $_POST['famU'], $_POST['numberP'], $email = $_POST['email'], $login = $_POST['login'], ))
$name = $_POST['nameU'];
$famU = $_POST['famU'];
$numberP = $_POST['numberP'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$confirmPass = $_POST['passwordConf'];

if($confirmPass == $password) {
    $sql = "INSERT INTO `users`(`Name`, `SecondName`, `NumberPhone`, `Email`, `login`, `password`) 
    VALUES ('$name','$famU','$numberP','$email','$login','$confirmPass')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../pages/auth.php");
    } else {
        header("Location: ../pages/reg.php");
    }
    
} else {
    header("Location: ../pages/reg.php");
}

?>