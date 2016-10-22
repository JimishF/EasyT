
<head>
    

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

    <script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
         
</head>  <!-- Compiled and minified CSS -->


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Exam</div>
                <div class="panel-body">
                    <table class="table-striped table-bordered table">
                    <thead>
                        
                            <tr>
                                <th>Quesion</th>
                                <th>A </th>
                                <th>B </th>
                                <th>C </th>                               
                                
                                <th>Right Answer</th>
                            </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ( $qs as $q )
                                <tr>
                                    <td>{{ $q['q_question'] }}</td>
                                    <td>{{ $ans['a'] }}</td>
                                    <td>{{ $ans['b'] }}</td>
                                    <td>{{ $ans['c'] }}</td>
                                    <td>{{ $ans['right'] }}</td>

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
