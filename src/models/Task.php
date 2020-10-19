<?php

class Task{
  protected $id;
  protected $completed;
  public $email;
  public $title;
  public $description;
  public $datetime;

  public function __construct(){
    $args = func_get_args();
    $numArgs = func_num_args();

    if (method_exists($this, $function = '__construct'.$numArgs)) {
        call_user_func_array(array($this, $function), $args);
    }
  }

  public function __construct3($email, $title, $description)  {
    $this->email = $email;
    $this->title = $title;
    $this->description = $description;
    $this->completed = false;
    $this->datetime = date("Y-m-d");
  }

  public function getId(){
    return $this->id;
  }

  public function isCompleted(){
    return $this->completed;
  }

  public function complete(PDO $pdo){
    $this->completed = true;
    try{
      $sql = "UPDATE task SET completed='1' WHERE email = ? AND id = ?";
      $statement = $pdo -> prepare($sql);
      $result = $statement->execute([$this->email, $this->id]);
      return $statement->rowCount();
    } catch(PDOException $e){
        $e->getMessage();
        return false;
    }
  }

  public function delete(PDO $pdo){
    try{
      $sql = "DELETE FROM task WHERE email = ? AND id = ?";
      $statement = $pdo -> prepare($sql);
      $result = $statement->execute([$this->email, $this->id]);
      return $statement->rowCount();
    } catch(PDOException $e){
        $e->getMessage();
        return false;
    }
  }

  public function add(PDO $pdo, User $user){
    try{
      $sql = "INSERT INTO task (email, title, description, datetime) values (?, ?, ?, ?)";
      $statement = $pdo -> prepare($sql);
      $result = $statement->execute([$user->email, $this->title, $this->description, $this->datetime]);
      return $statement->rowCount();
    } catch(PDOException $e){
        $e->getMessage();
        return false;
    }
  }

  public static function getById(PDO $pdo, User $user, $id){
    try{
      $sql = "SELECT * FROM task WHERE email = ? and id = ?";
      $statement = $pdo -> prepare($sql);
      $result = $statement->execute([$user->email, $id]);
      return ($statement->fetchAll(PDO::FETCH_CLASS, 'Task'))[0];
    } catch(PDOException $e){
        $e->getMessage();
        return false;
    }
  }
}

 ?>
