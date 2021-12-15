<?php

namespace App\Models;
//use App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','city','country'];

    public function owner(){   // This will auto find owner_id
        return $this->belongsTo(User::class,'uid');
    }
}
