$(document).ready(function(){
    $('#new-thead-title').change(function() {
        if ($(this).prop('checked')) {
            $('.new-tbody-title').prop('checked', true);
        } else {
            $('.new-tbody-title').prop('checked', false);
        }
    });
    
    $("#search-news-input").on("keyup", function(e) {
        e.preventDefault()
        var value = $(this).val().toLowerCase();
        $("#news-table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('#add-header').click(function(){
        $('#news-content').append('<h3 contenteditable="true" placeholder="Subtitulo...">Subtitulo...</h3>');
    });

    $('#add-paragraph').click(function(){
        $('#news-content').append('<p contenteditable="true" placeholder="Contenido...">Contenido...</p>');
    });

    $(document).on('focus', '#news-content h3, #news-content p, #news-title', function(){
        var ph = $(this).attr('placeholder');
        if($(this).html() == '' || $(this).html() == '<br>' || $(this).html() == ph){
            $(this).html('<br>');
        }
    });

    $(document).on('focusout', '#news-content h3, #news-content p, #news-title', function(){
        var ph = $(this).attr('placeholder');
        if($(this).html() == '' || $(this).html() == '<br>'){
            $(this).html(ph);
        }
    });

    $('#add-image').click(function(){
        var addImage = '<form  enctype="multipart/form-data"><div class="card add-file">';
        addImage += '<div class="card-body">';
        addImage += '<label for="add-image" class="btn btn-light">Subir imagen<span class="fa fa-upload fa-2x" style="margin-left: 20px;"></span></label>';
        addImage += '<div class="file-selected"></div>';
        addImage += '<input style="display:none;" type="file" name="image-file" id="add-image">';
        addImage += '<input type="submit" value="Cargar imagen" style="display:none">';
        addImage += '</div>';
        addImage += '</div></form>';
        $('#news-content').append(addImage);
    });

    $(document).on('change', '#add-image', function(){
        $('.file-selected').html($(this).val());
    });

    $(document).on('submit', );

    $('#add-video').click(function(){
        var addImage = '<form  enctype="multipart/form-data"><div class="card add-file">';
        addImage += '<div class="card-body">';
        addImage += '<label for="add-video" class="btn btn-light">Subir video<span class="fa fa-upload fa-2x" style="margin-left: 20px;"></span></label>';
        addImage += '<div class="file-selected"></div>';
        addImage += '<input style="display:none;" type="file" name="video-file" id="add-video">';
        addImage += '<input type="submit" value="Cargar imagen" style="display:none">';
        addImage += '</div>';
        addImage += '</div></form>';
        $('#news-content').append(addImage);
    });

    $('#add-youtube').click(function(){
        var addYoutube = '<form class="youtube-form">';
        addYoutube += '<div class="input-group">';
        addYoutube += '<div class="input-group-prepend">';
        addYoutube += '<div class="input-group-text"><span class="fa fa-link"</span></div>';
        addYoutube += '</div>';
        addYoutube += '<input type="text" class="form-control add-youtube-link" placeholder="Ingresa aqui el enlace de youtube">';
        addYoutube += '</div>';
        addYoutube += '</form>';
        $('#news-content').append(addYoutube);
    });

    $(document).on( 'submit', '.youtube-form', function(e){
        e.preventDefault();
        var youtubeLink = $('.add-youtube-link').val();
        var lastIndex = youtubeLink.split("=");
        youtubeLink = lastIndex[lastIndex.length - 1];
    
        $('.youtube-form').remove();
    
        $('#news-content').append('<iframe src="http://www.youtube.com/embed/'+youtubeLink+'" width="560" height="315" frameborder="0" allowfullscreen></iframe>');
    });

    $('#upload-news').click(function(){
        var newsTitle = $('#news-title').attr('placeholder');
        if($('#news-title').html() == '' || $('#news-title').html() == '<br>' || $('#news-title').html() == newsTitle){
            $('#response-tag').html('<span class="text-danger">Por favor agrega un titulo</span>');
        } else {
            var data = {
                TITULO: $('#news-title').html(),
                IMAGEN_TITULO: '',
                CONTENIDO: $('#news-content').html(),
                AUTOR: userID,
                PUBLICADO: 1,
            };

            $.ajax({
                url:  raiz_url + "manager_news/ajax_add_news",
                type: 'post',
                data: {
                    'Content': data,
                },
                dataType: 'html',
                success: function(result){
                    if (result == '1') {
                        $('#response-tag').html('<span class="text-success">Se publico con exito!</span>');
                    } else {
                        alert('Se produjo un error');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error en el AJAX' + jqXHR.responseText)
                }
            });
        }
    });
});