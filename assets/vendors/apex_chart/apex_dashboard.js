
jQuery(document).ready(function ($) {

    let allOrderData = [];

    // Function to filter data based on the selected time range
    function filterData(range) {
        const currentDate = new Date();
        let filteredData;

        switch (range) {
            case '1-month':
                filteredData = allOrderData.filter(order => {
                    const orderDate = new Date(order.date);
                    return orderDate >= new Date(currentDate.setMonth(currentDate.getMonth() - 1));
                });
                break;
            case '6-months':
                filteredData = allOrderData.filter(order => {
                    const orderDate = new Date(order.date);
                    return orderDate >= new Date(currentDate.setMonth(currentDate.getMonth() - 6));
                });
                break;
            case '1-year':
                filteredData = allOrderData.filter(order => {
                    const orderDate = new Date(order.date);
                    return orderDate >= new Date(currentDate.setFullYear(currentDate.getFullYear() - 1));
                });
                break;
            case 'all':
            default:
                filteredData = allOrderData;
                break;
        }

        return filteredData;
    }

    // Function to update the charts
    function updateCharts(filteredData) {
        // Update Sales Chart
        const salesOptions = {
            series: [{
                name: 'Total Sales',
                data: filteredData.map(order => order.total)
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            xaxis: {
                categories: filteredData.map(order => order.date),
            }
        };

        var salesChart = new ApexCharts(document.querySelector("#areaLine_chart1"), salesOptions);
        salesChart.render();

        // Update Order Status Chart
        const statusCounts = filteredData.reduce((acc, order) => {
            acc[order.status] = (acc[order.status] || 0) + 1;
            return acc;
        }, {});

        const statusOptions = {
            series: [{
                data: Object.values(statusCounts)
            }],
            chart: {
                type: 'bar',
                width: 35,
                height: 20,
                sparkline: {
                    enabled: true
                }
            },
            xaxis: {
                categories: Object.keys(statusCounts)
            }
        };

        var statusChart = new ApexCharts(document.querySelector("#monitor_1"), statusOptions);
        statusChart.render();
    }


    $.ajax({
        url: ajax_object.ajax_url,
        method: 'POST',
        data: { action: 'get_order_data' },
        success: function (response) {
            // console.log(response);
            // const orderData = JSON.parse(response);
            // const options = {
            //     chart: {
            //         type: 'line',
            //         height: 350
            //     },
            //     series: [{
            //         name: 'Total Sales',
            //         data: orderData.map(order => parseFloat(order.total))
            //     }],
            //     xaxis: {
            //         categories: orderData.map(order => order.date)
            //     }
            // };

            // const chart = new ApexCharts(document.querySelector("#areaLine_chart1"), options);
            // chart.render();

            allOrderData = JSON.parse(response);

            // Initially display all data
            updateCharts(allOrderData);

            // Add event listeners to buttons
            $('#view_btns button').on('click', function () {
                const selectedRange = $(this).data('range');
                const filteredData = filterData(selectedRange);
                updateCharts(filteredData);
            });

        }
    });
});

// var chart = new ApexCharts(document.querySelector("#areaLine_chart1"), options);
// chart.render();
// if ($("#monitor_1").length > 0) {
//     options = {
//         series: [{ data: [24, 62, 42, 84, 63, 25, 65, 50] }],
//         chart: { type: "bar", width: 35, height: 20, sparkline: { enabled: !0 } },
//         colors: ["#61BDA1"],
//         tooltip: {
//             fixed: { enabled: !1 },
//             x: { show: !1 },
//             y: {
//                 title: {
//                     formatter: function (e) {
//                         return "";
//                     },
//                 },
//             },
//             marker: { show: 0 },
//         },
//     };
//     (chart = new ApexCharts(document.querySelector("#monitor_1"), options)).render();
// }