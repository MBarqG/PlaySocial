var menuIcon = document.querySelector(".menu-icon")
var sidebar = document.querySelector(".sidebar")
var container = document.querySelector(".container")
var usericon = document.querySelector(".user-icon")

menuIcon.onclick = function(){
    sidebar.classList.toggle("minimize");
    container.classList.toggle("Largecontainer");

}

