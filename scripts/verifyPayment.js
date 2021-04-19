var $ = function (id) {
    return document.getElementById(id);
}

var checkPaymentInfo = function () {
    var name = $("fullName").value;
    var cardNumber = $("cardNumber").value;
    var expiration = $("expiry").value;
    var cvc = $("cvc").value;

    var isValid = true;

    var req1 = "*";
    var req2 = "*";
    var req3 = "*";
    var req4 = "*";

    var reg = /^[a-zA-Z\s]*$/;;

    if (!reg.test(name)) {
        isValid = false;
        req1 = "English characters only! "
    }

    var regexCard = /\b(\d{4}[- ]?){4}/;

    if (!regexCard.test(cardNumber)) {
        isValid = false;
        req2 = "Card info is not valid, try again!";
    }

    if (!expiration.match(/(0[1-9]|1[0-2])[-][0-9]{2}/)) {
        req3 = "The expired date is not correct! Use format: 'mm-yy'";
        isValid = false;
    } else {
        // get current year and month
        var d = new Date();
        var currentYear = d.getFullYear();
        var currentMonth = d.getMonth() + 1;
        // get parts of the expiration date
        var parts = expiration.split('-');
        var year = parseInt(parts[1], 10) + 2000;
        var month = parseInt(parts[0], 10);
        // compare the dates
        if (year < currentYear || (year == currentYear && month < currentMonth)) {
            req3 = "The expiration date has passed.\n";
            isValid = false;
        }
    }

    var cvcRegex = /^[1-9]{3}$/;
    if (!cvcRegex.test(cvc)) {
        isValid = false;
        req4 = "CVV number is not valid!"
    }

    $("req1").innerHTML = req1;
    $("req2").innerHTML = req2;
    $("req3").innerHTML = req3;
    $("req4").innerHTML = req4;

    return isValid;
}

window.onload = function () {
    $("confirm").onclick = checkPaymentInfo;
}