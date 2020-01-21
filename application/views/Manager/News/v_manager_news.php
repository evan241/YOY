<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">News</h3>
            <div class="float-right">
                <a href="<?= base_url(); ?>manager_news/add_news" class="btn btn-primary"><span class="fa fa-plus"></span> Añadir nueva</a>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="float-left">
                    <a href="#">Todo (<?= count($ROWS);?>)</a> | <a href="#"> Publicado (<?php
                                $totalNewsPublic = 0;
                                foreach ($ROWS as $ROW) {
                                    if ($ROW['PUBLICADO'] == 1) $totalNewsPublic += 1;
                                }
                                echo $totalNewsPublic;
                            ?>)</a>
                </div>
                <div class="float-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="basic-addon1"><span class="fa fa-search"></span></div>
                                </div>
                                <input type="text" class="form-control" id="search-news-input" placeholder="Buscar...">
                            </div>
                        </div>
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
                                <td><input type="checkbox" class="new-tbody-title" data-row-id="<?= $ROW['ID']; ?>"><strong><a href="<?= base_url(); ?>manager_news/edit_news/<?= $ROW['ID']; ?>"> <?= $ROW['TITULO'];?></a></strong></td>
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
        <div class="card-footer">
            <button class="btn btn-danger" id="delete-news">Eliminar seleccionados</button>
        </div>
    </div>
</div>