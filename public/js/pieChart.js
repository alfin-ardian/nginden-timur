// Create the chart
var nama_jadwal = JSON.parse(jadwals)

var hadir = 0;
var belum_absen = 0;
var izin = 0;
var sakit = 0;
var total = nama_jadwal['absensi'].length;

nama_jadwal['absensi'].forEach(function(item, index) {
    if (item.presensi == 'H') {
        hadir++;
    }else if (item.presensi == null) {
        belum_absen++;
    }else if(item.presensi == 'I'){
        izin++;
    }else if (item.presensi == 'S') {
        sakit++;
    }
});


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
        format: '{point.name}: {point.y:.f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.z:.f} orang</b><br/>'
  },

  series: [
    {
      name: "Kelompok",
      colorByPoint: true,
      data: [
        {
          name: "Hadir",
          y: (hadir/total)*100,
          z: hadir
        },
        {
          name: "Ijin",
          y: (izin/total)*100,
          z:izin,
          drilldown: "Ijin"
        },
        {
          name: "Sakit",
          y: (sakit/total)*100,
          z: sakit,
          drilldown: "Sakit"
        },
        {
          name: "Belum Absen",
          y: (belum_absen/total)*100,
          z: belum_absen,
          drilldown: "Belum Absen"
        }
      ]
    }
  ]
});
