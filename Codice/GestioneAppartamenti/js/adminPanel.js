document.getElementById("files").onchange = function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

/**
 * =============================GESTIONE UTENTI=============================
 */
function getInfoUser(email){
    var mu = new ManageUser();
    clearModal();
    $.when(
        mu.getUser(email)
    ).done( function (json) {
        document.getElementById('name_modal').innerHTML = json.nome;
        document.getElementById('surname_modal').innerHTML = json.cognome;
        document.getElementById('email_modal').innerHTML = json.email;
        document.getElementById('email_modal_input_del').value = json.email;
        document.getElementById('street_modal').innerHTML = json.via;
        document.getElementById('city_modal').innerHTML = json.citta;
        document.getElementById('nap_modal').innerHTML = json.cap;
        if(json.tipo == 1){
            json.tipo = "Utente registrato";
        }else if(json.tipo == 3){
            json.tipo = "Utente verificato";
        }else if(json.tipo == 7){
            json.tipo = "Admin";
        }
        document.getElementById('type_modal').innerHTML = json.tipo;
        document.getElementById('mobile_number_modal').innerHTML = json.numero_mobile;
        if(json.numero_fisso == "" || json.numero_fisso == null){
            json.numero_fisso = "-";
        }
        document.getElementById('landline_number_modal').innerHTML = json.numero_fisso;
        if(json.numero_ufficio == "" || json.numero_ufficio == null){
            json.numero_ufficio = "-";
        }
        document.getElementById('office_number_modal').innerHTML = json.numero_ufficio;
    });
}

function getDataModifyUser(email){
    var mu = new ManageUser();
    clearModal();
    $.when(
        mu.getUser(email)
    ).done( function (json) {
        document.getElementById('name_modal_input').value = json.nome;
        document.getElementById('surname_modal_input').value = json.cognome;
        document.getElementById('street_modal_input').value = json.via;
        document.getElementById('city_modal_input').value = json.citta;
        document.getElementById('nap_modal_input').value = json.cap;
        let element = document.getElementById('type_modal_input');
        element.value = json.tipo;
        document.getElementById('mobile_number_modal_input').value = json.numero_mobile;
        document.getElementById('landline_number_modal_input').value = json.numero_fisso;
        document.getElementById('office_number_modal_input').value = json.numero_ufficio;
        document.getElementById('email_modal_input').value = json.email;
    });
}

