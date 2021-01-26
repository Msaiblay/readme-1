<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'gender', 'photo', 'bio', 'dob', 'dod', 'nationality'];

    public function books(){
    	return $this->hasMany('App\Models\Book');
    }
}
