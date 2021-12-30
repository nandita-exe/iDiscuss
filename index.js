// localStorage.setItem("theme", "light");
// let localData = localStorage.getItem("theme");
// function myFunction() {
//     var element = document.body;
//     element.classList.toggle("dark-mode");
//     localStorage.setItem("theme", "dark");
//   }

var icon = document.getElementById("icon");


if(localStorage.getItem("theme")== null){
    localStorage.setItem("theme", "light");
}


let localData = localStorage.getItem("theme");

if (localData== "light") {
    document.body.classList.remove("dark-theme");
    
}else if(localData== "dark"){
    document.body.classList.add("dark-theme");
}

icon.onclick = function() {
    document.body.classList.toggle("dark-theme");
    if (document.body.classList.contains("dark-theme")) {
        localStorage.setItem("theme", "dark");
        icon.src = "img/sun.png";
    }else{
        localStorage.setItem("theme", "light");
        icon.src = "img/moon.png";

    }
}