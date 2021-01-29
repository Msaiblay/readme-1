<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $genres = array(
            array(1, 'Fantasy'),
            array(2, 'Drama'),
            array(3, 'Accounting'),
            array(4, 'IT & Programming'),
            array(5, 'Engineering'),
            array(6, 'Marketing'),
            array(7, 'Business'),
            array(8, 'Romance'),
            array(9, 'Comic'),
            array(10, 'Religion'),
            array(11, 'Novel'),
            array(12, 'History'),
            array(13, 'Knowledge'),
            array(14, 'Translation'),
            array(15, 'Comedy')
        );

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'name' => $genre[1],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        
    }
}
