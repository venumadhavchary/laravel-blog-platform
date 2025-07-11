<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'PHP', 'slug' => 'php', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel', 'slug' => 'laravel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Web Development', 'slug' => 'web-development', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}