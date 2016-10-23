@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="row">
                        <div class="col-sm-6">
                            <h2>Exam Paper</h2>
                        </div>        
                    </div>
                <div class="row">
                    <div class="col-sm-6">
                        
                    <div class="row">
                        <div class="col-sm-3">
                            Exam ID                      
                        </div>
                        <div class="col-sm-3">
                            : {{ $exam['e_id'] }} 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">            
                        Subject
                        </div>
                        <div class="col-sm-3">
                            : {{ $exam['subject'] }} 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">            
                            Duration 
                        </div>
                        <div class="col-sm-3">
                            : {{ $exam['e_duration'] }} mins.
                        </div>
                    
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <button>
                            
                        </button>
                    </div>
                </div>

                    <table class="table-bordered table">
                    <thead>
                    <colgroup>
                        <col width="40%"/>
                        <col width="10%"/>
                        <col width="10%"/>
                        <col width="10%"/>
                        <col width="10%"/>
                        <col width="10%"/>
                        <col width="10%"/>
                    </colgroup>
                            <tr>
                                <th>Quesion</th>
                                <th>Right Answer</th>
                                <th>Option 1 </th>
                                <th>Option 2 </th>
                                <th>Option 3 </th>
                                <th colspan="2">Actions </th>
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
                                    <td class="text-green">{{ $ans['right'] }}</td>
                                    <td class="text-blue">{{ $ans[1] }}</td>
                                    <td class="text-blue">{{ $ans[2] }}</td>
                                    <td class="text-blue">{{ $ans[3] }}</td>

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
