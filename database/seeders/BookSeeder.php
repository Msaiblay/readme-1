<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Book;
use Faker;

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

        $faker = \Faker\Factory::create();

        // $faker->addProvider(new \Faker\Provider\Book($faker));


        // Type => 0 (Free) || 1 (Premium)

        // Status => 0 (Avaliable) || 1 (Coming Soon) 

        for ($i=1; $i <= 20; $i++) { 
            # code...
        
            $title = $faker->sentence(3);
            // 1
            $book = DB::table('books')->insert([
                    'isbn' =>  $faker->unique()->numberBetween(),
                    'title' => $title,
                    'mmtitle' => $title,
                    'coverphoto' => $faker->imageUrl(640, 480, 'animals', true),
                    'pages' => $faker->randomDigitNotNull(),
                    'publishyear' => $faker->year(),
                    'price' => $faker->randomNumber(3, false),
                    'discount' => '', 
                    'summary' => $faker->text(),  
                    'annotation' => $faker->words(20, true),            
                    'type' => '1',            
                    'file' => '',            
                    'status'=> '0',  
                    'author_id'	=>	$faker->numberBetween(1, 10),
                    'language_id'	=>	$faker->numberBetween(1, 2),     
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

        }

        for ($i=0; $i < 40; $i++) { 
            DB::table('book_genre')->insert([
                'book_id' => $faker->numberBetween(1, 20),
                'genre_id' => $faker->numberBetween(1, 8), 
            ]);
        }

        
    }
}
