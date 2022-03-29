<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert(

        [
            'name' => 'user',
            'user_type' => 'user',
            'phone' => '0123456789',
            'avatar' => 'public/frontend_image/avatar/iKyt7wCnzkcdr0PyA2Uw.jpg',
            'email' => 'user@example.com',
            'password' => Hash::make('123456789'),
            'status' => 'success',
      
        ]

    );
    }
}
