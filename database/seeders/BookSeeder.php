<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        // Type => 0 (Free) || 1 (Premium)

        // Status => 0 (Avaliable) || 1 (Coming Soon) 

        // 1
        DB::table('books')->insert([
            'isbn' => '',
            'title' => '',
            'mmtitle' => '',
            'coverphoto' => '/storage/bookcover/bookone.png',
            'pages' => '',
            'publishyear' => '',
            'price' => '3000',
            'discount' => '', 
            'summary' => '',  
            'annotation' => '',            
            'type' => '1',            
            'file' => '',            
            'status'=> '0',  
            'author_id'	=>	2,
            'language_id'	=>	1,     
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('book_genre')->insert([
            'book_id' => 1,
            'genre_id' => 2, 
        ]);

        DB::table('book_genre')->insert([
            'book_id' => 1,
            'genre_id' => 3, 
        ]);

        // 2
        DB::table('books')->insert([
            'isbn' => '',
            'title' => '',
            'mmtitle' => '',
            'coverphoto' => '/storage/bookcover/booktwo.png',
            'pages' => '',
            'publishyear' => '',
            'price' => '',
            'discount' => '', 
            'summary' => '',  
            'annotation' => '',            
            'type' => '0',            
            'file' => '/storage/bookfile/bookfile.pdf',            
            'status'=> '0', 
            'author_id'	=>	2,
            'language_id'	=>	1,       
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('book_genre')->insert([
            'book_id' => 2,
            'genre_id' => 8, 
        ]);

        // 3
        DB::table('books')->insert([
            'isbn' => '',
            'title' => '',
            'mmtitle' => '',
            'coverphoto' => '/storage/bookcover/booktwo.png',
            'pages' => '',
            'publishyear' => '',
            'price' => '',
            'discount' => '', 
            'summary' => '',  
            'annotation' => '',            
            'type' => '0',            
            'file' => '/storage/bookfile/bookfile.pdf',            
            'status'=> '0', 
            'author_id'	=>	2,
            'language_id'	=>	1,       
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
