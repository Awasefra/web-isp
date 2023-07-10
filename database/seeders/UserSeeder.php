<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'username'=> 'admin',
            'name'=> 'Administrator',
            'role'=>'0',
            'password'=> Hash::make('123')
        ]);
        DB::table('users')->insert([
            'username'=> 'sales',
            'name'=> 'Sales 1',
            'role'=> '1',
            'password'=> Hash::make('123')
        ]);
    }
}
