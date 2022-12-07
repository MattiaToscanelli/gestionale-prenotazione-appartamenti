/**
 * Metodo per verificare che le due password nel modifica password,
 * siano uguali e che rispettono i criteri di password.
 */
function checkAll(){
    var inputs = document.getElementsByTagName("input");
    var v = new Validator();
    if(v.checkPassword(inputs[0].value,inputs[1].value)){
        document.getElementById("change_password_form").submit();
    }else{
        document.getElementById("alert_validation").style.display = "block";
        if (!v.checkPassword(inputs[0].value, inputs[1].value)) {
            inputs[0].classList.add("form-control-danger");
            document.getElementById("input_password").style.display = "none";
            inputs[1].classList.add("form-control-danger");
            document.getElementById("input_re_password").style.display = "none";
        }
    }
}

function waitSend() {
    window.setTimeout(function () {
        document.getElementById("send_link_psw").submit();
    }, 2000);
}