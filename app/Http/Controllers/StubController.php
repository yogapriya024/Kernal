<?php
use App\Mail\PostMail;
namespace App\Http\Controllers;
use App\Models\stub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class StubController extends Controller
{
    public function index(){
      
        $stubs = auth()->user()->stubs();
        return view('blog.dashboard',compact('stubs'));

       
    }
    public function add()
    {
    	return view('blog.add');
    }
    public function create(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255',
            'body'=>'required'
        ]);
        $stub=new stub();
        
			$stub->title=$request->title;
            $stub->slug=$request->slug;
			$stub->body=$request->body;
            $stub->post_id = auth()->user()->id;
            $stub->save();
            
            session()->flash('success', '<b>Hi there!</b> I have uploaded a new post!');
            
        
      
      
      
     
      
        Mail::to("abc@gmail.com")->send(new \App\Mail\PostMail($stub));
        
        
        
    return redirect()->back()->with('stub','flash_success', 'Your post has been mailed.');
    
        
            return redirect('/blog'); 

           
                
                
               
    }

  








    public function edit(stub $stub)
    {

        if (auth()->user()->id == $stub->post_id)
        {            
                return view('blog.edit', compact('stub'));
        }           
        else {
             return redirect('/blog');
         }            	
                 	
    }

    public function update(Request $request, stub $stub)
    {
    	if(isset($_POST['delete'])) {
    		$stub->delete();
    		return redirect('/blog');
    	}
    	else
    	{
            $this->validate($request, [
                'title'=>'required|max:255',
                 'body'=>'required'
            ]);
    		$stub->title = $request->title;
            $stub->body = $request->body;
	    	$stub->save();
	    	return redirect('/blog'); 
    	}    	
    }
}
