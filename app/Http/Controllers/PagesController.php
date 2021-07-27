<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use Illuminate\Http\Request;
use App\Models\stub;
use App\Models\task;
class PagesController extends Controller
{
    
    public function getlist(){

        $tasks= task::orderBy('id','asc')->paginate(5);
      
        return view('pages.about',compact('tasks'));
    }
    public function getwel(){

        $stubs= stub::orderBy('id','asc')->paginate(5);
        
        return view('pages.welcome',compact('stubs'));
    }
    public function getIndex(){
        $stubs= stub::orderBy('id','asc')->paginate(5);
            return view('blob.index',compact('stubs'));
    }
    public function getSingle(Request $request, $slug){
        
        $stub =  stub::where('slug',$slug)->firstOrFail();

        return view('blob.single',compact('stub'));
    }
    public function getContact(){
    
        return view('pages.contact');
  
   }
   public function postContact(request $request){
$this->validate($request,[
    'email'=>'required|email',
    'subject' => 'min:3',
    'message'=>'min:15']);
$data = array(
    "email"=>$request->email,
    "subject"=>$request->subject,
    "bodyMessage"=>$request->message
   
);
Mail::send('emails.contact',$data,function($message) use ($data){
$message->from($data['email']);
$message->to('yogapriya@integrass.com');
$message->subject($data['subject']);

});
Session::flash('success','Your Email was Sent!');

return redirect()->route('pages.welcome');
   }















}









