var $ = function(id) {
	return document.getElementById(id);
}

var checkFields = function() {
    //parse fields
    var fName = $("fName").value;
    var lName = $("lName").value;
    var email = $("email").value;
    var password = $("password").value;
    var phone = $("phone").value;
    var isValid = true;

    //set error messages
    var req1 = "*";
    var req2 = "*";
    var req3 = "*";
    var req4 = "*";
    var req5 = "*";

    //check to see if fields are correctly filled
    //check first name
    if ( fName == "" ) {
        req1 = "First name cannot be empty."
        isValid = false;
    }

    //check last name
    if ( lName == "" ) {
        req2 = "Last name cannot be empty."
        isValid = false;
    }

    //check email
    if ( email == "" ) {
        req3 = "Email address cannot be empty."
        isValid = false;
    }
    else {
        //using email regex from https://www.regular-expressions.info/email.html
        var regexEmail = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}/i;
        if ( !regexEmail.test(email) ) {
            req3 = "Please enter a valid email address.";
            isValid = false;
        }
    }

    //check password

    //check phone number
    if ( phone.length = 0 ) {
        req5 = "Phone number cannot be empty."
        isValid = false;
    }
    else {
        var regexPhone = /\(\d{3}\) \d{3}-\d{4}/;
        if ( !regexPhone.test(phone) ) {
            req5 = "Phone number must be of the form (123) 456-7890";
            isValid = false;
        }

        console.log(regexPhone.test(phone));
    }

    if ( isValid ) {
        var req1 = "";
        var req2 = "";
        var req3 = "";
        var req4 = "";
        var req5 = "";
    }

    //reset span values
    $("req1").innerHTML = req1;
    $("req2").innerHTML = req2;
    $("req3").innerHTML = req3;
    $("req4").innerHTML = req4;
    $("req5").innerHTML = req5;

    return isValid;
}

var clearFields = function() {
	$("req1").innerHTML = "*";
	$("req2").innerHTML = "*";
    $("req3").innerHTML = "*";
    $("req4").innerHTML = "*";
    $("req5").innerHTML = "*";
}

window.onload = function() {
	$("submit").onclick = checkFields;
	$("reset").onclick = clearFields;
}