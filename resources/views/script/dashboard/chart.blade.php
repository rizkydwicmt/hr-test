<script>
    let chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        info: '#41B1F9',
        blue: '#3245D1',
        purple: 'rgb(153, 102, 255)',
        grey: '#EBEFF6'
    };

    let config1 = {
        type: "doughnut",
        data: {
            labels: ["UNAIR", "LUAR UNAIR"],
            datasets: [{
                label: "Orders",
                borderColor: "#fff",
                data: ['123', '321'],
                fill: false,
                pointBorderWidth: 100,
                pointBorderColor: "transparent",
                backgroundColor: ['#5A8DEE', '#FF5B5C'],
                pointRadius: 3,
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "rgba(63,82,227,1)",
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: -10,
                    top: 10,
                },
            },
            legend: {
                display: false,
            },
            title: {
                display: false,
                text: "Chart.js Line Chart",
            },
            tooltips: {
                mode: "index",
                intersect: false,
            },
            hover: {
                mode: "nearest",
                intersect: true,
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false,
                    },
                }, ],
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                }, ],
            },
        },
    };
    let config2 = {
        type: "doughnut",
        data: {
            labels: ["UNAIR", "LUAR UNAIR"],
            datasets: [{
                label: "Orders",
                borderColor: "#fff",
                data: ['123', '321'],
                fill: false,
                pointBorderWidth: 100,
                pointBorderColor: "transparent",
                backgroundColor: ['#5A8DEE', '#FF5B5C'],
                pointRadius: 3,
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "rgba(63,82,227,1)",
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: -10,
                    top: 10,
                },
            },
            legend: {
                display: false,
            },
            title: {
                display: false,
                text: "Chart.js Line Chart",
            },
            tooltips: {
                mode: "index",
                intersect: false,
            },
            hover: {
                mode: "nearest",
                intersect: true,
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false,
                    },
                }, ],
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                }, ],
            },
        },
    };
    let config4 = {
        type: "doughnut",
        data: {
            labels: ["PARTICIPANT", "GUEST"],
            datasets: [{
                label: "Orders",
                borderColor: "#fff",
                data: ['123', '321'],
                fill: false,
                pointBorderWidth: 100,
                pointBorderColor: "transparent",
                backgroundColor: ['#5A8DEE', '#FF5B5C'],
                pointRadius: 3,
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "rgba(63,82,227,1)",
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: -10,
                    top: 10,
                },
            },
            legend: {
                display: false,
            },
            title: {
                display: false,
                text: "Chart.js Line Chart",
            },
            tooltips: {
                mode: "index",
                intersect: false,
            },
            hover: {
                mode: "nearest",
                intersect: true,
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false,
                    },
                }, ],
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false,
                    },
                }, ],
            },
        },
    };

    let ctx1 = document.getElementById("canvas1").getContext("2d");
    let ctx2 = document.getElementById("canvas2").getContext("2d");
    let lineChart1 = new Chart(ctx1, config1);
    let lineChart2 = new Chart(ctx2, config2);
</script>