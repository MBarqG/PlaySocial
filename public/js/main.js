var menuIcon = document.querySelector(".menu-icon")
var sidebar = document.querySelector(".sidebar")
var containers = document.querySelectorAll(".container")
var uploadicon = document.querySelector(".upload-icon")
var overlay = document.querySelector(".overlay-card")

menuIcon.onclick = function () {
    sidebar.classList.toggle("minimize");
    containers.forEach(element => {
        element.classList.toggle("Largecontainer");
    });

}

function hideOverlay() {
    overlay.style.display = "none"; 
}

uploadicon.onclick = function () {
    overlay.style.display = "flex"; 
}
