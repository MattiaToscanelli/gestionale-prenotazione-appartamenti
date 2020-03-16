class ManageUser{
     getUser(email) {
        var email = email;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/getUser"),
            type: "POST",
            dataType: "json",
            data: {email: email},
            success: function (text) {
                response = text;
            }
        }));
    }

    modifyUser(dataU) {
        var dataU = dataU;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/modifyUser"),
            type: "POST",
            data: {dataU: dataU},
            success: function (text) {
                response = text;
            }
        }));
    }

    deleteUser(email) {
        var email = email;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/deleteUser"),
            type: "POST",
            data: {email: email},
            success: function (text) {
                response = text;
            }
        }));
    }
}