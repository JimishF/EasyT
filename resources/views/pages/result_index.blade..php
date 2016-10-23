<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    var data_json = "{{ jaon_encode($retAr) }}";

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Results'],
          ['Right Answers',    {{ $obtained }} ],
          ['Wrong Answers',     {{ $total - $obtained }}]
        ]);

        var options = {
          title: 'Subject vise',
          is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_subject_vise'));
        chart.draw(data, options);
      }


    </script>
  </head>
  <body >
  <div align="center">
  	<select id="sub_sel">
  	@foreach( $retAr as $k => $val )
  		<option value="{{ $val }}"> {{ $val }}</option>
  	@endforeach
  	</select> 
    <div id="subject_vise" style="width: 800px; height: 500px;"></div>
  </div>
  </body>
</html>