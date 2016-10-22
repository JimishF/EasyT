<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Session;
use App\Questions;
use App\Exam;
use Validator;

class ExamController extends Controller
{
 
 public function create(Request $request){
 			

			$input_all = $request->all();

 			/*validation start*/
               $rules = array(                                       
                    "duration" => 'required',
                    "subject" => 'required',
                );        
                $validator = Validator::make($input_all, $rules);
                // check if the validator failed -----------------------
                if ($validator->fails()) {
                    $messages = $validator->messages();
                    Session::flash("error","All fields are mendatory.");
                    return back();

                }




        if ((Input::hasFile('file_exam'))) {

            if (Input::file('file_exam')->isValid())
             {
                $extension = Input::file('file_exam')->getClientOriginalExtension();

                if ($extension == 'csv' || $extension == '.csv' ) 
                {
                    $filepath = public_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
                    $destinationPath = $filepath;
                    $image = Input::file('file_exam');

                    $fileName = 'file_exam' . '_' . str_random(10) . '.' . $extension;
                    Input::file('file_exam')->move($destinationPath, $fileName);
                    $file_exam = $fileName;
 
                    $exam = new Exam;

                	$exam->teacher_id 	= Session::get('id');
                	$exam->subject 		= $input_all['subject'];
                	$exam->e_duration 	= $input_all['duration'];
	         		$exam->save();
	
	         		$exam_id = $exam->id;

                    $csvData = file_get_contents($destinationPath.$fileName);
					$lines = explode(PHP_EOL, $csvData);
					$array = array();

					foreach ($lines as $line) {
					    $tmp = str_getcsv($line);
					    if( isset($tmp[0]) && isset($tmp[1]) && isset($tmp[2]) && isset($tmp[3]) && isset($tmp[4]) )
					    {
					    	$dbData = Array();
					    	$dbData['q_qestion'] = $tmp[0];
					    	if($tmp[0] == "QUESTION" || $tmp[1] == "right answer" ){
					    		continue;
					    	}
					    	$dbData['q_right_answer'] = $tmp[1];
					    
					    	unset($tmp[0]);
						
							$dbData['q_answers'] 	= implode("|", $tmp);
							$dbData['exam_id'] 		= $exam_id;							
					    	$array[] = $dbData;
					   		$addStatus = Questions::create($dbData);
					    }

					}

					return redirect("/exam/index/".$exam_id );

                } 
                else 
                {
            	    Session::flash("error","Select valid csv file.");
        			return back();
                }
            }
            else{
            	    Session::flash("error","Select valid file.");
        			return back();
            }
        }else{
        	Session::flash("error","File is required.");
        	return back();
        }

 }
	 public function getCreate()
	 {
	 	return view("pages.createExam");
	 }

	 public function index()
	 {

	 	$exam = Exam::where("teacher_id",Session::get('id'))->get()->toArray();
	 	return view("pages.examlist")->with('exam',$exam);
	 }
	 public function getonly($id)
	 {

	 	$exam = Exam::where("e_id",$id)->first()->toArray();
	 	$qs = Questions::where("exam_id",$id)->get()->toArray();
	 	// print_r($qs);
	 	// exit();
	 	return view("pages.quest_list")->with("qs",$qs)->with('exam',$exam);
	 }
	 public function getExam($ref)
	 {
	 	$examnum = base64_decode(base64_decode( $ref ));
	 	$examnum = explode("|",$examnum);
	 	$id = $examnum[0];
	 	// print_r($examnum);

	 	$qs = Questions::where("exam_id",$id)->get()->toArray();
	 	return view("pages.apiquest")->with("qs",$qs);
	 }
}
