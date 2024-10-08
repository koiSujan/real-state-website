// let menu = document.querySelector(".header .menu");

// // document.querySelector('#menu-btn').onclick = () =>{
// //    menu.classList.toggle('active');
// // }
// if (menu) {
//   window.onscroll = () => {
//     menu.classList.remove("active");
//   };
// }

document.querySelectorAll('input[type="number"]').forEach((inputNumber) => {
  inputNumber.oninput = () => {
    if (inputNumber.value.length > inputNumber.maxLength)
      inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
  };
});

document
  .querySelectorAll(".view-property .details .thumb .small-images img")
  .forEach((images) => {
    images.onclick = () => {
      src = images.getAttribute("src");
      document.querySelector(
        ".view-property .details .thumb .big-image img"
      ).src = src;
    };
  });

document.querySelectorAll(".faq .box-container .box h3").forEach((headings) => {
  headings.onclick = () => {
    headings.parentElement.classList.toggle("active");
  };
});

const accountBtn = document.getElementById("account-btn");

accountBtn.addEventListener("click", function (e) {
  document.querySelector(".account-menu").classList.toggle("active");
});

document.addEventListener('click', function(e){
   if(e.target.id == "account-btn"){
      return ;
   }
   document.querySelector(".account-menu").classList.remove("active");
})
