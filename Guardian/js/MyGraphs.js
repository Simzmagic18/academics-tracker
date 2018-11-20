window.onload = function () {

    let chart1 = document.getElementById('chart1').getContext('2d');

    let barChart = new Chart(chart1,{
        type:'bar',
        data:{
            labels:['Assignment ', 'WW1 Quiz'],
            datasets:[{
                label: 'Individual Marks %',
                data:[20, 50],
                backgroundColor:'gold',
                hoverBorderWidth:3,
                hoverBorderColor:'black'
            },
            {
                label: 'Class Average %',
                data:[70, 45],
                backgroundColor:'orange',
                hoverBorderWidth:3,
                hoverBorderColor:'black'
            }],
        },
        options:{}
    });
}