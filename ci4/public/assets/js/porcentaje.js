var percentage = 0;
function mirarPass() {
    var x = document.getElementById("password");
    var z = document.getElementById("confirma_password");
    if (x.type === "password") {
      x.type = "text";
      z.type = "text";
    } else {
      x.type = "password";
      z.type = "password";
    }
  }
function check(n, m) {
    if (n < 6) {//+6
        percentage = 0;
        $(".progress-bar").css("background", "#990000");
    } else if (n < 8) { //+8
        percentage = 20;
        $(".progress-bar").css("background", "#C3BE41");
    } else if (n < 10) {//+10
        percentage = 40;
        $(".progress-bar").css("background", "#76ce6e");
    } else {
        percentage = 60;
        $(".progress-bar").css("background", "#15ff00");
    }

    // Check for the character-set constraints
    // and update percentage variable as needed.

    //Lowercase Words only
    if ((m.match(/[a-z]/) != null)) {
        percentage += 10;
    }

    //Uppercase Words only
    if ((m.match(/[A-Z]/) != null)) {
        percentage += 10;
    }

    //Digits only
    if ((m.match(/0|1|2|3|4|5|6|7|8|9/) != null)) {
        percentage += 10;
    }

    //Special characters
    if ((m.match(/\W/) != null) && (m.match(/\D/) != null)) {
        percentage += 10;
    }

    // Update the width of the progress bar
    $(".progress-bar").css("width", percentage + "%");
}

// Update progress bar as per the input
$(document).ready(function() {
    // Whenever the key is pressed, apply condition checks. 
    $("#password").keyup(function() {
        var m = $(this).val();
        var n = m.length;

        // Function for checking
        check(n, m);
    });
});