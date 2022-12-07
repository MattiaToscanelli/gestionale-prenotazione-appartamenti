class ManagePhoto{

    addPhoto(file) {
        var file = file[0]
        var formData = new FormData();
        formData.append('file',file)
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/addPhoto"),
            type: "POST",
            data: formData,
            success: function (text) {
                response = text;
            },
            contentType: false,
            processData: false
        }));
    }

    getPhoto(id) {
        var id = id;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/getPhoto"),
            type: "POST",
            dataType: "json",
            data: {id: id},
            success: function (text) {
                response = text;
            }
        }));
    }

    deletePhoto(id) {
        var id = id;
        var response
        return ($.ajax({
            url: (URL + "pannelloAdmin/deletePhoto"),
            type: "POST",
            data: {id: id},
            success: function (text) {
                response = text;
            }
        }));
    }

}