
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Exam</div>
                <div class="panel-body">
                 @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif           
                    @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                    @endif       

                <form action="/exam/create" method="post" enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Exam for :</label>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" placeholder="Subject Name" name="subject" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Duration :</label>
                    </div>
                    <div class="form-group col-sm-6">
                        <select name="duration" class="form-control ">
                            <option value="5">5 min</option>
                            <option value="10">10 min</option>
                            <option value="15">15 min</option>
                            <option value="20">20 min</option>
                            <option value="30">30 min</option>
                            <option value="45">45 min</option>
                            <option value="60">60 min</option>
                        </select>
                    </div>
                </div>

                </select>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Select csv of Questions</label>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="file" accept=".csv" class="form-control" name="file_exam" /> 
                    </div>
                    <div class="form-group col-sm-6">
                        <a href="/sample.csv" download="" class="btn btn-primary col-sm-12">Download Sample</a>
                    </div>
                    <div class="form-group col-sm-6">
                        <button class="btn btn-success col-sm-12">Create Exam</button>
                    </div>
                </div>
                <hr>
                    <div class="row">
                       <div class="col-sm-12">
                       <h3>The compulsory format of csv file</h3>
                        <table class="table">
                            
                            <tr>
                                <th>Question</th>
                                <th>Right answer</th>
                                <th>Option Answer 1</th>
                                <th>Option Answer 2</th>
                                <th>Option Answer 3</th>
                            </tr>

                        </table>
                       </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
