class ManageNews{
     getNews(id) {
        var id = id;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/getNews"),
            type: "POST",
            dataType: "json",
            data: {id: id},
            success: function (text) {
                response = text;
            }
        }));
    }

    modifyNews(dataN) {
        var dataN = dataN;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/modifyNews"),
            type: "POST",
            data: {dataN: dataN},
            success: function (text) {
                response = text;
            }
        }));
    }

    addNews(dataN) {
        var dataN = dataN;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/addNews"),
            type: "POST",
            data: {dataN: dataN},
            success: function (text) {
                response = text;
            }
        }));
    }

    deleteNews(id) {
        var id = id;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/deleteNews"),
            type: "POST",
            data: {id: id},
            success: function (text) {
                response = text;
            }
        }));
    }
}