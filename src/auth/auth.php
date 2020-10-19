<?php

require '../database/Connection.php';
require '../models/User.php';
$config = require '../config.php';
session_start();

$pdo = Connection::make($config['database']);

if(isset($_POST["action"])){
  $email =  $_POST["email"];
  $pass =  $_POST["password"];
  $user = new User($email, $pass);

  if ($_POST["action"] === "Sign in"){
    try{
      $result = $user->sign($pdo);
      if($result){
        $_SESSION["user"] = $user;
        header("location: ../../public/pages/todo.view.php");
      }
      if(!$result){
        $err = "User already exists";
        header("location: ../../index.php?error=reg_err");
      }
    } catch(Exception $e){
      die($e->getMesagge());
    }
  }
  else if ($_POST["action"] === "Login"){
    try{
      $result = $user->exists($pdo);
      if($result){
        $_SESSION["user"] = $user;
        header("location: ../../public/pages/todo.view.php");
      }
      if(!$result){
        $err = "Email or Password incorrect";

        header("location: ../../index.php?error=log_err");
      }
    } catch(Exception $e){
      die($e->getMessage());
    }
  }
}
