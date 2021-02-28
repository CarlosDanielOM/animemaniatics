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

// var emision=document.getElementById('emision');
// var finish=document.getElementById('finish');
// var checked=document.getElementById('check');
// var dt1=document.getElementById('date1');
// var dt2=document.getElementById('date2');
// emision.addEventListener("click", function(){
//     checked.classList.remove("content-date-check");
//     checked.classList.remove("content-date-check2");
//     checked.classList.add("content-date-check1");
//     dt1.classList.remove("disable");
//     dt2.classList.add("disable");
// })
// finish.addEventListener("click", function(){
//     checked.classList.remove("content-date-check");
//     checked.classList.remove("content-date-check1");
//     checked.classList.add("content-date-check2");
//     dt1.classList.remove("disable");
//     dt1.classList.remove("disable");
// })