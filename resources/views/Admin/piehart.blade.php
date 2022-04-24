<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="personalChart"></div>
  <p class="highcharts-description">
    data lalala
  </p>
</figure>

<script>
    // Create the chart
Highcharts.chart('personalChart', {
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Laporan Sambung Nama tgl'
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
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
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
          drilldown: "Hadir"
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
</script>
