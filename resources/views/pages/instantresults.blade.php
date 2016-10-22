<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Results'],
          ['Right Answers',    {{ $obtained }} ],
          ['Wrong Answers',     {{ $total - $obtained }}]
        ]);

        var options = {
          title: 'Your Results',
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body >
  <div align="center">    
    <div id="piechart_3d" style="width: 600px; height: 500px;"></div>
  </div>
  </body>
</html>