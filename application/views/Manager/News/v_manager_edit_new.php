<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Nueva Noticia</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="card" style="border: 1px solid #e0e0e0;">
                    <div class="card-body">
                        <div class="container">
                            <h1 contenteditable="true" placeholder="Titulo..." id="news-title"><?= $ROWS[0]['TITULO'] ?></h1>
                        </div>
                        <div class="container">
                            <div id="news-content"><?= $ROWS[0]['CONTENIDO'] ?></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="news-object-section">
                            <div class="news-objects">
                                <div class="object-icon" title="Agregar un subtitulo" id="add-header"><span class="fas fa-heading"></span></div>
                                <div class="object-icon" title="Agregar un parrafo" id="add-paragraph"><span class="fas fa-paragraph"></span></div>
                                <div class="object-icon" title="Agregar una imagen" id="add-image"><span class="fas fa-image"></span></div>
                                <div class="object-icon" title="Agregar un video" id="add-video"><span class="fas fa-video"></span></div>
                                <div class="object-icon" title="Agregar un enlace de youtube" id="add-youtube"><span class="fab fa-youtube"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button id="update-news" class="btn btn-success">Actualizar</button>
            <span id="response-tag"></span>
        </div>
    </div>
</div>
<script>
    var newsID = <?= $ROWS[0]['ID']; ?>;
</script>