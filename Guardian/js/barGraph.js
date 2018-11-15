window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
            text: "Maths: Idividual Mark vs Class Average for Each Task"
        },	
        axisY: {
            title: "Percentage",
            titleFontColor: "black",
            lineColor: "black",
            labelFontColor: "black",
            tickColor: "black"
        },
        axisY2: {
            title: "Percentage",
            titleFontColor: "black",
            lineColor: "black",
            labelFontColor: "black",
            tickColor: "black"
        },	
        toolTip: {
            shared: true
        },
        legend: {
            cursor:"pointer",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            color: "#ffb606",
            name: "Individual Mark (%)",
            legendText: "Individual Mark",
            showInLegend: true, 
            dataPoints:[
                { label: "Assignment 1", y: 85 },
                { label: "Exercise 1", y: 100 },
            ]
        },
        {
            type: "column",	
            color: "#ff4500",
            name: "Class Average (%)",
            legendText: "Class Average",
            axisYType: "secondary",
            showInLegend: true,
            dataPoints:[
                { label: "Assignment 1", y: 90 },
                { label: "Exercise 1", y: 90 }
            ]
        }]
    });
    chart.render();
    
    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }
}