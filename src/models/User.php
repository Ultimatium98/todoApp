<?php

class User{
  protected $password;
  public $email;

  public function __construct(){
    $args = func_get_args();
    $numArgs = func_num_args();

    if (method_exists($this, $function = '__construct'.$numArgs)) {
        call_user_func_array(array($this, $function), $args);
    }
  }

  public function __construct2($email, $password){
    $this->email = $email;
    $this->password = $password;
  }

  public function sign(PDO $pdo){
    try{
      $sql = "INSERT INTO user (email, password) values (?, ?)";
      $statement = $pdo -> prepare($sql);
      $result = $statement -> execute([$this->email, password_hash($this->password,  PASSWORD_BCRYPT )]);
      return $result;
    } catch(PDOException $e){
      return false;
    }
  }

  public function exists(PDO $pdo){
    try {
      $sql = "SELECT * from user WHERE email = ?";
      $statement = $pdo -> prepare($sql);
      $result = $statement->execute([$this->email]);
      $hashed_pwd = ($statement->fetch(PDO::FETCH_ASSOC))['password'];
      return password_verify($this->password, $hashed_pwd);
    } catch(PDOException $e){
        return false;
    }
  }
}

 ?>
