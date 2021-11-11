<?php

namespace Database\Seeders;

use App\Entities\Blog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::factory()->create();

        Blog::factory(100)->create([
            'user_id' => $user->id,
        ]);
    }
}
