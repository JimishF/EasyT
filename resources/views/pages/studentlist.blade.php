@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a href="./create" class="btn btn-primary">Add New</a>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Student List</div>
                <div class="panel-body">
                    <table class="table-striped table-bordered table">
                    <thead>
                        
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ( $students as $student )
                                <tr>
                                    <td>{{ $student['number'] }}</td>
                                    <td>{{ $student['name'] }}</td>
                                    <td>{{ $student['class'] }}</td>
                                    <td> <button class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </button> </td>
                                    <td >
                                        <button class="btn btn-success">
                                            <i class="fa fa-trash"></i>
                                        </button> 
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
