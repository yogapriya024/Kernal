<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;
    protected $table = 'image_gallery';


    protected $fillable = ['title','image','image_id'];
    
    public function user()
    {
    	return $this->belongsTo(User::class,'image_id','id');
    }

}
