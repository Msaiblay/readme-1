<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Models\Book;
use App\Models\Genre;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    
    public function boot()
    {
        Schema::defaultStringLength(191);
        $randomBooks = Book::latest()->take(8)->get();

        $genres = Genre::all();

        View::share('data', [$randomBooks, $genres]);


    }
}
