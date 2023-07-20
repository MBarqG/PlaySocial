var menuIcon = document.querySelector(".menu-icon")
var sidebar = document.querySelector(".sidebar")
var container = document.querySelector(".container")
var containerV = document.querySelector(".containerV")
var usericon = document.querySelector(".user-icon")
var uploadicon = document.querySelector(".upload-icon")
var overlay = document.querySelector(".overlay-card")
overlay.style.display = "none";

menuIcon.onclick = function(){
    sidebar.classList.toggle("minimize");
    container.classList.toggle("Largecontainer");
    containerV.classList.toggle("LargecontainerV");
}

function hideOverlay() {
    overlay.style.display = "none"; // Hide the card
}

uploadicon.onclick = function(){
    overlay.style.display = "flex"; // Display the card
}


