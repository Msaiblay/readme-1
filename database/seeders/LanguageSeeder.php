<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('languages')->insert([
            'name' => 'Myanmar',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('languages')->insert([
            'name' => 'English',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('languages')->insert([
            'name' => 'Japan',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
