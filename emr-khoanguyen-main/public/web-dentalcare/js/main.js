
var sideBar = document.getElementsByClassName("sideBar");
var sticky = sideBar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
      sideBar.classList.add("sticky")
    } else {
        if (document.getElementsByClassName("sideBar sticky")) {
            sideBar.classList.remove("sticky");
        }
    }
}

if (sideBar && sticky) {
    window.onscroll = function() {myFunction()};
}

// ----------------------show/hide Top contactInfo-----------------
const infoToggle = document.querySelector(".infoToggle");
const contactInfo = document.querySelector(".contact__info");

infoToggle.addEventListener("click", () => {
    contactInfo.classList.toggle("active");
    infoToggle.classList.toggle("active");
})

//------------------Increment Counter ----------------
const numbers = document.querySelectorAll('.number')
for(let i = 0; i < numbers.length; i++) {
    function checkCountNumber() {
        const HeightWindow = window.innerHeight
        const number = numbers[i].getBoundingClientRect().top
        if (number < HeightWindow) {
            numbers[i].innerHTML = "0"
            const target = +numbers[i].getAttribute("data-target")
            const increment = target / 8
    
            const updaterCounter = () => {
                const c = +numbers[i].innerHTML
                if(c < target) {
                    numbers[i].innerHTML = `${Math.ceil(c + increment)}`
                    setTimeout(updaterCounter, 100)
                } else {
                    numbers[i].innerHTML = target
                }
                window.removeEventListener("scroll", checkCountNumber)
            }
            updaterCounter()
        }
    
    }
    window.addEventListener('scroll', checkCountNumber)
    checkCountNumber()

}

//-------------- appear item ------------
const FadeInItems = document.querySelectorAll(".FadeInItem")
function scrollEffect2() {
    const triggerBottom = window.innerHeight / 9 * 8
    FadeInItems.forEach(FadeInItem => {
        const FadeInItemTop = FadeInItem.getBoundingClientRect().top
        if(FadeInItemTop < triggerBottom) {
            FadeInItem.style.opacity = "1";
            FadeInItem.style.transform = "scale(1)";
        }
    })
}
window.addEventListener('scroll', scrollEffect2)
scrollEffect2()
// -------------appear when scroll------------
const ElementScrolls = document.querySelectorAll('.ElementScrollEffect')
function ElementScrollEffect() {
    const triggerBottom = window.innerHeight / 9 * 8
    ElementScrolls.forEach(ElementScroll => {
            const ElementScrollTop = ElementScroll.getBoundingClientRect().top
            if(ElementScrollTop < triggerBottom) {
                ElementScroll.classList.add('show')
            }
    })
}
window.addEventListener('scroll', ElementScrollEffect)
ElementScrollEffect()
// -----------scroll Navbar effect-----------
const NavEffect = document.querySelector('.NavEffect');
const navbar = document.querySelector('.navbar');
const ContainerNavbar = document.querySelector(".ContainerNavbar");
function fixNav() {
    if(window.scrollY > NavEffect.offsetHeight + 250) {
        ContainerNavbar.classList.add('active');
    } else {
        ContainerNavbar.classList.remove('active');
    }
}
window.addEventListener('scroll', fixNav);

// -----------scroll background-image effect-----------
let bodyId = document.getElementById("body");
if (bodyId) {
    bodyId.onscroll = function myFunction() {  
    var scrollToTop = document.scrollingElement.scrollTop;
    var targets = document.querySelectorAll(".BgScrollEffect");
    var xValue = "center";
    var factor = 0.2;
    var yValue = scrollToTop * factor;
    targets.forEach((target) => {
        target.style.backgroundPosition = xValue + " " + yValue + "px";
    })
  }
}
  
// -----------change pseudo_element's content-----------
var containerWorkingHour = document.querySelector(".containerWorkingHour")
var btn_toggle = document.querySelector('#btn-toggle');
var tmp = document.createElement("span");
tmp.innerHTML = '&#x2039;';
if (btn_toggle) {
    btn_toggle.setAttribute('data-icon', tmp.innerText);
    //  -----------show/hide working hours-------------
    btn_toggle.addEventListener("click", () => {
        containerWorkingHour.classList.toggle("closed");
        btn_toggle.classList.toggle("rotate");
    })
}

/** Set min input date */

// let today = new Date();
// let dd = today.getDate();
// console.log(dd);
// let mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
// let yyyy = today.getFullYear();
// if(dd<10){
//   dd='0'+dd
// } 
// if(mm<10){
//   mm='0'+mm
// } 

// today = yyyy+'-'+mm+'-'+dd;
// document.getElementById("datefield").setAttribute("min", today);

/** End set min input date */