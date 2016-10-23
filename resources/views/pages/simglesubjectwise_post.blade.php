@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
            <form method="post" >
                <div class="panel-heading">Subject wise hit ratio</div>
                <div class="panel-body form-group">
            <div class="col-sm-4">
          <label class="form-control ">Select Subject : </label>
            </div> 
            <div class="col-sm-4">
            {{ csrf_field() }}
            <select id="sub_sel" name="sub" class="form-control col-sm-6">
              @foreach( $org_retAr as $k => $val )
                <option value="{{ $k }}"> {{ $k }}</option>
              @endforeach
            </select>
            </div>
            <div class="col-sm-4">
              <button id="btn_xx" class="btn btn-success">Visulize</button>
            </div>
            
              <div class="col-sm-12">
                <div id="piechart_3d" class="" style="width: 600px; height: 500px;"></div>
              </div>
            </div>

        </div>
            </form>
      </div>
    </div>
  </div>
</div>


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
          title: 'Subject  :'+ '{{ $sub_name }}',
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  
@endsection
