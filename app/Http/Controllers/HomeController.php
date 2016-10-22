<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Session::get("name") ){
            return view('home');
        }
        return redirect("/login");
    }

 public function login( Request $request )
 {
  
        $ar = $request->all();
         $data = User::where("t_email",$ar['email'])->first()->toArray();
         // print_r($data);
         // exit();
         if( count($data) >0){
            if( Hash::check($ar['password'],$data['t_password']) )
            {
                Session::set('name', $data['t_name']);
                Session::set('id', $data['t_id']);
                return redirect("/");
            }else{
                Session::flash("error","Incorrect Email or password.");
            }
         }else{
            Session::flash("error","Incorrect Email or password.");
         }
         return redirect("/login");
     // exit;
 }
 public function logout()
 {
    Session::flush();    
    Session::flash("message","logout success.");

    return redirect("/login");
 }

  public function register( Request $request )
 {
     $ar  = $request->all();
     // print_r($ar);

        User::create([
            't_name' => $ar['name'],
            't_email' => $ar['email'],
            't_contact_no' => $ar['contact'],
            't_institute' => $ar['i_name'],
            't_password' => Hash::make($ar['password']),
            'is_admin' => 0,
        ]);

        Session::flash("message","Account created. You can login now.");
    return view("auth.login"); 

     // exit;
 }

 public function getLogin()
 {
    // die("lol");
      if( Session::get("name") ){
            return redirect('/home');
        }
        return view("auth.login"); 
     
 }

 public function getRegister()
 {  
    if( Session::get("name") ){
            return redirect('/home');
        }
        return view("auth.register"); 
 }
 
}
