// preview
const set = document.querySelector('.other-product');
set.addEventListener('click', handleClick, false);

function handleClick(e) {  
  if (e.target.matches('img')) {
    var preview = e.target.src;
    document.getElementById("main-product").src = preview;
  }
}

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("main-product");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function prev(element) {
  modal.style.display = "block";
  document.getElementById("main-modal").src = element.src;
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var modalRev = document.getElementById("myRev");

// Get the button that opens the modal
var btnRev = document.getElementById("btn-review");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-rev")[0];

// When the user clicks the button, open the modal 
btnRev.onclick = function () {
  modalRev.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modalRev.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modalRev) {
    modalRev.style.display = "none";
  }
}

const setModal = document.querySelector('.other-modal');
setModal.addEventListener('click', onTheClick, false);

function onTheClick(e) {  
  if (e.target.matches('img')) {
    var preview = e.target.src;
    document.getElementById("main-modal").src = preview;
  }
}

// var img = [
//   document.querySelector('.other-modal img:nth-of-type(1)').src,
//   document.querySelector('.other-modal img:nth-of-type(2)').src,
//   document.querySelector('.other-modal img:nth-of-type(3)').src,
//   document.querySelector('.other-modal img:nth-of-type(4)').src,
// ]

// let imageTag = document.querySelector('#main-modal');
// let i = 0;

// prevBtn = document.querySelector(".modal-prev");
// nextBtn = document.querySelector(".modal-next");


// nextBtn.addEventListener("click", function () {
//   if (i >= img.length - 1) {
//       return false;
//   }
//   i++;
//   imageTag.setAttribute('src', img[i]);
// });

// prevBtn.addEventListener("click", function () {
//   if (i <= 0) {
//       return false;
//   }
//   i--;
//   imageTag.setAttribute('src', img[i]);
// });


// var mainImg = document.querySelector("#main-modal");
// var allModalImgs = document.querySelectorAll(".other-modal img");

// prevBtn = document.querySelector(".modal-prev");
// nextBtn = document.querySelector(".modal-next");

// var currentImg = 0;

// nextBtn.addEventListener("click", function () {
//   mainImg.src = allModalImgs[currentImg].src;
//   currentImg = (currentImg += 1) % allModalImgs.length
// });

// prevBtn.addEventListener("click", function () {
//   mainImg.src = allModalImgs[currentImg].src;
//   currentImg = (currentImg -= 1) % allModalImgs.length
// });