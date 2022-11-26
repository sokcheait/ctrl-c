<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    use HasFactory;

    protected $fillable= ['social_id','name','email','password','image','status'];

    public function social()
    {
        return $this->belongsTo(Social::class);
    }
    
    public function setSocialIdAttribute($value)
    {
        $this->attributes['social_id'] = json_encode($value);
    }
    // public function getSocialIdAttribute($value)
    // {
    //     $this->attributes['social_id'] = json_decode($value, true);
    // }
}
