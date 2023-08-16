
// const change = document.querySelectorAll(".order-list-option");
// change.addEventListener("click", () => {
//   change.forEach((change) => {
//   change.classList.toggle("active");
//   });

// });

// const changes = document.querySelector(".order-list-button");

// changes.addEventListener('click', function onClick() {
//   changes.style.backgroundColor = 'salmon';
//   changes.style.color = 'white';
// });


const changes = document.querySelectorAll(".order-list-button");

  changes.forEach((search) => {
    
    search.addEventListener("click", () => {
    document.querySelector(".button")?.classList.remove("button");  
    search.classList.add("button");
  });

});

// let change = document.querySelector(".order-list-option");
// function changeColor() {
//   change.forEach((change) => {
//       change.classList.toggle("active");
//       });
// }


const buttons = document.querySelectorAll(".order-list-button");
const contents = document.querySelectorAll(".order-list-box");

buttons.forEach((button, index) => {
  button.addEventListener('click', () => {
    buttons.forEach(button=>{button.classList.remove('active')});
  button.classList.add('active');

  contents.forEach(contents=>{contents.classList.remove('active')});
  contents[index].classList.add('active');
  })

})


// const balls = document.querySelectorAll(".cancel-button");
// const items = document.querySelectorAll(".popup");

// balls.forEach((ball, index) => {
//   ball.addEventListener('click', () => {
//     balls.forEach(ball=>{ball.classList.remove('active')});
//   ball.classList.add('active');

//   contents.forEach(contents=>{contents.classList.remove('active')});
//   contents[index].classList.add('active');
//   })

// })

// ball.addEventListener("click", () => {
//   items.forEach((item) => {
//     item.classList.toggle("open-popup");
//   });
//   ball.classList.toggle("open-popup");
// });

const confirm = document.querySelector(".popup");

function confirmCancle() {
  confirm.classList.toggle("open-popup");
}

function closePopup() {
  confirm.classList.remove("open-popup");
}
