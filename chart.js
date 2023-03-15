var ctx = document.getElementById('myChart').getContext('2d');

// Data for the chart
var data = {
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [{
    label: 'Điện Áp',
    borderColor: 'red',
    data: [5, 10, 8, 15, 20, 18, 25]
  }, {
    label: 'Dòng Điện',
    borderColor: 'green',
    data: [10, 15, 12, 20, 25, 23, 30]
  }, {
    label: 'Công Suất',
    borderColor: 'blue',
    data: [15, 20, 18, 25, 30, 28, 35]
  }]
};

// Chart options
var options = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    xAxes: [{
      ticks: {
        fontColor: 'black'
      }
    }],
    yAxes: [{
      ticks: {
        fontColor: 'black'
      }
    }]
  }
};

// Create the chart
var chart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});
