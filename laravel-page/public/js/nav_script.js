const burger = document.querySelector(".burger");
const nav = document.querySelector(".nav-links");
const navLinks = document.querySelectorAll(".nav-links li");
const modal = document.getElementById("modal");

burger.addEventListener('click',()=>{
    nav.classList.toggle("nav-active");

    navLinks.forEach((link,index) => {
        
        if(link.style.animation){
            link.style.animation = "";
        }else{
            link.style.animation = `navLinksFade 0.7s ease forwards ${index / 7 + 0.4}s`;
        }
        
    });

    burger.classList.toggle("toggle");
    console.log(modal);
    modal.classList.toggle("modal_window");

});

const section01 = document.getElementById("section01");

section01.addEventListener('click',()=>{
    if(nav.classList.contains("nav-active")){
        nav.classList.toggle("nav-active");

        navLinks.forEach((link,index) => {
            
            if(link.style.animation){
                link.style.animation = "";
            }else{
                link.style.animation = `navLinksFade 0.7s ease forwards ${index / 7 + 0.4}s`;
            }
            
        });
    
        burger.classList.toggle("toggle");
        console.log(modal);
        modal.classList.toggle("modal_window");
    }
    
});



const section02 = document.getElementById("section02");

section02.addEventListener('click',()=>{
    if(nav.classList.contains("nav-active")){
        nav.classList.toggle("nav-active");

        navLinks.forEach((link,index) => {
            
            if(link.style.animation){
                link.style.animation = "";
            }else{
                link.style.animation = `navLinksFade 0.7s ease forwards ${index / 7 + 0.4}s`;
            }
            
        });
    
        burger.classList.toggle("toggle");
        console.log(modal);
        modal.classList.toggle("modal_window");
    }
    
});



//スクロールによるアニメーション

let targets = document.getElementsByClassName('scroll_picture');//アニメーションさせたい要素
let offset = 30;//アニメーションタイミング

window.addEventListener('scroll', function() {//スクロールしたとき

  var scroll = window.scrollY;//スクロール量を取得
  var h = window.innerHeight;//画面の高さを取得

  for(let target of targets) {
    var pos = target.getBoundingClientRect().top + scroll;//アニメーションさせたい要素の位置を取得
    if (scroll > pos - h + offset) {//スクロール量 > アニメーションさせたい要素の位置
      target.classList.add('on');
    }
  }

});