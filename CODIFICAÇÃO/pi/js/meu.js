document.addEventListener("DOMContentLoaded", function () {
    // Dados do gráfico
    var options = {
        series: [
            { name: "Consultas mensais:", data: [40, 26, 38, 29, 55, 25, 41, 36] },
            {
                name: "Comparativo Ano/Ano:", data: [38, 29, 37, 23, 45, 27, 22, 39]
            }],
        chart: {
            type: 'bar',
            height: 345,
            offsetX: -15,
            toolbar: { show: true },
            foreColor: "#adb0bb",
            fontFamily: 'inherit',
            sparkline: { enabled: false },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "35%",
                borderRadius: [6],
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'all'
            },
        },
        markers: { size: 0 },

        dataLabels: {
            enabled: false,
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ["16/06", "17/06", "18/06", "19/06", "20/06", "21/06", "22/06", "23/06"],
            labels: {
                style: { cssClass: "grey--text lighten-2--text fill-color" },
            },
        },
        yaxis: {
            show: true,

            tickAmount: 4,
            labels: {
                style: {
                    cssClass: "grey--text lighten-2--text fill-color",
                },
            },
        },
        stroke: {
            show: true,
            width: 3,
            lineCap: "butt",
            colors: ["transparent"],
        },
        responsive: [
            {
                breakpoint: 600,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 3,
                        }
                    },
                }
            }
        ],
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " vendas";
                }
            }
        }
    };

    // Inicializar gráfico
    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();
});
