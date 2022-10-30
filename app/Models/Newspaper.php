<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id','title','des','image','status'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
