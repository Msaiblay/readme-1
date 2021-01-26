<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = 'bookes';
    // protected $primarykey = 'book_id';

    // public $incrementing = false;
    // public $timestamps = false;

    protected $fillable = ['isbn', 'title', 'mmtitle', 'coverphoto', 'pages', 'publishyear', 'price', 'discount', 'summary', 'annotation', 'type', 'file', 'status', 'author_id', 'language_id'];

    public function author(){
    	return $this->belongsTo('App\Models\Author');
    }

    public function language(){
    	return $this->belongsTo('App\Models\Language');
    }

    public function genres(){
    	return $this->belongsToMany('App\Models\Genre');
    }

    public function orders(){
    	return $this->belongsToMany('App\Models\Order','book_order', 'book_id', 'order_id')
    				->withPivot('qty');
    }
}
