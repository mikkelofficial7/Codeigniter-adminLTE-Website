
function on() 
{
  var x = document.getElementById("snackbaron")
  x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show",""); }, 3000);
}
function off() 
{
  var x = document.getElementById("snackbaroff")
  x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show",""); }, 3000);
}
window.addEventListener('online',  on);
window.addEventListener('offline',  off);