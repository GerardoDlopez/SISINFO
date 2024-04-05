// Pie Chart
$.plot($('#flotPie'), [
    { label: 'Series1', data: 77 },
    { label: 'Series2', data: 81 },
    { label: 'Series3', data: 46 },
    { label: 'Series4', data: 35 },
    { label: 'Series5', data: 79 },
    { label: 'Series6', data: 84 },
    { label: 'Series7', data: 50 },
  ], {
    series: {
      shadowSize: 0,
      pie: {
        show: true,
        radius: 1,
        innerRadius: 0.5,
        stroke: {
          color: colors.cardBg,
          width: 3
        },
        label: {
          show: true,
          radius: 3 / 4,
          background: { opacity: 0.5 },

          formatter: function(label, series) {
            return '<div style="font-size:11px;text-align:center;color:white;">' + Math.round(series.percent) + '%</div>';
          }
        }
      }
    },

    grid: {
      color: colors.bodyColor,
      borderColor: colors.gridBorder,
      borderWidth: 1,
      hoverable: true,
      clickable: true
    },

    xaxis: { tickColor: colors.gridBorder },
    yaxis: { tickColor: colors.gridBorder },
    legend: { backgroundColor: colors.cardBg },
    colors: [colors.primary, colors.secondary, colors.danger, colors.warning, colors.info, colors.success]
  });