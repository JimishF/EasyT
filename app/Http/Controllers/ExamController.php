<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Session;
use App\Questions;
use App\Exam;
use App\Ans;
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
	 	if( Session::get('id') != ""){
	 		return view("pages.createExam");
	 	}
	 	return redirect("/login");
	 }

	 public function index()
	 {
	 	if( Session::get('id') == ""){
	 	return redirect("/login");
	 	}
	 	$exam = Exam::where("teacher_id",Session::get('id'))->get()->toArray();
	 	return view("pages.examlist")->with('exam',$exam);
	 }
	 public function getonly($id)
	 {
	 	if( Session::get('id') == ""){
	 		return redirect("/login");
	 	}

	 	$exam = Exam::where("e_id",$id)->first()->toArray();
	 	$qs = Questions::where("exam_id",$id)->get()->toArray();
	 	// print_r($qs);
	 	// exit();
	 	return view("pages.quest_list")->with("qs",$qs)->with('exam',$exam);
	 }
	 public function getExam($ref)
	 {

	 	if( Session::get('id') == ""){
	 		return redirect("/login");
	 	}
	 	$examnum = base64_decode(base64_decode( $ref ));
	 	$examnum = explode("|",$examnum);
	 	$id = $examnum[0];

	 	$sub = Exam::where("e_id",$id)->first()->toArray();
	 	$sub = $sub['subject'];
	 	// print_r($examnum);

	 	$qs = Questions::where("exam_id",$id)->get()->toArray();
	 	return view("pages.apiquest")->with("qs",$qs)->with("ref",$ref)->with('sub',$sub);
	 }
	 public function evaluateExam(Request $request)
	 {	
	 	if( Session::get('id') == ""){
	 		return redirect("/login");
	 	}
	 	$ar = $request->all();
	 	$ref = $ar['ref'];
	 	
	 	$examnum = base64_decode(base64_decode( $ref ));
	 	$examnum = explode("|",$examnum);
	 	$exam_id = $examnum[0];
	 	$a_by = $ar['user_number'];

	 	// print_r($exam_id);

	 	$qs = Questions::where("exam_id",$exam_id)->get()->toArray();
	 	// print_r($qs);

	 	$valid_ansAr = Array();
	 	$user_ansAr = Array();
	 	foreach ($qs as $q) {
			$valid_ansAr[ $q['q_id'] ] = $q['q_right_answer'];		      	
	 	}
	 	// die("lol");

	 	foreach ($ar as $key => $value) {
	 		if( starts_with($key,"qst_") )
	 		{
	 			$q_str_id = str_replace("qst_", "", $key);
	 			$user_ansAr[ $q_str_id ] = $value;
	 			$user_ansAr[] = $value;

	 		}
	 	}


		$total = 0;
		$obtained = 0;

	 	foreach ($valid_ansAr as $q_id => $ans) {
		$total ++;	 			
	 		$given = $user_ansAr[ $q_id ];
	 		 if( $user_ansAr[ $q_id ] == $ans ){
	 			$marks = 1;	
	 			$obtained ++;
	 		}else
	 		{
	 			$marks = 0;
	 		}
	 		$c_status = Ans::create([
				'a_by' => $a_by,
				'exam_id' => $exam_id,
				'q_id' => $q_id,
				'ans' => $ans,
				'given' => $user_ansAr[ $q_id ],
				'marks' => $marks,
	 		]);
	 	}	


	 	return redirect('results/'.$exam_id.'/'.$a_by); 
	 	
	 	// return view("pages.instantresults")->with('total',$total)->with('obtained',$obtained);
	 }
	 public function results($e_id,$a_by){
		 if( Session::get('id') == ""){
	 		return redirect("/login");
	 	}
	 	$arr = Ans::where('exam_id',$e_id)->where('a_by',$a_by)->get()->toArray();
	 
	 	// print_r($arr);
	 	$total = 0;
	 	$obtained = 0;
	 	foreach ($arr as $ans) {
	 		if( $ans['marks'] == 1){
	 			$obtained ++;
	 		}	
	 		$total++;
	 	}
	 	return view("pages.instantresults")->with('total',$total)->with('obtained',$obtained)->with('exam_id',$e_id)->with("a_by",$a_by);

	 }
	 public function eligible($ref,$a_by)
	 {
	 	 if( Session::get('id') == ""){
	 		return redirect("/login");
	 	}

	 	$examnum = base64_decode(base64_decode( $ref ));
	 	$examnum = explode("|",$examnum);
	 	$exam_id = $examnum[0];

	 	$data = Ans::where('exam_id',$exam_id)->where('a_by',$a_by)->count();
	 	if( $data  > 0){
	 		return "not ok";
	 	}else{
	 		return "ok";
	 	}
	 }


	 public function resultsGetView()
	 { 
	 	$retAr = Array();
	 	$a_by = Session::get("id");
	 	$data = Ans::where('exam_master.teacher_id',$a_by)
	 	->leftJoin('exam_master','answer_log.exam_id','=','exam_master.e_id')
	 	->get()->toArray();
	 	// print_r($data);
	 	// print_r($a_by);
	 	// exit();
	 	foreach ($data as $key => $value) 
	 	{
	 		if( isset($retAr[$value['subject']]) && is_array($retAr[$value['subject']]) )
	 		{
	 			$retAr[$value['subject']]['total'] ++; 
	 			if( $value['marks'] == 1){
	 				$retAr[$value['subject']]['obtained'] ++; 
	 			}
	 		}
	 		else
	 		{
				$retAr[$value['subject']]= Array('total'=>1);
	 			if( $value['marks'] == 1){
	 				$retAr[$value['subject']]['obtained'] = 1; 
	 			}
	 			else{
	 				$retAr[$value['subject']]['obtained'] = 0; 
	 			}
	 		}
	 	}
	 	$strval = json_encode($retAr);

	 	// exit();
	 	return view("pages.simglesubjectwise")->with("retAr","'".$strval."'")
	 		->with("org_retAr",$retAr);
	 }

	public function resultsPostView(Request $request)
	{
		$ar = $request->all();
	 	$a_by = Session::get("id");

		$data = Ans::where('exam_master.teacher_id',$a_by)
	 	->leftJoin('exam_master','answer_log.exam_id','=','exam_master.e_id')->where('exam_master.subject', $ar['sub'])
	 	->get()->toArray();
	 
	 	$total = 0;
	 	$obtained = 0;
	 	foreach ($data as $ans) {
	 		if( $ans['marks'] == 1){
	 			$obtained ++;
	 		}	
	 		$total++;
	 	}
	 
	 	$data = Ans::where('exam_master.teacher_id',$a_by)
	 	->leftJoin('exam_master','answer_log.exam_id','=','exam_master.e_id')
	 	->get()->toArray();
	 	// print_r($data);
	 	// print_r($a_by);
	 	// exit();
		 	foreach ($data as $key => $value) 
		 	{
		 		if( isset($retAr[$value['subject']]) && is_array($retAr[$value['subject']]) )
		 		{
		 			$retAr[$value['subject']]['total'] ++; 
		 			if( $value['marks'] == 1){
		 				$retAr[$value['subject']]['obtained'] ++; 
		 			}
		 		}
		 		else
		 		{
					$retAr[$value['subject']]= Array('total'=>1);
		 			if( $value['marks'] == 1){
		 				$retAr[$value['subject']]['obtained'] = 1; 
		 			}
		 			else{
		 				$retAr[$value['subject']]['obtained'] = 0; 
		 			}
		 		}
		 	
		}
	 	$strval = json_encode($retAr);

	 	// print_r($data);
	 	return view("pages.simglesubjectwise_post")->with('total',$total)->with('obtained',$obtained)->with("a_by",$a_by)->with("sub_name",$ar['sub'])->with("retAr","'".$strval."'")
	 		->with("org_retAr",$retAr);;
}
}
