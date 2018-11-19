window.onload = function drawChart() {

    let chart2 = document.getElementById('chart2').getContext('2d');

    let barChart = new Chart(chart2,{
        type:'bar',
        data:{
            labels:['Assignment 1', 'Exercise 1'],
            datasets:[{
                label: 'Peter Griffin',
                data:[60, 89],
                backgroundColor:'gold',
                hoverBorderWidth:1,
                hoverBorderColor:'black'
            }],
        },
        options:{}
    });
}
