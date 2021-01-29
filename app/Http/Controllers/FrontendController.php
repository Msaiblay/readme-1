<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Language;

class FrontendController extends Controller
{
    public function index(){
    	$topbooks = Book::take(10)->get();
    	$genres = Genre::all();

    	$newbooks = Book::latest()->limit(6)->get();

    	$randombooks = Book::inRandomOrder()->take(4)->get();

    	$freebooks = Book::where('type', 0)->take(4)->get();

    	$authors = Author::take(10)->get();

    	return view('frontend.index',compact('topbooks', 'newbooks', 'freebooks', 'randombooks', 'genres','authors'));

    }
}
