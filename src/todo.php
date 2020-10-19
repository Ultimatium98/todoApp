<?php

require 'bootstrap.php';
session_start();

$user = $_SESSION["user"];
$pdo = Connection::make($config['database']);
$tasks = getAllTasks($pdo, $user);
$completed = getCompleted($pdo, $user);
$undone = count($tasks) - $completed;
$method = $_SERVER['REQUEST_METHOD'];

if($method === 'PUT'){
  try{
    $id = $_GET['id'];
    $task = Task::getById($pdo, $user, $id);
    $task->complete($pdo);
  } catch (Exception $e){
    die($e->getMessage());
  }
}

if($method === 'DELETE'){
  try{
    $id = $_GET['id'];
    $task = Task::getById($pdo, $user, $id);
    $task->delete($pdo);
  } catch (Exception $e){
    die($e->getMessage());
  }
}

if(isset($_POST["task"])){
  try{
    $title = $_POST["title"];
    $description = $_POST["description"];
    $task = new Task($user->email, $title, $description);
    $task->add($pdo, $user);
    header('Location: ../public/pages/todo.view.php');
  } catch (Exception $e){
    die($e->getMessage());
  }
}

 ?>
