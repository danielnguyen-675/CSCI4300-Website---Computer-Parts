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
    if ( fName.length == 0 ) {
        req1 = "First name cannot be empty."
        isValid = false;
    }

    if ( isValid ) {
        //$("register").submit();

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
}

var clearFields = function() {
	$("req1").innerHTML = "*";
	$("req2").innerHTML = "*";
}

window.onload = function() {
	$("submit").onclick = checkFields;
	$("reset").onclick = clearFields;
}