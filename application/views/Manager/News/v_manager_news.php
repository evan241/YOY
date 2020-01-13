<br>
<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading header-primary">
            <div class="panel-title text-left pull-left"><h2 class="heading-primary">News</h2></div>
            <div class="pull-right">
                <a href="<?= base_url(); ?>manager/add_new" class="btn btn-primary"><span class="fa fa-plus"></span> Añadir nueva</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="pull-left">
                    <a href="#">Todo ()</a> | <a href="#"> Publicado ()</a>
                </div>
                <div class="pull-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-news-input" placeholder="Buscar...">
                                </button>
                            </div>
                        </div>
                        <button id="search-news-btn" class="form-control"><span class="fa fa-search"></span>
                    </form>
                </div>
            </div>
            <br/>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-6"><input type="checkbox" name="new-thead-title" id="new-thead-title"> Titulo</th>
                        <th class="col-md-2">Autor</th>
                        <th class="col-md-1">Publicada</th>
                        <th class="col-md-1">Fecha</th>
                    </tr>
                </thead>
                <tbody id="news-table">
                    <?php
                        $infoClass = '';
                        $infoText = '';
                        foreach ($ROWS as $ROW) { ?>
                            <tr>
                                <td><input type="checkbox" class="new-tbody-title" data-row-id="<?= $ROW['ID']; ?>"><strong><a href="#"> <?= $ROW['TITULO'];?></a></strong></td>
                                <td><?= ucfirst($ROW['NOMBRE_USUARIO']) ?></td>
                                <?php
                                    switch ($ROW['PUBLICADO']) {
                                        case '0':
                                            $infoClass = 'text-danger';
                                            $infoText = 'Sin publicar';
                                            break;
                                        
                                        case '1':
                                            $infoClass = 'text-success';
                                            $infoText = 'Publicado';
                                            break;
                                    }
                                ?>
                                <td class="<?= $infoClass; ?>"><?= $infoText; ?></td>
                                <td><?= date('d-m-Y', strtotime($ROW['CREATED_AT'])); ?></td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <button class="btn btn-danger">Eliminar seleccionados</button>
        </div>
    </div>
</div>

<script>
    $('#new-thead-title').change(function() {
        if ($(this).prop('checked')) {
            $('input[name="new-tbody-title"]').prop('checked', true);
        } else {
            $('input[name="new-tbody-title"]').prop('checked', false);
        }
    });

    $("#search-news-input").on("keyup", function(e) {
        e.preventDefault()
        var value = $(this).val().toLowerCase();
        $("#news-table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

</script>