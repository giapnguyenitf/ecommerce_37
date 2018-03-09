window.onload = function () {
    Chart.defaults.global.defaultFontColor = '#000000';
    Chart.defaults.global.defaultFontFamily = 'Arial';
    var url = $('#order-chart').attr('data-url');
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            var labels = [];
            var number_orders = [];
            data.forEach(element => {
                labels.push(element.date);
                number_orders.push(element.value);
            });
            var barChart = document.getElementById('order-chart');
            var myChart = new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Number order',
                            data: number_orders,
                            backgroundColor: 'rgba(0, 128, 128, 0.3)',
                            borderColor: 'rgba(0, 128, 128, 0.7)',
                            borderWidth: 1
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                                suggestedMax: 10,
                            },
                        }]
                    },
                    animation: {
                        easing: 'easeOutCubic',
                        duration: 0,
                        onComplete: function () {
                            var ctx = this.chart.ctx;
                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
                            ctx.fillStyle = this.chart.config.options.defaultFontColor;
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';
                            this.data.datasets.forEach(function (dataset) {
                                for (var i = 0; i < dataset.data.length; i++) {
                                    var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
                                    ctx.fillText(dataset.data[i], model.x, model.y - 5);
                                }
                            });
                        }
                    },
                    responsive: true,
                }
            });
        },
        error: function (data) {

        }
    });

};
