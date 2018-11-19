window.onload = function () {

    let chart1 = document.getElementById('chart1').getContext('2d');

    let barChart = new Chart(chart1,{
        type:'bar',
        data:{
            labels:['Assignment 1', 'Exercise 1'],
            datasets:[{
                label: 'Peter Griffin',
                data:[85, 100],
                backgroundColor:'gold',
                hoverBorderWidth:1,
                hoverBorderColor:'black'
            },
            {
                label: 'Lois Daniels',
                data:[100, 95],
                backgroundColor:'orange',
                hoverBorderWidth:1,
                hoverBorderColor:'black'
            }],
        },
        options:{}
    });

    let chart2 = document.getElementById('chart2').getContext('2d');

    let barChart1 = new Chart(chart2,{
        type:'bar',
        data:{
            labels:['Assignment 1', 'Exercise 1'],
            datasets:[{
                label: 'Peter Griffin',
                data:[60, 89],
                backgroundColor:'gold',
                hoverBorderWidth:1,
                hoverBorderColor:'black'
            },
            {
                label: 'Lois Daniels',
                data:[70, 80],
                backgroundColor:'orange',
                hoverBorderWidth:1,
                hoverBorderColor:'black'
            }],
        },
        options:{}
    });
}