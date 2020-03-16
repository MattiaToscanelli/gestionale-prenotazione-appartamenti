/**
 * Classe per convalidare i dati lato client
 */
class Validator {

    /**
     * Metodo per controllare un nome.
     * @param val Il nome da controllare.
     * @returns {boolean} True se è valido, False se non è valido.
     */
    checkName(val) {
        var regexName = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
        return (regexName.test(val) && val.length <= 50);
    }

    /**
     * Metodo per controllare un nome.
     * @param val Il nome da controllare.
     * @returns {boolean} True se è valido, False se non è valido.
     */
    checkStreet(val) {
        var regexName = /^[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
        return (regexName.test(val) && val.length <= 50);
    }

    /**
     * Metodo per controllare il nap.
     * @param val Il nap da controllare
     * @returns {boolean} True se è valido, False se non è valido.
     */
    checkNap(val){
        var regexNap = /^\d{4,5}$/;
        return regexNap.test(val);
    }

    /**
     * Metodo per controllare una email.
     * @param val La email da controllare.
     * @returns {boolean} True se è valida, False se non è valida.
     */
    checkEmail(val) {
        var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regexEmail.test(val);
    }

    /**
     * Metodo per controllare un numero di telefono.
     * @param val Il numero di telefono da controllare.
     * @returns {boolean} True se è valido, False se non è valido.
     */
    checkPhoneNumber(val) {
        val = val.replace(/ /g, "");
        val = val.replace(/-/g, "");
        var regexNumber = /^[\+]?[0-9-#]{10,14}$/;
        return regexNumber.test(val);
    }

    /**
     * Metodo per verificare se la password rispetta i criteri e se è uguale per i due campi
     * @param val1 La prima password.
     * @param val2 La seconda password.
     * @returns {boolean} True se sono valide, False se non sono valide.
     */
    checkPassword(val1, val2) {
        var regexLetter = /[a-zA-Z]/;
        var regexDigit = /\d/;
        var regexSpecial = /[^a-zA-Z\d]/;
        return (regexDigit.test(val1) || regexSpecial.test(val1)) &&
            regexLetter.test(val1) && val1.length >= 8 &&
            val1 == val2;
    }

    /**
     * Metodo per controllare un tipo di utente.
     * @param val Il tipo di utente da controllare.
     * @returns {boolean} True se è valido, False se non è valido.
     */
    checkType(val) {
        return val == 1 || val == 3 || val == 7;
    }

    /**
     * Metodo per controllare se una email è già presente nel database.
     * @param val La email da verificare.
     * @returns {*|jQuery|{getAllResponseHeaders, abort, setRequestHeader, readyState, getResponseHeader, overrideMimeType, statusCode}} 0 se non è presente, 1 se è presente.
     */
    checkEmailDupDom(val) {
        var email = val;
        var response;
        return ($.ajax({
            url: (URL + "registrazione/checkEmail"),
            type: "POST",
            dataType: "json",
            data: {email: email},
            success: function (text) {
                response = text;
            }
        }));
    }

    /**
     * Metodo per controllare se una email è già presente nel database.
     * @param val La email da verificare.
     * @returns {*|jQuery|{getAllResponseHeaders, abort, setRequestHeader, readyState, getResponseHeader, overrideMimeType, statusCode}} 0 se non è presente, 1 se è presente.
     */
    accessLogin(email_val,password_val) {
        var email = email_val;
        var password = password_val;
        var response;
        return ($.ajax({
            url: (URL + "login/access"),
            type: "POST",
            dataType: "json",
            data: {email: email, password: password},
            success: function (text) {
                response = text;
            }
        }));
    }

    /**
     * Metodo per controllare il titolo di una notizia.
     * @param val Il titolo da controllare.
     * @returns {boolean} True se è valido, False se non è valido.
     */
    checkTitle(val) {
        var regexName = /^[0-9a-zA-Z!?()%*"+^$£&àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[0-9a-zA-Z!?()%*"+^$£&àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
        return (regexName.test(val) && val.length <= 100);
    }

    /**
     * Metodo per controllare il contenuto di una notizia.
     * @param val Il contenuto da controllare.
     * @returns {boolean} True se è valido, False se non è valido.
     */
    checkTextArea(val) {
        var regexName = /^[\r\n0-9a-zA-Z!?()%*"+^$£&àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
        return (regexName.test(val));
    }
}
