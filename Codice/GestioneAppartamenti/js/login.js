function login() {
    var inputs = document.getElementsByTagName("input");
    var v = new Validator();
    $.when(
        v.accessLogin(inputs[0].value, inputs[1].value)
    ).done( function (json) {
        var response = json;
        if(response == 1){
            document.getElementById("alert_validation_login").style.display = "none";
            document.getElementById("alert_validation_login_s").style.display = "block";
            window.setTimeout(function() {
                window.location.replace(URL);
            }, 1000);
        }else if(response == 2){
            window.location.replace(URL + "verificaEmail");
        }else{
            document.getElementById("alert_validation_login").style.display = "block";
            document.getElementById("alert_validation_login_s").style.display = "none";
        }
    });
}