function saveDataUser(){
    var mu = new ManageUser();
    clearModal();
    var inputs = document.getElementById("form_admin_panel").getElementsByTagName("input");
    var select = document.getElementById("form_admin_panel").getElementsByTagName("select");
    var v = new Validator();
    if(v.checkName(inputs[0].value) && v.checkName(inputs[1].value) && v.checkStreet(inputs[2].value) &&
        v.checkName(inputs[3].value) && v.checkNap(inputs[4].value) &&
        v.checkType(select[0].value) && v.checkPhoneNumber(inputs[5].value) && (v.checkPhoneNumber(inputs[6].value) || inputs[6].value == "") &&
        (v.checkPhoneNumber(inputs[7].value) || inputs[7].value == "")) {
        var data = {
            firstname: inputs[0].value,
            surname: inputs[1].value,
            street: inputs[2].value,
            city: inputs[3].value,
            nap: inputs[4].value,
            type: select[0].value,
            mobile_number: inputs[5].value,
            landline_number: inputs[6].value,
            office_number: inputs[7].value,
            email: inputs[8].value
        };
        var dataJson = JSON.stringify(data);
        $.when(
            mu.modifyUser(dataJson)
        ).done( function (json) {
            var checkE = json;
            if(checkE == 1) {
                document.getElementById("alert_validation").style.display = "none";
                document.getElementById("alert_validation_s").style.display = "block";
                window.setTimeout(function () {
                    window.location.replace(URL + "pannelloAdmin");
                }, 1000);
            }else{
                window.location.replace(URL + "errore");
            }
        });
    }else{
        document.getElementById("alert_validation_s").style.display = "none";
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
        if (!v.checkName(inputs[3].value)) {
            inputs[3].classList.add("form-control-danger");
        } else {
            inputs[3].classList.remove("form-control-danger");
        }
        if (!v.checkNap(inputs[4].value)) {
            inputs[4].classList.add("form-control-danger");
        } else {
            inputs[4].classList.remove("form-control-danger");
        }
        if (!v.checkType(select[0].value)) {
            select[0].classList.add("form-control-danger");
        } else {
            select[0].classList.remove("form-control-danger");
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
    }
}

function deleteUser(){
    var mu = new ManageUser();
    clearModal();
    var email = document.getElementById("email_modal_input_del").value;
    $.when(
        mu.deleteUser(email)
    ).done( function (json) {
        var checkE = json;
        if(checkE == 1) {
            document.getElementById("alert_del").style.display = "block";
            window.setTimeout(function () {
                window.location.replace(URL + "pannelloAdmin");
            }, 1000);
        }else{
            window.location.replace(URL + "errore");
        }
    });
}

/**
 * =============================GESTIONE NEWS=============================
 */
function getInfoNews(id){
    var mn = new ManageNews();
    clearModal();
    $.when(
        mn.getNews(id)
    ).done( function (json) {
        document.getElementById('date_modal').innerHTML = json.data;
        document.getElementById('title_modal').innerHTML = json.titolo;
        document.getElementById('text_modal').innerHTML = json.testo;
        document.getElementById('id_modal_input_del').value = json.id;
    });
}

function getDataModifyNews(id){
    var mu = new ManageNews();
    clearModal();
    $.when(
        mu.getNews(id)
    ).done( function (json) {
        document.getElementById('title_modal_input').value = json.titolo;
        document.getElementById('text_modal_input').value = json.testo;
        document.getElementById('id_modal_input').value = json.id;
    });
}

function saveDataNews(){
    var mn = new ManageNews();
    clearModal();
    var inputs = document.getElementById("form_admin_panel_news").getElementsByTagName("input");
    var textarea = document.getElementById("form_admin_panel_news").getElementsByTagName("textarea");
    var v = new Validator();
    if(v.checkTitle(inputs[0].value) && v.checkTextArea(textarea[0].value)) {
        var data = {
            title: inputs[0].value,
            text: textarea[0].value,
            id: inputs[1].value
        };
        var dataJson = JSON.stringify(data);
        $.when(
            mn.modifyNews(dataJson)
        ).done( function (json) {
            var checkE = json;
            if(checkE == 1) {
                document.getElementById("alert_validation_news").style.display = "none";
                document.getElementById("alert_validation_s_news").style.display = "block";
                window.setTimeout(function () {
                    window.location.replace(URL + "pannelloAdmin");
                }, 1000);
            }else{
                window.location.replace(URL + "errore");
            }
        });
    }else{
        document.getElementById("alert_validation_s_news").style.display = "none";
        document.getElementById("alert_validation_news").style.display = "block";
        if (!v.checkTitle(inputs[0].value)) {
            inputs[0].classList.add("form-control-danger");
        } else {
            inputs[0].classList.remove("form-control-danger");
        }
        if (!v.checkTextArea(textarea[0].value)) {
            textarea[0].classList.add("form-control-danger");
        } else {
            textarea[0].classList.remove("form-control-danger");
        }
    }
}

function addDataNews(){
    var mn = new ManageNews();
    clearModal();
    var inputs = document.getElementById("form_admin_panel_news_add").getElementsByTagName("input");
    var textarea = document.getElementById("form_admin_panel_news_add").getElementsByTagName("textarea");
    var v = new Validator();
    if(v.checkTitle(inputs[0].value) && v.checkTextArea(textarea[0].value)) {
        var data = {
            title: inputs[0].value,
            text: textarea[0].value,
        };
        var dataJson = JSON.stringify(data);
        $.when(
            mn.addNews(dataJson)
        ).done( function (json) {
            var checkE = json;
            if(checkE == 1) {
                document.getElementById("alert_validation_news_add").style.display = "none";
                document.getElementById("alert_validation_s_news_add").style.display = "block";
                window.setTimeout(function () {
                    window.location.replace(URL + "pannelloAdmin");
                }, 1000);
            }else{
                window.location.replace(URL + "errore");
            }
        });
    }else{
        document.getElementById("alert_validation_s_news_add").style.display = "none";
        document.getElementById("alert_validation_news_add").style.display = "block";
        if (!v.checkTitle(inputs[0].value)) {
            inputs[0].classList.add("form-control-danger");
        } else {
            inputs[0].classList.remove("form-control-danger");
        }
        if (!v.checkTextArea(textarea[0].value)) {
            textarea[0].classList.add("form-control-danger");
        } else {
            textarea[0].classList.remove("form-control-danger");
        }
    }
}

function deleteNews(){
    var mn= new ManageNews();
    clearModal();
    var id = document.getElementById("id_modal_input_del").value;
    $.when(
        mn.deleteNews(id)
    ).done( function (json) {
        var checkE = json;
        if(checkE == 1) {
            document.getElementById("alert_del_news").style.display = "block";
            window.setTimeout(function () {
                window.location.replace(URL + "pannelloAdmin");
            }, 1000);
        }else{
            window.location.replace(URL + "errore");
        }
    });
}

function clearModal() {
    var inputs = document.getElementsByTagName("input");
    var textarea = document.getElementsByTagName("textarea");
    var alert = document.getElementsByClassName("alert");
    for (i = 0; i < textarea.length; i++){
        textarea[i].classList.remove("form-control-danger");
    }
    for (i = 0; i < inputs.length; i++){
        inputs[i].classList.remove("form-control-danger");
    }
    for (i = 0; i < alert.length; i++){
        alert[i].style.display = "none";
    }
}

/**
 * =============================GESTIONE FOTO=============================
 */

function getInfoPhoto(id){
    var mp = new ManagePhoto();
    clearModal();
    $.when(
        mp.getPhoto(id)
    ).done( function (json) {
        document.getElementById('id_modal_input_del_foto').value = json.id;
    });
}

function addDataPhoto(){
    var mp = new ManagePhoto();
    clearModal();
    var inFile = document.getElementById("files");
    var files = inFile.files
    if(files.length > 0){
        $.when(
            mp.addPhoto(files)
        ).done( function (json) {
            console.log(json)
            var checkE = json;
            if(checkE == 0) {
                document.getElementById("alert_validation_photo_add_os").style.display = "none";
                document.getElementById("alert_validation_photo_add_specific").style.display = "block";
                document.getElementById("alert_validation_photo_add_ok").style.display = "none";
                document.getElementById("alert_validation_photo_add_file").style.display = "none";
            }else if(checkE == 1){
                document.getElementById("alert_validation_photo_add_os").style.display = "none";
                document.getElementById("alert_validation_photo_add_specific").style.display = "none";
                document.getElementById("alert_validation_photo_add_ok").style.display = "block";
                document.getElementById("alert_validation_photo_add_file").style.display = "none";

                window.setTimeout(function () {
                    window.location.replace(URL + "pannelloAdmin");
                }, 1000);
            }else if(checkE == 2){
                document.getElementById("alert_validation_photo_add_os").style.display = "block";
                document.getElementById("alert_validation_photo_add_specific").style.display = "none";
                document.getElementById("alert_validation_photo_add_ok").style.display = "none";
                document.getElementById("alert_validation_photo_add_file").style.display = "none";
            }else{
                window.location.replace(URL + "errore");
            }
        });
    }else{
        document.getElementById("alert_validation_photo_add_file").style.display = "block";
        document.getElementById("alert_validation_photo_add_specific").style.display = "none";
        document.getElementById("alert_validation_photo_add_os").style.display = "none";
        document.getElementById("alert_validation_photo_add_ok").style.display = "none";
    }
}

function deletePhoto(){
    var mp = new ManagePhoto();
    clearModal();
    var id = document.getElementById("id_modal_input_del_foto").value;
    $.when(
        mp.deletePhoto(id)
    ).done( function (json) {
        var checkE = json;
        if(checkE == 1) {
            document.getElementById("alert_del_photo").style.display = "block";
            window.setTimeout(function () {
                window.location.replace(URL + "pannelloAdmin");
            }, 1000);
        }else{
            window.location.replace(URL + "errore");
        }
    });
}

function clearModalFoto() {
    document.getElementById("files").value = "";
    var input = document.getElementById("image");
    input.src = "img/nofoto.png";
}
