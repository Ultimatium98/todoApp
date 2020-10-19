<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/styles/main.css">
    <title>TodoApp</title>
  </head>
  <body>
    <header>
      <div class="header-container">
        <h1>TodoApp</h1>
        <img src="public/img/todo-icon.png" alt="">
      </div>
    </header>
    <div class="main-site">
      <div class="form-class">
        <?php
        if(isset($_GET['error'])){
          if($_GET['error'] === 'log_err'){
            echo "<p class='error'>Email or Password incorrect</p>";
          }
          else if($_GET['error'] ==='reg_err'){
            echo "<p class='error'>Email already taken</p>";
          }
        }
         ?>
        <form class="" action="src/auth/auth.php" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="email" class="form-control" placeholder="E-mail" name="email" required>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required minlength="8">
            <div class="input-group-append">
            </div>
          </div>
          <div class="buttons">
            <input type="submit" value="Login" name = "action" class="btn btn-primary">
            <input type="submit" value="Sign in" name="action" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="info">
        <div class="list">
          <ul>
            <li>Create a task</li>
            <li>Increase your productivity</li>
            <li>Keep track of your successes!</li>
          </ul>
        </div>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
