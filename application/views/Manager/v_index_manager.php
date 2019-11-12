
<div class="container-fluid">
    <div class="row"><br></div>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3"></div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">5</div>
                        <div class="text-muted">Ventas del día</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked notepad"><use xlink:href="#stroked-notepad"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">2</div>
                        <div class="text-muted">Envíos del día</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <?php $this->view('Manager/v_navbar_index_manager'); ?>
        </div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Ventas por mes</div>
                        <div class="panel-body">
                            <div class="canvas-wrapper">
                                <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Siniestros</div>
                        <div class="panel-body">
                            <div class="canvas-wrapper">
                                <canvas class="chart" id="pie-chart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Siniestros atendidos</div>
                        <div class="panel-body">
                            <div class="canvas-wrapper">
                                <canvas class="chart" id="doughnut-chart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Label:</h4>
                            <div class="easypiechart" id="easypiechart-blue" data-percent="2" ><span class="percent">92%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Label:</h4>
                            <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Label:</h4>
                            <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Label:</h4>
                            <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div><!--/.row-->
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/lumino.glyphs.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/chart-data.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/easypiechart.js" type="text/javascript"></script>