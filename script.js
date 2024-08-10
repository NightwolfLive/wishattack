var date = new Date();
var startDate = new Date('2024-09-27');
var endDate = new Date('2024-10-11');

const joinBtn1 = document.getElementById("joinBtn1");
const joinBtn2 = document.getElementById("joinBtn2");
const mobileJoinBtn = document.getElementById("mobileJoinBtn");
const joinLink1 = document.getElementById("joinLink1");
const joinLink2 = document.getElementById("joinLink2");
const mobileJoinLink = document.getElementById("mobileJoinLink");
const mobileJoinImg = document.getElementById("mobileJoinImg");

console.log(date);

if (date >= startDate && date <= endDate) {
  joinBtn1.classList.remove('disabled');
  joinBtn2.classList.remove('disabled');
  mobileJoinBtn.classList.remove('mobileDisabled');

  joinBtn1.classList.add('enabled');
  joinBtn2.classList.add('enabled');
  mobileJoinBtn.classList.add('mobileEnabled');
  
  joinLink1.href = "join.html"
  joinLink2.href = "join.html"
  mobileJoinLink.href = "join.html"
  mobileJoinImg.src = "Images/icons/join.svg"
}
  
  



  const menuButton1 = document.getElementById("bars");
  const menuButton2 = document.getElementById("xIcon")
  const offMenu = document.getElementById("my-menu");

  function openMenu(event){
    event.target.style.display = "none"
    offMenu.style.display = "flex"
  }

  function closeMenu(){
    offMenu.style.display = "none"
    menuButton1.style.display = "block"
  }

  menuButton2.addEventListener("click", closeMenu)
  menuButton1.addEventListener("click", openMenu);
  window.addEventListener("resize", closeMenu);
