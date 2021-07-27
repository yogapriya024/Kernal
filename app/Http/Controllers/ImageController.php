<?php

namespace App\Http\Controllers;
use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
    	$images = image::get();
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
        $request->image->move(public_path('image'), $input['image']);

        $input['image_id'] = auth()->user()->id;
        $input['title'] = $request->title;
        image::create($input);


    	return back()
    		->with('success','Image Uploaded successfully.');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	image::find($id)->delete();
    	return back()
    		->with('success','Image removed successfully.');	
    }

}
