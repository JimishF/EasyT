@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/exam/create">
                        <div class="card text-white card-1 bg-l-green col-sm-4">
                            <i class="fa fa-book big-size"></i><h2 style="padding-left: 10px;"> Add New Subject</h2>
                        </div>
                    </a>
                    <a href="/exam/create">
                        <div class="card text-white card-1 bg-l-purple col-sm-4">
                            <i class="fa fa-graduation-cap big-size" style="padding-left: 40px;"></i><h2 style="padding-left: 20px;" > Create New Exam</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
