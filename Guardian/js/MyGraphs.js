window.onload = function () {

    let chart1 = document.getElementById('chart1').getContext('2d');

    let barChart = new Chart(chart1,{
        type:'bar',
        data:{
            labels:['Assignment 1', 'Exercise 1'],
            datasets:[{
                label: 'Individual Marks %',
                data:[85, 100],
                backgroundColor:'gold',
                hoverBorderWidth:3,
                hoverBorderColor:'black'
            },
            {
                label: 'Class Average %',
                data:[90, 90],
                backgroundColor:'orange',
                hoverBorderWidth:3,
                hoverBorderColor:'black'
            }],
        },
        options:{}
    });
}