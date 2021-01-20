M.AutoInit();
window.addEventListener('load',()=>{
  setTimeout(load,2000);
  function load(){
    document.getElementById('loading').className='animate__animated animate__fadeOut animate__delay-0.5s display:none hide';
    document.getElementById('loading1').className='animate__animated animate__fadeOut animate__delay-0.5s display:none hide';
    document.getElementById('loading2').className='animate__animated animate__fadeOut animate__delay-0.5s display:none hide';
    document.getElementById('contend').className='animate__animated animate__fadeIn animate__delay-0.5s';
    document.getElementById('main').className='animate__animated animate__fadeIn animate__delay-0.5s';
    document.getElementById('footer').className='animate__animated animate__fadeIn animate__delay-0.5s';
    setTimeout(change,1000);
    function change(){
      document.getElementById('contend').className=' ';
      document.getElementById('main').className=' ';
      document.getElementById('footer').className=' ';
    }
  }
})
document.addEventListener("wheel", function(){
  document.getElementById('nav').className='navbar-fixed';
})

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
});

