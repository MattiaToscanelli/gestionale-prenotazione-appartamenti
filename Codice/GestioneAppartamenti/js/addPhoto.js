/**
 * Metodo che permette l'aggiunta o rimozione di una foto nella pagina di aggiunta appartamenti.
 */
$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
        $('#dynamic_field').append('<div id="row'+i+'" class="col-6 mb-10">' +
            '<input id="files'+i+'" type="file" name="name[]" class="name_list"/> ' +
            '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>' +
            '<div class="w-100">' +
                '<div class="image-wrapper-min">' +
                    '<img id="image'+i+'"/>' +
                '</div>' +
            '</div>');
        eval('document.getElementById("files'+i+'").onchange = function () {' +
                    'var reader = new FileReader();reader.onload = function (e) {' +
                        'document.getElementById("image'+i+'").src = e.target.result;' +
                    '};' +
                    'reader.readAsDataURL(this.files[0]);' +
                '};');
        i++;
    });
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });
});