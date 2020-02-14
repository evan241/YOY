<script type="text/javascript">
window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
        responsive: true
    });
}
</script>
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3"></div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4 box-shadow">
            <div class="card-body">
                <div class="float-left">
                    <h2><i class="fas fa-2x fa-hand-holding-usd"></i></h2>
                </div>
                <div class="float-right">
                    <h2 class="mb-1 text-right">100</h2>
                    <p>Ventas del día</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="card card-mini mb-4 box-shadow">
            <div class="card-body">
                <div class="float-right">
                    <h2><i class="fas fa-2x fa-shipping-fast"></i></h2>
                </div>
                <h2 class="mb-1">2</h2>
                <p>Envíos del día</p>
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
    </div>
</div>