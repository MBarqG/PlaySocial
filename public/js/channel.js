var menuIcon = document.querySelector(".menu-icon")
var sidebar = document.querySelector(".sidebar")
var container = document.querySelector(".container")
var containerp = document.querySelector(".containerP")
var usericon = document.querySelector(".user-icon")
var uploadicon = document.querySelector(".upload-icon")
var overlay = document.querySelector(".overlay-card")

menuIcon.onclick = function () {
    sidebar.classList.toggle("minimize");
    container.classList.toggle("Largecontainer");
    containerp.classList.toggle("LargecontainerP");
}

function hideOverlay() {
    overlay.style.display = "none"; // Hide the card
}

uploadicon.onclick = function () {
    overlay.style.display = "flex"; // Display the card
}