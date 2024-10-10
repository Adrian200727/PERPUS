<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserData = [
            [
                'name'=>'Adrian',
                'email'=>'adrian@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('12345678')

            ],
            [
                'name' => 'Cheryl',
                'email' => 'cheryl@gmail.com',
                'role' => 'user',
                'password' => bcrypt('12345678')

            ]
            ];
            foreach($UserData as $key => $val){
                User::create($val);
            }
    }
}
