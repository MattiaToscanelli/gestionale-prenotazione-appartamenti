/**
 * Metodo per verificare tutti i dati della registrazione.
 */
function checkAll(){
    var inputs = document.getElementsByTagName("input");
    var v = new Validator();
    $.when(
        v.checkEmailDupDom(inputs[8].value)
    ).done( function (json) {
        var checkE = json;
        if(v.checkName(inputs[0].value) && v.checkName(inputs[1].value) && v.checkStreet(inputs[2].value) &&
            v.checkNap(inputs[3].value) && v.checkName(inputs[4].value) &&
            v.checkPhoneNumber(inputs[5].value) && (v.checkPhoneNumber(inputs[6].value) || inputs[6].value == "") &&
            (v.checkPhoneNumber(inputs[7].value) || inputs[7].value == "") && v.checkEmail(inputs[8].value) &&
            (checkE == 1) && v.checkPassword(inputs[9].value,inputs[10].value)){
            document.getElementById("registration_form").submit();
        }else {
            document.getElementById("alert_validation").style.display = "block";
            if (!v.checkName(inputs[0].value)) {
                inputs[0].classList.add("form-control-danger");
            } else {
                inputs[0].classList.remove("form-control-danger");
            }
            if (!v.checkName(inputs[1].value)) {
                inputs[1].classList.add("form-control-danger");
            } else {
                inputs[1].classList.remove("form-control-danger");
            }
            if (!v.checkStreet(inputs[2].value)) {
                inputs[2].classList.add("form-control-danger");
            } else {
                inputs[2].classList.remove("form-control-danger");
            }
            if (!v.checkNap(inputs[3].value)) {
                inputs[3].classList.add("form-control-danger");
            } else {
                inputs[3].classList.remove("form-control-danger");
            }
            if (!v.checkName(inputs[4].value)) {
                inputs[4].classList.add("form-control-danger");
            } else {
                inputs[4].classList.remove("form-control-danger");
            }
            if (!v.checkPhoneNumber(inputs[5].value)) {
                inputs[5].classList.add("form-control-danger");
            } else {
                inputs[5].classList.remove("form-control-danger");
            }
            if (!v.checkPhoneNumber(inputs[6].value) && !inputs[6].value == "") {
                inputs[6].classList.add("form-control-danger");
            } else {
                inputs[6].classList.remove("form-control-danger");
            }
            if (!v.checkPhoneNumber(inputs[7].value) && !inputs[7].value == "") {
                inputs[7].classList.add("form-control-danger");
            } else {
                inputs[7].classList.remove("form-control-danger");
            }
            if(checkE == 0){
                document.getElementById("alert_validation_email").style.display = "block";
                inputs[8].classList.add("form-control-danger");
            }else {
                if (v.checkEmail(inputs[8].value)) {
                    inputs[8].classList.remove("form-control-danger");
                }else{
                    inputs[8].classList.add("form-control-danger");
                }
                document.getElementById("alert_validation_email").style.display = "none";
            }
            if (!v.checkPassword(inputs[9].value, inputs[10].value)) {
                inputs[9].classList.add("form-control-danger");
                inputs[10].classList.add("form-control-danger");
            } else {
                inputs[9].classList.remove("form-control-danger");
                inputs[10].classList.remove("form-control-danger");
            }
        }
    });
}

/**
 * Metodo per rimuovere doppi spazi, doppi cancellettim doppi trattini nel numero di telefono.
 * @param object Il numero di telefono.
 */
function fixNumber(object){
    var number = object.value;
    number = number.replace(/[A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]/g, '');
    number = number.replace(/\s\s+/g, ' ');
    number = number.replace(/--+/g, '-');
    number = number.replace(/\s-+/g, ' ');
    number = number.replace(/-\s+/g, '-');
    number = number.replace(/##+/g, '#');
    object.value = number;
}

