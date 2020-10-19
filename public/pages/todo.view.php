<?php require "../../src/todo.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoApp</title>
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css"></link>
    <link rel="stylesheet" href="../styles/todo.css"></link>
  </head>
  <body>
    <header>
      <nav id="mySidenav" class="sidenav">
        <a class="closebtn">&times;</a>
        <a class="logout" href="../../src/auth/logout.php">Logout</a>
      </nav>
      <span id='burger'>&#9776;</span>
      <div class="header-container">
        <h1>TodoApp</h1>
        <img src="../img/todo-icon.png" alt="">
      </div>
    </header>
    <div class="headers">
      <div class="header total">
        <div class="counter">
          <div class="text">
            <h3>Tasks not done</h3>
          </div>
          <div class="text">
            <h4><?= $undone; ?></h4>
          </div>
        </div>
      </div>
      <div class="header completed">
        <div class="counter">
          <div class="text">
            <h3>Tasks Completed</h3>
          </div>
          <div class="text">
            <h4><?= $completed ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- form -->
    <form class="" action="../../src/todo.php" method="post">
      <div class="task2add">
        <div class="input-group mb-3 title">
          <input type="text" class="form-control title" placeholder="Title" name="title" required>
        </div>
        <div class="input-group mb-3 description">
          <input type="text" class="form-control description" placeholder="Description" name="description">
        </div>
        <div class="input-group mb-3 add">
          <input class="btn-add" type="submit" name="task" value="Add">
        </div>
      </div>
    </form>

    <!-- task list -->
    <div class="task-section">
      <div class="text">
        <h2>Tasks to do</h2>
      </div>
      <div class="task-list">
        <div class="total-task">
          <ul>
            <?php foreach($tasks as $task):?>
              <?php if(!$task->isCompleted()): ?>
                <li>
                  <div class="task">
                    <h2 class='task-title'><?= $task->title ?></h2>
                    <div id='not' class="popup not">
                      <h6>Added: <?= $task->datetime ?></h6>
                      <h2><?= $task->title ?></h2>
                      <p><?= $task->description ?></p>
                      <div class="buttons">
                        <button class="popup-btn popup-btn-close" type="button" name="close">Close</button>
                        <button class='popup-btn put-btn' type="button" name="button" value=<?= $task->getId()?>>Complete</button>
                        <button class='popup-btn delete-btn' type="button" name="button" value=<?= $task->getId()?>>Delete</button>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        </div>
        <div class="completed-task">
          <ul>
            <?php foreach($tasks as $task):?>
              <?php if($task->isCompleted()): ?>
                <li>
                  <div class="task">
                    <h2 class='task-title'><?= $task->title ?></h2>
                    <div class="popup">
                      <h6>Added: <?= $task->datetime ?></h6>
                      <h2><?= $task->title ?></h2>
                      <p><?= $task->description ?></p>
                      <div class="buttons">
                        <button class="popup-btn popup-btn-close" type="button" name="button">Close</button>
                        <button class='popup-btn delete-btn' type="button" name="button" value=<?= $task->getId()?>>Delete</button>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
    <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
    <script type="text/javascript" src="../scripts/todo.js"></script>
  </body>
</html>
