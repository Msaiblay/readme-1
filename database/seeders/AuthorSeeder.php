<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker;

class AuthorSeeder extends Seeder
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

        for ($i=1; $i <= 10; $i++) { 
            # code...
        
            // 1
            DB::table('authors')->insert([
                'name' => $faker->name($gender = 'null'|'male'|'female'),
                'gender'=> $faker->randomElement(['male', 'female']),
                'photo' => $faker->imageUrl(640, 480, 'animals', true),
                'bio' => $faker->randomHtml(),
                'dob' => $faker->date(),
                'nationality' => 'Burma',            
                'created_at' => $now,
                'updated_at' => $now,
            ]);

        }

    }
}
