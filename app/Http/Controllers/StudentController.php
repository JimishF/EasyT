<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use DB;
use App\StudentUser;
class StudentController extends Controller
{
    public function index()
    {
    	$students = StudentUser::all()->toArray();
    	return view("pages.studentlist")->with('students', $students);
    }

    public function getCreate()
    {
    	
    }

     public function create( Request $request )
    {
    	# code...
    }
}