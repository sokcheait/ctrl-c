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
}
