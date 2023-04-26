<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Imran Yahya';
        $user->email = 'imran@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
    }
}
