let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-2');

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if(window.scrollY > 150){
        header.classList.add('active');
    }else{
        header.classList.remove('active');
    }

}

let countDate = new Date('june 1, 2021 00:00:00').getTime();
function changeForm(){
    document.getElementById("sign").style.display = "none";
    document.getElementById("log").style.display = "block";
}

function changeFormTwo(){
    document.getElementById("log").style.display = "none";
    document.getElementById("sign").style.display = "block";
}