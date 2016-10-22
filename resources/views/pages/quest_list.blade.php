@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <a href="./create" class="btn btn-primary">Add New</a>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Exam</div>
                <div class="panel-body">
                    <table class="table-striped table-bordered table">
                    <thead>
                            <tr>
                                <th>Quesion</th>
                                <th>Right Answer</th>
                                <th>Option 1 </th>
                                <th>Option 2 </th>
                                <th>Option 3 </th>
                                <th>Actions </th>

                            </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ( $qs as $q )
                            <?php 
                                $ans = explode("|", $q['q_answers']);
                                $ans['right'] =  $q['q_right_answer'];
                            ?>
                                <tr>
                                    <td >{{ $q['q_qestion'] }}</td>
                                    <td class="text-blue">{{ $ans[1] }}</td>
                                    <td class="text-blue">{{ $ans[2] }}</td>
                                    <td class="text-blue">{{ $ans[3] }}</td>
                                    <td class="text-green">{{ $ans['right'] }}</td>

                                    <td> 
                                        <button class="btn btn-success">
                                           <i class="fa fa-edit"></i>
                                        </button>
                                     </td>
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
