<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','status'];

    public function newspapers()
    {
        return $this->hasMany(Newspaper::class);
    }
}
