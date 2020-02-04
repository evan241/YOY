<div class="row">

    <div class="col-xs-12 col-md-6 col-lg-3"></div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4 box-shadow">
            <div class="card-body">
                <div class="float-right">
                    <h2><i class="fas fa-2x fa-hand-holding-usd"></i></h2>
                </div>
                <h2 class="mb-1"></h2>
                <p>Ventas del mes</p>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="card card-mini mb-4 box-shadow">
            <div class="card-body">
                <div class="float-right">
                    <h2><i class="fas fa-2x fa-hand-holding-usd"></i></h2>
                </div>
                <h2 class="mb-1">2</h2>
                <p>Ventas del año</p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3"></div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h3 class="panel-heading">VENTAS POR MES</h3><br>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var lineChartData = {
                labels : [
                "Enero","Febrero","Marzo","Abril","Mayo","Junio", "Julio",
                "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                ],
                datasets : [
                {
                    label: "Sales",
                    fillColor : "rgba(48, 164, 255, 0.2)",
                    strokeColor : "rgba(48, 164, 255, 1)",
                    pointColor : "rgba(48, 164, 255, 1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(48, 164, 255, 1)",
                    data : [<?= $test ?>]
                }
                ]
            }

            window.onload = function(){
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true
                });
            };
        </script>


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
