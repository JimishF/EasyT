@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Exam</div>
                <div class="panel-body">
                    <table class=" table">
                    <thead>
                        
                            <tr>
                                <th>Exam ID</th>
                                <th>Subject name</th>
                                <th>Duration</th>
                                <th>Questions</th>
                                <th>&lt; embed /&gt;</th>
                            </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ( $exam as $e )
                                <tr>
                                    <td>{{ $e['e_id'] }}</td>
                                    <td>{{ $e['subject'] }}</td>
                                    <td>{{ $e['e_duration'] }} mins.</td>

                                    <td> <a class="btn btn-success" href="/exam/index/{{ $e['e_id'] }}">
                                        <i class="fa  fa-2 fa-question-circle"></i>
                                    </a> </td>
                                    
                                    <td> <a class="btn mod_open btn-info" data-ref="{{ $e['e_id'] }}">
                                        <i class="fa fa-clone"></i>
                                        </a>
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