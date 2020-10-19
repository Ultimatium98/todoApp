let sideNav = document.querySelector("#mySidenav");

let burger = document.querySelector("#burger");
burger.addEventListener("click", function(){
  sideNav.style.width = "200px";
})

let closeBtn = document.querySelector(".closebtn");
closeBtn.addEventListener("click", function(){
  sideNav.style.width = "0";
})

let total = document.querySelector(".total");
total.addEventListener("click", function(e){
  let text = document.querySelector(".task-section .text h2").textContent="Total Tasks";
  let tasks = document.querySelector(".total-task");
  tasks.style.display="block";
  document.querySelector(".completed-task").style.display="none";
})

let completed = document.querySelector(".completed");
completed.addEventListener("click", function(e){
  let text = document.querySelector(".task-section .text h2").textContent="Completed Tasks";
  let tasks = document.querySelector(".completed-task");
  tasks.style.display="block";
  document.querySelector(".total-task").style.display="none";
})

let titleField = document.querySelector(".input-group.title input");
titleField.addEventListener("focus", function(){
  let descriptionField = document.querySelector(".task2add .input-group.description");
  descriptionField.style.display = "flex";
})

let tasks = document.querySelectorAll(".task-title");
for(let i = 0; i < tasks.length; i++) {
  tasks[i].addEventListener("click", function(e){
    let div = e.srcElement.nextElementSibling;
    div.style.display="block";
  });
}

let popupBtn = document.querySelectorAll(".popup-btn-close");
for(let i = 0; i < popupBtn.length; i++){
  popupBtn[i].addEventListener("click", function(e){
    e.srcElement.offsetParent.style.display = "";
  })
}

let putBtn = document.querySelectorAll(".put-btn");
if(putBtn){
  for(let i = 0; i < putBtn.length; i++){
      putBtn[i].addEventListener('click', function(){
      $.ajax({
        url: 'http://localhost:8000/src/todo.php?id=' + putBtn[i].value,
        type: 'PUT',
        success: function(data, status){
          if(status == 'success'){
            location.reload();
          }
        },
        error: function(data, error){
          console.log(error);
        }
      });
    });
  }
}

let deleteBtn = document.querySelectorAll(".delete-btn");
if(deleteBtn){
    for(let i = 0; i < deleteBtn.length; i++){
      deleteBtn[i].addEventListener('click', function(){
      $.ajax({
        url: 'http://localhost:8000/src/todo.php?id=' + deleteBtn[i].value,
        type: 'DELETE',
        success: function(data, status){
          if(status == 'success'){
            location.reload();
          }
        },
        error: function(data, error){
          console.log(error);
        }
      });
    });
  }
}
