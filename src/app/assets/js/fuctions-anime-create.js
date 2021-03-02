document.addEventListener("wheel", function(){
    document.getElementById('nav1').className='navbar-fixed';
})
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems);
  });
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems);
});

var emision=document.getElementById('emision');
var finish=document.getElementById('finish');
var dt1=document.getElementById('dt1');
var dt2=document.getElementById('dt2');
emision.addEventListener("click", function(){
  dt1.classList.remove("disable");
  dt2.classList.add("disable");
})
finish.addEventListener("click", function(){
  dt1.classList.remove("disable");
  dt2.classList.remove("disable");
})

var btn_info=document.getElementById('info');
var card=document.getElementById('the-card');
var cnt_info=document.getElementById('content-info');
var btn_exit=document.getElementById('exit');
btn_info.addEventListener("click",function(){
  cnt_info.classList.remove("content-info");
  cnt_info.classList.add("content-info2");
})
btn_exit.addEventListener("click",function(){
  cnt_info.classList.remove("content-info2");
  cnt_info.classList.add("content-info");
})