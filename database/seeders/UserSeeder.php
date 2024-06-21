<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        $lem = User::create([
            'name' => 'Lemmuel Lapuz',
            'email' => 'lapuz.lemmuel@gmail.com',
            'password' => 'P@ssword123'
        ]);

        $mona = User::create([
            'name' => 'Mona Clemente',
            'email' => 'monakrizzel74@gmail.com',
            'password' => 'P@ssword123'
        ]);

        $chatRoom = ChatRoom::create();

        $chatRoom->members()->create([
            'user_id' => $lem->id
        ]);
        
        $chatRoom->members()->create([
            'user_id' => $mona->id
        ]);
    }
}
