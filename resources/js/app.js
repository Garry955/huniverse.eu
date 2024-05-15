import "./bootstrap";
import "./hero";

let mobileMenuOpen = document.getElementById("mobile_menu_open");
let mobileMenuOpenIcon = document.getElementById("menu_open_icon");
let mobileMenuCloseIcon = document.getElementById("menu_close_icon");
let mobileMenuItems = document.getElementById("menu_items");
mobileMenuOpen.addEventListener("click", function () {
    mobileMenuCloseIcon.classList.toggle("hidden");
    mobileMenuOpenIcon.classList.toggle("hidden");
    mobileMenuItems.classList.toggle("open");
});

var search = document.getElementById("search_button");
var searchInput = document.getElementById("search_input");

search.addEventListener("click", function () {
    searchInput.classList.toggle("lg:hidden");
});
