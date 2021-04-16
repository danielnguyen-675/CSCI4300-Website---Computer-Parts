var $ = function (id) {
    return document.getElementById(id);
}

var checkPaymentInfo = function () {
    var cardNumber = $("cardNumber").value;
    var expiration = $("expiry").value;
    var cvc = $("cvc").value;

    var isValid = true;

    var req2 = "*";
    var req3 = "*";
    var req4 = "*";

    var regexCard = /\b(\d{4}[- ]?){4}/;

    if (!regexCard.test(cardNumber)) {
        isValid = false;
        req2 = "Card info is not valid, try again!";
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