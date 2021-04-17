var $ = function (id) {
    return document.getElementById(id);
}

var checkFields = function () {
    //parse fields
    var password = $("password").value;
    var password2 = $("password2").value;
    var isValid = true;

    //set error messages
    var req1 = "*";
    var req2 = "*";

    //check password
    var hasUpper = false;
    var hasUnique = false;
    var hasNumber = false;
    //special characters
    var special = "!#$%&'()*+,-.<=>?@^_|~";
    if (password.length < 8) {
        req1 = "Password must be at least 8 characters long.";
        isValid = false;
    }
    else {
        //check if contains uppercase/unique character
        for (var i = 0; i < password.length; i++) {
            if (password.charAt(i) == password.charAt(i).toUpperCase()) {
                hasUpper = true;
            }
            if (!isNaN(password.charAt(i))) {
                hasNumber = true;
            }
            for (var j = 0; j < special.length; j++) {
                if (password.charAt(i) == special.charAt(j)) {
                    hasUnique = true;
                }
            }
        }

        if (!(hasNumber && hasUnique && hasUpper)) {
            req1 = "Password must contain:\nat least one uppercase letter,\na number, and\none of the following unique characters:\n! # $ % & ' ( ) * + , - . < = > ? @ ^ _ | ~";
            isValid = false;
        }
    }

    //check to see if password matches
    if (password.length != 0) {
        if (password != password2) {
            req2 = "Passwords much match.";
            isValid = false;
        }
    }

    //reset span values
    $("req1").innerHTML = req1;
    $("req2").innerHTML = req2;

    return isValid;
}

var clearFields = function () {
    $("req1").innerHTML = "*";
    $("req2").innerHTML = "*";
}

window.onload = function () {
    $("submit").onclick = checkFields;
}
