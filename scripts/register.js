var $ = function (id) {
    return document.getElementById(id);
}

var checkFields = function () {
    //parse fields
    var fName = $("fName").value;
    var lName = $("lName").value;
    var email = $("email").value;
    var email2 = $("email2").value;
    var password = $("password").value;
    var password2 = $("password2").value;
    var phone = $("phone").value;
    var isValid = true;

    //set error messages
    var req1 = "*";
    var req2 = "*";
    var req3 = "*";
    var req3b = "*";
    var req4 = "*";
    var req4b = "*";
    var req5 = "*";

    //check to see if fields are correctly filled
    //check first name
    var regexName = /[a-z ,.'-]+/i;
    if (!regexName.test(fName)) {
        req1 = "First name is invalid."
        isValid = false;
    }

    //check last name
    if (!regexName.test(lName)) {
        req2 = "Last name is invalid."
        isValid = false;
    }

    //check email
    if (email == "") {
        req3 = "Email address cannot be empty."
        isValid = false;
    }
    else {
        //using email regex from https://www.regular-expressions.info/email.html
        var regexEmail = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}/i;
        if (!regexEmail.test(email)) {
            req3 = "Please enter a valid email address.";
            isValid = false;
        }
    }

    //see if email is reentered correctly
    if (email.length != 0) {
        if (email != email2) {
            req3b = "Email addresses much match.";
            isValid = false;
        }
    }

    //check password
    var hasUpper = false;
    var hasUnique = false;
    var hasNumber = false;
    //special characters
    var special = "!#$%&'()*+,-.<=>?@^_|~";
    if (password.length < 8) {
        req4 = "Password must be at least 8 characters long.";
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
            req4 = "Password must contain:\nat least one uppercase letter,\na number, and\none of the following unique characters:\n! # $ % & ' ( ) * + , - . < = > ? @ ^ _ | ~";
            isValid = false;
        }
    }

    //check to see if password matches
    if (password.length != 0) {
        if (password != password2) {
            req4b = "Passwords much match.";
            isValid = false;
        }
    }

    //check phone number
    if (phone.length = 0) {
        req5 = "Phone number cannot be empty."
        isValid = false;
    }
    else {
        var regexPhone = /\(\d{3}\) \d{3}-\d{4}/;
        if (!regexPhone.test(phone)) {
            req5 = "Phone number must be of the form (123) 456-7890";
            isValid = false;
        }
        if (phone.length != 14) {
            req5 = "Phone number must be of the form (123) 456-7890";
            isValid = false;
        }
    }

    //reset span values
    $("req1").innerHTML = req1;
    $("req2").innerHTML = req2;
    $("req3").innerHTML = req3;
    $("req3b").innerHTML = req3b;
    $("req4").innerHTML = req4;
    $("req4b").innerHTML = req4b;
    $("req5").innerHTML = req5;

    return isValid;
}

var clearFields = function () {
    $("req1").innerHTML = "*";
    $("req2").innerHTML = "*";
    $("req3").innerHTML = "*";
    $("req3b").innerHTML = "*";
    $("req4").innerHTML = "*";
    $("req4b").innerHTML = "*";
    $("req5").innerHTML = "*";
}

window.onload = function () {
    $("submit").onclick = checkFields;
    $("reset").onclick = clearFields;
}
