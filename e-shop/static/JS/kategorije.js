var k1 = document.getElementById('kat1');
var k1l = document.getElementById('k1l');
var k2 = document.getElementById("kat2");
var k2l = document.getElementById("k2l");
var k3 = document.getElementById("kat3");
var k3l = document.getElementById("k3l");
var k4 = document.getElementById("kat4");
var k4l = document.getElementById("k4l");

var url = window.location.search;
const urlParams = new URLSearchParams(url);
var kategorija = url.split("?")[0];
kategorija = urlParams.get("kategorija");


switch(kategorija){
    
    case "Fekalije":
       k1.style.backgroundColor = "rgba(89,145,144,0.7)";
       k1l.style.color = "rgba(255,255,255,1)";
    break;

    case "Orbanove orgije":
       k2.style.backgroundColor = "rgba(89,145,144,0.7)";
       k2l.style.color = "rgba(255,255,255,1)";
    break;

    case "Gaming":
       k3.style.backgroundColor = "rgba(89,145,144,0.7)";
       k3l.style.color = "rgba(255,255,255,1)";
    break;

    case "Fresh gum":
       k4.style.backgroundColor = "rgba(89,145,144,0.7)";
       k4l.style.color = "rgba(255,255,255,1)";
    break;

}
