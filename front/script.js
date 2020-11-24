AOS.init();

// // Get the container element
// var linkContainer = document.querySelector(".list-menu");
// var links = linkContainer.querySelector(".item");

// // Loop through the links and add the active class to the current/clicked link
// for (var i = 0; i < links.length; i++) {
//   links[i].addEventListener("click", function() {
//     var current = document.querySelector(".active");
//     current[0].className = current[0].className.replace(" active", "");
//     this.className += " active";
//   });
// }

function myFunction(event) {
  document.getElementById("myDropdown").classList.toggle("show");
}

console.log(event);

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}