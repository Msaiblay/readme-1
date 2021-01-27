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

        DB::table('genres')->insert([
            'name' => 'Agricultural',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('genres')->insert([
            'name' => 'Business',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('genres')->insert([
            'name' => 'Technical',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('genres')->insert([
            'name' => 'Novels',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('genres')->insert([
            'name' => 'History',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('genres')->insert([
            'name' => 'Comic',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('genres')->insert([
            'name' => 'Mystery',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('genres')->insert([
            'name' => 'Religion',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
