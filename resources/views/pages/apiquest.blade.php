<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	 <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>  
	<script type="text/javascript">
	</script>
</head>
<body>
	<form method="post" action="/mcqexam/getref" >
		{{ csrf_field() }}
		<input type="hidden" name="ref" value="{{ $ref }}">
		<input type="hidden" name="user_number" id="user_number" >
		
	<div class="container ex_roll" >
		<div class="col s12 m7">
	    <h2 class="header">Give your Roll number</h2>
	    <div class="card horizontal">
	      <div class="card-stacked">
	        <div class="card-content">
	          <input type="text" class="" id="theText">
	          <!-- <label for="icon_prefix">First Name</label> -->
	        </div>


	        </div>
	        <div class="card-action">
	          <button type="button" class="btn green darken-2 enroll">Click to Start Exam</button>
	        </div>
	      </div>
	    </div>
	  </div>
	            
	</div>

	<div class="container ex_form" style="display: none;">
	 <ul class="collection">
	 	<?php $i=0; ?>
	 	@foreach($qs as $q)
	     	<li class="collection-item avatar">
		      <div class="material-icons circle green darken-2 white-text" style="text-align: center;"><span style="line-height: 2.7">{{ ++$i }}</span></div>

		      <span class="title">{{ $q['q_qestion']}}</span>
		      <p> 
		      	<?php
		      	 $arr_ans=explode("|", $q['q_answers']);
		      	 shuffle($arr_ans);
		      	 $x = 0;
		      	 ?>
		      	 @foreach($arr_ans as $ans)
		      	 	@if(empty($ans))
		      	 		@continue
		      	 	@endif
		      	 	<input id="qst_{{ $q['q_id'] }}_{{ ++$x }}" name="qst_{{ $q['q_id'] }}" type="radio" value="{{ $ans }}" />
      				<label for="qst_{{ $q['q_id'] }}_{{ $x }}">{{ $ans }}</label>
		      	 @endforeach
		      </p>
		    </li>
	    @endforeach
  </ul>
  <button class="btn green">Submit Answers</button>
	</div>

	</form>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".enroll").click(function () {
				if( $("#theText").val() != "" ){	
					$("#user_number").val( $("#theText").val());
					$(".ex_form").show();
					$(".ex_roll").hide();
				}
			});
		});
	</script>
</body>
</html>