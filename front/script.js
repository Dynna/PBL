AOS.init();

// Get the container element
var linkContainer = document.querySelector(".list-menu");
var links = linkContainer.querySelector(".item");

// Loop through the links and add the active class to the current/clicked link
for (var i = 0; i < links.length; i++) {
  links[i].addEventListener("click", function() {
    var current = document.querySelector(".active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}