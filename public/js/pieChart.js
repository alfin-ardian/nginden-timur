// Create the chart
Highcharts.setOptions({
    colors: ['#50B432','#058DC7', '#DDDF00','#ED561B','#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
});
Highcharts.chart('personalChart', {
  chart: {
    type: 'pie'
  },
  title: {
    text: ''
  },
  accessibility: {
    announceNewData: {
      enabled: true
    },
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} orang</b><br/>'
  },

  series: [
    {
      name: "Kelompok",
      colorByPoint: true,
      data: [
        {
          name: "Hadir",
          y: 62.74,
        },
        {
          name: "Ijin",
          y: 10.57,
          drilldown: "Ijin"
        },
        {
          name: "Sakit",
          y: 7.23,
          drilldown: "Sakit"
        },
        {
          name: "Alfa",
          y: 5.58,
          drilldown: "Alfa"
        }
      ]
    }
  ]
});
