<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stub extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','slug','post_id'];
    public function user()
    {
    	return $this->belongsTo(User::class,'post_id','id');
    }
}
