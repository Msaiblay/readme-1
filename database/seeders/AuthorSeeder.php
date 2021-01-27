<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        // 1
        DB::table('authors')->insert([
            'name' => 'Author One',
            'photo' => '/storage/author/authorone.jpg',
            'bio' => '',
            'dob' => '',
            'dod' => '',
            'nationality' => '',            
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // 2
        DB::table('authors')->insert([
            'name' => 'Author Two',
            'photo' => '/storage/author/authorone.jpg',
            'bio' => '',
            'dob' => '',
            'dod' => '',
            'nationality' => '',            
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
