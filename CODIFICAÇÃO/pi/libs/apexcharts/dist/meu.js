document.addEventListener("DOMContentLoaded", function () {
    // Dados do gráfico
    var options = {
        series: [{
            name: 'Vendas',
            data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
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
            categories: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro'],
        },
        yaxis: {
            title: {
                text: 'Quantidade de Vendas'
            }
        },
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
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
});
