<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name'=>'Mostafa Hussien',
            'email'=>'mostafa@gmail.com',
            'password'=>Hash::make('password')

        ]);

        DB::table('users')->insert(
            [
                'name'=>'Mostafa ASD',
                'email'=>'mostafaasd@gmail.com',
                'password'=>Hash::make('passwordasd')
            ]
        );
    }
}
