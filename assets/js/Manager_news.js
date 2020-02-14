$(document).ready(function(){

    // Seleccionar todas las noticias para su eliminacion
    $('#new-thead-title').change(function() {
        if ($(this).prop('checked')) {
            $('.new-tbody-title').prop('checked', true);
        } else {
            $('.new-tbody-title').prop('checked', false);
        }
    });
    
    // Busqueda de las noticias
    $("#search-news-input").on("keyup", function(e) {
        e.preventDefault()
        var value = $(this).val().toLowerCase();
        $("#news-table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Boton para agregar un header a la noticias
    $('#add-header').click(function(){
        $('#news-content').append('<h3 contenteditable="true" placeholder="Subtitulo..." class="news-subtitle">Subtitulo...</h3>');
    });

    // Boton par agregar un parrafo a la noticiab c
    $('#add-paragraph').click(function(){
        $('#news-content').append('<p contenteditable="true" placeholder="Contenido..." class="news-paragraph">Contenido...</p>');
    });

    // Crear la ilucion de un placeholder con el metodo focus
    $(document).on('focus', '#news-content h3, #news-content p, #news-title', function(){
        var ph = $(this).attr('placeholder');
        if($(this).html() == '' || $(this).html() == '<br>' || $(this).html() == ph){
            $(this).html('<br>');
        }
    });

    // Crear la ilucion de un placeholder con el metodo focusout
    $(document).on('focusout', '#news-content h3, #news-content p, #news-title', function(){
        var ph = $(this).attr('placeholder');
        if($(this).html() == '' || $(this).html() == '<br>'){
            $(this).html(ph);
        }
    });

    // Boton para agregar una imagen
    $('#add-image').click(function(){
        var addImage = '<form  enctype="multipart/form-data" id="image-form"><div class="card add-file">';
        addImage += '<div class="card-body">';
        addImage += '<label for="add-image" class="btn btn-light">Subir imagen<span class="fa fa-upload fa-2x" style="margin-left: 20px;"></span></label>';
        addImage += '<input style="display:none;" type="file" name="image-file" id="add-image">';
        addImage += '</div>';
        addImage += '</div></form>';
        $('#news-content').append(addImage);
    });

    // Funcion para hacer submit cuando seleccionas un archivo
    $(document).on('change', '#add-image', function(){
        $('#image-form').submit();
    });

    // Funcion para agregar imagen a la noticia a la vez que elimina el formulario
    $(document).on('submit', '#image-form', function(e){
        e.preventDefault();
        var formData = new FormData();
        var image = $('#add-image')[0].files[0];
        formData.append('image', image);
        $.ajax({
            url: raiz_url + 'manager_news/ajax_add_image_news',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != '') {
                    $('#image-form').remove();
                    $('#news-content').append('<div class="news-image"><img src="'+response+'" alt="image" width="450"></div>');
                } else if (response == '0') {
                    alert('Por favor selecciona uno de los formatos permitidos (pjpeg, jpeg, jpg, png, gif).');
                } else {
                    alert('Se produjo un error al intentar conectar a la base de datos');
                }
            }
        });
    });

    // Boton para agregar un video
    $('#add-video').click(function(){
        var addVideo = '<form  enctype="multipart/form-data" id="video-form"><div class="card add-file">';
        addVideo += '<div class="card-body">';
        addVideo += '<label for="add-video" class="btn btn-light">Subir video<span class="fa fa-upload fa-2x" style="margin-left: 20px;"></span></label>';
        addVideo += '<input style="display:none;" type="file" name="video-file" id="add-video">';
        addVideo += '</div>';
        addVideo += '</div></form>';
        $('#news-content').append(addVideo);
    });

    // Funcion para hacer submit cuando seleccionas un archivo
    $(document).on('change', '#add-video', function(){
        $('#video-form').submit();
    });

    // Funcion para agregar video a la noticia a la vez que elimina el formulario
    $(document).on('submit', '#video-form', function(e){
        e.preventDefault();
        var formData = new FormData();
        var image = $('#add-video')[0].files[0];
        formData.append('video', image);
        $.ajax({
            url: raiz_url + 'manager_news/ajax_add_video_news',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == '0') {
                    alert('Por favor selecciona uno de los formatos permitidos (mpeg, mp4, 3gp, avi).');
                } else if (response == '1') {
                    alert('Se produjo un error al intentar conectar a la base de datos');
                } else {
                    $('#video-form').remove();
                    $('#news-content').append('<video src="'+response+'" width="560" height="315" controls class="news-video"></video> ');
                }
            }
        });
    });

    // Boton para agregar un enlace de youtube
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

    // Funcion que elimina el formulario para subir enlace de youtube y a la vez crea el iframe de youtube
    $(document).on( 'submit', '.youtube-form', function(e){
        e.preventDefault();
        var youtubeLink = $('.add-youtube-link').val();
        var lastIndex = youtubeLink.split("=");
        youtubeLink = lastIndex[lastIndex.length - 1];
    
        $('.youtube-form').remove();
        $('#news-content').append('<iframe src="http://www.youtube.com/embed/'+youtubeLink+'" class="news-youtube-link" width="560" height="315" frameborder="0" allowfullscreen></iframe>');
    });

    // Funcion para subir la noticia a la base de datos
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
                        window.location.href = raiz_url + 'manager_news/news';
                    } else {
                        $('#response-tag').html('<span class="text-danger">Por favor agrega un titulo</span>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error en el AJAX' + jqXHR.responseText)
                }
            });
        }
    });

    // Funcion pra actualizar la noticia en la base de datos 
    $('#update-news').click(function(){
        var newsTitle = $('#news-title').attr('placeholder');
        if($('#news-title').html() == '' || $('#news-title').html() == '<br>' || $('#news-title').html() == newsTitle){
            $('#response-tag').html('<span class="text-danger">Por favor agrega un titulo</span>');
        } else {
            var data = {
                TITULO: $('#news-title').html(),
                IMAGEN_TITULO: '',
                CONTENIDO: $('#news-content').html(),
            };

            $.ajax({
                url:  raiz_url + "manager_news/ajax_edit_news",
                type: 'post',
                data: {
                    'Content': data,
                    'ID': newsID,
                },
                dataType: 'html',
                success: function(result){
                    if (result == '1') {
                        window.location.href = raiz_url + 'manager_news/news';
                    } else {
                        $('#response-tag').html('<span class="text-danger">No haz realizado ningun cambio</span>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error en el AJAX' + jqXHR.responseText)
                }
            });
        }
    });

    // Funcion para elminar una o mas noticias de la base de datos
    $('#delete-news').click(function(){
        var ids = '';
        $('.new-tbody-title:checked').each(function(i){           
            ids += $(this).attr('data-row-id') + ','; 
        });

        $.ajax({
            url: raiz_url + 'manager_news/ajax_delete_news',
            type: 'post',
            data: {
                'IDs': ids,
            },
            dataType: 'html',
            success: function(result){
                window.location.reload();
            }, error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error en el AJAX' + jqXHR.responseText)
            }
        });
    });

    $(function(){
        var widthValue = 450;
        var elementNav = '<div class="element-nav">';
        elementNav += '<div class="input-group">';
        elementNav += '<input type="range" class="form-control rs-range" min="300" max="800" step="10" value="'+widthValue+'">';
        elementNav += '</div>';
        elementNav += '</div>';

        $(document).on('mouseenter', '.news-image, .rs-range', function(){
            $(this).prepend(elementNav);
        });

        $(document).on('mouseleave','.news-image',function(){
            $('.element-nav').remove();
        });

        $(document).on('input', '.rs-range', function(){
            var width = $(this).val();
            $('.news-image img').attr('width', width);
        });
    });
});