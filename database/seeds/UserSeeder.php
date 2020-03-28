<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $users = [
            ['name'=>'Htet Naing Linn','email' => 'htetnainglinn143@gmail.com', 'role' => 'Admin'],
            ['name'=>'Aung Gyi','email' => 'aungaung@gmail.com', 'role' => 'Content Writer'],
            ['name'=>'Bo BoTaw','email' => 'bobo@gmail.com', 'role' => 'guest'],
        ];

        foreach($users as $u) {
            $user = new User();
            $user->name = $u['name'];
            $user->email = $u['email'];
            $user->email_verified_at = now();
            $user->password = bcrypt('123123123'); // password
            $user->role = $u['role'];
            $user->save();
        }
    } 
}
