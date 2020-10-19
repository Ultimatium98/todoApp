<?php

function getAllTasks(PDO $pdo, User $user){
  try {
    $sql = "SELECT * FROM task WHERE email = ?";
    $statement = $pdo -> prepare($sql);
    $result = $statement->execute([$user->email]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
  } catch(PDOException $e){
      $e->getMessage();
      die();
  }
}

function getCompleted(PDO $pdo, User $user){
  try {
    $sql = "SELECT * FROM task WHERE email = ? AND completed='1'";
    $statement = $pdo -> prepare($sql);
    $result = $statement->execute([$user->email]);
    return $statement->rowCount();
  } catch(PDOException $e){
      $e->getMessage();
      die();
  }
}

 ?>
