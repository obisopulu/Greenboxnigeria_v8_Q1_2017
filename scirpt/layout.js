document.getElementsByClassName("splash")[0].style.height=window.innerHeight+'px';
document.getElementsByClassName("splash")[0].style.width=window.innerWidth+'px';

document.getElementById('hot').style.height=((window.innerHeight-65)*0.5)+'px';
document.getElementById('sideplay').style.height=document.getElementsByClassName("body")[0].style.height=window.innerHeight-65+'px';
function fold(){document.getElementById('sideplay').style.height=document.getElementsByClassName("body")[0].style.height=window.innerHeight-65+'px';}
function review(){document.getElementsByClassName("splash")[0].style.display="none";}