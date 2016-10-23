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
				</div>
            </form>
			</div>
		</div>
	</div>
</div>

@endsection