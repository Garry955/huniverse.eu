import "./bootstrap";
import "./hero";

// var body = document.getElementById("body");
// window.onscroll = function (e) {
//     body.classList.add("scrolled");
// };
// if (body.scrollTop == 0 || document.documentElement.scrollTop == 0) {
//     body.classList.remove("scrolled");
// }

var search = document.getElementById("search");
var searchInput = document.getElementById("search_input");

search.addEventListener("click", function () {
    searchInput.classList.toggle("hidden");
});
