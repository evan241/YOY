<?php
$asd = [1, 2, 3];
?>
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3"></div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4 box-shadow">
            <div class="card-body">
                <div class="float-right">
                    <h2><i class="fas fa-2x fa-hand-holding-usd"></i></h2>
                </div>
                <h2 class="mb-1"><?= $monthSales ?></h2>
                <p>Venta mensual</p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="card card-mini mb-4 box-shadow">
            <div class="card-body">
                <div class="float-right">
                    <h2><i class="fas fa-2x fa-hand-holding-usd"></i></h2>
                </div>
                <h2 class="mb-1"><?= $yearSales ?></h2>
                <p>Venta anual</p>
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
            var monthArray = <?= json_encode($months) ?>;
            var monthSales = [];
            for (var i in monthArray)
                monthSales.push(monthArray[i]);

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
                    data : monthSales
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
    </div>
</div>