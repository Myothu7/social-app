<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Feeling;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'mmt',
        //     'email' => 'mmt@example.com',
        // ])
        $feel_data = ['happy', 'lovely', 'loved', 'excited', 'crazy', 'cool', 'relaxed', 'chill'];
        Post::factory()->count(10)->create();

        foreach($feel_data as $val){
            Feeling::create([
                'name' => $val
            ]);
        }
       
    }
}
