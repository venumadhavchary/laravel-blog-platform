<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Technology', 'slug' => 'technology', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Travel', 'slug' => 'travel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Food', 'slug' => 'food', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}