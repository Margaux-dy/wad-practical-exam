<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(15)->create();

        $testUser = User::factory()->create([
            'name' => 'Marga Calumpiano',
            'email' => 'margaux@gmail.com',
            'password' => Hash::make('87654321'),  
        ]);

        Post::factory(5)->create([
            'user_id' => $testUser->id,  
        ]);

        $users->each(function ($user) {
            Post::factory(10)->create([
                'user_id' => $user->id, 
            ]);
        });
    }
}
