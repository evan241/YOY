var randomScalingFactor = function () {
    return Math.round(Math.random() * 1000)
};

var barChartData = {
    labels: [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    ],
    datasets: [
        {
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [4, 5, 6]
        },
        {
            fillColor: "rgba(48, 164, 255, 0.2)",
            strokeColor: "rgba(48, 164, 255, 0.8)",
            highlightFill: "rgba(48, 164, 255, 0.75)",
            highlightStroke: "rgba(48, 164, 255, 1)",
            data: [1, 2, 3]
        }
    ]
}