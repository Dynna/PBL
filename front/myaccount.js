function changePassword() {
    var x = document.getElementById("change-password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }