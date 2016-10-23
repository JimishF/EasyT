
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Subject wise hit ratio</div>
                <div class="panel-body form-group">
    				<div class="col-sm-4">
					<label class="form-control ">Select Subject : </label>
		  			</div> 
    				<div class="col-sm-4">

				  	<select id="sub_sel" class="form-control col-sm-6">
					  	@foreach( $org_retAr as $k => $val )
					  		<option value="{{ $k }}"> {{ $k }}</option>
					  	@endforeach
				  	</select>
    				</div>
    				<div class="col-sm-4">
    					<button id="btn_xx" class="btn-xx">Visulize</button>
    				</div>
				</div>
			</div>
		</div>
	</div>
</div>

	
		    <div id="piechart_3d_subject_wise" style="width: 800px; height: 500px;" ></div>
    <script type="text/javascript">
initx = function () {

    state= {
    	tmp : Array()
    }
	    btnx = document.getElementById("btn_xx");
	    slct = document.getElementById("sub_sel");
	    btnx.addEventListener('click',function () {
	    	var ar = data_json[slct.value];
	    	state.tmp.push(['Task','subject wise']);
	    	for(i in ar){
	    		state.tmp.push([i,ar[i]]);
	    	}

	    	// console.log(state.tmp);

	    	drawChart();
	    });

	    
      	     data_json = JSON.parse(<?php  echo $retAr;  ?>);
		     google.charts.load("current", {packages:["corechart"]});
		     
		      elm = document.getElementById('piechart_3d_subject_wise');
	         console.log(elm);
	         chart = new google.visualization.PieChart(elm);
	         
	      function drawChart() 
	      {
	      	
	      	console.log(state.tmp);
	         data = google.visualization.arrayToDataTable( state.tmp ) ;
	      	// return;
	         options = {
	          title: 'Subject wise Answer Results',
	          is3D: true
	        };
	        chart.draw(data, options);
	      }


	
	    
};

window.onload = initx;
    </script>
@endsection