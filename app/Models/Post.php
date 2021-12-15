<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','post'];

    public function myuser(){
        return $this->belongsTo(User::class,'user_id')->withDefault([
            'name' => 'Guest User'
        ]);
    }

    public function tags(){
        //return $this->belongsToMany(Tag::class,'tag_post');
        //return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id'); 
         
        //If follow the naming convention no need to specify parameters
        return $this->belongsToMany(Tag::class);  
    }
}
