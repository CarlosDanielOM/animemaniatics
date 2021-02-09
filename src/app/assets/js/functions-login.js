M.AutoInit();
var change1=document.getElementById('change-button1');
var change2=document.getElementById('change-button2');
var reg=document.getElementById('register');
var log=document.getElementById('login');
log.classList.add('off');

change1.addEventListener("click",function(){
    reg.classList.add('off');
    log.classList.remove('off');
})
change2.addEventListener("click",function(){
    log.classList.add('off');
    reg.classList.remove('off');
})