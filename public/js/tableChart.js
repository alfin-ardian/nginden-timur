
Highcharts.chart('tableChart', {
    data: {
      table: 'datatable'
    },
    chart: {
      type: 'column'
    },
    title: {
      text: 'Laporan Sambung Perbulan'
    },
    yAxis: {
      allowDecimals: false,
      title: {
        text: 'Total'
      }
    },
    tooltip: {
      formatter: function () {
        return '<b>' + this.series.name + '</b>' + ':' +
          this.point.y;
      }
    }
  });
