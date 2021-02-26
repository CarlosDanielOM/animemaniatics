document.addEventListener("wheel", function(){
    document.getElementById('nav1').className='navbar-fixed';
})
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems);
  });