<?php

namespace App\Http\Controllers;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$images = ImageGallery::get();
    	return view('image-gallery',compact('images'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $input['image_id'] =  auth()->user()->id; 
        $input['title'] = $request->title;
        ImageGallery::create($input);


    	return back()
    		->with('success','Image Uploaded successfully.');
    }


    public function edit(ImageGallery $ImageGallery)
    {

        if (auth()->user()->id == $ImageGallery->image_id)
        {            
                return view('image.edit', compact('ImageGallery'));
        }           
        else {
             return redirect('/gallery');
         }            	
                 	
    }

    public function update(Request $request, ImageGallery $ImageGallery)
    {
    	if(isset($_POST['delete'])) {
    		$ImageGallery->delete();
    		return redirect('/gallery');
    	}
    	else
    	{
            $this->validate($request, [
                'title'=>'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    		$ImageGallery->title = $request->title;
            $ImageGallery->image = $request->image;
	    	$stub->save();
	    	return redirect('/blog'); 
    	}    	
    }



























    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	ImageGallery::find($id)->delete();
    	return back()
    		->with('success','Image removed successfully.');	
    }
}
