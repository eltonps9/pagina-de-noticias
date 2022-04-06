<?php
session_start();
require "conect.php";

$email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$pass= filter_input(INPUT_POST,'senha');
$token= md5(time());

if($email && $pass){

    $sql=$pdo->prepare("SELECT * FROM login WHERE email=:email && senha=:senha ");
    $sql->bindValue(":email",$email);
    $sql->bindValue(":senha",$pass);
    $sql->execute();

    if($sql->rowCount() == 0){

        $_SESSION['aviso']= "email ou senha incorreto";
        header("Location:../pages/login.php");
        exit;
        
    }else{
        $sql=$pdo->prepare("INSERT INTO login (token) VALUES(:token)");
        $sql->bindValue(":token",$token);
        $sql->execute();

        $_SESSION['token'] = $token;

        header("Location:../../index.php");
        exit;
    }
}

?>